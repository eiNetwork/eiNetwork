<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:08
         compiled from Record/cite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Record/cite.tpl', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['lightbox']): ?>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="header">
  <a onclick="hideLightbox(); return false;" href="">close</a>
  <?php echo translate(array('text' => 'Title Citation'), $this);?>

</div>
<div id="popupboxContent" class="content">
<?php endif; ?>
<?php if ($this->_tpl_vars['citationCount'] < 1): ?>
  <?php echo translate(array('text' => 'No citations are available for this record'), $this);?>
.
<?php else: ?>
  <div style="text-align: left;">
    <?php if ($this->_tpl_vars['apa']): ?>
      <b><?php echo translate(array('text' => 'APA Citation'), $this);?>
</b>
      <p style="width: 95%; padding-left: 25px; text-indent: -25px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['apa'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </p>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['mla']): ?>
      <b><?php echo translate(array('text' => 'MLA Citation'), $this);?>
</b>
      <p style="width: 95%; padding-left: 25px; text-indent: -25px;">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['mla'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </p>
    <?php endif; ?>
  </div>
  <div class="note"><?php echo translate(array('text' => "Citation formats are based on standards as of July 2010."), $this);?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['lightbox']): ?>
</div>
<?php endif; ?>