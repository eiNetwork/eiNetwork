<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:34
         compiled from EcontentRecord/holdingsSummary.tpl */ ?>
<div id = "holdingsSummary" class="holdingsSummary">
	<div class="availability">
		<?php echo $this->_tpl_vars['holdingsSummary']['status']; ?>

	</div>

	<div class="holdableCopiesSummary">
		<?php if ($this->_tpl_vars['holdingsSummary']['numHoldings'] == 0): ?>
			No copies available yet.
			<br/><?php echo $this->_tpl_vars['holdingsSummary']['wishListSize']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['wishListSize'] == 1): ?>person has<?php else: ?>people have<?php endif; ?> added the record to their wish list.
		<?php else: ?>
			<?php if (strcasecmp ( $this->_tpl_vars['holdingsSummary']['source'] , 'OverDrive' ) == 0): ?>
				Available for use from OverDrive.
			<?php elseif ($this->_tpl_vars['holdingsSummary']['source'] == 'Freegal'): ?>
				Downloadable from Freegal.
			<?php elseif ($this->_tpl_vars['holdingsSummary']['accessType'] == 'free'): ?>
				Available for multiple simultaneous usage. 
			<?php elseif ($this->_tpl_vars['holdingsSummary']['onHold']): ?>
				You are number <?php echo $this->_tpl_vars['holdingsSummary']['holdPosition']; ?>
 on the wait list.
			<?php elseif ($this->_tpl_vars['holdingsSummary']['checkedOut']): ?>
							<?php else: ?>
				<?php echo $this->_tpl_vars['holdingsSummary']['totalCopies']; ?>
 total <?php if ($this->_tpl_vars['holdingsSummary']['totalCopies'] == 1): ?>copy<?php else: ?>copies<?php endif; ?>, 
				<?php echo $this->_tpl_vars['holdingsSummary']['availableCopies']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['availableCopies'] == 1): ?>is<?php else: ?>are<?php endif; ?> available. 
				<?php if ($this->_tpl_vars['holdingsSummary']['onOrderCopies'] > 0): ?>
					<?php echo $this->_tpl_vars['holdingsSummary']['onOrderCopies']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['onOrderCopies'] == 1): ?>is<?php else: ?>are<?php endif; ?> on order. 
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['holdingsSummary']['numHolds'] >= 0): ?>
				<br/><?php echo $this->_tpl_vars['holdingsSummary']['holdQueueLength']; ?>
 <?php if ($this->_tpl_vars['holdingsSummary']['holdQueueLength'] == 1): ?>person is<?php else: ?>people are<?php endif; ?> on the wait list.
			<?php endif; ?>
		<?php endif; ?> 
		<?php if ($this->_tpl_vars['showOtherEditionsPopup']): ?>
		<div class="otherEditions">
			<a href="#" onclick="loadOtherEditionSummaries('<?php echo $this->_tpl_vars['holdingsSummary']['recordId']; ?>
', true)">Other Formats and Languages</a>
		</div>
		<?php endif; ?>
	</div>
     
 </div>