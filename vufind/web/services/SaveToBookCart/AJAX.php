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
require_once 'sys/Proxy_Request.php';
require_once 'services/MyResearch/lib/User.php';
require_once 'services/MyResearch/lib/User_list.php';
require_once 'services/MyResearch/lib/Search.php';
require_once 'Drivers/marmot_inc/Prospector.php';
require_once 'services/List/lib/GetList.php';
require_once 'sys/SolrStats.php';
require_once 'sys/Pager.php';
require_once 'Action.php';
require_once 'services/MyResearch/MyResearch.php';
require_once 'services/MyResearch/lib/Suggestions.php';
require_once 'services/MyResearch/lib/FavoriteHandler.php';
require_once 'services/MyResearch/lib/User_list_solr.php';
require_once 'services/MyResearch/lib/Resource.php';
require_once 'services/MyResearch/lib/User_resource.php';
require_once 'services/MyResearch/lib/Resource_tags.php';

global $configArray;
global $user;

class AJAX extends Action {
	
	public $bookCartID;

	function AJAX() {
	}

	function launch() {
		global $timer;
		global $user;
		
		$method = $_GET['method'];
		$timer->logTime("Starting method $method");
		if (in_array($method, array('SaveRecord', 'SaveTag', 'GetTags','AddBookCartList'))){
			header('Content-type: text/plain');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			echo $this->$method();
		}else if (in_array($method, array('GetAddTagForm'))){
			header('Content-type: text/html');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			echo $this->$method();
		}
		if($_GET['hello'] == 'OK'){
			$this->AddBookCartList();
		}
	}

	// Saves a Record to User's List
	function SaveRecord()
	{
		require_once 'services/Resource/Save.php';
		require_once 'services/MyResearch/lib/User_list.php';

		$result = array();
		if (UserAccount::isLoggedIn()) {
			$saveService = new Save();
			$result = $saveService->saveRecord();
			if (!PEAR::isError($result)) {
				$result['result'] = "Done";
			} else {
				$result['result'] = "Error";
			}
		} else {
			$result['result'] = "Unauthorized";
		}
		return json_encode($result);
	}

	function GetAddTagForm(){
		$user = UserAccount::isLoggedIn();
		global $interface;
		if ($user === false) {
			//Shouldn't get here since we check that the user is logged in before calling this. 
			return $interface->fetch('MyResearch/ajax-login.tpl');
		}else{
			$interface->assign('id', $_REQUEST['id']);
			$interface->assign('source', $_REQUEST['source']);
			$interface->assign('title', translate("Add a Tag"));
			return $interface->fetch('Resource/addtag.tpl');
		}
	}
	
	function SaveTag()
	{
		$user = UserAccount::isLoggedIn();
		if ($user === false) {
			return json_encode(array('result' => 'Unauthorized'));
		}

		// Create a resource entry for the current ID if necessary (or find the
		// existing one):
		$resource = new Resource();
		$resource->record_id = $_GET['id'];
		$resource->source = $_REQUEST['source'];
		if (!$resource->find(true)) {
			$resource->insert();
		}

		// Parse apart the tags and save them in association with the resource:
		preg_match_all('/"[^"]*"|[^,]+/', $_REQUEST['tag'], $words);
		foreach ($words[0] as $tag) {
			$tag = trim(strtolower(str_replace('"', '', $tag)));
			$resource->addTag($tag, $user);
		}

		return json_encode(array('result' => 'Done'));
	}
	
	function GetTags() {
		require_once 'services/MyResearch/lib/Resource.php';

		$resource = new Resource();
		$resource->record_id = $_GET['id'];
		$resource->source = $_GET['source'];
		$tags = array();
		if ($resource->find(true)) {
			$tagList = $resource->getTags();
			foreach ($tagList as $tag) {
				$tags[] = array('count' => $tag->cnt, 'tag' => $tag->tag);
			}
			$return = array('tags' => $tags);
		}else{
			$return .= array('error' => "Could not find record");
		}

		
		return json_encode(array('result' => $return));
	}
	
	function AddBookCartList(){
		global $user;
		$raw_wishLists= $user->getLists();
		$wishLists;
		$myFavoritesID;
		$n = 0;
		//echo(count($raw_wishLists));
		
		$isBookCart = false;
		foreach ($raw_wishLists as $hello){
			foreach($hello as $key =>$hellohello){
				//echo($key.'		=>'.$hellohello);
				//echo '</br>';
				if($key == 'id'){
					$wishLists[$n]['id'] = $hellohello;
				}
				if($key == 'title'){
					$wishLists[$n]['title'] = $hellohello;
				}				
			}
			if($wishLists[$n]['title'] == 'My Favorites'){
				$myFavoritesID = $wishLists[$n]['id'];
			}
			if($wishLists[$n]['title'] == 'Book Cart'){
				$bookCartID = $wishLists[$n]['id'];
				$isBookCart = true;
			}
			$n++;
		}
		
		if($isBookCart){
			$_GET['list'] = $bookCartID;
			$this->SaveRecord();
		}else{
			$_REQUEST['title'] = 'Book Cart';
			$_REQUEST['desc'] = '';
			$_REQUEST['public'] = '';
			require_once 'services/MyResearch/ListEdit.php';
			$return = array();
			if (UserAccount::isLoggedIn()) {
				$listService = new ListEdit();
				$result = $listService->addList();
				$_GET['list'] = $result;
				$this->SaveRecord();
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
			
			
		}
		
		
	}
	
}