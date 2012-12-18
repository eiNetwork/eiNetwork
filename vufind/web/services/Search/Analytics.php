<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><title>eiNetwork Catalog -- CMU Maze Hackers | Catalog Home</title><link rel="search" type="application/opensearchdescription+xml" title="Library Catalog Search" href="http://vufindplus3.einetwork.net/Search/OpenSearch?method=describe" /><!-- szheng: judge if it is search result page.--><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/search-results.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/holdingsSummary.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/jqueryui.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/styles.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/basicHtml.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/top-menu.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/ei_css/Record/record.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/search_result/search-results.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/holdingsSummary.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/center-header.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/right-header.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/right-bar.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/footer.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css//ei_css/login.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/my-account.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/ratings.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/book-bag.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/jquery.tooltip.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/tooltip.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/suggestions.css" /><link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/reports.css" /><link rel="stylesheet" type="text/css" media="print" href="/interface/themes/einetwork/css/print.css" /><script type="text/javascript">path = '';loggedIn = true;</script><script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script><script type="text/javascript" src="/js/jqueryui/jquery-ui-1.8.18.custom.min.js"></script><script type="text/javascript" src="/js/jquery.plugins.js"></script><script type="text/javascript" src="/js/scripts.js"></script><script type="text/javascript" src="/js/tablesorter/jquery.tablesorter.min.js"></script><script type="text/javascript" src="/js/ei_js/page.js"></script><script type="text/javascript" src="/js/bookcart/json2.js"></script><script type="text/javascript" src="/js/bookcart/bookcart.js"></script><script type="text/javascript" src="/js/title-scroller.js"></script><script type="text/javascript" src="/services/Search/ajax.js"></script><script type="text/javascript" src="/services/Record/ajax.js"></script><script type="text/javascript" src="/js/ei_js/bookcart.js"></script><script type="text/javascript" src="/js/overdrive.js"></script></head><body class="Search Home"><script type="text/javascript">
    jQuery(function (){
      jQuery('#lookfor').focus();
    });</script><!-- Current Physical Location:  --><div id="lightboxLoading" class="lightboxLoading" style="display: none;">Loading...</div><div id="lightboxError" style="display: none;">Error: Cannot Load Popup Box</div><div id="lightbox" onclick="hideLightbox(); return false;"></div><div id="popupbox" class="popupBox"></div><div id="book_bag" style="display:none;">
    <div id="bag_open_button">
    <div class = "icon plus" id="bag_summary_holder">
      <span id ="bag_summary"></span> 
      <a href="#" id="bag_empty_button" class="empty_cart">empty cart</a> 
    </div>
  </div>
   
    <div id="book_bag_canvas" class="round left-side-round" style="display: none;">
        <div id="bag_items"></div>
    
     
    <div id="bag_actions">
            <div id="email_to_box" class="bag_box">
         <h3>Email Your Items</h3>
         To: 
         <input type="text" id="email_to_field" size="40" /><input type="button" class="bag_perform_action_button" value="Send" /> <a href="#" class="button round less-round bag_hide_button">Cancel</a>               
      </div>
      
      <div id="bookcart_login" class="bag_box">
        <h3>Login</h3>
          <div id='bag_login'>
            <form method="post" action="/MyResearch/Home" id="loginForm_bookbag">
              <div>
              Your Name: <br />
              <input type="text" name="username" id="bag_username" value="" size="25"/>
              <br />
              Library Card Number:<br />
              <input type="password" name="password" id="bag_password" size="25"/>
              <br />
              <a href="#" class="button round less-round" id="bag_login_submit">Login</a>
              <a href="#" class="button round less-round bag_hide_button" id="bag_login_cancel">Cancel</a>
              </div>
           </form>
         </div>
        
      </div>
      
                
      <div id="save_to_my_list_tags" class="bag_box">
        <h3>Add Items To List</h3>
        <div id='bag_choose_list'>
	        <a href="#" class="button round less-round longer-button" id="new_list">Create a new List</a>
	        	        <div id='new_list_controls' style='display:none'>
												<form method="post" action="http://vufindplus3.einetwork.net/MyResearch/ListEdit" id="listForm"
						      onsubmit='bagAddList(this, &quot;Error: List not created&quot;); return false;'>
						  <div>
						  List:<br />
						  <input type="text" id="listTitle" name="title" value="" size="50"/><br />
						  Description:<br />
						  <textarea name="desc" id="listDesc" rows="2" cols="40"></textarea><br />
						  Access:<br />
						  Public <input type="radio" name="public" value="1" />
						  Private <input type="radio" name="public" value="0" checked="checked" /><br />
						  <input type="submit" name="submit" value="Create List" />
              <a href="#" class="button round less-round longer-button" id="choose_existing_list">Select Existing List</a>
              <a href="#" class="button round less-round bag_hide_button">Cancel</a>
              </div>
						</form>
	        </div>
	        
	        	        <div id='existing_list_controls'>
		        - or -<br />
		        Choose a List:<br />
		        <select name="bookbag_list_select" id="bookbag_list_select">
		          		          <option value="">My Favorites</option>
		          		        </select>
		        <div id='bag_tags'>
		          Tags:<br /> <input type="text" id="save_tags_field" size="40"/><br />
		          Tags will apply to all items being added.  Use commas to separate tags. If you would like to have a comma within a tag, enclose it within quotes.
		        </div>
		        <input type="button" class="bag_perform_action_button" value="Add"/> 
		        <a href="#" class="button round less-round bag_hide_button">Cancel</a>
	        </div>
	      </div>
      </div>
      <div id="bag_action_in_progress" class="bag_box">                
          <span id="bag_action_in_progress_text">Processing....</span>
      </div>
      <div id="bag_errors" class="bag_box">Warning: <span id="bag_error_message"></span></div> 
    </div>
    
    <div id="bag_links">
      <div class="button round less-round longer-button logged-in-button" style="display: none;"><a href="#" id="bag_add_to_my_list_button" class="icon fav_bag">Save To List</a></div>  
      <div class="button round less-round"><a href="#" id="bag_email_button" class="icon email_bag">Email</a></div>    
      <div class="button round less-round longer-button" ><a href="#" id="bag_request_button" class="icon request_bag">Place Request</a></div>
      <div class="button round less-round"><a href="#" id="bag_print_button" class="icon print_bag">Print</a></div>
      <div class="button round less-round longer-button logged-out-button icon" id="login_bag">Login to Save to List</div>
   </div>
       
  </div>
