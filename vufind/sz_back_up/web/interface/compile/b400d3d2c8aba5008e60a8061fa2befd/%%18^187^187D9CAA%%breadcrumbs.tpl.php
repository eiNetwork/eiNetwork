<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:33
         compiled from MaterialsRequest/breadcrumbs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MaterialsRequest/breadcrumbs.tpl', 2, false),array('modifier', 'replace', 'MaterialsRequest/breadcrumbs.tpl', 7, false),array('modifier', 'capitalize', 'MaterialsRequest/breadcrumbs.tpl', 7, false),array('modifier', 'translate', 'MaterialsRequest/breadcrumbs.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['user']): ?>
<a href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/Home"><?php echo translate(array('text' => 'Your Account'), $this);?>
</a> <span>&gt;</span>
<?php endif; ?>
<?php if ($this->_tpl_vars['shortPageTitle']): ?>
<em><?php echo $this->_tpl_vars['shortPageTitle']; ?>
</em>
<?php else: ?>
<em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageTemplate'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.tpl', '') : smarty_modifier_replace($_tmp, '.tpl', '')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</em>
<?php endif; ?>
<span>&gt;</span>