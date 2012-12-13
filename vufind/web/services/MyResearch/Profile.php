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

require_once 'services/MyResearch/MyResearch.php';

class Profile extends MyResearch
{
	function launch()
	{
		global $configArray;
		global $interface;
		global $user;

		if (isset($_POST['update'])) {
			$result = $this->catalog->updatePatronInfo($user->cat_password);
			$_SESSION['profileUpdateErrors'] = $result;

			header("Location: " . $configArray['Site']['url'] . '/MyResearch/Profile');
			exit();
		}elseif (isset($_POST['updatePin'])) {
			$result = $this->catalog->updatePin();
			$_SESSION['profileUpdateErrors'] = $result;
			//sleep(5);
			header("Location: " . $configArray['Site']['url'] . '/MyResearch/Profile');
			exit();
		}else if (isset($_POST['edit'])){
			$interface->assign('edit', true);
		}else{
			$interface->assign('edit', false);
		}

		if (isset($_SESSION['profileUpdateErrors'])){
			$interface->assign('profileUpdateErrors', $_SESSION['profileUpdateErrors']);
			unset($_SESSION['profileUpdateErrors']);
		}

		global $librarySingleton;
		$activeLibrary = $librarySingleton->getActiveLibrary();
		if ($activeLibrary == null || $activeLibrary->allowProfileUpdates){
			$interface->assign('canUpdate', true);
		}else{
			$interface->assign('canUpdate', false);
		}

		//Get the list of locations for display in the user interface.
		/*global $locationSingleton;
		$locationSingleton->whereAdd("validHoldPickupBranch = 1");
		$locationSingleton->find();

		$locationList = array();
		while ($locationSingleton->fetch()) {
			$locationList[$locationSingleton->locationId] = $locationSingleton->displayName;
		}*/
		$location = new Location();
		$pickupBranches = $location->getPickupBranchesPreferLocationFirst($patronResult, null);
		$locationList = array();
		foreach ($pickupBranches as $curLocation) {
			$locationList[$curLocation->locationId] = $curLocation->displayName;
		}
		$interface->assign('locationList', $locationList);
		if ($this->catalog->checkFunction('isUserStaff')){
			$userIsStaff = $this->catalog->isUserStaff();
			$interface->assign('userIsStaff', $userIsStaff);
		}else{
			$interface->assign('userIsStaff', false);
		}
		
		//print out the card number
		foreach($user as $key=>$value){
			//echo $key.'=>'.$value.'</br>';
			if($key == 'cat_username')
			{
				$interface->assign('card_number',$value);
			}
		}

		$interface->setTemplate('profile.tpl');
		$interface->setPageTitle(translate('My Profile'));
		$interface->display('layout.tpl');
	}

}