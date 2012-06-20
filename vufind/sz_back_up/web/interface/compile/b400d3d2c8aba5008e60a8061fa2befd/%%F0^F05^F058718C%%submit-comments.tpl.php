<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:08
         compiled from Record/submit-comments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/submit-comments.tpl', 3, false),array('function', 'translate', 'Record/submit-comments.tpl', 3, false),)), $this); ?>
<div id="commentForm<?php echo $this->_tpl_vars['shortId']; ?>
">
  <textarea name="comment" id="comment<?php echo $this->_tpl_vars['shortId']; ?>
" rows="4" cols="40"></textarea>
  <span class="tool button" onclick='SaveComment("<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
", "<?php echo $this->_tpl_vars['shortId']; ?>
", <?php echo '{'; ?>
save_error: "<?php echo translate(array('text' => 'comment_error_save'), $this);?>
", load_error: "<?php echo translate(array('text' => 'comment_error_load'), $this);?>
", save_title: "<?php echo translate(array('text' => 'Save Comment'), $this);?>
"<?php echo '}'; ?>
); return false;'><?php echo translate(array('text' => 'Add your comment'), $this);?>
</span>
</div>