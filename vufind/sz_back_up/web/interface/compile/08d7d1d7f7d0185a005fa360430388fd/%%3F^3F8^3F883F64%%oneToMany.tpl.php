<?php /* Smarty version 2.6.19, created on 2012-06-19 13:08:14
         compiled from DataObjectUtil/oneToMany.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'DataObjectUtil/oneToMany.tpl', 31, false),array('modifier', 'strlen', 'DataObjectUtil/oneToMany.tpl', 68, false),)), $this); ?>
<table id="<?php echo $this->_tpl_vars['propName']; ?>
" class="<?php if ($this->_tpl_vars['property']['sortable']): ?>sortableProperty<?php endif; ?>" >
<thead>
	<tr>
		<?php if ($this->_tpl_vars['property']['sortable']): ?>
			<th>Weight</th>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['property']['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subProperty']):
?>
			<?php if (in_array ( $this->_tpl_vars['subProperty']['type'] , array ( 'text' , 'enum' , 'date' , 'checkbox' ) )): ?>
				<th><?php echo $this->_tpl_vars['subProperty']['label']; ?>
</th>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<th>&nbsp;</th>
	</tr>
</thead>
<tbody>
<?php $_from = $this->_tpl_vars['propValue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subObject']):
?>
	<tr id="<?php echo $this->_tpl_vars['propName']; ?>
<?php echo $this->_tpl_vars['subObject']->id; ?>
">
		<input type="hidden" id="<?php echo $this->_tpl_vars['propName']; ?>
Id_<?php echo $this->_tpl_vars['subObject']->id; ?>
" name="<?php echo $this->_tpl_vars['propName']; ?>
Id[<?php echo $this->_tpl_vars['subObject']->id; ?>
]" value="<?php echo $this->_tpl_vars['subObject']->id; ?>
"/>
		<?php if ($this->_tpl_vars['property']['sortable']): ?>
			<td>
			<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			<input type="hidden" id="<?php echo $this->_tpl_vars['propName']; ?>
Weight_<?php echo $this->_tpl_vars['subObject']->id; ?>
" name="<?php echo $this->_tpl_vars['propName']; ?>
Weight[<?php echo $this->_tpl_vars['subObject']->id; ?>
]" value="<?php echo $this->_tpl_vars['subObject']->weight; ?>
"/>
			</td>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['property']['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subProperty']):
?>
			<?php if (in_array ( $this->_tpl_vars['subProperty']['type'] , array ( 'text' , 'enum' , 'date' , 'checkbox' ) )): ?>
				<td>
					<?php $this->assign('subPropName', $this->_tpl_vars['subProperty']['property']); ?>
					<?php $this->assign('subPropValue', $this->_tpl_vars['subObject']->{(($_var=$this->_tpl_vars['subPropName']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
					<?php if ($this->_tpl_vars['subProperty']['type'] == 'text' || $this->_tpl_vars['subProperty']['type'] == 'date'): ?>
						<input type="text" name="<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[<?php echo $this->_tpl_vars['subObject']->id; ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['subPropValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="<?php if ($this->_tpl_vars['subProperty']['type'] == 'date'): ?>datepicker<?php endif; ?><?php if ($this->_tpl_vars['subProperty']['required'] == true): ?> required<?php endif; ?>"/>
					<?php elseif ($this->_tpl_vars['subProperty']['type'] == 'checkbox'): ?>
						<input type='checkbox' name='<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[<?php echo $this->_tpl_vars['subObject']->id; ?>
]' <?php if ($this->_tpl_vars['subPropValue'] == 1): ?>checked='checked'<?php endif; ?>/>
					<?php else: ?>
						<select name='<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[<?php echo $this->_tpl_vars['subObject']->id; ?>
]' id='<?php echo $this->_tpl_vars['propName']; ?>
<?php echo $this->_tpl_vars['subPropName']; ?>
_<?php echo $this->_tpl_vars['subObject']->id; ?>
' <?php if ($this->_tpl_vars['subProperty']['required'] == true): ?>class='required'<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['subProperty']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
							<option value='<?php echo $this->_tpl_vars['propertyValue']; ?>
' <?php if ($this->_tpl_vars['subPropValue'] == $this->_tpl_vars['propertyValue']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['propertyName']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
					<?php endif; ?>
				</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<td>
				<input type="hidden" id="<?php echo $this->_tpl_vars['propName']; ?>
Deleted_<?php echo $this->_tpl_vars['subObject']->id; ?>
" name="<?php echo $this->_tpl_vars['propName']; ?>
Deleted[<?php echo $this->_tpl_vars['subObject']->id; ?>
]" value="false"/>
		<a href="#" onclick="if (confirm('Are you sure you want to delete this?'))<?php echo '{'; ?>
$('#<?php echo $this->_tpl_vars['propName']; ?>
Deleted_<?php echo $this->_tpl_vars['subObject']->id; ?>
').val('true');$('#<?php echo $this->_tpl_vars['propName']; ?>
<?php echo $this->_tpl_vars['subObject']->id; ?>
').hide()<?php echo '}'; ?>
;return false;"><img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/delete.png" alt="delete" /></a>		<?php if ($this->_tpl_vars['property']['editLink'] != ''): ?>
			<a href='<?php echo $this->_tpl_vars['property']['editLink']; ?>
?objectAction=edit&widgetListId=<?php echo $this->_tpl_vars['subObject']->id; ?>
&widgetId=<?php echo $this->_tpl_vars['widgetid']; ?>
' alt='Edit SubLinks' title='Edit SubLinks'>
				<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/link.png" alt="delete" />
			</a>
		<?php endif; ?>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>
<div class="<?php echo $this->_tpl_vars['propName']; ?>
Actions">
	<a href="#" onclick="addNew<?php echo $this->_tpl_vars['propName']; ?>
();return false;"  class="button">Add New</a>
</div>

<script type="text/javascript">
	<?php echo '$(document).ready(function(){'; ?>

	<?php if ($this->_tpl_vars['property']['sortable']): ?>
		<?php echo '$(\'#'; ?>
<?php echo $this->_tpl_vars['propName']; ?>
<?php echo ' tbody\').sortable({
			update: function(event, ui){
				$.each($(this).sortable(\'toArray\'), function(index, value){
					var inputId = \'#'; ?>
<?php echo $this->_tpl_vars['propName']; ?>
Weight_' + value.substr(<?php echo strlen($this->_tpl_vars['propName']); ?>
); <?php echo '
					$(inputId).val(index +1);
				});
			}
		});
		'; ?>

	<?php endif; ?>
	<?php echo '$(\'.datepicker\').datepicker({dateFormat:"yy-mm-dd"});'; ?>

	<?php echo '});'; ?>

	var numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 = 0;
	function addNew<?php echo $this->_tpl_vars['propName']; ?>
<?php echo '(){
		numAdditional'; ?>
<?php echo $this->_tpl_vars['property']['label']; ?>
<?php echo ' = numAdditional'; ?>
<?php echo $this->_tpl_vars['property']['label']; ?>
<?php echo ' -1;
		var newRow = "<tr>";
		'; ?>

		newRow +=	"<input type='hidden' id='<?php echo $this->_tpl_vars['propName']; ?>
Id_" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 + "' name='<?php echo $this->_tpl_vars['propName']; ?>
Id[" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 + "]' value='" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 + "'/>"
		<?php if ($this->_tpl_vars['property']['sortable']): ?>
			newRow += "<td><span class='ui-icon ui-icon-arrowthick-2-n-s'></span>";
			newRow += "<input type='hidden' id='<?php echo $this->_tpl_vars['propName']; ?>
Weight_" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"' name='<?php echo $this->_tpl_vars['propName']; ?>
Weight[" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"]' value='" + (100 - numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
)  +"'/>";
			newRow += "</td>";
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['property']['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subProperty']):
?>
			<?php if (in_array ( $this->_tpl_vars['subProperty']['type'] , array ( 'text' , 'enum' , 'date' , 'checkbox' ) )): ?>
				newRow += "<td>";
				<?php $this->assign('subPropName', $this->_tpl_vars['subProperty']['property']); ?>
				<?php $this->assign('subPropValue', $this->_tpl_vars['subObject']->{(($_var=$this->_tpl_vars['subPropName']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
				<?php if ($this->_tpl_vars['subProperty']['type'] == 'text' || $this->_tpl_vars['subProperty']['type'] == 'date'): ?>
					newRow += "<input type='text' name='<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"]' value='' class='<?php if ($this->_tpl_vars['subProperty']['type'] == 'date'): ?>datepicker<?php endif; ?><?php if ($this->_tpl_vars['subProperty']['required'] == true): ?> required<?php endif; ?>'/>";
				<?php elseif ($this->_tpl_vars['subProperty']['type'] == 'checkbox'): ?>
					newRow += "<input type='checkbox' name='<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"]' />";
				<?php else: ?>
					newRow += "<select name='<?php echo $this->_tpl_vars['propName']; ?>
_<?php echo $this->_tpl_vars['subPropName']; ?>
[" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"]' id='<?php echo $this->_tpl_vars['propName']; ?>
<?php echo $this->_tpl_vars['subPropName']; ?>
_" + numAdditional<?php echo $this->_tpl_vars['property']['label']; ?>
 +"' <?php if ($this->_tpl_vars['subProperty']['required'] == true): ?>class='required'<?php endif; ?>>";
					<?php $_from = $this->_tpl_vars['subProperty']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
						newRow += "<option value='<?php echo $this->_tpl_vars['propertyValue']; ?>
' ><?php echo $this->_tpl_vars['propertyName']; ?>
</option>";
					<?php endforeach; endif; unset($_from); ?>
					newRow += "</select>";
				<?php endif; ?>
				newRow += "</td>";
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		newRow += "</tr>";
		<?php echo '
		$(\'#'; ?>
<?php echo $this->_tpl_vars['propName']; ?>
<?php echo ' tr:last\').after(newRow);
		$(\'.datepicker\').datepicker({dateFormat:"yy-mm-dd"});
	}
	'; ?>

</script>