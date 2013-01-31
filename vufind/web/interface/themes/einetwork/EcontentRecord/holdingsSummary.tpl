<div id = "holdingsSummary"
	{if $holdingsSummary.status == 'Available from OverDrive'}
		class="holdingsSummary overdriveAvailable"
	{elseif $holdingsSummary.status == 'Checked Out'}
		class="holdingsSummary overdriveCheckedOut"
	{/if}>
	
	<div class="availability">
		{if $holdingsSummary.status == 'Available from OverDrive'}
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png"/ alt="Available"></span>
			<a style="cursor:pointer" class="overdriveAvailable" onclick="ajaxLightbox('/EcontentRecord/{$holdingsSummary.recordId}/AJAX?method=GetHoldingsInfoPopup',false,false,'600px',false,'auto')">{$holdingsSummary.status}</a>
		{elseif $holdingsSummary.status == 'Checked Out'}
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png"/ alt="CheckedOut"></span>
			<a style="cursor:pointer" class="overdriveCheckedOut" onclick="ajaxLightbox('/EcontentRecord/{$holdingsSummary.recordId}/AJAX?method=GetHoldingsInfoPopup',false,false,'600px',false,'auto')">{$holdingsSummary.status}</a>
			
		{/if}
		
	</div>

	<div class="holdableCopiesSummary">
		{if $holdingsSummary.numHoldings == 0}
			No copies available yet.
			<br/>{$holdingsSummary.wishListSize} {if $holdingsSummary.wishListSize == 1}person has{else}people have{/if} added the record to their wish list.
		{else}
			{if strcasecmp($holdingsSummary.source, 'OverDrive') == 0}
				{*Available for use from OverDrive.*}
			{elseif $holdingsSummary.source == 'Freegal'}
			        {$holdingsSummary.status}
				Downloadable from Freegal.
			{elseif $holdingsSummary.accessType == 'free'}

				
				<a style="cursor:pointer" >{$holdingsSummary.status}</a><br/>
				Available for multiple simultaneous usage.
			
			{elseif $holdingsSummary.onHold}
				You are number {$holdingsSummary.holdPosition} on the wait list.
			{elseif $holdingsSummary.checkedOut}
				{* Don't need to view copy information for checked out items *}
			{else}
<!--				{$holdingsSummary.totalCopies} total {if $holdingsSummary.totalCopies == 1}copy{else}copies{/if}, 
				{$holdingsSummary.availableCopies} {if $holdingsSummary.availableCopies == 1}is{else}are{/if} available. 
				{if $holdingsSummary.onOrderCopies > 0}
					{$holdingsSummary.onOrderCopies} {if $holdingsSummary.onOrderCopies == 1}is{else}are{/if} on order. 
				{/if}
-->			{/if}

			<div class="holdableCopiesSummary">
			{if $holdingsSummary.holdQueueLength > 0}
				{$holdingsSummary.holdQueueLength} {if $holdingsSummary.holdQueueLength == 1}person {else}people {/if} on waitlist for
			{/if}
			{if $holdingsSummary.totalCopies != 999999}{$holdingsSummary.totalCopies} total {if $holdingsSummary.totalCopies == 1}copy{else}copies{/if}.{/if} 
	</div>

		{/if} 
		{if $showOtherEditionsPopup}
		<div class="otherEditions">
			<a href="#" onclick="loadOtherEditionSummaries('{$holdingsSummary.recordId}', true)">Other Formats and Languages</a>
		</div>
		{/if}
	</div>
 </div>