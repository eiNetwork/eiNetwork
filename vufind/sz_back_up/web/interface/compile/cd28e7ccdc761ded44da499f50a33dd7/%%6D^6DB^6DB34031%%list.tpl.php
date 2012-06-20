<?php /* Smarty version 2.6.19, created on 2012-06-18 13:12:28
         compiled from Search/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/list.tpl', 7, false),array('modifier', 'escape', 'Search/list.tpl', 8, false),)), $this); ?>
<div data-role="page" id="Search-list" class="results-page">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div data-role="content">
    <?php if ($this->_tpl_vars['recordCount']): ?>
    <p>
      <strong><?php echo $this->_tpl_vars['recordStart']; ?>
</strong> - <strong><?php echo $this->_tpl_vars['recordEnd']; ?>
</strong>
      <?php echo translate(array('text' => 'of'), $this);?>
 <strong><?php echo $this->_tpl_vars['recordCount']; ?>
</strong>
      <?php if ($this->_tpl_vars['searchType'] == 'basic'): ?><?php echo translate(array('text' => 'for'), $this);?>
: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</strong><?php endif; ?>
    </p>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['subpage']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['subpage'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
      <?php echo $this->_tpl_vars['pageContent']; ?>

    <?php endif; ?>
  </div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Search/Recommend/SideFacets.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>