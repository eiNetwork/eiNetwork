<?php /* Smarty version 2.6.19, created on 2012-06-20 13:53:51
         compiled from Search/list-list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Search/list-list.tpl', 55, false),)), $this); ?>
<script type="text/javascript">
$(document).ready(function() <?php echo ' { '; ?>

  doGetStatusSummaries();
  doGetRatings();
  <?php if ($this->_tpl_vars['user']): ?>
  doGetSaveStatuses();
  <?php endif; ?>
<?php echo ' }); '; ?>

</script>

<form id="addForm" action="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/HoldMultiple">
	<div id="addFormContents">
						<?php $_from = $this->_tpl_vars['recordSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['record']):
        $this->_foreach['recordLoop']['iteration']++;
?>
		  		    		  <div <div class="result record<?php echo $this->_foreach['recordLoop']['iteration']; ?>
">
		    <?php echo $this->_tpl_vars['record']; ?>

		  </div>
		<?php endforeach; endif; unset($_from); ?>
		
		<input type="hidden" name="type" value="hold" />
		<div class='selectAllControls'>
		  <a href="#" onclick="$('.titleSelect').not(':checked').attr('checked', true).trigger('click').attr('checked', true);return false;">Select All</a> /
		  <a href="#" onclick="$('.titleSelect:checked').attr('checked', false).trigger('click').attr('checked', false);return false;">Deselect All</a>
		</div>
		
		<?php if ($this->_tpl_vars['enableMaterialsRequest']): ?>
		<div id="materialsRequestInfo">
    Can't find what you are looking for? Try our <a href="<?php echo $this->_tpl_vars['path']; ?>
/MaterialsRequest/NewRequest">Materials Request Service</a>.</div>
    </div>
    <?php endif; ?>
		
		<?php if (! $this->_tpl_vars['enableBookCart']): ?>
		<input type="submit" name="placeHolds" value="Request Selected Items" class="requestSelectedItems"/>
		<?php endif; ?>
	</div>
</form>

<?php if ($this->_tpl_vars['showStrands']): ?>
<?php echo '
<script type="text/javascript">

//This code can actually be used anytime to achieve an "Ajax" submission whenever called
if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}

StrandsTrack.push({
   event:"searched",
   searchstring: "'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php echo '"
});

</script>
'; ?>

<?php endif; ?>