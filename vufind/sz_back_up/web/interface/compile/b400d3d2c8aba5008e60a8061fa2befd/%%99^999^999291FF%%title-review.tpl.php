<?php /* Smarty version 2.6.19, created on 2012-06-18 17:25:41
         compiled from EcontentRecord/title-review.tpl */ ?>
<div style ="font-size:12px;" class ="alignright"><span id="userecontentreviewlink<?php echo $this->_tpl_vars['id']; ?>
" class="add" onclick="$('.userecontentreview').slideUp();$('#userecontentreview<?php echo $this->_tpl_vars['id']; ?>
').slideDown();">Add a Review</span></div>
<div id="userecontentreview<?php echo $this->_tpl_vars['id']; ?>
" class="userreview">
	<span class ="alignright unavailable closeReview" onclick="$('#userecontentreview<?php echo $this->_tpl_vars['id']; ?>
').slideUp();" >Close</span>
	<div class='addReviewTitle'>Add your Review</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "EcontentRecord/submit-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>