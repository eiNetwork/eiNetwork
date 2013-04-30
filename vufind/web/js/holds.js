$(document).ready(function() {
	$('#update-selected-btn').click(function(){
		updateSelected();
	});
	
	$('#freeze-all-btn').click(function(){
		freezeAll();
	});
	
	$('#unfreeze-all-btn').click(function(){
		unfreezeAll();
	});
});

function freezeAll(){
	
	//var inputs = $('#items-hold :input, select');

    var values = {};
    
    $('.physical_items').each(function() {
    
    	//alert($(this).val());
    	
    	if ($(this).is('input')){
    	
    		if ($(this).attr('id') == 'frozen_state_off'){
	    		
	    		$(this).val('on');
	    		
    		} else {
	    		
	    		if ($(this).is(':checked')){
		    		$(this).val('on')
		    	} else {
		    		$(this).val('off')
		    	}
	    		
    		}
    	
	    	
    	}
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Updating your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
			//console.log(data);
			document.location.href='/MyResearch/Holds';
		}
	});
	
}

function unfreezeAll(){
	
	//var inputs = $('#items-hold :input, select');

    var values = {};
    
    $('.physical_items').each(function() {
    
    	//alert($(this).val());
    	
    	if ($(this).is('input')){
    	
    		if ($(this).attr('id') == 'frozen_state_on'){
	    		
	    		$(this).val('off');
	    		
    		} else {
	    		
	    		if ($(this).is(':checked')){
		    		$(this).val('on')
		    	} else {
		    		$(this).val('off')
		    	}
	    		
    		}
    	
	    	
    	}
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Updating your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
			//console.log(data);
			document.location.href='/MyResearch/Holds';
		}
	});
	
}

function updateSelected(){
	
	//var inputs = $('#items-hold :input, select');

    var values = {};
    
    $('.physical_items').each(function() {
    
    	//alert($(this).val());
    	
    	if ($(this).is('input')){
    	
    		if ($(this).attr('id') == 'frozen_state_on' && $(this).is(':checked')){
	    		
	    		$(this).val('off');
	    		
    		} else if($(this).attr('id') == 'frozen_state_off' && $(this).is(':checked')){
	    		
	    		$(this).val('on');
	    		
    		} else {
	    		
	    		if ($(this).is(':checked')){
		    		$(this).val('on')
		    	} else {
		    		$(this).val('off')
		    	}
	    		
    		}
    	
	    	
    	}
    	
    	values[this.name] = $(this).val();
    });
    
    showProcessingIndicator('Updating your items. This may take a minute.');
    
    $.ajax({
		type: 'POST',
		url: '/MyResearch/Holds/',
		data: values,
		success: function(data) {
			//console.log(data);
			document.location.href='/MyResearch/Holds';
		}
	});
	
	
}
