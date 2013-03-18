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
	{if $wishLists|@count lt 1}
	<div class="subPageTitle" style="height:40px;">{translate text="You don't have any Classic Catalog wish lists."}</div>
	Search for items to add them to a new wish list.
	{else}
		<form method="post">
			<table class="datagrid" style="width:656px;">
					<tr>
						<th style="width:20px;"><input type = "checkbox" /></th>
						<th>Name</th>
						<th>Description</th>
						<th>Date Added</th>
					</tr>
					{*$wishLists|@print_r*}
			{foreach from=$wishLists item=list}
					<tr class="{cycle values="evenrow,oddrow"}">
						<td style="padding-left: 15px;"><input type = "checkbox" value="{$list.id}" name="wishlists[]"/></td>
						<td>{$list.title}</td>
						<td>{$list.description}</td>
						<td >{$list.date}</td>
					</tr>
			{/foreach}
			</table>
			<input type="submit" name="submit" value="Import" class="button yellow" /><input type='button' onclick="window.location.href='/List/Results'" value='Cancel' class="button"/>
		</form>
	{/if}
	</div>
	{*right-bar template*}
	{include file="ei_tpl/right-bar.tpl"}
</div>