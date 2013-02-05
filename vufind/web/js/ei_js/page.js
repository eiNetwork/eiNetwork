function mouseOver(event,color){
    var target = event.target;
    while(target.nodeName != "DIV")
    {
        target = target.parentNode;
    }
    // target.style.backgroundColor = "rgb(242,242,242)"
   target.style.backgroundColor = color;
}
function mouseOut(event,color){
    var target = event.target;
    while(target.nodeName != "DIV")
    {
        target = target.parentNode;
    }
    //target.style.backgroundColor = "rgb(255,255,255)"
    target.style.backgroundColor =color;
}
function goToLink(url){
    window.navigate(url);
}

function getSaveToBookCart(id, source,obj){
	if (loggedIn){
		//var url = path + "/Resource/Save?lightbox=true&id=" + id + "&source=" + source;
		//ajaxLightbox(url);
                successCallback = function() {
                };
                saveToBookCart(id, source,successCallback);
	}else{
                successCallback = function() {
                    window.location.reload();
                };
		ajaxLogin(function (){
			
			saveToBookCart(id, source,successCallback);
		});
	}
	return false;
}
//This is for book cart.
function saveToBookCart(id, source,successCallback) {
        var strings = {add: 'Save To List', error: 'Error: Record not saved'};
	performSaveToBookCart(id, source, strings, 'VuFind', successCallback);
	//alert("You have successfully added this item to bookcart");
	return false;
}

function saveAllToBookCart(){
    successCallback = function() {
	};
    var strings = {add: 'Save To List', error: 'Error: Record not saved'};
    $(".resultsList").each(function(){
            //alert(this.getAttribute('id'));
            var id = '.'+this.getAttribute('id').substring(6,this.getAttribute('id').length);
            var source = 'vufind';
            performSaveToBookCart(id, source, strings, 'VuFind', successCallback);
        })
    return false;
}

function performSaveToBookCart(id, source, strings, service, successCallback)
{
	document.body.style.cursor = 'wait';
        var tags = "";
        var notes = '';
	var url = path + "/SaveToBookCart/AJAX";
	var params = "method=AddBookCartList&" +
							 "mytags=" + encodeURIComponent(tags) + "&" +
							 "notes=" + encodeURIComponent(notes) + "&" +
							 "id=" + id + "&" +
							 "source=" + source;
	$.ajax({
		url: url+'?'+params,
		dataType: "json",
		success: function() {
			disable(id);
                    if($("#listId").val()!=null&&$("#listId").val()!=''){
                        deleteItemInList(id,source);
                    }
                    getBookCartItemCount();
		    document.body.style.cursor = 'default';
		    var text = '<img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"><span class="resultAction_span" >&nbsp;In Cart</span>';
		    successCallback();
			/*if(document.getElementById("add-to-cart")){
				document.getElementById("add-to-cart").innerHTML = text;
			}else{
				document.getElementById("selected"+id.replace(/\./g,"")).innerHTML = text;
				//document.getElementById("selected"+id.replace(/\./g,"")).onclick = alert();//"deleteItemInList("+id+",'VuFind')";
			}*/
	},
	error: function() {
			document.getElementById('popupbox').innerHTML = strings.error;
			setTimeout("hideLightbox();", 3000);
			document.body.style.cursor = 'default';
	}
	});
}

