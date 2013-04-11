<?php
require_once 'services/MyResearch/MyResearch.php';
require_once 'Structures/DataGrid.php';
class FinesBilling extends MyResearch{
	function launch(){
		global $interface;
		global $finesIndexEngine;
		$interface->setTemplate('finesBilling.tpl');
		$interface->setPageTitle('My Fines');
		$interface->display('layout.tpl');
	}
}
?>