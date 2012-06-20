<?php /* Smarty version 2.6.19, created on 2012-06-14 15:38:51
         compiled from Citation/mla.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Citation/mla.tpl', 1, false),)), $this); ?>
<?php if ($this->_tpl_vars['mlaDetails']['authors']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mlaDetails']['authors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
. <?php endif; ?>
<span style="font-style: italic;"><?php echo ((is_array($_tmp=$this->_tpl_vars['mlaDetails']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span> 
<?php if ($this->_tpl_vars['mlaDetails']['edition']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mlaDetails']['edition'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif; ?>
<?php if ($this->_tpl_vars['mlaDetails']['publisher']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mlaDetails']['publisher'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
, <?php endif; ?>
<?php if ($this->_tpl_vars['mlaDetails']['year']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mlaDetails']['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.<?php endif; ?>