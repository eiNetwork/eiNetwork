<div id="loginHome">
	<div class="loginHome-left"></div>
	<div class="loginHome-center" style="padding-top:70px;padding-left:20px;">
		<div><h3 style="margin-bottom:0px"><b>{translate text='Pin Set Results'}</b></h3></div>
		{if $pinresetResult == true}
			<div>
				<p>Please check your email.   An email from helpdesk@einetwork.net was sent to your email address with a link to set your pin.</p>
				<p></p> 
			</div>
		{else}
			<p>Sorry, we could not set you PIN.  Please check the barcode you entered and try again.</p>
			<p>If you are still unable to set you PIN, please contact your local library.</p> 
		{/if}
	</div>
	<div class="loginHome-right"></div>
</div>
