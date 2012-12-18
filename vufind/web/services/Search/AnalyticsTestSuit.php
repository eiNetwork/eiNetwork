<?php

require_once 'AnalyticsTest.php';
require_once 'solrTest.php';


$suite  = new PHPUnit_TestSuite("AnalyticsTest");
$result = PHPUnit::run($suite);

echo "Done";
?>
