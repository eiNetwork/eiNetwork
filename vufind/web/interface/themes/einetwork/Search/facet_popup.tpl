 {assign var="popupTitle" value="Filter by Material Type"}
 {include file ='popup-wrapper.tpl' assign="temp" popupContent='<span />'}
 <script>
 {literal}
 	$(document).ready(function(){
 		{/literal}
 		{foreach from =$tree item =clist name="colloop"}
 			{foreach from=$clist  item=thisFacet name="narrowLoop"}
 				{if $thisFacet.isApplied == 1}
 					toggleCheck('cat{$thisFacet.id}');
 				{/if}
 			{/foreach}
 		{/foreach}
 		{literal}
 	});
	function showADV(title, elementSelector){
		var new_top =  document.body.scrollTop;
		$('#lightbox').show();
		$('#popupbox').show();
		$('#popupbox').css('top', '100px');
		$('#popupbox').css('left', $('#left-bar').offset().left+'px');
		$('#popupbox').css('width', '674px');
		$('#popupbox').css('height', '385px');
		var template = '{/literal}{$temp|addslashes}{literal}';
		var lightboxContents = template.substr(0,template.length-4)+$(elementSelector).html() + "</div>";
		$('#popupbox').html(lightboxContents);
	}
 {/literal}
 </script>
<link rel="stylesheet" type="text/css" href="/interface/themes/einetwork/css/ei_css/advfacet.css">
<div class="sortCategory">
	<div class="sortCategoryHeading">
		{*<div class="title">TITLE</div>*}
		
	</div>{*<!-- sortCategoryHeading -->*}
	<div id="TypeHUD" class="HUD" >
			<div class="columnWrapper">
				{assign var="col" value=0}
				{foreach from=$tree item=clist name="colloop"}
					 {include file ='Search/facet_popup_item.tpl' page=$smarty.foreach.colloop.iteration}
				{/foreach}
			</div>{*<!-- Column Wrapper -->*}
				<div class="buttonContainer">
							<span class="button dark" onclick="resetList()">Reset</span>
							<span class="button dark highlighted" onclick="submitURL()">OK</span>
					</div>
	</div>{*<!-- Material TypeHUD -->*}	
</div>