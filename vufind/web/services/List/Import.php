<?php 
require_once 'Action.php';
require_once 'services/MyResearch/lib/User.php';
require_once 'services/MyResearch/lib/User_list.php';
require_once 'services/MyResearch/lib/Resource.php';

class Import extends Action {
	private $user;
	function launch() {
		global $interface;
		global $configArray;
		global $timer;
		global $user;
		require_once 'CatalogConnection.php';
		try {
			$this->catalog = new CatalogConnection($configArray['Catalog']['driver']);
		} catch (PDOException $e) {
			if ($configArray['System']['debug']) {
				echo '<pre>';
				echo 'DEBUG: ' . $e->getMessage();
				echo '</pre>';
			}
		}
		if(isset($_REQUEST['submit'])){
			$this->_consume();
			return;
		}		
		$wishLists = array();
		if (method_exists($this->catalog->driver, 'getWishLists')) {
			$wishLists = $this->catalog->getWishLists();
		} else {
			PEAR::raiseError(new PEAR_Error('Cannot Import WishLists - ILS Not Supported'));
		}
		$wishLists = $this->cleanUpWishLists($wishLists);
		$interface->assign('wishLists', $wishLists);
		$interface->setTemplate('import-grid.tpl');
		$interface->setPageTitle('Import Wishlists');
		$interface->display('layout.tpl');
	}
	private function _consume(){
		global $configArray;
		if(isset($_REQUEST['wishlists'])){
			$wishlists = $_REQUEST['wishlists'];
		}else{
			return;
		}
		foreach($wishlists as $id){
			$this->_saveList($id);
		}
		header('Location: ' . $configArray['Site']['path'] . '/List/Results');
	}

	private function _saveList($id){
		global $user;
		$wishLists = $this->cleanUpWishLists($this->catalog->getWishLists());
		foreach($wishLists as $list){
			if($list["id"] == $id){
				$_REQUEST['title'] = $list['title'];
				$_REQUEST['public'] = false;
				$_REQUEST['desc'] = $list['description'];
			}
		}
		require_once 'services/MyResearch/ListEdit.php';
		$listService = new ListEdit();
		$result = $listService->addList();

		if (!PEAR::isError($result)) {
			$items = $this->catalog->getImportList($id);
			$_REQUEST['list'] = $result;
			foreach($items as $item){
				$item = $this->cleanUpItem(array_pop($item));
				if(isset($item['id'])){
					$list = new User_list();
					$list->id = $result;
					if (!$list->find(true)){
						PEAR::raiseError(new PEAR_Error('List Error'));
						return false;
					}
					if($item['econtent']){
						require_once 'sys/eContent/EContentRecord.php';
							$eContentRecord = new EContentRecord();
							$eContentRecord->ilsId = $item['id'];
							if ($eContentRecord->find(true)){
								$item['id'] = $eContentRecord->id;
							}
					}
					$resource = new Resource();
					$resource->record_id = $item['id'];
					$resource->source =$item['econtent']?"eContent":"VuFind";
					if (!$resource->find(true)) {
						PEAR::raiseError(new PEAR_Error("{$item['id']}Unable find a resource for that title."));
						return false;
					}
					$user->addResource($resource, $list, null, null);
				}
			}
		} else {
			$error = $result->getMessage();
			if (empty($error)) {
				$error = 'Error';
			}
		}
	}
	private function cleanUpWishLists($wishLists){
		if(empty($wishLists)){
			return $wishLists;
		}
		$href = $wishLists[0]['href'];
		$x = explode('listNum=', $href);
		$href = $x[0]."listNum=";
		foreach ($wishLists as $key=>$wishList){
			$x = explode('listNum=', $wishList['href']);
			unset($wishList['href']);
			$wishList['id'] = $x[1];
			if(count($wishList) == 5){
				$wishList['date'] = $wishList[2];
				$wishList['description'] = $wishList[1];
				unset($wishList[2]);
			}else{
				$wishList['date'] = $wishList[1];
				$wishList['description'] = "";
			}
			unset($wishList[1]);
			unset($wishList[0]);
			$wishLists[$key] = $wishList;
		}
		return $wishLists;
	}
	private function cleanUpItem($item){
		$item = substr($item, 8,8);
		$return = array();
		$query = "select record_id, econtent from resource, marc_import  where shortId = '{$item}' and record_id = marc_import.id";
		$resource = new Resource();
		$resource->query($query);
		if ($resource->N) {
			while ($resource->fetch()) {
				$return["id"] = $resource->record_id;
				$return['econtent'] = $resource->econtent;
			}
		}
		return $return;
	}
}
?>