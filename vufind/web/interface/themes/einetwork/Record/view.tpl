{if !empty($addThis)}
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js?pub={$addThis|escape:"url"}"></script>
{/if}
<script type="text/javascript">
{literal}$(document).ready(function(){{/literal}
	GetHoldingsInfo('{$id|escape:"url"}');
	{if $isbn || $upc}
		GetEnrichmentInfo('{$id|escape:"url"}', '{$isbn10|escape:"url"}', '{$upc|escape:"url"}');
	{/if}
	{if $isbn}
		GetReviewInfo('{$id|escape:"url"}', '{$isbn|escape:"url"}');
	{/if}
	{if $enablePospectorIntegration == 1}
		GetProspectorInfo('{$id|escape:"url"}');
	{/if}
	{if $user}
		redrawSaveStatus();
	{/if}
	
	{if (isset($title)) }
		alert("{$title}");
	{/if}
{literal}});{/literal}

function redrawSaveStatus() {literal}{{/literal}
		getSaveStatus('{$id|escape:"javascript"}', 'saveLink');
{literal}}{/literal}
</script>

<div id="page-content" class="content">
	{if $error}<p class="error">{$error}</p>{/if} 
	{include file="ei_tpl/Record/left-bar-record.tpl"}
	<div id="main-content" class="full-result-content">
            <div id="inner-main-content">	
			<div id="record_record">
			<div id="record_record_up">
				<div class="recordcoverWrapper">
					<a href="{$bookCoverUrl}">							
						<img alt="{translate text='Book Cover'}" class="recordcover" src="{$bookCoverUrl}" />
					</a>
					<div id="goDeeperLink" class="godeeper" style="display:none">
						<a href="{$path}/Record/{$id|escape:"url"}/GoDeeper" onclick="ajaxLightbox('{$path}/Record/{$id|escape}/GoDeeper?lightbox', null,'5%', '90%', 50, '85%'); return false;">
						<img alt="{translate text='Go Deeper'}" src="{$path}/images/deeper.png" class="godeeper_img" /></a>
					</div>
				</div>
				<div id="record_record_up_middle">
						<div id='recordTitle'>{$recordTitleSubtitle|regex_replace:"/(\/|:)$/":""|escape}</div>
						{* Display more information about the title*}
						{if $mainAuthor}
							<div class="recordAuthor">
								<span class="resultLabel"></span>
								<span class="resultValue"><a href="{$path}/Author/Home?author={$mainAuthor|escape:"url"}">{$mainAuthor|escape}</a></span>
							</div>
						{/if}
							
						{if $corporateAuthor}
							<div class="recordAuthor">
								<span class="resultLabel">{translate text='Corporate Author'}:</span>
								<span class="resultValue"><a href="{$path}/Author/Home?author={$corporateAuthor|escape:"url"}">{$corporateAuthor|escape}</a></span>
							</div>
						{/if}
						{if $showOtherEditionsPopup}
						<div id="otherEditionCopies">
							<div style="font-weight:bold"><a href="#" onclick="loadOtherEditionSummaries('{$id}', false)">{translate text="Other Formats and Languages"}</a></div>
						</div>
						{/if}
				</div>
				<div id="record_action_button">
					<div class="round-rectangle-button" id="add-to-cart" {if $enableBookCart}onclick="sentToBag('{$id|escape}', '{$recordTitleSubtitle|regex_replace:"/(\/|:)$/":""|escape:"javascript"}', this);"{/if}>
						<span class="action-img-span"><img id="add-to-cart-img" alt="add to cart" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" /></span>
						<span class="action-lable-span">add to cart</span>
					</div>
					<div class="round-rectangle-button" id="request-now">
						<span class="action-img-span"><img id="request-now-img" alt="request now" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/RequestNow.png" /></span>
						<span class="action-lable-span">request now</span>
					</div>
					<div class="round-rectangle-button" id="add-to-wish-list" onclick="getSaveToListForm('{$id|escape}', 'VuFind'); return false;">
						<span class="action-img-span"><img id="add-to-wish-list-img" alt="add to wish list" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToWishList.png" /></span>
						<span class="action-lable-span">add to wish list</span>
					</div>
					<div class="round-rectangle-button" id="find-in-library">
						<span class="action-img-span"><img id="find-in-library-img" alt="find in library" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" /></span>
						<span class="action-lable-span">find in library</span>
					</div>
				</div>
			</div>	
			<div id="record_record_down">
				<div id="book_format_options_lable">
					<b>Book Format Options</b>
				</div>
				<div class="Format_type">
					{if is_array($recordFormat)}
					{foreach from=$recordFormat item=format}
					{if $format eq "Print Book"} 
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
					{elseif $format eq "DVD"}
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
					{elseif $format eq "Music CD"}
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
					{elseif $format eq "Blu-Ray"}
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
					{elseif $format eq "Video Download"}
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
					{elseif $format eq "CD-ROM"}
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="Video Download"></span>
					{/if}
					<span class="iconlabel" >{translate text=$format}</span>&nbsp;
					{/foreach}
					{else}
					<span class="iconlabel">{translate text=$summFormats}</span>
					{/if}
				</div>
				
			</div>
		</div>
		
		
		{*<div id="record-header">
			{if isset($previousId)}
				<div id="previousRecordLink"><a href="{$path}/{$previousType}/{$previousId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$previousIndex}&amp;page={if isset($previousPage)}{$previousPage}{else}{$page}{/if}" title="{if !$previousTitle}{translate text='Previous'}{else}{$previousTitle|truncate:180:"..."}{/if}"><img src="{$path}/interface/themes/default/images/prev.png" alt="Previous Record"/></a></div>
			{/if}
			<div id="recordTitleAuthorGroup">
				{* Display Title

			</div>
			{*this is for the next button in the original design.
			{*<div id ="recordTitleRight">
				{if isset($nextId)}
					<div id="nextRecordLink"><a href="{$path}/{$nextType}/{$nextId|escape:"url"}?searchId={$searchId}&amp;recordIndex={$nextIndex}&amp;page={if isset($nextPage)}{$nextPage}{else}{$page}{/if}" title="{if !$nextTitle}{translate text='Next'}{else}{$nextTitle|truncate:180:"..."}{/if}"><img src="{$path}/interface/themes/default/images/next.png" alt="Next Record"/></a></div>
				{/if}
				{if $lastsearch}
				<div id="returnToSearch">
					<a href="{$lastsearch|escape}#record{$id|escape:"url"}">{translate text="Return to Search Results"}</a>
				</div>
				{/if}
	 		</div
	 	</div>>*}
		{*
			<div id="image-column">
			{* Display Book Cover 
			{if $user->disableCoverArt != 1}		
			
			{/if}
			
			{* Place hold link 
		<div class='requestThisLink' id="placeHold{$id|escape:"url"}" style="display:none">
			<a href="{$path}/Record/{$id|escape:"url"}/Hold"><img src="{$path}/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
		</div>

		
			{if $goldRushLink}
			<div class ="titledetails">
				<a href='{$goldRushLink}' >Check for online articles</a>
			</div>
			{/if}
					
				
			<div id="myrating" class="stat">
			<div class="statVal">
			<div class="ui-rater">
				<span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:63px"></span></span>
				</div>
				</div>
				<script type="text/javascript">
				$(
				 function() {literal} { {/literal}
						 $('#myrating').rater({literal}{ {/literal} module:'Record', recordId: '{$shortId}', rating:'{$ratingData.average}', postHref: '{$path}/Record/{$id}/AJAX?method=RateTitle'{literal} } {/literal});
				 {literal} } {/literal}
			);
				</script>
			</div>
		</div> {* End image column 
		*}
		<div id="record-details-column">
			<div id="record-details-header">
				<div id="holdingsSummaryPlaceholder" class="holdingsSummaryRecord"></div>
				
			{*<div id="recordTools">
				<ul>
					
					{if !$tabbedDetails}
						<li><a href="{$path}/Record/{$id|escape:"url"}/Cite" class="cite" id="citeLink" onclick='ajaxLightbox("{$path}/Record/{$id|escape}/Cite?lightbox", "#citeLink"); return false;'>{translate text="Cite this"}</a></li>
					{/if}
					{if $showTextThis == 1}
						<li><a href="{$path}/Record/{$id|escape:"url"}/SMS" class="sms" id="smsLink" onclick='ajaxLightbox("{$path}/Record/{$id|escape}/SMS?lightbox", "#smsLink"); return false;'>{translate text="Text this"}</a></li>
					{/if}
					{if $showEmailThis == 1}
						<li><a href="{$path}/Record/{$id|escape:"url"}/Email" class="mail" id="mailLink" onclick='ajaxLightbox("{$path}/Record/{$id|escape}/Email?lightbox", "#mailLink"); return false;'>{translate text="Email this"}</a></li>
					{/if}
					{if is_array($exportFormats) && count($exportFormats) > 0}
						<li>
							<a href="{$path}/Record/{$id|escape:"url"}/Export?style={$exportFormats.0|escape:"url"}" class="export" onclick="toggleMenu('exportMenu'); return false;">{translate text="Export Record"}</a><br />
							<ul class="menu" id="exportMenu">
								{foreach from=$exportFormats item=exportFormat}
									<li><a {if $exportFormat=="RefWorks"} {/if}href="{$path}/Record/{$id|escape:"url"}/Export?style={$exportFormat|escape:"url"}">{translate text="Export to"} {$exportFormat|escape}</a></li>
								{/foreach}
							</ul>
						</li>
					{/if}
					{if $showFavorites == 1}
						<li id="saveLink"><a href="{$path}/Record/{$id|escape:"url"}/Save" class="fav" onclick="getSaveToListForm('{$id|escape}', 'VuFind'); return false;">{translate text="Add to favorites"}</a></li>
					{/if}
					{if !empty($addThis)}
						<li id="addThis"><a class="addThis addthis_button"" href="https://www.addthis.com/bookmark.php?v=250&amp;pub={$addThis|escape:"url"}">{translate text='Bookmark'}</a></li>
					{/if}
				</ul>
			</div>*}
			
					<div class="clearer">&nbsp;</div>
		</div>
			
			{if $summary}
			<div class="resultInformation">
				<div class="resultInformationLabel">{translate text='Summary'}</div>
				<div class="recordDescription">
					{if strlen($summary) > 300}
						<span id="shortSummary">
						{$summary|stripTags:'<b><p><i><em><strong><ul><li><ol>'|truncate:300}{*Leave unescaped because some syndetics reviews have html in them *}
						<a href='#' onclick='$("#shortSummary").slideUp();$("#fullSummary").slideDown()'>More</a>
						</span>
						<span id="fullSummary" style="display:none">
						{$summary|stripTags:'<b><p><i><em><strong><ul><li><ol>'}{*Leave unescaped because some syndetics reviews have html in them *}
						<a href='#' onclick='$("#shortSummary").slideDown();$("#fullSummary").slideUp()'>Less</a>
						</span>
					{else}
						{$summary|stripTags:'<b><p><i><em><strong><ul><li><ol>'}{*Leave unescaped because some syndetics reviews have html in them *}
					{/if}
				</div>
			</div>
			{/if}
			{*
			{if $subjects}
			<div class="resultInformation">
				<div class="resultInformationLabel">{translate text='Subjects'}</div>
				<div class="recordSubjects">
					{foreach from=$subjects item=subject name=loop}
						{foreach from=$subject item=subjectPart name=subloop}
							{if !$smarty.foreach.subloop.first} -- {/if}
							<a href="{$path}/Search/Results?lookfor=%22{$subjectPart.search|escape:"url"}%22&amp;basicType=Subject">{$subjectPart.title|escape}</a>
						{/foreach}
						<br />
					{/foreach}
				</div>
			</div>
			{/if}
			*}
			<div class="resultInformation">
				<div class="resultInformationLabel">{translate text='Publish Reviews'}</div>
				<div class="recordSubjects">
					{if $showAmazonReviews || $showStandardReviews}
						<div id='reviewPlaceholder'></div>
					{/if}
				</div>
			</div>
			<div class="resultInformation">
				<div class="resultInformationLabel">{translate text='Community Reviews'}</div>
				<div class="recordSubjects">
					<div id = "staffReviewtab" >
						{include file="$module/view-staff-reviews.tpl"}
					</div>
				</div>
			</div>
			<div class="resultInformation">
				<div class="resultInformationLabel">Details</div>
				<div class="recordSubjects">
					<table>
					{if $published}
					<tr>
						<td class="details_lable">Publish</td>
						<td>
							<table>
								{foreach from=$published item=publish name=loop}
									<tr><td>{$publish|escape}</td></tr>
								{/foreach}
							</table>
						</td>
					</tr>
					{/if}
					{if $edition}
					<tr>
						<td class="details_lable">Edition</td>
						<td>
							<table>
							{foreach from=$editionsThis item=edition name=loop}
								<tr><td>{$edition|escape}</td></tr>
							{/foreach}
							</table>
						</td>
					</tr>
					{/if}
					{if $lang}
						<tr>
							<td class="details_lable">{translate text='Language'}</td>
							<td>
								<table>
								{foreach from=$recordLanguage item=lang}
									<tr><td>{$lang|escape}</td></tr>
								{/foreach}
								</table>
							</td>
						</tr>
					{/if}
					{if $physicalDescription}
					<tr>
						<td class="details_lable">Description</td>
						<td>
							<table>
								{foreach from=$physicalDescriptions item=physicalDescription name=loop}
									<tr><td>{$physicalDescription|escape}</td></tr>
								{/foreach}
							</table>
						</td>
					</tr>
					{/if}
					{if $note}
					<tr>
					<td class="details_lable">Note</td>
					<td>
						<table>
							{foreach from=$notes item=note}
								<tr><td>{$note}</td></tr>
							{/foreach}
						</table>
					</td>
					</tr>
					{/if}
					{if $corporateAuthor}
					<tr>
					<td class="details_lable">Addit Author</td>
					<td>
						<table>
							<tr>
								<a href="{$path}/Author/Home?author={$corporateAuthor|trim|escape:"url"}">{$corporateAuthor|escape}</a>
							</tr>
						</table>
					</td>
					</tr>
					{/if}
					{if $contributors}
					<tr>
						<td>{translate text='Contributors'}</td>
						<td>
							<table>
							{foreach from=$contributors item=contributor name=loop}
							<tr><td><a href="{$path}/Author/Home?author={$contributor|trim|escape:"url"}">{$contributor|escape}</a></td></tr>
							{/foreach}
							</table>
						</td>
					</tr>
					{/if}
					{if $tmpIsbn}
					<tr>
						<td class="details_lable">ISBN</td>
						<td>
							<table>
							{foreach from=$isbns item=tmpIsbn name=loop}
								<tr><td>{$tmpIsbn|escape}</td></tr>
							{/foreach}
							</table>
						</td>
					</tr>
					{/if}
					{if $issn}
						<tr>
						<td class="details_lable">{translate text='ISSN'}</td>
						
						<td>{$issn}</td>
						</tr>
						{if $goldRushLink}
						<tr>
							<td></td>
							<td><a href='{$goldRushLink}' target='_blank'>Check for online articles</a></td>
						</tr>
						{/if}
					{/if}
					</table>
				</div>
			</div>
		</div>
	 
		{* tabs for series, similar titles, and people who viewed also viewed *}
		{if $showStrands}
			<div id="relatedTitleInfo" class="ui-tabs">
				<ul>
					<li><a href="#list-similar-titles">Similar Titles</a></li>
					<li><a href="#list-also-viewed">People who viewed this also viewed</a></li>
					<li><a id="list-series-tab" href="#list-series" style="display:none">Also in this series</a></li>
				</ul>
				
				{assign var="scrollerName" value="SimilarTitles"}
				{assign var="wrapperId" value="similar-titles"}
				{assign var="scrollerVariable" value="similarTitleScroller"}
				{include file=titleScroller.tpl}
				
				{assign var="scrollerName" value="AlsoViewed"}
				{assign var="wrapperId" value="also-viewed"}
				{assign var="scrollerVariable" value="alsoViewedScroller"}
				{include file=titleScroller.tpl}
				
			
				{assign var="scrollerName" value="Series"}
				{assign var="wrapperId" value="series"}
				{assign var="scrollerVariable" value="seriesScroller"}
				{assign var="fullListLink" value="$path/Record/$id/Series"}
				{include file=titleScroller.tpl}
				
			</div>
			{literal}
			<script type="text/javascript">
				var similarTitleScroller;
				var alsoViewedScroller;
				
				$(function() {
					$("#relatedTitleInfo").tabs();
					$("#moredetails-tabs").tabs();
					
					{/literal}
					{if $defaultDetailsTab}
						$("#moredetails-tabs").tabs('select', '{$defaultDetailsTab}');
					{/if}
					
					similarTitleScroller = new TitleScroller('titleScrollerSimilarTitles', 'SimilarTitles', 'similar-titles');
					similarTitleScroller.loadTitlesFrom('{$url}/Search/AJAX?method=GetListTitles&id=strands:PROD-2&recordId={$id}&scrollerName=SimilarTitles', false);
		
					{literal}
					$('#relatedTitleInfo').bind('tabsshow', function(event, ui) {
						if (ui.index == 0) {
							similarTitleScroller.activateCurrentTitle();
						}else if (ui.index == 1) { 
							if (alsoViewedScroller == null){
								{/literal}
								alsoViewedScroller = new TitleScroller('titleScrollerAlsoViewed', 'AlsoViewed', 'also-viewed');
								alsoViewedScroller.loadTitlesFrom('{$url}/Search/AJAX?method=GetListTitles&id=strands:PROD-1&recordId={$id}&scrollerName=AlsoViewed', false);
							{literal}
							}else{
								alsoViewedScroller.activateCurrentTitle();
							}
						}
					});
				});
			</script>
			{/literal}
		{elseif $showSimilarTitles}
			<div id="relatedTitleInfo" class="ui-tabs">
				<ul>
					<li><a href="#list-similar-titles">Similar Titles</a></li>
					<li><a id="list-series-tab" href="#list-series" style="display:none">Also in this series</a></li>
				</ul>
				
				{assign var="scrollerName" value="SimilarTitlesVuFind"}
				{assign var="wrapperId" value="similar-titles-vufind"}
				{assign var="scrollerVariable" value="similarTitleVuFindScroller"}
				{include file=titleScroller.tpl}

				{assign var="scrollerName" value="Series"}
				{assign var="wrapperId" value="series"}
				{assign var="scrollerVariable" value="seriesScroller"}
				{assign var="fullListLink" value="$path/Record/$id/Series"}
				{include file=titleScroller.tpl}
				
			</div>
			{literal}
			<script type="text/javascript">
				var similarTitleScroller;
				var alsoViewedScroller;
				
				$(function() {
					$("#relatedTitleInfo").tabs();
					$("#moredetails-tabs").tabs();
					
					{/literal}
					{if $defaultDetailsTab}
						$("#moredetails-tabs").tabs('select', '{$defaultDetailsTab}');
					{/if}
					
					similarTitleVuFindScroller = new TitleScroller('titleScrollerSimilarTitles', 'SimilarTitles', 'similar-titles');
					similarTitleVuFindScroller.loadTitlesFrom('{$url}/Search/AJAX?method=GetListTitles&id=similarTitles&recordId={$id}&scrollerName=SimilarTitles', false);
		
					{literal}
					$('#relatedTitleInfo').bind('tabsshow', function(event, ui) {
						if (ui.index == 0) {
							similarTitleVuFindScroller.activateCurrentTitle();
						}
					});
				});
			</script>
			{/literal}
		{else}
			<div id="relatedTitleInfo" style="display:none">
				
				{assign var="scrollerName" value="Series"}
				{assign var="wrapperId" value="series"}
				{assign var="scrollerVariable" value="seriesScroller"}
				{assign var="fullListLink" value="$path/Record/$id/Series"}
				{include file=titleScroller.tpl}
				
			</div>
			
		{/if}
		
		<div id="moredetails-tabs">
			{* Define tabs for the display *}
			<ul>
				<li><a href="#holdingstab">{translate text="Copies"}</a></li>
				{if $notes}
					<li><a href="#notestab">{translate text="Notes"}</a></li>
				{/if}
				{if $showAmazonReviews || $showStandardReviews}
					<li><a href="#reviewtab">{translate text="Reviews"}</a></li>
				{/if}
				<li><a href="#readertab">{translate text="Reader Comments"}</a></li>
				<li><a href="#citetab">{translate text="Citation"}</a></li>
				<li><a href="#stafftab">{translate text="Staff View"}</a></li>
			</ul>
			
			{* Display the content of individual tabs *}
			{if $notes}
				<div id ="notestab">
					<ul class='notesList'>
					{foreach from=$notes item=note}
						<li>{$note}</li>
					{/foreach}
					</ul>
				</div>
			{/if}
			
			
			<div id="reviewtab">
				<div id = "staffReviewtab" >
				{include file="$module/view-staff-reviews.tpl"}
				</div>
				 
				{if $showAmazonReviews || $showStandardReviews}
				<h4>Professional Reviews</h4>
				<div id='reviewPlaceholder'></div>
				{/if}
			</div>
			
			{if $showComments == 1}
				<div id = "readertab" >
					<div style ="font-size:12px;" class ="alignright" id="addReview"><span id="userreviewlink" class="add" onclick="$('#userreview{$shortId}').slideDown();">Add a Review</span></div>
					<div id="userreview{$shortId}" class="userreview">
						<span class ="alignright unavailable closeReview" onclick="$('#userreview{$shortId}').slideUp();" >Close</span>
						<div class='addReviewTitle'>Add your Review</div>
						{assign var=id value=$id}
						{include file="$module/submit-comments.tpl"}
					</div>
					{include file="$module/view-comments.tpl"}
				</div>
			{/if}
			
			<div id = "citetab" >
				{include file="$module/cite.tpl"}
			</div>
			
			<div id = "stafftab">
				{include file=$staffDetails}
			</div>
			
			<div id = "holdingstab">
		{if $internetLinks}
		<h3>{translate text="Internet"}</h3>
		{foreach from=$internetLinks item=internetLink}
		{if $proxy}
		<a href="{$proxy}/login?url={$internetLink.link|escape:"url"}">{$internetLink.linkText|escape}</a><br/>
		{else}
		<a href="{$internetLink.link|escape}">{$internetLink.linkText|escape}</a><br/>
		{/if}
		{/foreach}
		{/if}
				<div id="holdingsPlaceholder"></div>
				{if $enablePurchaseLinks == 1 && !$purchaseLinks}
					<div class='purchaseTitle'><a href="#" onclick="return showPurchaseOptions('{$id}');">{translate text='Buy a Copy'}</a></div>
				{/if}
				
			</div>
		</div> {* End of tabs*}
		
		{literal}
		<script type="text/javascript">
			$(function() {
				$("#moredetails-tabs").tabs();
			});
		</script>
		{/literal}
            </div>
	</div>
        <div id="right-bar">
            {include file="ei_tpl/right-bar.tpl"}
        </div>
	</div>	


{if $showStrands}
{* Strands Tracking *}{literal}
<!-- Event definition to be included in the body before the Strands js library -->
<script type="text/javascript">
if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}
StrandsTrack.push({
	 event:"visited",
	 item: "{/literal}{$id|escape}{literal}"
});
</script>
{/literal}
{/if}
