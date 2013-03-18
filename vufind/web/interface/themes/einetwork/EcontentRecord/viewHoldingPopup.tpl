<script type="text/javascript" src="{$url}/js/overdrive.js"></script>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
	{translate text='Holding'}
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"/></span>
</div>
<div id="popupboxContent" class="popupContent" style="margin-top:10px">
{if count($holdings) > 0}
    <div style="overflow-y:auto;height:auto;max-height:4000px;margin-left:8px">
	{if $lockedFormat == 0 }
	<div><span>You may select one format.</span></div>
	{/if}
	<table>
	<thead>
		<tr><th style="width:110px">Type</th><th style="width:80px">Source</th>{if $showEContentNotes}<th>Notes</th>{/if}<th style="padding-left:10px">&nbsp;</th>
	</thead>
	<tbody>
	{foreach from=$holdings item=eContentItem key=index}
		{if $eContentItem->item_type == 'overdrive'}
			{if $eContentItem->links[0].formatId != 610 }
			<tr id="itemRow{$index}" style="height:30px">
				<td>{$eContentItem->externalFormat}</td>
				<td>OverDrive</td>
				<td>
					{* Options for the user to view online or download *}
					{foreach from=$eContentItem->links item=link}
						{if ($lockedFormat == 0 || $link.formatId == $lockedFormat) && $link.formatId != 610}
						<input href="{if $link.url}{$link.url}{else}#{/if}" {if $link.onclick}onclick="downloadOverDriveItem('{$link.overDriveId}', '{$link.formatId}')"{/if} class="button" value="{if $link.text eq 'Place Hold'}Download Now{elseif $link.text eq 'Check Out'}Checkout Now{else}{$link.text}{/if}" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px"></a>
						{/if}	
					{/foreach}
					{if $user && $user->hasRole('epubAdmin')}
						<input value="Edit" href="#" onclick="return editItem('{$id}', '{$eContentItem->id}')" class="button" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px">
						<input value="Delete"href="#" onclick="return deleteItem('{$id}', '{$eContentItem->id}')" class="button" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px">
					{/if}
				</td>
			</tr>
			{/if}
			
		{else}
			<tr id="itemRow{$eContentItem->id} style="height:30px"">
				<td>{$eContentItem->item_type}</td>
				<td>{$eContentItem->source}</td>
				<td>{if $eContentItem->getAccessType() == 'free'}No Usage Restrictions{elseif $eContentItem->getAccessType() == 'acs' || $eContentItem->getAccessType() == 'singleUse'}Must be checked out to read{/if}</td>
				{if $showEContentNotes}<td>{$eContentItem->notes}</td>{/if}
				<td>
					{* Options for the user to view online or download *}
					{foreach from=$eContentItem->links item=link}
						<input value="{$link.text}" href="{if $link.url}{$link.url}{else}#{/if}" {if $link.onclick}onclick="{$link.onclick}"{/if} class="button" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px" >
					{/foreach}
					{if $user && $user->hasRole('epubAdmin')}
						<input value="Edit" href="#" onclick="return editItem('{$id}', '{$eContentItem->id}')" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px" class="button">
						<input value="Delete" href="#" onclick="return deleteItem('{$id}', '{$eContentItem->id}')" class="button" style="background-color:rgb(244,213,56);width:85px;height:20px;padding-top:0px;padding-bottom:0px">
					{/if}
				</td>
			</tr>
		{/if}
	{/foreach}
	</tbody>
	</table>
    </div>
{else}
	No Copies Found
{/if}

{assign var=firstItem value=$holdings.0}
{if strcasecmp($source, 'OverDrive') == 0}
	<div id='overdriveMediaConsoleInfo' style="margin-left:8px">
		<img src="{$path}/images/overdrive.png" width="125" height="42" alt="Powered by Overdrive" class="alignleft"/>
		<p>This title requires the <a href="http://www.overdrive.com/software/omc/">OverDrive&reg; Media Console&trade;</a> to use the title.  
		If you do not already have the OverDrive Media Console, you may download it <a href="http://www.overdrive.com/software/omc/">here</a>.</p>
		<div class="clearer">&nbsp;</div> 
		<p>Need help transferring a title to your device or want to know whether or not your device is compatible with a particular format?
		Click <a href="http://help.overdrive.com">here</a> for more information. 
		</p>
		 
	</div>
{/if}
</div>

