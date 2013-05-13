function getSelectedTitles(){
	var selectedTitles = $("input.titleSelect:checked ").map(function() {
		return $(this).attr('name') + "=" + $(this).val();
	}).get().join("&");
	if (selectedTitles.length == 0){
		var ret = alert('You have not selected any items, please select items to renew');
	}
	return selectedTitles;
}

function renewSelectedTitles(){

	/*
	showProcessingIndicator('Renewing your items. This may take a minute.');

	var selectedTitles = getSelectedTitles();
	if (selectedTitles.length > 0){ 
		$('#renewForm').submit()
	}*/


	var selectedTitles = getSelectedTitles();
	if (selectedTitles.length > 0){

		if (navigator.userAgent.indexOf('Firefox') != -1){
			$('.loading-frame').css('display','none'); // fix for firefox to display iframe with loading throbber
			$('#renewForm').submit();
			$('.loading-frame').css('display','block');
			showProcessingIndicator('Renewing your items. This may take a minute.');
		} else {
			showProcessingIndicator('Renewing your items. This may take a minute.');
			$('#renewForm').submit();
		}

	}

	return false;
}