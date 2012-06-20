<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from Search/home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/home.tpl', 6, false),)), $this); ?>
<div data-role="page" id="Search-home">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div data-role="content">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Search/searchbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- <ul data-role="listview" data-inset="true" data-dividertheme="b">
      <li data-role="list-divider"><?php echo translate(array('text' => 'Find More'), $this);?>
</li>
      <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Reserves"><?php echo translate(array('text' => 'Course Reserves'), $this);?>
</a></li>
      <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/Search/NewItem"><?php echo translate(array('text' => 'New Items'), $this);?>
</a></li>   
    </ul>-->
    
     
  </div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>