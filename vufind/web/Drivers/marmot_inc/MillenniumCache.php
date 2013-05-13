<?php
/**
 * Table Definition for library
 */
require_once 'DB/DataObject.php';
require_once 'DB/DataObject/Cast.php';

class MillenniumCache extends DB_DataObject 
{
    public $__table = 'millennium_cache';    // table name
    public $recordId;                    //varchar(20)
    public $scope;                    //int(16)
    public $holdingsInfo;             //mediumText
    public $framesetInfo;             //mediumText
    public $cacheDate;         //timestamp
    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('millennium_cache',$k,$v); }
    
    function keys() {
        return array('recordId');
    }

}
?>