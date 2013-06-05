<?php

class ContentCafe {

	function __construct($configArray){

		$this->configArray = $configArray;
		$this->logger = new Logger();

	}

	function ccConnect($isbn, $content){

		// setup SOAP client
		$soapClient = new SoapClient('http://contentcafe2.btol.com/contentcafe/contentcafe.asmx?wsdl', array("trace" => 1, "exception" => 0));

		$auth = array(
		   'userID'   => $this->configArray['ContentCafe']['uname'],
		   'password' => $this->configArray['ContentCafe']['pw'],
		   'key'  => $isbn,
		   'content' => $content
		);

		return $soapClient->Single($auth);

	}

	function getSummary($isbn, $upc){

		$content = 'AnnotationDetail';

		if ($isbn){
			$value = $isbn;
		} elseif ($upc){
			$value = $upc;
		} else {
			$this->logger->logTime("ContentCafe - No UPC or ISBN provided");
			return false;
		}

		$response = $this->ccConnect($value, $content);

		$annotation_items = $response->ContentCafe->RequestItems->RequestItem->AnnotationItems->AnnotationItem;

		if (is_array($annotation_items) && count($annotation_items) > 1){
			$summaryInfo['summary'] = $annotation_items[0]->Annotation;
		} else {
			//TODO - Find test case where item that has only 1 and zero annotation items
			$this->logger->logTime("ContentCafe - Cannot find a summary");
			return false;

		}

		return $summaryInfo;

	}

	function getToc($isbn, $upc){

		$content = 'TocDetail';

		if ($isbn){
			$value = $isbn;
		} elseif ($upc){
			$value = $upc;
		} else {
			$this->logger->logTime("ContentCafe - No UPC or ISBN provided");
			return false;
		}

		$response = $this->ccConnect($value, $content);

		$toc = $response->ContentCafe->RequestItems->RequestItem->TocItems->TocItem->Toc;

		return $toc;

	}

}

?>