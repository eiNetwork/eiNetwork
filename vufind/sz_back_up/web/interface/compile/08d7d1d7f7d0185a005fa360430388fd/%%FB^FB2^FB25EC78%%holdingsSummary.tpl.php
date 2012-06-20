<?php /* Smarty version 2.6.19, created on 2012-06-15 13:53:59
         compiled from szheng/holdingsSummary.tpl */ ?>
<div id = "holdingsSummary" class="holdingsSummary">
     
  <?php if ($this->_tpl_vars['holdingsSummary']['status'] == 'Available At'): ?>
    <div class="availability">
      <span><img alt="holdingstatus" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png" class="holdingsImage"></span>
      <span>Now Available: </span><span class='availableAtList'><?php echo $this->_tpl_vars['holdingsSummary']['availableAt']; ?>
</span> 
    </div>
      
  <?php elseif ($this->_tpl_vars['holdingsSummary']['status'] != 'Available online'): ?>
          <div class="holdingsInformation">
	<?php if ($this->_tpl_vars['holdingsSummary']['availableCopies'] > 0): ?>
	    <span><img alt="holdingstatus" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/Available.png" class="holdingsImage"></span>
	    <span  class="holdingsInformation_status"><?php echo $this->_tpl_vars['holdingsSummary']['numCopies']; ?>
 total <?php if ($this->_tpl_vars['holdingsSummary']['numCopies'] == 1): ?>copy<?php else: ?>copies<?php endif; ?>, <?php echo $this->_tpl_vars['holdingsSummary']['availableCopies']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['availableCopies'] == 1): ?>is<?php else: ?>are<?php endif; ?> on shelf.</span>
	<?php else: ?>
	    <span><img alt="holdingstatus" src="/interface/themes/einetwork/images/Art/AvailabilityIcons/CheckedOut.png" class="holdingsImage"></span>
	    <span  class="holdingsInformation_status"><?php echo $this->_tpl_vars['holdingsSummary']['numCopies']; ?>
 total <?php if ($this->_tpl_vars['holdingsSummary']['numCopies'] == 1): ?>copy<?php else: ?>copies<?php endif; ?>, <?php echo $this->_tpl_vars['holdingsSummary']['availableCopies']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['availableCopies'] == 1): ?>is<?php else: ?>are<?php endif; ?> on shelf.</span>
	<?php endif; ?>
      </div>
        <?php endif; ?>
</div>