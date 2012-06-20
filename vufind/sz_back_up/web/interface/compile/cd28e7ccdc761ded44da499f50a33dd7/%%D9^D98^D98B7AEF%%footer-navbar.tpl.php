<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:20
         compiled from /usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/MyResearch/footer-navbar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', '/usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/MyResearch/footer-navbar.tpl', 4, false),)), $this); ?>
<div data-role="navbar">
  <ul>        
    <?php if ($this->_tpl_vars['user']): ?>
      <li><a rel="external" <?php if ($this->_tpl_vars['pageTemplate'] == "favorites.tpl"): ?> class="ui-btn-active"<?php endif; ?> href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Favorites"><?php echo translate(array('text' => 'Favorites'), $this);?>
</a></li>
      <li><a rel="external" <?php if ($this->_tpl_vars['pageTemplate'] == "history.tpl"): ?> class="ui-btn-active"<?php endif; ?> href="<?php echo $this->_tpl_vars['path']; ?>
/Search/History?require_login"><?php echo translate(array('text' => 'History'), $this);?>
</a></li>    
      <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Logout"><?php echo translate(array('text' => 'Logout'), $this);?>
</a></li>
    <?php else: ?>
      <li><a data-rel="dialog" href="#Language-dialog" data-transition="pop"><?php echo translate(array('text' => 'Language'), $this);?>
</a></li>
      <li><a rel="external" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home"><?php echo translate(array('text' => 'Account'), $this);?>
</a></li>
    <?php endif; ?>
  </ul>
</div>