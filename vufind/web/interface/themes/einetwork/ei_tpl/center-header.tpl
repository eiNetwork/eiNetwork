{literal}
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
{/literal}

<div class="center-header-top">&nbsp;</div>

<div class="center-header-middle">
    {if $searchType == 'advanced'}
    <a href="{$path}/Search/Advanced?edit={$searchId}" class="small">{translate text="Edit this Advanced Search"}</a> |
    <a href="{$path}/Search/Advanced" class="small">{translate text="Start a new Advanced Search"}</a> |
    <a href="{$url}" class="small">{translate text="Start a new Basic Search"}</a>
    <br />{translate text="Your search terms"} : "<b>{$lookfor|escape:"html"}</b>"
  {else}
  <form method="get" action="{$path}/Union/Search" id="searchForm" class="search" onsubmit='startSearch();'>

    <span id="search-label">Search</span>
    <span id="search-type">
	  <select id="search-select" name="basicType">
	    {foreach from=$basicSearchTypes item=searchDesc key=searchVal}
	      <option value="{$searchVal}"{if $searchIndex == $searchVal} selected="selected"{/if}>
		{translate text=$searchDesc}
	      </option>
	    {/foreach}
	  </select>
    </span>
    <span id="for-label">for</span>
    <div>
      <input id="lookfor" class="text" type="text" name="lookfor" value="{$lookfor|escape:"html"}"  />
      <input id="GoButton" class="button" type="submit" value=""/>
    </div>

      {*
      Do we have any checkbox filters? 
      {assign var="hasCheckboxFilters" value="0"}
      {if isset($checkboxFilters) && count($checkboxFilters) > 0}
        {foreach from=$checkboxFilters item=current}
          {if $current.selected}
            {assign var="hasCheckboxFilters" value="1"}
          {/if}
        {/foreach}
      {/if}
      *}
  </form>
    {if false && strlen($lookfor) > 0 && count($repeatSearchOptions) > 0}
    <div class='repeatSearchBox'>
      <label for='repeatSearchIn'>Repeat Search In: </label>
      <select name="repeatSearchIn" id="repeatSearchIn">
        {foreach from=$repeatSearchOptions item=repeatSearchOption}
          <option value="{$repeatSearchOption.link}">{$repeatSearchOption.name}</option>
        {/foreach}
      </select>
      <input type="button" name="repeatSearch" value="{translate text="Go"}" onclick="window.open(document.getElementById('repeatSearchIn').options[document.getElementById('repeatSearchIn').selectedIndex].value)">
    </div>
    {/if}
  {/if}
    <span id="disclaimer">&nbsp;&nbsp;&nbsp; This website is integrated with the live millennium & Overdrive systems.
    Holds, Renewals, Econtent & Checkouts are all live.</span>

</div>


<div class="center-header-buttom">&nbsp;</div>

