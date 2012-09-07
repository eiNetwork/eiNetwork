<?php
class Timer{
	private $lastTime = 0;
	private $firstTime = 0;
	private $timingMessages;
	private $timingsEnabled = false;

	public function Timer($startTime){
		global $configArray;
		if (isset($configArray['System']['timings'])) {
			$this->timingsEnabled = $configArray['System']['timings'];
		}
		$this->lastTime = $startTime;
		$this->firstTime = $startTime;
		$this->timingMessages = array();
	}
	public function logTime($message){
		if ($this->timingsEnabled){
			$curTime = microtime(true);
			$elapsedTime = round($curTime - $this->lastTime, 2);
			if ($elapsedTime > 0){
				$this->timingMessages[] = "$message: $curTime ($elapsedTime sec)";
			}
			$this->lastTime = $curTime;
		}
	}

	function writeTimings(){
		if ($this->timingsEnabled){
			$curTime = microtime(true);
			$elapsedTime = round($curTime - $this->lastTime, 2);
			//if ($elapsedTime > 0){
				$this->timingMessages[] = "Finished run: $curTime ($elapsedTime sec)";
			//}
			$this->lastTime = $curTime;
			$logger = new Logger();
			$totalElapsedTime =round(microtime(true) - $this->firstTime, 2);
			$timingInfo = "\r\nTiming for: " . $_SERVER['REQUEST_URI'] . "\r\n";
			$timingInfo .= implode("\r\n", $this->timingMessages);
			$timingInfo .= "\r\nTotal Elapsed time was: $totalElapsedTime seconds.\r\n";
			$logger->log($timingInfo, PEAR_LOG_NOTICE);
		}
	}
	
	function __destruct() {
		if ($this->timingsEnabled){
			$logger = new Logger();
			$totalElapsedTime =round(microtime(true) - $this->firstTime, 2);
			$timingInfo = "\r\nTiming for: " . $_SERVER['REQUEST_URI'] . "\r\n";
			$timingInfo .= implode("\r\n", $this->timingMessages);
			$timingInfo .= "\r\nTotal Elapsed time was: $totalElapsedTime seconds.\r\n";
			$logger->log($timingInfo, PEAR_LOG_NOTICE);
		}
	}
}
