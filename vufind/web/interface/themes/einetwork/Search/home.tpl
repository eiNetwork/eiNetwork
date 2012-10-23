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
	    
	    
	    $('#card').focusout(function(){
		var card=$(this).val(),
		    cardReg=/^[1-9]\d{13}$/;
		if(!card){
			$('#cardError').html('&nbsp;');
			return false;
			
		}else{
			if(!cardReg.test(card)){
				$('#cardError').text('*please enter a valid 14 digits card number');
				cardValid=false;
				return false;
			}else{
				$('#cardError').html('&nbsp;');
				return true;
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
				$('#pinError').text('*please enter a valid 4 digits PIN');
				pinValid=false;
				return false;
			}else{
				$('#pinError').html('&nbsp;');
				return true;
			}
		}
		
	    });
	});
	
</script>
{/literal}
	<div class="loginHome-left"></div>
	<div class="loginHome-center">
		<div class="login">
			<form id="loginForm" action="{$path}/MyResearch/Home" method="post">
				<div><b>Log In to EINetwork</b></div>
				<div id="email">
					<input id="card" class="text" type="text" name="username" title="Library Card Number"  value="{$username|escape}"/>
					<div id="cardError">&nbsp;</div>
				</div>
				<div id="password">
					<input id="pin" class="text" type="text" name="password" title="4 digits PIN number" />
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
