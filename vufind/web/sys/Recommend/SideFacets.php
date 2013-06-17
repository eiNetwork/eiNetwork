<?php
/**
 *
 * Copyright (C) Villanova University 2010.
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

require_once 'sys/Recommend/Interface.php';

/**
 * SideFacets Recommendations Module
 *
 * This class provides recommendations displaying facets beside search results
 */
class SideFacets implements RecommendationInterface
{
	private $searchObject;
	private $mainFacets;
	private $checkboxFacets;

	/* Constructor
	 *
	 * Establishes base settings for making recommendations.
	 *
	 * @access  public
	 * @param   object  $searchObject   The SearchObject requesting recommendations.
	 * @param   string  $params         Additional settings from the searches.ini.
	 */
	public function __construct($searchObject, $params) {
		// Save the passed-in SearchObject:
		$this->searchObject = $searchObject;

		// Parse the additional settings:
		$params = explode(':', $params);
		$mainSection = empty($params[0]) ? 'Results' : $params[0];
		$checkboxSection = isset($params[1]) ? $params[1] : false;
		$iniName = isset($params[2]) ? $params[2] : 'facets';

		// Load the desired facet information:
		$searchLibrary = Library::getSearchLibrary();
		if ($searchLibrary == null || count($searchLibrary->facets) == 0){
			$config = getExtraConfigArray($iniName);
			$this->mainFacets = isset($config[$mainSection]) ? $config[$mainSection] : array();
			foreach ($this->mainFacets as $name => $desc){
				if ($name == 'time_since_added'){
					//Check to see if we have an active library
					global $librarySingleton;
					$searchLibrary = $librarySingleton->getSearchLibrary();
					if ($searchLibrary != null){
						unset ($this->mainFacets[$name]);
						$this->mainFacets['local_time_since_added_' . $searchLibrary->subdomain] = $desc;
					}
				}
			}
		}else{
			$this->mainFacets = array();
			foreach ($searchLibrary->facets as $facet){
				if ($mainSection == 'Results'){
					if ($facet->showInResults == 1 && $facet->showAboveResults == 0){
						if ($facet->facetName == 'time_since_added'){
							//Check to see if we have an active library
							$this->mainFacets['local_time_since_added_' . $searchLibrary->subdomain] =  $facet->displayName;
						}else{
							$this->mainFacets[$facet->facetName] = $facet->displayName;
						}
					}
				}elseif ($mainSection == 'Author'){
					if ($facet->showInAuthorResults == 1 && $facet->showAboveResults == 0){
						if ($facet->facetName == 'time_since_added'){
							//Check to see if we have an active library
							$this->mainFacets['local_time_since_added_' . $searchLibrary->subdomain] =  $facet->displayName;
						}else{
							$this->mainFacets[$facet->facetName] = $facet->displayName;
						}
					}
				}
			}
		}

		$this->checkboxFacets = ($checkboxSection && isset($config[$checkboxSection])) ? $config[$checkboxSection] : array();

	}

	/* init
	 *
	 * Called before the SearchObject performs its main search.  This may be used
	 * to set SearchObject parameters in order to generate recommendations as part
	 * of the search.
	 *
	 * @access  public
	 */
	public function init() {
		// Turn on side facets in the search results:
		foreach($this->mainFacets as $name => $desc) {
			$this->searchObject->addFacet($name, $desc);
		}
		foreach($this->checkboxFacets as $name => $desc) {
			$this->searchObject->addCheckboxFacet($name, $desc);
		}
	}

