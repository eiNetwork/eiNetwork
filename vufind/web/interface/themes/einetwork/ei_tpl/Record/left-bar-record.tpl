	<div id="left-bar">
            	{if $series}
		<div class="sidegroup" id="series">
                    <dl class="narrowList navmenu narrowbegin">
                        <dt>{translate text='Series'}</dt>
			{foreach from=$series item=seriesItem name=loop}
<!--					<dd class="left-bar-value"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;type=Series">{$seriesItem.full_title|escape}</a></dd>
-->					<dt style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;"><img src={$seriesItem.bookjacket_url}></a></dt>
					<dd style="text-align: left; padding: 20 0 100 0px"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;">{$seriesItem.full_title|escape}&#32;by&#32;{$seriesItem.author|escape}</a></dd>
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
 
		 {* Display either similar tiles from novelist or from the catalog*}
		 <div id="similarTitlePlaceholder"></div>
		 {if is_array($similarTitles)}
			<div class="sidegroup" id="similar">
				<dl class="narrowList navmenu narrowbegin">
				<dt>{translate text='Similar Titles'}</dt>
					{foreach from=$similarTitles item=similar name=loop}
						<dt style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url}></a></dt>
						<dd style="text-align: left; padding: 20 0 100 0px"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;">{$similar.full_title|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{/foreach}
				</dl>
			</div>
		 {elseif is_array($similarRecords)}
		 <div id="relatedTitles">
			<h4>{translate text="Similar Titles"}</h4>
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
		 
		{if is_array($similarSeries)}
			<div class="sidegroup" id="similarSeries">
				<dl class="narrowList navmenu narrowbegin">
				<dt>{translate text='Similar Series'}</dt>
					{foreach from=$similarSeries item=similar name=loop}
<!--						<dd class="left-bar-value"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;">{$similar.main_name|escape}</a></dd>
-->						<dt style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} alt={$similar.reason}></a></dt>
						<dd style="text-align: left; padding: 25 0 95 0px"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;">{$similar.main_name|escape}&#32;by&#32;{$similar.author|escape}</a></dd>

					{/foreach}
				</dl>
			</div>
		{/if}

		
		 {if is_array($similarAuthors)}
			<div class="sidegroup" id="similarAuthors">
				<dl class="narrowList navmenu narrowbegin">
				<dt>{translate text='Similar Authors'}:</dt>
					{foreach from=$similarAuthors item=similar name=loop}
						<dd class="left-bar-value"><a href="{$path}/Union/Search?basicType=Author&lookfor=%22{$similar.full_name|escape:"url"}%22&amp;">{$similar.full_name|escape}</a></dd>
					{/foreach}
				</dl>
			</div>
		{/if}
		
		
<!--		<script src="http://ltfl.librarything.com/forlibraries/widget.js?id=1875-2233438439" type="text/javascript"></script><noscript>This page contains enriched content visible when JavaScript is enabled or by clicking <a href="http://ltfl.librarything.com/forlibraries/noscript.php?id=1875-2233438439&accessibility=1">here</a>.</noscript>
		<div id="ltfl_similars" class="ltfl"></div>
-->                <div class="sidegroup">
		{if $classicId}
		<div id = "classicViewLink"><a href ="{$classicUrl}/record={$classicId|escape:"url"}" target="_blank">Classic View</a></div>
		{/if}
                </div>
	</div>
