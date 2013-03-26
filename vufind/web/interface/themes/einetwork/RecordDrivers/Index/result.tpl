<div id="record{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultsList">
{*<div class="selectTitle">
  <input type="checkbox" class="titleSelect" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="toggleInBag('{$summId|escape}', '{$summTitle|regex_replace:"/(\/|:)$/":""|escape:"javascript"}', this);"{/if} />&nbsp;
</div>*}        
<div class="imageColumn">
    {if $user->disableCoverArt != 1}  
    <div id='descriptionPlaceholder{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}' style='display:none'></div>
    <a href="{$url}/Record/{$summId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" id="descriptionTrigger{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}">
    <img src="{$bookCoverUrl}" class="listResultImage" alt="{translate text='Cover Image'}"/>
    </a>
    {/if}
    {* Place hold link *}
<!--    <div class='requestThisLink' id="placeHold{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" style="display:none">
      <a href="{$url}/Record/{$summId|escape:"url"}/Hold"><img src="{$path}/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
    </div>
--></div>

<div class="resultDetails">
  <div class="result_middle">
  <div class="resultItemLine1">
  {if $summScore}({$summScore}) {/if}
	<a href="{$url}/Record/{$summId|escape:"url"}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" class="title">{if !$summTitle|regex_replace:"/(\/|:)$/":""}{translate text='Title not available'}{else}{$summTitle|regex_replace:"/(\/|:)$/":""|truncate:100:"..."|highlight:$lookfor}{/if}</a>
	{if $summTitleStatement}
    <div class="searchResultSectionInfo">
      {$summTitleStatement|regex_replace:"/(\/|:)$/":""|truncate:100:"..."|highlight:$lookfor}
    </div>
    {/if}
  </div>

  <div class="resultItemLine2">
    {if $summAuthor}
      {translate text=''}
      {if is_array($summAuthor)}
        {foreach from=$summAuthor item=author}
          <a href="{$url}/Author/Home?author={$author|escape:"url"}">{$author|highlight:$lookfor}</a>
        {/foreach}
      {else}
        <a href="{$url}/Author/Home?author={$summAuthor|escape:"url"}">{$summAuthor|highlight:$lookfor}</a>
      {/if}
    {/if}
    {if $summCorpAuthor}
      {translate text=''}
      {if is_array($summCorpAuthor)}
        {foreach from=$summCorpAuthor item=corpAuthor}
          <a href="{$url}/Author/Home?author={$corpAuthor|escape:"url"}">{$corpAuthor|highlight:$lookfor}</a>
        {/foreach}
      {else}
        <a href="{$url}/Author/Home?author={$summCorpAuthor|escape:"url"}">{$summCorpAuthor|highlight:$lookfor}</a>
      {/if}
    {/if}
	{if $summDate}
		<div>
			{$summDate.0|escape}
		</div>
	{/if}
  </div>
  
  {* //szheng:commented
  <div class="resultItemLine3">
    {if !empty($summSnippetCaption)}<b>{translate text=$summSnippetCaption}:</b>{/if}
    {if !empty($summSnippet)}<span class="quotestart">&#8220;</span>...{$summSnippet|highlight}...<span class="quoteend">&#8221;</span><br />{/if}
  </div>
  *}
    {include file="/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl"}
    
  <div id = "holdingsSummary{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="holdingsSummary">
    <div class="statusSummary" id="statusSummary{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}">
      <span class="unknown" style="font-size: 8pt;">{translate text='Loading'}...</span>
    </div>
  </div>
  </div>
   <div id ="searchStars{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultActions">
    {if $pageType eq 'WishList'}
	<div class="round-rectangle-button" onclick="window.location.href ='{$url}/Record/{$summId|escape:'url'}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}'" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px">
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
	<div class="round-rectangle-button" style="border-bottom-width:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px" onclick="window.location.href ='{$url}/Record/{$summId|escape:'url'}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}'">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span">View Details</span>
	</div>
<!--	<div class="round-rectangle-button" style="border-radius:0px;border-bottom-width:0px" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="getSaveToBookCart('{$summId|escape:"url"}','VuFind',this);return false;"{/if}>
-->	<div class="round-rectangle-button" style="border-top-right-radius:0px;border-top-left-radius:0px"  name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="getSaveToBookCart('{$summId|escape:"url"}','VuFind',this);return false;"{/if}>
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
        addRatingId('{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}');
        addIdToStatusList('{$summId|escape}');
        $(document).ready(function(){literal} { {/literal}
  	resultDescription('{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}','{$summId}');
        {literal} }); {/literal}
getItemStatusCart('{$summId|escape}');
    </script>
</div>
</div>
</div>

