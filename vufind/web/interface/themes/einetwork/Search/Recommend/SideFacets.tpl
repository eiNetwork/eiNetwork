{*commented and modified by Xiaolin Lin 2012-06-05*}

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
			{*rating*}
			{elseif $title == 'lexile_score' || $title == 'accelerated_reader_reading_level' || $title == 'accelerated_reader_point_value'}
			
			<dl class="narrowList navmenu narrowbegin">
			<dt>{translate text=$cluster.label}</dt>
			<form id='{$title}Filter' action='{$fullPath}'>
				<div>
					<label for="{$title}from" class='yearboxlabel'>From:</label>
					<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}from" id="{$title}from" value="" />
					<label for="{$title}to" class='yearboxlabel'>To:</label>
					<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}to" id="{$title}to" value="" />
					{foreach from=$smarty.get item=parmValue key=paramName}
						{if is_array($smarty.get.$paramName)}
							{foreach from=$smarty.get.$paramName item=parmValue2}
							{if strpos($parmValue2, $title) === FALSE}
							<input type="hidden" name="{$paramName}[]" value="{$parmValue2|escape}" />
							{/if}
							{/foreach}
						{else}
							<input type="hidden" name="{$paramName}" value="{$parmValue|escape}" />
						{/if}
					{/foreach}
					<input type="submit" value="Go" id="goButton" />
				</div>
			</form>
			</dl>
			{else}
			{*add by Xiaolin Lin 2012-06-08 for customizing the left-bar column for eiNetiwork*}
			<div class="narrowList navmenu narrowbegin">
				<div>
					<span>{translate text=$cluster.label}</span>
					<span><hr/></span>
					<span><a href="#" onclick="moreFacets('{$title}'); return false;">{translate text='See all'} </a></span>
				</div>
				<div id="filter-name">
					{translate text=$cluster.label}
				</div>
				<div id="line"><hr/></div>
				<div id="see-all-label">
					<a href="#" onclick="moreFacets('{$title}'); return false;">{translate text='See all'} </a>
				</div>
				
				<div id="filter-list">
					{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $thisFacet.url!=null}
						<input type="checkbox" name="color" value="{$thisFacet.display|escape}">{$thisFacet.display|escape}({$thisFacet.count})<br/>
							{*<a href="{$thisFacet.url|escape}"> {/if}{$thisFacet.display|escape}{if $thisFacet.url!=null}</a>
						{if $thisFacet.count!=' '}({$thisFacet.count}){/if}<br/>*}
						{/if}
					{/foreach}
					{if $smarty.foreach.narrowLoop.total > $cluster.valuesToShow}
						<a href="#" onclick="lessFacets('{$title}'); return false;">{translate text='less'} </a>
					{/if}
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