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
		{if $userNoticeFile}
			{include file=$userNoticeFile}
		{/if}

		{if count($overDriveCheckedOutItems) > 0}
			<div class="checkout">
				{foreach from=$overDriveCheckedOutItems item=record}
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
							{if strlen($record.record->author) > 0}<br/>{$record.record->author}{/if}
						</div>
						<div class="item_type">
							{$record.format}
						</div>
					</div>
					<div class="item_status">
						
						<a href="{$record.downloadLink}">
							<input class="button" value="Download"/>
						</a>
					</div>
				</div>
				{/foreach}
			</div>
			
		{else}
			<div class='noItems'>You do not have any titles from OverDrive checked out</div>
		{/if}
		<div id='overdriveMediaConsoleInfo'>
		<img src="{$path}/images/overdrive.png" width="125" height="42" alt="Powered by Overdrive" class="alignleft"/>
		<p>To access OverDrive titles, you will need the <a href="http://www.overdrive.com/software/omc/">OverDrive&reg; Media Console&trade;</a>.  
		If you do not already have the OverDrive Media Console, you may download it <a href="http://www.overdrive.com/software/omc/">here</a>.</p>
		<div class="clearer">&nbsp;</div> 
		<p>Need help transferring a title to your device or want to know whether or not your device is compatible with a particular format?
		Click <a href="http://help.overdrive.com">here</a> for more information. 
		</p>
		 
	</div>
	{else}
		You must login to view this information. Click <a href="{$path}/MyResearch/Login">here</a> to login.
	{/if}
	</div>
	<div id="right-bar">
		{include file="MyResearch/menu.tpl"}
		{include file="Admin/menu.tpl"}
	</div>
</div>
