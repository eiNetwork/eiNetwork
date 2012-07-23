	<div id="left-bar">
			{if $wishLists}
			<div class="sidegroup" id="wishLists">
				 <dl class="narrowList navmenu narrowbegin">
					<dt>{translate text='View Wish List'}</dt>
						<dd>
							<select id="wishListID" name='wishListID'>
							{foreach from=$wishLists item = list name = loop}
								<option value=$list['id']>$list['title']</option>
							{/foreach}
						</dd>
				 </dl>
			</div>
		{/if}
            	{if $series}
		<div class="sidegroup" id="series">
                    <dl class="narrowList navmenu narrowbegin">
                        <dt>{translate text='Series'}:</dt>
			{foreach from=$series item=seriesItem name=loop}
					<dd><a href="{$path}/Search/Results?lookfor=%22{$seriesItem|escape:"url"}%22&amp;type=Series">{$seriesItem|escape}</a></dd>
			{/foreach}
                    </dl>
		</div>
                {/if}
                {if $subjects}
		<div class="sidegroup" id="subjects">
                <dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Subjects'}</dt>
				
				{foreach from=$subjects item=subject name=loop}
					{foreach from=$subject item=subjectPart name=subloop}
						{*{if !$smarty.foreach.subloop.first} -- {/if}*}
                                                <dd class="left-bar-value">
                                                    <a href="{$path}/Search/Results?lookfor=%22{$subjectPart.search|escape:"url"}%22&amp;basicType=Subject">{$subjectPart.title|escape}</a>
                                                </dd>
                                        {/foreach}
				{/foreach}
				
                </dl>
		</div>
		{/if}
                
		<div class="sidegroup" id="titleDetailsSidegroup" style="display:none">
			<h4>{translate text="Title Details"}</h4>
					{if $mainAuthor}
					<div class="sidebarLabel">{translate text='Main Author'}:</div>
					<div class="sidebarValue"><a href="{$path}/Author/Home?author={$mainAuthor|trim|escape:"url"}">{$mainAuthor|escape}</a></div>
					{/if}
					
					{if $corporateAuthor}
					<div class="sidebarLabel">{translate text='Corporate Author'}:</div>
					<div class="sidebarValue"><a href="{$path}/Author/Home?author={$corporateAuthor|trim|escape:"url"}">{$corporateAuthor|escape}</a>a></div>
					{/if}
					
					{if $contributors}
					<div class="sidebarLabel">{translate text='Contributors'}:</div>
					{foreach from=$contributors item=contributor name=loop}
						<div class="sidebarValue"><a href="{$path}/Author/Home?author={$contributor|trim|escape:"url"}">{$contributor|escape}</a></div>
					{/foreach}
					{/if}
					
					{if $published}
					<div class="sidebarLabel">{translate text='Published'}:</div>
					{foreach from=$published item=publish name=loop}
						<div class="sidebarValue">{$publish|escape}</div>
					{/foreach}
					{/if}
					
					{if $streetDate}
						<div class="sidebarLabel">{translate text='Street Date'}:</div>
						<div class="sidebarValue">{$streetDate|escape}</div>
					{/if}
					
					<div class="sidebarLabel">{translate text='Format'}:</div>
					{if is_array($recordFormat)}
					 {foreach from=$recordFormat item=displayFormat name=loop}
						 <div class="sidebarValue"><span class="iconlabel {$displayFormat|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$displayFormat}</span></div>
					 {/foreach}
					{else}
						<div class="sidebarValue"><span class="iconlabel {$recordFormat|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$recordFormat}</span></div>
					{/if}
					
					{if $mpaaRating}
						<div class="sidebarLabel">{translate text='Rating'}:</div>
						<div class="sidebarValue">{$mpaaRating|escape}</div>
					{/if}
					
					{if $physicalDescriptions}
			<div class="sidebarLabel">{translate text='Physical Desc'}:</div>
				{foreach from=$physicalDescriptions item=physicalDescription name=loop}
						<div class="sidebarValue">{$physicalDescription|escape}</div>
					{/foreach}
			{/if}
					
					<div class="sidebarLabel">{translate text='Language'}:</div>
					{foreach from=$recordLanguage item=lang}
						<div class="sidebarValue">{$lang|escape}</div>
					{/foreach}
					
					{if $editionsThis}
					<div class="sidebarLabel">{translate text='Edition'}:</div>
					{foreach from=$editionsThis item=edition name=loop}
						<div class="sidebarValue">{$edition|escape}</div>
					{/foreach}
					{/if}
					
					{if $isbns}
					<div class="sidebarLabel">{translate text='ISBN'}:</div>
					{foreach from=$isbns item=tmpIsbn name=loop}
						<div class="sidebarValue">{$tmpIsbn|escape}</div>
					{/foreach}
					{/if}
					
					{if $issn}
					<div class="sidebarLabel">{translate text='ISSN'}:</div>
						<div class="sidebarValue">{$issn}</div>
						{if $goldRushLink}
				<div class="sidebarValue"><a href='{$goldRushLink}' target='_blank'>Check for online articles</a></div>
			{/if}
					{/if}
					
					{if $upc}
					<div class="sidebarLabel">{translate text='UPC'}:</div>
					<div class="sidebarValue">{$upc|escape}</div>
					{/if}
					
					{if $series}
					<div class="sidebarLabel">{translate text='Series'}:</div>
					{foreach from=$series item=seriesItem name=loop}
						<div class="sidebarValue"><a href="{$path}/Search/Results?lookfor=%22{$seriesItem|escape:"url"}%22&amp;type=Series">{$seriesItem|escape}</a></div>
					{/foreach}
					{/if}
					
					{if $arData}
						<div class="sidebarLabel">{translate text='Accelerated Reader'}:</div>
						<div class="sidebarValue">{$arData.interestLevel|escape}</div>
						<div class="sidebarValue">Level {$arData.readingLevel|escape}, {$arData.pointValue|escape} Points</div>
					{/if}
					
					{if $lexileScore}
						<div class="sidebarLabel">{translate text='Lexile Score'}:</div>
						<div class="sidebarValue">{$lexileScore|escape}</div>
					{/if}
					
		</div>
		
		{if $showTagging == 1}
		<div class="sidegroup" id="tagsSidegroup" style="display:none">
			<h4>{translate text="Tags"}</h4>
			<div id="tagList">
			{if $tagList}
				{foreach from=$tagList item=tag name=tagLoop}
					<div class="sidebarValue"><a href="{$path}/Search/Results?tag={$tag->tag|escape:"url"}">{$tag->tag|escape:"html"}</a> ({$tag->cnt})</div>
				{/foreach}
			{else}
				<div class="sidebarValue">{translate text='No Tags'}, {translate text='Be the first to tag this record'}!</div>
			{/if}
			</div>
			<div class="sidebarValue">
				<a href="{$path}/Resource/AddTag?id={$id|escape:"url"}&amp;source=VuFind" class="tool add"
					 onclick="GetAddTagForm('{$id|escape}', 'VuFind'); return false;">{translate text="Add Tag"}</a>
			</div>
		</div>
		{/if}
		
		<div class="sidegroup" id="similarTitlesSidegroup" style="display:none">
		 {* Display either similar tiles from novelist or from the catalog*}
		 <div id="similarTitlePlaceholder"></div>
		 {if is_array($similarRecords)}
		 <div id="relatedTitles">
			<h4>{translate text="Other Titles"}</h4>
			<ul class="similar">
				{foreach from=$similarRecords item=similar}
				<li>
					{if is_array($similar.format)}
						<span class="{$similar.format[0]|lower|regex_replace:"/[^a-z0-9]/":""}">
					{else}
						<span class="{$similar.format|lower|regex_replace:"/[^a-z0-9]/":""}">
					{/if}
					<a href="{$path}/Record/{$similar.id|escape:"url"}">{$similar.title|regex_replace:"/(\/|:)$/":""|escape}</a>
					</span>
					<span style="font-size: 80%">
					{if $similar.author}<br/>{translate text='By'}: {$similar.author|escape}{/if}
					</span>
				</li>
				{/foreach}
			</ul>
		 </div>
		 {/if}
		</div>
		
		<div class="sidegroup" id="similarAuthorsSidegroup" style="display:none">
			<div id="similarAuthorPlaceholder"></div>
		</div>
		
		{if is_array($editions) && !$showOtherEditionsPopup}
		<div class="sidegroup" id="otherEditionsSidegroup" style="display:none">
			<h4>{translate text="Other Editions"}</h4>
				{foreach from=$editions item=edition}
					<div class="sidebarLabel">
						<a href="{$path}/Record/{$edition.id|escape:"url"}">{$edition.title|regex_replace:"/(\/|:)$/":""|escape}</a>
					</div>
					<div class="sidebarValue">
					{if is_array($edition.format)}
						{foreach from=$edition.format item=format}
							<span class="{$format|lower|regex_replace:"/[^a-z0-9]/":""}">{$format}</span>
						{/foreach}
					{else}
						<span class="{$edition.format|lower|regex_replace:"/[^a-z0-9]/":""}">{$edition.format}</span>
					{/if}
					{$edition.edition|escape}
					{if $edition.publishDate}({$edition.publishDate.0|escape}){/if}
					</div>
				{/foreach}
		</div>
		{/if}
		
		{if $enablePospectorIntegration == 1}
		<div class="sidegroup">
		{* Display in Prospector Sidebar *}
		<div id="inProspectorPlaceholder"></div>
		</div>
		{/if}
                <div class="sidegroup">
		{if $linkToAmazon == 1 && $isbn}
                    <div class="titledetails">
                            <a href="http://amazon.com/dp/{$isbn|@formatISBN}" class='amazonLink'> {translate text = "View on Amazon"}</a>
                    </div>
		{/if}
		
		{if $classicId}
		<div id = "classicViewLink"><a href ="{$classicUrl}/record={$classicId|escape:"url"}" target="_blank">Classic View</a></div>
		{/if}
                </div>
	</div>