</div> <div id="pageBody"><div class="header"><div class="left-header"></div><div class ="center-header">
<script type="text/javascript">
	$(document).ready(function() {
		/*
		$("#GoButton").hide();
		
		$("#lookfor").focus(function(){
			$("#GoButton").show();
		}).blur(function(){
			$("#GoButton").hide();
		});
		*/
	});
</script>


<div class="center-header-top">&nbsp;</div>

<div class="center-header-middle">
      <form method="get" action="/Union/Search" id="searchForm" class="search" onsubmit='startSearch();'>

    <span id="search-label">Search</span>
    <span id="search-type">
	  <select id="search-select" name="basicType">
	    	      <option value="Keyword">
		Keyword
	      </option>
	    	      <option value="AllFields">
		All Fields
	      </option>
	    	      <option value="Title">
		Title
	      </option>
	    	      <option value="Author">
		Author
	      </option>
	    	      <option value="Subject">
		Subject
	      </option>
	    	      <option value="ISN">
		ISBN/ISSN/UPC
	      </option>
	    	      <option value="tag">
		Tag
	      </option>
	    	      <option value="econtentText">
		Full Text
	      </option>
	    	      <option value="id">
		Record Number
	      </option>
	    	      <option value="browseTitle">
		Title Browse
	      </option>
	    	      <option value="browseAuthor">
		Author Browse
	      </option>
	    	      <option value="browseSubject">
		Subject Browse
	      </option>
	    	      <option value="browseCallnumber">
		Call Number Browse
	      </option>
	    	  </select>
    </span>
    <span id="for-label">for</span>
    <div>
      <input id="lookfor" class="text" type="text" name="lookfor" value=""  />
      <input id="GoButton" class="button" type="submit" value=""/>
    </div>

        </form>
          <span id="disclaimer"></span>

