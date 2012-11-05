<div id="record{$summId|escape}" class="econtent-resultsList">
<!--	<div class="selectTitle">
		<input type="checkbox" name="selected[econtentRecord{$summId|escape:"url"}]" id="selectedEcontentRecord{$summId|escape:"url"}" {if $enableBookCart}onclick="toggleInBag('econtentRecord{$summId|escape:"url"}', '{$summTitle|regex_replace:"/(\/|:'\")$/":""|escape:"javascript"}', this);"{/if} />&nbsp;
	</div>
-->	
	<div class="imageColumn"> 
		{if !isset($user->disableCoverArt) ||$user->disableCoverArt != 1}	
		<div id='descriptionPlaceholder{$summId|escape}' style='display:none'></div>
		<a href="{$path}/EcontentRecord/{$summId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" id="descriptionTrigger{$summId|escape:"url"}">
		<img src="{$bookCoverUrl}" class="listResultImage" alt="{translate text='Cover Image'}"/>
		</a>
		{/if}
		{* Place hold link *}
		<div class='requestThisLink' id="placeEcontentHold{$summId|escape:"url"}" style="display:none">
			<a href="{$path}/EcontentRecord/{$summId|escape:"url"}/Hold"><img src="{$path}/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
		</div>
		
		{* Checkout link *}
		<div class='checkoutLink' id="checkout{$summId|escape:"url"}" style="display:none">
			<a href="{$path}/EcontentRecord/{$summId|escape:"url"}/Checkout"><img src="{$path}/interface/themes/default/images/checkout.png" alt="Checkout"/></a>
		</div>
		
<!--		{* Access online link *}
		<div class='accessOnlineLink' id="accessOnline{$summId|escape:"url"}" style="display:none">
			<a href="{$path}/EcontentRecord/{$summId|escape:"url"}/Home?detail=holdingstab#detailsTab"><img src="{$path}/interface/themes/default/images/access_online.png" alt="Access Online"/></a>
		</div>
-->		{* Add to Wish List *}
		<div class='addToWishListLink' id="addToWishList{$summId|escape:"url"}" style="display:none">
			<a href="{$path}/EcontentRecord/{$summId|escape:"url"}/AddToWishList"><img src="{$path}/interface/themes/default/images/add_to_wishlist.png" alt="Access Online"/></a>
		</div>
	</div>

