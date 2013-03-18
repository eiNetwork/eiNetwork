<div id="loginHome2">
{literal}
<script type="text/javascript">
	$(document).ready(function() {
		$('input[title]').each(function(i) {
			if ($(this).val() === "") {
			    $(this).val($(this).attr('title'));
			}
		});
		$('#loginForm').submit(function(){
			var pin=$("#pin").val();
			{/literal}{* var pinReg=/^[0-9]\d{3}$/; *}{literal}
			var pinReg = /^[0-9]{0,8}$/;
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
			if(card == ""){
				$(this).val($(this).attr('title'));
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
    	$('#card').focusin(function(){
    		if($(this).val() == $(this).attr('title')){
    			$(this).val("");
    		}
    	});
	    $('#pin').focusout(function(){
			var pin=$(this).val(),
				pinReg = /^[0-9]{0,8}$/;
			    {/literal}{*pinReg=/^[0-9]\d{3}$/;*}{literal}
			if(pin==""){
				$('#pinError').html('&nbsp;');
				$(this).val($(this).attr('title'));
				$(this).get(0).type = "text";
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
		$('#pin').focusin(function(){
			var pin=$(this).val();
			if(pin == $(this).attr('title')){
				$(this).val("");
				$(this).get(0).type = "password";
			}
		});
		$('[placeholder]').parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
		 			input.val('');
				}
			});
		});
	});
</script>
    <script type="text/javascript" src="js/ei_js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
{/literal}


	<div class="loginHome-left"></div>

	<div class="loginHome-center">
		<div class="loginMessage2">
			Welcome to the new and improved online catalog.
		</div>
		<div class="startMessage">
			Get started by entering your search above.
		</div>
		<div class="login-slider">
		<div id="wrapper">
			<div class="slider-wrapper theme-dark">
				<div id="slider" class="nivoSlider">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider1.jpg"  data-transition="slideInLeft">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider2.jpg"  data-transition="slideInLeft">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider3.jpg"  data-transition="slideInLeft">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider4.jpg"  data-transition="slideInLeft">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider5.jpg"  data-transition="slideInLeft">
				<img src="/interface/themes/einetwork/images/Art/Slider/slider6.jpg"  data-transition="slideInLeft">
			        <img src="/interface/themes/einetwork/images/Art/Slider/slider7.jpg"  data-transition="slideInLeft">		
				</div>
			</div>
		</div>
		</div>
		<div class="login2">
			<!--<form id="loginForm" action="{$path}/MyResearch/Home" method="post">-->

			<div class="librarycard">
				<b><a onclick='getAccountSetting()'>I have a Library Card</a></b>
			</div><!--<div id="email">
						<input id="card" class="text" type="text" name="username" title="Library Card Number"  value="{$username|escape}" placeholder="Library Card Number" maxlength="14"/>
						<div id="cardError">&nbsp;</div>
					</div>
					<div id="password">
						<input id="pin" class="text" type="text" name="password" title="4 digit PIN number" placeholder="4 digit PIN number" maxlength="8"/>
						<div id="pinError">&nbsp;</div>-->
			<!--<div><a href="/MyResearch/PinReset">I forgot or don't have my pin</a></div>-->
			<!--</div>
					<div>
						<input class="button" type="submit" name="submit" value="Login" alt='{translate text="Login"}' />
					</div>
				</form>-->
		</div>

		<div class="register2">
			<div>
				<a href="{$path}/MyResearch/GetCard"><b>I need a Library Card</b></a>
			</div><!--<div id="description">
					With a free catalog account, you can request items directly from the catalog, view your past searches and get personalized recommendations for items you might like.
				</div>
				<div>
					<a href="{$path}/MyResearch/GetCard">
						<input class="button" type="submit" name="submit" value="Register"/>
					</a>
				</div>
			</div>-->
		</div>

		<div class="loginHome-right"></div>
	</div>
</div>	
