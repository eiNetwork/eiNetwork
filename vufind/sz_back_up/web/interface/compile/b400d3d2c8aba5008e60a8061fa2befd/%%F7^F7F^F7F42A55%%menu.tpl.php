<?php /* Smarty version 2.6.19, created on 2012-06-18 17:22:57
         compiled from MyResearch/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/menu.tpl', 4, false),)), $this); ?>
<?php echo '<div class="sidegroup">'; ?><?php if ($this->_tpl_vars['user'] != false): ?><?php echo '<h4>'; ?><?php echo translate(array('text' => 'Your Account'), $this);?><?php echo '</h4><div id="profileMessages">'; ?><?php if ($this->_tpl_vars['profile']['finesval'] > 0): ?><?php echo '<div class ="alignright"><span title="Please Contact your local library to pay fines or Charges." style="color:red; font-weight:bold;" onclick="alert(\'Please Contact your local library to pay fines or Charges.\')">Your account has '; ?><?php echo $this->_tpl_vars['profile']['fines']; ?><?php echo ' in fines.</span>'; ?><?php if ($this->_tpl_vars['showEcommerceLink'] && $this->_tpl_vars['profile']['finesval'] > $this->_tpl_vars['minimumFineAmount']): ?><?php echo '<a href=\''; ?><?php echo $this->_tpl_vars['ecommerceLink']; ?><?php echo '\' ><br/>Click to Pay Fines Online</a>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['profile']['expireclose']): ?><?php echo '<a class ="alignright" title="Please contact your local library to have your library card renewed." style="color:green; font-weight:bold;" onclick="alert(\'Please Contact your local library to have your library card renewed.\')" href="#">Your library card will expire on '; ?><?php echo $this->_tpl_vars['profile']['expires']; ?><?php echo '.</a>'; ?><?php endif; ?><?php echo '</div><div id="myAccountLinks"><div class="myAccountLink">Print Titles<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "checkedout.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/CheckedOut">'; ?><?php echo translate(array('text' => 'Checked Out Items'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['profile']['numCheckedOut']): ?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numCheckedOut']; ?><?php echo ')'; ?><?php endif; ?><?php echo '</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "holds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/Holds">'; ?><?php echo translate(array('text' => 'Available Holds'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['profile']['numHoldsAvailable']): ?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numHoldsAvailable']; ?><?php echo ')'; ?><?php endif; ?><?php echo '</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "holds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/Holds">'; ?><?php echo translate(array('text' => 'Unavailable Holds'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['profile']['numHoldsRequested']): ?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numHoldsRequested']; ?><?php echo ')'; ?><?php endif; ?><?php echo '</a></div></div><div class="myAccountLink">eContent Titles<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "eContentCheckedOut.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/EContentCheckedOut">'; ?><?php echo translate(array('text' => 'Checked Out Items'), $this);?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numEContentCheckedOut']; ?><?php echo ')</a></div>'; ?><?php if ($this->_tpl_vars['hasProtectedEContent']): ?><?php echo '<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "eContentHolds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/EContentHolds">'; ?><?php echo translate(array('text' => 'Available Holds'), $this);?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numEContentAvailableHolds']; ?><?php echo ')</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "eContentHolds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/EContentHolds">'; ?><?php echo translate(array('text' => 'Unavailable Holds'), $this);?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numEContentUnavailableHolds']; ?><?php echo ')</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "eContentWishList.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/MyEContentWishlist">'; ?><?php echo translate(array('text' => 'Wish List'), $this);?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numEContentWishList']; ?><?php echo ')</a></div>'; ?><?php endif; ?><?php echo '</div><div class="myAccountLink">OverDrive Titles<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "overDriveCheckedOut.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/OverdriveCheckedOut">'; ?><?php echo translate(array('text' => 'Checked Out Items'), $this);?><?php echo ' (<span id="checkedOutItemsOverDrivePlaceholder">?</span>)</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "overDriveHolds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/OverdriveHolds">'; ?><?php echo translate(array('text' => 'Available Holds'), $this);?><?php echo ' (<span id="availableHoldsOverDrivePlaceholder">?</span>)</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "overDriveHolds.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/OverdriveHolds">'; ?><?php echo translate(array('text' => 'Unavailable Holds'), $this);?><?php echo ' (<span id="unavailableHoldsOverDrivePlaceholder">?</span>)</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "overDriveWishList.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/OverdriveWishList">'; ?><?php echo translate(array('text' => 'Wish List'), $this);?><?php echo ' (<span id="wishlistOverDrivePlaceholder">?</span>)</a></div></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "favorites.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/Favorites">'; ?><?php echo translate(array('text' => 'Suggestions, Lists &amp; Tags'), $this);?><?php echo '</a></div><div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "readingHistory.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/ReadingHistory">'; ?><?php echo translate(array('text' => 'My Reading History'), $this);?><?php echo '</a></div>'; ?><?php if ($this->_tpl_vars['showFines']): ?><?php echo '<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "fines.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '" title="Fines and account messages"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/Fines">'; ?><?php echo translate(array('text' => 'Fines and Messages'), $this);?><?php echo '</a></div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['enableMaterialsRequest']): ?><?php echo '<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "myMaterialRequests.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '" title="Materials Requests"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MaterialsRequest/MyRequests">'; ?><?php echo translate(array('text' => 'Materials Requests'), $this);?><?php echo ' ('; ?><?php echo $this->_tpl_vars['profile']['numMaterialsRequests']; ?><?php echo ')</a></div>'; ?><?php endif; ?><?php echo '<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['pageTemplate'] == "profile.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/MyResearch/Profile">'; ?><?php echo translate(array('text' => 'Profile'), $this);?><?php echo '</a></div>'; ?><?php echo '<div class="myAccountLink'; ?><?php if ($this->_tpl_vars['user'] && $this->_tpl_vars['pageTemplate'] == "history.tpl"): ?><?php echo ' active'; ?><?php endif; ?><?php echo '"><a href="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/Search/History?require_login">'; ?><?php echo translate(array('text' => 'history_saved_searches'), $this);?><?php echo '</a></div></div>'; ?><?php endif; ?><?php echo '</div>'; ?>

<script type="text/javascript">
getOverDriveSummary();
</script>