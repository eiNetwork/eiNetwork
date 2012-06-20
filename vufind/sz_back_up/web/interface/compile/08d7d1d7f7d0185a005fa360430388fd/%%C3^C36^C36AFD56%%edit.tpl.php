<?php /* Smarty version 2.6.19, created on 2012-06-19 15:51:48
         compiled from EditorialReview/edit.tpl */ ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/validate/jquery.validate.js" ></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
/ckeditor/ckeditor.js"></script>
<div id="page-content" class="content">
  <div id="sidebar">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "MyResearch/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Admin/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  
  <div id="main-content">
    <h1><?php if ($this->_tpl_vars['isNew']): ?>Add an Editorial Review<?php else: ?>Edit an Editorial Review<?php endif; ?></h1>
    <?php echo $this->_tpl_vars['editForm']; ?>

  </div>
</div>