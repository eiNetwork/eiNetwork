<?php /* Smarty version 2.6.19, created on 2012-06-18 17:22:57
         compiled from Record/title-review.tpl */ ?>
<div style ="font-size:12px;" class ="alignright"><span id="userreviewlink<?php echo $this->_tpl_vars['shortId']; ?>
" class="add userreviewlink" onclick="$('.userreview').slideUp();$('#userreview<?php echo $this->_tpl_vars['shortId']; ?>
').slideDown();">Add a Review</span></div>
<div id="userreview<?php echo $this->_tpl_vars['shortId']; ?>
" class="userreview">
  <span class ="alignright unavailable closeReview" onclick="$('#userreview<?php echo $this->_tpl_vars['shortId']; ?>
').slideUp();" >Close</span>
  <div class='addReviewTitle'>Add your Review</div>
  
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/submit-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>