<div id="left-bar">
<!--    {if $wishLists}
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
-->
    {if count($subjectList) > 0}
		<div class="sidegroup" id="subjects">
                <dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Subjects'}</dt>
                                {foreach from=$subjectList item=subjectListItem name=loop}
                                                <dd class="left-bar-value">
                                                    <a href="{$path}/Search/Results?lookfor=%22{$subjectListItem|escape:'url'}%22&amp;type=Subject">{$subjectListItem|escape}</a>
                                                </dd>
				{/foreach}
                </dl>
		</div>
    {/if}

    {if count($seriesList) > 0} {* series information from from the MARC record *}
		<div id="series">
                    <dl class="narrowList navmenu narrowbegin">
                        <dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Series'}</dt>
			{foreach from=$seriesList item=seriesListItem name=loop}
					<dd><a href="{$path}/Search/Results?lookfor=%22{$seriesListItem|escape:"url"}%22&amp;type=Series">{$seriesListItem|escape}</a>{$seriesItem|escape}</a></dd>
			{/foreach}
                    </dl>
		</div>
    {elseif $series} {* series information from Novelist *}
		<div id="series">
                    <dl>
                        <dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Series'}</dt>
			{foreach from=$series item=seriesItem name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt class="sim" style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;"><img src={$seriesItem.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim" style="text-align: left; margin: 0 10 0 0; padding: 20 0 70 0px"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;">{$seriesItem.full_title|escape}&#32;by&#32;{$seriesItem.author|escape}</a></dd>
					{else}
						<dt class="sim_hid" style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;"><img src={$seriesItem.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd class="sim_hid" style="text-align: left; margin: 0 10 0 0; padding: 20 0 70 0px"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$seriesItem.full_title|escape:"url"}%22&amp;">{$seriesItem.full_title|escape}&#32;by&#32;{$seriesItem.author|escape}</a></dd>
					{/if}
			{/foreach}
			<dd class="sim_more">More</dd>
                    </dl>
		</div>
        {/if}

	{* Display either similar tiles from novelist or from the catalog*}
	{if is_array($similarTitles) && sizeof($similarTitles) > 0}
		<div id="similar">
			<dl>
			<dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Similar Titles'}</dt>
				{foreach from=$similarTitles item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd style="text-align: left; margin: 0 10 0 0; padding: 20 0 70 0px"><a href="{$path}/Union/Search?basicType=Title&lookfor=%22{$similar.full_title|escape:"url"}%22&amp;">{$similar.full_title|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{/if}
				{/foreach}
			</dl>
		</div>
	{elseif is_array($similarRecords) && sizeof($similarTitles) > 0}
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
		<div id="similarSeries">
			<dl>
			<dt style="font-weight: bold; margin: 15px 10px 10px;">{translate text='Similar Series'}</dt>
				{foreach from=$similarSeries item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dt style="float: left;clear: left"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;"><img src={$similar.bookjacket_url} width="61" height="100" style="padding-left: 10"></a>&nbsp;&nbsp;</dt>
						<dd style="text-align: left; margin: 0 10 0 0; padding: 20 0 70 0px"><a href="{$path}/Union/Search?basicType=Keyword&lookfor=%22{$similar.main_name|escape:"url"}%22&amp;">{$similar.main_name|escape}&#32;by&#32;{$similar.author|escape}</a></dd>
					{/if}
				{/foreach}
			</dl>
		</div>
	{/if}
	
	{if is_array($similarAuthors)}
		<div id="similarAuthors">
			<dl class="narrowList navmenu narrowbegin">
			<dt>{translate text='Similar Authors'}</dt>
				{foreach from=$similarAuthors item=similar name=loop}
					{if $smarty.foreach.loop.iteration <= 2}
						<dd class="left-bar-value"><a href="{$path}/Union/Search?basicType=Author&lookfor=%22{$similar.full_name|escape:"url"}%22&amp;">{$similar.full_name|escape}</a></dd>
					{/if}
				{/foreach}
			</dl>
		</div>
	{/if}

</div>