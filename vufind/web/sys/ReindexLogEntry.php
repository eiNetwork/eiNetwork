<?php
/**
 * Table Definition for library
 */
require_once 'DB/DataObject.php';
require_once 'DB/DataObject/Cast.php';

class ReindexLogEntry extends DB_DataObject
{
	public $__table = 'reindex_log';   // table name
	public $id;
	public $startTime;
	public $lastUpdate;
	public $endTime;
	public $notes;
	private $_processes = null;

	/* Static get */
	function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('ReindexLogEntry',$k,$v); }

	function keys() {
		return array('id');
	}

	function processes(){
		if (is_null($this->_processes)){
			$this->_processes = array();
			$reindexProcess = new ReindexProcessLogEntry();
			$reindexProcess->reindex_id = $this->id;
			$reindexProcess->order('processName');
			$reindexProcess->find();
			while ($reindexProcess->fetch()){
				$this->_processes[] = clone $reindexProcess;
			}
		}
		return $this->_processes;
	}
	
	function getNumProcesses(){
		return count($this->processes());
	}
	
	function getHadErrors(){
		foreach ($this->processes() as $process){
			if ($process->numErrors > 0){
				return true;
			}
		}
		return false;
	}

	function getElapsedTime(){
		if (!isset($this->endTime) || is_null($this->endTime)){
			return "";
		}else{
			$elapsedTimeMin = ceil(($this->endTime - $this->startTime) / 60);
			if ($elapsedTimeMin < 60){
				return $elapsedTimeMin . " min";
			}else{
				$hours = floor($elapsedTimeMin / 60);
				$minutes = $elapsedTimeMin - (60 * $hours);
				return "$hours hours, $minutes min" ;
			}
		}
	}

}
