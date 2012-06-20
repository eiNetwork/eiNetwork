<?php /* Smarty version 2.6.19, created on 2012-06-18 14:21:13
         compiled from Resource/save.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Resource/save.tpl', 3, false),array('modifier', 'escape', 'Resource/save.tpl', 3, false),)), $this); ?>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="header">
	<a onclick="hideLightbox(); return false;" href="">close</a>
	<?php echo translate(array('text' => 'add_favorite_prefix'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['record']->title)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
 <?php echo translate(array('text' => 'add_favorite_suffix'), $this);?>

</div>
<div id="popupboxContent" class="content">
<form onSubmit="saveRecord('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['source'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', this, <?php echo '{'; ?>
add: '<?php echo translate(array('text' => 'Add to favorites'), $this);?>
', error: '<?php echo translate(array('text' => 'add_favorite_fail'), $this);?>
'<?php echo '}'; ?>
); return false;">
<input type="hidden" name="submit" value="1" />
<input type="hidden" name="record_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="source" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['source'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php if (! empty ( $this->_tpl_vars['containingLists'] )): ?>
  <p>
  <?php echo translate(array('text' => 'This item is already part of the following list/lists'), $this);?>
:<br />
  <?php $_from = $this->_tpl_vars['containingLists']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
    <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/MyList/<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a><br />
  <?php endforeach; endif; unset($_from); ?>
  </p>
<?php endif; ?>

<?php if (( ! empty ( $this->_tpl_vars['nonContainingLists'] ) || ( empty ( $this->_tpl_vars['containingLists'] ) && empty ( $this->_tpl_vars['nonContainingLists'] ) ) )): ?>
  <?php $this->assign('showLists', 'true'); ?>
<?php endif; ?>

<table>
  <?php if ($this->_tpl_vars['showLists']): ?>
  <tr>
    <td>
      <?php echo translate(array('text' => 'Choose a List'), $this);?>

    </td>
  </tr>
  <?php endif; ?>
  <tr>
    <td>
      <?php if ($this->_tpl_vars['showLists']): ?>
      <select name="list">
        <?php $_from = $this->_tpl_vars['nonContainingLists']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
        <option value="<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
        <?php endforeach; else: ?>
        <option value=""><?php echo translate(array('text' => 'My Favorites'), $this);?>
</option>
        <?php endif; unset($_from); ?>
      </select>
      <?php endif; ?>
      <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/ListEdit?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=<?php echo ((is_array($_tmp=$this->_tpl_vars['source'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
         onclick="ajaxLightbox('<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/ListEdit?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&source=<?php echo ((is_array($_tmp=$this->_tpl_vars['source'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&lightbox'); return false;"><?php echo translate(array('text' => 'or create a new list'), $this);?>
</a>
    </td>
  </tr>
  <?php if ($this->_tpl_vars['showLists']): ?>
  <tr><td><?php echo translate(array('text' => 'Add Tags'), $this);?>
</td></tr>
  <tr><td><input type="text" name="mytags" value="" size="50" maxlength="255"></td></tr>
  <tr><td colspan="2"><?php echo translate(array('text' => 'add_tag_note'), $this);?>
</td></tr>
  <tr><td><?php echo translate(array('text' => 'Add a Note'), $this);?>
</td></tr>
  <tr><td><textarea name="notes" rows="3" cols="50"></textarea></td></tr>
  <tr><td><input type="submit" value="<?php echo translate(array('text' => 'Save'), $this);?>
"></td></tr>
  <?php endif; ?>
</table>
</form>
</div>