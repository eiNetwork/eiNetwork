<div id = "holdingsSummary" class="holdingsSummary">
  {if $holdingsSummary.callnumber}
    <div class='callNumber'>
      Shelved at <a href='{$path}/Record/{$holdingsSummary.recordId|escape:"url"}#holdings'>{$holdingsSummary.callnumber}</a>
    </div>
  {/if}
  {* Don't show status for non-drm EPUB files*} 
  {if $holdingsSummary.status == 'Available At'}
    <div class="availability">
      Now Available: <span class='availableAtList'>{$holdingsSummary.availableAt}</span> 
    </div>
      
  {elseif $holdingsSummary.status != 'Available online'}
    {*<div class="availability">
      <a href='{$path}/Record/{$holdingsSummary.recordId|escape:"url"}#holdings'>{translate text=$holdingsSummary.status}</a>
    </div>*}
      <div class="holdingsInformation">
	{if $holdingsSummary.status == "Available"}
	    <span><img alt="holdingstatus" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png" class="holdingsImage"></span>
	    <span  class="holdingsInformation_status">{$holdingsSummary.holdQueueLength} {if $holdingsSummary.holdQueueLength == 1}person is{else}people {/if} on waitlist for {$holdingsSummary.numCopies} total {if $holdingsSummary.numCopies == 1}copy{else}copies{/if}</span>
	{else}
	    <span><img alt="holdingstatus" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png"</span>
	    <span  class="holdingsInformation_status">{$holdingsSummary.holdQueueLength} {if $holdingsSummary.holdQueueLength == 1}person is{else}people {/if} on waitlist for {$holdingsSummary.numCopies} total {if $holdingsSummary.numCopies == 1}copy{else}copies{/if}</span>
	{/if}
      </div>
      {*}
  {if $holdingsSummary.isDownloadable}
    <div>Available Online from <a href='{$holdingsSummary.downloadLink}' {if !(isset($holdingsSummary.localDownload) || $holdingsSummary.localDownload == false )}target='_blank'{/if}>{$holdingsSummary.downloadText}</a></div>
  {else}
		<div class="holdableCopiesSummary">
		  {$holdingsSummary.numCopies} total {if $holdingsSummary.numCopies == 1}copy{else}copies{/if}, 
		  {$holdingsSummary.availableCopies} {if $holdingsSummary.availableCopies == 1}is{else}are{/if} on shelf.
		  {if $holdingsSummary.holdQueueLength >= 0}
		    <br/>{$holdingsSummary.holdQueueLength} {if $holdingsSummary.holdQueueLength == 1}person is{else}people are{/if} on the wait list.
		  {/if}
		  {if $holdingsSummary.numCopiesOnOrder > 0}
		    <br/>{$holdingsSummary.numCopiesOnOrder} copies are on order.
		  {/if}  
		</div>
  {/if}
  {if $showOtherEditionsPopup}
  <div class="otherEditions">
  	<a href="#" onclick="loadOtherEditionSummaries('{$holdingsSummary.recordId}', false)">Other Formats and Languages</a>
  </div>
  {/if}
  *}
  {/if}
</div>