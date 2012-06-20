<?php /* Smarty version 2.6.19, created on 2012-06-14 14:29:06
         compiled from ei_tpl/right-header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'ei_tpl/right-header.tpl', 7, false),array('function', 'translate', 'ei_tpl/right-header.tpl', 14, false),)), $this); ?>
<?php if ($this->_tpl_vars['user']): ?>
<div class="right-header-left">
    <div id="welcome-label">Welcome,</div>
    <div id="account-label" <?php if (! $this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>>
        <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home">
        <?php if (strlen ( $this->_tpl_vars['user']->displayName ) > 0): ?><?php echo $this->_tpl_vars['user']->displayName; ?>

        <?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->lastname)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->firstname)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

        <?php endif; ?>
        </a>
    </div>
</div>
<div class="right-header-right">
    <div id="sign-out-label"<?php if (! $this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>>
        <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Logout"><?php echo translate(array('text' => 'Sign Out'), $this);?>
</a>
    </div>    
</div>

<?php elseif ($this->_tpl_vars['showLoginButton'] == 1): ?>

<div class="right-header-left">
    <div id="account-label">
        <span <?php if ($this->_tpl_vars['user']): ?> style="display: none;"<?php endif; ?>>
            <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" class='loginLink'>
            <?php echo translate(array('text' => 'My Account'), $this);?>

            </a>
        </span>
    </div>
</div>

<?php endif; ?>


