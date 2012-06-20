<?php /* Smarty version 2.6.19, created on 2012-06-18 09:11:08
         compiled from top-menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'top-menu.tpl', 4, false),array('function', 'translate', 'top-menu.tpl', 5, false),)), $this); ?>
<div id="menu-header">
	<div id="menu-header-links">
		<div id="menu-account-links">
		<span id="myAccountNameLink" class="menu-account-link logoutOptions top-menu-item"<?php if (! $this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home"><?php if (strlen ( $this->_tpl_vars['user']->displayName ) > 0): ?><?php echo $this->_tpl_vars['user']->displayName; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->firstname)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['user']->lastname)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
<?php endif; ?></a></span>
		<span class="menu-account-link logoutOptions top-menu-item"<?php if (! $this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home"><?php echo translate(array('text' => 'My Account'), $this);?>
</a></span>
		<span class="menu-account-link logoutOptions top-menu-item"<?php if (! $this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Logout"><?php echo translate(array('text' => 'Log Out'), $this);?>
</a></span>
		<?php if ($this->_tpl_vars['showLoginButton'] == 1): ?>
		  <span class="menu-account-link loginOptions top-menu-item" <?php if ($this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" class='loginLink'><?php echo translate(array('text' => 'My Account'), $this);?>
</a></span>
		<?php endif; ?>
		</div>
	</div>
</div>