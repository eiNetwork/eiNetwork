<?php /* Smarty version 2.6.19, created on 2012-06-15 09:30:44
         compiled from Search/breadcrumbs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/breadcrumbs.tpl', 2, false),array('modifier', 'capitalize', 'Search/breadcrumbs.tpl', 2, false),array('modifier', 'escape', 'Search/breadcrumbs.tpl', 2, false),array('modifier', 'replace', 'Search/breadcrumbs.tpl', 6, false),array('modifier', 'translate', 'Search/breadcrumbs.tpl', 6, false),)), $this); ?>
<?php if ($this->_tpl_vars['searchId']): ?>
<em><?php echo translate(array('text' => 'Search'), $this);?>
: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</em>
<?php elseif ($this->_tpl_vars['pageTemplate'] == "newitem.tpl" || $this->_tpl_vars['pageTemplate'] == "newitem-list.tpl"): ?>
<em><?php echo translate(array('text' => 'New Items'), $this);?>
</em>
<?php elseif ($this->_tpl_vars['pageTemplate'] == "view-alt.tpl"): ?>
<em><?php echo translate(array('text' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['subTemplate'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.tpl', '') : smarty_modifier_replace($_tmp, '.tpl', '')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp))), $this);?>
</em>
<?php elseif ($this->_tpl_vars['pageTemplate'] != ""): ?>
<em><?php echo translate(array('text' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageTemplate'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.tpl', '') : smarty_modifier_replace($_tmp, '.tpl', '')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp))), $this);?>
</em>
<?php endif; ?>