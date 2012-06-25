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