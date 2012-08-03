<script type="text/javascript" src="{$path}/services/EcontentRecord/ajax.js"></script>
{* Main Listing *}
{if (isset($title)) }
<script type="text/javascript">
	alert("{$title}");
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
      {* Recommendations *}
      {*
	{if $topRecommendations}
		{foreach from=$topRecommendations item="recommendations"}
		{include file=$recommendations}
		{/foreach}
	{/if}
	*}
      {* Listing Options *}
	<div class="resulthead">
		<div class="yui-u first">
		{if $recordCount}
		{$recordCount}{translate text=" items found for"}
		{if $searchType == 'basic'}'{$lookfor|escape:"html"}' {/if}
		{/if}
		<br/><br/>
		{*{translate text='query time'}: {$qtime}s*}
		{if $spellingSuggestions}
		{*<div class="correction"><strong>{translate text='spell_suggest'}</strong>:<br/>
			{foreach from=$spellingSuggestions item=details key=term name=termLoop}
				{$term|escape} &raquo; {foreach from=$details.suggestions item=data key=word name=suggestLoop}
				<a href="{$data.replace_url|escape}">{$word|escape}</a>
				{if $data.expand_url}
				<a href="{$data.expand_url|escape}"><img src="{$path}/images/silk/expand.png" alt="{translate text='spell_expand_alt'}"/></a>
				{/if}
				{if !$smarty.foreach.suggestLoop.last}, {/if}
				{/foreach}
				{if !$smarty.foreach.termLoop.last}<br/>{/if}
			{/foreach}
		</div>*}
		{/if}
        </div>
	</div>
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
      
      <b class="bbot"><b></b></b>
    </div>
    {* End Main Listing *}
  </div>
  {*right-bar template*}
  {include file="ei_tpl/right-bar.tpl"}
</div>



