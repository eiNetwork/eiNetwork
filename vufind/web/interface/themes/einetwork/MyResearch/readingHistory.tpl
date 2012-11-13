{if (isset($title)) }
<script type="text/javascript">
	alert("{$title}");
</script>
{/if}
<script type="text/javascript" src="{$path}/js/readingHistory.js" ></script>
<script type="text/javascript" src="{$path}/services/MyResearch/ajax.js" ></script>
<script type="text/javascript" src="{$path}/js/tablesorter/jquery.tablesorter.min.js"></script>
<div id="page-content" class="content">
	<div id="left-bar">
		  {* Narrow Search Options *}
  <div id="left-bar">
	{if $sortOptions}
		 <dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Sort'}</dt>
			<dd>
				<select name="sort" onchange="document.location.href = '/MyResearch/ReadingHistory?page={$page|escape}&accountSort='+this.options[this.selectedIndex].value;">
				{foreach from=$sortOptions item=sortLabel key=sortData}
				  <option value="{$sortData|escape}"{if $sortData == $defaultSortOption} selected="selected"{/if}>{translate text=$sortLabel}</option>
				{/foreach}
				</select>
			</dd>
		 </dl>	
	{/if}
  </div>
  {* End Narrow Search Options *}
	</div>
  
	<div id="main-content">
		{if $user->cat_username}
			<div class="resulthead">
				<div><h2>{translate text='Reading History'} {if $historyActive == true}<span id='readingListWhatsThis' onclick="$('#readingListDisclaimer').toggle();">(What's This?)</span>{/if}</h2></div>
					{if $userNoticeFile}
						{include file=$userNoticeFile}
					{/if}
      
					<div id='readingListDisclaimer' {if $historyActive == true}style='display: none'{/if}>
					The library takes seriously the privacy of your library records. Therefore, we do not keep track of what you borrow after you return it. 
					However, our automated system has a feature called "My Reading History" that allows you to track items you check out. 
					Participation in the feature is entirely voluntary. You may start or stop using it, as well as delete all entries in "My Reading History" at any time. 
					If you choose to start recording "My Reading History", you agree to allow our automated system to store this data. 
					The library staff does not have access to your "My Reading History", however, it is subject to all applicable local, state, and federal laws, and under those laws, could be examined by law enforcement authorities without your permission. 
					If this is of concern to you, you should not use the "My Reading History" feature.
					</div>
				</div>
          
				<div class="page">
					<form id='readingListForm' action ="{$fullPath}">
						<div>
							<input name='readingHistoryAction' id='readingHistoryAction' value='' type='hidden' />
							<div id="readingListActionsTop">
								{if $historyActive == true}
									{if $transList}
<!--										<input class="button" onclick='return deletedMarkedAction()' value="Delete Marked">
-->										<input class="button" type="button" onclick='return deleteAllAction()' value="Delete All">
									{/if}
									<input class="button" type="button" onclick='return optOutAction({if $transList}true{else}false{/if})' value="Stop Recording">
									{else}
									<input class="button" type="button" onclick='return optInAction()' value="Start Recording My Reading History">
								{/if}
							</div>
							
							{if $transList}
								{if $pageLinks.all}<div class="pagination">{$pageLinks.all}</div>{/if}  
							{/if}
							{if $transList}
							<table class="myAccountTable" id="readingHistoryTable">
							  <thead>
							    <tr>
							      {*<th><input id='selectAll' type='checkbox' onclick="toggleCheckboxes('.titleSelect', $(this).attr('checked'));" title="Select All/Deselect All"/></th>*}
							      <th>{translate text='Title'}</th>
							      <th>{translate text='Format'}</th>
							      <th>{translate text='Out'}</th>
								<th>{translate text=''}</th>
							    </tr>
							  </thead>
							  <tbody> 
      								{foreach from=$transList item=record name="recordLoop" key=recordKey }
								<tr id="record{$record.recordId|escape}" class="result alt record{$smarty.foreach.recordLoop.iteration}">								
								{*<td class="titleSelectCheckedOut myAccountCell">
								<input type="checkbox" name="selected[{$record.recordId|escape:"url"}]" class="titleSelect" id="selected{$record.recordId|escape:"url"}" />
								</td>*}
								<td class="myAccountCell">
								{if $user->disableCoverArt != 1}
									<div class="imageColumn">	  
									<a href="{$url}/Record/{$record.recordId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" id="descriptionTrigger{$record.recordId|escape:"url"}">
									<img src="{$path}/bookcover.php?id={$record.recordId}&amp;isn={$record.isbn|@formatISBN}&amp;size=small&amp;upc={$record.upc}&amp;category={$record.format_category|escape:"url"}" class="listResultImage" alt="{translate text='Cover Image'}"/>
									</a>
									<div id='descriptionPlaceholder{$record.recordId|escape}' style='display:none'></div>
									</div>
								{/if}
								{* Place hold link *}
								<div class='requestThisLink' id="placeHold{$record.recordId|escape:"url"}" style="display:none">
								<a href="{$url}/Record/{$record.recordId|escape:"url"}/Hold"><img src="{$path}/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
								</div>				    
								<div class="myAccountTitleDetails">
								<div class="resultItemLine1">
									<a href="{$url}/Record/{$record.recordId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" class="title">{if !$record.title|regex_replace:"/(\/|:)$/":""}{translate text='Title not available'}{else}{$record.title|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}{/if}</a>
									{if $record.title2}
									<div class="searchResultSectionInfo">
									{$record.title2|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}
									</div>
									{/if}
								</div>

								<div class="resultItemLine2">
									{if $record.author}
										{translate text='by'}
										{if is_array($record.author)}
											{foreach from=$summAuthor item=author}
											<a href="{$url}/Author/Home?author={$author|escape:"url"}">{$author|highlight:$lookfor}</a>
											{/foreach}
										{else}
											<a href="{$url}/Author/Home?author={$record.author|escape:"url"}">{$record.author|highlight:$lookfor}</a>
										{/if}
									{/if}
									{if $record.publicationDate}{translate text='Published'} {$record.publicationDate|escape}{/if}
								</div>
												
							</div>
							</td>
											      
							<td class="myAccountCell">
								{if is_array($record.format)}
								{foreach from=$record.format item=format}
									{translate text=$format}
								{/foreach}
								{else}
								{translate text=$record.format}
								{/if}
							</td>
							  
							<td class="myAccountCell">      
								{$record.checkout|escape}{if $record.lastCheckout} to {$record.lastCheckout|escape}{/if}
							</td>             
							{if $record.recordId != -1}
								<script type="text/javascript">
								  $(document).ready(function(){literal} { {/literal}
								      resultDescription('{$record.recordId}','{$record.recordId}');
								  {literal} }); {/literal}
								</script>
							{/if}
							<td class="myAccountCell">
								<input class="button" type="button" style="margin-top: 0px;height: 25px;width: 80px" value="Delete" onclick="deleteOne('{$record.rsh|escape:"url"}')" />
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>           
							    
			<script type="text/javascript">
				$(document).ready(function() {literal} { {/literal}
					doGetRatings();
					{literal} }); {/literal}
			</script>
				{else if $historyActive == true}
				  {* No Items in the history, but the history is active *}
				  You do not have any items in your reading list.  It may take up to 3 hours for your reading history to be updated after you start recording your history.
				{/if}
				{if $transList} {* Don't double the actions if we don't have any items *}
					<div id="readingListActionsBottom">
					{if $historyActive == true}
						{if $transList}
<!--						<input class="button" onclick="return deletedMarkedAction()" value="Delete Marked">
-->						<input class="button" type="button" onclick="return deletedAllAction()" value="Delete All">
						{/if}
						<input class="button" type="button" onclick='return optOutAction({if $transList}true{else}false{/if})' value="Stop Recording">
						{else}
						<input class="button" type="button" onclick="return optInAction()" value="Start Recording My Reading History">
						{/if}
					</div>
				{/if}
				{if $transList}
					{if $pageLinks.all}<div class="pagination">{$pageLinks.all}</div>{/if}  
				{/if}
		</div>
	</form>
	</div>{else}
	<div class="page">
	You must login to view this information. Click <a href="{$path}/MyResearch/Login">here</a> to login.
	</div>
	{/if}
	</div>
	<div id="right-bar">
		{include file="MyResearch/menu.tpl"}
		{include file="Admin/menu.tpl"}
	</div>
</div>