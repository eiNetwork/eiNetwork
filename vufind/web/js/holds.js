var activeOverDriveConnections = 0;

$(document).ready(function() {
	$('#update-selected-btn').click(function(){
		checkSelected();
	});
	
	$('#freeze-all-btn').click(function(){
		freezeAll();
	});
	
	$('#unfreeze-all-btn').click(function(){
		unfreezeAll();
	});

	$('.location_dropdown').change(function(){
        $(this).attr('data-changed', 'true');
    });
});

function freezeAll(){
	
	//var inputs = $('#items-hold :input, select');

    var values = {};
    
    $('.update_all').each(function() {
    
    	//alert($(this).val());
    	
    	if ($(this).is('input')){
	    	$(this).val('on');	
    	}
    	
    	/*
    	if ($(this).is('input')){
    	
    		if ($(this).attr('id') == 'frozen_state_off'){
	    		
	    		$(this).val('on');
	    		
	    	} else {
    		
    			$(this).val('on')
	    		    		
    		}
    	
	    	
    	}*/
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Freezing all your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
			document.location.href='/MyResearch/Holds';
		}
	});
	
}

function unfreezeAll(){
	
	//var inputs = $('#items-hold :input, select');

    var values = {};
    
    $('.update_all').each(function() {
    
    	//alert($(this).val());
    	
    	if ($(this).is('input')){
	    	$(this).val('off');
    	}
    	    	
    	values[this.name] = $(this).val();
    	
    });
    
    showProcessingIndicator('Unfreezing all your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
			document.location.href='/MyResearch/Holds';
		}
	});
	
}

function checkSelected(){

    var values = {};
    var od_cancelations = [];

    var location_dropdown_selected = false;
    var physical_items_changed = false;
    var econtent_changed = false;
    
    // check to see if any freeze requests for physical items
    $('.freeze_checkboxes').each(function(){

    	if ($(this).attr('id') == 'frozen_state_on' && $(this).prop('checked') == true){
	    		
    		$(this).val('off');
    		
    	} else if ($(this).attr('id') == 'frozen_state_on' && $(this).prop('checked') == false){
    	
    		$(this).val('on');
    		
		} else if($(this).attr('id') == 'frozen_state_off' && $(this).prop('checked') == true){
    		
    		$(this).val('on');
    		
		} else if($(this).attr('id') == 'frozen_state_off' && $(this).prop('checked') == false){
		
			$(this).val('off');

		} else {

			if ($(this).prop('checked') == true){
	    		
	    		$(this).val('on')

	    	} else {

	    		$(this).val('off')

	    	}

		}

		values[this.name] = $(this).val();

    });

    // check to see if any cancelations for physical items
    $('.cancel_checkboxes').each(function(){

    	if ($(this).prop('checked') == true){
    		$(this).val('on')

    		values[this.name] = $(this).val();

    	} else {
    		
    		$(this).val('off')
    	}

    });

    // check to see if any locations changed
    $('.location_dropdown[data-changed]').each(function(){

    	dropdown_selected = true;

    });

    var len = 0;
    for (var o in values) {
	    len++;
	}

    if (len == 0){
    	
    	var selected_location_dropdown = $('.location_dropdown[data-changed]');

    	if (selected_location_dropdown.length > 0){

    		physical_items_changed = true;

    		 $('.location_dropdown').each(function(){
		    	values[this.name] = $(this).val();
		    })

    	} else {
    		physical_items_changed = false;
    	}

    } else {

    	physical_items_changed = true;

    	$('.location_dropdown').each(function(){
	    	values[this.name] = $(this).val();
	    })

    }

    // check to see if any overdrive cancelations

    $('.econtent_cancel_checkboxes').each(function(){

    	if ($(this).prop('checked') == true){
    		econtent_changed = true;
    		od_cancelations.push(this.name);
    	}

    });

    if (physical_items_changed == true){
    	
    	showProcessingIndicator('Updating your items. This may take a minute.');

    	$.ajax({
			type: 'POST',
			url: '/MyResearch/Holds/',
			data: values,
			success: function(data) {
				if (econtent_changed == true){
					updateOverdrive(od_cancelations);
				} else {
					showProcessingIndicator('You have successfully updated your holds. Please wait while we refresh the page.');
					window.location.href = path + "/MyResearch/Holds";
				}
			},
			error: function(){
				if (econtent_changed == true){
					updateOverdrive(od_cancelations);
				} else {
					showProcessingIndicator('There was a problem updating your physical item holds. Please try again later. Please wait while we refresh the page.');
					window.location.href = path + "/MyResearch/Holds";
				}
			}
		});

    } else {

		if (econtent_changed == true){
			updateOverdrive(od_cancelations);
		} else {
			alert("No items selected for update.")
		}

    }
    
}

function updateOverdrive(od_cancelations){

	$.each(od_cancelations, function() {
		cancelOverDriveHold(this);
	});

}