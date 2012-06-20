<?php /* Smarty version 2.6.19, created on 2012-06-18 14:00:43
         compiled from Record/ajax-purchase-options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Record/ajax-purchase-options.tpl', 3, false),array('modifier', 'escape', 'Record/ajax-purchase-options.tpl', 25, false),)), $this); ?>
<div id="popupboxHeader" class="header">
	<a onclick="hideLightbox(); return false;" href="">close</a>
	<?php echo translate(array('text' => 'Purchase Options'), $this);?>

</div>
<div id="popupboxContent" class="content">
	<div id='purchaseOptions'>
		<?php if ($this->_tpl_vars['errors']): ?>
			<div class="errors">
				<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
					<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php else: ?>
			<table class="purchaseOptionLinks">
				<tbody>
				<?php $_from = $this->_tpl_vars['purchaseLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['purchaseLink']):
?>
					<tr>
					<td>
					<?php if ($this->_tpl_vars['purchaseLink']['image']): ?>
						<img src="<?php echo $this->_tpl_vars['purchaseLink']['image']; ?>
" alt="<?php echo $this->_tpl_vars['purchaseLink']['storeName']; ?>
" />
					<?php else: ?>
						<?php echo $this->_tpl_vars['purchaseLink']['storeName']; ?>

					<?php endif; ?>
					</td>
					<td><div class='purchaseTitle button'><a href='/Record/<?php echo $this->_tpl_vars['id']; ?>
/Purchase?store=<?php echo ((is_array($_tmp=$this->_tpl_vars['purchaseLink']['storeName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php if ($this->_tpl_vars['purchaseLink']['field856Index']): ?>&index=<?php echo $this->_tpl_vars['purchaseLink']['field856Index']; ?>
<?php endif; ?>' target='_blank'>Buy Now</a></div></td>
					
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
</div>