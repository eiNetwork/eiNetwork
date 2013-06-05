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

require_once 'File/MARC.php';

require_once 'sys/Language.php';

require_once 'services/MyResearch/lib/User.php';
require_once 'services/MyResearch/lib/Resource.php';
require_once 'services/MyResearch/lib/Resource_tags.php';
require_once 'services/MyResearch/lib/Tags.php';
require_once 'RecordDrivers/Factory.php';
require_once 'Drivers/marmot_inc/GoDeeperData.php';
require_once 'Drivers/einetwork/novelist.php';
require_once 'Drivers/einetwork/contentcafe.php';

class Record extends Action
{
	public $id;

	/**
	 * marc record in File_Marc object
	 */
	protected $recordDriver;
	public $marcRecord;

	public $record;

	public $isbn;
	public $upc;
	public $oclc;
	public $cacheId;

	public $db;

	public $description;
	
	function __construct($subAction = false, $record_id = null)
	{
		global $interface;
		global $configArray;
		global $library;
		global $timer;

		$interface->assign('page_body_style', 'sidebar_left');
		$interface->assign('libraryThingUrl', $configArray['LibraryThing']['url']);
		
		//Load basic information needed in subclasses
		if ($record_id == null || !isset($record_id)){
			$this->id = $_GET['id'];
		}else{
			$this->id = $record_id;
		}
		if ($configArray['Catalog']['ils'] == 'Millennium'){
			$interface->assign('classicId', substr($this->id, 1, strlen($this->id) -2));
			$interface->assign('classicUrl', $configArray['Catalog']['url']);
		}
		 
		// Setup Search Engine Connection
		$class = $configArray['Index']['engine'];
		$url = $configArray['Index']['url'];
		$this->db = new $class($url);
		if ($configArray['System']['debugSolr']) {
			$this->db->debug = true;
		}

		// Retrieve Full Marc Record
		if (!($record = $this->db->getRecord($this->id))) {
			PEAR::raiseError(new PEAR_Error("Record {$this->id} Does Not Exist"));
		}
		$this->record = $record;
		$interface->assign('record', $record);
		$this->recordDriver = RecordDriverFactory::initRecordDriver($record);
		$timer->logTime('Initialized the Record Driver');
		
		$interface->assign('coreMetadata', $this->recordDriver->getCoreMetadata());
		
		// Process MARC Data
		require_once 'sys/MarcLoader.php';
		$marcRecord = MarcLoader::loadMarcRecordFromRecord($record);
		if ($marcRecord) {
			$this->marcRecord = $marcRecord;
			$interface->assign('marc', $marcRecord);
		} else {
			$interface->assign('error', 'Cannot Process MARC Record');
		}
		$timer->logTime('Processed the marc record');

		//Load information for display in the template rather than processing specific fields in the template
		//Title fields
		$marcField = $marcRecord->getField('245');
		$recordTitle = $this->getSubfieldData($marcField, 'a');
		$interface->assign('recordTitle', $recordTitle);
		$recordTitleSubtitle = trim($this->concatenateSubfieldData($marcField, array('a', 'b', 'h', 'n', 'p')));
		$recordTitleSubtitle = preg_replace('~\s+[\/:]$~', '', $recordTitleSubtitle);
		$interface->assign('recordTitleSubtitle', $recordTitleSubtitle);
		$recordTitleWithAuth = trim($this->concatenateSubfieldData($marcField, array('a', 'b', 'h', 'n', 'p', 'c')));
		$interface->assign('recordTitleWithAuth', $recordTitleWithAuth);

		//Alternate title array
		$marcField130 = $marcRecord->getFields('130');
		$marcField240 = $marcRecord->getFields('240');
		$marcField246 = $marcRecord->getFields('246');
		$marcField730 = $marcRecord->getFields('730');
		$marcField740 = $marcRecord->getFields('740');
		
		if ($marcField130 || $marcField240 || $marcField246 || $marcField730 || $marcField740){
			$altTitle = array();
			foreach ($marcField130 as $field){
				$altTitle[] = $this->getSubfieldData($field, 'a');
			}
			foreach ($marcField240 as $field){
				$altTitle[] = $this->getSubfieldData($field, 'a');
			}
			foreach ($marcField246 as $field){
				$altTitle[] = $this->getSubfieldData($field, 'a');
			}
			foreach ($marcField730 as $field){
				$altTitle[] = $this->getSubfieldData($field, 'a');
			}
			$interface->assign('altTitle', $altTitle);
		}
		
		$marcField = $marcRecord->getField('100');
		if ($marcField){
			$mainAuthor = $this->concatenateSubfieldData($marcField, array('a', 'b', 'c', 'd'));
			$interface->assign('mainAuthor', $mainAuthor);
		}

		$marcField = $marcRecord->getField('110');
		if ($marcField){
			$corporateAuthor = $this->getSubfieldData($marcField, 'a');
			$interface->assign('corporateAuthor', $corporateAuthor);
		}

		$marcFields = $marcRecord->getFields('700');
		if ($marcFields){
			$contributors = array();
			foreach ($marcFields as $marcField){
				$contributors[] = $this->concatenateSubfieldData($marcField, array('a', 'b', 'd', 'q', 'c', 'e', '4'));
			}
			$interface->assign('contributors', $contributors);
		}
		
		$marcFields = $marcRecord->getFields('710');
		if ($marcFields){
			$corporates = array();
			foreach ($marcFields as $marcField){
				$corporates[] = $this->concatenateSubfieldData($marcField, array('a', 'b', 'd', 'c'));
			}
			$interface->assign('corporates', $corporates);
		}
		
		$marcFields = $marcRecord->getFields('711');
		if ($marcFields){
			$meetings = array();
			foreach ($marcFields as $marcField){
				$meetings[] = $this->concatenateSubfieldData($marcField, array('a', 'd', 'c'));
			}
			$interface->assign('meetings', $meetings);
		}
		
		//$marcFields = $marcRecord->getFields('730');
		//if ($marcFields){
		//	$uniform = array();
		//	foreach ($marcFields as $marcField){
		//		$uniform[] = $this->getSubfieldData($marcField, 'a');
		//	}
		//	$interface->assign('uniform', $uniform);
		//}		

		$marcFields = $marcRecord->getFields('260');
		if ($marcFields){
			$published = array();
			foreach ($marcFields as $marcField){
				$published[] = $this->concatenateSubfieldData($marcField, array('a', 'b', 'c'));
			}
			$interface->assign('published', $published);
			//$interface->assign('pubdate', str_replace('.', '', $this->getSubfieldData($marcField, 'c')));
			$interface->assign('pubdate', ereg_replace("[^0-9]", "", $this->getSubfieldData($marcField, 'c')));
		}

		$marcFields = $marcRecord->getFields('250');
		if ($marcFields){
			$editionsThis = array();
			foreach ($marcFields as $marcField){
				$editionsThis[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('editionsThis', $editionsThis);
		}

		$marcFields = $marcRecord->getFields('300');
		if ($marcFields){
			$physicalDescriptions = array();
			foreach ($marcFields as $marcField){
				$description = $this->getSubfieldData($marcField, 'a');
				if ($description != 'p. cm.'){
					$description = preg_replace("/[\/|;:]$/", '', $description);
					$description = preg_replace("/p\./", 'pages', $description);
					$physicalDescriptions[] = $description;
				}
			}
			$interface->assign('physicalDescriptions', $physicalDescriptions);
		}
		
		$marcFields = $marcRecord->getFields('501');
		if ($marcFields){
			$withNotes = array();
			foreach ($marcFields as $marcField){
				$withNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('withNotes', $withNotes);
		}
		
		$marcFields = $marcRecord->getFields('504');
		if ($marcFields){
			$biblioNotes = array();
			foreach ($marcFields as $marcField){
				$biblioNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('biblioNotes', $biblioNotes);
		}
		
		$marcFields = $marcRecord->getFields('508');
		if ($marcFields){
			$productionNotes = array();
			foreach ($marcFields as $marcField){
				$productionNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('productionNotes', $productionNotes);
		}
		
		$marcFields = $marcRecord->getFields('511');
		if ($marcFields){
			$performerNotes = array();
			foreach ($marcFields as $marcField){
				$performerNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('performerNotes', $performerNotes);
		}
		
		$marcFields = $marcRecord->getFields('520');
		if ($marcFields){
			$summaryNotes = array();
			foreach ($marcFields as $marcField){
				$summaryNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('summaryNotes', $summaryNotes);
		}

		$marcFields = $marcRecord->getFields('521');
		if ($marcFields){
			$targetNotes = array();
			foreach ($marcFields as $marcField){
				$targetNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('targetNotes', $targetNotes);
		}
		
		$marcFields = $marcRecord->getFields('546');
		if ($marcFields){
			$languageNotes = array();
			foreach ($marcFields as $marcField){
				$languageNotes[] = $this->getSubfieldData($marcField, 'a');
			}
			$interface->assign('languageNotes', $languageNotes);
		}
		
		//$marcFields = $marcRecord->getFields('546');
		//if ($marcFields){
		//	$languageNotes = array();
		//	foreach ($marcFields as $marcField){
		//		$languageNotes[] = $this->getSubfieldData($marcField, 'a');
		//	}
		//	$interface->assign('languageNotes', $languageNotes);
		//}		
		// Get ISBN for cover and review use
		$mainIsbnSet = false;
		if ($isbnFields = $this->marcRecord->getFields('020')) {
			$isbns = array();
			//Use the first good ISBN we find.
			foreach ($isbnFields as $isbnField){
				if ($isbnSubfieldA = $isbnField->getSubfield('a')) {
					$tmpIsbn = trim($isbnSubfieldA->getData());
					if (strlen($tmpIsbn) > 0){

						$isbns[] = $isbnSubfieldA->getData();
						$pos = strpos($tmpIsbn, ' ');
						if ($pos > 0) {
							$tmpIsbn = substr($tmpIsbn, 0, $pos);
						}
						$tmpIsbn = trim($tmpIsbn);
						if (strlen($tmpIsbn) > 0){
							if (strlen($tmpIsbn) < 10){
								$tmpIsbn = str_pad($tmpIsbn, 10, "0", STR_PAD_LEFT);
							}
							if (!$mainIsbnSet){
								$this->isbn = $tmpIsbn;
								$interface->assign('isbn', $tmpIsbn);
								$mainIsbnSet = true;
							}
						}
					}
				}
			}
			if (isset($this->isbn)){
				if (strlen($this->isbn) == 13){
					require_once('Drivers/marmot_inc/ISBNConverter.php');
					$this->isbn10 = ISBNConverter::convertISBN13to10($this->isbn);
				}else{
					$this->isbn10 = $this->isbn;
				}
				$interface->assign('isbn10', $this->isbn10);
			}
			$interface->assign('isbns', $isbns);
		}

		// get novelist data
		if ($this->isbn){
			$novelist = new NovelistNew($this->isbn);
		}

		if ($upcField = $this->marcRecord->getField('024')) {
			if ($upcField = $upcField->getSubfield('a')) {
				$this->upc = trim($upcField->getData());
				$interface->assign('upc', $this->upc);
			}
		}
		if($oclcField = $this->marcRecord->getField('035')){
			if($oclcField = $oclcField->getSubField('a')){
				$this->oclc = preg_replace("/[^0-9]/","", $oclcField->getData());
				$interface->assign('oclc', $this->oclc);
			}
		}
		if ($issnField = $this->marcRecord->getField('022')) {
			if ($issnField = $issnField->getSubfield('a')) {
				$this->issn = trim($issnField->getData());
				if ($pos = strpos($this->issn, ' ')) {
					$this->issn = substr($this->issn, 0, $pos);
				}
				$interface->assign('issn', $this->issn);
				//Also setup GoldRush link
				if (isset($library) && strlen($library->goldRushCode) > 0){
					$interface->assign('goldRushLink', "http://goldrush.coalliance.org/index.cfm?fuseaction=Search&amp;inst_code={$library->goldRushCode}&amp;search_type=ISSN&amp;search_term={$this->issn}");
				}
			}
		}

		$timer->logTime("Got basic data from Marc Record subaction = $subAction, record_id = $record_id");
		//stop if this is not the main action.
		if ($subAction == true){
			return;
		}
				
		//Get street date
		if ($streetDateField = $this->marcRecord->getField('263')) {
			$streetDate = $this->getSubfieldData($streetDateField, 'a');
			if ($streetDate != ''){
				$interface->assign('streetDate', $streetDate);
			}
		}
		$useMarcSeries = true;
			$marcField440 = $marcRecord->getFields('440');
			$marcField490 = $marcRecord->getFields('490');
			$marcField830 = $marcRecord->getFields('830');
			if ($marcField440 || $marcField490 || $marcField830){
				$series = array();
				foreach ($marcField440 as $field){
					$series[] = $this->getSubfieldData($field, 'a');
				}
				foreach ($marcField490 as $field){
					if ($field->getIndicator(1) == 0){
						$series[] = $this->getSubfieldData($field, 'a');
					}
				}
				foreach ($marcField830 as $field){
					$series[] = $this->getSubfieldData($field, 'a');
				}
				$interface->assign('series', $series);
				
				if (sizeof($series) > 0) {
					$useMarcSeries = false;
					//echo "Use MARC Series is false series count ".sizeof($series);
				}
			}
				
		if($useMarcSeries){
			if ($this->isbn){

				$series_titles = $novelist->getSeries();

				$interface->assign('series', $series_titles);

				/*
				require_once 'Drivers/marmot_inc/GoDeeperData.php';
				
				$series = GoDeeperData::getSeries($this->isbn);
				if (isset($series)){
				$interface->assign('series', $series);

				
				}*/
			}
		}	

		//Load description from Syndetics
		$useMarcSummary = true;
		if ($this->isbn || $this->upc){
			
			$contentcafe = new ContentCafe($configArray); // TODO @MD passing config array into new ContentCafe driver until globals and configArray are rewritten
			$summaryInfo = $contentcafe->getSummary($this->isbn, $this->upc);
			
			if (isset($summaryInfo['summary'])){
				$interface->assign('summaryTeaser', $summaryInfo['summary']);
				$interface->assign('summary', $summaryInfo['summary']);
				$useMarcSummary = false;
			}

		}

		if ($useMarcSummary){
			if ($summaryField = $this->marcRecord->getField('520')) {
				$interface->assign('summary', $this->getSubfieldData($summaryField, 'a'));
				$interface->assign('summaryTeaser', $this->getSubfieldData($summaryField, 'a'));
			}
		}

		if ($mpaaField = $this->marcRecord->getField('521')) {
			$interface->assign('mpaaRating', $this->getSubfieldData($mpaaField, 'a'));
		}

		if (isset($configArray['Content']['subjectFieldsToShow'])){
			$subjectFieldsToShow = $configArray['Content']['subjectFieldsToShow'];
			$subjectFields = explode(',', $subjectFieldsToShow);
			$subjects = array();
			foreach ($subjectFields as $subjectField){
				$marcFields = $marcRecord->getFields($subjectField);
				if ($marcFields){
					foreach ($marcFields as $marcField){
						$searchSubject = "";
						$subject = array();
						$title = '';
						foreach ($marcField->getSubFields() as $subField){
							if ($subField->getCode() != 2){
								$searchSubject .= " " . $subField->getData();
								$title .=$subField->getData()." ";
							}
						}
						$subject[] = array(
								'search' => trim($searchSubject),
								'title'  => $title,
								//'code'	 => $subField->getCode()
						);
						/*if($subject[0]['code'] == 'a' && $subject[1]['code'] == 'v'){
							
							$subject = array(array("search"=>$subject[1]["search"], "title"=>$subject[0]['title'].' '.$subject[1]['title']));
						}else{
							unset($subject['code']);
						}*/
						$subjects[] = $subject;
					}
				}
				$subjects = $this->multi_unique($subjects);
				$interface->assign('subjects', $subjects);
			}
		}
		
		$format = $record['format'];
		$interface->assign('recordFormat', $record['format']);
		$format_category =(isset($record['format_category']))?$record['format_category'][0]:"";
		$interface->assign('format_category', $format_category);
		$interface->assign('recordLanguage', $record['language']);
		
		$timer->logTime('Got detailed data from Marc Record');
		$marcFields505 = $marcRecord->getFields('505');
		$toc = array();
		if($marcFields505){
			foreach ($marcFields505 as $marcField){
				foreach ($marcField->getSubFields() as $subfield){
					$note = $subfield->getData();
					/*if ($subfield->getCode() == 't'){
						$note = "<span style='color:red'>" . $note."</span>";
					}*/
					$note = trim($note);
					if (strlen($note) > 0){
						$toc[] = array('code'=>$subfield->getCode(), 'content'=>$note);
					}
				}
			}
			$interface->assign('toc', $toc);
		}
		
		$notes = array();
		$noteFields = array();
		$noteFields['Notes'] = $marcRecord->getFields('500');
		$noteFields['System Details'] = $marcRecord->getFields('538');
		$noteFields['Awards'] = $marcRecord->getFields('586');
		if ($noteFields){
			foreach ($noteFields as $key => $marcField){
				if(is_array($marcField)){
					$notes_all = '';
					foreach($marcField as $mf){
						$notes_all .= $this->getNotes($mf)."<br/>";
					}
					$note = substr($notes_all, 0, -5);//remove last <br/>
					if(!empty($note)){
						$notes[$key] = $note;
					}
				}else{
					$note = $this->getNotes($marcField);
					if(!empty($note)){
						$notes[$key] = $note;
					}
				}
	
			}
		}
/*
		$additionalNotesFields = array(
          '310' => 'Current Publication Frequency',
          '321' => 'Former Publication Frequency',
          '351' => 'Organization & arrangement of materials',
          '362' => 'Dates of publication and/or sequential designation',
		      '590' => 'Local note',

		);
		foreach ($additionalNotesFields as $tag => $label){
			$marcFields = $marcRecord->getFields($tag);
			foreach ($marcFields as $marcField){
				$noteText = array();
				foreach ($marcField->getSubFields() as $subfield){
					$noteText[] = $subfield->getData();
				}
				$note = implode(',', $noteText);
				if (strlen($note) > 0){
					$notes[] = $label . ': ' . $note;
				}
			}
		}
*/
		if (count($notes) > 0){
			$interface->assign('notes', $notes);
		}
		$internetLinks = $this->get856Links($marcRecord);
		if (count($internetLinks) > 0){
			$interface->assign('internetLinks', $internetLinks);
		}
		$supLinks = $this->get856Links($marcRecord, true);
		if (count($supLinks) > 0){
			$interface->assign('supLinks', $supLinks);
		}
		/*if (isset($purchaseLinks) && count($purchaseLinks) > 0){
			$interface->assign('purchaseLinks', $purchaseLinks);
		}*/

		//Determine the cover to use
		$bookCoverUrl = $configArray['Site']['coverUrl'] . "/bookcover.php?id={$this->id}&amp;isn={$this->isbn}&amp;size=large&amp;upc={$this->upc}&amp;oclc={$this->oclc}&amp;category=" . urlencode($format_category) . "&amp;format=" . urlencode(isset($recordFormat[0]) ? $recordFormat[0] : '');
		
		$interface->assign('bookCoverUrl', $bookCoverUrl);
		
		//Load accelerated reader data
		if (isset($record['accelerated_reader_interest_level'])){
			$arData = array(
				'interestLevel' => $record['accelerated_reader_interest_level'],
				'pointValue' => $record['accelerated_reader_point_value'],
				'readingLevel' => $record['accelerated_reader_reading_level']
			);
			$interface->assign('arData', $arData);
		}
		
		if (isset($record['lexile_score'])){
			$interface->assign('lexileScore', $record['lexile_score']);
		}


		//Do actions needed if this is the main action.

		//$interface->caching = 1;
		$interface->assign('id', $this->id);
		if (substr($this->id, 0, 1) == '.'){
			$interface->assign('shortId', substr($this->id, 1));
		}else{
			$interface->assign('shortId', $this->id);
		}

		$interface->assign('addHeader', '<link rel="alternate" type="application/rdf+xml" title="RDF Representation" href="' . $configArray['Site']['url']  . '/Record/' . urlencode($this->id) . '/RDF" />');

		// Define Default Tab
		$tab = (isset($_GET['action'])) ? $_GET['action'] : 'Description';
		$interface->assign('tab', $tab);

		if (isset($_REQUEST['detail'])){
			$detail = strip_tags($_REQUEST['detail']);
			$interface->assign('defaultDetailsTab', $detail);
		}

		// Define External Content Provider
		if ($this->marcRecord->getField('020')) {
			if (isset($configArray['Content']['reviews'])) {
				$interface->assign('hasReviews', true);
			}
			if (isset($configArray['Content']['excerpts'])) {
				$interface->assign('hasExcerpt', true);
			}
		}

		// Retrieve User Search History
		$interface->assign('lastsearch', isset($_SESSION['lastSearchURL']) ?
		$_SESSION['lastSearchURL'] : false);

		// Retrieve tags associated with the record
		$limit = 5;
		$resource = new Resource();
		$resource->record_id = $_GET['id'];
		$resource->source = 'VuFind';
		$resource->find(true);
		$tags = array();
		$tags = $resource->getTags($limit);
		$interface->assign('tagList', $tags);
		$timer->logTime('Got tag list');

		$this->cacheId = 'Record|' . $_GET['id'] . '|' . get_class($this);

		// Find Similar Records
		// Try Novelist first
		if ($this->isbn){
			$similarTitles = $novelist->getSimilarTitles();
			//echo "number of similar titles from Novelist ".sizeof($similarTitles);
			$interface->assign('similarTitles', $similarTitles);		
			$timer->logTime('Loaded similar titles from Novelist');
		}
		//if not found in Novelist, try in the catalog
		if (sizeof($similarTitles) == 0) {
			//echo "no similar titles from Novelist";
			global $memcache;
			$similar = $memcache->get('similar_titles_' . $this->id);
			if ($similar == false){
			$similar = $this->db->getMoreLikeThis($this->id);
			// Send the similar items to the template; if there is only one, we need
			// to force it to be an array or things will not display correctly.
			if (isset($similar) && count($similar['response']['docs']) > 0) {
				$similar = $similar['response']['docs'];
			}else{
				$similar = array();
				$timer->logTime("Did not find any similar records");
			}
			$memcache->set('similar_titles_' . $this->id, $similar, 0, $configArray['Caching']['similar_titles']);
			}
			$interface->assign('similarRecords', $similar);
			$timer->logTime('Loaded similar records from Catalog');
		}
		
		// find similar authors
		if ($this->isbn){
			$similarAuthors = $novelist->getSimilarAuthors();
			//echo " number of similar authors from Novelist ".sizeof($similarAuthors);
			$interface->assign('similarAuthors', $similarAuthors);		
			$timer->logTime('Loaded similar authors from Novelist');
		}

		// find similar series
		if ($this->isbn){
			$similarSeries = $novelist->getSimilarSeries();
			//echo " number of similar series from Novelist ".sizeof($similarSeries);
			$interface->assign('similarSeries', $similarSeries);		
			$timer->logTime('Loaded similar Series from Novelist');
		}
		
		//// Find Other Editions
		////if ($configArray['Content']['showOtherEditionsPopup'] == false){
		//	$editions = OtherEditionHandler::getEditions($this->id, $this->isbn, isset($this->record['issn']) ? $this->record['issn'] : null);
		//	if (!PEAR::isError($editions)) {
		//		$interface->assign('editions', $editions);
		//	}else{
		//		$logger->logTime("Did not find any other editions");
		//	}
		//	$timer->logTime('Got Other editions');
		//}
		
		//$interface->assign('showStrands', isset($configArray['Strands']['APID']) && strlen($configArray['Strands']['APID']) > 0);

		// Send down text for inclusion in breadcrumbs
		$interface->assign('breadcrumbText', $this->recordDriver->getBreadcrumb());

		// Send down OpenURL for COinS use:
		$interface->assign('openURL', $this->recordDriver->getOpenURL());

		// Send down legal export formats (if any):
		$interface->assign('exportFormats', $this->recordDriver->getExportFormats());

		// Set AddThis User
		$interface->assign('addThis', isset($configArray['AddThis']['key']) ?
		$configArray['AddThis']['key'] : false);

		// Set Proxy URL
		if (isset($configArray['EZproxy']['host'])) {
			$interface->assign('proxy', $configArray['EZproxy']['host']);
		}

		//setup 5 star ratings
		global $user;
		$ratingData = $resource->getRatingData($user);
		$interface->assign('ratingData', $ratingData);
		$timer->logTime('Got 5 star data');

		$this->getNextPrevLinks();

		//Load Staff Details
		$interface->assign('staffDetails', $this->recordDriver->getStaffView());


		// load GoodReads
		$goodreads_url = $novelist->novelist_data['FeatureContent']['GoodReads']['links'][0]['url'];
		$goodreads_total_reviews =  number_format($novelist->novelist_data['FeatureContent']['GoodReads']['work_text_reviews_count']);
		$goodreads_rating =  $novelist->novelist_data['FeatureContent']['GoodReads']['average_rating'];

		$interface->assign(array(
			'goodreads_link' => $goodreads_url, 
			'goodreads_total_reviews' => $goodreads_total_reviews,
			'goodreads_rating' => $goodreads_rating
		));

	}
	
	function getNextPrevLinks(){
		global $interface;
		global $timer;
		//Setup next and previous links based on the search results.
		if (isset($_REQUEST['searchId'])){
			//rerun the search
			$s = new SearchEntry();
			$s->id = $_REQUEST['searchId'];
			$interface->assign('searchId', $_REQUEST['searchId']);
			$currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
			$interface->assign('page', $currentPage);

			$s->find();
			if ($s->N > 0){
				$s->fetch();
				$minSO = unserialize($s->search_object);
				$searchObject = SearchObjectFactory::deminify($minSO);
				$searchObject->setPage($currentPage);
				//Run the search
				$result = $searchObject->processSearch(true, false, false);

				//Check to see if we need to run a search for the next or previous page
				$currentResultIndex = $_REQUEST['recordIndex'] - 1;
				$recordsPerPage = $searchObject->getLimit();

				if (($currentResultIndex) % $recordsPerPage == 0 && $currentResultIndex > 0){
					//Need to run a search for the previous page
					$interface->assign('previousPage', $currentPage - 1);
					$previousSearchObject = clone $searchObject;
					$previousSearchObject->setPage($currentPage - 1);
					$previousSearchObject->processSearch(true, false, false);
					$previousResults = $previousSearchObject->getResultRecordSet();
				}else if (($currentResultIndex + 1) % $recordsPerPage == 0 && ($currentResultIndex + 1) < $searchObject->getResultTotal()){
					//Need to run a search for the next page
					$nextSearchObject = clone $searchObject;
					$interface->assign('nextPage', $currentPage + 1);
					$nextSearchObject->setPage($currentPage + 1);
					$nextSearchObject->processSearch(true, false, false);
					$nextResults = $nextSearchObject->getResultRecordSet();
				}

				if (PEAR::isError($result)) {
					//If we get an error excuting the search, just eat it for now.
				}else{
					if ($searchObject->getResultTotal() < 1) {
						//No results found
					}else{
						$recordSet = $searchObject->getResultRecordSet();
						//Record set is 0 based, but we are passed a 1 based index
						if ($currentResultIndex > 0){
							if (isset($previousResults)){
								$previousRecord = $previousResults[count($previousResults) -1];
							}else{
								$previousRecord = $recordSet[$currentResultIndex - 1 - (($currentPage -1) * $recordsPerPage)];
							}
						//Convert back to 1 based index
							$interface->assign('previousIndex', $currentResultIndex - 1 + 1);
							$interface->assign('previousTitle', $previousRecord['title']);
							if (strpos($previousRecord['id'], 'econtentRecord') === 0){
								$interface->assign('previousType', 'EcontentRecord');
								$interface->assign('previousId', str_replace('econtentRecord', '', $previousRecord['id']));
							}else{
								$interface->assign('previousType', 'Record');
								$interface->assign('previousId', $previousRecord['id']);
							}
						}
						if ($currentResultIndex + 1 < $searchObject->getResultTotal()){

							if (isset($nextResults)){
								$nextRecord = $nextResults[0];
							}else{
								$nextRecordIndex = $currentResultIndex + 1 - (($currentPage -1) * $recordsPerPage);
								if (isset($recordSet[$nextRecordIndex])){
									$nextRecord = $recordSet[$nextRecordIndex];
								}
							}
							//Convert back to 1 based index
							if (isset($nextRecord)){
								$interface->assign('nextIndex', $currentResultIndex + 1 + 1);
								$interface->assign('nextTitle', $nextRecord['title']);
								if (strpos($nextRecord['id'], 'econtentRecord') === 0){
									$interface->assign('nextType', 'EcontentRecord');
									$interface->assign('nextId', str_replace('econtentRecord', '', $nextRecord['id']));
								}else{
									$interface->assign('nextType', 'Record');
									$interface->assign('nextId', $nextRecord['id']);
								}
							}
						}

					}
				}
			}
			$timer->logTime('Got next/previous links');
		}
	}

	/**
	 * Record a record hit to the statistics index when stat tracking is enabled;
	 * this is called by the Home action.
	 */
	public function recordHit()
	{
		//Don't do this since we implemented stats in MySQL rather than Solr
		/*global $configArray;

		if ($configArray['Statistics']['enabled']) {
		// Setup Statistics Index Connection
		$solrStats = new SolrStats($configArray['Statistics']['solr']);
		if ($configArray['System']['debugSolr']) {
		$solrStats->debug = true;
		}

		// Save Record View
		$solrStats->saveRecordView($this->recordDriver->getUniqueID());
		unset($solrStats);
		}*/
	}

	public function getSubfieldData($marcField, $subField){
		if ($marcField){
			return $marcField->getSubfield($subField) ? $marcField->getSubfield($subField)->getData() : '';
		}else{
			return '';
		}
	}
	public function concatenateSubfieldData($marcField, $subFields){
		$value = '';
		foreach ($subFields as $subField){
			$subFieldValue = $this->getSubfieldData($marcField, $subField);
			if (strlen($subFieldValue) > 0){
				$value .= ' ' . $subFieldValue;
			}
		}
		return $value;
	}
	private function getNotes($marcField){
		$notes = '';
		foreach ($marcField->getSubFields() as $subfield){
			$note = $subfield->getData();
			if ($subfield->getCode() == 't'){
				$note = "&nbsp;&nbsp;&nbsp;" . $note;
			}
			$note = trim($note);
			if (strlen($note) > 0){
				$notes .= $note;
			}
		}
		return $notes;
	}
	private function multi_unique($array) {
		$new = array();
		$new1 = array();
        foreach ($array as $k=>$na)
            $new[$k] = serialize($na);
        $uniq = array_unique($new);
        foreach($uniq as $k=>$ser)
            $new1[$k] = unserialize($ser);
        return ($new1);
    }
    /**
     * Takes a marcrecord sub type from 856 and return whether its full-text or supplemental
     */
    private function isLinkFull($marcField){
    	$ind = $marcField->getIndicator(2);
    	switch ((int)$ind){
    		case 2:
    			return false;
    		case 0:
    		case 1:
    		//case blank ?
    		default:
    			return true;
    	}
    	
    }
    protected function get856Links($marcRecord, $supp = false){
    	global $configArray; 
    	$linkFields =$marcRecord->getFields('856') ;
    	$internetLinks = array();
    	if ($linkFields){
    		$field856Index = 0;
    		foreach ($linkFields as $marcField){
    			$field856Index++;
    			$isFull = $this->isLinkFull($marcField);
    			//Get the link
    			if ($marcField->getSubfield('u') && ($isFull != $supp)){
    				$link = $marcField->getSubfield('u')->getData();
    				if ($marcField->getSubfield('3')){
    					$linkText = $marcField->getSubfield('3')->getData();
    				}elseif ($marcField->getSubfield('y')){
    					$linkText = $marcField->getSubfield('y')->getData();
    				}elseif ($marcField->getSubfield('z')){
    					$linkText = $marcField->getSubfield('z')->getData();
    				}else{
    					$linkText = $link;
    				}
    				$showLink = true;
    				//Process some links differently so we can either hide them
    				//or show them in different areas of the catalog.
    				if (preg_match('/purchase|buy/i', $linkText) ||
    						preg_match('/barnesandnoble|tatteredcover|amazon|smashwords\.com/i', $link)){
    					$showLink = false;
    				}
    				$isBookLink = preg_match('/acs\.dcl\.lan|vufind\.douglascountylibraries\.org|catalog\.douglascountylibraries\.org/i', $link);
    				if ($isBookLink == 1){
    					//e-book link, don't show
    					$showLink = false;
    				}
    	
    				if ($showLink){
    					//Rewrite the link so we can track usage
    					$link = $configArray['Site']['path'] . '/Record/' . $this->id . '/Link?index=' . $field856Index;
    					$internetLinks[] = array(
    							'link' => $link,
    							'linkText' => $linkText,
    					);
    				}
    			}
    		}
    	}
    	return $internetLinks;
    }


}