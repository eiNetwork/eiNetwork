<?php
require_once 'Record.php';
require_once 'File/MARC.php';
require_once 'sys/SolrStats.php';
require_once 'Reviews.php';
require_once 'UserComments.php';
require_once 'Cite.php';
require_once 'Holdings.php';
require_once('sys/EditorialReview.php');
require_once 'File/MARC.php';
require_once 'Home.php';
require_once 'Drivers/Horizon.php';
require_once 'CatalogConnection.php';

class AJAXGetCallNumber extends Record{
    
    
	function launch()
	{
		$method = $_REQUEST['method'];
		if (in_array($method, array('getCallNumber'))){
			header('Content-type: text/plain');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			$this->$method();
		}else{
			header('Content-type: text/xml');
			header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			echo '<?xml version="1.0" encoding="UTF-8"?' . ">\n";
			echo "<AJAXResponse>\n";
			if (is_callable(array($this, $method))) {
				$this->$method();
			} else {
				echo '<Error>Invalid Method</Error>';
			}
			echo '</AJAXResponse>';
		}
	}

	function IsLoggedIn()
	{
		require_once 'services/MyResearch/lib/User.php';

		echo "<result>" .
		(UserAccount::isLoggedIn() ? "True" : "False") . "</result>";
	}
        function getCallNumber(){
		global $interface;
		global $configArray;
		$id = $this->id;
		$marcField = $this->marcRecord->getField('245');
		$booTitle = $this->getSubfieldData($marcField,'a');
		$interface->assign('BookTitle',$booTitle);
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
		$holdingData = new stdClass();
		// Get Holdings Data
		if ($catalog->status) {
			$result = $catalog->getHolding($id);
			if (PEAR::isError($result)) {
				PEAR::raiseError($result);
			}
			if (count($result)) {
				$holdings = array();
				$issueSummaries = array();
				foreach ($result as $copy) {
					if (isset($copy['type']) && $copy['type'] == 'issueSummary'){
						$issueSummaries = $result;
						break;
					}else{
						$holdings[$copy['location']][] = $copy;
					}
				}
				$allAvailableItem = true;
				foreach($holdings as $value){
					foreach($value as $valuevalue){
						if(!$valuevalue['availability']){
							$allAvailableItem = false;
						}
					}
				}
				if (isset($issueSummaries) && count($issueSummaries) > 0){
					$interface->assign('issueSummaries', $issueSummaries);
					$holdingData->issueSummaries = $issueSummaries;
				}else{
					$interface->assign('allAvailableItem',$allAvailableItem);
					$interface->assign('holdings', $holdings);
					$holdingsResult = $interface->fetch("Record/view-holdings.tpl");
					echo $holdingsResult;
					/*foreach($holdings as $key => $value)
					{
						if(is_array($value))
						{
							echo $key.' => ';
							foreach($value as $keykey => $valuevalue)
							{
								if(is_array($valuevalue))
								{
									echo "\t".$keykey;
									foreach($valuevalue as $keykeykey => $valuevaluevalue)
									{
										echo "\t\t".$keykeykey." => ".$valuevaluevalue."\n";
									}
								}else{
									echo "\t".$keykey.' => '.$valuevalue."\n";
								}
							}
						}else{
							echo $key.' => '.$value."\n";
						}
					}*/
					$holdingData->holdings = $holdings;
				}
			}else{
				$interface->assign('holdings', array());
				$holdingData->holdings = array();
			}

			// Get Acquisitions Data
			$result = $catalog->getPurchaseHistory($id);
			if (PEAR::isError($result)) {
				PEAR::raiseError($result);
			}
			$interface->assign('history', $result);
			$holdingData->history = $result;

			//Holdings summary
			$result = $catalog->getStatusSummary($id);
			if (PEAR::isError($result)) {
				PEAR::raiseError($result);
			}
			$holdingData->holdingsSummary = $result;
			$interface->assign('holdingsSummary', $result);

			$interface->assign('formattedHoldingsSummary', $interface->fetch('Record/holdingsSummary.tpl'));
		}

		return $holdingData;
	}
    
    
    
    
}