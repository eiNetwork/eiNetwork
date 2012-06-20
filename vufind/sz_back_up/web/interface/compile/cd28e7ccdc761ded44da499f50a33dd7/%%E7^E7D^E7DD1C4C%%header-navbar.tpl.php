<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:20
         compiled from /usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/MyResearch/header-navbar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', '/usr/local/VuFind-Plus/vufind/web/interface/themes/jquerymobile/MyResearch/header-navbar.tpl', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['user']): ?>
  <div data-role="navbar">
    <ul>
      <li><a rel="external" <?php if ($this->_tpl_vars['pageTemplate'] == "checkedout.tpl"): ?> class="ui-btn-active"<?php endif; ?> href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/CheckedOut"><?php echo translate(array('text' => 'Checked Out'), $this);?>
</a></li>
      <li><a rel="external" <?php if ($this->_tpl_vars['pageTemplate'] == "holds.tpl"): ?> class="ui-btn-active"<?php endif; ?> href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Holds"><?php echo translate(array('text' => 'Holds'), $this);?>
</a></li>
      <li><a rel="external" <?php if ($this->_tpl_vars['pageTemplate'] == "fines.tpl"): ?> class="ui-btn-active"<?php endif; ?> href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Fines"><?php echo translate(array('text' => 'Fines'), $this);?>
</a></li>
    </ul>
  </div> 
<?php endif; ?>