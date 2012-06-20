<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:36
         compiled from MyResearch/home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/home.tpl', 7, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/overdrive.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/scripts.js"></script>
<div data-role="page" id="MyResearch-checkedout">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div data-role="content">
		<?php if ($this->_tpl_vars['user']->cat_username): ?>
			<h3><?php echo translate(array('text' => 'My Account'), $this);?>
</h3>
			<h4>Print Titles</h4>
			<div data-role="controlgroup">
				<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/CheckedOut" data-role="button" rel="external"><?php echo translate(array('text' => 'Checked Out Items'), $this);?>
<?php if ($this->_tpl_vars['profile']['numCheckedOut']): ?> (<?php echo $this->_tpl_vars['profile']['numCheckedOut']; ?>
)<?php endif; ?></a>
				<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Holds" data-role="button" rel="external"><?php echo translate(array('text' => 'Available Holds'), $this);?>
<?php if ($this->_tpl_vars['profile']['numHoldsAvailable']): ?> (<?php echo $this->_tpl_vars['profile']['numHoldsAvailable']; ?>
)<?php endif; ?></a>
      	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Holds" data-role="button" rel="external"><?php echo translate(array('text' => 'Unavailable Holds'), $this);?>
<?php if ($this->_tpl_vars['profile']['numHoldsRequested']): ?> (<?php echo $this->_tpl_vars['profile']['numHoldsRequested']; ?>
)<?php endif; ?></a>
			</div>
			<h4>eContent Titles</h4>
			<div data-role="controlgroup">
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/EContentCheckedOut" data-role="button" rel="external"><?php echo translate(array('text' => 'Checked Out Items'), $this);?>
 (<?php echo $this->_tpl_vars['profile']['numEContentCheckedOut']; ?>
)</a>
	    	<?php if ($this->_tpl_vars['hasProtectedEContent']): ?>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/EContentHolds" data-role="button" rel="external"><?php echo translate(array('text' => 'Available Holds'), $this);?>
 (<?php echo $this->_tpl_vars['profile']['numEContentAvailableHolds']; ?>
)</a>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/EContentHolds" data-role="button" rel="external"><?php echo translate(array('text' => 'Unavailable Holds'), $this);?>
 (<?php echo $this->_tpl_vars['profile']['numEContentUnavailableHolds']; ?>
)</a>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/MyEContentWishlist" data-role="button" rel="external"><?php echo translate(array('text' => 'Wish List'), $this);?>
 (<?php echo $this->_tpl_vars['profile']['numEContentWishList']; ?>
)</a>
	    	<?php endif; ?>
	    </div>
	    <h4>OverDrive Titles</h4>
	    <div data-role="controlgroup">
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/OverdriveCheckedOut" data-role="button" rel="external"><?php echo translate(array('text' => 'Checked Out Items'), $this);?>
 (<span id="checkedOutItemsOverDrivePlaceholder">?</span>)</a>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/OverdriveHolds" data-role="button" rel="external"><?php echo translate(array('text' => 'Available Holds'), $this);?>
 (<span id="availableHoldsOverDrivePlaceholder">?</span>)</a>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/OverdriveHolds" data-role="button" rel="external"><?php echo translate(array('text' => 'Unavailable Holds'), $this);?>
 (<span id="unavailableHoldsOverDrivePlaceholder">?</span>)</a>
	    	<a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/OverdriveWishList" data-role="button" rel="external"><?php echo translate(array('text' => 'Wish List'), $this);?>
 (<span id="wishlistOverDrivePlaceholder">?</span>)</a>
	    </div>
		<?php else: ?>
			You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
		<?php endif; ?>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<script type="text/javascript">
getOverDriveSummary();
</script>