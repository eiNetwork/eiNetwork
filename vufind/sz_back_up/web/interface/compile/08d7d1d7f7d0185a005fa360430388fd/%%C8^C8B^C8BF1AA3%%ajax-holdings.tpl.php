<?php /* Smarty version 2.6.19, created on 2012-06-14 15:38:52
         compiled from Record/ajax-holdings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/ajax-holdings.tpl', 16, false),)), $this); ?>
<Holdings><![CDATA[
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/view-holdings.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
]]></Holdings>
<HoldingsSummary><![CDATA[
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/holdingsSummary.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
]]></HoldingsSummary>
<ShowPlaceHold><?php echo $this->_tpl_vars['holdingsSummary']['showPlaceHold']; ?>
</ShowPlaceHold>
<ShowCheckout><?php echo $this->_tpl_vars['holdingsSummary']['showCheckout']; ?>
</ShowCheckout>
<?php if (isset ( $this->_tpl_vars['holdingsSummary']['showAccessOnline'] )): ?>
<ShowAccessOnline><?php echo $this->_tpl_vars['holdingsSummary']['showAccessOnline']; ?>
</ShowAccessOnline>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['holdingsSummary']['showAddToWishlist'] )): ?>
<ShowAddToWishlist><?php echo $this->_tpl_vars['holdingsSummary']['showAddToWishlist']; ?>
</ShowAddToWishlist>
<?php endif; ?>
<SummaryDetails>
	<status><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</status>
	<callnumber><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['callnumber'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</callnumber>
	<showplacehold><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['showPlaceHold'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</showplacehold>
	<availablecopies><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['availableCopies'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</availablecopies>
	<holdablecopies><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['holdableCopies'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</holdablecopies>
	<numcopies><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['numCopies'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</numcopies>
	<class><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['class'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</class>
	<isDownloadable><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['isDownloadable'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</isDownloadable>
	<downloadLink><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['downloadLink'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
</downloadLink>
	<downloadText><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['downloadText'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</downloadText>
	<showAvailabilityLine><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['showAvailabilityLine'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</showAvailabilityLine>
	<availableAt><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['availableAt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</availableAt>
	<numAvailableOther><?php echo ((is_array($_tmp=$this->_tpl_vars['holdingsSummary']['numAvailableOther'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</numAvailableOther>
</SummaryDetails>