<div class="resultDetails">
	<div class="result_middle">
	<div class="resultItemLine1">
	<a href="{$path}/EcontentRecord/{$summId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" class="title">{if !$summTitle|regex_replace:"/(\/|:)$/":""}{translate text='Title not available'}{else}{$summTitle|regex_replace:"/(\/|:)$/":""|truncate:100:"..."|highlight:$lookfor}{/if}</a>
	{if $summTitleStatement}
		<div class="searchResultSectionInfo">
			{$summTitleStatement|regex_replace:"/(\/|:)$/":""|truncate:100:"..."|highlight:$lookfor}
		</div>
		{/if}
	</div>

	<div class="resultItemLine2">
		{if $summAuthor}
			{translate text='by'}
			{if is_array($summAuthor)}
				{foreach from=$summAuthor item=author}
					<a href="{$path}/Author/Home?author={$author|escape:"url"}">{$author|highlight:$lookfor}</a>
				{/foreach}
			{else}
				<a href="{$path}/Author/Home?author={$summAuthor|escape:"url"}">{$summAuthor|highlight:$lookfor}</a>
			{/if}
		{/if}

		{if $summDate}
			<div>
				{if $summDate.0|escape|count_characters == 4 }
					{$summDate.0|escape}
				{else}
					{* Some Overdrive Items don't have a bib record and will show up as 01/01/0001 - which date_format turns into '1'.  Any year less than 10 gets hidden.*}
					{if $summDate.0|date_format:"%Y"|count_characters > 1 }{$summDate.0|escape|date_format:"%Y"}{/if}
				{/if}
			</div>
		{/if}

	</div>
<!--	
	<div class="resultItemLine3">
		{if !empty($summSnippetCaption)}<b>{translate text=$summSnippetCaption}:</b>{/if}
		{if !empty($summSnippet)}<span class="quotestart">&#8220;</span>...{$summSnippet|highlight}...<span class="quoteend">&#8221;</span><br />{/if}
	</div>
-->
	
	{include file="/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl"}
<!--	{if is_array($summFormats)}
		{strip}
		{foreach from=$summFormats item=format name=formatLoop}
			{if $smarty.foreach.formatLoop.index != 0}, {/if}
			<span class="iconlabel {$format|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$format},</span>
		{/foreach}
		{/strip}
	{else}
		<span class="iconlabel {$summFormats|lower|regex_replace:"/[^a-z0-9]/":""}">{translate text=$summFormats}</span>
	{/if}
-->	
	
	<div id = "holdingsEContentSummary{$summId|escape:"url"}" class="holdingsSummary">
		<div class="statusSummary" id="statusSummary{$summId|escape:"url"}">
			<span class="unknown" style="font-size: 8pt;">{translate text='Loading'}...</span>
		</div>
	</div>
	</div>
	
	<div id ="searchStars{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultActions">
    {if $pageType eq 'WishList'}
	<div class="round-rectangle-button" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="window.location.href='{$url}/EcontentRecord/{$summId|escape:"url"}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}'">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span">View Details</span>
	</div>
	<div class="round-rectangle-button"  style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" onclick="window.location.href='{$sourceUrl}'">
	    <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	    <span class="resultAction_span" id="RequestWord{$summId|escape:"url"}" >Access Online</span>
	</div>
<!--	<div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px;" >
	    <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="more_like_this" >More Like This</span>
	</div>
-->	<div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" onclick="deleteItemInList('{$summId|escape:"url"}','eContent')">
	    <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="bad_reuslt_this" >Remove</span>
	</div>
    {elseif $pageType eq 'BookCart'}
	  <div class="round-rectangle-button" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="requestItem('{$summId|escape:"url"}','{$wishListID}')">
	      <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	      <span class="resultAction_span">Request Now</span>
	  </div>
	  <div class="round-rectangle-button"  style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" onclick="getSaveToListForm('{$summId|escape:"url"}', 'VuFind'); return false;">
	      <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	      <span class="resultAction_span" >Move to Wish List</span>
	  </div>
	  <div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px;" onclick="requestItem('{$summId|escape:"url"}','{$wishListID}')">
	      <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	      <span class="resultAction_span" name="more_like_this" >Find in Library</span>
	  </div>
	  <div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" onclick="deleteItemInList('{$summId|escape:"url"}','eContent')">
	      <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	      <span class="resultAction_span" name="bad_reuslt_this" >Remove</span>
	  </div>
    {else}
	<div class="round-rectangle-button" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="window.location.href='{$url}/EcontentRecord/{$summId|escape:"url"}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}'">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span">View Details</span>
	</div>
	<div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" onclick="window.location.href='{$sourceUrl}'">
	    <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	    <span class="resultAction_span" id="RequestWord{$summId|escape:"url"}">Access Online</span>
	</div>
<!--	<div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px;">
	    <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="more_like_this" >More Like This</span>
	</div>
	<div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px">
	    <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="bad_reuslt_this" >Bad Result</span>
	</div>
-->
    {/if}
</div>
</div>

<!--<div id ="searchStars{$summId|escape}" class="resultActions">
	<div class="rateEContent{$summId|escape} stat">
		<div class="statVal">
			<span class="ui-rater">
				<span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
				(<span class="ui-rater-rateCount-{$summId|escape} ui-rater-rateCount">0</span>)
			</span>
		</div>
		<div id="saveLink{$summId|escape}">
			{if $user}
				<div id="lists{$summId|escape}"></div>
				<script type="text/javascript">
					getSaveStatuses('{$summId|escape:"javascript"}');
				</script>
			{/if}
			{if $showFavorites == 1} 
				<a href="{$path}/Resource/Save?id={$summId|escape:"url"}&amp;source=eContent" style="padding-left:8px;" onclick="getSaveToListForm('{$summId|escape}', 'eContent'); return false;">{translate text='Add to'} <span class='myListLabel'>MyLIST</span></a>
			{/if}
		</div>
		{assign var=id value=$summId scope="global"}
		{include file="EcontentRecord/title-review.tpl" id=$summId}
	</div>
	<script type="text/javascript">
		$(
			 function() {literal} { {/literal}
					 $('.rateEContent{$summId|escape}').rater({literal}{ {/literal}module: 'EcontentRecord', recordId: {$summId},	rating:0.0, postHref: '{$path}/EcontentRecord/{$summId|escape}/AJAX?method=RateTitle'{literal} } {/literal});
			 {literal} } {/literal}
		);
	</script>
		
</div>
-->

<script type="text/javascript">
	addRatingId('{$summId|escape:"javascript"}', 'eContent');
	addIdToStatusList('{$summId|escape:"javascript"}', {if strcasecmp($source, 'OverDrive') == 0}'OverDrive'{else}'eContent'{/if});
	$(document).ready(function(){literal} { {/literal}
		resultDescription('{$summId}','{$summId}', 'eContent');
	{literal} }); {/literal}
	
</script>

</div>