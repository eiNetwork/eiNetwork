	<div onmouseup="this.style.cursor='default';" class="popupHeader">
		<span class="popupHeader-title">{translate text='Item Request Result'}</span>
		<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
	</div>
	<div class="popupContent" style="padding-top:25px;padding-left:25px">
		{if $hold_message_data.showItemForm}
		<form action='{$path}/MyResearch/HoldItems' method="POST">
		<input type='hidden' name='campus' value='{$hold_message_data.campus}'/>
		{/if}
		{if $hold_message_data.error}
		  <div class='hold_result_error'>{$hold_message_data.error}</div>
		{else}
			{if $hold_message_data.successful == 'all'}
			<div class='hold_result successful'>
			{if count($hold_message_data.titles) > 1}
			All hold requests were successful.
			{else}
			Your hold request was successful.
			{/if}
			</div>
			{elseif $hold_message_data.successful == 'partial'}
			<div class='hold_result partial'>Some hold requests could not be placed or need additional information.</div>
			{else}
			<div class='hold_result none'>Your hold request{if count($hold_message_data.titles) > 1}s{/if} could not be placed or needs additional information.</div>
			{/if}
		{/if}
		<ol class='hold_result_details'>
		{foreach from=$hold_message_data.titles item=title_data}
		  <li class='title_hold_result'>
		  <span class='hold_result_item_title'>
		  {if $title_data.title}
		    {$title_data.title}
		  {else}
		    {$title_data.bid}
		  {/if}
		  </span>
		  <br /><span class='{if $title_data.result == true}hold_result_title_ok{else}hold_result_title_failed{/if}'>{$title_data.message}</span>
		  {if $title_data.items}
		    <select  name="title[{$title_data.bid}]">
		    <option class='hold_item' value="-1">Select an item</option>
		    {foreach from=$title_data.items item=item_data}
		    <option class='hold_item' value="{$item_data.itemNumber}">{$item_data.location}- {$item_data.callNumber} - {$item_data.status}</option>
		    {/foreach}
		    </select>
		  {/if}
		  </li>
		{/foreach}
		</ol>
		{if $hold_message_data.showItemForm}
		<input type='submit' value='Place Item Holds' />
		</form>
		{/if}
	</div>