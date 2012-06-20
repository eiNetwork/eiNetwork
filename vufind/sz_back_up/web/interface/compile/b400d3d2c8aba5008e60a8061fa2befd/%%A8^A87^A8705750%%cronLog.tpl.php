<?php /* Smarty version 2.6.19, created on 2012-06-19 09:09:02
         compiled from Admin/cronLog.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Admin/cronLog.tpl', 19, false),)), $this); ?>
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
		<h1>Cron Log</h1>
		
		<div id="econtentAttachLogContainer">
			<table class="logEntryDetails" cellspacing="0">
				<thead>
					<tr><th>Id</th><th>Started</th><th>Finished</th><th>Elapsed</th><th>Processes Run</th><th>Had Errors?</th><th>Notes</th></tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['logEntries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['logEntry']):
?>
						<tr>
							<td><a href="#" class="collapsed" id="cronEntry<?php echo $this->_tpl_vars['logEntry']->id; ?>
" onclick="toggleProcessInfo('<?php echo $this->_tpl_vars['logEntry']->id; ?>
');return false;"><?php echo $this->_tpl_vars['logEntry']->id; ?>
</a></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['logEntry']->startTime)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['logEntry']->endTime)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
</td>
							<td><?php echo $this->_tpl_vars['logEntry']->getElapsedTime(); ?>
</td>
							<td><?php echo $this->_tpl_vars['logEntry']->getNumProcesses(); ?>
</td>
							<td><?php if ($this->_tpl_vars['logEntry']->getHadErrors()): ?>Yes<?php else: ?>No<?php endif; ?></td>
							<td><a href="#" onclick="return showCronNotes('<?php echo $this->_tpl_vars['logEntry']->id; ?>
');">Show Notes</a></td>
						</tr>
						<tr><td colspan="8">
							<div class="logEntryProcessDetails" id="processInfo<?php echo $this->_tpl_vars['logEntry']->id; ?>
" style="display:none">
								<table class="logEntryProcessDetails" cellspacing="0">
									<thead>
										<tr><th>Process Name</th><th>Started</th><th>End Time</th><th>Elapsed</th><th>Errors</th><th>Updates</th><th>Notes</th></tr>
									</thead>
									<tbody>
									<?php $_from = $this->_tpl_vars['logEntry']->processes(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['process']):
?>
										<tr>
											<td><?php echo $this->_tpl_vars['process']->processName; ?>
</td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['process']->startTime)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
</td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['process']->endTime)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
</td>
											<td><?php echo $this->_tpl_vars['process']->getElapsedTime(); ?>
</td>
											<td><?php echo $this->_tpl_vars['process']->numErrors; ?>
</td>
											<td><?php echo $this->_tpl_vars['process']->numUpdates; ?>
</td>
											<td><a href="#" onclick="return showCronProcessNotes('<?php echo $this->_tpl_vars['process']->id; ?>
');">Show Notes</a></td>
										</tr>
									<?php endforeach; endif; unset($_from); ?>
									</tbody>
								</table>
							</div>
						</td></tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script><?php echo '
	function showReindexProcessNotes(id){
		ajaxLightbox("/Admin/AJAX?method=getReindexProcessNotes&id=" + id);
		return false;
	}
	function showCronNotes(id){
		ajaxLightbox("/Admin/AJAX?method=getCronNotes&id=" + id);
		return false;
	}
	function showCronProcessNotes(id){
		ajaxLightbox("/Admin/AJAX?method=getCronProcessNotes&id=" + id);
		return false;
	}
	function toggleProcessInfo(id){
		$("#cronEntry" + id).toggleClass("expanded collapsed");
		$("#processInfo" + id).toggle();
	}
	'; ?>

</script>