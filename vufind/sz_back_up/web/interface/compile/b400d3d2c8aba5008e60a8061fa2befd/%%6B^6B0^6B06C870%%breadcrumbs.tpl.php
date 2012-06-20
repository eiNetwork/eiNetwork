<?php /* Smarty version 2.6.19, created on 2012-06-18 17:23:50
         compiled from Admin/breadcrumbs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Admin/breadcrumbs.tpl', 2, false),array('modifier', 'replace', 'Admin/breadcrumbs.tpl', 6, false),array('modifier', 'capitalize', 'Admin/breadcrumbs.tpl', 6, false),array('modifier', 'translate', 'Admin/breadcrumbs.tpl', 6, false),)), $this); ?>

<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home"><?php echo translate(array('text' => 'Your Account'), $this);?>
</a> <span>&gt;</span>
<?php if ($this->_tpl_vars['pageTemplate'] == 'view-alt.tpl'): ?>
<em><?php echo $this->_tpl_vars['pageTitle']; ?>
</em>
<?php else: ?>
<em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageTemplate'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.tpl', '') : smarty_modifier_replace($_tmp, '.tpl', '')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</em>
<?php endif; ?>
<span>&gt;</span>