<div id="loginHome">
	<div class="loginHome-left">
		<div>Login in to your account</div>
		<div id="email">
			<input class="loginFormInput" type="text" name="username" value="{$username|escape}" size="15"/>
		</div>
		<div id="password">
			<input class="loginFormInput" type="password" name="password" size="15" id="password"/>
		</div>
		<div id="loginButton"></div>
	</div>
	<div class="loginHome-right">
		<div>Dont's have an account?</div>
		<div id="accountDescription"></div>
		<div id="createAccountButton"></div>
	</div>
</div>




<div id="catalogHome">
	
	{if $user}
		{include file="MyResearch/menu.tpl"}
	{else}
	<div id="homeLoginForm">
		<form id="loginForm" action="{$path}/MyResearch/Home" method="post">
			<div id="loginFormContents">
				<div class="loginLabelHome">{translate text='Username'}</div>
				<input class="loginFormInput" type="text" name="username" value="{$username|escape}" size="15"/>
				<div class="loginLabelHome">{translate text='Password}</div>
				<input class="loginFormInput" type="password" name="password" size="15" id="password"/>
				<div class="loginLabelHome">
				<input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/>
				<label for="showPwd">{translate text="Reveal Password"}</label>
				</div>
				{if !$inLibrary}
				<div class="loginLabelHome">
				<input type="checkbox" id="rememberMe" name="rememberMe"/>
				<label for="rememberMe">{translate text="Remember Me"}</label>
				</div>
				{/if}
				<input id="loginButtonHome" type="image" name="submit" value="Login" src='{$path}/interface/themes/default/images/login.png' alt='{translate text="Login"}' />
			</div>
		</form>
	</div>
	{/if}
</div>

