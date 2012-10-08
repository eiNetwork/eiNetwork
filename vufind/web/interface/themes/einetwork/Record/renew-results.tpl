<div id='renew_results'>
	<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
		{translate text='Renewal Results'}
		<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"/></span>
	</div>
	<div id="popupboxContent" class="popupContent" style="margin-top:10px;height:150px;width:300px;">
		{if $renew_message_data.Unrenewed == 0}
			<div>All items were renewed successfully.</div>
		{else}
			<div>{$renew_message_data.Renewed} of {$renew_message_data.Total} items were renewed successfully.</div>
		{/if}
	</div>
</div>