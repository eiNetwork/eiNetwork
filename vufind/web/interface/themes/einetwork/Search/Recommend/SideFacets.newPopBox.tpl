{*commented and modified at 2012-06-05*}
{*with 'see all' function*}

{literal}
<script type="text/javascript">
$(document).ready(function(){

   //checkboxes
   $(".checkbox").click(function(){
	
		if($(this).hasClass("checked")){
			$(this).removeClass("checked");
			$(this).addClass("unchecked");
		}
		else if($(this).hasClass("unchecked")){
			$(this).removeClass("unchecked");
			$(this).addClass("checked");
		}
	});
	
	var showingHUD = new Boolean();
	
	// hud popup
	$("div.sortCategoryHeading .button.basic").click(function(){
		//var hud = $(this).siblings(".HUD"); 
		var hud = $(this).parent().siblings(".HUD"); 
		if(showingHUD == true){
			$(".HUD").fadeOut("fast", function(){
				hud.fadeIn("fast");
				});
		}
		else{
 			hud.fadeIn("fast");
		}
		showingHUD = true;
	});
	$(".HUD .button").click(function(){
		$(".HUD").fadeOut("fast");
	});
	$(".HUD .close").click(function(){
		$(".HUD").fadeOut("fast");	
	});
	
	
	
});
</script>
{/literal}

{*Book Type*}

{assign var='book' value=["Book on CD","Book on Tape","Book on MP3 Disc","Book on Media Player","Print Book","Large Print","Ebook Download"]}
{assign var='book2' value="Book on Tape"}
{assign var='book3' value="Book on MP3 Disc"}
{assign var='book4' value="Book on Media Player"}
{assign var='book5' value="Print Book"}
{assign var='book6' value="Large Print"}
{assign var='book7' value="Ebook Download"}

{*Video Type*}
{assign var='video' value=["Video Cassette","DVD","CD-ROM","Blu-Ray","Video Download"]}
{assign var='video2' value="DVD"}
{assign var='video3' value="CD-ROM"}
{assign var='video4' value="Blu-Ray"}
{assign var='video5' value="Video Download"}

{*Music Type*}
{assign var='music' value=["Music CD","Music LP/Cassette","Music on Media Player","Music Score"]}
{assign var='music2' value="Music LP/Cassette"}
{assign var='music3' value="Music on Media Player"}
{assign var='music4' value="Music Score"}

{*Image Type*}
{assign var='imgae' value=["Printed Image","Digital Image"]}
{assign var='image2' value="Digital Image"}

{*Magazine Type*}
{assign var='magazine' value=["Print Magazine/Newspaper"]}

{*Microfilm and Microfiche Type*}
{assign var='micro' value=["Microfilm and Microfiche"]}

{*Object Type*}
{assign var='object' value=["Other Objects"]}


{*Kits Type*}
{assign var='kit' value=["Other Kits"]}

{*Map Type*}
{assign var='map' value=["Maps and Atlases"]}

{if $recordCount > 0 || $filterList || ($sideFacetSet && $recordCount > 0)}
{*
	{if $filterList}
	<strong>{translate text='Remove Filters'}</strong>
	<ul class="filters">
	{foreach from=$filterList item=filters key=field}
		{foreach from=$filters item=filter}
			<li>{translate text=$field}: {$filter.display|escape}
			<a href="{$filter.removalUrl|escape}">
				<img src="{$path}/images/silk/delete.png" alt="Delete"/>
			</a>
			</li>
		{/foreach}
	{/foreach}
	</ul>
	{/if}
*}	
	{if $sideFacetSet && $recordCount > 0}
		{foreach from=$sideFacetSet item=cluster key=title}

			
			{if $title == 'publishDate' || $title == 'birthYear' || $title == 'deathYear'}
			{*publication date*}
			{else}			
			<div class="sortCategory">
				<div class="sortCategoryHeading">
					<div class="title">{translate text=$cluster.label}</div>
					<div class="button basic">see all</div>
					{foreach from=$cluster.list item=thisFacet name="narrowLoop"}					
					{if $smarty.foreach.narrowLoop.iteration < 5}
					<div class="option" id="{$thisFacet.display|escape}">
						<span class="checkbox light unchecked" onclick="window.location='{$thisFacet.url|escape}'; return true;"></span>
						<span class="optionLabel" title="{$thisFacet.url|escape}">
							{$thisFacet.display|escape}{if $thisFacet.count != ''}({$thisFacet.count}){/if}
						</span>
					</div>
					{/if}
					{/foreach}
					
					{*
					{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
					{capture name="item"}{$thisFacet.display}{/capture}					
					{/foreach}
					*}
					
					
				</div>{*<!-- sortCategoryHeading -->*}
				{*<!-- Material TypeHUD -->*}
				<div id="{$title}TypeHUD" class="HUD" style="display: none;">
					<div class="title">{translate text=$cluster.label}<a class="close">close</a></div
					
					<div class="columnWrapper">
						<div class="column">
							<div class="option">
								<span class="checkbox dark unchecked"></span>
								<span class="optionLabel">Any Type</span>
							</div>
							{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
							{if $smarty.foreach.narrowLoop.iteration < 10}
							<div class="option" >
								<span class="checkbox dark unchecked" onclick="window.location='{$thisFacet.url|escape}'; return true;"></span>
								<span class="optionLabel" title="{$thisFacet.url|escape}">
									{$thisFacet.display|escape}{if $thisFacet.count != ''}({$thisFacet.count}){/if}
								</span>
							</div>
							{/if}
							{/foreach}
						</div>
						<div class="column">
							{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
							{if $smarty.foreach.narrowLoop.iteration >= 10 && $smarty.foreach.narrowLoop.iteration<=20}
							<div class="option">
								<span class="checkbox dark unchecked" onclick="window.location='{$thisFacet.url|escape}'; return true;"></span>
								<span class="optionLabel" title="{$thisFacet.url|escape}">
									{$thisFacet.display|escape}{if $thisFacet.count != ''}({$thisFacet.count}){/if}
								</span>
							</div>
							{/if}
							{/foreach}
						</div>
						<div class="column last">
							{foreach from=$cluster.list item=thisFacet name="narrowLoop"}
							{if $smarty.foreach.narrowLoop.iteration > 20 && $smarty.foreach.narrowLoop.iteration<=30}
							<div class="option">
								<span class="checkbox dark unchecked" onclick="window.location='{$thisFacet.url|escape}'; return true;"></span>
								<span class="optionLabel" title="{$thisFacet.url|escape}">
									{$thisFacet.display|escape}{if $thisFacet.count != ''}({$thisFacet.count}){/if}
								</span>
							</div>
							{/if}
							{/foreach}
							<div class="buttonContainer">
								<span class="button dark">Clear</span>
								<span class="button dark highlighted">OK</span>
							</div>
						</div>
					</div>{*<!-- Column Wrapper -->*}
				</div>{*<!-- Material TypeHUD -->*}
			{*</div><!-- sortCategory-->*}
			{/if}
		{/foreach}
	{/if}
{/if}

{*end customizing the left-bar column*}