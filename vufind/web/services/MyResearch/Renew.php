<?php
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
require_once 'CatalogConnection.php';

require_once 'Action.php';

class Renew extends Action
{
	function launch()
	{
		global $configArray;
		global $user;
		$logger = new Logger();
		$logger->log("Starting renew action", PEAR_LOG_INFO);

		try {
			$this->catalog = new CatalogConnection($configArray['Catalog']['driver']);
		} catch (PDOException $e) {
			// What should we do with this error?
			if ($configArray['System']['debug']) {
				echo '<pre>';
				echo 'DEBUG: ' . $e->getMessage();
				echo '</pre>';
			}
		}

		//Renew the hold
		if (method_exists($this->catalog->driver, 'renewItem')) {
			$logger->log("Renewing item " . $_REQUEST['itemId'], PEAR_LOG_INFO);
			$renewResult = $this->catalog->driver->renewItem($user->password, $_REQUEST['itemId'], $_REQUEST['itemIndex']);
			$logger->log("Result = " . print_r($renewResult, true), PEAR_LOG_INFO);
			$message = $renewResult['message'];
			if(is_array($message)){
				$renewResult['message'] = $message[$_REQUEST['itemBarCode']];
				/*$a = "";
				foreach($message as $key=>$value){
					$a .= $key;
				}
				$renewResult['message'] = $a;*/
			}
			$_SESSION['renewResult'][$renewResult['itemId']] = $renewResult;
		} else {
			PEAR::raiseError(new PEAR_Error('Cannot Renew Item - ILS Not Supported'));
		}
		//Redirect back to the hold screen with status from the renewal
		header("Location: " . $configArray['Site']['path'] . '/MyResearch/CheckedOut');
	}

}