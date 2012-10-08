<div id="loginHome">
	<div class="loginHome-left"></div>
	<div class="loginHome-center" style="padding-top:70px;padding-left:20px;">
		<div><h3 style="margin-bottom:0px"><b>{translate text='Pin Reset Results'}</b></h3></div>
		{if $pinresetResult == true}
			<div>
				<p>Please check your email.   An email from helpdesk@einetwork.net will be sent to the email address in your patron record</p>
				<p>with a link to reset your password.</p> 
			</div>
		{else}
			<p>Sorry, we could not reset you PIN.  Please check the barcode you entered and try again.</p>
			<p>If you are still unable to reset you PIN, please contact your local library.</p> 
		{/if}
	</div>
	<div class="loginHome-right"></div>
</div>
