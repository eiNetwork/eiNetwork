<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of solrTest
 *
 * @author vinoth ganesh
 */



class solrTest extends PHPUnit_Framework_TestCase{
     protected $object;
     
     protected function setUp() {
         //$filepath = realpath (dirname('Analytics.php'));
         //$superfile  =$_SERVER['DOCUMENT_ROOT'] ;
         //echo "Done Done--->" . $superfile;
         //echo $filepath;
         //include( $filepath . '/Analytics.php');
         // require_once 'index.php';
         /* require_once 'sys/ConfigArray.php';
         $configArray = readConfig();*/
       //  global $configArray;
         require_once 'sys/SearchObject/Solr.php';
        $this->object = new Solr("localhost","");
    } 
    
     protected function tearDown() {
        
    }
    
    public function testgetResultNextResult()
    {
        $this->object->getResultNextPage();
        
    }
    
     public function testgetRecordSortedHTML()
    {
        $this->object->getRecordSortedHTML();
        
    }
    
    public function testgetRecordID()
    {
        $this->object->getRecordID();
        
    }
    
    public function testgetIndividualID()
    {
        $this->object->getIndividualID();
        
    }
    
    public function testgetTitle()
    {
        $this->object->getTitle();
        
    }
}

?>
