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

require_once 'Action.php';
require_once 'services/MyResearch/lib/Suggestions.php';

require_once 'services/MyResearch/lib/User_resource.php';
require_once 'services/MyResearch/lib/User_list.php';
require_once 'CatalogConnection.php';

require_once 'services/MyResearch/lib/User.php';
require_once 'services/MyResearch/lib/Resource.php';

class AJAX extends Action {

	function AJAX()
	{
	}

	function launch()
	{
		$method = $_GET['method'];
		if (in_array($method, array('GetSuggestions', 'GetListTitles', 'getOverDriveSummary',"getAllItems", 'AddList','updatePreferredBranches','getUnavailableHoldingInfo'))){
			header('Content-type: text/plain');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			echo $this->$method();
		}else if (in_array($method, array('LoginForm', 'getBulkAddToListForm', 'getPinUpdateForm','getLocations','getToUpdatePreferredBranches'))){
			header('Content-type: text/html');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			echo $this->$method();
		}else{
			header ('Content-type: text/xml');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			$xml = '<?xml version="1.0" encoding="UTF-8"?' . ">\n" .
	               "<AJAXResponse>\n";
			if (is_callable(array($this, $_GET['method']))) {
				$xml .= $this->$_GET['method']();
			} else {
				$xml .= '<Error>Invalid Method</Error>';
			}
			$xml .= '</AJAXResponse>';
			 
			echo $xml;
		}
	}

