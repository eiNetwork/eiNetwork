<?php

require_once('Drivers/marmot_inc/ISBNConverter.php') ;

class NovelistNew {

	function __construct($isbn){

		global $library;
		global $timer;
		global $configArray;
		global $memcache;
		
		if (isset($configArray['Novelist']) && isset($configArray['Novelist']['profile']) && strlen($configArray['Novelist']['profile']) > 0){
			
			$profile = $configArray['Novelist']['profile'];
			$pwd = $configArray['Novelist']['pwd'];
			$upc = null;

		}

		$cached_novelist = $memcache->get("novelist_data_$isbn");

		$this->novelist_data = isset($cached_novelist) ? $cached_novelist : null;

		if (!isset($this->novelist_data)){

			$url = "http://novselect.ebscohost.com/Data/ContentByQuery?profile=$profile&password=$pwd&ClientIdentifier=$isbn&ISBN=$isbn&UPC=$upc&version=2.1";

			$curl_connection = curl_init();

			curl_setopt($curl_connection, CURLOPT_URL, $url);
			curl_setopt($curl_connection, CURLOPT_REFERER, 'http://test1.vufindplus.einetwork.net'); 
			curl_setopt($curl_connection, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl_connection, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
			//curl_setopt($curl_connection, CURLOPT_HEADER, (int)$header);
			curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, 0);
			$html = curl_exec($curl_connection);
			
			$this->novelist_data = json_decode($html, true);
			
			$memcache->set("novelist_data_$isbn", $this->novelist_data);

		}

		$this->test = $this->novelist_data;
	}

	function getSeries(){

		if (isset($this->novelist_data['FeatureContent']['SeriesInfo'])){
			$series_info = $this->novelist_data['FeatureContent']['SeriesInfo'];
		}

		if (isset($series_info)){

			return $series_info['series_titles'];

		} else {

			return null;

		}

	}

	function getSimilarTitles(){

		if (isset($this->novelist_data['FeatureContent']['SimilarTitles'])){
			$similarTitles = $this->novelist_data['FeatureContent']['SimilarTitles'];
		}
	
		if (isset($similarTitles)){
		
			return $similarTitles['titles'];
		
		} else {
		
			return null;
		
		}

	}
	
	function getSimilarAuthors(){

		if (isset($this->novelist_data['FeatureContent']['SimilarAuthors'])){
			$similarAuthors = $this->novelist_data['FeatureContent']['SimilarAuthors'];
		}
	
		if (isset($similarAuthors)){
		
			return $similarAuthors['authors'];
		
		} else {
		
			return null;
		
		}

	}	

	function getSimilarSeries(){
		
		if (isset($this->novelist_data['FeatureContent']['SimilarSeries'])){
			$similarSeries = $this->novelist_data['FeatureContent']['SimilarSeries'];
		}
	
		if (isset($similarSeries)){
		
			return $similarSeries['series'];
		
		} else {
		
			return null;
		
		}

	}

	function getGoodReads(){

		echo "<pre>";
		print_r($this->novelist_data['FeatureContent']);
		echo "</pre>";

	}
}

?>