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
 	setTimeout('getHeight();', 1500);
});
{/literal}
</script>
{/if}
{if $recordCount >= 0 || $filterList || ($sideFacetSet && $recordCount >= 0)}
	<div class="sidegroup">
		<div class="filters" id="wishLists">
		{if $pageType eq 'WishList'}
			{if !$onlyBookCart}
			 <dl class="narrowList navmenu narrowbegin">
				<dt>{translate text='View Wish List'}</dt>
					<dd>
						<form id='goToList' action='/List/Results' method='GET' name='goToList'> 
						<select id="goToListID" name='goToListID' onchange="this.form.submit()">
							{foreach from=$wishList item = list key=key name = loop}
								<option value="{$list.id}" {if $currentListID && $currentListID == $list.id} selected="selected"{/if}>{$list.title}									</option>
							{/foreach}
						</select>
						{foreach from=$wishList item = list key=key name = loop}
							{if $list.title == 'Book Cart'}
								<input type="hidden" value='{$list.id}' name='bookCartID' id='bookCartID'/>
							{/if}
						{/foreach}
						</form>
					</dd>
			 </dl>
			 {/if}
			 <dl class="narrowList navmenu narrowbegin" {if count($wishList)<=1}style="margin-top:10px"{/if}>
				<dd>
					<input type="button" onclick="ajaxLightbox('/List/ListEdit?id=&amp;source=VuFind&amp;lightbox',false,false,'450px',false,'200px'); return false;" class="button navmenu dd" value="Create New Wish List" style="width:180px"/>
				</dd>
				<dd>
					<input type="button" onclick="window.location = '/List/Import';" class="button navmenu dd" value="Import a Wish List" style="width:180px"/>
				</dd>
			 </dl>
		{/if}
		</div>
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
	<div style="padding-left: 10px; padding-top: 5px; font-weight: bold;">Limit to available<input id="limitToAvail" type="checkbox"></div>
	{if $filterList} 
		<dl class="narrowList navmenu narrow_begin">
			<dt>{translate text='Remove Filters'}</dt>
			<ul class="filters">
			{foreach from=$filterList item=filters key=field}
				{foreach from=$filters item=filter}
					<li style="padding-left:0px">{translate text=$field}: {$filter.display|escape}
					<a href="{$filter.removalUrl|escape}">
						<img src="{$path}/images/silk/delete.png" alt="Delete"/>
					</a>
					</li>
				{/foreach}
			{/foreach}
			</ul>
			<span style="display:none" id="removeFilters"><div style="padding-left: 19px; padding-top: 5px"><a href="#" onclick="removeFilters();">remove all filters</a></div></span>
		</dl>
	{/if}
	{if $sideFacetSet && $recordCount > 0}
		{foreach from=$sideFacetSet item=cluster key=title}
			<dl class="narrowList navmenu narrow_begin">
				<dt>{translate text=$cluster.label}</dt>
				{if $title == 'publishDate' || $title == 'birthYear' || $title == 'deathYear'}
					<dd>
						<form name='{$title}Filter' id='{$title}Filter' action='{$fullPath}'>
							<div>
								<label for="{$title}yearfrom" class='yearboxlabel'>From:</label>
								<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}yearfrom" id="{$title}yearfrom" value="" />
								<label for="{$title}yearto" class='yearboxlabel'>To:</label>
								<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}yearto" id="{$title}yearto" value="" />
								{* To make sure that applying this filter does not remove existing filters we need to copy the get variables as hidden variables *}
									{foreach from=$smarty.get item=parmValue key=paramName}
										{if is_array($smarty.get.$paramName)}
											{foreach from=$smarty.get.$paramName item=parmValue2}
												
												{* Do not include the filter that this form is for. *}
												
												{if strpos($parmValue2, $title) === FALSE}
													<input type="hidden" name="{$paramName}[]" value="{$parmValue2|escape}" />
												{/if}
											{/foreach}
										{else}
											<input type="hidden" name="{$paramName}" value="{$parmValue|escape}" />
										{/if}
									{/foreach}
								<input type="submit" value="Go" class="goButton" />
								<br/>
								{if $title == 'publishDate'}
									<div id='yearDefaultLinks'>
									<a onclick="$('#{$title}yearfrom').val('2005');$('#{$title}yearto').val('');" href='javascript:void(0);'>since&nbsp;2005</a>
									&bull;<a onclick="$('#{$title}yearfrom').val('2000');$('#{$title}yearto').val('');" href='javascript:void(0);'>since&nbsp;2000</a>
									&bull;<a onclick="$('#{$title}yearfrom').val('1995');$('#{$title}yearto').val('');" href='javascript:void(0);'>since&nbsp;1995</a>
									</div>
								{/if}
							</div>
						</form>
					</dd>
				{elseif $title == 'rating_facet'}
					{foreach from=$ratingLabels item=curLabel}
						{assign var=thisFacet value=$cluster.list.$curLabel}
						{if $thisFacet.isApplied}
							{if $curLabel == 'Unrated'}
								<dd>{$thisFacet.value|escape} <img src="{$path}/images/silk/tick.png" alt="Selected" />
								<a href="{$thisFacet.removalUrl|escape}" class="removeFacetLink">(remove)</a>
								</dd>
							{else}
								<dd><img src="{$path}/images/{$curLabel}.png" alt="{$curLabel|translate}"/>
									<img src="{$path}/images/silk/tick.png" alt="Selected" />
									<a href="{$thisFacet.removalUrl|escape}" class="removeFacetLink">(remove)</a>
								</dd>
							{/if}
						{else}
							{if $curLabel == 'Unrated'}
								<dd>{if $thisFacet.url !=null}
								<a href="{$thisFacet.url|escape}">{/if}{$thisFacet.display|escape}{if $thisFacet.url !=null}</a>{/if} ({$thisFacet.count})
								</dd>
							{else}
								<dd>{if $thisFacet.url !=null}
								<a href="{$thisFacet.url|escape}">{/if}<img src="{$path}/images/{$curLabel}.png" alt="{$curLabel|translate}"/>{if $thisFacet.url !=null}</a>{/if} ({if $thisFacet.count}{$thisFacet.count}{else}0{/if})
								</dd>
							{/if}
						{/if}
					{/foreach}
				{elseif $title == 'lexile_score' || $title == 'accelerated_reader_reading_level' || $title == 'accelerated_reader_point_value'}
					<form id='{$title}Filter' action='{$fullPath}'>
						<div>
							<label for="{$title}from" class='yearboxlabel'>From:</label>
							<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}from" id="{$title}from" value="" />
							<label for="{$title}to" class='yearboxlabel'>To:</label>
							<input type="text" size="4" maxlength="4" class="yearbox" name="{$title}to" id="{$title}to" value="" />
							{* To make sure that applying this filter does not remove existing filters we need to copy the get variables as hidden variables *}
								{foreach from=$smarty.get item=parmValue key=paramName}
									{if is_array($smarty.get.$paramName)}
										{foreach from=$smarty.get.$paramName item=parmValue2}
										{* Do not include the filter that this form is for. *}
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
				{else}
					{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
						{if $smarty.foreach.narrowLoop.iteration == ($cluster.valuesToShow + 1)  && $title != 'format'}
							<dd id="more{$title}">
								<a href="#" onclick="moreFacets('{$title}'); return false;">{translate text='more'} ...</a>
							</dd>
						</dl>
						<dl class="narrowList navmenu narrowGroupHidden" id="narrowGroupHidden_{$title}">
						{elseif $smarty.foreach.narrowLoop.iteration == ($cluster.valuesToShow + 1)  && $title == 'format' }
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
								{if $thisFacet.url !=null}
								<a href="{$thisFacet.url|escape}">{/if}{$thisFacet.display|escape}{if $thisFacet.url !=null}</a>{/if}
								{if $thisFacet.count != ''}({$thisFacet.count}){/if}
							</dd>
						{/if}
					{/foreach}
					{if $smarty.foreach.narrowLoop.total > $cluster.valuesToShow && $title != 'format'}
						<dd>
							<a href="#" onclick="lessFacets('{$title}'); return false;">{translate text='less'} ...</a>
						</dd>
					{elseif $title == 'format'}
						</dl><dl class="narrowList navmenu">
							<dd >
								<a href="#" onclick="showADV('title', '.sortCategory')">{translate text='See All'} ...</a>
							</dd>
						</dl>
						{* Simple dump of tree html *}
						{$tree_html}
					{/if}
				{/if}
			</dl>
		{/foreach}
	{/if}
	</div>
{/if}