<?php /* Smarty version 2.6.19, created on 2012-06-19 09:09:10
         compiled from popup-wrapper.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'popup-wrapper.tpl', 3, false),array('function', 'translate', 'popup-wrapper.tpl', 4, false),)), $this); ?>
<?php echo '<div id="popupboxHeader" class="header">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['popupTitle'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?><?php echo '<a href=\'#\' onclick=\'hideLightbox();return false;\' id=\'popup_close_link\'>'; ?><?php echo translate(array('text' => 'close'), $this);?><?php echo '</a></div><div id="popupboxContent" class="content"><div id=\'purchaseOptions\'>'; ?><?php if ($this->_tpl_vars['popupContent']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['popupContent']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['popupTemplate']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?>