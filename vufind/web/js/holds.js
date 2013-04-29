$(document).ready(function() {
	$('#update-selected-btn').click(function(){
		updateSelected();
	});
	
	$('#freeze-all-btn').click(function(){
		freezeAll();
	});
});

function freezeAll(){
	
	var inputs = $('.freeze_checkboxes');

    var values = {};
    
    inputs.each(function() {
    	
    	if ($(this).is(':checked') ){
    		$(this).val('on')
    	} else {
    		$(this).val('on')
    	}
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Attempting to freeze all your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
				document.location.href='/MyResearch/Holds';
		}
	});
	
}

function updateSelected(){
	
	var inputs = $('#items-hold :input, select');

    var values = {};
    inputs.each(function() {
    	if ($(this).is(':checked')){
    		$(this).val('on')
    	} else {
    		$(this).val('off')
    	}
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Updating your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
				document.location.href='/MyResearch/Holds';
		}
	});
	
	
}
