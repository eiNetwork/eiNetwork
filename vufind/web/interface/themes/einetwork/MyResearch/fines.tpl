{literal}
	<script>
		$(document).ready(function(){
   			$('tr').children().click(function(){
   				if($('input[type=checkbox]',this).size()==0){
   					$('td input[type=checkbox]', $(this).parent()).attr('checked', !$('td input[type=checkbox]', $(this).parent()).attr('checked'));
   				}
   			});
   			$('th input[type=checkbox]').click(function(){toggleAll(this)});
		});
		function toggleAll(x){
			$('td input[type=checkbox]').attr('checked', $(x).is(':checked'));
			$('th input[type=checkbox]').attr('checked', $(x).is(':checked'));
		}
	</script>
{/literal}
<div id="page-content" class="content">
	<div id="left-bar">

	</div>
	<div id="main-content">
		{if 1}
		<div>
			{if $edit}
				<h1>
					Select Fines to Pay
				</h1>
			{/if}
			<table class="datagrid" style="width:656px;">
				<tr>
					{if $edit}
					<th style="width:20px;"><input type = "checkbox" /></th>
					{/if}
					<th>Date Assessed</th>
					<th>Type of Charge</th>
					<th>Description</th>
					<th>Date Checked Out</th>
					<th>Date Due</th>
					<th>Charge</th>
				</tr>
				{assign var='sub' value='0'}
			{foreach from=$finesData item=foo}
				<tr class="{cycle values="evenrow,oddrow"}">
					{if $edit}
						<td style="padding-left: 15px;"><input type = "checkbox" value="{$foo->invoice}"/></td>
					{/if}
					<td>{$foo->dateAssessed|regex_replace:'/T.*/s':""|date_format:"%D"}</td>
					<td>{$foo->chargeType}</td>
					<td>{if $foo->itemTitle}{$foo->itemTitle}{else}{$foo->description}{/if}</td>
					<td>{$foo->itemCheckoutDate|regex_replace:'/T.*/s':""|date_format:"%D"}</td>
					<td>{$foo->itemDueDate|regex_replace:'/T.*/s':""|date_format:"%D"}</td>
					<td>${math equation="(x+y)/100" x=$foo->itemCharge y=$foo->processingFee format="%.2f"}</td>
				</tr>
				{assign var='sub' value=$sub+$foo->itemCharge+$foo->processingFee}
			{/foreach}
				<tr class="{cycle values="evenrow,oddrow"}">
					{if $edit}
					<td></td>
					{/if}
					<td>Total</td>
					<td colspan="4"></td>
					<td>${math equation="x/100" x=$sub format="%.2f"}</td>
				</tr>
			</table>
		</div>
		<div>
			{if $edit}
				Enter Billing Information
			{else}
				Pay these fines online
			{/if}
		</div>
		{else}
		{/if}
	</div>
	<div id="right-bar">
		{include file="MyResearch/menu.tpl"}
		{include file="Admin/menu.tpl"}
	</div>
</div>