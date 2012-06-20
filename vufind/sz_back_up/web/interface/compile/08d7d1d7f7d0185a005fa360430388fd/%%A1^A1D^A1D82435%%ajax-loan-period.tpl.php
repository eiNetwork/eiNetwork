<?php /* Smarty version 2.6.19, created on 2012-06-18 14:04:53
         compiled from EcontentRecord/ajax-loan-period.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'EcontentRecord/ajax-loan-period.tpl', 2, false),)), $this); ?>
<div class="header">
	<?php echo translate(array('text' => 'Loan Period'), $this);?>

	<a href="#" onclick='hideLightbox();return false;' class="closeIcon">Close <img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/cancel.png" alt="close" /></a>
</div>
<div class="content">
	<form method="post" action=""> 
		<div>
			<input type="hidden" name="overdriveId" value="<?php echo $this->_tpl_vars['overDriveId']; ?>
"/>
			<input type="hidden" name="formatId" value="<?php echo $this->_tpl_vars['formatId']; ?>
"/>
			<label for="loanPeriod"><?php echo translate(array('text' => "How long would you like to checkout this title?"), $this);?>
</label>
			<select name="loanPeriod" id="loanPeriod">
				<?php $_from = $this->_tpl_vars['loanPeriods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['loanPeriod']):
?>
					<option value="<?php echo $this->_tpl_vars['loanPeriod']; ?>
"><?php echo $this->_tpl_vars['loanPeriod']; ?>
 days</option>
				<?php endforeach; endif; unset($_from); ?>
			</select> 
			<input type="submit" name="submit" value="Check Out" onclick="return checkoutOverDriveItemStep2('<?php echo $this->_tpl_vars['overDriveId']; ?>
', '<?php echo $this->_tpl_vars['formatId']; ?>
')"/>
		</div>
	</form>
</div>