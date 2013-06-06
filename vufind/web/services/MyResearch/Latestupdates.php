<?php
/**
 *
 * Copyright (C) Andrew Nagy 2009
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
 */

require_once 'Action.php';
require_once 'services/MyResearch/lib/User.php';
require_once 'services/MyResearch/lib/Search.php';
require_once 'Drivers/marmot_inc/Prospector.php';

require_once 'sys/SolrStats.php';
require_once 'sys/Pager.php';

class Latestupdates extends Action {
	
	private $solrStats = false;
	private $query;

	function launch() {
		
		global $interface;
		global $configArray;
		global $timer;
		global $user;

		$interface->setTemplate('latestupdates.tpl');
		$interface->display('layout.tpl');

	}

}