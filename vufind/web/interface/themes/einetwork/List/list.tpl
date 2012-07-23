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
	<input type="hidden" value="{$wishListID}" id="listId"/>
    <div id="searchInfo">
	{if $pageType eq 'WishList'}
		<input type="button" value="Move all to book cart" onclick="saveAllToBookCart()">
	{/if}
	<div class="resulthead">
		<div class="yui-u toggle">
	        {if $recordCount}
	          {translate text='Sort'}
	          <select name="sort" onchange="document.location.href = this.options[this.selectedIndex].value;">
	          {foreach from=$sortList item=sortData key=sortLabel}
	            <option value="{$sortData.sortUrl|escape}"{if $sortData.selected} selected="selected"{/if}>{translate text=$sortData.desc}</option>
	          {/foreach}
	          </select>
	        {/if}
        </div>
	{if $pageType eq 'BookCart'}
	<form name='placeHoldForm' id='placeHoldForm' action="{$url}/MyResearch/HoldMultiple" method="post">
		<div>
			{if $holdDisclaimer}
				<div id="holdDisclaimer">{$holdDisclaimer}</div>
			{/if}
			
	    <div id="loginFormWrapper">
		  {foreach from=$ids item=id}
		     <input type="hidden" name="selected[{$id|escape:url}]" value="on" />
		  {/foreach}
		{if (!isset($profile)) }
			<div id ='loginUsernameRow' class='loginFormRow'>
				<div class='loginLabel'>{translate text='Username'}: </div>
				<div class='loginField'><input type="text" name="username" id="username" value="{$username|escape}" size="15"/></div>
			</div>
			<div id ='loginPasswordRow' class='loginFormRow'>
				<div class='loginLabel'>{translate text='Password'}: </div>
				<div class='loginField'><input type="password" name="password" id="password" size="15"/></div>
			</div>
			<div id='loginSubmitButtonRow' class='loginFormRow'>
				<input id="loginButton" type="button" onclick="GetPreferredBranches('{$id|escape}');" value="Login"/>
			</div>
		{/if}
		    <div id='holdOptions' {if (!isset($profile)) }style='display:none'{/if}>
	        <div class='loginFormRow'>
	        <div class='loginLabel'>{translate text="Pickup Location"}: </div>
	        <div class='loginField'>
	        <select name="campus" id="campus">
	          {if count($pickupLocations) > 0}
	            {foreach from=$pickupLocations item=location}
	              <option value="{$location->code}" {if $location->selected == "selected"}selected="selected"{/if}>{$location->displayName}</option>
	            {/foreach}
	          {else} 
	            <option>placeholder</option>
	          {/if}
	        </select>
	        </div>
	        {if $showHoldCancelDate == 1}
		      <div id='cancelHoldDate'><b>{translate text="Automatically cancel this hold if not filled by"}:</b>
		      <input type="text" name="canceldate" id="canceldate" size="10">
		      <br /><i>If this date is reached, the hold will automatically be cancelled for you.  This is a great way to handle time sensitive materials for term papers, etc. If not set, the cancel date will automatically be set 6 months from today.</i>
		      </div>
		{/if}
	        </div>
	        <div class='loginFormRow'>
	        <input type="hidden" name="holdType" value="hold"/>
	        <input type="submit" name="submit" id="requestTitleButton" value="{translate text='Request All'}" {if (!isset($profile))}disabled="disabled"{/if}/>
	        </div>
	      </div>
	      </div>
			</div>
	</form>
	{/if}
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



