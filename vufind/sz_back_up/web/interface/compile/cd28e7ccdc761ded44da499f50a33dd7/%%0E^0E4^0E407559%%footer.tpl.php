<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'footer.tpl', 2, false),array('modifier', 'template_full_path', 'footer.tpl', 9, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['boopsieLink'] )): ?>
  <span style="float:right;"><a href="<?php echo $this->_tpl_vars['boopsieLink']; ?>
" target="_blank"><?php echo translate(array('text' => 'Download our mobile App'), $this);?>
</a></span>
<?php endif; ?>

<div class="footer-text"><a href="#" class="standard-view" rel="external"><?php echo translate(array('text' => 'Go to Standard View'), $this);?>
</a></div>

<div data-role="footer" data-theme="b">
    <?php $this->assign('footer_navbar', ((is_array($_tmp=($this->_tpl_vars['module'])."/footer-navbar.tpl")) ? $this->_run_mod_handler('template_full_path', true, $_tmp) : smarty_modifier_template_full_path($_tmp))); ?>
  <?php if (! empty ( $this->_tpl_vars['footer_navbar'] )): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer_navbar'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php else: ?>
    <div data-role="navbar">
      <ul>
                <li><a data-rel="dialog" href="#Language-dialog" data-transition="pop"><?php echo translate(array('text' => 'Language'), $this);?>
</a></li>
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
</div>