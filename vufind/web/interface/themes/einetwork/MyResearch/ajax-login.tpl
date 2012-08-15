<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
	{translate text='Login to your account'}
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
</div>
<div id="popupboxContent" class="popupContent" style="margin-top:10px">
	<div id='ajaxLoginForm'>
		<form method="post" action="{$path}/MyResearch/Home" id="loginForm">
			<table>
				<tr class="popupLable">
					<td>{translate text='Username'}</td>
				</tr>
				<tr>
					<td><input type="text" name="username" id="username" value="{$username|escape}" size="15" class="text"/></td>
				</tr>
				<tr class="popupLable">
					<td>{translate text='Password'}</td>
				</tr>
				<tr>
					<td><input type="password" name="password" id="password" size="15" class="text"/></td>
				</tr>
				{*<tr style="margin-top:5px;">
					<td><input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/><label for="showPwd">{translate text="Reveal Password"}</label></td>
				</tr>*}
				{if !$inLibrary}
					<tr>
						<td><input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe">{translate text="Remember Me"}</label></td>
					</tr>
				{/if}
				<tr>
					<td><input style="margin-left:320px;height:30px;width:40px;padding-top:0px;padding-bottom:0px;onclick="return processAjaxLogin()" id="loginButton" class="button yellow" name="submit" value="Login" /></td>
				</tr>

				{if $comment}
					<tr>
						<td><input type="hidden" name="comment" name="comment" value="{$comment|escape:"html"}"/></td>
					</tr>
				{/if}
		</table>			
		</form>
	</div>
	<script type="text/javascript">$('#username').focus();</script>
</div>