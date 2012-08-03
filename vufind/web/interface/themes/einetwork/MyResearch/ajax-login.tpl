<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="popupHeader">
	{translate text='Login to your account'}
	<span><img src="/interface/themes/einetwork/images/closeHUDButton.png" style="float:right" onclick="hideLightbox()"></span>
</div>
<div id="popupboxContent" class="popupContent" style="margin-top:10px">
	<div id='ajaxLoginForm'>
		<form method="post" action="{$path}/MyResearch/Home" id="loginForm">
			<table>
				<tbody>
					<tr class="popupLable">
						<td>
							{translate text='Username'}
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="username" id="username" value="{$username|escape}" size="15" class="text"/>
						</td>
					</tr>
					<tr class="popupLable">
						<td>
							{translate text='Password'}
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" id="password" size="15" class="text"/>
						</td>
					</tr>
					<tr style="margin-top:5px;">
						<td>
							<input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/><label for="showPwd">{translate text="Reveal Password"}</label>
						</td>
					</tr>
						{if !$inLibrary}
							<tr>
								<td>
									<input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe">{translate text="Remember Me"}</label>
								</td>
							</tr>
						{/if}
						<tr>
							<td>
								<input style="margin-left:250px;height:30px;background-color:rgb(244,213,56)"onclick="return processAjaxLogin()" id="loginButton" class="button" type="image" name="submit" value="Login" alt='{translate text="Login to your account"}' />
							</td>
						</tr>
		
							{if $comment}
								<tr>
									<td>
										<input type="hidden" name="comment" name="comment" value="{$comment|escape:"html"}"/>
									</td>
								</tr>
							{/if}
				</tbody>
			</table>			
		</form>
	</div>
	<script type="text/javascript">$('#username').focus();</script>
</div>