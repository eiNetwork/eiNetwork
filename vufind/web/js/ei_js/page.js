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

function getSaveToBookCart(id, source){
	if (loggedIn){
		//var url = path + "/Resource/Save?lightbox=true&id=" + id + "&source=" + source;
		//ajaxLightbox(url);
                saveToBookCart(id, source);
	}else{
		ajaxLogin(function (){
			getSaveToBookCart(id, source);
                        window.location.reload();
		});
	}
	return false;
}
//This is for book cart.
function saveToBookCart(id, source) {
        var strings = {add: 'Save To List', error: 'Error: Record not saved'};
	successCallback = function() {
	};
	performSaveToBookCart(id, source, strings, 'VuFind', successCallback);
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
                    if($("#listId").val()!=null&&$("#listId").val()!=''){
                        deleteItemInList(id);
                    }
		    document.body.style.cursor = 'default';
			
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
function getRequestNowForm(id){
        //var inHtml = 
}

function requestItem(id,listId){
        //alert($("#campus").val());
        document.body.style.cursor = 'wait';
        var tags = "";
        var notes = '';
	var url = path + "/List/AJAX";
	var params ="method=processRequestItem&" +
                        "campus=" + $("#campus").val() + "&" +
			"selected["+id+"]=on"  + "&" +
			"holdType=" + "hold";
        newAJAXLightbox(id,listId,url,'post',params,'json');
}
function newAJAXLightbox(id, urlToLoad, connect_type, dataToLoad, dataTypeToLoad,parentId, left, width, top, height){
	
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
                         deleteItemInList(id);
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

function deleteItemInList(itemId){
    document.body.style.cursor = 'wait';
    var data ='method=deleteItemInList&selected['+itemId+']=on';
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
                        $("#record"+recordID).parent().slideUp();
                        document.body.style.cursor = 'default';
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
                        $("#cart-descrpiion").html("&nbsp;&nbsp; your book cart is empty ");
                    }else if(data['count'] == 1){
                        $("#cart-descrpiion").html("&nbsp;&nbsp; 1 item in your book cart ");
                    }
                    else if(data['count']!=null && data['count'] !=0){
                        $("#cart-descrpiion").html('&nbsp;&nbsp;'+data['count']+" items in your book cart");
                    }
                    if(data['unavailable'] == true){
                        $("#cart-descrpiion").html("login to see your book cart");
                    }
                    $("#descrpiion").html("bb");
		},
		error: function() {
			$('#popupbox').html(failMsg);
			setTimeout("hideLightbox();", 3000);
		}
	});
}

