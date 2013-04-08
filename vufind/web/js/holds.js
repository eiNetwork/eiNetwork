function updateSelectedHolds(){
	var selectedTitles = getSelectedTitles();
	alert(selectedTitles);
	if (selectedTitles.length == 0){
		return false;
	}
	var newLocation = $('select:[name=withSelectedLocation]').val();
	var url = path + '/MyResearch/Holds?multiAction=updateSelected&location=' + newLocation + "&" + selectedTitles;
	window.location = url;
	return false;
}

function updateSeledHold(obj){
	var data = $(obj).attr('name')+'='+$(obj).attr('id');
	var newLocation =  $('select:[name=withSelectedLocation]').val();
	var url = path + '/MyResearch/Holds?multiAction=updateSelected&location=' + newLocation + "&" + data;
	window.location = url;
	return false;
}
function cancelSelectedHolds(obj){
	var selectedTitles = getSelectedTitles(obj);
	if (selectedTitles.length == 0){
		return false;
	}
	var url = path + '/MyResearch/Holds?multiAction=cancelSelected&' + selectedTitles;
	window.location = url;
	return false;
}
function freezeSelectedHolds(obj){
	var selectedTitles = getSelectedTitles(obj);
	if (selectedTitles.length == 0){
		return false;
	}
	var suspendDate = '';
	//Check to se whether or not we are using a suspend date.
	if ($('#suspendDateTop').length){
		if ($('#suspendDateTop').val().length > 0){
			var suspendDate = $('#suspendDateTop').val();
		}else{
			var suspendDate = $('#suspendDateBottom').val();
		}	
		if (suspendDate.length == 0){
			alert("Please select the date when the hold should be reactivated.");
			return false;
		}
		var url = path + '/MyResearch/Holds?multiAction=freezeSelected&' + selectedTitles + '&suspendDate=' + suspendDate;
		window.location = url;
	}else{
		var url = path + '/MyResearch/Holds?multiAction=freezeSelected&' + selectedTitles + '&suspendDate=' + suspendDate;
		window.location = url;
		
	}
	return false;
}

function thawSelectedHolds(obj){
	var selectedTitles = getSelectedTitles(obj);
	if (selectedTitles.length == 0){
		return false;
	}
	var url = path + '/MyResearch/Holds?multiAction=thawSelected&' + selectedTitles;
	window.location = url;
	return false;
}

//function getSelectedTitles(){
//	var selectedTitles = $("input.titleSelect:checked ").map(function() {
//		return $(this).attr('name') + "=" + $(this).val();
//	}).get().join("&");
//	if (selectedTitles.length == 0){
//		var ret = alert('You have not selected any items, please select items to renew');
//	}
//	return selectedTitles;
//}

function getSelectedTitles(obj){
	var name=$(obj).attr("name");
	var id=$(obj).attr("id");
	var selectedTitles=name+"="+id;
	return selectedTitles;
	}

function renewSelectedTitles(){
	var selectedTitles = getSelectedTitles();
	if (selectedTitles.length > 0){ 
		$('#renewForm').submit()
	}
	return false;
}