<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:08
         compiled from RecordDrivers/Marc/staff.tpl */ ?>
<div id="formattedMarcRecord">
	<table class="citation" border="0">
		<tbody>
						<tr><th>LEADER</th><td colspan="3"><?php echo $this->_tpl_vars['marcRecord']->getLeader(); ?>
</td></tr>
			<?php $_from = $this->_tpl_vars['marcRecord']->getFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
				<?php if (get_class ( $this->_tpl_vars['field'] ) == 'File_MARC_Control_Field'): ?>
					<tr><th><?php echo $this->_tpl_vars['field']->getTag(); ?>
</th><td colspan="3"><?php echo $this->_tpl_vars['field']->getData(); ?>
</td></tr>
				<?php else: ?>
					<tr><th><?php echo $this->_tpl_vars['field']->getTag(); ?>
</th><th><?php echo $this->_tpl_vars['field']->getIndicator(1); ?>
</th><th><?php echo $this->_tpl_vars['field']->getIndicator(2); ?>
</th><td>
					<?php $_from = $this->_tpl_vars['field']->getSubfields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subfield']):
?>
					<strong>|<?php echo $this->_tpl_vars['subfield']->getCode(); ?>
</strong>&nbsp;<?php echo $this->_tpl_vars['subfield']->getData(); ?>
&nbsp;
					<?php endforeach; endif; unset($_from); ?>
					</td></tr>
				<?php endif; ?>
				
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
</div>