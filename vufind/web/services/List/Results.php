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
require_once 'services/MyResearch/lib/User_list.php';
require_once 'services/MyResearch/lib/Search.php';
require_once 'Drivers/marmot_inc/Prospector.php';
require_once 'lib/GetList.php';
require_once 'sys/SolrStats.php';
require_once 'sys/Pager.php';
require_once 'Action.php';
require_once 'services/Record/Record.php';
require_once 'services/MyResearch/MyResearch.php';
require_once 'services/MyResearch/lib/Suggestions.php';
require_once 'services/MyResearch/lib/FavoriteHandler.php';
require_once 'services/MyResearch/lib/User_list_solr.php';
require_once 'services/MyResearch/lib/Resource.php';
require_once 'services/MyResearch/lib/User_resource.php';
require_once 'services/MyResearch/lib/Resource_tags.php';

class Results extends Action {

	private $solrStats = false;
	private $query;

	function launch() {
		global $interface;
		global $configArray;
		global $timer;
		global $user;
		$searchSource = isset($_REQUEST['searchSource']) ? $_REQUEST['searchSource'] : 'local';
		// Include Search Engine Class
		require_once 'sys/' . $configArray['Index']['engine'] . '.php';
		$timer->logTime('Include search engine');

		//Check to see if the year has been set and if so, convert to a filter and resend.
		$dateFilters = array('publishDate');
		foreach ($dateFilters as $dateFilter){
			if (isset($_REQUEST[$dateFilter . 'yearfrom']) || isset($_REQUEST[$dateFilter . 'yearto'])){
				$queryParams = $_GET;
				$yearFrom = preg_match('/^\d{2,4}$/', $_REQUEST[$dateFilter . 'yearfrom']) ? $_REQUEST[$dateFilter . 'yearfrom'] : '*';
				$yearTo = preg_match('/^\d{2,4}$/', $_REQUEST[$dateFilter . 'yearto']) ? $_REQUEST[$dateFilter . 'yearto'] : '*';
				if (strlen($yearFrom) == 2){
					$yearFrom = '19' . $yearFrom;
				}else if (strlen($yearFrom) == 3){
					$yearFrom = '0' . $yearFrom;
				}
				if (strlen($yearTo) == 2){
					$yearTo = '19' . $yearTo;
				}else if (strlen($yearFrom) == 3){
					$yearTo = '0' . $yearTo;
				}
				if ($yearTo != '*' && $yearFrom != '*' && $yearTo < $yearFrom){
					$tmpYear = $yearTo;
					$yearTo = $yearFrom;
					$yearFrom = $tmpYear;
				}
				unset($queryParams['module']);
				unset($queryParams['action']);
				unset($queryParams[$dateFilter . 'yearfrom']);
				unset($queryParams[$dateFilter . 'yearto']);
				if (!isset($queryParams['sort'])){
					$queryParams['sort'] = 'year';
				}
				$queryParamStrings = array();
				foreach($queryParams as $paramName => $queryValue){
					if (is_array($queryValue)){
						foreach ($queryValue as $arrayValue){
							if (strlen($arrayValue) > 0){
								$queryParamStrings[] = $paramName . '[]=' . $arrayValue;
							}
						}
					}else{
						if (strlen($queryValue)){
							$queryParamStrings[] = $paramName . '=' . $queryValue;
						}
					}
				}
				if ($yearFrom != '*' || $yearTo != '*'){
					$queryParamStrings[] = "&filter[]=$dateFilter:[$yearFrom+TO+$yearTo]";
				}
				$queryParamString = join('&', $queryParamStrings);
				header("Location: {$configArray['Site']['path']}/Search/Results?$queryParamString");
				exit;
			}
		}
		
		$rangeFilters = array('lexile_score', 'accelerated_reader_reading_level', 'accelerated_reader_point_value');
		foreach ($rangeFilters as $filter){
			if (isset($_REQUEST[$filter . 'from']) || isset($_REQUEST[$filter . 'to'])){
				$queryParams = $_GET;
				$from = preg_match('/^\d*(\.\d*)?$/', $_REQUEST[$filter . 'from']) ? $_REQUEST[$filter . 'from'] : '*';
				$to = preg_match('/^\d*(\.\d*)?$/', $_REQUEST[$filter . 'to']) ? $_REQUEST[$filter . 'to'] : '*';
				
				if ($to != '*' && $from != '*' && $to < $from){
					$tmpFilter = $to;
					$to = $from;
					$from = $tmpFilter;
				}
				unset($queryParams['module']);
				unset($queryParams['action']);
				unset($queryParams[$filter . 'from']);
				unset($queryParams[$filter . 'to']);
				$queryParamStrings = array();
				foreach($queryParams as $paramName => $queryValue){
					if (is_array($queryValue)){
						foreach ($queryValue as $arrayValue){
							if (strlen($arrayValue) > 0){
								$queryParamStrings[] = $paramName . '[]=' . $arrayValue;
							}
						}
					}else{
						if (strlen($queryValue)){
							$queryParamStrings[] = $paramName . '=' . $queryValue;
						}
					}
				}
				if ($yearFrom != '*' || $yearTo != '*'){
					$queryParamStrings[] = "&filter[]=$filter:[$from+TO+$to]";
				}
				$queryParamString = join('&', $queryParamStrings);
				header("Location: {$configArray['Site']['path']}/Search/Results?$queryParamString");
				exit;
			}
		}

		//=======================Get wish list information======================
		$raw_wishLists= $user->getLists();
		$wishLists; //szheng: this is the variable for wish list id and title.
		$myFavoritesID;
		$n = 0;
		$bookCartID;
		foreach ($raw_wishLists as $hello){
			foreach($hello as $key =>$hellohello){
				if($key == 'id'){
					$wishLists[$n]['id'] = $hellohello;
				}
				if($key == 'title'){
					$wishLists[$n]['title'] = $hellohello;
					
				}				
			}
			if($wishLists[$n]['title'] == 'Book Cart'){
				$bookCartID = $wishLists[$n]['id'];
				$n--;	
			}
			if($wishLists[$n]['title'] == 'My Favorites'){
				$myFavoritesID = $wishLists[$n]['id'];
			}
			$n++;
		}
		if($bookCartID==null){
			$_REQUEST['title'] = 'Book Cart';
			$_REQUEST['desc'] = '';
			$_REQUEST['public'] = '';
			require_once 'services/MyResearch/ListEdit.php';
			$return = array();
			if (UserAccount::isLoggedIn()) {
				$listService = new ListEdit();
				$resultListId = $listService->addList();
				$goToListID = $resultListId;
				$raw_wishLists= $user->getLists();
				foreach ($raw_wishLists as $hello){
					foreach($hello as $key =>$hellohello){
						if($key == 'id'){
							$wishLists[$n]['id'] = $hellohello;
						}
						if($key == 'title'){
							$wishLists[$n]['title'] = $hellohello;
							
						}				
					}
					if($wishLists[$n]['title'] == 'Book Cart'){
						$bookCartID = $wishLists[$n]['id'];
						$n--;	
					}
					if($wishLists[$n]['title'] == 'My Favorites'){
						$myFavoritesID = $wishLists[$n]['id'];
					}
					$n++;
				}
				if (!PEAR::isError($resultListId)) {
				} else {
					$error = $result->getMessage();
					if (empty($error)) {
						$error = 'Error';
					}
				}
				} else {
			}
		}
		if(count($raw_wishLists)==1){
			$interface->assign('onlyBookCart',true);
		}
		if($myFavoritesID ==null && count($wishLists)>0){
			$myFavoritesID = $wishLists[0]['id'];
		}
		$goToListID;
		if(isset($_REQUEST['goToListID'])){
			$goToListID = $_REQUEST['goToListID'];
			if($goToListID == "BookCart"){
				$goToListID = $bookCartID;
			}
			$interface->assign('currentListID',$_REQUEST['goToListID']);
		}else{
			$goToListID = $myFavoritesID;
			$interface->assign('currentListID',$myFavoritesID);
		}
		$interface->assign('wishListID',$goToListID);
		$interface->assign('wishList',$wishLists);

		$list = User_list::staticGet($goToListID);
		$favorites = $list->getResources(isset($_GET['tag']) ? $_GET['tag'] : null);
		$n = 0;
		$favId;
		foreach($favorites as $aa){
			foreach($aa as $key => $bb){
				if($key =='record_id'){
					$favId[$n] = $bb;
					$n++;
				}
			}
		}
		$requestIds;
		$n = 0;
		if(count($favId)>0){
			$_REQUEST['lookfor'] = 'id:'.$favId[0];
			$requestIds[$n] = $favId[0];
			$n++;
		}
		foreach($favId as $a){
			$_REQUEST['lookfor'] = $_REQUEST['lookfor'].' OR id:'.$a;
			$requestIds[$n] = $a;
			$n++;
		}
		if($favId==null){
			$_REQUEST['lookfor'] = '#$%^&*';
		}
		//=================szheng: retrieve the information of the pick up location.=====================
		require_once 'CatalogConnection.php';
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
		// Check How to Process Hold
		if (method_exists($this->catalog->driver, 'placeHold')) {
			$this->placeHolds($requestIds);
		} else {
			PEAR::raiseError(new PEAR_Error('Cannot Process Place Hold - ILS Not Supported'));
		}
		//===============================================================================================
		//=================================================================================================================
		
		$searchObject = SearchObjectFactory::initSearchObject();
		$searchObject->init($searchSource);
		$timer->logTime("Init Search Object");
		// Build RSS Feed for Results (if requested)
		if ($searchObject->getView() == 'rss') {
			// Throw the XML to screen
			echo $searchObject->buildRSS();
			// And we're done
			exit();
		}else if ($searchObject->getView() == 'excel'){
			// Throw the Excel spreadsheet to screen for download
			echo $searchObject->buildExcel();
			// And we're done
			exit();
		}
		// TODO : Investigate this... do we still need
		// If user wants to print record show directly print-dialog box
		if (isset($_GET['print'])) {
			$interface->assign('print', true);
		}
		
		// Set Interface Variables
		//   Those we can construct BEFORE the search is executed
		$interface->setPageTitle('Search Results');
		if($_REQUEST['goToListID'] == 'BookCart')
		{
			$interface->assign('pageType','BookCart');
		}else{
			$interface->assign('pageType','WishList');
		}
		$temptemp =  $searchObject->getSortList();
		foreach($temptemp as $key =>$value){
			foreach($value as $keykey => $valuevalue){
				if($_REQUEST['goToListID']=='BookCart'){
					$temptemp[$key][$keykey]= str_replace("/Search/Results?","/List/Results?goToListID=BookCart&",$valuevalue);
				}else{
					$temptemp[$key][$keykey]= str_replace("/Search/Results?","/List/Results/goToListID="+$goToListID+"&",$valuevalue);
				}
			}
		}
		$interface->assign('sortList',   $temptemp);
		$interface->assign('rssLink',    $searchObject->getRSSUrl());
		$interface->assign('excelLink',  $searchObject->getExcelUrl());
		
		$timer->logTime('Setup Search');
		// Process Search
		$result = $searchObject->processSearch(true, true);
		if (PEAR::isError($result)) {
			PEAR::raiseError($result->getMessage());
		}
		$timer->logTime('Process Search');

		// Some more variables
		//   Those we can construct AFTER the search is executed, but we need
		//   no matter whether there were any results
		$interface->assign('qtime',               round($searchObject->getQuerySpeed(), 2));
		$interface->assign('spellingSuggestions', $searchObject->getSpellingSuggestions());
		$interface->assign('lookfor',             $searchObject->displayQuery());
		$interface->assign('searchType',          $searchObject->getSearchType());
		// Will assign null for an advanced search
		$interface->assign('searchIndex',         $searchObject->getSearchIndex());
		
		// We'll need recommendations no matter how many results we found:
		$interface->assign('topRecommendations',
		$searchObject->getRecommendationsTemplates('top'));
		$interface->assign('sideRecommendations',
		$searchObject->getRecommendationsTemplates('side'));
		// 'Finish' the search... complete timers and log search history.
		$searchObject->close();
		$interface->assign('time', round($searchObject->getTotalSpeed(), 2));
		// Show the save/unsave code on screen
		// The ID won't exist until after the search has been put in the search history
		//    so this needs to occur after the close() on the searchObject
		$interface->assign('showSaved',   true);
		$interface->assign('savedSearch', $searchObject->isSavedSearch());
		$interface->assign('searchId',    $searchObject->getSearchId());
		$currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
		$interface->assign('page', $currentPage);

		//Enable and disable functionality based on library settings
		//This must be done before we process each result
		global $library;
		global $locationSingleton;
		$location = $locationSingleton->getActiveLocation();
		if (isset($library) && $location != null){
			$interface->assign('showFavorites', $library->showFavorites);
			$interface->assign('showHoldButton', (($location->showHoldButton == 1) && ($library->showHoldButton == 1)) ? 1 : 0);
		}else if ($location != null){
			$interface->assign('showFavorites', 1);
			$interface->assign('showHoldButton', $location->showHoldButton);
		}else if (isset($library)){
			$interface->assign('showFavorites', $library->showFavorites);
			$interface->assign('showHoldButton', $library->showHoldButton);
		}else{
			$interface->assign('showFavorites', 1);
			$interface->assign('showHoldButton', 1);
		}
		$interface->assign('page_body_style', 'sidebar_left');

		$enableProspectorIntegration = isset($configArray['Content']['Prospector']) ? $configArray['Content']['Prospector'] : false;
		$showRatings = 1;
		if (isset($library)){
			$enableProspectorIntegration = ($library->enablePospectorIntegration == 1);
			$showRatings = $library->showRatings;
		}
		$interface->assign('showRatings', $showRatings);

		$numProspectorTitlesToLoad = 0;
		if ($searchObject->getResultTotal() == 0) {
			
			//Var for the IDCLREADER TEMPLATE
			$interface->assign('ButtonBack',true);
			$interface->assign('ButtonHome',true);
			$interface->assign('MobileTitle','No Results Found');
			
			// No record found
			$interface->setTemplate('list.tpl');
			//$interface->setTemplate('list-none.tpl');
			$interface->assign('recordCount', 0);
			// Was the empty result set due to an error?
			$error = $searchObject->getIndexError();
			if ($error !== false) {
				// If it's a parse error or the user specified an invalid field, we
				// should display an appropriate message:
				if (stristr($error, 'org.apache.lucene.queryParser.ParseException') ||
				preg_match('/^undefined field/', $error)) {
					$interface->assign('parseError', true);

					// Unexpected error -- let's treat this as a fatal condition.
				} else {
					PEAR::raiseError(new PEAR_Error('Unable to process query<br />' .
                        'Solr Returned: ' . $error));
				}
			}

			$numProspectorTitlesToLoad = 10;
			$timer->logTime('no hits processing');
			///$interface->assign('sideRecommendations',$facet);

		} else if ($searchObject->getResultTotal() < 0){//szheng: I conceal the the situation the result number equal to 1
			//Redirect to the home page for the record
			$recordSet = $searchObject->getResultRecordSet();
			$record = reset($recordSet);
			if ($record['recordtype'] == 'list'){
				$listId = substr($record['id'], 4);
				header("Location: " . $interface->getUrl() . "/MyResearch/MyList/{$listId}");
			}elseif ($record['recordtype'] == 'econtentRecord'){
				$shortId = str_replace('econtentRecord', '', $record['id']);
				header("Location: " . $interface->getUrl() . "/EcontentRecord/$shortId/Home");
			}else{
				header("Location: " . $interface->getUrl() . "/Record/{$record['id']}/Home");
			}
			
		} else {
			$timer->logTime('save search');

			// If the "jumpto" parameter is set, jump to the specified result index:
			$this->processJumpto($result);

			// Assign interface variables
			$summary = $searchObject->getResultSummary();
			$interface->assign('recordCount', $summary['resultTotal']);
			$interface->assign('recordStart', $summary['startRecord']);
			$interface->assign('recordEnd',   $summary['endRecord']);
			$facetSet = $searchObject->getFacetList();
			$interface->assign('facetSet',       $facetSet);
			//Check to see if a format category is already set
			$categorySelected = false;
			if (isset($facetSet['top'])){
				foreach ($facetSet['top'] as $title=>$cluster){
					if ($cluster['label'] == 'Category'){
						foreach ($cluster['list'] as $thisFacet){
							if ($thisFacet['isApplied']){
								$categorySelected = true;
							}
						}
					}
				}
			}
			$interface->assign('categorySelected', $categorySelected);
			$timer->logTime('load selected category');

			// Big one - our results
			$recordSet = $searchObject->getResultRecordHTML();
			$interface->assign('recordSet', $recordSet);
			$timer->logTime('load result records');

			// Setup Display
			$interface->assign('sitepath', $configArray['Site']['path']);
			if(count($raw_wishLists)<=1&&$_REQUEST['goToListID']!="BookCart"){
				$interface->setTemplate('noList.tpl');
				
			}else{
				$interface->assign('subpage', 'Search/list-list.tpl');
				$interface->setTemplate('list.tpl');
			}

			
			//Var for the IDCLREADER TEMPLATE
			$interface->assign('ButtonBack',true);
			$interface->assign('ButtonHome',true);
			$interface->assign('MobileTitle','Search Results');


			// Process Paging
			$link = $searchObject->renderLinkPageTemplate();
			$options = array('totalItems' => $summary['resultTotal'],
                             'fileName'   => $link,
                             'perPage'    => $summary['perPage']);
			$pager = new VuFindPager($options);
			$tempPageLinks = $pager->getLinks();
			foreach($tempPageLinks as $key => $value){
				if($_REQUEST['goToListID']=='BookCart'){
					$tempPageLinks[$key]= str_replace("/Search/Results?","/List/Results?goToListID=BookCart&",$value);
				}else{
					$tempPageLinks[$key]= str_replace("/Search/Results?","/List/Results/goToListID="+$goToListID+"&",$value);
				}
				//echo $tempPageLinks[$key];
			}
			$interface->assign('pageLinks', $tempPageLinks);
			if ($pager->isLastPage()){
				$numProspectorTitlesToLoad = $summary['perPage'] - $pager->getNumRecordsOnPage();
				if ($numProspectorTitlesToLoad < 5){
					$numProspectorTitlesToLoad = 5;
				}
			}
			$timer->logTime('finish hits processing');
		}

		if ($numProspectorTitlesToLoad > 0 && $enableProspectorIntegration){
			$interface->assign('prospectorNumTitlesToLoad', $numProspectorTitlesToLoad);
			$interface->assign('prospectorSavedSearchId', $searchObject->getSearchId());
		}else{
			$interface->assign('prospectorNumTitlesToLoad', 0);
		}
		//Determine whether or not materials request functionality should be enabled
		$interface->assign('enableMaterialsRequest', MaterialsRequest::enableMaterialsRequest());

		if ($configArray['Statistics']['enabled'] && isset( $_GET['lookfor'])) {
			require_once('Drivers/marmot_inc/SearchStat.php');
			$searchStat = new SearchStat();
			$searchStat->saveSearch( strip_tags($_GET['lookfor']),  strip_tags(isset($_GET['type']) ? $_GET['type'] : $_GET['basicType']), $searchObject->getResultTotal());
		}
	
		// Save the ID of this search to the session so we can return to it easily:
		$_SESSION['lastSearchId'] = $searchObject->getSearchId();

		// Save the URL of this search to the session so we can return to it easily:
		$_SESSION['lastSearchURL'] = $searchObject->renderSearchUrl();
		
		//$rec = new Record();
		//echo $rec['isbn'];
		
		// Done, display the page
		$interface->display('layout.tpl');
	} // End launch()

