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

require_once 'services/MyResearch/lib/Resource.php';
require_once 'services/MyResearch/lib/User.php';

class Save extends Action
{
	private $user;

	function __construct()
	{
		$this->user = UserAccount::isLoggedIn();
	}

	function launch()
	{
		global $interface;
		global $configArray;

		// Check if user is logged in
		if (!$this->user) {
			// Needed for "back to record" link in view-alt.tpl:
			$interface->assign('id', $_REQUEST['id']);
			// Needed for login followup:
			$interface->assign('recordId', $_REQUEST['id']);
			if (isset($_REQUEST['lightbox'])) {
				$interface->assign('title', translate('Save Record To List'));
				$interface->assign('message', 'You must be logged in first');
				$interface->assign('followup', true);
				$interface->assign('followupModule', 'Record');
				$interface->assign('followupAction', 'Save');
				return $interface->fetch('MyResearch/ajax-login.tpl');
			} else {
				$interface->assign('followup', true);
				$interface->assign('followupModule', 'Record');
				$interface->assign('followupAction', 'Save');
				$interface->setPageTitle('You must be logged in first');
				$interface->assign('subTemplate', '../MyResearch/login.tpl');
				$interface->setTemplate('view-alt.tpl');
				$interface->display('layout.tpl', 'RecordSave' . $_REQUEST['id']);
			}
			exit();
		}

		if (isset($_REQUEST['submit'])) {
			$this->saveRecord();
			if ($_REQUEST['source'] == 'VuFind'){
				header('Location: ' . $configArray['Site']['path'] . '/Record/' . urlencode($_REQUEST['id']));
			}else{
				header('Location: ' . $configArray['Site']['path'] . '/EcontentRecord/' . urlencode($_REQUEST['id']));
			}
			exit();
		}

		// Setup Search Engine Connection
		$class = $configArray['Index']['engine'];
		$db = new $class($configArray['Index']['url']);
		if ($configArray['System']['debugSolr']) {
			$db->debug = true;
		}

		// Get Record Information
		$resource = new Resource();
		$resource->record_id = $_REQUEST['id'];
		$resource->source = $_REQUEST['source'];
		$resource->find(true);
		$interface->assign('record', $resource);

		// Find out if the item is already part of any lists; save list info/IDs
		$saved = $this->user->getSavedData($_REQUEST['id'], $_REQUEST['source']);
		$containingLists = array();
		$containingListIds = array();
		foreach($saved as $current) {
			$containingLists[] = array('id' => $current->list_id,
                'title' => $current->list_title);
			$containingListIds[] = $current->list_id;
		}
		$interface->assign('containingLists', $containingLists);

		// Create a list of all the lists that do NOT already contain the item:
		$lists = $this->user->getLists();
		$nonContainingLists = array();
		foreach($lists as $current) {
			if (!in_array($current->id, $containingListIds)) {
				$nonContainingLists[] = array('id' => $current->id,
                    'title' => $current->title);
			}
		}
		$interface->assign('nonContainingLists', $nonContainingLists);

		// Display Page
		$interface->assign('id', $_REQUEST['id']);
		$interface->assign('source', $_REQUEST['source']);
		if (isset($_REQUEST['lightbox'])) {
			$interface->assign('title', translate('Save Record To List'));
			echo $interface->fetch('Resource/save.tpl');
		} else {
			$interface->setPageTitle('Add to favorites');
			$interface->assign('subTemplate', 'save.tpl');
			$interface->setTemplate('view-alt.tpl');
			$interface->display('layout.tpl', 'RecordSave' . $_REQUEST['id']);
		}
	}

	function saveRecord()
	{
		if ($this->user) {
			$list = new User_list();
			if ($_REQUEST['list'] != '') {
				$list->id = $_REQUEST['list'];
				if (!$list->find(true)){
					PEAR::raiseError(new PEAR_Error('Unable the selected list.'));
					return false;
				}
			} else {
				$list->user_id = $this->user->id;
				$list->title = "My Favorites";
				$list->insert();
			}

			$resource = new Resource();
			$resource->record_id = $_REQUEST['id'];
			$resource->source = $_REQUEST['source'];
			if (!$resource->find(true)) {
				PEAR::raiseError(new PEAR_Error('Unable find a resource for that title.'));
				return false;
			}

			//preg_match_all('/"[^"]*"|[^,]+/', $_REQUEST['mytags'], $tagArray);
			$this->user->addResource($resource, $list, null, null);
		} else {
			return false;
		}
	}

}