<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnalyticsTest
 *
 * @author vinoth ganesh
 */

//include '/usr/local/VuFind-Plus/vufind/web/services/Analytics.php';
require_once 'VinBoost.php';

class AnalyticsTest extends PHPUnit_Framework_TestCase {
    //put your code here
      /**
     * @var Analytics
     */
     protected $object;
     
     protected function setUp() {
         //$filepath = realpath (dirname('Analytics.php'));
         //$superfile  =$_SERVER['DOCUMENT_ROOT'] ;
         //echo "Done Done--->" . $superfile;
         //echo $filepath;
         //include( $filepath . '/Analytics.php');
        $this->object = new VinBoost();
    } 
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
   /**
     * @covers Analytics::ProcessJumpto
     * @todo   Implement testjumpto().
     */
    public function testlaunch() {
        // Remove the following lines when you implement this test.
       // $this->markTestIncomplete(
         //       'This test has not been implemented yet.'
        //);
         // $this->object->launch();
                  // Create the Array fixture.
          $fixture = array();
          //echo "Done Done--->22222222222222s";
        // Assert that the size of the Array fixture is 0.
        $this->assertEquals(0, sizeof($fixture));      
    } 
    
public function testelevate() 
 { 
  try  
     { 
        $title = "Testxxxx";
        $recordId = array(".test4",".test2", "test6" );
        $FinalPos = "2"; 
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->elevate_xml($myFile, $title, $recordId, $FinalPos);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1);
     }
     
        $this->assertEquals(0, 0);
 }
 
 public function testelevate1() 
 { 
  try  
     { 
        $title = "Testxxxx";
       $recordId = array(".test4",".test2", ".test3",".test5",".test6" );
        $FinalPos = "1"; 
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->elevate_xml($myFile, $title, $recordId, $FinalPos);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1);
     }
     
        $this->assertEquals(0, 0);
 }
 
 
 public function testelevate2() 
 { 
  try  
     { 
        $title = "Testxxxx";
        $recordId = array(".test4",".test2", ".test3",".test5",".test6" );
        $FinalPos = "0"; 
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->elevate_xml($myFile, $title, $recordId, $FinalPos);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1);
     }
     
        $this->assertEquals(0, 0);
 }
 
 public function testelevate3() 
 { 
  try  
     { 
        $title = "Testxxxx";
        $recordId = array(".test4",".test2", ".test3",".test5",".test6" );
        $FinalPos = "8"; 
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->elevate_xml($myFile, $title, $recordId, $FinalPos);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 0);
     }
        $this->assertEquals(0, 1);
        
 }
 
 
  public function testirrelevent1() 
 { 
 try  
     { 
        $title = "Testxxxx";
        $recordId = ".test1";
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->irrelevant_xml($myFile, $title, $recordId);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1);
     }
        $this->assertEquals(0, 0);
        
 }
 
 public function testirreleventnotfoundFile() 
 { 
 try  
     { 
        $title = "Testxxxuuuuuusdsd";
        $recordId = ".test1";
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->irrelevant_xml($myFile, $title, $recordId);
	   } 
     }
   
    catch (Exception $e)
     {
          $this->assertEquals(0, 1);
        
     }
     $this->assertEquals(0, 0); 
        
 }
 
 
 public function testirreleventnotfoundbook() 
 { 
 try  
     { 
        $title = "Testxxxx";
        $recordId = ".test-----1";
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->irrelevant_xml($myFile, $title, $recordId);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1); 
     }
      $this->assertEquals(0, 0);
        
 }
 

  public function testirreleventtest2() 
 { 
  try  
     { 
        $title = "Testxxxx";
        $recordId = ".test6";
        $myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
						"/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");
	 foreach($myFile as &$myFile)
	   {
	     $this->object->irrelevant_xml($myFile, $title, $recordId);
	   } 
     }
   
    catch (Exception $e)
     {
        $this->assertEquals(0, 1);
     }
        $this->assertEquals(0, 0);       
 }
 
 
}
?>
