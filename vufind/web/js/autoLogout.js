(function($){
	resetTimer();
})(jQuery);
var timer1, timer2;
//document.onkeypress=resetTimer;
//document.onmousemove=resetTimer;
function resetTimer(){
	hideLightbox();
    clearTimeout(timer1);
    clearTimeout(timer2);
    var wait=1;
    timer1=setTimeout("alertUser()", (30000*wait)-1);
    timer2=setTimeout("logout()", 38000*wait);
}

function alertUser(){
	lightbox(null, null, null, '25%');
	var message = "<div class='popupHeader' style='text-align:center' ><div class='highlight' >Attention:</div>Your catalog session is about to expire if you don't click \"Continue\".";
	message += "</div><div style='margin-top:100px; text-align:center; font-size:12px;'><span class='button dark highlight highlighted' onclick='resetTimer()'>Continue</span><span class='button dark highlight' onclick='logout()'>Exit</span></div>";
	$("#popupbox").html(message);
}
function logout(){
	//Redirect to logout page
	window.location = path + "/MyResearch/Logout";
}