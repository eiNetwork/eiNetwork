<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="{$userLang}">{strip}
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>{$pageTitle|truncate:64:"..."}</title>
    {if $addHeader}{$addHeader}{/if}
    <link rel="search" type="application/opensearchdescription+xml" title="Library Catalog Search" href="{$url}/Search/OpenSearch?method=describe" />
    {if $consolidateCss}
      {css filename="consolidated_css.css"}
    {else}
     <!-- szheng: judge if it is search result page.-->
      {if isset($pageType)}
	{if $pageType eq "record"}

	{/if}
	{else}
	  {*{css filename="record.css"}*}
      {/if}
      {if isset($isSearch)}

      {else}
	{css filename="search-results.css"}
	{css filename="holdingsSummary.css"}
      {/if}
      {css filename="jqueryui.css"}
      {css filename="styles.css"}
      {css filename="basicHtml.css"}
      {css filename="top-menu.css"}
      {css filename="ei_css/Record/record.css"}
      {css filename="/ei_css/search_result/search-results.css"}
      {css filename="/ei_css/holdingsSummary.css"}
      {css filename="/ei_css/center-header.css"}
      {css filename="/ei_css/right-header.css"}
      {css filename="/ei_css/right-bar.css"}
      {*css filename="/ei_css/popup.css"*}
      {css filename="/ei_css/footer.css"}
      {css filename="/ei_css/login.css"}
      {css filename="/ei_css/get-card.css"}
      {css filename="my-account.css"}
      {css filename="ratings.css"}
      {css filename="book-bag.css"}
      {css filename="jquery.tooltip.css"}
      {css filename="tooltip.css"}
      {css filename="suggestions.css"}
      {css filename="reports.css"}
      {css filename="dcl.css"}
    {/if}
	
      {css media="print" filename="print.css"}
    
    <script type="text/javascript">
      path = '{$path}';
      loggedIn = {if $user}true{else}false{/if};
    </script>
    
    {if $consolidateJs}
      <script type="text/javascript" src="{$path}/API/ConsolidatedJs"></script>
    {else}
      <script type="text/javascript" src="{$path}/js/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" src="{$path}/js/jqueryui/jquery-ui-1.8.18.custom.min.js"></script>
      <script type="text/javascript" src="{$path}/js/jquery.plugins.js"></script>
      <script type="text/javascript" src="{$path}/js/scripts.js"></script>
      <script type="text/javascript" src="{$path}/js/tablesorter/jquery.tablesorter.min.js"></script>
      <script type="text/javascript" src="{$path}/js/ei_js/page.js"></script>
      {if $enableBookCart}
      <script type="text/javascript" src="{$path}/js/bookcart/json2.js"></script>
      <script type="text/javascript" src="{$path}/js/bookcart/bookcart.js"></script>
      {/if}
      
      {* Code for description pop-up and other tooltips.*}
      <script type="text/javascript" src="{$path}/js/title-scroller.js"></script>
      <script type="text/javascript" src="{$path}/services/Search/ajax.js"></script>
      <script type="text/javascript" src="{$path}/services/Record/ajax.js"></script>
      <script type="text/javascript" src="{$path}/js/ei_js/bookcart.js"></script>  
      <script type="text/javascript" src="{$path}/js/overdrive.js"></script>
    {/if}
    
    {* Files that should not be combined *}
    {if $includeAutoLogoutCode == true && $action != 'Home'}
      <script type="text/javascript" src="{$path}/js/autoLogout.js"></script>
    {/if}
    
    {if isset($theme_css)}
    <link rel="stylesheet" type="text/css" href="{$theme_css}" />
    {/if}
  </head>
  
  <body class="{$module} {$action}">
    {*- Set focus to the correct location by default *}
    <script type="text/javascript">{literal}
    jQuery(function (){
      jQuery('#{/literal}{$focusElementId}{literal}').focus();
    });{/literal}
    </script>
    <!-- Current Physical Location: {$physicalLocation} -->
    {* LightBox *}
    <div id="lightboxLoading" class="lightboxLoading" style="display: none;">{translate text="Loading"}...</div>
    <div id="lightboxError" style="display: none;">{translate text="lightbox_error"}</div>
    <div id="lightbox" onclick="hideLightbox(); return false;"></div>
    <div id="popupbox" class="popupBox"></div>
    {* End LightBox *}
    {include file="bookcart.tpl"}
    {*<div id="pageBody" class="{$page_body_style}">*}
    <div id="pageBody">  
    {*<div class="searchheader">*}
    <div class="header">
	  <div class="left-header">
	    {*<a href="{if $homeLink}{$homeLink}{else}{$url}{/if}">
	      <img src="{$path}{$smallLogo}" alt="VuFind"  width="160px" height="60px"/>
	    </a>*}
	    {if isset($lastsearch) and isset($pageType) and ($pageType eq "record" or $pageType eq "EcontentRecord")}
		<div class="button" style="margin-top:20px;height:38px;font-size:15px;padding:0px;"  onclick='window.location.href="{$lastsearch|escape}#record{$id|escape:"url"}"' >
		  <p style="margin-top:10px;margin-left:10px;vertical-align:middle"><span><img alt="BackArrow" src="/interface/themes/einetwork/images/Art/BackArrow.png" style="vertical-align:middle"/></span><span style="margin-left:8px;vertical-align:middle">{translate text="Back to Search Results"}</span></p>
		</div>
	    {/if}
	    {if $searchType == 'advanced'&&$pageType!='advanced'}
		<div class="button" style="margin-top:20px;height:38px;font-size:15px;padding:0px;"  onclick='window.location.href="{$path}/Search/Advanced?edit={$searchId}"' >
		    <p style="margin-top:10px;margin-left:10px;vertical-align:middle"><span><img alt="BackArrow" src="/interface/themes/einetwork/images/Art/BackArrow.png" style="vertical-align:middle"/></span><span style="margin-left:8px;vertical-align:middle">{translate text="Back to Advanced Search"}</span></p>
		</div>
	    {/if}
	  </div>
	  <div class ="center-header">
	    {include file="ei_tpl/center-header.tpl"}
	  </div>
	  <div class="right-header">
	    {include file="ei_tpl/right-header.tpl"}
	  </div>
    </div>
  

      {if $useSolr || $useWorldcat || $useSummon}
      <div id="toptab">
        <ul>
          {if $useSolr}
          <li{if $module != "WorldCat" && $module != "Summon"} class="active"{/if}>
	    <a href="{$url}/Search/Results?lookfor={$lookfor|escape:"url"}">{translate text="University Library"}</a>
	  </li>
          {/if}
          {if $useWorldcat}
          <li{if $module == "WorldCat"} class="active"{/if}>
	    <a href="{$url}/WorldCat/Search?lookfor={$lookfor|escape:"url"}">{translate text="Other Libraries"}</a>
	  </li>
          {/if}
          {if $useSummon}
          <li{if $module == "Summon"} class="active"{/if}>
	    <a href="{$url}/Summon/Search?lookfor={$lookfor|escape:"url"}">{translate text="Journal Articles"}</a>
	  </li>
          {/if}
        </ul>
      </div>
      <div style="clear: left;"></div>
      {/if}

      {include file="$module/$pageTemplate"}
      
      {if $hold_message}
        <script type="text/javascript">
        lightbox();
        document.getElementById('popupbox').innerHTML = "{$hold_message|escape:"javascript"}";
        </script>
      {/if}
      
      {if $renew_message}
        <script type="text/javascript">
        lightbox();
        document.getElementById('popupbox').innerHTML = "{$renew_message|escape:"javascript"}";
        </script>
      {/if}
      
      {include file="ei_tpl/footer.tpl"}
      
    </div> {* End page body *}
    {* add analytics tracking code*}
	{if $productionServer}
	{literal}
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-4759493-8']);
	  _gaq.push(['_trackPageview']);
	  _gaq.push(['_trackPageLoadTime']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script> 
	{/literal}
	{/if}  
  
  {* Strands tracking *}
  {if $user && $user->disableRecommendations == 0 && $strandsAPID}
	  {literal}
	  <script type="text/javascript">
	
	  //This code can actually be used anytime to achieve an "Ajax" submission whenever called
	  if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}
	    
	  StrandsTrack.push({
	     event:"userlogged",
	     user: "{/literal}{$user->id}{literal}"
	  });
	    
	  </script>
	  {/literal}
  {/if}
  {if $strandsAPID}
  {literal}
  <!-- Strands Library MUST be included at the end of the HTML Document, before the /body closing tag and JUST ONCE -->
  <script type="text/javascript" src="http://bizsolutions.strands.com/sbsstatic/js/sbsLib-1.0.min.js"></script>
  <script type="text/javascript">
    try{ SBS.Worker.go("vFR4kNOW4b"); } catch (e){};
  </script>
  {/literal}
  {/if} 
  </body>
</html>{/strip}