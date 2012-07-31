var XHR;
function sendMessage() //send comment data to the servlet;
{ 
    req = createXHR();
    var stringToSend = "";
    req.onreadystatechange = responseHandler;
    req.open("GET", "http://10.69.1.61/MyResearch/HoldMultiple?selected[.b26362302]=on&campus=xa&holdType=hold&autologout=false", true);
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