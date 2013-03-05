function checkoutOverDriveItem1(overdriveId, formatId){
	if (loggedIn){
		var url = path + "/EcontentRecord/AJAX?method=GetOverDriveLoanPeriod&overDriveId=" + overdriveId + "&formatId=" + formatId;
		ajaxLightbox(url,false,false,'320px',false,'150px');
	}else{
		ajaxLogin(function(){
			checkoutOverDriveItem(overdriveId, formatId);
		});
	}
}

function checkoutOverDriveItem(elemId){
	
	var lendingPeriod = $("#loanPeriod option:selected").val();
	showProcessingIndicator("Checking out the title for you in OverDrive.  This may take a minute.");
	var url = path + "/EcontentRecord/"+elemId+"/AJAX?method=CheckoutOverDriveItem";
	$.ajax({
		url: url,
		success: function(data){
			alert(data.message);
			if (data.result){
				
				//window.location.href = path + "/MyResearch/CheckedOut";
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
}

function placeOverDriveHold(overDriveId, formatId){
	if (loggedIn){
		showProcessingIndicator("Placing a hold on the title for you in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=PlaceOverDriveHold&overDriveId=" + overDriveId + "&formatId=" + formatId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					window.location.href = path + "/MyResearch/Holds";
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
			placeOverDriveHold(overDriveId, formatId);
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
			 }
		});
	}else{
		ajaxLogin(function(){
			placeOverDriveHold(overDriveId, formatId);
		});
	}
}

function addOverDriveRecordToWishList(recordId){
	if (loggedIn){
		showProcessingIndicator("Adding the title to your Wish List in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=AddOverDriveRecordToWishList&recordId=" + recordId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					window.location.href = path + "/MyResearch/OverdriveWishList";
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
			addOverDriveRecordToWishList(recordId);
		});
	}
}

function removeOverDriveRecordFromWishList(overDriveId){
	if (loggedIn){
		showProcessingIndicator("Removing the title from your Wish List in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=RemoveOverDriveRecordFromWishList&overDriveId=" + overDriveId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					window.location.href = path + "/MyResearch/OverdriveWishList";
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
			removeOverDriveRecordFromWishList(overDriveId);
		});
	}
}

function cancelOverDriveHold(overDriveId, formatId){
	if (loggedIn){
		showProcessingIndicator("Cancelling your hold in OverDrive.  This may take a minute.");
		var url = path + "/EcontentRecord/AJAX?method=CancelOverDriveHold&overDriveId=" + overDriveId + "&formatId=" + formatId;
		$.ajax({
			url: url,
			success: function(data){
				alert(data.message);
				if (data.result){
					window.location.href = path + "/MyResearch/Holds";
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