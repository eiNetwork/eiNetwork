function mouseOver_normal(event){
    var target = event.target;
    while(target.nodeName != "DIV")
    {
        target = target.parentNode;
    }
    var a  = document.createElement("div");
    target.style.backgroundColor = "#f2f2f2"
}
function mouseOut_normal(event){
    var target = event.target;
    while(target.nodeName != "DIV")
    {
        target = target.parentNode;
    }
    var a  = document.createElement("div");
    target.style.backgroundColor = "#ffffff"
}
function goToLink(url){
    window.navigate(url);
}