	/* process
	 *
	 * Called after the SearchObject has performed its main search.  This may be
	 * used to extract necessary information from the SearchObject or to perform
	 * completely unrelated processing.
	 *
	 * @access  public
	 */
	public function process() {
		global $interface;
		global $configArray;
		$interface->assign('checkboxFilters', $this->searchObject->getCheckboxFacets());
		//Process the side facet set to handle the Added In Last facet which we only want to be
		//visible if there is not a value selected for the facet (makes it single select
		$sideFacets = $this->searchObject->getFacetList($this->mainFacets);
		global $librarySingleton;
		$searchLibrary = $librarySingleton->getSearchLibrary();
		$timeSinceAddedFacet = 'time_since_added';
		if ($searchLibrary != null){
			$timeSinceAddedFacet = 'local_time_since_added_' . $searchLibrary->subdomain;
		}
		if (isset($sideFacets[$timeSinceAddedFacet])){
			//See if there is a value selected
			$valueSelected = false;
			foreach ($sideFacets[$timeSinceAddedFacet]['list'] as $facetKey => $facetValue){
				if (isset($facetValue['isApplied']) && $facetValue['isApplied'] == true){
					$valueSelected = true;
				}
			}
			if ($valueSelected){
				//Get rid of all values except the selected value which will allow the value to be removed
				foreach ($sideFacets[$timeSinceAddedFacet]['list'] as $facetKey => $facetValue){
					if (!isset($facetValue['isApplied']) || $facetValue['isApplied'] == false){
						unset($sideFacets[$timeSinceAddedFacet]['list'][$facetKey]);
					}
				}
			}else{
				//Make sure to show all values
				$sideFacets[$timeSinceAddedFacet]['valuesToShow'] = count($sideFacets[$timeSinceAddedFacet]['list']);
				//Reverse the display of the list so Day is first and year is last
				$sideFacets[$timeSinceAddedFacet]['list'] = array_reverse($sideFacets[$timeSinceAddedFacet]['list']);
			}
		}

		//Check to see if there is a facet for ratings
		if (isset($sideFacets['rating_facet'])){
			$ratingApplied = false;
			foreach ($sideFacets['rating_facet']['list'] as $facetValue ){
				if ($facetValue['isApplied']){
					$ratingApplied = true;
					$ratingLabels = array($facetValue['value']);
				}
			}

			if (!$ratingApplied){
				$ratingLabels =array('fiveStar','fourStar','threeStar','twoStar','oneStar', 'Unrated');
			}
			$interface->assign('ratingLabels', $ratingLabels);
		}

		//if (isset($sideFacets['available_at'])){
		//	//Mangle the availability facets
		//	$oldFacetValues = $sideFacets['available_at']['list'];
		//	ksort($oldFacetValues);
		//	global $locationSingleton;
		//	global $user;
		//	global $librarySingleton;
		//	$filters = $this->searchObject->getFilterList();
		//	$appliedAvailability = array();
		//	foreach ($filters as $appliedFilters){
		//		foreach ($appliedFilters as $filter){
		//			if ($filter['field'] == 'available_at'){
		//				$appliedAvailability[$filter['value']] = $filter['removalUrl'];
		//			}
		//		}
		//	}
		//
		//	$availableAtFacets = array();
		//	foreach ($oldFacetValues as $facetKey => $facetInfo){
		//		if (strlen($facetKey) > 1){
		//			$sortIndicator = substr($facetKey, 0, 1);
		//			if ($sortIndicator >= '1' && $sortIndicator <= '4'){
		//				$availableAtFacets[$facetKey] = $facetInfo;
		//			}
		//		}
		//	}
		//
		//	$includeAnyLocationFacet = $this->searchObject->getFacetSetting("Availability", "includeAnyLocationFacet");
		//	//print_r ("includeAnyLocationFacet = $includeAnyLocationFacet");
		//	if ($includeAnyLocationFacet == '' || $includeAnyLocationFacet == true){
		//		$anyLocationLabel = $this->searchObject->getFacetSetting("Availability", "anyLocationLabel");
		//		//print_r ("anyLocationLabel = $anyLocationLabel");
		//		$availableAtFacets['*'] = array(
		//			'value' => '*',
		//			'display' => $anyLocationLabel == '' ? "Any Library Location" : $anyLocationLabel,
		//			'count' => $this->searchObject->getResultTotal() - (isset($oldFacetValues['']['count']) ? $oldFacetValues['']['count'] : 0),
		//			'url' => $this->searchObject->renderLinkWithFilter('available_at:*'),
		//			'isApplied' => array_key_exists('*', $appliedAvailability),
		//			'removalUrl' => array_key_exists('*', $appliedAvailability) ? $appliedAvailability['*'] : null
		//		);
		//	}
		//	$sideFacets['available_at']['list'] = $availableAtFacets;
		//	//print_r($sideFacets['available_at']);
		//}
		
		//if (isset($sideFacets['building'])){
		//	$filters = $this->searchObject->getFilterList();
		//	echo '<pre>';
		//	print_r($filters);
		//	echo '</pre>';
		//	foreach ($filters as $availableFilters){
		//		foreach ($availableFilters as $filter){
		//			if ($filter['field'] == 'building'){
		////				$appliedAvailabilit[$filter['value']] = $filter['removalUrl'];
		//			}
		//		}
		//	}
		//}
		
		$useLocation = isset($_SESSION['useLocation'])?$_SESSION['useLocation']:false;
		$searchLocation = Location::getSearchLocation();
		$filterList = $this->searchObject->getFilterList(true);
		if(isset($searchLocation) && !is_null($searchLocation)){
			foreach($sideFacets as $key=>$filter){
				if($key == 'building'){
					foreach($filter as $k=>$f){
						if($k == 'list'){
							foreach($f as $y=>$x){
								if($x['value'] == $searchLocation->defaultLocationFacet && $useLocation){
									$sideFacets[$key][$k][$y]['removalUrl'] = $sideFacets[$key][$k][$y]['removalUrl']."&useLocation=0";
								}
							}
						}
					}
					
				}
			}
			
			foreach($filterList as $key=>$filter){
				if($key == 'Location'){
					foreach($filter as $k=>$f){
						if( $f['value']== $searchLocation->defaultLocationFacet && $useLocation){
							$filterList[$key][$k]['removalUrl'] = $filterList[$key][$k]['removalUrl']."&useLocation=0";
						}
					}
				}
			}
		}
		if ($searchLibrary != null && count($searchLibrary->facets) > 0){
			foreach ($searchLibrary->facets as $facet){
				if (array_key_exists($facet->facetName, $sideFacets)){
					if ($facet->sortMode == 'alphabetically'){
						asort($sideFacets[$facet->facetName]['list']);
					}
					$sideFacets[$facet->facetName]['valuesToShow'] = $facet->numEntriesToShowByDefault;
					if ($facet->showAsDropDown){
						$sideFacets[$facet->facetName]['showAsDropDown'] = $facet->showAsDropDown;
					}
				}

			}
		}
		$interface->assign('filterList', $filterList);
		$interface->assign('useLocation', $useLocation);
		$interface->assign('searchLibrary', $searchLibrary);
		$interface->assign('sideFacetSet', $sideFacets);
	}

	/* getTemplate
	 *
	 * This method provides a template name so that recommendations can be displayed
	 * to the end user.  It is the responsibility of the process() method to
	 * populate all necessary template variables.
	 *
	 * @access  public
	 * @return  string      The template to use to display the recommendations.
	 */
	public function getTemplate() {
		return 'Search/Recommend/SideFacets.tpl';
	}
}