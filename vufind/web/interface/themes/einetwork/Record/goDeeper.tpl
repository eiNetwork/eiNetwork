<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
	{translate text='Additional information about this title'}
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
</div>
<div id="popupboxContent" class="popupContent" style="margin-top:10px">
	{* Generate links for each go deeper option *}
	<div id='goDeeperContent'>
	<div id='goDeeperLinks'>
	{foreach from=$options item=option key=dataAction}
	<div class='goDeeperLink'><a href='#' onclick="getGoDeeperData('{$dataAction}', '{$id}', '{$isbn}', '{$upc}');return false;" style="color: rgb(153,153,255);">{$option}</a></div>
	{/foreach}
	</div>
	<div id='goDeeperOutput'>{$defaultGoDeeperData}</div>
	</div>
	<div id='goDeeperEnd'>&nbsp;</div>
</div>