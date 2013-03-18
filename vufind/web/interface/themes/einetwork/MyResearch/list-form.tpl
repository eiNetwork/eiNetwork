<div onmouseup="this.style.cursor='default';" class="popupHeader">
	<span class="popupHeader-title">{translate text='Create a new List'}</span>
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
</div>
<div id="popupboxContent" class="content">
	{if $listError}<p class="error">{$listError|translate}</p>{/if}
	<form method="post" action="{$url}/MyResearch/ListEdit" name="listForm"
	      onSubmit='addList(this, &quot;{translate text='add_list_fail'}&quot;); return false;'>
	  <table   style="margin-left:5px">
			<tbody>
				<tr style="height:25px;vertical-align:middle">
					<td>
						<span >{translate text="List"}:</span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" id="listTitle" name="title" value="{$list->title|escape:"html"}" size="50">
					</td>
				</tr>
				<tr style="height:20px;vertical-align:middle">
					<td>
					</td>
				</tr>
				<tr>
					<td>
	
					</td>
				</tr>
				<tr style="height:25px;vertical-align:middle">
					<td>
			
					</td>
				</tr>
				<tr style="vertical-align:middle">
					<td>

					</td>
				</tr>
				<tr style="height:25px;vertical-align:middle">
					<td>
						<input type="submit" name="submit" class="button" value="{translate text="Save"}" style="margin-left:320px;width:70px;background-color:rgb(244,213,56)">
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
</div>
