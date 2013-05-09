<?php
/**
 * Suite to run all tests in the current directory.
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
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/unit_tests Wiki
 */
require_once 'PHPUnit/Framework/TestSuite.php';

/**
 * Suite to run all tests in the current directory.
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     http://vufind.org/wiki/unit_tests Wiki
 */
class SeleniumBugsAllTests
{
    /**
     * Build the test suite.
     *
     * @return PHPUnit_Framework_TestSuite
     * @access public
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('VuFind - Selenium - Bugs');

        // Load all tests in subdirectories of the current directory.  This section
        // of the test code is structured a bit differently than normal so that MARC
        // records can be grouped with their corresponding tests.
        foreach (glob(dirname(__FILE__) . '/Bug*/*.php') as $file) {
            $base = basename($file);
            if ($base != 'AllTests.php') {
                include_once $file;
                $suite->addTestSuite(substr($base, 0, strlen($base) - 4));
            }
        }

        return $suite;
    }
}
?>
