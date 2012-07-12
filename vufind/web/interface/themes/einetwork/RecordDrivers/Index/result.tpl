<div id="record{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultsList">       
<div class="imageColumn">
    {if $user->disableCoverArt != 1}  
    <div id='descriptionPlaceholder{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}' style='display:none'></div>
    <a href="{$url}/Record/{$summId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" id="descriptionTrigger{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}">
    <img src="{$bookCoverUrl}" class="listResultImage" alt="{translate text='Cover Image'}"/>
    </a>
    {/if}
    {* Place hold link *}
    <div class='requestThisLink' id="placeHold{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" style="display:none">
      <a href="{$url}/Record/{$summId|escape:"url"}/Hold"><img src="{$path}/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
    </div>
</div>

<div class="resultDetails">
  <div class="result_middle">
  <div class="resultItemLine1">
  {if $summScore}({$summScore}) {/if}
	<a href="{$url}/Record/{$summId|escape:"url"}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" class="title">{if !$summTitle|regex_replace:"/(\/|:)$/":""}{translate text='Title not available'}{else}{$summTitle|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}{/if}</a>
	{if $summTitleStatement}
    <div class="searchResultSectionInfo">
      {$summTitleStatement|regex_replace:"/(\/|:)$/":""|truncate:180:"..."|highlight:$lookfor}
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
  </div>
    {include file="/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl"}
  <div id = "holdingsSummary{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="holdingsSummary">
    <div class="statusSummary" id="statusSummary{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}">
      <span class="unknown" style="font-size: 8pt;">{translate text='Loading'}...</span>
    </div>
  </div>
  </div>
  <div id ="searchStars{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" class="resultActions">
    {if $IsCart}
	<div class="round-rectangle-button" id="request-now" onmousemove="mouseOver_normal(event)" onmousedown="mouseOut_normal(event)" onclick="sendMessage()">
	    <span class="resultAction_img_span"><img alt="request now" src="/interface/themes/einetwork/images/Art/ActionIcons/RequestNow.png" class="resultAction_img"></span>
	    <span class="resultAction_span" >request now</span>
	</div>
	
    {else}
	<div class="view_details" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
	    <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
	    <span class="resultAction_span"><a href="{$url}/Record/{$summId|escape:"url"}/Home?searchId={$searchId}&amp;recordIndex={$recordIndex}&amp;page={$page}" class="view_details_a">view details</a></span>
	</div>
	<div class="add_to_cart" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)" name="selected[{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}]" id="selected{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}" {if $enableBookCart}onclick="sentToBag('{$summId|escape}', '{$summTitle|regex_replace:"/(\/|:)$/":""|escape:"javascript"}', this);"{/if}>
	    <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
	    <span class="resultAction_span" >add to cart</span>
	</div>
	<div class="more_like_this" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
	    <span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="more_like_this" >more like this</span>
	</div>
	<div class="bad_result" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
	    <span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
	    <span class="resultAction_span" name="bad_reuslt_this" >bad result</span>
	</div>
    {/if}
    <script type="text/javascript">
        addRatingId('{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}');
        addIdToStatusList('{$summId|escape}');
        $(document).ready(function(){literal} { {/literal}
  	resultDescription('{if $summShortId}{$summShortId}{else}{$summId|escape}{/if}','{$summId}');
        {literal} }); {/literal}
    </script>
</div>
</div>
</div>