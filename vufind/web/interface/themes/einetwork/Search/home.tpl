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
		    if($(this).attr('id')=='password'){
			$('#password').get(0).type = 'password';
		    }
		});
		$(this).blur( function() {
		    if ($(this).val() == '') {
			$(this).val($(this).attr('title'));
			$('#password').get(0).type='text';
			//validate the card number
			if($(this).attr('id')=='username'){
				var cardNumber=$(this).val().trim();
				if(cardNumber.length!=14){
					$('cardNumberMessage').style.visibility='visible';
				}
				
			}
			//validate the PIN
			if($(this).attr('id')=='password'){
				var pin=$(this).val().trim();
				if(pin.lenght!=4){
					$('pinMessage').style.visibility='visible';
				}
				
			}
		    }
		});
	    });
	  
	});
	
	function isCardNumberValid(cardNumber){
		if(cardNumber.trim().length!=14){
			return false;
		}else{
			var filter=/^[1-9]{14}$/;
			if(!filter.test(cardNumber)){
				return false;
			}else{
				return true;
			}
		}
	}
	function isPINValid(pin){
		if(pin.trim().length!=4)
		return false;
	}
</script>
{/literal}
	<div class="loginHome-left"></div>
	<div class="loginHome-center">
		<div class="login">
			<form id="loginForm" action="{$path}/MyResearch/Home" method="post">
				<div><b>Log In to EINetwork</b></div>
				<div id="email">
					<input id="username" class="loginFormInput" type="text" name="username" title="Libray Card Number" size="15" value="{$username|escape}"/>
					<br/><span id="cardNumberMessage" class="message">*please enter correct number</span>
				</div>
				<div id="pin">
					<input id="password" class="loginFormInput" type="text" name="password" title="4 digits PIN number" size="15"/>
					<br/><span id="pinMessage" class="message">*please enter correct PIN number</span>
				</div>
				<div id="loginButton" name="submit"
				     onmouseover="mouseOver(event,'rgb(242,242,242)')"
				     onmouseout="mouseOut(event,'rgb(255,255,255)')"
				     onclick="document.forms['loginForm'].submit();">
					Login
				</div>
			</form>
		</div>
		<div class="register">
			<div><b>Don't have an account?</b></div>
			<div id="description">
				With a free catalog acount, you can request items directly from the catalog,
				view your past searches and get personalized recommendations for items you might like.
				
			</div>
			<div id="registerButton"
			     onmouseover="mouseOver(event,'rgb(242,242,242)')"
			     onmouseout="mouseOut(event,'rgb(255,255,255)')"
			     onclick="location.href='http://vufindplus1.einetwork.net/MyResearch/GetCard'; style='cursor: pointer;'">
				Register
			</div>
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>

