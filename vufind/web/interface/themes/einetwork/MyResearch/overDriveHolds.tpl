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
	{if $user}
		<div class="myAccountTitle">{translate text='Your OverDrive Holds'}</div>
		
		{if count($overDriveHolds.available) > 0}
			
			<div>Titles available for checkout</div>
			<div class="checkout">
				{foreach from=$overDriveHolds.available item=record}
				<div id="record">
					<div class="item_image">
						<img src="{$record.imageUrl}">
					</div>
					<div class="item_detail">
						<div class="item_subject">
							{if $record.recordId != -1}
								<a href="{$path}/EcontentRecord/{$record.recordId}/Home">
							{/if}
							{$record.title}
							{if $record.recordId != -1}
								</a>
							{/if}
							{if $record.subTitle}<br/>{$record.subTitle}{/if}
						</div>
						<div class="item_author">
							{if strlen($record.author) > 0}<br/> {$record.author}{/if}
						</div>
						<div class="item_type"></div>
					</div>
					<div class="item_status">
						{foreach from=$record.formats item=format}
						<div>{$format.name}</div>
						<div>
							<a href="#" onclick="checkoutOverDriveItem('{$format.overDriveId}','{$format.formatId}')" class="button">Check&nbsp;Out</a>
						</div>
					{/foreach}
					</div>
				</div>
				{/foreach}
			</div>
		{/if}
		
		{if count($overDriveHolds.unavailable) > 0}
			<div>Requested items not yet available</div>
			<div class="checkout">
				{foreach from=$overDriveHolds.unavailable item=record}
				<div id="record">
					<div class="item_image">
						<img src="{$record.imageUrl}">
					</div>
					<div class="item_detail">
						<div class="item_subject">
							{if $record.recordId != -1}
							<a href="{$path}/EcontentRecord/{$record.recordId}/Home">
							{/if}
							{$record.title}
							{if $record.recordId != -1}</a>
							{/if}
							{if $record.subTitle}<br/>{$record.subTitle}{/if}
						</div>
						<div class="item_author">
							{if strlen($record.author) > 0}<br/>{$record.author}{/if}
						</div>
						<div class="item_type">
							{$record.format}
						</div>
					</div>
					<div class="item_status">
						{$record.holdQueuePosition} out of {$record.holdQueueLength}
						<a href="#" onclick="cancelOverDriveHold('{$record.overDriveId}','{$record.formatId}')" class="button">Remove</a><br/>
						
						{*<a href="{$record.downloadLink}">
							<input class="button" value="Download"/>
						</a>*}
					</div>
				</div>
			    {/foreach}
			</div>	
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