function AJAXtest()
{
	var url = path + "/SaveToBookCart/AJAX";
	$.ajax({
		url: url+'?hello=OK',
		dataType: "json",
		success: function(data) {
			$("#lookfor").val(data);
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}
function getViewCart(){
	if (loggedIn){
		//var url = path + "/Resource/Save?lightbox=true&id=" + id + "&source=" + source;
		//ajaxLightbox(url);
                window.location.href = '/List/Results?goToListID=BookCart'
	}else{
		ajaxLogin(function (){
			window.location.href = '/List/Results?goToListID=BookCart'
		});
	}
	return false;
}
function getWishList(){
    if (loggedIn){	
                window.location.href = '/List/Results'
	}else{
		ajaxLogin(function (){
			window.location.href = '/List/Results'
		});
	}
	return false;
}

function getToRequest(url){
    if (loggedIn){	
                window.location.href = url;
	}else{
		ajaxLogin(function (){
			window.location.href = url;
		});
	}
	return false;
}

function getCheckedOutItem(){
    if (loggedIn){	
                window.location.href = '/MyResearch/CheckedOut'
	}else{
		ajaxLogin(function (){
			window.location.href ='/MyResearch/CheckedOut'
		});
	}
	return false;
}

function getRequestedItem(){
    if (loggedIn){	
                window.location.href = '/MyResearch/Holds'
	}else{
		ajaxLogin(function (){
			window.location.href ='/MyResearch/Holds'
		});
	}
	return false;
}

function getReadingHistory(){
    if (loggedIn){	
                window.location.href = '/MyResearch/ReadingHistory'
	}else{
		ajaxLogin(function (){
			window.location.href ='/MyResearch/ReadingHistory'
		});
	}
	return false;
}

function getAccountSetting(){
    if (loggedIn){	
                window.location.href = '/MyResearch/Profile'
	}else{
		ajaxLogin(function (){
			window.location.href ='/MyResearch/Profile'
		});
	}
	return false;
}


function requestItem(id,listId){
        document.body.style.cursor = 'wait';
        var tags = "";
        var notes = '';
	var url = path + "/List/AJAX";
	var params ="method=processRequestItem&" +
                        "campus=" + $("#campus").val() + "&" +
			"selected["+id+"]=on"  + "&" +
			"holdType=" + "hold";
        newAJAXLightbox(id,'VuFind',listId,url,'post',params,'json');
}
function newAJAXLightbox(id, source,listId,urlToLoad, connect_type,dataToLoad,dataTypeToLoad, parentId, left, width, top, height){
	
	var loadMsg = $('#lightboxLoading').html();

	hideSelects('hidden');

	// Find out how far down the screen the user has scrolled.
	var new_top =  document.body.scrollTop;

	// Get the height of the document
	var documentHeight = $(document).height();
	$('#lightbox').show();
	$('#lightbox').css('height', documentHeight + 'px');
	$('#popupbox').html('<img src="' + path + '/images/loading.gif" /><br />' + loadMsg);
	$('#popupbox').show();
	$('#popupbox').css('top', '50%');
	$('#popupbox').css('left', '50%');
	$.ajax({
               type: connect_type,
               url: urlToLoad,
               data: dataToLoad,
               dataType: dataTypeToLoad,
               success: function(data) {
                    $('#popupbox').html(data['html']);
                    $('#popupbox').show();
                    if(data['status']!='none')
                    {
                        //alert(listId+"     "+id);
                         deleteItemInList(id,source);
                    }
                    if (parentId){
                            //Automatically position the lightbox over the cursor
                            $("#popupbox").position({
                                    my: "top right",
                                    at: "top right",
                                    of: parentId,
                                    collision: "flip"
                            });
                    }else{
                            if (!left) left = '100px';
                            if (!top) top = '100px';
                            if (!width) width = 'auto';
                            if (!height) height = 'auto';
                            
                            $('#popupbox').css('top', top);
                            $('#popupbox').css('left', left);
                            $('#popupbox').css('width', width);
                            $('#popupbox').css('height', height);
                            document.body.style.cursor = 'default';
                            //$(document).scrollTop(0);        
                    }
                    if ($("#popupboxHeader").length > 0){
                            $("#popupbox").draggable({ handle: "#popupboxHeader" });
                    }
            }
        }   );
}

function deleteItemInList(itemId,source){
    document.body.style.cursor = 'wait';
    var data ='method=deleteItemInList&selected['+itemId+']=on&source='+source;
    if($("#listId").val()!=null&&$("#listId").val()!=''){
        data += '&listId='+$("#listId").val();
    }
    $.ajax({
		type: 'post',
                url: "/List/AJAX",
                dataType: "text",
                data: data,
		success: function(data) {
			var reg = /\w+/;
                        var recordID = reg.exec(itemId);
                        $("#record"+recordID).parent().slideUp("normal",function(){
				this.parentNode.removeChild(this);
			    });
                        document.body.style.cursor = 'default';
                        getBookCartItemCount();
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}
$("#cart-descrpiion").ready(function(){
        getBookCartItemCount();
    })
function getBookCartItemCount(){
     $.ajax({
		type: 'post',
                url: "/List/AJAX",
                dataType: "json",
                data: 'method=getBookCartItemCount',
		success: function(data) {
                    if(data['count'] == 0){
                        $("#cart-descrpiion").html("&nbsp;&nbsp; Your book cart is empty ");
                    }else if(data['count'] == 1){
                        $("#cart-descrpiion").html("&nbsp;&nbsp; 1 item in your book cart ");
                    }
                    else if(data['count']!=null && data['count'] !=0){
                        $("#cart-descrpiion").html('&nbsp;&nbsp;'+data['count']+" items in your book cart");
                    }
                    if(data['unavailable'] == 'yes'){
                        $("#cart-descrpiion").html("&nbsp;&nbsp; Your book cart is empty ");
                    }
		    if(data["count"]==null){
			
		    }
		    
		},
		error: function() {
			$('#popupbox').html(failMsg);
			
			setTimeout("hideLightbox();", 3000);
		}
	});
}
function newAddList(form, failMsg){
	var url = path + "/MyResearch/AJAX";
	var recordId = form.recordId.value;
	var source = form.source.value;
	var params = "method=AddList&" +
							 "title=" + encodeURIComponent(form.title.value) + "&" +
							 //"public=" + isPublic + "&" +
							 //"desc=" + encodeURIComponent(form.desc.value) + "&" +
							 "followupModule=" + form.followupModule.value + "&" +
							 "followupAction=" + form.followupAction.value + "&" +
							 "followupId=" + form.followupId.value;

	$.ajax({
		url: url+'?'+params,
		dataType: "json",
		success: function(data) {
			var value = data.result;
			if (value) {
				if (value == "Done") {
					var newId = data.newId;
					//Save the record to the list
					//var url = path + "/Resource/Save?lightbox=true&selectedList=" + newId + "&id=" + recordId + "&source=" + source;
					//ajaxLightbox(url);
                                        window.location.href = '/List/Results?goToListID='+newId;
				} else {
					alert(value.length > 0 ? value : failMsg);
				}
			} else {
				$('#popupbox').html(failMsg);
				setTimeout("hideLightbox();", 3000);
			}
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}
function editListName(form, failMsg){ 
	var url = path + "/List/ListEdit";
	var recordId = form.recordId.value;
	var source = form.source.value;
	var params = "method=editList&" +
							 "title=" + encodeURIComponent(form.title.value) + "&" +
							 "id=" +  recordId;
	$.ajax({
		url: url+'?'+params,
		dataType: "json",
		success: function(data) {
			var value = data.result;
			if (value) {
				if (value == "Done") {
						$("#"+form.followupId.value).html(form.title.value);
						hideLightbox();
				} else {
					alert(value.length > 0 ? value : failMsg);
				}
			} else {
				$('#popupbox').html(failMsg);
				setTimeout("hideLightbox();", 3000);
			}
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}
function getDeleteList(listId){
        var element = "<div id='warningDelete' >"+
                            "<p id='deleteWarning' style='margin-left:80px;margin-top:30px'>Are your sure you want to delete this wish list?</p>"+
                            "<p id='deleteWarningOption'>"+
                            "<span style='margin-left:140px'><input type='button' class='button' value = 'Yes' onclick='deleteList("+listId+")'/></span>"+
                            "<span><input type='button' class='button' value = 'No' onclick='hideLightbox()'/></span>"+
                            "</p></div>";
			    
	newShowElementInLightbox("Warning",element,false,false,'450px','180px');
}
function deleteList(listId){
        $.ajax({
		type: 'post',
                url: "/List/AJAX",
                dataType: "text",
                data: "method=deleteList&listId="+listId,
		success: function(data) {
                    if(data=='success'){
                        hideLightbox();
                        window.location.href = '/List/Results';
                    }
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}

//==================Find in library==================
function findInLibrary(id,left,top,width,height){
    var url = "/Record/"+id+"/AJAXGetCallNumber?method=getCallNumber";
    waitingLightbox(left,width,top,height);
    ajaxLightbox(url,false,left,width,top,height);
}
function findAllInLibrary(left,top,width,height){
    var allResults = "";
    $(".resultsList").each(function(){
            var id = '.'+this.getAttribute('id').substring(6,this.getAttribute('id').length);
            var url = "/Record/"+id+"/AJAXGetCallNumber?method=getCallNumber";
            $.ajax({
                    type:'get',
                    url:url,
                    dataType:"html",
                    data:"",
                    success:function(data){
                    }
                })
        });
    //ajaxLightbox(url,false,left,width,top,height);
}
function seeUnavailable()
{
    $(".itemUnavailable").slideToggle('slow');
    if( $("#showAndHideUnavailable").text()=="(show unavailable items)"){
        $("#showAndHideUnavailable").html("(hide unavailable items)");
    }else{
        $("#showAndHideUnavailable").html("(show unavailable items)");
    }
}

function printPage(inLeft,inTop,inWidth,innerHTML){
    var printWin = window.open("","Print",top=inTop,left=inLeft,width=inWidth);
    printWin.document.body.innerHTML = innerHTML;
    printWin.print();
    printWin.close();
}
function printFindLibrary(){
  var left = $(document).width()/2-285;
    var top = 300;
    var width = 570;
    var itemName = $('#itemTitle').text();
    //var innerHTML = $("#headhead").html()+"<table>";
    var innerHTML = '<div style="height:40px;padding-top:12px;border-bottom:1px solid rgb(238,238,238)"> <span style="font-size:18px;">' + itemName + '</span></div><table>';
    if($("#showAndHideUnavailable").text()=="show unavailable items"){
        innerHTML += $("#callNumberBody").html();
        printPage(left,top,width,innerHTML);
    }else{
        $.each($(".itemAvailable"),function(){
            innerHTML +="<tr>" + $(this).html()+"</tr>";
            })
        innerHTML += "</table>";
        printPage(left,top,width,innerHTML);
    }
}
function renewItem(url){
    document.body.style.cursor = 'wait';
     $.ajax({
		type: 'get',
                url: url,
		success: function(data) {
		    window.location.href=url;
		    document.body.style.cursor = 'default';
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}

function requestAllItems(listId){
    var send = "";
    send = "holdType=hold&campus="+$("#campus").val();
    $.each($(".resultsList"),function (){
    	var pid = this.getAttribute("id");
	id = pid.replace("record",".");
	var temp = pid.replace("record","");	
	if(!$("#request-now"+temp).hasClass("it-is-here")){
	    send = send+"&selected["+id+"]=on";
	    //requestItem(id,listId);
	}
    })
    var url = "/MyResearch/HoldMultiple";
    $.ajax({
            type:'post',
            url:url,
            dataType:"json",
            data:send,
            success:function(data){
	        newShowElementInLightbox("Request result",data['page'],false,false,'450px','500px');
		for(var i = 0;i<data['avaiblity'].length;i++){
		    deleteItemInList(data['avaiblity'][i],'VuFind');
		}
	    }
	    
        })
}
function getItemStatusCart(id){
	if(window.location.pathname == "/List/Results"){
		return;
	}
	$.ajax({
		type: 'post',
		url: "/List/AJAX", 
		dataType: "json", 
		data: 'method=isInCart&id='+id,
		success: function(data) {
			//alert(data['inCart']);
			if(data['inCart']){
				disable(id);
			}
		},
		error: function() {
			//$('#popupbox').html(failMsg);
			//setTimeout("hideLightbox();", 3000);
		}
	});
}
function disable(id){
	if($("#add-to-cart").length){
		$("#add-to-cart").css('background-color','rgb(192,192,192)');
		$("#add-to-cart").css("color","rgb(248,248,248)");
		$("#add-to-cart .action-lable-span").text("In Cart");
		$("#add-to-cart").css("cursor","default");
	}else if($("#selected"+id.replace(/\./g, ""))){
		var d = "#selected"+id.replace(/\./g, "");
		$(d).css('background-color','rgb(192,192,192)');
		$(d).css("color","rgb(248,248,248)");
		$(d+" .resultAction_span").text("In Cart");
		$(d).css("cursor","default");
	}
}

function getSaveToListForm(id, source){
	if (loggedIn){
		var url = path + "/Resource/Save?lightbox=true&id=" + id + "&source=" + source;
		ajaxLightbox(url,false,false,'450px',false,'auto');
	}else{
		ajaxLogin(function (){
			getSaveToListForm(id, source);
		});
	}
	return false;
}
function getHeight(){
	$("#main-content").css("min-height", function(){ 
	    return 4+$('#left-bar').height();
	});
}
function similarTitles(){
	var len = $('.sep').length;
	$('.sep').each(function (index){
		if(index < 3){
			$(this).wrap('<div class="sim"/>');
		}else{
			$(this).wrap('<div class="sim_hid" />');
		}
		if(index == 2 && len > 3){
			$(this).append("<dd class='sim_more'>More</dd>");
			$('.sim_more').click(function(){showSim();});
		}
		if(index == (len-1) && len > 3){
			$(this).append("<dd class='sim_less'>Less</dd>");
			$('.sim_less').click(function(){hideSim();});
		}
	});
	getHeight();
}
function showSim(){
	$('.sim_hid').each(function(){
		$(this).show();
	});
	$('.sim_more').hide();
	getHeight();
}
function hideSim(){
	$('.sim_hid').each(function(){
		$(this).hide();
	});
	$('.sim_more').show();
	getHeight();
}