<?php
/**
 * Table Definition for bad words
 */
require_once 'DB/DataObject.php';
require_once 'DB/DataObject/Cast.php';

class SearchStat extends DB_DataObject
{
	public $__table = 'search_stats';    // table name
	public $id;                      //int(11)
	public $phrase;                    //varchar(500)
	public $type;             //varchar(50)
	public $numResults;       //int(16)
	public $lastSearch;       //timestamp
	public $numSearches;      //int(16)
	public $locationId;      //int(16)
	public $libraryId;      //int(16)
	 
	/* Static get */
	function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('SearchStat',$k,$v); }

	function keys() {
		return array('id', 'phrase', 'type');
	}

	function getSearchSuggestions($phrase, $type){
		$phrase = strtolower($phrase);
		$activeLibrary = Library::getActiveLibrary();
		$libraryId = -1;
		if ($activeLibrary != null && $activeLibrary->useScope){
			$libraryId = $activeLibrary->libraryId;
		}
		global $locationSingleton;
		$locationId = -1;
		$activeLocation = $locationSingleton->getActiveLocation();
		if ($activeLocation != null && $activeLocation->useScope){
			$locationId = $activeLocation->locationId;
		}
		if (!isset($type)){
			$type = 'Keyword';
		}

		$searchStat = new SearchStat();
		//If we are scoped, limit suggestions to searches that have been done in the
		//same scope so we get a correct number of hits
		$searchStat->whereAdd("libraryId = " . $libraryId);
		$searchStat->whereAdd("locationId = " . $locationId);
		//If we are searching a specific type, limit results to that type so the results
		//are better.
		if ($type == 'ISN' || $type == 'Tag' || $type == 'Author'){
			$searchStat->whereAdd("type = '" . mysql_escape_string($type) ."'");
		}
		//Don't suggest things to users that will result in them not getting any results
		$searchStat->whereAdd("numResults > 0");
		$searchStat->whereAdd("phrase like '" . mysql_escape_string($phrase) ."%' and type='$type'");
		$searchStat->orderBy("numSearches DESC");
		$searchStat->limit(0, 10);
		$searchStat->find();
		$results = array();
		if ($searchStat->N > 0){
			while($searchStat->fetch()){
				$results[] = $searchStat->phrase;
			}
		}
		return $results;
	}

	function saveSearch($phrase, $type, $numResults){
		if (!isset($numResults)){
			//This only happens if there is an error parsing the query. 
			return;
		}
		$activeLibrary = Library::getActiveLibrary();
		$libraryId = -1;
		if ($activeLibrary != null && $activeLibrary->useScope){
			$libraryId = $activeLibrary->libraryId;
		}
		global $locationSingleton;
		$locationId = -1;
		$activeLocation = $locationSingleton->getActiveLocation();
		if ($activeLocation != null && $activeLocation->useScope){
			$locationId = $activeLocation->locationId;
		}

		$searchStat = new SearchStat();
		$searchStat->phrase = strtolower($phrase);
		$searchStat->type = $type;
		$searchStat->libraryId = $libraryId;
		$searchStat->locationId = $locationId;
		$searchStat->find();
		$isNew = true;
		if ($searchStat->N > 0){
			$searchStat->fetch();
			$searchStat->numSearches++;
			$isNew = false;
		}else{
			$searchStat->numSearches = 1;
		}
		$searchStat->numResults = $numResults;
		$searchStat->lastSearch = time();
		if ($isNew){
			$searchStat->insert();
		}else{
			$searchStat->update();
		}
	}

}