<script type="text/javascript" src="{$path}/services/EcontentRecord/ajax.js"></script>
 <script type="text/javascript" src="/js/ei_js/search.js"></script>
{* Main Listing *}
{if (isset($title)) }
<script type="text/javascript">
	alert("{$title}");
</script>
{/if}
{if $recordCount}
<script>
{literal}
function checkFilters(){
	return window.location.search.toString().indexOf("filter");
}
function showRemove(){
	if(checkFilters() != -1){
		$("#removeFilters").show();
	}  
}
function removeFilters(){
	var qs = parseQS();
	if(qs["filter[]"]){
		delete qs["filter[]"];
	}
	window.location = "/Search/Results?"+serialize(qs);
}
$(document).ready(function() {
 	showRemove();
});
{/literal}
</script>
{/if}
<div id="page-content" class="content">
  {* Narrow Search Options *}
  <div id="left-bar">
	{if $sideRecommendations}
		{foreach from=$sideRecommendations item="recommendations"}
		{include file=$recommendations}
		{/foreach}
	{/if}


  </div>
  {* End Narrow Search Options *}

  <div id="main-content">
    <div id="searchInfo">
	<div class="resulthead" style="height:30px; ">
		<div class="yui-u first" style="float:left; width:75%">
		{if $recordCount}
		{$recordCount}{translate text=" items found for"}{/if}
		{if $searchType == 'basic'}<span style="font-style:italic; font-weight:570;">'{$lookfor|escape:"html"}'</span>  <span style="display:none" id="removeFilters">with current filters. <div style="float:right"><a href="#" onclick="removeFilters();">remove all filters</a></div></span>{/if}
		{if $searchType == 'advanced'}
			<span style="font-style:italic; font-weight:570;">"{$lookfor|escape:"html"}"</span>
			<a  style="margin-left: 10px" href="{$path}/Search/Advanced?edit={$searchId}" class="small">{translate text="Edit this Advanced Search"}</a>
		{/if}
		<br/><br/>
		{if $spellingSuggestions}
		{/if}
		</div>
		<div style="float:right; width:25%">
			<div class="round-rectangle-button" value="Advanced Search" onclick="window.location.href='/Search/Advanced'" style="float:right; margin-right:10px;">
				{*<span class="resultAction_img_span">
					<img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"/>
				</span> *}
				<div class="resultAction_span" style="padding-top:3px; padding-left:6px;">Advanced Search</div>
			</div>
		</div>
	</div>
	{if $pageLinks.all}<div class="pagination" style="border-bottom: 1px solid #999999; padding-bottom:3px;">{$pageLinks.all}</div>{/if}

<!--	<input class="button" style="width: 105px; padding-left: 2px; padding-right: 2px; text-align: center" value="Advanced Search" onclick="window.location.href='/Search/Advanced'">
-->	
      {* End Listing Options *}

      {if $subpage}
        {include file=$subpage}
      {else}
        {$pageContent}
      {/if}

      {if $prospectorNumTitlesToLoad > 0}
        <script type="text/javascript">getProspectorResults({$prospectorNumTitlesToLoad}, {$prospectorSavedSearchId});</script>
      {/if}
      {* Prospector Results *}
      <div id='prospectorSearchResultsPlaceholder'></div>
        
      {if $pageLinks.all}<div class="pagination">{$pageLinks.all}</div>{/if}
      
      <div class="searchtools">
        <strong>{translate text='Search Tools'}:</strong>
        <a href="{$rssLink|escape}" class="feed">{translate text='Get RSS Feed'}</a>
        <a href="{$url}/Search/Email" class="mail" onclick="getLightbox('Search', 'Email', null, null, '{translate text="Email this"}'); return false;">{translate text='Email this Search'}</a>
        {if $savedSearch}<a href="{$url}/MyResearch/SaveSearch?delete={$searchId}" class="delete">{translate text='save_search_remove'}</a>{else}<a href="{$url}/MyResearch/SaveSearch?save={$searchId}" class="add">{translate text='save_search'}</a>{/if}
        <a href="{$excelLink|escape}" class="exportToExcel">{translate text='Export To Excel'}</a>
      </div>
    </div>
    {* End Main Listing *}
  </div>
  {*right-bar template*}
  {include file="ei_tpl/right-bar.tpl"}
</div>