<div id="left-bar">

        {if $subjects}
		<div id="subjects">
                <dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Subjects'}</dt>
				{foreach from=$subjects item=subject name=loop}
					{foreach from=$subject item=subjectPart name=subloop}
						{if $smarty.foreach.loop.iteration <= 2}
							<dd class="left-bar-value"><a href="{$path}/Search/Results?lookfor=%22{$subjectPart.search|escape:"url"}%22&amp;basicType=Subject">{$subjectPart.title|escape}</a></dd>
						{/if}
                    {/foreach}
				{/foreach}
                </dl>
		</div>
	{/if}

        {if $series}
		<div id="left-bar-series">
                    <dl>
                        <dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Series'}</dt>
			{foreach from=$series item=seriesItem name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt class="sim left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;"><img src={$seriesItem.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim left-bar-title"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;">{$seriesItem.full_title|escape}&#32;by&#32;{$seriesItem.author|escape}</a></dd>
					{else}
						<dt class="sim_hid left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;"><img src={$seriesItem.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim_hid left-bar-title"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;">{$seriesItem.full_title|escape}&#32;by&#32;{$seriesItem.author|escape}</a></dd>
					{/if}
			{/foreach}
						<dd class="sim_less_new_container"><a class="sim_less_new">Less</a></dd>
						<dd class="sim_more_new_container"><a class="sim_more_new">More</a></dd>
                    </dl>
		</div>
        {/if}
		
		 {* Display either similar tiles from novelist or from the catalog*}
	{if is_array($similarTitles)}
		<div id="left-bar-similar">
			<dl>
			<dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Similar Titles'}</dt>
				{foreach from=$similarTitles item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt class="sim left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim left-bar-title"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;">{$similar.full_title|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{else}
						<dt class="sim_hid left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim_hid left-bar-title"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;">{$similar.full_title|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{/if}
				{/foreach}
				<dd class="sim_less_new_container"><a class="sim_less_new">Less</a></dd>
				<dd class="sim_more_new_container"><a class="sim_more_new">More</a></dd>
			</dl>
		</div>
	{elseif is_array($similarRecords)}
		<div id="left-bar-relatedTitles">
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
				<dd class="sim_less_new_container"><a class="sim_less_new">Less</a></dd>
				<dd class="sim_more_new_container"><a class="sim_more_new">More</a></dd>
			</ul>
		 </div>
	{/if}
		 
	{if is_array($similarSeries)}
		<div id="left-bar-similarSeries">
			<dl>
			<dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Similar Series'}</dt>
				{foreach from=$similarSeries item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt class="sim left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim left-bar-title"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;">{$similar.main_name|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{else}
						<dt class="sim_hid left-bar-bookcover"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim_hid left-bar-title"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;">{$similar.main_name|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{/if}
				{/foreach}
				<dd class="sim_less_new_container"><a class="sim_less_new">Less</a></dd>
				<dd class="sim_more_new_container"><a class="sim_more_new">More</a></dd>
			</dl>
		</div>
	{/if}

		
	{if is_array($similarAuthors)}
		<div id="left-bar-similarAuthors">
			<dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Similar Authors'}</dt>
				{foreach from=$similarAuthors item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dd class="left-bar-value"><a href="{$path}/Union/Search?basicType=Author&lookfor=%22{$similar.full_name|escape:"url"}%22&amp;">{$similar.full_name|escape}</a></dd>
					{/if}
				{/foreach}
				<dd class="sim_less_new_container"><a class="sim_less_new">Less</a></dd>
				<dd class="sim_more_new_container"><a class="sim_more_new">More</a></dd>
			</dl>
		</div>
	{/if}
		
	{if $classicId}
		<div style="margin: 15px 10px 10px;" id = "classicViewLink"><a href ="{$classicUrl}/record={$classicId|escape:"url"}" target="_blank">Classic View</a></div>
	{/if}



	

</div>
