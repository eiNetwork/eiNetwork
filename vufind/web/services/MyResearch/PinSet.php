a<?php
/**
 *
 * Copyright (C) Villanova University 2007.
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

require_once "Action.php";
require_once 'CatalogConnection.php';

class PinSet extends Action
{
	protected $catalog;
	
	function __construct()
	{
	}

	function launch($msg = null)
	{
		global $interface;
		global $configArray;
		
		if (isset($_REQUEST['submit'])){
			$this->catalog = new CatalogConnection($configArray['Catalog']['driver']);
			$driver = $this->catalog->driver;

			//$pinresetResult = $driver->patronPinreset($barcode);
			//function doesn't require an argument
			$pinresetResult = $driver->patronPinreset();
			$interface->assign('pinresetResult', $pinresetResult);
			$interface->setTemplate('getpinresetresult.tpl');
		}else{
			global $servername;
		
			$interface->setTemplate('pinreset.tpl');
		}
		$interface->display('layout.tpl');
	}
}

?>
