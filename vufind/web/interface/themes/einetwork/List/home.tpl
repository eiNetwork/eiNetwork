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
			//$(this).val('').removeClass('hint');
			$(this).val('');
		    }
		    if($(this).attr('id')=='pin'){
			$('#pin').get(0).type = 'password';
		    }
		
		});
		$(this).blur( function() {
		    if ($(this).val() == '') {
			//$(this).val($(this).attr('title')).addClass('hint');
			$(this).val($(this).attr('title'));
			$('#pin').get(0).type='text';
		    }
		    
		    
		});
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
				<div id="email">
					<input id="card" class="loginFormInput" type="text" title="Library Card Number" size="15" value="{$username|escape}" placeholder="Library Card Number"/>
				</div>
				<div id="password">
					<input id="pin" class="loginFormInput" type="text" title="4 digit PIN number" size="15" placeholder="4 digit PIN number"/>
				</div>
				<div id="loginButton" name="submit" onmouseover="mouseOver(event,'rgb(242,242,242)')" onmouseout="mouseOut(event,'rgb(255,255,255)')" onclick="document.forms['loginForm'].submit();">
					Login
				</div>
			</form>
		</div>
		<div class="register">
			<div><b>Don't have an account?</b></div>
			<div id="description">
				With a free catalog account, you can request items directly from the catalog, view your past searches and get personalized recommendations for items you might like.
			</div>
			<div id="registerButton"
			     onmouseover="mouseOver(event,'rgb(242,242,242)')"
			     onmouseout="mouseOut(event,'rgb(255,255,255)')"
			     onclick="location.href='{$path}/MyResearch/GetCard'; style='cursor: pointer;'">
				Register
			</div>
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>

