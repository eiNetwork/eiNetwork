<?php

require_once 'AnalyticsTest.php';


$suite  = new PHPUnit_TestSuite("AnalyticsTest");
$result = PHPUnit::run($suite);

echo "Done";
?>
