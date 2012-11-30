<div id = "holdingsSummary" class="holdingsSummary {$holdingsSummary.class}">

	{if $holdingsSummary.class == 'here'}
		{if $holdingsSummary.callnumber}
			<div class='callNumber'>
				<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png"/ alt="Available"></span>
				<a style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">It's here </a><a href='{$url}/Record/{$holdingsSummary.recordId|escape:"url"}#holdings'>{$holdingsSummary.callnumber}</a>
			</div>
		{elseif $holdingsSummary.isDownloadable}
			<div><span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png"/ alt="Available"></span>
			<a href='{$holdingsSummary.downloadLink}'	target='_blank' class="availableOnline">Available Online</a></div>
		{/if}
	{elseif $holdingsSummary.inLibraryUseOnly}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Noncirculating.png"/ alt="Noncirculating"></span>
			<span style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">Available for in library use only</span>
		</div>
		<script>
			var n = "{$holdingsSummary.recordId}".replace(/\./g, "");
		{literal}
			if(document.getElementById("request-now"+n)){
				var t = document.getElementById("request-now"+n);
				t.onclick = "";
				t.style.backgroundColor = "rgb(192,192,192)";
				t.style.color = "rgb(248,248,248)";
				t.style.cursor = "default";
				if($("#request-now"+n+" .resultAction_span")!=null)$("#request-now"+n+" .resultAction_span").text("In Library Only");
				if($("#request-now"+n+" .action-lable-span")!=null)$("#request-now"+n+" .action-lable-span").text("In Library Only");
				
			}
		{/literal}
		</script>

	{elseif $holdingsSummary.class == 'nearby'}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png"/ alt="Available"></span>
			<span style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">Available at your preferred libraries</span>
		</div>
	{elseif $holdingsSummary.class == 'available'}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png"/ alt="Available"></span>
			<span style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">Available at other libraries</span>
		</div>
	{elseif $holdingsSummary.class == 'unavailable'}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png"/ alt="CheckedOut"></span>
			No copies available
		</div>
	{elseif $holdingsSummary.class == 'reserve' or $holdingsSummary.numCopies == 0}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png"/ alt="CheckedOut"></span>
			<span style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">All copies checked out</span>
		</div>
	{else $holdingsSummary.class == 'checkedOut'}
		<div>
			<span><img class="format_img" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png"/ alt="CheckedOut"></span>
			<span style="cursor:pointer" onclick="findInLibrary('{$holdingsSummary.recordId|escape:"url"}',false,'150px','570px','auto')">All copies checked out</span>
		</div>
	{/if}
	<div class="holdableCopiesSummary">
		{if $holdingsSummary.holdQueueLength > 0}
			{$holdingsSummary.holdQueueLength} {if $holdingsSummary.holdQueueLength == 1}person {else}people {/if} on waitlist for 
		{/if}
		{$holdingsSummary.numCopies} total {if $holdingsSummary.numCopies == 1}copy{else}copies{/if}.
	</div>
			
	{if $showOtherEditionsPopup}
		<div class="otherEditions">
			<a href="#" onclick="loadOtherEditionSummaries('{$holdingsSummary.recordId}', false)">Other Formats and Languages</a>
		</div>
	{/if}
 </div>