</div>


<div class="center-header-buttom">&nbsp;</div>
</div><div class="right-header"><div class="right-header-left">
    <div id="welcome-label">Search Analytics,</div>
    <div id="account-label" >
        <a href="/MyResearch/Profile">
       Go to Profile Information
                </a>
    </div>
</div>
<div class="right-header-right">
    <div id="sign-out-label">
        <a href="/MyResearch/Logout">Sign Out</a>
    </div>    
</div>



</div></div>
 <div id="main-content">
    <div id="searchInfo">
                  	<div class="resulthead">

<script type="text/javascript">
	$(document).ready(function() {
	    $('input[title]').each(function(i) {
		if (!$(this).val()) {
		    $(this).val($(this).attr('title'));
		}
		$(this).focus(function() {
		    if ($(this).val() == $(this).attr('title')) {
			$(this).val('');
		    }
		    if($(this).attr('id')=='pin'){
			$('#pin').get(0).type = 'password';
		    }
		
		});
		$(this).blur( function() {
		    if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
			$('#pin').get(0).type='text';
		    }
		    
		    
		});
	    });
	});
	
</script>





	
<?php
$con = mysql_connect("localhost","vufind","vufind");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
global $result;
mysql_select_db("vufind", $con);
$result = mysql_query("select phrase,numSearches from search_stats ORDER BY numSearches DESC");


echo "<form method='post' action=''>&nbsp &nbsp &nbsp
&nbsp
&nbsp &nbsp &nbsp
&nbsp
&nbsp &nbsp &nbsp
&nbsp

Cateory: <select name='cat'>
         <option value='the dummmmy value'> </option>
         <option value='Keyword'> Keyword  </option>
         <option value='AllFields'> All Fields </option>
         <option value='Title'> Title </option>
         <option value='Author'> Author </option>
         <option value='Subject'> Subject </option>
         <option value='ISN'> ISBN/ISSN/UPC </option>
         <option value='tag'> Tag </option>
         <option value='econtentText'> Full Text </option>
         <option value='id'> Record Number </option>
         <option value='browseTitle'> Title Browse </option>
         <option value='browseAuthor'> Author Browse </option>
         <option value='browseSubject'> Subject Browse </option>
         <option value='browseCallnumber'> Call Number Browse </option>
         </select> &nbsp &nbsp
Display Range: <select name='ran'>
        <option value=''></option>
        <option VALUE='10'> Top - 10 </option>
        <option VALUE='50'> Top - 50 </option>
        <option VALUE='100'> Top - 100 </option>
    </select> </br></br>&nbsp &nbsp &nbsp
&nbsp
&nbsp &nbsp &nbsp
&nbsp

Time Range: <select name='time'>
        <option value='' ></option>
        <option VALUE='10'> Recent - 10 </option>
        <option VALUE='50'> Recent - 50 </option>
        <option VALUE='100'> Recent - 100 </option>
    </select>

    <INPUT TYPE='submit' name='submit' />
</form>";





echo "<div class='loginHome-left'></div>";
echo "<div class='loginHome-center'>";
echo "<div class='main-content'>";
echo "<div class='resulthead'>";
echo "<div style='overflow: auto; width:800px;  height:630px;'>";

//global $result;
//mysql_select_db("vufind", $con);
$result = mysql_query("select phrase,numSearches from search_stats ORDER BY numSearches DESC");