	/**
	 * Process the "jumpto" parameter.
	 *
	 * @access  private
	 * @param   array       $result         Solr result returned by SearchObject
	 */
	
	function getLists() {
		require_once 'services/MyResearch/lib/User_list.php';
		
		$lists = array();

		$sql = "SELECT user_list.*, COUNT(user_resource.id) AS cnt FROM user_list " .
               "LEFT JOIN user_resource ON user_list.id = user_resource.list_id " .
               "WHERE user_list.user_id = '$this->id' " . 
               "GROUP BY user_list.id, user_list.user_id, user_list.title, " .
               "user_list.description, user_list.created, user_list.public " .
               "ORDER BY user_list.title";
		$list = new User_list();
		$list->query($sql);
		if ($list->N) {
			while ($list->fetch()) {
				$lists[] = clone($list);
			}
		}
		return $lists;
	}
	
	private function processJumpto($result)
	{
		if (isset($_REQUEST['jumpto']) && is_numeric($_REQUEST['jumpto'])) {
			$i = intval($_REQUEST['jumpto'] - 1);
			if (isset($result['response']['docs'][$i])) {
				$record = RecordDriverFactory::initRecordDriver($result['response']['docs'][$i]);
				$jumpUrl = '../Record/' . urlencode($record->getUniqueID());
				header('Location: ' . $jumpUrl);
				die();
			}
		}
	}
	
