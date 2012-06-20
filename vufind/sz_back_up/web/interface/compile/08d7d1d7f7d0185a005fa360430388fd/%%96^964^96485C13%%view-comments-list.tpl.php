<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:46
         compiled from EcontentRecord/view-comments-list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'EcontentRecord/view-comments-list.tpl', 4, false),array('modifier', 'escape', 'EcontentRecord/view-comments-list.tpl', 6, false),array('function', 'translate', 'EcontentRecord/view-comments-list.tpl', 6, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['commentList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
  <div class='comment'>
  	<div class="commentHeader">
    <div class='commentDate'><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->created)) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>

	    <?php if ($this->_tpl_vars['comment']->user_id == $this->_tpl_vars['user']->id): ?>
	    <span onclick='deleteEContentComment(<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
, <?php echo $this->_tpl_vars['comment']->id; ?>
, <?php echo '{'; ?>
save_error: "<?php echo translate(array('text' => 'comment_error_save'), $this);?>
", load_error: "<?php echo translate(array('text' => 'comment_error_load'), $this);?>
", save_title: "<?php echo translate(array('text' => 'Save Comment'), $this);?>
"<?php echo '}'; ?>
);' class="delete tool deleteComment"><?php echo translate(array('text' => 'Delete'), $this);?>
</span>
	    <?php endif; ?>
    </div>
    <div class="posted"><strong><?php echo translate(array('text' => 'Posted by'), $this);?>
 <?php if (strlen ( $this->_tpl_vars['comment']->displayName ) > 0): ?><?php echo $this->_tpl_vars['comment']->displayName; ?>
<?php else: ?>Anonymous<?php endif; ?></strong></div>
    </div>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->comment)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

    
    
  </div>
<?php endforeach; else: ?>
  <div><?php echo translate(array('text' => 'Be the first to leave a comment'), $this);?>
!</div>
<?php endif; unset($_from); ?>