	// Create new list
	function AddList()
	{
		require_once 'services/MyResearch/ListEdit.php';
		$return = array();
		if (UserAccount::isLoggedIn()) {
			$listService = new ListEdit();
			$result = $listService->addList();
			if (!PEAR::isError($result)) {
				$return['result'] = 'Done';
				$return['newId'] = $result;
			} else {
				$error = $result->getMessage();
				if (empty($error)) {
					$error = 'Error';
				}
				$return['result'] = translate($error);
			}
		} else {
			$return['result'] = "Unauthorized";
		}

		return json_encode($return);
	}
	function getUnavailableHoldingInfo(){
		global $interface;
		global $configArray;
		//$id = strip_tags($_REQUEST['id']);
		$id = $_REQUEST['rid'];
		require_once ('Drivers/EContentDriver.php');
		require_once ('sys/eContent/EContentRecord.php');
		$driver = new EContentDriver();
		//Get any items that are stored for the record
		$eContentRecord = new EContentRecord();
		$eContentRecord->id = $id;
		$eContentRecord->find(true);

		$holdings = $driver->getHolding($id);
		$holdingsSummary = $driver->getStatusSummary($id, $holdings);
		$interface->assign("holdingsSummary",$holdingsSummary);
		$result = $interface->fetch("MyResearch/holdingsSummary.tpl");
		return $result;
	
	}
	/**
	 * Get a list of preferred hold pickup branches for a user.
	 *
	 * @return string XML representing the pickup branches.
	 */
	function updatePreferredBranches(){
		require_once 'Drivers/marmot_inc/Location.php';
		global $configArray;
		global $interface;
		global $user;
		if (!UserAccount::isLoggedIn()) {
			require_once 'Login.php';
			Login::launch();
			exit();
		}
		try {
			$catalog = new CatalogConnection($configArray['Catalog']['driver']);
		} catch (PDOException $e) {
			// What should we do with this error?
			if ($configArray['System']['debug']) {
				echo '<pre>';
				echo 'DEBUG: ' . $e->getMessage();
				echo '</pre>';
			}
		}
		$result = $catalog->updatePatronInfo($user->cat_password);
		return "OK";
	}
	function getToUpdatePreferredBranches(){
		require_once 'Drivers/marmot_inc/Location.php';
		global $configArray;
		global $interface;
		global $user;
		
		if (!UserAccount::isLoggedIn()) {
			require_once 'Login.php';
			Login::launch();
			exit();
		}
		$interface->assign('page_body_style', 'sidebar_left');
		$interface->assign('ils', $configArray['Catalog']['ils']);
		//$interface->assign('userNoticeFile', 'MyResearch/listNotice.tpl');

		// Setup Search Engine Connection
		$class = $configArray['Index']['engine'];
		$this->db = new $class($configArray['Index']['url']);
		if ($configArray['System']['debugSolr']) {
			$this->db->debug = true;
		}

		// Connect to Database
		$this->catalog = new CatalogConnection($configArray['Catalog']['driver']);

		// Register Library Catalog Account
		if (isset($_POST['submit']) && !empty($_POST['submit'])) {
			if ($this->catalog && isset($_POST['cat_username']) && isset($_POST['cat_password'])) {
				$result = $this->catalog->patronLogin($_POST['cat_username'], $_POST['cat_password']);
				if ($result && !PEAR::isError($result)) {
					$user->cat_username = $_POST['cat_username'];
					$user->cat_password = $_POST['cat_password'];
					$user->update();
					UserAccount::updateSession($user);
					$interface->assign('user', $user);
				} else {
					$interface->assign('loginError', 'Invalid Patron Login');
				}
			}
		}
		if ($user !== false){
			$interface->assign('user', $user);
			// Get My Profile
			if ($this->catalog->status) {
				if ($user->cat_username) {
					$patron = $this->catalog->patronLogin($user->cat_username, $user->cat_password);
					if (PEAR::isError($patron)){
						PEAR::raiseError($patron);
					}
					$profile = $this->catalog->getMyProfile($patron);
					//$logger = new Logger();
					//$logger->log("Patron profile phone number in MyResearch = " . $profile['phone'], PEAR_LOG_INFO);
					if (!PEAR::isError($profile)) {
						$interface->assign('profile', $profile);
					}
				}
			}
			//Figure out if we should show a link to classic opac to pay holds.
			$ecommerceLink = $configArray['Site']['ecommerceLink'];
			$homeLibrary = Library::getLibraryForLocation($user->homeLocationId);
			if (strlen($ecommerceLink) > 0 && isset($homeLibrary) && $homeLibrary->showEcommerceLink == 1){
				$interface->assign('showEcommerceLink', true);
				$interface->assign('minimumFineAmount', $homeLibrary->minimumFineAmount);
				$interface->assign('ecommerceLink', $ecommerceLink);
			}else{
				$interface->assign('showEcommerceLink', false);
				$interface->assign('minimumFineAmount', 0);
			}
		}
		//echo isset($catalog);
		$interface->assign('edit', true);
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
		asort($locationList);
		$interface->assign('locationList', $locationList);
		/*if ($this->catalog->checkFunction('isUserStaff')){
			$userIsStaff = $this->catalog->isUserStaff();
			$interface->assign('userIsStaff', $userIsStaff);
		}else{
			$interface->assign('userIsStaff', false);
		}*/
		foreach($user as $key=>$value){
			//echo $key.'=>'.$value.'</br>';
			if($key == 'cat_username')
			{
				$interface->assign('card_number',$value);
			}
		}
		$return = $interface->fetch("MyResearch/updatePreferredBranches.tpl");
		echo $return;
	}
	function GetPreferredBranches()
	{
		require_once 'Drivers/marmot_inc/Location.php';
		global $configArray;
		global $user;

		try {
			$catalog = new CatalogConnection($configArray['Catalog']['driver']);
		} catch (PDOException $e) {
			// What should we do with this error?
			if ($configArray['System']['debug']) {
				echo '<pre>';
				echo 'DEBUG: ' . $e->getMessage();
				echo '</pre>';
			}
		}

		$username = $_REQUEST['username'];
		$password = $_REQUEST['barcode'];

		//Get the list of pickup branch locations for display in the user interface.
		$patron = $catalog->patronLogin($username, $password);
		if ($patron == null){
			$output = "<result>\n" .
                      "  <PickupLocations>\n";
			$output .= "  </PickupLocations>\n" .
                       '</result>';
		}else{

			$output = "<result>\n" .
                      "  <PickupLocations>\n";

			$patronProfile = $catalog->getMyProfile($patron);

			$location = new Location();
			$locationList = $location->getPickupBranchesPreferLocationFirst($patronProfile, $patronProfile['homeLocationId']);

			foreach ($locationList as $location){
				$output .= "<Location id='{$location->code}' selected='{$location->selected}'>$location->displayName</Location>";
			}

			$output .= "  </PickupLocations>\n";
			//Also determine if the hold can be cancelled.
			global $librarySingleton;
			$patronHomeBranch = $librarySingleton->getPatronHomeLibrary();
			$showHoldCancelDate = 0;
			if ($patronHomeBranch != null){
				$showHoldCancelDate = $patronHomeBranch->showHoldCancelDate;
			}
			$output .= "  <AllowHoldCancellation>{$showHoldCancelDate}</AllowHoldCancellation>\n";
			$output .= '</result>';
			
		}
		return $output;
	}

