serialize = function(obj, prefix) {
    var str = [];
    for(var p in obj) {
        var k = prefix ? prefix  : p, v = obj[p];
        str.push(typeof v == "object" ? 
            serialize(v, k) :
            (k) + "=" + (v));
    }
    return str.join("&");
}
function checkSiblings(item){
	var o = $("#"+$("#"+item).attr("data-parent"));
	var x = $("div[data-parent='"+o.attr("id")+"']");
	var cbox = o.children(":first");
	if(!cbox.hasClass("checkbox")) return;
	var checked = true;
	var seen = {};
	x.each(function(){
		var txt = $(this).attr("id");
		if (seen[txt]){
    		$(this).remove();
    	}else{
    		seen[txt] = true;
			if(checked){
				checked = ($(this).children(":first").hasClass("checked"));
			}
		}
	});
	if(checked && cbox.hasClass("unchecked")){
		cbox.toggleClass("checked");
		cbox.toggleClass("unchecked");
	}
	checkSiblings(o.attr("id"));
}
function checkChecked(item){
	var x = $("#"+$("#"+item).attr("data-parent")).children(":first");
	if(!x.hasClass("checkbox"))return;
	if(x.hasClass("checked")){
		x.toggleClass("checked");
		x.toggleClass("unchecked");
	}
	checkChecked(x.parent().attr("id"));
}
function showPage(num, dir){
	var x = document.querySelectorAll("#page_"+num);//
	for (var i = 0; i < x.length; i++)
		x[i].style.display = "none";
	var o = (dir == "next")?(num +1):(num -1);
		var y = document.querySelectorAll("#page_"+o);//
	for (var i = 0; i < y.length; i++)
		y[i].style.display = "block";
}
function toggleLabel(a){
	toggleCheck($(a).parent().attr("id"));
}
function toggleCheck(parent, checked){
	var p = $("#"+parent).children(":first");
	if(typeof checked == 'undefined'){
		checked = (p.hasClass("checked"))?"unchecked":"checked";
	}
	checker(parent, checked);
	if(checked == "unchecked"){
		checkChecked(parent);
	}else{
		checkSiblings(parent);
	}
}
function checker(parent, checked){
	var p = $("#"+parent).children(":first");
	var x = $("div[data-parent='"+parent+"']");
	var c = (checked == "checked")?"unchecked":"checked";
	x.each(function(){
		checker($(this).attr("id"), checked);
	});
	if(p.hasClass(c)){
		p.toggleClass(c);
		p.toggleClass(checked);
	}
}
function submitURL(){
	var qs = parseQS();
	var all = $('#popupboxContent #checkAll').first();
	var i = 0;
	if(qs["filter[]"]){
		while(qs["filter[]"][i]){
			if(qs["filter[]"][i].match(/format%3A/)){
				qs["filter[]"].splice(i, 1);
			}else{
				i++;
			}
		}
	}else{
		qs["filter[]"] = [];
	}
	$('#popupboxContent .checked').each(function(index){
		if($(this).attr('value') != ''){
			qs["filter[]"][i] = 'format%3A"'+$(this).attr('value').replace(' ', '+')+'"';
			i++;
		}
	});
	window.location = "/Search/Results?"+serialize(qs);
}
function parseQS() {
	var query = (decodeURI(window.location.search) || '?').substr(1),
		map   = {};
	query.replace(/([^&=]+)=?([^&]*)(?:&+|$)/g, function(match, key, value) {
	(map[key] = map[key] || []).push(value);
	});
	return map;
}
function resetList(){
	var x = $('#popupboxContent .checked');
	x.each(function(){
		$(this).toggleClass('checked');
		$(this).toggleClass('unchecked');
	});
}