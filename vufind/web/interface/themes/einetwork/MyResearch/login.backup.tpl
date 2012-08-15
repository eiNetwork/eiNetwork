{strip}
<div id="page-content" class="content">
	{if $message}<div class="error">{$message|translate}</div>{/if}
	<div class="resulthead">
		<h3>{translate text='Login to your account'}</h3>
	</div>
	<div id="loginFormWrapper">
		<form method="post" action="{$path}/MyResearch/Home" id="loginForm">
			<div id='loginFormFields'>
				<div id ='loginUsernameRow' class='loginFormRow'>
					<div class='loginLabel'>{translate text='Username'}: </div>
					<div class='loginField'><input type="text" name="username" id="username" value="{$username|escape}" size="28"/></div>
				</div>
				<div id ='loginPasswordRow' class='loginFormRow'>
					<div class='loginLabel'>{translate text='Enter pin #'}
					<a href="#" id="noPin" onclick="$('#loginPasswordConfirmRow').toggle();return false;">
						({translate text="I don't have a pin yet"})
					</a>
					</div>
					<div class='loginField'>
						<input type="password" name="password" id="password" size="28"/>
						
					</div>
				</div>
				<div id ='loginPasswordConfirmRow' class='loginFormRow' style="display:none">
					<div class='loginLabel'>{translate text='Confirm pin #'}: </div>
					<div class='loginField'>
						<input type="password" name="password2" id="password2" size="28"/>
					</div>
				</div>
				<div id ='loginPasswordRow2' class='loginFormRow'>
					<div class='loginLabel'>&nbsp;</div>
					<div class='loginField'>
						<input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/><label for="showPwd">{translate text="Reveal Password"}</label>
					</div>
				</div>
				{if !$inLibrary}
				<div id ='loginPasswordRow3' class='loginFormRow'>
					<div class='loginLabel'>&nbsp;</div>
					<div class='loginField'>
						<input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe">{translate text="Remember Me"}</label>
					</div>
				</div>
				{/if}
				<div id='loginSubmitButtonRow' class='loginFormRow'>
					<input type="submit" name="submit" value="Login" />
					{if $followup}<input type="hidden" name="followup" value="{$followup}"/>{/if}
					{if $followupModule}<input type="hidden" name="followupModule" value="{$followupModule}"/>{/if}
					{if $followupAction}<input type="hidden" name="followupAction" value="{$followupAction}"/>{/if}
					{if $recordId}<input type="hidden" name="recordId" value="{$recordId|escape:"html"}"/>{/if}
					{if $comment}<input type="hidden" name="comment" name="comment" value="{$comment|escape:"html"}"/>{/if}
					{if $returnUrl}<input type="hidden" name="returnUrl" value="{$returnUrl}"/>{/if}
	  
					{if $comment}
						<input type="hidden" name="comment" name="comment" value="{$comment|escape:"html"}"/>
					{/if}
				</div>
			</div>
		</form>
		<a href='{$path}/MyResearch/GetCard'>Register for a new Library Card</a>
	</div>
	
	<script type="text/javascript">$('#username').focus();</script>
	
</div>
{/strip}