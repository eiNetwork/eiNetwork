<?php /* Smarty version 2.6.19, created on 2012-06-18 09:51:51
         compiled from Search/home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/home.tpl', 13, false),array('modifier', 'escape', 'Search/home.tpl', 14, false),)), $this); ?>
<div id="catalogHome">
	<div id="homePageLists">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'API/listWidgetTabs.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>	
	
	<?php if ($this->_tpl_vars['user']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "MyResearch/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
	<div id="homeLoginForm">
		<form id="loginForm" action="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" method="post">
			<div id="loginFormContents">
				<div id="loginTitleHome">Login to view your account, renew books, and more.</div>
				<div class="loginLabelHome"><?php echo translate(array('text' => 'Username'), $this);?>
</div>
				<input class="loginFormInput" type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="15"/>
				<div class="loginLabelHome"><?php echo translate(array('text' => 'Password'), $this);?>
</div>
				<input class="loginFormInput" type="password" name="password" size="15" id="password"/>
				<div class="loginLabelHome"><input type="checkbox" id="showPwd" name="showPwd" onclick="return pwdToText('password')"/><label for="showPwd"><?php echo translate(array('text' => 'Reveal Password'), $this);?>
</label></div>
				<?php if (! $this->_tpl_vars['inLibrary']): ?>
				<div class="loginLabelHome"><input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe"><?php echo translate(array('text' => 'Remember Me'), $this);?>
</label></div>
				<?php endif; ?>
				<input id="loginButtonHome" type="image" name="submit" value="Login" src='<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/login.png' alt='<?php echo translate(array('text' => 'Login'), $this);?>
' />
			</div>
		</form>
	</div>
	<?php endif; ?>
</div>