	function GetSuggestions(){
		global $interface;
		global $library;

		//Make sure to initialize solr
		$searchObject = SearchObjectFactory::initSearchObject();
		$searchObject->init();

		//Get suggestions for the user
		$suggestions = Suggestions::getSuggestions();
		$interface->assign('suggestions', $suggestions);
		if (isset($library)){
			$interface->assign('showRatings', $library->showRatings);
		}else{
			$interface->assign('showRatings', 1);
		}

		//return suggestions as json for display in the title scroller
		$titles = array();
		foreach ($suggestions as $suggestion){
			$titles[] = array(
	          	'id' => $suggestion['titleInfo']['id'],
	    		'image' => $configArray['Site']['coverUrl'] . "/bookcover.php?id=". $suggestion['titleInfo']['id'] . "&isn=" . $suggestion['titleInfo']['isbn10'] . "&size=medium&upc=" . $suggestion['titleInfo']['upc'] . "&category=" . $suggestion['titleInfo']['format_category'][0],
	    		'title' => $suggestion['titleInfo']['title'],
	    		'author' => $suggestion['titleInfo']['author'],
	        	'basedOn' => $suggestion['basedOn']
			);
		}

		foreach ($titles as $key => $rawData){
			$formattedTitle = "<div id=\"scrollerTitleSuggestion{$key}\" class=\"scrollerTitle\">" .
    			'<a href="' . $configArray['Site']['path'] . "/Record/" . $rawData['id'] . '" id="descriptionTrigger' . $rawData['id'] . '">' . 
    			"<img src=\"{$rawData['image']}\" class=\"scrollerTitleCover\" alt=\"{$rawData['title']} Cover\"/>" . 
    			"</a></div>" . 
    			"<div id='descriptionPlaceholder{$rawData['id']}' style='display:none'></div>";
			$rawData['formattedTitle'] = $formattedTitle;
			$titles[$key] = $rawData;
		}
		 
		$return = array('titles' => $titles, 'currentIndex' => 0);
		return json_encode($return);
		//return $interface->fetch('MyResearch/ajax-suggestionsList.tpl');
	}

	function GetListTitles(){
		require_once('RecordDrivers/MarcRecord.php');
		global $interface;
		global $configArray;
		global $library;

		//Make sure to initialize solr
		$searchObject = SearchObjectFactory::initSearchObject();
		$searchObject->init();

		// Setup Search Engine Connection
		$class = $configArray['Index']['engine'];
		$url = $configArray['Index']['url'];
		$db = new $class($url);
		if ($configArray['System']['debugSolr']) {
			$db->debug = true;
		}

		$listId = $_REQUEST['listId'];

		//Get the actual titles for the list
		$list = User_list::staticGet('id', $listId);
		$listTitles = $list->getResources();

		$titles = array();
		foreach ($listTitles as $title){
			if ($title->source == 'VuFind'){
				$upc = $title->upc;
				$formatCategory = $title->format_category;
			
				$titles[] = array(
		    		'id' => $title->record_id,
		    		'image' => $configArray['Site']['coverUrl'] . "/bookcover.php?id=" . $title->record_id . "&isn=" . $title->isbn . "&size=small&upc=" . $upc . "&category=" . $formatCategory,
		    		'title' => $title->title,
		    		'author' => $title->author,
				    'source' => 'VuFind',
				    'link' => $configArray['Site']['path'] . "/Record/" . $title->record_id,
				);
			}else{
				require_once('sys/eContent/EContentRecord.php');
				$record = new EContentRecord();
				$record->id = $title->record_id;
				if ($record->find(true)){
					$titles[] = array(
						'id' => $record->id,
						'image' => $configArray['Site']['coverUrl'] . "/bookcover.php?id=" . $record->id . "&isn=" . $record->getIsbn() . "&size=small&upc=" . $record->upc . "&category=EMedia",
						'title' => $record->title,
						'author' => $record->author,
						'source' => 'eContent',
						'link' => $configArray['Site']['path'] . "/EcontentRecord/" . $record->id,
					);
				}
			}
		}

		foreach ($titles as $key => $rawData){
			$formattedTitle = "<div id=\"scrollerTitleList{$listId}{$key}\" class=\"scrollerTitle\">" .
    			'<a href="' . $rawData['link'] . '" id="descriptionTrigger' . $rawData['id'] . '">' . 
    			"<img src=\"{$rawData['image']}\" class=\"scrollerTitleCover\" alt=\"{$rawData['title']} Cover\"/>" . 
    			"</a></div>" . 
    			"<div id='descriptionPlaceholder{$rawData['id']}' style='display:none'></div>";
			$rawData['formattedTitle'] = $formattedTitle;
			$titles[$key] = $rawData;
		}
		 
		$return = array('titles' => $titles, 'currentIndex' => 0);
		return json_encode($return);
	}
	
