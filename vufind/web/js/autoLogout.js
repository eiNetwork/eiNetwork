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
    timer1=setTimeout("alertUser()", (35000*wait)-1);
    timer2=setTimeout("logout()", 40000*wait);
}

function alertUser(){
	lightbox(null, null, null, '25%');
	var message = "<div class='popupHeader' style='text-align:center' ><div class='highlight' >Attention:</div>Your catalog session is about to expire if you don't click \"Continue\".";
	message += "</div><div style='margin-top:100px; text-align:center; font-size:12px;'><span class='button yellow' onclick='resetTimer()' style='color:black'>Continue</span><span class='button gray' onclick='logout()' style='background-color: #777777; border-color: #888888;'>Exit</span></div>";
	$("#popupbox").html(message);
}
function logout(){
	//Redirect to logout page
	window.location = path + "/MyResearch/Logout";
}