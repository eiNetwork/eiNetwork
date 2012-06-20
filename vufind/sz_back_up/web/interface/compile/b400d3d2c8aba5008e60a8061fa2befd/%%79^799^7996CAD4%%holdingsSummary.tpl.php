<?php /* Smarty version 2.6.19, created on 2012-06-20 11:33:38
         compiled from Record/holdingsSummary.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/holdingsSummary.tpl', 4, false),array('function', 'translate', 'Record/holdingsSummary.tpl', 15, false),)), $this); ?>
<div id = "holdingsSummary" class="holdingsSummary">
  <?php if ($this->_tpl_vars['holdingsSummary']['callnumber']): ?>
    <div class='callNumber'>
      Shelved at <a href='<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
#holdings'><?php echo $this->_tpl_vars['holdingsSummary']['callnumber']; ?>
</a>
    </div>
  <?php endif; ?>
   
  <?php if ($this->_tpl_vars['holdingsSummary']['status'] == 'Available At'): ?>
    <div class="availability">
      Now Available: <span class='availableAtList'><?php echo $this->_tpl_vars['holdingsSummary']['availableAt']; ?>
</span> 
    </div>
      
  <?php elseif ($this->_tpl_vars['holdingsSummary']['status'] != 'Available online'): ?>
    <div class="availability">
      <a href='<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
#holdings'><?php echo translate(array('text' => $this->_tpl_vars['holdingsSummary']['status']), $this);?>
</a>
    </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['holdingsSummary']['isDownloadable']): ?>
    <div>Available Online from <a href='<?php echo $this->_tpl_vars['holdingsSummary']['downloadLink']; ?>
' <?php if (! ( isset ( $this->_tpl_vars['holdingsSummary']['localDownload'] ) || $this->_tpl_vars['holdingsSummary']['localDownload'] == false )): ?>target='_blank'<?php endif; ?>><?php echo $this->_tpl_vars['holdingsSummary']['downloadText']; ?>
</a></div>
  <?php else: ?>
		<div class="holdableCopiesSummary">
		  <?php echo $this->_tpl_vars['holdingsSummary']['numCopies']; ?>
 total <?php if ($this->_tpl_vars['holdingsSummary']['numCopies'] == 1): ?>copy<?php else: ?>copies<?php endif; ?>, 
		  <?php echo $this->_tpl_vars['holdingsSummary']['availableCopies']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['availableCopies'] == 1): ?>is<?php else: ?>are<?php endif; ?> on shelf.
		  <?php if ($this->_tpl_vars['holdingsSummary']['holdQueueLength'] >= 0): ?>
		    <br/><?php echo $this->_tpl_vars['holdingsSummary']['holdQueueLength']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['holdQueueLength'] == 1): ?>person is<?php else: ?>people are<?php endif; ?> on the wait list.
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['holdingsSummary']['numCopiesOnOrder'] > 0): ?>
		    <br/><?php echo $this->_tpl_vars['holdingsSummary']['numCopiesOnOrder']; ?>
 copies are on order.
		  <?php endif; ?>  
		</div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['showOtherEditionsPopup']): ?>
  <div class="otherEditions">
  	<a href="#" onclick="loadOtherEditionSummaries('<?php echo $this->_tpl_vars['holdingsSummary']['recordId']; ?>
', false)">Other Formats and Languages</a>
  </div>
  <?php endif; ?>
</div>