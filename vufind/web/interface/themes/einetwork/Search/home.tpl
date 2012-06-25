<div id="loginHome">
{literal}
<script type="text/javascript">
	$(document).ready(function() {
	    $('input[title]').each(function(i) {
		if (!$(this).val()) {
		    $(this).val($(this).attr('title')).addClass('hint');
		}
		$(this).focus(function() {
		    if ($(this).val() == $(this).attr('title')) {
			$(this).val('').removeClass('hint');
		    }
		});
		$(this).blur( function() {
		    if ($(this).val() == '') {
			$(this).val($(this).attr('title')).addClass('hint');
		    }
		});
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
					<input class="loginFormInput" type="text" name="username" title="Username" size="15" value="{$username|escape}"/>
				</div>
				<div id="password">
					<input class="loginFormInput" type="text" title="Library Card Number" name="password" size="15" id="password" />
				</div>
				<div id="loginButton" name="submit" onmouseover="mouseOver(event,'rgb(242,242,242)')" onmouseout="mouseOut(event,'rgb(255,255,255)')" onclick="document.forms['loginForm'].submit();">
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
			<div id="registerButton" onmouseover="mouseOver(event,'rgb(242,242,242)')" onmouseout="mouseOut(event,'rgb(255,255,255)')">
				Register
			</div>
		</div>
	</div>
	<div class="loginHome-right"></div>
</div>

