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
		<div style="padding-left:8px">
			<form id="pinresetform" class="getacard" method="POST" action="{$path}/MyResearch/PinReset">
				<div><p>An email from helpdesk@einetwork.net will be sent to the email address in your patron record with a link to set your pin after you click the button below.</p></div>
				<div>
					<input name="barcode" type="hidden" class="text" title="Barcode for PIN Reset" value="{$registrationResult.barcode}"/>
				</div>
				<input name="ispinset" type="hidden"/>
				<div> 
					<input class="button" type="submit" name="submit" value="Set Pin" alt='{translate text="Login"}' />
				</div>
			</form>
		</div>
		{else}
			<p>Sorry, we could not process your registration.  Please visit our local library to register for a library card.</p> 
		{/if}
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>
