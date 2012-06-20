<?php /* Smarty version 2.6.19, created on 2012-06-15 09:31:09
         compiled from Record/view-holdings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/view-holdings.tpl', 29, false),array('function', 'translate', 'Record/view-holdings.tpl', 137, false),)), $this); ?>
<?php $this->assign('lastSection', ''); ?>

<?php if (isset ( $this->_tpl_vars['holdings'] ) && count ( $this->_tpl_vars['holdings'] ) > 0): ?>
 <table border="0" class="holdingsTable">
 <thead>
 <tr>
 <th>Location</th>
 <th>Collection</th>
 <th>Copy</th>
 <th>Call#</th>
 <th>Status</th>
 <th>Due</th>
 </tr>
 </thead>
 <tbody>
 <?php $_from = $this->_tpl_vars['holdings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['holding1']):
?>
 <?php $_from = $this->_tpl_vars['holding1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['holding']):
?>
  <?php if ($this->_tpl_vars['lastSection'] != $this->_tpl_vars['holding']['section']): ?>
    <?php if (strlen ( $this->_tpl_vars['holding']['section'] ) > 0): ?>
    <tr class='holdings-section'>
    <td colspan='3' class='holdings-section'><?php echo $this->_tpl_vars['holding']['section']; ?>
</td>
    </tr>
    <?php endif; ?>
    <?php $this->assign('lastSection', $this->_tpl_vars['holding']['section']); ?>
  <?php endif; ?>
  <tr >
  	  	<td style = "padding-bottom:5px;"><span><strong>
  	<?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    <?php if ($this->_tpl_vars['holding']['locationLink']): ?> (<a href='<?php echo $this->_tpl_vars['holding']['locationLink']; ?>
' target='_blank'>Map</a>)<?php endif; ?>
  	</strong></span></td>
  	
  	  	<td style = "padding-bottom:5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['collection'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	
  	  	<td style = "padding-bottom:5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['copy'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	
  	  	<td style = "padding-bottom:5px;">
  	<?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['callnumber'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  	<?php if ($this->_tpl_vars['holding']['link']): ?>
  	  <?php $_from = $this->_tpl_vars['holding']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
  	    <a href='<?php echo $this->_tpl_vars['link']['link']; ?>
' target='_blank'><?php echo $this->_tpl_vars['link']['linkText']; ?>
</a><br />
  	  <?php endforeach; endif; unset($_from); ?>
  	<?php endif; ?>
  	</td>
  	
  	  	<td style = "padding-bottom:5px;">
  	  <?php if ($this->_tpl_vars['holding']['reserve'] == 'Y'): ?>
        <?php echo $this->_tpl_vars['holding']['statusfull']; ?>

      <?php else: ?>
        <?php if ($this->_tpl_vars['holding']['availability']): ?>
            <span class="available"><?php echo $this->_tpl_vars['holding']['statusfull']; ?>
<?php if ($this->_tpl_vars['holding']['holdable'] == 0 && $this->_tpl_vars['showHoldButton']): ?> <label class='notHoldable' title='<?php echo $this->_tpl_vars['holding']['nonHoldableReason']; ?>
'>(Not Holdable)</label><?php endif; ?></span>
        <?php else: ?>
            <span class="checkedout"><?php echo $this->_tpl_vars['holding']['statusfull']; ?>
<?php if ($this->_tpl_vars['holding']['holdable'] == 0 && $this->_tpl_vars['showHoldButton']): ?> <label class='notHoldable' title='<?php echo $this->_tpl_vars['holding']['nonHoldableReason']; ?>
'>(Not Holdable)</label><?php endif; ?></span>
        <?php endif; ?>
      <?php endif; ?>
    </td>
    
        <td style = "padding-bottom:5px;">
  	  <?php if ($this->_tpl_vars['holding']['duedate']): ?><?php echo $this->_tpl_vars['holding']['duedate']; ?>
<?php endif; ?>
    </td>
    
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php endforeach; endif; unset($_from); ?>
  
 <?php elseif (isset ( $this->_tpl_vars['issueSummaries'] ) && count ( $this->_tpl_vars['issueSummaries'] ) > 0): ?>
      <?php $_from = $this->_tpl_vars['issueSummaries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['summaryLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['summaryLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['issueSummary']):
        $this->_foreach['summaryLoop']['iteration']++;
?>
   <tr class='issue-summary'>
   <td colspan='3' class='issue-summary-row'>
   <?php if ($this->_tpl_vars['issueSummary']['location']): ?>
   <div class='issue-summary-location'><?php echo $this->_tpl_vars['issueSummary']['location']; ?>
</div>
   <?php endif; ?>
   <div class='issue-summary-details'>
   <?php if ($this->_tpl_vars['issueSummary']['identity']): ?>
   <div class='issue-summary-line'><strong>Identity:</strong> <?php echo $this->_tpl_vars['issueSummary']['identity']; ?>
</div>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['issueSummary']['callNumber']): ?>
   <div class='issue-summary-line'><strong>Call Number:</strong> <?php echo $this->_tpl_vars['issueSummary']['callNumber']; ?>
</div>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['issueSummary']['latestReceived']): ?>
   <div class='issue-summary-line'><strong>Latest Issue Received:</strong> <?php echo $this->_tpl_vars['issueSummary']['latestReceived']; ?>
</div>
   <?php endif; ?>
   <?php if ($this->_tpl_vars['issueSummary']['libHas']): ?>
   <div class='issue-summary-line'><strong>Library Has:</strong> <?php echo $this->_tpl_vars['issueSummary']['libHas']; ?>
</div>
   <?php endif; ?>
   
   <?php if (count ( $this->_tpl_vars['issueSummary']['holdings'] ) > 0): ?>
   <span id='showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
' class='showIssuesLink'>Show Individual Issues</span>
   <script type="text/javascript">
     $('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').click(function()<?php echo ' { '; ?>

       if (!$('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').hasClass('expanded'))<?php echo ' { '; ?>

			   $('#issue-summary-holdings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').slideDown();
			   $('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').html('Hide Individual Issues');
			   $('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').addClass('expanded');
			 <?php echo ' }else{ '; ?>

		     $('#issue-summary-holdings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').slideUp();
		     $('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').removeClass('expanded');
		     $('#showHoldings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').html('Show Individual Issues');
			 <?php echo ' } '; ?>

		 <?php echo ' }); '; ?>

   </script>
   <?php if ($this->_tpl_vars['issueSummary']['checkInGridId']): ?>
   <span id='showCheckInGrid-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
' class='showCheckinGrid'>Show Check-in Grid</span>
   <?php endif; ?>
   <script type="text/javascript">
     $('#showCheckInGrid-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
').click(function()<?php echo ' { '; ?>

    	 getLightbox('Record', 'CheckInGrid', '.b26935041', '<?php echo $this->_tpl_vars['issueSummary']['checkInGridId']; ?>
', 'Check-in Grid', undefined, undefined, undefined, '5%', '90%', 50, '85%');
     <?php echo ' }); '; ?>

   </script>
   </div>
   
   <table id='issue-summary-holdings-<?php echo $this->_foreach['summaryLoop']['iteration']; ?>
' class='issue-summary-holdings' style='display:none;'>
          <?php $_from = $this->_tpl_vars['issueSummary']['holdings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['holding']):
?>
     <tr class='holdingsLine'>
      <td style = "padding-bottom:5px;"><span><strong>
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	    <?php if ($this->_tpl_vars['holding']['locationLink']): ?> (<a href='<?php echo $this->_tpl_vars['holding']['locationLink']; ?>
' target='_blank'>Map</a>)<?php endif; ?>
	    </strong></span></td>
	    <td style = "padding-bottom:5px;">
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['holding']['callnumber'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	    <?php if ($this->_tpl_vars['holding']['link']): ?>
	      <?php $_from = $this->_tpl_vars['holding']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
	        <a href='<?php echo $this->_tpl_vars['link']['link']; ?>
' target='_blank'><?php echo $this->_tpl_vars['link']['linkText']; ?>
</a><br />
	      <?php endforeach; endif; unset($_from); ?>
	    <?php endif; ?>
	    </td>
	    
	    <td style = "padding-bottom:5px;">
	      <?php if ($this->_tpl_vars['holding']['reserve'] == 'Y'): ?>
	        <?php echo translate(array('text' => "On Reserve - Ask at Circulation Desk"), $this);?>

	      <?php else: ?>
	        <?php if ($this->_tpl_vars['holding']['availability']): ?>
	            <span class="available"><?php echo $this->_tpl_vars['holding']['statusfull']; ?>
<?php if ($this->_tpl_vars['holding']['holdable'] == 0 && $this->_tpl_vars['showHoldButton']): ?> <label class='notHoldable' title='<?php echo $this->_tpl_vars['holding']['nonHoldableReason']; ?>
'>(Not Holdable)</label><?php endif; ?></span>
	        <?php else: ?>
	            <span class="checkedout"><?php echo $this->_tpl_vars['holding']['statusfull']; ?>
<?php if ($this->_tpl_vars['holding']['holdable'] == 0 && $this->_tpl_vars['showHoldButton']): ?> <label class='notHoldable' title='<?php echo $this->_tpl_vars['holding']['nonHoldableReason']; ?>
'>(Not Holdable)</label><?php endif; ?></span>
	        <?php endif; ?>
	      <?php endif; ?>
	    </td>
	    </tr>
     <?php endforeach; endif; unset($_from); ?>
   </table>
   <?php endif; ?>
   </td>
   </tr>
   <?php endforeach; endif; unset($_from); ?>

 </tbody>
 </table>
  <?php else: ?>
   No Copies Found
<?php endif; ?>