<div id="loginHome" style="height:500px">
	<div class="loginHome-left"></div>
	<div class="loginHome-center" style="padding-top:70px;padding-left:20px;">
		<div><h3 style="margin-bottom:0px"><b>{translate text='Registration Results'}</b></h3></div>
		<div class="page" style="padding-left:0px;">
		{if $registrationResult.success}
		<div style="padding-left:8px">
			<p>
			Here is your temporary barcode to use for future authentication:&nbsp;<b>{$registrationResult.barcode}</b>. 
			</p>
			<p>
			To receive your permanent card, you will need to bring a picture ID to the library. 
			</p>
		</div>
			<form method="post" action="{$url}/MyResearch/Home" id="loginForm">
				<div id='loginFormFields'>
					<div><h3 style="margin-bottom:0px"><b>{translate text='Login now'}</b></h3></div>
					<div style="padding-top:20px;padding-left:8px">
						<div id ='loginUsernameRow' class='loginFormRow'>
							<div class='loginLabel' style="padding-bottom:8px">{translate text='Username'}: </div>
							<div class='loginField'><input type="text" name="username" id="username" value="{$registrationResult.barcode|escape}" size="15" class="text"/></div>
						</div>
						<div id ='loginPasswordRow' class='loginFormRow' style="padding-top:8px">
							<div class='loginLabel' style="padding-bottom:8px">{translate text='Password'}: </div>
							<div class='loginField'><input type="password" name="password" size="15" class="text"/></div>
						</div>
						<div id='loginSubmitButtonRow' class='loginFormRow'>
							<input id="loginButton" type="submit" class="button" name="submit" value="Login" alt='{translate text="Login to your account"}' />
						</div>
					</div>
				</div>
			</form>
		{else}
			<p>Sorry, we could not process your registration.  Please visit our local library to register for a library card.</p> 
		{/if}
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>
