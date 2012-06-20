<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:08
         compiled from Citation/apa.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Citation/apa.tpl', 1, false),)), $this); ?>
<?php if ($this->_tpl_vars['apaDetails']['authors']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['apaDetails']['authors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif; ?>
<?php if ($this->_tpl_vars['apaDetails']['year']): ?>(<?php echo ((is_array($_tmp=$this->_tpl_vars['apaDetails']['year'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
). <?php endif; ?>
<span style="font-style:italic;"><?php echo ((is_array($_tmp=$this->_tpl_vars['apaDetails']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span> 
<?php if ($this->_tpl_vars['apaDetails']['edition']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['apaDetails']['edition'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php endif; ?>
<?php if ($this->_tpl_vars['apaDetails']['publisher']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['apaDetails']['publisher'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.<?php endif; ?>