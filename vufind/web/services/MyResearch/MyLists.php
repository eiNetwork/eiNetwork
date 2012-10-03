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
require_once 'services/MyResearch/lib/FavoriteHandler.php';


/**
 * This class does not use MyResearch base class (we don't need to connect to
 * the catalog, and we need to bypass the "redirect if not logged in" logic to
 * allow public lists to work properly).
 * @version  $Revision$
 */
class MyLists extends Action
{
	private $db;
	var $catalog;

	function launch()
	{
		global $configArray;
		global $interface;
		global $user;
		global $logger;

		//Get all lists for the user
		$tmpList = new User_list();
		$tmpList->user_id = $user->id;
		$tmpList->orderBy("title ASC");
		$tmpList->find();
		$allLists = array();
		if ($tmpList->N > 0){
			while ($tmpList->fetch()){
				$allLists[$tmpList->id] = $tmpList->title;
			}
		}else{
			$allLists[-1] = "My Favorites";
		}
		$interface->assign('allLists', $allLists);

		// Fetch List object
		if (isset($_GET['id'])){
			$list = User_list::staticGet($_GET['id']);
		}else{
			//Use the first list.
			$firstListId = reset(array_keys($allLists));
			$logger->log("No list set, first list is $firstListId", PEAR_LOG_INFO);
			if (!isset($firstListId) || $firstListId == -1){
				$list = new User_list();
				$list->user_id = $user->id;
				$list->public = false;
				$list->title = "My Favorites";
			}else{
				$list = User_list::staticGet($firstListId);
			}
		}

		// Ensure user have privs to view the list
		if (!$list->public && !UserAccount::isLoggedIn()) {
			require_once 'Login.php';
			Login::launch();
			exit();
		}
		if (!$list->public && $list->user_id != $user->id) {
			PEAR::raiseError(new PEAR_Error(translate('list_access_denied')));
		}

		//Perform an action on the list, but verify that the user has permission to do so.
		if ($user != false && $user->id == $list->user_id && (isset($_REQUEST['myListActionHead']) || isset($_REQUEST['myListActionItem']) || isset($_GET['delete']))){
			if (isset($_REQUEST['myListActionHead']) && strlen($_REQUEST['myListActionHead']) > 0){
				$actionToPerform = $_REQUEST['myListActionHead'];
				if ($actionToPerform == 'makePublic'){
					$list->public = 1;
					$list->update();
				}elseif ($actionToPerform == 'makePrivate'){
					$list->public = 0;
					$list->updateDetailed(false);
					$list->removeFromSolr();
				}elseif ($actionToPerform == 'saveList'){
					$list->title = $_REQUEST['newTitle'];
					$list->description = $_REQUEST['newDescription'];
					$list->update();
				}elseif ($actionToPerform == 'deleteList'){
					$list->delete();
					header("Location: {$configArray['Site']['url']}/MyResearch/Home");
					die();
				}
			}elseif (isset($_REQUEST['myListActionItem']) && strlen($_REQUEST['myListActionItem']) > 0){
				$actionToPerform = $_REQUEST['myListActionItem'];

				if ($actionToPerform == 'deleteMarked'){
					//get a list of all titles that were selected
					$itemsToRemove = $_REQUEST['selected'];
					foreach ($itemsToRemove as $id => $selected){
						//add back the leading . to get the full bib record
						$resource = Resource::staticGet('record_id', "$id");
						$list->removeResource($resource);
					}
				}elseif ($actionToPerform == 'deleteAll'){
					$list->removeAllResources(isset($_GET['tag']) ? $_GET['tag'] : null);
				}
				$list->update();
			}elseif (isset($_GET['delete'])) {
				$resource = Resource::staticGet('record_id', $_GET['delete']);
				$list->removeResource($resource);
				$list->update();
			}

			//Redirect back to avoid having the parameters stay in the URL.
			header("Location: {$configArray['Site']['url']}/MyResearch/MyList/{$list->id}");
			die();

		}

		// Send list to template so title/description can be displayed:
		$interface->assign('favList', $list);

		// Build Favorites List
		$favorites = $list->getResources(isset($_GET['tag']) ? $_GET['tag'] : null);

		// Load the User object for the owner of the list (if necessary):
		if ($user && $user->id == $list->user_id) {
			$listUser = $user;
		} else if ($list->user_id != 0){
			$listUser = User::staticGet($list->user_id);
		}else{
			$listUser = false;
		}

		// Create a handler for displaying favorites and use it to assign
		// appropriate template variables:
		$allowEdit = ($user != false && $user->id == $list->user_id);
		$interface->assign('allowEdit', $allowEdit);
		$favList = new FavoriteHandler($favorites, $listUser, $list->id, $allowEdit);
		$favList->assign();

		//Need to add profile information from MyResearch to show profile data.
		if ($user !== false){
			global $configArray;
			$this->catalog = new CatalogConnection($configArray['Catalog']['driver']);
			// Get My Profile
			if ($this->catalog->status) {
				if ($user->cat_username) {
					$patron = $this->catalog->patronLogin($user->cat_username, $user->cat_password);
					if (PEAR::isError($patron)){
						PEAR::raiseError($patron);
					}

					$result = $this->catalog->getMyProfile($patron);
					if (!PEAR::isError($result)) {
						$interface->assign('profile', $result);
					}
				}
			}

			//Figure out if we should show a link to classic opac to pay holds.
			$homeLibrary = Library::getLibraryForLocation($user->homeLocationId);
			if ($homeLibrary->showEcommerceLink == 1){
				$interface->assign('showEcommerceLink', true);
				$interface->assign('minimumFineAmount', $homeLibrary->minimumFineAmount);
			}else{
				$interface->assign('showEcommerceLink', false);
				$interface->assign('minimumFineAmount', 0);
			}
		}

		$interface->setTemplate('list.tpl');
		$interface->display('layout.tpl');
	}
}