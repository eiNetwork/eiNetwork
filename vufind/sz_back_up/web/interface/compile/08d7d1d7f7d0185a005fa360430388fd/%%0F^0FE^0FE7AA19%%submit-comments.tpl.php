<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:32
         compiled from EcontentRecord/submit-comments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'EcontentRecord/submit-comments.tpl', 3, false),array('function', 'translate', 'EcontentRecord/submit-comments.tpl', 3, false),)), $this); ?>
<div id="commentForm<?php echo $this->_tpl_vars['id']; ?>
">
  <textarea name="econtentcomment" id="econtentcomment<?php echo $this->_tpl_vars['id']; ?>
" rows="4" cols="40"></textarea>
  <span class="tool button" onclick='SaveEContentComment("<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
", <?php echo '{'; ?>
save_error: "<?php echo translate(array('text' => 'comment_error_save'), $this);?>
", load_error: "<?php echo translate(array('text' => 'comment_error_load'), $this);?>
", save_title: "<?php echo translate(array('text' => 'Save Comment'), $this);?>
"<?php echo '}'; ?>
); return false;'><?php echo translate(array('text' => 'Add your comment'), $this);?>
</span>
</div>