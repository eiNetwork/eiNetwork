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
require_once 'sys/DataObjectUtil.php';
require_once 'sys/eContent/EContentRecord.php';
class Prioritize extends Action {

	function launch()
	{
		global $interface;
		global $configArray;
		global $user;
		
// Workning 1
/*$title = "the girl with dragon tattoo";
$bookid = array(".b29407291", ".b31397025", ".b29181306");
$myFile = "/usr/local/VuFind-Plus/vufind/web/services/EcontentRecord/testFile.txt";
$fh = fopen($myFile, 'a') or die("Can't open file");
$stringData = "<query text=\"".$title."\">\n";
fwrite($fh, $stringData);
foreach ($bookid as &$bookid) {
$stringData = "\t<doc id=\"".$bookid."\"/>\n";
fwrite($fh, $stringData);
}
$stringData = "</query>\n";
fwrite($fh, $stringData);
fclose($fh);
*/

//Working 2
/*
$myFile = "/usr/local/VuFind-Plus/vufind/web/services/EcontentRecord/testFile.txt";
$title = "the girl with dragon tattoo";
$arr = file($myFile);
$i = 0;
echo(count($arr));
while($i< count($arr)){
	if(preg_match("/".$title."/", $arr[$i]) && preg_match("/query/", $arr[$i])) {
		unset($arr[$i]);
		$i++;
		while(!preg_match("/query/", $arr[$i])) {
			unset($arr[$i]);
			$i++;
		}
		unset($arr[$i]);
	}
	$i++;
}
$arr = array_values($arr);
file_put_contents($myFile,implode($arr));
*/

$myFile = "/usr/local/VuFind-Plus/vufind/web/services/EcontentRecord/testFile.txt";
$bookid = array(".b29407291", ".b31397025", ".b29181306");
$title = "the boy4 with dragon tattoo2";
$arr = file($myFile);
$i = 0;
$elevate_count = 0;
echo(count($arr));
$arr_count = count($arr);
while($i< $arr_count){
        if(preg_match("/\b".$title."\b/", $arr[$i]) && preg_match("/query/", $arr[$i])) {
                unset($arr[$i]);
                $i++;
                while(!preg_match("/query/", $arr[$i])) {
                        unset($arr[$i]);
                        $i++;
                }
                unset($arr[$i]);
        }
        $i++;
	if($i == $arr_count)
		unset($arr[$arr_count-1]);
}
$arr = array_values($arr);
file_put_contents($myFile,implode($arr));
$fh = fopen($myFile, 'a') or die("Can't open file");
$stringData = "<query text=\"".$title."\">\n";
fwrite($fh, $stringData);
foreach ($bookid as &$bookid) {
$stringData = "\t<doc id=\"".$bookid."\"/>\n";
fwrite($fh, $stringData);
}
$stringData = "</query>\n";
fwrite($fh, $stringData);
$stringData = "</elevate>";
fwrite($fh, $stringData);
fclose($fh);


/*$myFile = "/usr/local/VuFind-Plus/vufind/web/services/EcontentRecord/testFile.txt";
$title = "the girl with dragon tattoo";
$data = file_get_contents($myfile);
$lines = explode(PHP_EOL, $data);
$lineNo = 1;
foreach($lines as $lines)
{
$linesArray[$lineNo] = $line;
echo($lines);
if(stristr($line, "i"))
$lineNo++;
}
//unset($linesArray[$lineToRemove]);
implode("\n", $linesArray);
echo($lineNo);
*/



/*$myFile = "/usr/local/VuFind-Plus/vufind/web/services/EcontentRecord/testFile.txt";
$title = "the girl with dragon tattoo";
$fileptr = fopen($myFile, 'r');
$i = 0;
$line = fgets($fileptr);
while($line) {
if ( stristr($line, $title) ) 
    {
	echo("HIT");
	$line = fgets($fileptr);
	while( !stristr($line, "query") ) {
		echo("Into 2\n");
		$line = fgets($fileptr);
		$i++;
	} 
	echo("Hit2");
	$i++;
    }   

echo($line);
echo("\n");
//echo($i);
$line = fgets($fileptr);
}*/

		//If the user isn't logged in, take them to the login page
		if (!$user){
			header("Location: {$configArray['Site']['url']}/MyResearch/Login");
			die();
		}
		
		//Make sure the user has permission to access the page
		if (!$user->hasRole('epubAdmin')){
			$interface->setTemplate('noPermission.tpl');
			$interface->display('layout.tpl');
			exit();
		}


		$structure = EContentRecord::getObjectStructure();

		if (isset($_REQUEST['submit'])){
			//Save the object
			$results = DataObjectUtil::saveObject($structure, 'EContentRecord');
			$eContentRecord = $results['object'];
			//redirect to the view of the eContentRecord if we saved ok.
			if (!$results['validatedOk'] || !$results['saveOk']){
				//Display the errors for the user.
				$interface->assign('errors', $results['errors']);
				$interface->assign('object', $eContentRecord);
				$_REQUEST['id'] = $$eContentRecord->id;
			}else{
				//Show the new tip that was created
				header('Location:' . $configArray['Site']['path'] . "/EcontentRecord/{$eContentRecord->id}/Home");
				exit();
			}
		}

		$isNew = true;
		if (isset($_REQUEST['id']) && strlen($_REQUEST['id']) > 0 ){
			$object = EContentRecord::staticGet('id', strip_tags($_REQUEST['id']));
			$interface->assign('object', $object);
			$interface->setPageTitle('Edit EContentRecord');
			$isNew = false;
		}else{
			$interface->setPageTitle('Submit a New EContentRecord');
		}

		//Manipulate the structure as needed
		if ($isNew){
		}else{
			
		}

		$interface->assign('isNew', $isNew);
		$interface->assign('submitUrl', $configArray['Site']['path'] . '/EcontentRecord/Prioritize');
		$interface->assign('editForm', DataObjectUtil::getEditForm($structure));
		
		$interface->setTemplate('edit.tpl');

		$interface->display('layout.tpl');
	}

}
