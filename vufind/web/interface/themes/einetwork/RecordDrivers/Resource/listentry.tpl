<div id="record{$resource->record_id|regex_replace:"/\./":""|escape}" class="resultsList">
{*<div class="selectTitle">
  <input type="checkbox" class="titleSelect" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="toggleInBag('{$summId|escape}', '{$summTitle|regex_replace:"/(\/|:)$/":""|escape:"javascript"}', this);"{/if} />&nbsp;
</div>*}
    {php}
    
    global $interface;
    
    $resource = $this->get_template_vars("resource");
    //print_r($resource->record_id);
    $shortID = trim( $resource->record_id, "." );
    //echo $shortID;
    $interface->assign( "shortID", $shortID );
    {/php}
	<div class="imageColumn"> 
		 {if $user->disableCoverArt != 1}
		 <a href="{$url}/{if $resource->source == 'VuFind'}Record{else}EcontentRecord{/if}/{$resource->record_id|escape:"url"}" id="descriptionTrigger{$resource->record_id|regex_replace:"/\./":""|escape:"url"}">
			<img src="{$path}/bookcover.php?id={$resource->record_id}&amp;isn={$resource->isbn|@formatISBN}&amp;size=small&amp;upc={$resource->upc}&amp;category={$resource->format_category|escape:"url"}" class="listResultImage" alt="{translate text='Cover Image'}"/>
			</a>
			<div id='descriptionPlaceholder{$resource->record_id|regex_replace:"/\./":""|escape}' style='display:none'></div>
		 {/if}
			
			{* Place hold link *}
			<div class='requestThisLink' id="placeHold{$resource->record_id|escape:"url"}" style="display:none">
				<a href="{$url}/{if $resource->source == 'VuFind'}Record{else}EcontentRecord{/if}/{$resource->record_id|escape:"url"}/Hold"><img src="{img filename="place_hold.png"}" alt="Place Hold"/></a>
			</div>
	</div>

<div class="resultDetails">
  <div class="result_middle">
	<div class="resultItemLine1">
	  <a href="{$url}/{if $resource->source == 'VuFind'}Record{else}EcontentRecord{/if}/{$resource->record_id|escape:"url"}" class="title">{if !$resource->title}{translate text='Title not available'}{else}{$resource->title|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}{/if}</a>
	    {if $listTitleStatement}
		<div class="searchResultSectionInfo">
			{$listTitleStatement|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}
		</div>
	    {/if}
	</div>

  <div class="resultItemLine2">
    {if $resource->author}
      {translate text=''}
      {if is_array($resource->author)}
        {foreach from=$resource->author item=author}
          <a href="{$url}/Author/Home?author={$author|escape:"url"}">{$author|highlight:$lookfor}</a>
        {/foreach}
      {else}
        <a href="{$url}/Author/Home?author={$resource->author|escape:"url"}">{$resource->author|highlight:$lookfor}</a>
      {/if}
    {/if} 
	{if $listDate}
		<div>
			{$listDate.0|escape}
		</div>
	{/if}
  </div>
  
  {* //szheng:commented
  <div class="resultItemLine3">
    {if !empty($summSnippetCaption)}<b>{translate text=$summSnippetCaption}:</b>{/if}
    {if !empty($summSnippet)}<span class="quotestart">&#8220;</span>...{$summSnippet|highlight}...<span class="quoteend">&#8221;</span><br />{/if}
  </div>
  *}
    {*include file="/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl"*}
    
    
   <div id = "holdingsSummary{$resource->record_id|regex_replace:"/\./":""|escape:"url"}" class="holdingsSummary">
      <div class="statusSummary" id="statusSummary{$resource->record_id|regex_replace:"/\./":""|escape:"url"}">
	 <span class="unknown" style="font-size: 8pt;">{translate text='Loading'}...</span>
      </div>
  </div>
  </div> 
   <div id ="searchStars{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultActions">
    {if $pageType eq 'WishList'}
	<div class="round-rectangle-button" onclick="window.location.href ='{$url}/{if $resource->source == 'VuFind'}Record{else}EcontentRecord{/if}/{$resource->record_id|escape:"url"}'" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span" >View Details</span>
	</div>
	<div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="getSaveToBookCart('{$summId|escape:"url"}','VuFind');return false;"{/if}>
	    <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	    <span class="resultAction_span" >Move to Cart</span>
	</div>
<!--	<div class="round-rectangle-button"  style="border-radius:0px;border-bottom-width:0px;">
	    <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="more_like_this" >More like this</span>
	</div>
-->	<div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" onclick="deleteItemInList('{$summId|escape:"url"}','VuFind')">
	    <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="bad_reuslt_this" >Remove</span>
	</div>
    {elseif $pageType eq 'BookCart'}
	  <div class="round-rectangle-button" id="request-now{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="requestItem('{$summId|escape:"url"}','{$wishListID}')">
	      <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	      <span class="resultAction_span">Request Now</span>
	  </div>
	  <div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" onclick="getSaveToListForm('{$summId|escape:"url"}', 'VuFind'); return false;">
	      <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	      <span class="resultAction_span" >Move to Wish List</span>
	  </div>
	  <div class="round-rectangle-button"  style="border-radius:0px;border-bottom-width:0px;" onclick="findInLibrary('{$summId|escape:"url"}',false,'150px','570px','auto')">
	      <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	      <span class="resultAction_span">Find in Library</span>
	  </div>
	  <div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" onclick="deleteItemInList('{$summId|escape:"url"}','VuFind')">
	      <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	      <span class="resultAction_span">Remove</span>
	  </div>
    {else}

	<div class="round-rectangle-button" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="window.location.href ='{$url}/{if $resource->source == 'VuFind'}Record{else}EcontentRecord{/if}/{$resource->record_id|escape:"url"}'">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span">View Details</span>
	</div>
<!--	<div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="getSaveToBookCart('{$summId|escape:"url"}','VuFind',this);return false;"{/if}>
-->	<div class="round-rectangle-button" style="border-top-right-radius:0px;border-top-left-radius:0px"  name="selected[{if $shortID}{$shortID}{else}{$resource->record_id|escape}{/if}]" id="selected{if $shortID}{$shortID}{else}{$resource->record_id|escape}{/if}" {if $enableBookCart}onclick="getSaveToBookCart('{$resource->record_id|escape:"url"}','VuFind',this);return false;"{/if}>
	    <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	    <span class="resultAction_span" >Add to Cart</span>
	</div>
<!--	<div class="round-rectangle-button"  style="border-radius:0px;border-bottom-width:0px;">
	    <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="more_like_this" >More like this</span>
	</div>
	<div class="round-rectangle-button"  style="border-top-right-radius:0px;border-top-left-radius:0px" >
	    <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="bad_reuslt_this" >Bad result</span>
	</div>
-->
    {/if}
	<script type="text/javascript">
		addRatingId('{$resource->record_id|escape:"javascript"}');
		$(document).ready(function(){literal} { {/literal}
			addIdToStatusList('{$resource->record_id|escape:"javascript"}', '{$resource->source}');
			resultDescription('{$resource->record_id}','{$resource->record_id|regex_replace:"/\./":""}', '{$resource->source}');
		{literal} }); {/literal}
        getItemStatusCart('{$resource->record_id|escape}');
	</script>
</div>
</div>
</div>

