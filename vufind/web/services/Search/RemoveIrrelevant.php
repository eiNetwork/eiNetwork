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

$alterfile = "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/undoRelevancy.txt";
$text = array_unique(file($alterfile));

$f = fopen($alterfile,'w+');
if ($f) {
  fputs($f, join('',$text));
  fclose($f);
}
$content = file($alterfile);
$count = count($content);
$title = "title";
$myFile = array("/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/elevate.xml",
                "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/elevate.xml",
                "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/elevate.xml");

$position = $_POST['Remove'];
if($position) {
for($x=$count-1; $x>=0; $x--) {
	if($x==$position-1) {
		$title = trim($content[$x]);
		unset($content[$x]);
		$count--;
	}
}
$content = array_values($content);
file_put_contents($alterfile,implode($content));

foreach($myFile as &$myFile) {
	if(preg_match("/\b"."biblio"."\b/", $myFile)) {
                $newFile = "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio/conf/tempFile.txt";
        } else if(preg_match("/\b"."biblio2"."\b/", $myFile)) {
                $newFile = "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/biblio2/conf/tempFile.txt";
        } else {
                $newFile = "/usr/local/VuFind-Plus/sites/vufindplus3.einetwork.net/solr/econtent/conf/tempFile.txt";
        }
	
	$arr = file($myFile);
	$flag = false;
        $f=fopen($newFile,'w') or die("couldn't open $newFile");
	$i = 0;
        $arr_count = count($arr);
        while($i< $arr_count){
		if(preg_match("/\b".$title."\b/", $arr[$i]) && preg_match("/query/", $arr[$i])) {
                        unset($arr[$i]);
                        $i++;
                        while(!preg_match("/query/", $arr[$i])) {
                                if(!preg_match("/exclude/", $arr[$i])) {
                        		$flag = true;
                                        fwrite($f, $arr[$i]);
				}
                                unset($arr[$i]);
                                $i++;
                        }
                        unset($arr[$i]);
                }
                $i++;
                if($i == $arr_count)
                        unset($arr[$arr_count-1]);
        }
        $arr = array_values($arr);
        file_put_contents($myFile,implode($arr));
        fclose($f);

	$fh = fopen($myFile, 'a') or die("Can't open file");
	if($flag) {
                $stringData = "<query text=\"".$title."\">\n";
                fwrite($fh, $stringData);
                $temp_val = file($newFile);
                foreach($temp_val as $temp_val) {
                       fwrite($fh, $temp_val);
                }
                $stringData = "</query>\n";
                fwrite($fh, $stringData);
                $stringData = "</elevate>";
                fwrite($fh, $stringData);
	} else {
		$stringData = "</elevate>";
                fwrite($fh, $stringData);
	}
        fclose($fh);
}
}

echo "<table border='1' align='center'>
<tr><th>Topic</th>
<th>Option</th></tr>";

for($x=$count; $x>0; $x--) {
	$temp = $x-1;
	echo "<tr><td>$content[$temp]</td>
	<form method='post' action=''>
	<td><input type='submit' value='Remove'/><input type='hidden' value=$x name='Remove'</td></tr>
	</form>";
}
echo "</table>";


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

