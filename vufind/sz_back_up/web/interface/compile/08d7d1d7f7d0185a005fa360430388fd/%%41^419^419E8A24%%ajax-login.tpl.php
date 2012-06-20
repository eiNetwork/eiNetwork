<?php /* Smarty version 2.6.19, created on 2012-06-15 11:16:42
         compiled from MyResearch/ajax-login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/ajax-login.tpl', 3, false),array('modifier', 'escape', 'MyResearch/ajax-login.tpl', 11, false),)), $this); ?>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="header">
	<a onclick="hideLightbox(); return false;" href="">close</a>
	<?php echo translate(array('text' => 'Login to your account'), $this);?>

</div>
<div id="popupboxContent" class="content">
	<div id='ajaxLoginForm'>
		<form method="post" action="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" id="loginForm">
			<div id='loginFormFields'>
				<div id ='loginUsernameRow' class='loginFormRow'>
					<div class='loginLabel'><?php echo translate(array('text' => 'Username'), $this);?>
: </div>
					<div class='loginField'><input type="text" name="username" id="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="15"/></div>
				</div>
				<div id ='loginPasswordRow' class='loginFormRow'>
					<div class='loginLabel'><?php echo translate(array('text' => 'Password'), $this);?>
: </div>
					<div class='loginField'><input type="password" name="password" id="password" size="15"/></div>
				</div>
				<div id ='loginPasswordRow2' class='loginFormRow'>
					<div class='loginLabel'>&nbsp;</div>
					<div class='loginField'>
						<input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/><label for="showPwd"><?php echo translate(array('text' => 'Reveal Password'), $this);?>
</label>
					</div>
				</div>
				<?php if (! $this->_tpl_vars['inLibrary']): ?>
				<div id ='loginPasswordRow3' class='loginFormRow'>
					<div class='loginLabel'>&nbsp;</div>
					<div class='loginField'>
						<input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe"><?php echo translate(array('text' => 'Remember Me'), $this);?>
</label>
					</div>
				</div>
				<?php endif; ?>
				<div id='loginSubmitButtonRow' class='loginFormRow'>
					<input onclick="return processAjaxLogin()" id="loginButton" type="image" name="submit" value="Login" src='<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/login.png' alt='<?php echo translate(array('text' => 'Login to your account'), $this);?>
' />
					<?php if ($this->_tpl_vars['comment']): ?>
						<input type="hidden" name="comment" name="comment" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
					<?php endif; ?>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">$('#username').focus();</script>
</div>