	function getOverDriveSummary(){
		global $user;
		if ($user){
			require_once 'Drivers/OverDriveDriver.php';
			$overDriveDriver = new OverDriveDriver();
			$summary = $overDriveDriver->getOverDriveSummary($user);
			return json_encode($summary); 
		}else{
			return array('error' => 'There is no user currently logged in.');
		}
	}
	function getAllItems(){
		global $interface;
		global $configArray;
		global $user;
		$catalog = new CatalogConnection($configArray['Catalog']['driver']);
		if ($user !== false){
			$interface->assign('user', $user);
			// Get My Profile
			if ($catalog->status) {
				if ($user->cat_username) {
					$patron = $catalog->patronLogin($user->cat_username, $user->cat_password);
					if (PEAR::isError($patron)){
						PEAR::raiseError($patron);
					}
					$profile = $catalog->getMyProfile($patron);
					//$logger = new Logger();
					//$logger->log("Patron profile phone number in MyResearch = " . $profile['phone'], PEAR_LOG_INFO);
					if (!PEAR::isError($profile)) {
						$interface->assign('profile', $profile);
					}
				}
			}
			$sum;
			$sumOfCheckoutItems = $profile["numEContentCheckedOut"] + $profile["numCheckedOut"];
			$sumOfRequestItems = $profile["numHoldsAvailable"]+$profile["numHoldsRequested"]+$profile["numEContentUnavailableHolds"]+$profile["numEContentWishList"];
			require_once 'Drivers/OverDriveDriver.php';
			$overDriveDriver = new OverDriveDriver();
			$summary = $overDriveDriver->getOverDriveSummary($user);
			$sumOfCheckoutItems += $summary["numCheckedOut"];
			//$sumOfRequestItems = $sumOfRequestItems + $summary["numEContentWishList"] + $summary["numUnavailableHolds"];
			$sumOfRequestItems += $summary["numAvailableHolds"] + $summary["numUnavailableHolds"];
			$sum["SumOfCheckoutItems"] = $sumOfCheckoutItems;
			$sum["SumOfRequestItems"] = $sumOfRequestItems;
			return json_encode($sum);
		}else{
			return array('error' => 'There is no user currently logged in.');
		}

		
	}
	
	function LoginForm(){
		global $interface;
		return $interface->fetch('MyResearch/ajax-login.tpl');
	}
	
	function getBulkAddToListForm(){
		global $interface;
		// Display Page
		$interface->assign('listId', strip_tags($_REQUEST['listId']));
		$interface->assign('popupTitle', 'Add titles to list');
		$pageContent = $interface->fetch('MyResearch/bulkAddToListPopup.tpl');
		$interface->assign('popupContent', $pageContent);
		echo $interface->fetch('popup-wrapper.tpl');
	}
	
	function getPinUpdateForm(){
		global $user; 
		global $interface;
		$interface->assign('popupTitle', 'Modify PIN number');
		$pageContent = $interface->fetch('MyResearch/modifyPinPopup.tpl');
		$interface->assign('popupContent', $pageContent);
		return $interface->fetch('popup-wrapper.tpl');
	}
	function getLocations(){
		global $interface;
		global $configArray;
		global $user;
		$catalog = new CatalogConnection($configArray['Catalog']['driver']);
		if ($user !== false){
			$interface->assign('user', $user);
			// Get My Profile
			if ($catalog->status) {
				if ($user->cat_username) {
					$patron = $catalog->patronLogin($user->cat_username, $user->cat_password);
					if (PEAR::isError($patron)){
						PEAR::raiseError($patron);
					}
					$profile = $catalog->getMyProfile($patron);
					//$logger = new Logger();
					//$logger->log("Patron profile phone number in MyResearch = " . $profile['phone'], PEAR_LOG_INFO);
					if (!PEAR::isError($profile)) {
						$interface->assign('profile', $profile);
					}
				}
			}
			
			global $librarySingleton;
			$activeLibrary = $librarySingleton->getActiveLibrary();
			if ($activeLibrary == null || $activeLibrary->allowProfileUpdates){
				$interface->assign('canUpdate', true);
			}else{
				$interface->assign('canUpdate', false);
			}
	
			//Get the list of locations for display in the user interface.
			
			global $locationSingleton;
			$locationSingleton->whereAdd("validHoldPickupBranch = 1");
			$locationSingleton->find();
	
			$locationList = array();
			
			while ($locationSingleton->fetch()) {
				$locationList[$locationSingleton->locationId] = $locationSingleton->displayName;
			}
			$interface->assign('locationList', $locationList);
			$interface->assign('home', $locationSingleton->getUserHomeLocation());
			$returnwords  ="";
			return $interface->fetch('MyResearch/ajax-location.tpl');
			
		}
		else{
			return "";
		}

	}
}