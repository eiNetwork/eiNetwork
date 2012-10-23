<form method="post" name="modifyPinNumber" action="{$path}/MyResearch/Profile">
	<table>
		<tbody>
			<tr>
				<td>
					<input type="hidden" class="text" name="updatePin" value="true"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="pin" class='loginLabel' style="width:135px">Enter your current PIN:</label>
					<input type="password" class="text" name="pin" id="pin" size="4" maxlength="4" style="padding-top:0px;padding-bottom:0px"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="pin1" class='loginLabel' style="width:135px">Enter your <strong>new</strong> PIN:&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="password" class="text" name="pin1" id="pin1" size="4" maxlength="4" style="padding-top:0px;padding-bottom:0px" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="pin2" class='loginLabel' style="width:135px">Confirm your <strong>new</strong> PIN:</label>
					<input type="password" class="text" name="pin2" id="pin2" size="4" maxlength="4" style="padding-top:0px;padding-bottom:0px" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="button" value="Set new PIN" style="margin-left:250px;background-color:rgb(244,213,56)"/>
				</td>
			</tr>
		</tbody>
	</table>
</form>