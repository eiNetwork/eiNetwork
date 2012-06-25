{*commented and modified by Xiaolin Lin 2012-06-05*}
{*with 'see all' function*}
{if $recordCount > 0 || $filterList || ($sideFacetSet && $recordCount > 0)}
<div class="sidegroup">

	{if isset($checkboxFilters) && count($checkboxFilters) > 0}
	<p>
	<table>
	{foreach from=$checkboxFilters item=current}
		<tr{if $recordCount < 1 && !$current.selected} style="display: none;"{/if}>
		<td style="vertical-align:top; padding: 3px;">
			<input type="checkbox" name="filter[]" value="{$current.filter|escape}"
			{if $current.selected}checked="checked"{/if}
			onclick="document.location.href='{$current.toggleUrl|escape}';" />
		</td>
		<td>{translate text=$current.desc}<br /></td>
		</tr>
	{/foreach}
	</table>
	</p>
	{/if}
	
	{if $filterList}
	<strong>{translate text='Remove Filters'}</strong>
	<ul class="filters">
	{foreach from=$filterList item=filters key=field}
		{foreach from=$filters item=filter}
			<li>{translate text=$field}: {$filter.display|escape}
			<a href="{$filter.removalUrl|escape}">
				<img src="{$path}/images/silk/delete.png" alt="Delete"/>
			</a>
			</li>
		{/foreach}
	{/foreach}
	</ul>
	{/if}
	
	{if $sideFacetSet && $recordCount > 0}
		{foreach from=$sideFacetSet item=cluster key=title}
			{if $title == 'publishDate' || $title == 'birthYear' || $title == 'deathYear'}
			{*publication date*}
			{elseif $title == 'rating_facet'}
			
			{else}
			{*
				add by Xiaolin Lin 2012-06-08 for customizing the left-bar column for eiNetiwork
				modified by Xiaolin Lin 2012-06-11
			*}
			<div class="filters" id="{$title}">
				<div class="filter-header">
					<div class="filter-name">{translate text=$cluster.label}</div>
					<div class="line" >
						<hr style="width: auto">
					</div>
					<div class="see-all" id="more{$title}" onmouseout="mouseOut(event,'rgb(255,255,255)')" onmouseover="mouseOver(event,'rgb(242,242,242)')">
						{*<a href="#" onclick="moreFacets('{$title}'); return false;">&nbsp;&nbsp;{translate text='See all'}</a>*}
						<a href="#" onclick="seeAll('{$title}'); return false;">&nbsp;&nbsp;{translate text='See all'}</a>
					</div>

				</div>
				{*popup box template*}
				{*{include file="ei_tpl/popup.tpl"}*}
				<div id="{$title}" class="popup">
					<div class="all-filters">
					    <div id="filter-name"><b>{translate text=$cluster.label}</b></div>
					   
					    <div id="close" >
						<a href="#" onclick="closePopup('{$title}');return false;">close</a>
					    </div>
					</div>
					<div class="filter-list">
						
						<div id="list1">
						{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $smarty.foreach.narrowLoop.iteration < 10}	
						<input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
						<br/>
						{/if}
						{/foreach}					
						</div>
						
						<div id="list2">
						{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $smarty.foreach.narrowLoop.iteration >= 10 && $smarty.foreach.narrowLoop.iteration<=20}
						<input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
						<br/>
						{/if}
						{/foreach}						
						</div>
						
						<div id="list3">
						{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $smarty.foreach.narrowLoop.iteration >20 && $smarty.foreach.narrowLoop.iteration<=30}
						<input  type="checkbox" name="color" value="{$thisFacet.display|escape}"/>{$thisFacet.display|escape}({$thisFacet.count|escape})
						<br/>
						{/if}
						{/foreach}
						
						<div>
							<div class="cancel"  onmouseout="mouseOut(event,'rgb(252,252,252)')" onmouseover="mouseOver(event,'rgb(180,180,180)')" onclick="closePopup('{$title}');return false;">
								<span>Cancel</span>
								{*<input type="button" value="Cancel"/>*}
							</div>
							<div class="done" onmouseout="mouseOut(event,'rgb(255,230,109)')" onmouseover="mouseOver(event,'rgb(244,213,56)')" onclick="closePopup('{$title}');return false;">
								<span>Done</span>
								{*<input type="button" value="Done" />*}
							</div>
						</div>
						</div>
					</div>
				</div>
				{*end of popup box*}
				{*only show the first 6 filters*}
				<div id="{$title}" class="filter-list" >
					{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $smarty.foreach.narrowLoop.iteration <= 6}
						<input  type="checkbox" name="color" value="{$thisFacet.display|escape}">{$thisFacet.display|escape}({$thisFacet.count|escape})
						<br/>
						{/if}
					{/foreach}
				</div>

			</div>
			{*end customizing the left-bar column*}
			
			{*
			<dl class="narrowList navmenu narrowbegin">
				<dt>{translate text=$cluster.label}</dt>
				{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
					{if $smarty.foreach.narrowLoop.iteration == ($cluster.valuesToShow + 1)}
					<dd id="more{$title}">
						<a href="#" onclick="moreFacets('{$title}'); return false;">{translate text='See all'} </a>
					</dd>
			</dl>
			<dl class="narrowList navmenu narrowGroupHidden" id="narrowGroupHidden_{$title}">
					{/if}
					{if $thisFacet.isApplied}
					<dd>{$thisFacet.display|escape}
						<img src="{$path}/images/silk/tick.png" alt="Selected" />
						<a href="{$thisFacet.removalUrl|escape}" class="removeFacetLink">(remove)</a>
					</dd>
					{else}
					<dd>
						{if $thisFacet.url !=null}<a href="{$thisFacet.url|escape}">{/if}
						{$thisFacet.display|escape}
						{if $thisFacet.url !=null}</a>{/if}
						{if $thisFacet.count != ''}({$thisFacet.count}){/if}
					</dd>
					{/if}
				{/foreach}
				{if $smarty.foreach.narrowLoop.total > $cluster.valuesToShow}
				<dd>
					<a href="#" onclick="lessFacets('{$title}'); return false;">{translate text='less'} </a>
				</dd>
				{/if}
			</dl>
			*}
			{/if}
		{/foreach}
	{/if}
</div>
{/if}