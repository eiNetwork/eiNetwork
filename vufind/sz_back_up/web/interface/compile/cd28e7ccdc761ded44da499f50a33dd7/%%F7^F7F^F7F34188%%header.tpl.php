<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'header.tpl', 2, false),array('modifier', 'escape', 'header.tpl', 2, false),array('modifier', 'template_full_path', 'header.tpl', 17, false),array('function', 'translate', 'header.tpl', 12, false),)), $this); ?>
<div data-role="header" data-theme="b">
  <h1><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pageTitle'])) ? $this->_run_mod_handler('trim', true, $_tmp, ':/') : trim($_tmp, ':/')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
  <?php if ($this->_tpl_vars['mainAuthor']): ?>
  <h2><?php echo $this->_tpl_vars['mainAuthor']; ?>
</h2>
  <?php else: ?>
  <h2><?php echo $this->_tpl_vars['corporateAuthor']; ?>
</h2>
  <?php endif; ?>
    
    <?php if (! ( $this->_tpl_vars['module'] == 'Search' && $this->_tpl_vars['pageTemplate'] == 'home.tpl' )): ?>
    <a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Home" data-icon="search"  class="ui-btn-right">
    <?php echo translate(array('text' => 'Search'), $this);?>

    </a>
  <?php endif; ?>
  
    <?php $this->assign('header_navbar', ((is_array($_tmp=($this->_tpl_vars['module'])."/header-navbar.tpl")) ? $this->_run_mod_handler('template_full_path', true, $_tmp) : smarty_modifier_template_full_path($_tmp))); ?>
  <?php if (! empty ( $this->_tpl_vars['header_navbar'] )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header_navbar'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
</div>