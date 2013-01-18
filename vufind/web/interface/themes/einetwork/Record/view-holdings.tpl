{assign var=lastSection value=''}

{if isset($holdings) && count($holdings) > 0}
 <div id="holdingInfoPopup" style="height:auto;max-height:450px;width:auto;height:inherit;padding-left:12px;padding-right:12px">
  <div style="height:40px;padding-top:12px;border-bottom:1px solid rgb(238,238,238)" id="headhead">
    <span style="font-size:18px;">Item Call Numbers</span>
    {if !$allAvailableItem}<span onclick="seeUnavailable()"  style="cursor: pointer;margin-left:10px;color:#9999ff;text-decoration:underline;" id="showAndHideUnavailable">(show unavailable items)</span>{/if}
    <span onclick="hideLightbox()" style="float:right"><img class="close-button" src="/interface/themes/einetwork/images/closeHUDButton.png"></span>
  </div>
  <div style="overflow-y:auto;height:auto;max-height:400px;border-bottom:1px solid rgb(238,238,238);" id="callNumberBody">
  <div style="height:40px;font-size:15px;padding-top:12px;" id="itemTitle">{$BookTitle}</div>
 <table border="0" class="holdingsTable" style="width:510px;">
 <tbody>
 {foreach from=$holdings item=holding1}
 {foreach from=$holding1 item=holding}
  {if $lastSection != $holding.section}
    {assign var=lastSection value=$holding.section}
  {/if}
  <tr {if $holding.availability} class='itemAvailable' {else}class='itemUnavailable'{/if}>
  	{* Location *}
  	<td style = "padding-bottom:5px;padding-left:50px;width:250px;"><span><strong>
  	{$holding.location|escape}
  	</strong></span></td>
  	
  	{* Collection *}
  	<td style = "padding-bottom:5px;">{$holding.collection|escape}</td>
  	
  	{* Copy *}
  	<td style = "padding-bottom:5px;">{$holding.copy|escape}</td>
  	
  	{* Call# *}
  	<td style = "padding-bottom:5px;width:120px">
  	{$holding.callnumber|escape}
  	{if $holding.link}
  	  {foreach from=$holding.link item=link}
  	    <a href='{$link.link}' target='_blank'>{$link.linkText}</a><br />
  	  {/foreach}
  	{/if}
  	</td>
  	
  	{* Status *}
  	<td style = "padding-bottom:5px;">
  	  {if $holding.reserve == "Y"}
        {$holding.statusfull}
      {else}
        {if $holding.availability}
            <span class="available">{$holding.statusfull}{if $holding.holdable == 0 && $showHoldButton} <label class='notHoldable' title='{$holding.nonHoldableReason}'>(Not Holdable)</label>{/if}</span>
        {else}
            <span class="checkedout">{$holding.statusfull}{if $holding.holdable == 0 && $showHoldButton} <label class='notHoldable' title='{$holding.nonHoldableReason}'>(Not Holdable)</label>{/if}</span>
        {/if}
      {/if}
    </td>
    
    {* Due *}
    <td style = "padding-bottom:5px;">
  	  {if $holding.duedate}{$holding.duedate}{/if}
    </td>
    
  </tr>
  {/foreach}
  {/foreach}
 </tbody>
 </table>
  </div>
 </div>
  <div id="actionButton" style="height:60px;padding-top:10px;">
    <input type="button" class="button" id="emailButton" value="Email" style="margin-left:230px;width:80px"/>
    <input type="button" class="button" id="printButton" value="Print" style="width:80px" onclick="printFindLibrary()"/>
    <input type="button" class="button" id="doneButton"  style="background-color:rgb(244,213,56);width:80px" value="Done" onclick="hideLightbox()"/>
  </div>
 {elseif isset($issueSummaries) && count($issueSummaries) > 0}
   {* Display Issue Summaries *}
 <div id="holdingInfoPopup" style="height:auto;max-height:500px;width:auto;height:inherit;padding-left:12px;padding-right:12px;padding-bottom: 40px">
  <div style="height:40px;padding-top:12px;border-bottom:1px solid rgb(238,238,238)" id="headhead">
    <span style="font-size:18px;">Library Holdings</span>
    <span onclick="hideLightbox()" style="float:right"><img src="/interface/themes/einetwork/images/closeHUDButton.png"></span>
  </div>
  <div style="margin-top: 20px;overflow-y:auto;height:auto;max-height:400px;border-bottom:1px solid rgb(238,238,238);" id="callNumberBody">
    <table>
     <tbody>
    
   {foreach from=$issueSummaries item=issueSummary name=summaryLoop}
   <tr class='issue-summary'>
   <td colspan='3' class='issue-summary-row'>
   {if $issueSummary.location}
   <div class='issue-summary-location'>{$issueSummary.location}</div>
   {/if}
   <div class='issue-summary-details'>
   {if $issueSummary.identity}
   <div class='issue-summary-line'><strong>Identity:</strong> {$issueSummary.identity}</div>
   {/if}
   {if $issueSummary.callNumber}
   <div class='issue-summary-line'><strong>Call Number:</strong> {$issueSummary.callNumber}</div>
   {/if}
   {if $issueSummary.latestReceived}
   <div class='issue-summary-line'><strong>Latest Issue Received:</strong> {$issueSummary.latestReceived}</div>
   {/if}
   {if $issueSummary.libHas}
   <div class='issue-summary-line'><strong>Library Has:</strong> {$issueSummary.libHas}</div>
   {/if}
   

   {if count($issueSummary.holdings) > 0}
   <span id='showHoldings-{$smarty.foreach.summaryLoop.iteration}' class='showIssuesLink'>Show Issues</span>
   <script type="text/javascript">
     $('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').click(function(){literal} { {/literal}
       if (!$('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').hasClass('expanded')){literal} { {/literal}
			   $('#issue-summary-holdings-{$smarty.foreach.summaryLoop.iteration}').slideDown();
			   $('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').html('Hide Issues');
			   $('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').addClass('expanded');
			 {literal} }else{ {/literal}
		     $('#issue-summary-holdings-{$smarty.foreach.summaryLoop.iteration}').slideUp();
		     $('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').removeClass('expanded');
		     $('#showHoldings-{$smarty.foreach.summaryLoop.iteration}').html('Show Issues');
			 {literal} } {/literal}
		 {literal} }); {/literal}
   </script>
   {if $issueSummary.checkInGridId}
   {*}<span id='showCheckInGrid-{$smarty.foreach.summaryLoop.iteration}' class='showCheckinGrid'>Show Check-in Grid</span>{*}
   {/if}
   <script type="text/javascript">
     $('#showCheckInGrid-{$smarty.foreach.summaryLoop.iteration}').click(function(){literal} { {/literal}
    	 getLightbox('Record', 'CheckInGrid', '.b26935041', '{$issueSummary.checkInGridId}', 'Check-in Grid', undefined, undefined, undefined, '5%', '90%', 50, '85%');
     {literal} }); {/literal}
   </script>
   </div>
   
   <table id='issue-summary-holdings-{$smarty.foreach.summaryLoop.iteration}' class='issue-summary-holdings' style='display:none;'>
     {* Display all holdings within this summary. *}

     {foreach from=$issueSummary.holdings item=holding}
     <tr class='holdingsLine'>
      <td style = "padding-bottom:5px;"><span><strong>
	    {$holding.location|escape}
	    
	    </strong></span></td>
	    <td style = "padding-bottom:5px;">
	    {$holding.callnumber|escape}
	    {if $holding.link}
	      {foreach from=$holding.link item=link}
	        <a href='{$link.link}' target='_blank'>{$link.linkText}</a><br/>
	      {/foreach}
	    {/if}
	    </td>
	    
	    <td style = "padding-bottom:5px;">
	      {if $holding.reserve == "Y"}
	        {translate text="On Reserve - Ask at Circulation Desk"}
	      {else}
	        {if $holding.availability}
	            <span class="available">{$holding.statusfull}{if $holding.holdable == 0 && $showHoldButton} <label class='notHoldable' title='{$holding.nonHoldableReason}'>(Not Holdable)</label>{/if}</span>
	        {else}
	            <span class="checkedout">{$holding.statusfull}{if $holding.holdable == 0 && $showHoldButton} <label class='notHoldable' title='{$holding.nonHoldableReason}'>(Not Holdable)</label>{/if}</span>
	        {/if}
	      {/if}
	    </td>
	    </tr>
     {/foreach}
   </table>
   {/if}

   </td>
   </tr>
   {/foreach}

 </tbody>
 </table>
   </div>
 </div>

{else}
<div id="holdingInfoPopup" style="height:auto;max-height:450px;width:auto;height:inherit;padding-left:12px;padding-right:12px">
  <div style="height:125px;padding-top:12px;border-bottom:1px solid rgb(238,238,238)" id="headhead">
    <span style="font-size:18px;">No Copies Found</span> <span onclick="hideLightbox()" style="float:right"><img class="close-button" src="/interface/themes/einetwork/images/closeHUDButton.png"></span><br>
  	Our apologies, no copies of this title are available at this time.
  	  <div id="actionButton" style="height:60px;padding-top:10px;">

    	<input type="button" class="button" id="doneButton"  style="background-color:rgb(244,213,56);width:80px" value="OK" onclick="hideLightbox()"/>
  		</div>
  </div>
 </div>
{/if}

