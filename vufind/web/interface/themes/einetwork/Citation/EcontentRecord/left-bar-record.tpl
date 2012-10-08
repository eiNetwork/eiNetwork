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
    {if count($seriesList) > 0}
		<div class="sidegroup" id="series">
                    <dl class="narrowList navmenu narrowbegin">
                        <dt>{translate text='Series'}:</dt>
			{foreach from=$seriesList item=seriesListItem name=loop}
					<dd><a href="{$path}/Search/Results?lookfor=%22{$seriesListItem|escape:"url"}%22&amp;type=Series">{$seriesListItem|escape}</a>{$seriesItem|escape}</a></dd>
			{/foreach}
                    </dl>
		</div>
    {/if}
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
    
</div>