<?php
/**
 * EZB Link Resolver Driver
 *
 * EZB is a free service -- the API endpoint is available at
 * http://services.d-nb.de/fize-service/gvr/full.xml
 *
 * PHP version 5
 *
 * Copyright (C) Markus Fischer, info@flyingfischer.ch
 *
 * last update: 2011-04-13
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
 * @author   Markus Fischer <info@flyingfischer.ch>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_link_resolver_driver Wiki
 */
require_once 'Interface.php';

/**
 * EZB Link Resolver Driver
 *
 * @category VuFind
 * @package  Resolver_Drivers
 * @author   Markus Fischer <info@flyingfischer.ch>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/building_a_link_resolver_driver Wiki
 */
class Resolver_Ezb implements ResolverInterface
{
    private $_baseUrl;

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
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
        // Unfortunately the EZB-API only allows OpenURL V0.1 and
        // breaks when sending a non expected parameter (like an ISBN).
        // So we do have to 'downgrade' the OpenURL-String from V1.0 to V0.1
        // and exclude all parameters that are not compliant with the EZB.

        // Parse OpenURL into associative array:
        $tmp = explode('&', $openURL);
        $parsed = array();

        foreach ($tmp as $current) {
            $tmp2 = explode('=', $current, 2);
            $parsed[$tmp2[0]] = $tmp2[1];
        }

        // Downgrade 1.0 to 0.1
        if ($parsed['ctx_ver'] == 'Z39.88-2004') {
            $openURL = $this->_downgradeOpenUrl($parsed);
        }

        // make the request IP-based to allow automatic
        // indication on institution level
        $openURL .= '&pid=client_ip%3D' . $_SERVER['REMOTE_ADDR'];

        // Make the call to the EZB and load results
        $url = $this->_baseUrl . '?' . $openURL;

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

        // get results for online
        $this->_getElectronicResults('0', 'Free', $records, $xpath);
        $this->_getElectronicResults('1', 'Partially free', $records, $xpath);
        $this->_getElectronicResults('2', 'Licensed', $records, $xpath);
        $this->_getElectronicResults('3', 'Partially licensed', $records, $xpath);
        $this->_getElectronicResults('4', 'Not free', $records, $xpath);

        // get results for print, only if available
        $this->_getPrintResults('2', 'Print available', $records, $xpath);
        $this->_getPrintResults('3', 'Print partially available', $records, $xpath);

        return $records;
    }

    /**
     * Downgrade an OpenURL from v1.0 to v0.1 for compatibility with EZB.
     *
     * @param array $parsed Array of parameters parsed from the OpenURL.
     *
     * @return string       EZB-compatible v0.1 OpenURL
     * @access private
     */
    private function _downgradeOpenUrl($parsed)
    {
        $downgraded = array();

        // we need 'genre' but only the values
        // article or journal are allowed...
        $downgraded[] = "genre=article";

        // ignore all other parameters
        foreach ($parsed as $key => $value) {
            if ($key == 'rfr_id') {
                $newKey = 'sid';
            } else if ($key == 'rft.date') {
                $newKey = 'date';
            } else if ($key == 'rft.issn') {
                $newKey = 'issn';
            } else if ($key == 'rft.volume') {
                $newKey = 'volume';
            } else if ($key == 'rft.issue') {
                $newKey = 'issue';
            } else if ($key == 'rft.spage') {
                $newKey = 'spage';
            } else if ($key == 'rft.pages') {
                $newKey = 'pages';
            } else {
                $newKey = false;
            }
            if ($newKey !== false) {
                $downgraded[] = "$newKey=$value";
            }
        }

        return implode('&', $downgraded);
    }
    
    /**
     * Extract electronic results from the EZB response and inject them into the
     * $records array.
     *
     * @param string   $state    The state attribute value to extract
     * @param string   $coverage The coverage string to associate with the state
     * @param array    &$records The array of results to update
     * @param DOMXpath $xpath    The XPath object containing parsed XML
     *
     * @return void
     * @access private
     */
    private function _getElectronicResults($state, $coverage, &$records, $xpath)
    {
        $results = $xpath->query(
            "/OpenURLResponseXML/Full/ElectronicData/ResultList/Result[@state=" .
            $state . "]"
        );
        $i = 0;
        foreach ($results as $result) {
            $record = array();
            $titleXP = "/OpenURLResponseXML/Full/ElectronicData/ResultList/" .
                "Result[@state={$state}]/Title";
            $record['title'] = strip_tags(
                $xpath->query($titleXP, $result)->item($i)->nodeValue
            );
            $record['coverage'] = $coverage;
            $urlXP = "/OpenURLResponseXML/Full/ElectronicData/ResultList/" .
                "Result[@state={$state}]/AccessURL";
            $record['href'] = $xpath->query($urlXP, $result)->item($i)->nodeValue;
            $record['service_type'] = 'getFullTxt';
            array_push($records, $record);
            $i++;
        }
    }

    /**
     * Extract print results from the EZB response and inject them into the
     * $records array.
     *
     * @param string   $state    The state attribute value to extract
     * @param string   $coverage The coverage string to associate with the state
     * @param array    &$records The array of results to update
     * @param DOMXpath $xpath    The XPath object containing parsed XML
     *
     * @return void
     * @access private
     */
    private function _getPrintResults($state, $coverage, &$records, $xpath)
    {
        $results = $xpath->query(
            "/OpenURLResponseXML/Full/PrintData/ResultList/Result[@state={$state}]"
        );
        $i = 0;
        foreach ($results as $result) {
            $record = array();
            $record['title'] = $coverage;
            $urlXP = "/OpenURLResponseXML/Full/PrintData/References/Reference/URL";
            $record['href'] = $xpath->query($urlXP, $result)->item($i)->nodeValue;
            $record['service_type'] = 'getHolding';
            array_push($records, $record);
            $i++;
        }
    }
}

?>
