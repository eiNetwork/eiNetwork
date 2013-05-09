	{if $listError}<p class="error">{$listError|translate}</p>{/if}
	<form method="post" action="{$url}/MyResearch/ListEdit" name="listForm" style="margin-top:10px"
	      onSubmit='editListName(this, &quot;{translate text='add_list_fail'}&quot;); return false;'>
		<table   style="margin-left:5px; margin-top:-20px;">
			<tbody>
				<tr style="height:25px;vertical-align:middle">
					<td >
						{translate text="Current Name"} : {$name}
					</td>
				</tr>
				<tr style="height:25px;vertical-align:middle">
					<td >
						<span >{translate text="New Name"}:</span>
					</td>
				</tr>
				<tr>
					<td >
						<input type="text" id="title" name="title" value="{$list->title|escape:"html"}" style="width:347px">
					</td>
				</tr>
				<tr style="height:25px;vertical-align:middle">
					<td >
						{*{translate text="Description"}:*}
					</td>
				</tr>
				<tr>
					<td>
						{*<textarea name="desc" id="listDesc" rows="3" style="width:333px"">{$list->desc|escape:"html"}</textarea>*}
					</td>
				</tr>
				<tr style="vertical-align:middle; text-align:center;">
					
					<td>
						<input type="submit" name="submit" class="button yellow" value="{translate text="Save"}" style="width:70px;">
						<button class = "button yellow" onclick="hideLightbox(); return false;">Cancel</button>
					</td>
				</tr>
			</tbody>
		</table>
	  <input type="hidden" name="recordId" value="{$recordId}">
	  <input type="hidden" name="followupId" value="wishTitle">
	  <input type="hidden" name="source" value="{$source}">
	</form>