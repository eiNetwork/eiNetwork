<?php
/**
 * Solr Call Number Autocomplete Module
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2010.
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
 * @package  Autocomplete
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/autocomplete Wiki
 */
require_once 'sys/Autocomplete/SolrAutocomplete.php';

/**
 * Solr Call Number Autocomplete Module
 *
 * This class provides smart call number suggestions by using the local Solr index.
 *
 * @category VuFind
 * @package  Autocomplete
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/autocomplete Wiki
 */
class SolrCNAutocomplete extends SolrAutocomplete
{
    /**
     * Constructor
     *
     * Establishes base settings for making autocomplete suggestions.
     *
     * @param string $params Additional settings from searches.ini.
     *
     * @access public
     */
    public function __construct($params)
    {
        parent::__construct('CallNumber');
    }

    /**
     * mungeQuery
     *
     * Process the user query to make it suitable for a Solr query.
     *
     * @param string $query Incoming user query
     *
     * @return string       Processed query
     * @access protected
     */
    protected function mungeQuery($query)
    {
        // Modify the query so it makes a nice, truncated autocomplete query:
        $forbidden = array(':', '(', ')', '*', '+', '"');
        $query = str_replace($forbidden, " ", $query);

        // Assign display fields and sort order based on the query -- if the
        // first character is a number, give Dewey priority; otherwise, give
        // LC priority:
        if (is_numeric(substr(trim($query), 0, 1))) {
            $this->setDisplayField(array('dewey-full', 'callnumber-a'));
            $this->setSortField("dewey-sort,callnumber");
        } else {
            $this->setDisplayField(array('callnumber-a', 'dewey-full'));
            $this->setSortField("callnumber,dewey-sort");
        }

        return $query;
    }
}

?>