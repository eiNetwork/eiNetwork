{strip}
<div onmouseup="this.style.cursor='default';" class="popupHeader">
	<span class="popupHeader-title">{$popupTitle|translate}</span>
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
</div>
<div id="popupboxContent" class="content">
	<div id='purchaseOptions'>
		{if $popupContent}
			{$popupContent}
		{else}
			{include file="$popupTemplate"}
		{/if}
</div>
{/strip}