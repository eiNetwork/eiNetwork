<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:47
         compiled from EcontentRecord/view-holdings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'EcontentRecord/view-holdings.tpl', 10, false),array('modifier', 'file_size', 'EcontentRecord/view-holdings.tpl', 27, false),)), $this); ?>
<?php if (count ( $this->_tpl_vars['holdings'] ) > 0): ?>
	<table>
	<thead>
		<tr><th>Type</th><th>Source</th><th>Usage</th><?php if ($this->_tpl_vars['showEContentNotes']): ?><th>Notes</th><?php endif; ?><th>Size</th><th>&nbsp;</th>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['holdings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['eContentItem']):
?>
		<?php if (get_class ( $this->_tpl_vars['eContentItem'] ) == 'OverdriveItem'): ?>
			<tr id="itemRow<?php echo $this->_tpl_vars['index']; ?>
">
				<td><?php echo translate(array('text' => $this->_tpl_vars['eContentItem']->format), $this);?>
</td>
				<td>OverDrive</td>
				<td>Must be checked out to read</td>
				<td><?php echo $this->_tpl_vars['eContentItem']->size; ?>
</td>
				<td>
										<?php $_from = $this->_tpl_vars['eContentItem']->links; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
						<a href="<?php if ($this->_tpl_vars['link']['url']): ?><?php echo $this->_tpl_vars['link']['url']; ?>
<?php else: ?>#<?php endif; ?>" <?php if ($this->_tpl_vars['link']['onclick']): ?>onclick="<?php echo $this->_tpl_vars['link']['onclick']; ?>
"<?php endif; ?> class="button"><?php echo $this->_tpl_vars['link']['text']; ?>
</a>
					<?php endforeach; endif; unset($_from); ?>
				</td>
			</tr>
		<?php else: ?>
			<tr id="itemRow<?php echo $this->_tpl_vars['eContentItem']->id; ?>
">
				<td><?php echo translate(array('text' => $this->_tpl_vars['eContentItem']->item_type), $this);?>
</td>
				<td><?php echo $this->_tpl_vars['eContentItem']->source; ?>
</td>
				<td><?php if ($this->_tpl_vars['eContentItem']->getAccessType() == 'free'): ?>No Usage Restrictions<?php elseif ($this->_tpl_vars['eContentItem']->getAccessType() == 'acs' || $this->_tpl_vars['eContentItem']->getAccessType() == 'singleUse'): ?>Must be checked out to read<?php endif; ?></td>
				<?php if ($this->_tpl_vars['showEContentNotes']): ?><td><?php echo $this->_tpl_vars['eContentItem']->notes; ?>
</td><?php endif; ?>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentItem']->getSize())) ? $this->_run_mod_handler('file_size', true, $_tmp) : smarty_modifier_file_size($_tmp)); ?>
</td>
				<td>
										<?php $_from = $this->_tpl_vars['eContentItem']->links; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
						<a href="<?php if ($this->_tpl_vars['link']['url']): ?><?php echo $this->_tpl_vars['link']['url']; ?>
<?php else: ?>#<?php endif; ?>" <?php if ($this->_tpl_vars['link']['onclick']): ?>onclick="<?php echo $this->_tpl_vars['link']['onclick']; ?>
"<?php endif; ?> class="button"><?php echo $this->_tpl_vars['link']['text']; ?>
</a>
					<?php endforeach; endif; unset($_from); ?>
					<?php if ($this->_tpl_vars['user'] && $this->_tpl_vars['user']->hasRole('epubAdmin')): ?>
						<a href="#" onclick="return editItem('<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['eContentItem']->id; ?>
')" class="button">Edit</a>
						<a href="#" onclick="return deleteItem('<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['eContentItem']->id; ?>
')" class="button">Delete</a>
					<?php endif; ?>
				</td>
			</tr>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
	</table>
<?php else: ?>
	No Copies Found
<?php endif; ?>

<?php $this->assign('firstItem', $this->_tpl_vars['holdings']['0']); ?>
<?php if (strcasecmp ( $this->_tpl_vars['source'] , 'OverDrive' ) == 0): ?>
	<a href="#" onclick="return addOverDriveRecordToWishList('<?php echo $this->_tpl_vars['id']; ?>
')" class="button">Add&nbsp;to&nbsp;Wish&nbsp;List</a>
<?php endif; ?>
<?php if (strcasecmp ( $this->_tpl_vars['source'] , 'OverDrive' ) != 0 && $this->_tpl_vars['user'] && $this->_tpl_vars['user']->hasRole('epubAdmin')): ?>
	<a href="#" onclick="return addItem('<?php echo $this->_tpl_vars['id']; ?>
');" class="button">Add Item</a>
<?php endif; ?>

<?php if (strcasecmp ( $this->_tpl_vars['source'] , 'OverDrive' ) == 0): ?>
	<div id='overdriveMediaConsoleInfo'>
		<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/overdrive.png" width="125" height="42" alt="Powered by Overdrive" class="alignleft"/>
		<p>This title requires the <a href="http://www.overdrive.com/software/omc/">OverDrive&reg; Media Console&trade;</a> to use the title.  
		If you do not already have the OverDrive Media Console, you may download it <a href="http://www.overdrive.com/software/omc/">here</a>.</p>
		<div class="clearer">&nbsp;</div> 
		<p>Need help transferring a title to your device or want to know whether or not your device is compatible with a particular format?
		Click <a href="http://help.overdrive.com">here</a> for more information. 
		</p>
		 
	</div>
<?php endif; ?>
