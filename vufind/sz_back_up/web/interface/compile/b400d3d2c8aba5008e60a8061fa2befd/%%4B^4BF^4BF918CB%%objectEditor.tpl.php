<?php /* Smarty version 2.6.19, created on 2012-06-20 09:55:02
         compiled from Admin/../Admin/objectEditor.tpl */ ?>
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
    <h1><?php echo $this->_tpl_vars['shortPageTitle']; ?>
 - <?php echo $this->_tpl_vars['objectName']; ?>
</h1>
    <?php if ($this->_tpl_vars['id'] > 0): ?><a class="button" href='<?php echo $this->_tpl_vars['url']; ?>
/<?php echo $this->_tpl_vars['module']; ?>
/<?php echo $this->_tpl_vars['toolName']; ?>
?id=<?php echo $this->_tpl_vars['id']; ?>
&amp;objectAction=delete' onclick='return confirm("Are you sure you want to delete this <?php echo $this->_tpl_vars['objectType']; ?>
?")'>Delete</a><?php endif; ?> <a class="button" href='<?php echo $this->_tpl_vars['url']; ?>
/<?php echo $this->_tpl_vars['module']; ?>
/<?php echo $this->_tpl_vars['toolName']; ?>
?objectAction=list'>Return to List</a>
    <br />
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "DataObjectUtil/objectEditForm.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
</div>