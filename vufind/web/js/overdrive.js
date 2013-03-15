function checkoutOverDriveItem(elemId){
	if (loggedIn){
		showProcessingIndicator("Checking out the title for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/"+elemId+"/AJAX?method=CheckoutOverDriveItem";
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					
					//window.location.href = path + "/MyResearch/CheckedOut";
					window.location.href = "#";
				}else{
					hideLightbox();
				}
				hideLightbox();
				getRequestAndCheckout();
			},
			dataType: 'json', 
			error: function(){	
				setTimeout(function() {alert("An error occurred processing your request in OverDrive.  Please try again in a few minutes.");},1250);
				hideLightbox();
			}
		});
	}else{
		ajaxLogin(function(){
			checkoutOverDriveItem(elemId);
		});
	}	
}

function editOverDriveEmail(email, overDriveId){
	if (loggedIn){
		showProcessingIndicator("Changing your hold email for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=EditOverDriveEmail&email=" + email + "&overDriveId=" + overDriveId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					
					window.location.href = path + "/MyResearch/Holds";
				}else{
					hideLightbox();
				}
				hideLightbox();			
			},
			dataType: 'json', 
			error: function(){	
				setTimeout(function() {alert("An error occurred processing your request in OverDrive.  Please try again in a few minutes.");},1250);
				hideLightbox();
			}
		});
	}else{
		ajaxLogin(function(){
			editOverDriveEmail(email);
		});
	}	
	
}

function placeOverDriveHold(elemId){
	if (loggedIn){
		showProcessingIndicator("Placing a hold on the title for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=PlaceOverDriveHold&elemId=" + elemId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				hideLightbox();
				//if (data.result){
				//	window.location.href = path + "/MyResearch/Holds";
				//}else{
				//	hideLightbox();
				//}
			},
			dataType: 'json',
			error: function(){
				alert("An error occurred processing your request in OverDrive.  Please try again in a few minutes.");
				hideLightbox();
			}
		});
	}else{
		ajaxLogin(function(){
			placeOverDriveHold(elemId);
		});
	}
}

function downloadOverDriveItem(overDriveId, formatId){
	if (loggedIn){
		showProcessingIndicator("Downloading the title for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=DownloadOverDriveItem&overDriveId=" + overDriveId + "&formatId=" + formatId;
		$.ajax({
			url: url,
			cache: false,
			success: function(data){
				
				if (data.result){

				     window.location.href = data.downloadUrl;
				     hideLightbox();
				    
				}else{
					alert(data.message);
					hideLightbox();
				}
			},
			dataType: 'json',
			async: false,
			 error   : function (jqXHR, textStatus, errorThrown) {
			  if (typeof console == 'object' && typeof console.log == 'function') {
			      console.log(jqXHR);
			      console.log(textStatus);
			      console.log(errorThrown);
			   }
			   hideLightbox();
			 }
		});
	}else{
		ajaxLogin(function(){
			placeOverDriveHold(overDriveId, formatId);
		});
	}
}

function returnOverDriveItem(overdriveId, transactionId){
	if (loggedIn){
		showProcessingIndicator("Returning the title for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=ReturnOverDriveItem&overDriveId=" + overdriveId + "&transactionId=" + transactionId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					
					$('#record' + overdriveId).hide();
					
				}else{
					hideLightbox();
				}
				hideLightbox();
			},
			dataType: 'json', 
			error: function(){	
				setTimeout(function() {alert("An error occurred processing your request in OverDrive.  Please try again in a few minutes.");},1250);
				hideLightbox();
			}
		});
	}else{
		ajaxLogin(function(){
			returnOverDriveItem(overdriveId, transactionId);
		});
	}	
}

function cancelOverDriveHold(overDriveId){
	if (loggedIn){
		showProcessingIndicator("Cancelling your hold in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=CancelOverDriveHold&overDriveId=" + overDriveId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					window.location.href = path + "/MyResearch/Holds";
					hideLightbox();
				}else{
					hideLightbox();
				}
			},
			dataType: 'json',
			error: function(){
				alert("An error occurred processing your request in OverDrive.  Please try again in a few minutes.");
				hideLightbox();
			}
		});
	}else{
		ajaxLogin(function(){
			cancelOverDriveHold(overDriveId, formatId);
		});
	}
}