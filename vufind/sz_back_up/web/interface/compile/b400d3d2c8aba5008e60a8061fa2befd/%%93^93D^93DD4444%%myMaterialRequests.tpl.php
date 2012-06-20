<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:33
         compiled from MaterialsRequest/myMaterialRequests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'MaterialsRequest/myMaterialRequests.tpl', 46, false),array('modifier', 'date_format', 'MaterialsRequest/myMaterialRequests.tpl', 47, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/services/MaterialsRequest/ajax.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/tablesorter/jquery.tablesorter.min.js"></script>
<div id="page-content" class="content">
	<div id="sidebar-wrapper"><div id="sidebar">
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
	</div></div>
	
	<div id="main-content">
		<h2>My Materials Requests</h2>
		<?php if ($this->_tpl_vars['error']): ?>
			<div class="error"><?php echo $this->_tpl_vars['error']; ?>
</div>
		<?php else: ?>
			<div id="materialsRequestFilters">
				Filters:
				<form action="<?php echo $this->_tpl_vars['path']; ?>
/MaterialsRequest/MyRequests" method="get">
					<div>
					<div>
						Show: 
						<input type="radio" id="openRequests" name="requestsToShow" value="openRequests" <?php if ($this->_tpl_vars['showOpen']): ?>checked="checked"<?php endif; ?>/><label for="openRequests">Open Requests</label>
						<input type="radio" id="allRequests" name="requestsToShow" value="allRequests" <?php if (! $this->_tpl_vars['showOpen']): ?>checked="checked"<?php endif; ?>/><label for="allRequests">All Requests</label>
					</div>
					<div><input type="submit" name="submit" value="Update Filters"/></div>
					</div>
				</form>
			</div>
			<?php if (count ( $this->_tpl_vars['allRequests'] ) > 0): ?>
				<table id="requestedMaterials" class="tablesorter">
					<thead>
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Format</th>
							<th>Status</th>
							<th>Created</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_tpl_vars['allRequests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['request']):
?>
							<tr>
								<td><?php echo $this->_tpl_vars['request']->title; ?>
</td>
								<td><?php echo $this->_tpl_vars['request']->author; ?>
</td>
								<td><?php echo $this->_tpl_vars['request']->format; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['request']->statusLabel)) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['request']->dateCreated)) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
								<td>
									<a href="#" onclick='showMaterialsRequestDetails("<?php echo $this->_tpl_vars['request']->id; ?>
")' class="button">Details</a>
									<?php if ($this->_tpl_vars['request']->status == $this->_tpl_vars['defaultStatus']): ?>
									<a href="#" onclick="return cancelMaterialsRequest('<?php echo $this->_tpl_vars['request']->id; ?>
');" class="button">Cancel Request</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
			<?php else: ?>
				<div>There are no materials requests that meet your criteria.</div>
			<?php endif; ?>
			<div id="createNewMaterialsRequest" class="button"><a href="<?php echo $this->_tpl_vars['path']; ?>
/MaterialsRequest/NewRequest">Submit a New Materials Request</a></div>
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript">
<?php echo '
$("#requestedMaterials").tablesorter({cssAsc: \'sortAscHeader\', cssDesc: \'sortDescHeader\', cssHeader: \'unsortedHeader\', headers: { 4: {sorter : \'date\'}, 5: { sorter: false} } });
'; ?>

</script>