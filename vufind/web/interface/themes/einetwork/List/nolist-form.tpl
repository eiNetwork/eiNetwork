	<form method="post" action="{$url}/MyResearch/ListEdit" name="listForm" style="margin-top:10px"
	      onSubmit='newAddList(this, &quot;{translate text='add_list_fail'}&quot;); return false;'>
		<table   style="margin-left:5px; margin-top:-20px;">
			<tbody>
				<tr style="height:25px;vertical-align:middle">
					<td colspan="2">
						<span >{translate text="List Name"}:</span>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" id="listTitle" name="title" value="{$list->title|escape:"html"}" style="width:347px">
					</td>
				</tr>
				<tr style="height:25px;vertical-align:middle">
					<td colspan="2">
						{*{translate text="Description"}:*}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{*<textarea name="desc" id="listDesc" rows="3" style="width:333px"">{$list->desc|escape:"html"}</textarea>*}
					</td>
				</tr>
				<tr style="height:35px;vertical-align:middle">
					<td colspan="2">
						{*{translate text="Access"}:*}
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td style="width:270px">
						{*{translate text="Public"} <input type="radio" name="public" value="1">
						{translate text="Private"} <input type="radio" name="public" value="0" checked><br />*}
					</td>
					<td>
						<input type="submit" name="submit" class="button yellow" value="{translate text="Save"}" style="width:70px;">
					</td>
				</tr>
			</tbody>
		</table>
	  <input type="hidden" name="recordId" value="{$recordId}">
	  <input type="hidden" name="source" value="{$source}">
	  <input type="hidden" name="followupModule" value="{$followupModule}">
	  <input type="hidden" name="followupAction" value="{$followupAction}">
	  <input type="hidden" name="followupId" value="{$followupId}">
	  <input type="hidden" name="followupText" value="{translate text='Add to Favorites'}">
	</form>