if(isset($_POST['cat']))
{
$categ=$_POST['cat'];
//select * from search_stats where type="keyword";
$result = mysql_query("select phrase,numSearches from search_stats where type='$categ'");

/*echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Analytics Based on Keyword Category-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Topic</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>";*/

$flag = false;

while($row = mysql_fetch_array($result))
{
if(!$flag) {
echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Analytics Based on Keyword Category-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Search Term</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>";
$flag = true;
}
$name =  $row['phrase'];
$name =  str_replace(" ","+",$name);
  echo "<tr>";
  echo "<td>" . $row['phrase'] . "</td>";
  echo "<td>" . $row['numSearches'] . "</td>";
  echo "<td><a href=http://vufindplus3.einetwork.net/Union/Search?basicType=Keyword&lookfor=" . $name . "> Details </a> </td>";
  echo "</tr>";
  }
echo "</table>";

$result=null;


unset($_POST['cat']);
}
if(isset($_POST['ran']))
{
$ran=  $_POST['ran'];
$result = mysql_query("select phrase,numSearches from search_stats ORDER BY numSearches DESC LIMIT $ran");

/*echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Anayltics filtered based on number of results-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Topic</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>";*/

$flag = false;

while($row = mysql_fetch_array($result))
{
if(!$flag) {
echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Anayltics filtered based on number of results-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Search Term</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>";
$flag=true;
}
$name =  $row['phrase'];
$name =  str_replace(" ","+",$name);
  echo "<tr>";
  echo "<td>" . $row['phrase'] . "</td>";
  echo "<td>" . $row['numSearches'] . "</td>";
  echo "<td><a href=http://vufindplus3.einetwork.net/Union/Search?basicType=Keyword&lookfor=" . $name . "> Details </a> </td>";
  echo "</tr>";
  }
echo "</table>";
$result=null;


unset ($_POST['ran']);
}
if(isset($_POST['time']))
{
$timelimit= $_POST['time'];
$result=mysql_query("select phrase,numSearches from search_stats ORDER BY lastSearch DESC  LIMIT $timelimit");
/*echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Analytics based on most recent occurence-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Topic</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>"; */

$flag=false;

while($row = mysql_fetch_array($result))
{
if(!$flag) {
echo "</br></br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Analytics based on most recent occurence-</br><table border='1' width=90% align='center'  BORDERCOLOR='#336699'  >
<tr>
<th width=5px >Search Term</th>
<th width=5px >Count</th>
<th style='width:30px;'  >Details</th>
</tr>";
$flag = true;
}
$name =  $row['phrase'];
$name =  str_replace(" ","+",$name);
  echo "<tr>";
  echo "<td>" . $row['phrase'] . "</td>";
  echo "<td>" . $row['numSearches'] . "</td>";
  echo "<td><a href=http://vufindplus3.einetwork.net/Union/Search?basicType=Keyword&lookfor=" . $name . "> Details </a> </td>";
  echo "</tr>";
  }
echo "</table>";
$result=null;

unset ($_POST['time']);

}


mysql_close($con);
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<div class='loginHome-right'></div>";

?>

	

</div>
</div>
</div>
</div>
<div id="footer">
    <div class="left-footer"></div>
    
    <div class="center-footer">
        <div id="top">
            <ul>
                <li><a href="#">Mobile Catalog</a></li>
                <li><a href="#">Suggest a Purchase</a></li>
                <li><a href="http://www.einetwork.net"> Contact us</a></li>
            </ul>
        </div>
        <div id="middle">
            <span>
                The Catalog is a Service of eiNetwork, a collaboration of the<br/>
            <a href="http://www.aclalibraries.org/">Allegheny County Library Association</a> and <a href="http://www.carnegielibrary.org/">Carnegie Library of Pittsburgh</a>
            </span>
        </div>
        <div id="bottom">
            <a href="http://radworkshere.org/">
                <img width=103px height=63px alt="RAD" src="/interface/themes/einetwork/images/Art/Logos/RADLogo.png"/>
            </a>
            
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="http://www.einetwork.net/">
                <img width=103px height=63px href="#"  alt="eiNetwork"src="/interface/themes/einetwork/images/Art/Logos/EINLogo.png"/>
            </a>
        </div>
    </div>
    
    <div class="right-footer"></div>
</div></div> </body></html>

