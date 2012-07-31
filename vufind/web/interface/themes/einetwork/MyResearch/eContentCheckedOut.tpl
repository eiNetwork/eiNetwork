<script type="text/javascript" src="{$url}/services/MyResearch/ajax.js"></script>
{if (isset($title)) }
<script type="text/javascript">
    alert("{$title}");
</script>
{/if}
<div id="page-content" class="content">
  <div id="left-bar">
     &nbsp;
  </div>
  
  <div id="main-content">
    {if $user->cat_username}

      {* Display recommendations for the user *}
      {if $showStrands && $user->disableRecommendations == 0}
	      {assign var="scrollerName" value="Recommended"}
				{assign var="wrapperId" value="recommended"}
				{assign var="scrollerVariable" value="recommendedScroller"}
				{assign var="scrollerTitle" value="Recommended for you"}
				{include file=titleScroller.tpl}
			
				<script type="text/javascript">
					var recommendedScroller;
	
					recommendedScroller = new TitleScroller('titleScrollerRecommended', 'Recommended', 'recommended');
					recommendedScroller.loadTitlesFrom('{$url}/Search/AJAX?method=GetListTitles&id=strands:HOME-3&scrollerName=Recommended', false);
				</script>
			{/if}
          
      <div class="myAccountTitle">{translate text='Your Checked Out eContent'}</div>
      {if $userNoticeFile}
        {include file=$userNoticeFile}
      {/if}
      
      {if $transList}
        <div class='sortOptions'>
          {*
          {translate text='Sort by'}
          <select name="sort" id="sort" onchange="changeSort($(this).val());">
          {foreach from=$sortOptions item=sortDesc key=sortVal}
            <option value="{$sortVal}"{if $defaultSortOption == $sortVal} selected="selected"{/if}>{translate text=$sortDesc}</option>
          {/foreach}
          </select> *}
          Hide Covers <input type="checkbox" onclick="$('.imageColumn').toggle();"/>
        </div>
	      
	    {/if}
	    
	    {if count($checkedOut) > 0}
	    	<table class="myAccountTable">
	    	<thead>
	    		<tr><th>Title</th><th>Source</th><th>Out</th><th>Due</th><th>Wait List</th><th>Rating</th><th>Read</th></tr>
	    	</thead><tbody>
		    {foreach from=$checkedOut item=record}
		    	<tr>
	        	<td><a href="{$path}/EcontentRecord/{$record.id}/Home">{$record.title}</a></td>
	        	<td>{$record.source}</td>
	        	<td>{$record.checkoutdate|date_format}</td>
	        	<td>
	        		{$record.duedate|date_format}
	        		{if $record.overdue}
                <span class='overdueLabel'>OVERDUE</span>
              {elseif $record.daysUntilDue == 0}
                <span class='dueSoonLabel'>(Due today)</span>
              {elseif $record.daysUntilDue == 1}
                <span class='dueSoonLabel'>(Due tomorrow)</span>
              {elseif $record.daysUntilDue <= 7}
                <span class='dueSoonLabel'>(Due in {$record.daysUntilDue} days)</span>
              {/if}
	        	</td>
	        	<td>{$record.holdQueueLength}</td>
	        	<td>
	        		<div id ="searchStars{$record.recordId|escape}" class="resultActions">
      				  <div class="rate{$record.recordId|escape} stat">
      					  <div class="statVal">
      					    <span class="ui-rater">
      					      <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
      					      (<span class="ui-rater-rateCount-{$record.recordId|escape} ui-rater-rateCount">0</span>)
      					    </span>
      					  </div>
      				      <div id="saveLink{$record.recordId|escape}">
      				        {if $showFavorites == 1} 
      				        <a href="{$url}/Record/{$record.recordId|escape:"url"}/Save" style="padding-left:8px;" onclick="getLightbox('Record', 'Save', '{$record.recordId|escape}', '', '{translate text='Add to favorites'}', 'Record', 'Save', '{$record.recordId|escape}'); return false;">{translate text='Add to'} <span class='myListLabel'>MyLIST</span></a>
      				        {/if}
      				        {if $user}
      				        	<div id="lists{$record.recordId|escape}"></div>
      							<script type="text/javascript">
      							  getSaveStatuses('{$record.recordId|escape:"javascript"}');
      							</script>
      				        {/if}
      				      </div>
      				    </div>
      				    <script type="text/javascript">
      				      $(
      				         function() {literal} { {/literal}
      				             $('.rate{$record.recordId|escape}').rater({literal}{ {/literal}module: 'EcontentRecord', recordId: '{$record.recordId}',  rating:0.0, postHref: '{$url}/Record/{$record.recordId|escape}/AJAX?method=RateTitle'{literal} } {/literal});
      				         {literal} } {/literal}
      				      );
      				    </script>
      				    
                      {assign var=id value=$record.recordId}
                      {include file="Record/title-review.tpl"}
      				  </div>
                    
        				{if $record.recordId != -1}
        				<script type="text/javascript">
        				  addRatingId('{$record.recordId|escape:"javascript"}');
        				</script>
        				{/if}
	        	</td>
	        	<td>
	        		{* Options for the user to view online or download *}
							{foreach from=$record.links item=link}
								<a href="{if $link.url}{$link.url}{else}#{/if}" {if $link.onclick}onclick="{$link.onclick}"{/if} class="button">{$link.text}</a>
							{/foreach}
	        	</td>
	        </tr>
		    {/foreach}
		    </tbody></table>
	    {else}
	    	<div class='noItems'>You do not have any eContent checked out</div>
	    {/if}
  {else}
    You must login to view this information. Click <a href="{$path}/MyResearch/Login">here</a> to login.
  {/if}
  </div>
  <div id="right-bar">
    {include file="MyResearch/menu.tpl"}  
    {include file="Admin/menu.tpl"}
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {literal} { {/literal}
		doGetRatings();
	{literal} }); {/literal}
</script>