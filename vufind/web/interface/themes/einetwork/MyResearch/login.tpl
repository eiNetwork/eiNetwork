{*strip}
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
					<div class='loginLabel'>{translate text='Enter pin #'} <a href="#" id="noPin" onclick="$('#loginPasswordConfirmRow').toggle();return false;">({translate text="I don't have a pin yet"})</a>: </div>
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
{/strip*}

{strip}
<div id="loginHome">
{literal}
<script type="text/javascript">
	$(document).ready(function() {
	    $('input[title]').each(function(i) {
		if (!$(this).val()) {
		    $(this).val($(this).attr('title'));
		}
		$(this).focus(function() {
		    if ($(this).val() == $(this).attr('title')) {
			$(this).val('');
		    }
		    if($(this).attr('id')=='pin'){
			$('#pin').get(0).type = 'password';
		    }
		
		});
		$(this).blur( function() {
		    if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
			$('#pin').get(0).type='text';
		    }
		});
	    });
	    
		$('#loginForm').submit(function(){
			var pin=$("#pin").val();
			var pinReg=/^[0-9]\d{3}$/;
			var card=$("#card").val();
			var cardReg=/^[1-9]\d{13}$/;
			var cardReg1=/^[1-9]\d{6}$/;
			if(card==""||!card||pin==""||!pin){
				$('#cardError').html('&nbsp;');
				return false;
				
			}else{
				if((cardReg.test(card)||cardReg1.test(card))&&pinReg.test(pin)){
					$('#cardError').html('&nbsp;');
					return true;
				}else{
					if(!(cardReg.test(card)||cardReg1.test(card))){
						$('#cardError').text('*please enter a valid 14 or 7 digit card number');
					}
					if(!pinReg.test(pin)){
						$('#pinError').text('*please enter a valid 4 digit PIN');
					}
					cardValid=false;
					return false;
				}
			}
		}); 
	    $('#card').focusout(function(){
		var card=$(this).val(),
		    cardReg=/^[1-9]\d{13}$/;
		cardReg1=/^[1-9]\d{6}$/;
		if(!card){
			$('#cardError').html('&nbsp;');
			return false;
			
		}else{
			if(cardReg.test(card)||cardReg1.test(card)){
				$('#cardError').html('&nbsp;');
				return true;
			}else{
				$('#cardError').text('*please enter a valid 14 or 7 digit card number');
				cardValid=false;
				return false;
			}
		}
	    });
	    
	    $('#pin').focusout(function(){
		var pin=$(this).val(),
		    pinReg=/^[0-9]\d{3}$/;
		if(!pin){
			$('#pinError').html('&nbsp;');
			return false;
			
		}else{
			if(!pinReg.test(pin)){
				$('#pinError').text('*please enter a valid 4 digit PIN');
				pinValid=false;
				return false;
			}else{
				$('#pinError').html('&nbsp;');
				return true;
			}
		}
		
	    });
		$('[placeholder]').parents('form').submit(function() {
 			$(this).find('[placeholder]').each(function() {
    		var input = $(this);
    		if (input.val() == input.attr('placeholder')) {
     			input.val('');
    		}
  			})
		});
	});
	
</script>
{/literal}
	<div class="loginHome-left"></div>
	<div class="loginHome-center">
		<div class="login">
			<form id="loginForm" action="{$path}/MyResearch/Home" method="post">
				<div><b>Log In to EINetwork</b></div>
				{if $message}
					{*<div class="error">{$message|translate}</div>*}
					<div class="error">Sorry, the account information you entered does not match our records. Please check and try again.</div>
				{/if}
				<div id="email">
					<input id="card" class="text" type="text" name="username" title="Library Card Number"  value="{$username|escape}" placeholder="Library Card Number"/>
					<div id="cardError">&nbsp;</div>
				</div>
				<div id="password">
					<input id="pin" class="text" type="text" name="password" title="4 digit PIN number" placeholder="4 digit PIN number" />
					<div id="pinError">&nbsp;</div>
					<div><a href="/MyResearch/PinReset">I forgot or don't have my pin</a></div>
				</div>
				<div>
					<input class="button" type="submit" name="submit" value="Login" alt='{translate text="Login"}' />
				</div>
			</form>
		</div>
			<div class="register">
			<div><b>Don't have an account?</b></div>
			<div id="description">
				With a free catalog account, you can request items directly from the catalog, view your past searches and get personalized recommendations for items you might like.
			</div>
			<div>
				<a href="{$path}/MyResearch/GetCard">
					<input class="button" type="submit" name="submit" value="Register"/>
				</a>
			</div>
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>

{/strip}