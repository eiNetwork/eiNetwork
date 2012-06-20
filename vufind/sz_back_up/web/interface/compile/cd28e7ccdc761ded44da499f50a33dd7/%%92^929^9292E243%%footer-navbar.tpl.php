<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from /usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/Search/footer-navbar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', '/usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/Search/footer-navbar.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['pageTemplate'] == 'history.tpl' && $this->_tpl_vars['user']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'MyResearch/footer-navbar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<div data-role="navbar">
  <ul>
    <?php if ($this->_tpl_vars['recordCount'] > 0 && ( $this->_tpl_vars['pageTemplate'] == 'list.tpl' || $this->_tpl_vars['pageTemplate'] == 'reserves-list.tpl' || $this->_tpl_vars['pageTemplate'] == 'newitem-list.tpl' )): ?>
            <li><a href="<?php echo $this->_tpl_vars['path']; ?>
/Cart/Home" class="book_bag_btn" data-rel="dialog" data-transition="flip"><?php echo translate(array('text' => 'Book Cart'), $this);?>
 (<span class="cart_size">0</span>)</a></li> 
    <?php else: ?>
            <li><a data-rel="dialog" href="#Language-dialog" data-transition="pop"><?php echo translate(array('text' => 'Language'), $this);?>
</a></li>      
    <?php endif; ?>
    
        <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home"><?php echo translate(array('text' => 'Account'), $this);?>
</a></li>
    
        <?php if ($this->_tpl_vars['user']): ?>
      <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Logout"><?php echo translate(array('text' => 'Logout'), $this);?>
</a></li>
    <?php endif; ?>
  </ul>
</div>
<?php endif; ?>