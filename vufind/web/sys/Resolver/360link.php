<?php
/**
 * 360Link Link Resolver Driver
 *
 * PHP version 5
 *
 * Copyright (C) Royal Holloway, University of London
 *
 * last update: 2010-11-17
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category VuFind
 * @package  Resolver_Drivers
 * @author   Graham Seaman <Graham.Seaman@rhul.ac.uk>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_link_resolver_driver Wiki
 */
require_once 'Interface.php';

/**
 * 360Link Link Resolver Driver
 *
 * @category VuFind
 * @package  Resolver_Drivers
 * @author   Graham Seaman <Graham.Seaman@rhul.ac.uk>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_link_resolver_driver Wiki
 */
class Resolver_360link implements ResolverInterface
{
    private $_baseUrl;

    /**
     * Constructor
     *
     * @access public
     */
    function __construct()
    {
        // Load Configuration for this Module
        global $configArray;
        $this->_baseUrl = $configArray['OpenURL']['url'];
    }

    /**
     * Fetch Links
     *
     * Fetches a set of links corresponding to an OpenURL
     *
     * @param string $openURL openURL (url-encoded)
     *
     * @return string         raw XML returned by resolver
     * @access public
     */
    public function fetchLinks($openURL)
    {
        // Make the call to SerialsSolutions and load results
        $url = $this->_baseUrl . (substr($this->_baseUrl, -1) == '/' ? '' : '/') .
            'openurlxml?version=1.0&' . $openURL;
        $feed = file_get_contents($url);
        return $feed;
    }


    /**
     * Parse Links
     *
     * Parses an XML file returned by a link resolver
     * and converts it to a standardised format for display
     *
     * @param string $xmlstr Raw XML returned by resolver
     *
     * @return array         Array of values
     * @access public
     */
    public function parseLinks($xmlstr)
    {
        $records = array(); // array to return

        $xml = new DomDocument();
        if (!@$xml->loadXML($xmlstr)) {
            return $records;
        }

        $xpath = new DOMXpath($xml);
        $linkGroups = $xpath->query("//ssopenurl:linkGroup[@type='holding']");
        if (!is_null($linkGroups)) {
            foreach ($linkGroups as $linkGroup) {
                $record = array();
                // select the deepest link returned
                $elems = $xpath->query(
                    ".//ssopenurl:url[@type='article']", $linkGroup
                );
                if ($elems->length > 0) {
                    $record['linktype'] = 'article';
                } else {
                    $elems = $xpath->query(
                        ".//ssopenurl:url[@type='journal']", $linkGroup
                    );
                    if ($elems->length > 0) {
                        $record['linktype'] = 'journal';
                    } else {
                        $elems = $xpath->query(
                            ".//ssopenurl:url[@type='source']", $linkGroup
                        );
                        if ($elems->length > 0) {
                            $record['linktype'] = 'source';
                        }
                    }
                }
                if ($elems->length > 0) {
                    $href = $elems->item(0)->nodeValue;
                    $record['href']= $href;
                    $record['service_type'] = 'getFullTxt';
                } else {
                    $record['service_type'] = 'getHolding';
                }
                $elems = $xpath->query(
                    ".//ssopenurl:holdingData/ssopenurl:providerName", $linkGroup
                );
                $title = $elems->item(0)->textContent;
                $elems = $xpath->query(
                    ".//ssopenurl:holdingData/ssopenurl:databaseName", $linkGroup
                );
                $title .= ' - ' . $elems->item(0)->textContent;
                $record['title'] = $title;
                $elems = $xpath->query(
                    ".//ssopenurl:holdingData/ssopenurl:startDate", $linkGroup
                );
                if ($elems->length > 0) {
                    $record['coverage'] = $elems->item(0)->textContent . ' - ';
                }
                $elems = $xpath->query(
                    ".//ssopenurl:holdingData/ssopenurl:endDate", $linkGroup
                );
                if ($elems->length > 0) {
                    $record['coverage'] .= $elems->item(0)->textContent;
                }

                array_push($records, $record);
            }
        }
        return $records;
    }
}

?>
