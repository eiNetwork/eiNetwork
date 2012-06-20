<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:08
         compiled from Record/breadcrumbs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/breadcrumbs.tpl', 2, false),array('modifier', 'truncate', 'Record/breadcrumbs.tpl', 5, false),array('modifier', 'replace', 'Record/breadcrumbs.tpl', 8, false),array('modifier', 'capitalize', 'Record/breadcrumbs.tpl', 8, false),array('modifier', 'translate', 'Record/breadcrumbs.tpl', 8, false),array('function', 'translate', 'Record/breadcrumbs.tpl', 2, false),)), $this); ?>
<?php if ($this->_tpl_vars['lastsearch']): ?>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastsearch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
#record<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo translate(array('text' => 'Return to Search Results'), $this);?>
</a> <span>&gt;</span>
<?php endif; ?>
<?php if ($this->_tpl_vars['breadcrumbText']): ?>
<em><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['breadcrumbText'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</em> <span>&gt;</span>
<?php endif; ?>
<?php if ($this->_tpl_vars['subTemplate'] != ""): ?>
<em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['subTemplate'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'view-', '') : smarty_modifier_replace($_tmp, 'view-', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '.tpl', '') : smarty_modifier_replace($_tmp, '.tpl', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '../MyResearch/', '') : smarty_modifier_replace($_tmp, '../MyResearch/', '')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</em> 
<?php endif; ?>