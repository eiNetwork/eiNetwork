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
				<div><b>Log In to the Catalog</b></div>
				<div id="email">
					<input id="card" class="text" type="text" name="username" title="Library Card Number"  value="{$username|escape}" placeholder="Library Card Number"/>
					<div id="cardError">&nbsp;</div>
				</div>
				<div id="password">
					<input id="pin" class="text" type="password" name="password" title="4 digit PIN number" placeholder="4 digit PIN number"/>
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