	private function placeHolds($requestIds){
		
		//$selectedIds = $_REQUEST['selected'];
		$selectedIds = $requestIds;
		//foreach($_REQUEST as $a){echo($a);echo("</br>");}
		global $interface;
		global $configArray;
		global $user;
		$eContentDriver = null;
		$showMessage = false;
		$holdings = array();
		//Check to see if all items are eContent
		$ids = array();
		$allItemsEContent = true;
		if(count($selectedIds)==0)
		{
			$allItemsEContent = false;
		}
		foreach ($selectedIds as $recordId){
			$ids[] = $recordId;
			if (strpos($recordId, 'econtentRecord') !== 0){
				$allItemsEContent = false;
			}
		}
		$interface->assign('ids', $ids);
		
		$hold_message_data = array(
			'successful' => 'all',
			'titles' => array()
		);

		if (isset($_REQUEST['autologout'])){
			$_SESSION['autologout'] = true;
		}
		//Check to see if we are ready to place the hold.
		$placeHold = false;
		if (isset($_REQUEST['holdType']) && isset($_REQUEST['campus'])){
			$placeHold = true;
			
		}else if ($user && $allItemsEContent){
			$placeHold = true;
		}
		if ($placeHold) {
			$hold_message_data['campus'] = $_REQUEST['campus'];
			
			//This is a new login
			if (isset($_REQUEST['username']) && isset($_REQUEST['password'])){
				$user = UserAccount::login();
			}
			if ($user == false) {
				$hold_message_data['error'] = 'Incorrect Patron Information';
				$showMessage = true;
			}else{
				$atLeast1Successful = false;
				
				foreach ($selectedIds as $recordId => $onOff){
					
					if (strpos($recordId, 'econtentRecord', 0) === 0){
						if ($eContentDriver == null){
							require_once('Drivers/EContentDriver.php');
							$eContentDriver = new EContentDriver();
						}
						$return = $eContentDriver->placeHold($recordId, $user);
					} else {
						$return = $this->catalog->placeHold($recordId, $user->password, '', $_REQUEST['holdType']);
					}
					$hold_message_data['titles'][] = $return;
					if (!$return['result']){
						$hold_message_data['successful'] = 'partial';
					}else{
						$atLeast1Successful = true;
					}
					//Check to see if there are item level holds that need follow-up by the user
					if (isset($return['items'])){
						$hold_message_data['showItemForm'] = true;
					}
					$showMessage = true;
				}
				if (!$atLeast1Successful){
					$hold_message_data['successful'] = 'none';
				}
			}
		} else {
			//Get the referrer so we can go back there.
			if (isset($_SERVER['HTTP_REFERER'])){
				$referer = $_SERVER['HTTP_REFERER'];
				$_SESSION['hold_referrer'] = $referer;
			}
			//Showing place hold form.
			if ($user){
				$profile = $this->catalog->getMyProfile($user);
				$interface->assign('profile', $profile);
				global $locationSingleton;
				//Get the list of pickup branch locations for display in the user interface.
				$locations = $locationSingleton->getPickupBranches($profile, $profile['homeLocationId']);
				$interface->assign('pickupLocations', $locations);
				//set focus to the submit button if the user is logged in since the campus will be correct most of the time.
				$interface->assign('focusElementId', 'submit');
			}else{
				//set focus to the username field by default.
				$interface->assign('focusElementId', 'username');
			}
		}

		$class = $configArray['Index']['engine'];
		$db = new $class($configArray['Index']['url']);

	}

}