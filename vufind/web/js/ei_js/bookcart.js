var XHR;
function sendMessage() //send comment data to the servlet;
{ 
    req = createXHR();
    var stringToSend = "selected[.b16492675]=on&campus=xa&autologout=false";
    req.onreadystatechange = responseHandler;
    req.open("POST", "http://10.69.1.61/MyResearch/HoldMultiple", true);
    req.send(stringToSend);
}
function createXHR() //create a XMLHttpRequest;
{ 
    var XHR;
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        XHR = new XMLHttpRequest();
        if (XHR.overrideMimeType) {
            XHR.overrideMimeType('text/xml'); //TODO when you want to get a html, you should set it to text/html
            }
        browserType="Mozilla"
        return XHR;
    } //end mozilla attempt
    if (window.ActiveXObject) { // IE
	try {
            XHR = new ActiveXObject("Msxml2.XMLHTTP");
            browserType="IE";
            return XHR;
	} 
        catch (e) {
            try {
                XHR = new ActiveXObject("Microsoft.XMLHTTP");
                browserType="IE";
                return XHR;
            }
            catch (e) {
                alert("Your browser does not support AJAX!");
                browserType="Unknown"
                return null;
                }
            }
    }//end IE attempt 
    //we should never get here, but if we do, things are bad
    return null;
}

function responseHandler() //set response handler;
{
    // readyState of 4 signifies request is complete
      if (req.readyState == 4) {
	// status of 200 signifies sucessful HTTP call
        if (req.status == 200) {
          process(req.responseText);
        }
      }else
      {
      	loading();
      }
}
function process(response) // process the data from the servlet;
{
    
}
function loading()
{
	//loading function
}

 function swapDiv(event,elem){
         var curr = elem.parentElement;
        // alert(curr.id);
         //alert(elem.parentElement.nextSibling.nextSibling.innerHTML);
         var current = curr.id;
      // alert("Source:" + current );
         var prev = elem.previousSibling.previousSibling;
         var Targetdiv  = prev.value;
         //alert(Targetdiv);
         var currentdiv = elem.parentElement.id.substring(0,1);
         //alert(currentdiv);
         var Id = Targetdiv +'Y';
   //      alert("target :" + Id);
         var target = document.getElementById(Id.toString()).nextSibling.nextSibling;
 //        alert("fIRSRT TIME----->"+target.innerHTML);
        // var parent = elem.parentElement.innerHTML; 
         //alert(Targetdiv.value);
         //alert(currentdiv);
         
         if(currentdiv > Targetdiv)
           {
              // alert("in.....>");
              var prevnode = target.innerHTML;
               //alert( "fIRSRT TIME----->" + prevnode);
              var temp34;
              document.getElementById(Id.toString()).nextSibling.nextSibling.innerHTML = document.getElementById(current.toString()).nextSibling.nextSibling.innerHTML;
              for(var i = parseInt(Targetdiv)+ parseInt(1) ; i <= currentdiv  ; i++)
                  {
                    var Id = i+'Y';
                    var curenode = document.getElementById(Id.toString()).nextSibling.nextSibling;
                //    alert(curenode.innerHTML);
                    temp34 = curenode.innerHTML;
                    curenode.innerHTML = prevnode;
                    prevnode = temp34;  
                  }
              //alert ('Bubble-UP');
           }
         else if (Targetdiv > currentdiv)
           {
               //bubble Down
               var prevnode = target.innerHTML;
              //alert( "out---->");
              var temp34;
              document.getElementById(Id.toString()).nextSibling.nextSibling.innerHTML = document.getElementById(current.toString()).nextSibling.nextSibling.innerHTML;
              for(var i = parseInt(Targetdiv)- parseInt(1) ; i >= currentdiv  ; i--)
                  {
                    var Id = i+'Y';
                    var curenode = document.getElementById(Id.toString()).nextSibling.nextSibling;
                //    alert(curenode.innerHTML);
                    temp34 = curenode.innerHTML;
                    curenode.innerHTML = prevnode;
                    prevnode = temp34;  
                  } 

           }
    }
