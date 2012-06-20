<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from /usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/Search/header-navbar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', '/usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/Search/header-navbar.tpl', 8, false),)), $this); ?>
<?php if ($this->_tpl_vars['pageTemplate'] == 'history.tpl' && $this->_tpl_vars['user']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'MyResearch/header-navbar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
  <?php if ($this->_tpl_vars['recordCount'] > 0 && ( $this->_tpl_vars['pageTemplate'] == 'list.tpl' || $this->_tpl_vars['pageTemplate'] == 'reserves-list.tpl' || $this->_tpl_vars['pageTemplate'] == 'newitem-list.tpl' )): ?> 
  <div data-role="navbar">
    <ul>
      <li><a href="#Search-narrow" data-rel="dialog" data-transition="flip"><?php echo translate(array('text' => 'Narrow Search'), $this);?>
</a></li>
      <li>
        <?php if ($this->_tpl_vars['savedSearch']): ?>
          <a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/SaveSearch?delete=<?php echo $this->_tpl_vars['searchId']; ?>
"><?php echo translate(array('text' => 'save_search_remove'), $this);?>
</a>
        <?php else: ?>
          <a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/SaveSearch?save=<?php echo $this->_tpl_vars['searchId']; ?>
"><?php echo translate(array('text' => 'save_search'), $this);?>
</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>