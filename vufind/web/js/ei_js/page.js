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
function requestItem(){
    $.post("http://10.69.1.61/MyResearch/HoldMultiple",{"selected[.b31308028]":"on",holdType:"hold",campus:"xa"});
    alert("aa");
    
}