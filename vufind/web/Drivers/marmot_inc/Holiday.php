<?php
/**
 * Table Definition for LocationHours.
 */
require_once 'DB/DataObject.php';
require_once 'DB/DataObject/Cast.php';

class Holiday extends DB_DataObject
{
	public $__table = 'holiday';   // table name
	public $id;                    // int(11)  not_null primary_key auto_increment
	public $libraryId;             // int(11)
	public $date;                  // date
	public $name;                  // varchar(100)
	
	/* Static get */
	function staticGet($k,$v=NULL) {
		return DB_DataObject::staticGet('Holiday',$k,$v);
	}
	
	function keys() {
		return array('id');
	}

	function getObjectStructure(){
		$library = new Library();
		$library->orderBy('displayName');
		$library->find();
		$libraryList = array();
		while ($library->fetch()){
			$libraryList[$library->libraryId] = $library->displayName;
		}
		
		$structure = array(
			'id' => array('property'=>'id', 'type'=>'label', 'label'=>'Id', 'description'=>'The unique id of the holiday within the database'),
			'libraryId' => array('property'=>'libraryId', 'type'=>'enum', 'values'=>$libraryList, 'label'=>'Library', 'description'=>'A link to the library'),
			'date' => array('property'=>'date', 'type'=>'date', 'label'=>'Date', 'description'=>'The date of a holiday.', 'required'=>true),
			'name' => array('property'=>'name', 'type'=>'text', 'label'=>'Holiday Name', 'description'=>'The name of a holiday')
		);
		foreach ($structure as $fieldName => $field){
			$field['propertyOld'] = $field['property'] . 'Old';
			$structure[$fieldName] = $field;
		}
		return $structure;
	}
}