<?php /* Smarty version 2.6.19, created on 2012-06-18 17:23:50
         compiled from Admin/../Admin/propertiesList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'Admin/../Admin/propertiesList.tpl', 27, false),array('modifier', 'string_format', 'Admin/../Admin/propertiesList.tpl', 52, false),)), $this); ?>
<div id="page-content" class="content">
	<div id="sidebar">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "MyResearch/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Admin/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	
	<div id="main-content">
		<h1><?php echo $this->_tpl_vars['shortPageTitle']; ?>
</h1>
		<br />
		<div class='adminTableRegion'>
			<table class="adminTable">
				<thead>
					<tr>
						<th class='headerCell'>Actions</th>
						<?php $_from = $this->_tpl_vars['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['property']):
?>
							<?php if (! isset ( $this->_tpl_vars['property']['hideInLists'] ) || $this->_tpl_vars['property']['hideInLists'] == false): ?>
							<th class='headerCell'><label title='<?php echo $this->_tpl_vars['property']['description']; ?>
'><?php echo $this->_tpl_vars['property']['label']; ?>
</label></th>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<th class='headerCell'>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset ( $this->_tpl_vars['dataList'] ) && is_array ( $this->_tpl_vars['dataList'] )): ?>
						<?php $_from = $this->_tpl_vars['dataList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dataItem']):
?>
						<tr class='<?php echo smarty_function_cycle(array('values' => "odd,even"), $this);?>
 <?php echo $this->_tpl_vars['dataItem']->class; ?>
'>
						<?php if ($this->_tpl_vars['dataItem']->class != 'objectDeleted'): ?>
							<td class='edit'><a href='<?php echo $this->_tpl_vars['url']; ?>
/<?php echo $this->_tpl_vars['module']; ?>
/<?php echo $this->_tpl_vars['toolName']; ?>
?objectAction=edit&id=<?php echo $this->_tpl_vars['id']; ?>
'>Edit</a></td>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['property']):
?>
								<?php $this->assign('propName', $this->_tpl_vars['property']['property']); ?>
								<?php $this->assign('propOldName', $this->_tpl_vars['property']['propertyOld']); ?>
								<?php $this->assign('propValue', $this->_tpl_vars['dataItem']->{(($_var=$this->_tpl_vars['propName']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
								<?php $this->assign('propOldValue', $this->_tpl_vars['dataItem']->{(($_var=$this->_tpl_vars['propOldName']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
								<?php if (! isset ( $this->_tpl_vars['property']['hideInLists'] ) || $this->_tpl_vars['property']['hideInLists'] == false): ?>
									<td <?php if ($this->_tpl_vars['propOldValue']): ?>class='fieldUpdated'<?php endif; ?>>
									<?php if ($this->_tpl_vars['property']['type'] == 'text' || $this->_tpl_vars['property']['type'] == 'label' || $this->_tpl_vars['property']['type'] == 'hidden' || $this->_tpl_vars['property']['type'] == 'file'): ?>
										<?php echo $this->_tpl_vars['propValue']; ?>
<?php if ($this->_tpl_vars['propOldValue']): ?> (<?php echo $this->_tpl_vars['propOldValue']; ?>
)<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'date'): ?>
										<?php echo $this->_tpl_vars['propValue']; ?>
<?php if ($this->_tpl_vars['propOldValue']): ?> (<?php echo $this->_tpl_vars['propOldValue']; ?>
)<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'partialDate'): ?>
										<?php $this->assign('propNameMonth', $this->_tpl_vars['property']['propNameMonth']); ?>
										<?php $this->assign('propMonthValue', $this->_tpl_vars['dataItem']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
										<?php $this->assign('propNameDay', $this->_tpl_vars['property']['propNameDay']); ?>
										<?php $this->assign('propDayValue', $this->_tpl_vars['dataItem']->{(($_var=$this->_tpl_vars['propDayValue']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
										<?php $this->assign('propNameYear', $this->_tpl_vars['property']['propNameYear']); ?>
										<?php $this->assign('propYearValue', $this->_tpl_vars['dataItem']->{(($_var=$this->_tpl_vars['propNameYear']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
										<?php if ($this->_tpl_vars['propMonthValue']): ?>$propMonthValue<?php else: ?>??<?php endif; ?>/<?php if ($this->_tpl_vars['propDayValue']): ?>$propDayValue<?php else: ?>??<?php endif; ?>/<?php if ($this->_tpl_vars['propYearValue']): ?>$propYearValue<?php else: ?>??<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'currency'): ?>
										<?php $this->assign('propDisplayFormat', $this->_tpl_vars['property']['displayFormat']); ?>
										$<?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['propDisplayFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['propDisplayFormat'])); ?>
<?php if ($this->_tpl_vars['propOldValue']): ?> ($<?php echo ((is_array($_tmp=$this->_tpl_vars['propOldValue'])) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['propDisplayFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['propDisplayFormat'])); ?>
)<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'enum'): ?>
										<?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
											<?php if ($this->_tpl_vars['propValue'] == $this->_tpl_vars['propertyValue']): ?><?php echo $this->_tpl_vars['propertyName']; ?>
<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
										<?php if ($this->_tpl_vars['propOldValue']): ?>
											<?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
												<?php if ($this->_tpl_vars['propOldValue'] == $this->_tpl_vars['propertyValue']): ?> (<?php echo $this->_tpl_vars['propertyName']; ?>
)<?php endif; ?>
											 <?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'multiSelect'): ?>
										<?php if (is_array ( $this->_tpl_vars['propValue'] ) && count ( $this->_tpl_vars['propValue'] ) > 0): ?>
											<?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
												<?php if (in_array ( $this->_tpl_vars['propertyValue'] , array_keys ( $this->_tpl_vars['propValue'] ) )): ?><?php echo $this->_tpl_vars['propertyName']; ?>
<br/><?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php else: ?>
											No values selected
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['property']['type'] == 'checkbox'): ?>
										<?php if (( $this->_tpl_vars['propValue'] == 1 )): ?>Yes<?php else: ?>No<?php endif; ?>
										<?php if ($this->_tpl_vars['propOldValue']): ?>
										<?php if (( $this->_tpl_vars['propOldValue'] == 1 )): ?> (Yes)<?php else: ?> (No)<?php endif; ?>
										<?php endif; ?>
									<?php else: ?>
										Unknown type to display <?php echo $this->_tpl_vars['property']['type']; ?>

									<?php endif; ?>
									</td>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php if ($this->_tpl_vars['dataItem']->class != 'objectDeleted'): ?>
							<td class='edit'><a href='<?php echo $this->_tpl_vars['url']; ?>
/<?php echo $this->_tpl_vars['module']; ?>
/<?php echo $this->_tpl_vars['toolName']; ?>
?objectAction=edit&id=<?php echo $this->_tpl_vars['id']; ?>
'>Edit</a></td>
							<?php endif; ?>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php if ($this->_tpl_vars['canAddNew']): ?>
		<form>
			<input type='hidden' name='objectAction' value='addNew' />
			<button type='submit' value='addNew'>Add New <?php echo $this->_tpl_vars['objectType']; ?>
</button>
			</form>
			<?php endif; ?>
			<form>
			<?php $_from = $this->_tpl_vars['customListActions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customAction']):
?>
				<form>
				<input type='hidden' name='objectAction' value='<?php echo $this->_tpl_vars['customAction']['action']; ?>
' />
				<button type='submit' value='<?php echo $this->_tpl_vars['customAction']['action']; ?>
'><?php echo $this->_tpl_vars['customAction']['label']; ?>
</button>
				</form>
			<?php endforeach; endif; unset($_from); ?>
			<input type='hidden' name='objectAction' value='export' />
			<button type='submit' value='export'>Export to file</button>
			</form>
			<form enctype="multipart/form-data" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
			<input type="hidden" name='objectAction' value='compare' />
			Choose a file to compare: <input name="uploadedfile" type="file" /> <input type="submit" value="Compare File" /><br />
			</form>
			<form enctype="multipart/form-data" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
			<input type="hidden" name='objectAction' value='import' />
			Choose a file to import: <input name="uploadedfile" type="file" /> <input type="submit" value="Import File" /><br />
			This should be a file that was exported from the VuFind Admin console. Trying to import another file could result in having a very long day of trying to put things back together.	In short, don't do it!
		</form>
	</div>
</div>