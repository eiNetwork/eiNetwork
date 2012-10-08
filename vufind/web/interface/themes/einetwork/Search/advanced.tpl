<div id="page-content" class="content">
<form method="get" action="{$url}/Search/Results" id="advSearchForm" class="search">
	<div id="left-bar">
		{if $searchFilters}
		<div class="sidegroup" id="exploreMore">
			<h4>{translate text="adv_search_filters"}<br/>
				<span>({translate text="adv_search_select_all"}
				<input type="checkbox" checked="checked" onclick="filterAll(this);" />)
				</span>
			</h4>
			<div class="sidegroupContents">
			{foreach from=$searchFilters item=data key=field}
			<div>
				<h4>{translate text=$field}</h4>
				<ul>
					{foreach from=$data item=value}
					<li><input type="checkbox" checked="checked" name="filter[]" value='{$value.field|escape}:"{$value.value|escape}"' /> {$value.display|escape}</li>
					{/foreach}
				</ul>
			</div>
			{/foreach}
			</div>
		</div>
		{/if}
		<div class="sidegroup">
			<h4>{translate text="Search Tips"}</h4>
			<div class="sidegroupContents">
				<div class="sideLinksAdv">
				<a href="{$url}/Help/Home?topic=search" onclick="window.open('{$url}/Help/Home?topic=advsearch', 'Help', 'width=625, height=510'); return false;">{translate text="Help with Advanced Search"}</a><br />
				<a href="{$url}/Help/Home?topic=search" onclick="window.open('{$url}/Help/Home?topic=search', 'Help', 'width=625, height=510'); return false;">{translate text="Help with Search Operators"}</a>
				</div>
			</div>
		</div>
	</div>
	<div id="main-content" class="advSearchContent">
		<div class="resulthead"><h3>{translate text='Advanced Search'}</h3></div>

		{if $editErr}
		{assign var=error value="advSearchError_$editErr"}
		<div class="error">{translate text=$error}</div>
		{/if}

		<div id="groupJoin" class="searchGroups">
			<strong>{translate text="search_groups"}</strong>:
			<div class="searchGroupDetails">
				{translate text="search_match"} : 
				<select name="join">
					<option value="AND">{translate text="group_AND"}</option>
					<option value="OR"{if $searchDetails}{if $searchDetails.0.join == 'OR'} selected="selected"{/if}{/if}>{translate text="group_OR"}</option>
				</select>
			</div>
			
		</div>

        
		<div id="searchHolder"></div>

		<a href="#" class="add" onclick="addGroup(); return false;">{translate text="add_search_group"}</a>
		<br /><br />
		<input type="submit" name="submit" class="button" value="{translate text="Find"}" /><br /><br />
		{if $facetList}
		<h3>{translate text='Limit To'}</h3><br />
		<table class="citation" summary="{translate text='Limit To'}">
			<tr>
			{foreach from=$facetList item="list" key="label"}
				<td>{translate text=$label}: </td>
			{/foreach}
			{if $illustratedLimit}
				<td>{translate text="Illustrated"}</td>
			{/if}
			{if $showPublicationDate}
				<td>{translate text="Publication Year"}: </td>
			{/if}
			</tr>
			<tr>
				{foreach from=$facetList item="list" key="label"}
				<td>
					<select name="filter[]" multiple size="10 ">
					{foreach from=$list item="value" key="display"}
						<option value="{$value.filter|escape}"{if $value.selected} selected="selected"{/if}>{$display|escape}</option>
					{/foreach}
					</select>
				</td>
				{/foreach}
				{if $illustratedLimit}
				<td>
				{foreach from=$illustratedLimit item="current"}
				<input type="radio" name="illustration" value="{$current.value|escape}"{if $current.selected} checked="checked"{/if} /> {translate text=$current.text}<br />
				{/foreach}
				</td>
				{/if}
				{if $showPublicationDate}
				<td>
					<label for="publishDateyearfrom" class='yearboxlabel'>From:</label>
					<input type="text" size="4" maxlength="4" class="text" name="publishDateyearfrom" id="publishDateyearfrom" value="" />
					<label for="publishDateyearto" class='yearboxlabel'>To:</label>
					<input type="text" size="4" maxlength="4" class="text" name="publishDateyearto" id="publishDateyearto" value="" />
					<br/>
					{*<div id='yearDefaultLinks'>
						<a onclick="$('#publishDateyearfrom').val('2005');$('#publishDateyearto').val('');" href='javascript:void(0);'>since&nbsp;2005</a>
						&bull;<a onclick="$('#publishDateyearfrom').val('2000');$('#publishDateyearto').val('');" href='javascript:void(0);'>since&nbsp;2000</a>
						&bull;<a onclick="$('#publishDateyearfrom').val('1995');$('#publishDateyearto').val('');" href='javascript:void(0);'>since&nbsp;1995</a>
					</div>*}
				</td>
				{/if}
			</tr>
		</table>
		{/if}
		<input type="submit" name="submit"  class="button" value="{translate text="Find"}" /><br />
        </div>

</form>
</div>


{* Step 1: Define our search arrays so they are usuable in the javascript *}
<script type="text/javascript">
    var searchFields = new Array();
    {foreach from=$advSearchTypes item=searchDesc key=searchVal}
    searchFields["{$searchVal}"] = "{translate text=$searchDesc}";
    {/foreach}
    var searchJoins = new Array();
    searchJoins["AND"]  = "{translate text="search_AND"}";
    searchJoins["OR"]   = "{translate text="search_OR"}";
    searchJoins["NOT"]  = "{translate text="search_NOT"}";
    var addSearchString = "{translate text="add_search"}";
    var searchLabel     = "{translate text="adv_search_label"}";
    var searchFieldLabel = "{translate text="in"}";
    var deleteSearchGroupString = "{translate text="del_search"}";
    var searchMatch     = "{translate text="search_match"}";
    var searchFormId    = 'advSearchForm';
</script>
{* Step 2: Call the javascript to make use of the above *}
<script type="text/javascript" src="{$path}/services/Search/advanced.js"></script>
{* Step 3: Build the page *}
<script type="text/javascript">
  {if $searchDetails}
    {foreach from=$searchDetails item=searchGroup}
      {foreach from=$searchGroup.group item=search name=groupLoop}
        {if $smarty.foreach.groupLoop.iteration == 1}
    var new_group = addGroup('{$search.lookfor|escape:"javascript"}', '{$search.field|escape:"javascript"}', '{$search.bool}');
        {else}
    addSearch(new_group, '{$search.lookfor|escape:"javascript"}', '{$search.field|escape:"javascript"}');
        {/if}
      {/foreach}
    {/foreach}
  {else}
    var new_group = addGroup();
    addSearch(new_group);
    addSearch(new_group);
  {/if}
</script>