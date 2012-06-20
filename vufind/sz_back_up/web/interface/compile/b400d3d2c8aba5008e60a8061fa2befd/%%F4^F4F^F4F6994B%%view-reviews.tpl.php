<?php /* Smarty version 2.6.19, created on 2012-06-19 10:21:04
         compiled from Record/view-reviews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Record/view-reviews.tpl', 26, false),)), $this); ?>
<?php $index = 0; ?>
<?php $_from = $this->_tpl_vars['reviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['provider'] => $this->_tpl_vars['providerList']):
?>
  <?php $_from = $this->_tpl_vars['providerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['review']):
?>
	
  	
    <?php if ($this->_tpl_vars['review']['Content']): ?>
    <div class='review'>
      <?php if ($this->_tpl_vars['review']['Source']): ?>
	      <div class='reviewSource'><?php echo $this->_tpl_vars['review']['Source']; ?>
</div>
	    <?php endif; ?>
	    <div id = 'review<?php $index ++;echo $index; ?>'>
	    <?php if ($this->_tpl_vars['review']['Teaser']): ?>
	       <div class="reviewTeaser" id="reviewTeaser<?php echo $index; ?>">
	       <?php echo $this->_tpl_vars['review']['Teaser']; ?>
 <span onclick="$('#reviewTeaser<?php echo $index; ?>').hide();$('#reviewContent<?php echo $index; ?>').show();" class='reviewMoreLink'>(more)</span>
	       </div>
         <div class="reviewTeaser" id="reviewContent<?php echo $index; ?>" style='display:none'>
         <?php echo $this->_tpl_vars['review']['Content']; ?>

         <span onclick="$('#reviewTeaser<?php echo $index; ?>').show();$('#reviewContent<?php echo $index; ?>').hide();" class='reviewMoreLink'> (less)</span>
         </div>
	    <?php else: ?>
	       <div class="reviewContent"><?php echo $this->_tpl_vars['review']['Content']; ?>
</div>
	    <?php endif; ?>
	    <div class='reviewCopyright'><?php echo $this->_tpl_vars['review']['Copyright']; ?>
</div>
	    
	    <?php if ($this->_tpl_vars['provider'] == 'amazon' || $this->_tpl_vars['provider'] == 'amazoneditorial'): ?>
	      <div class='reviewProvider'><a target="new" href="http://amazon.com/dp/<?php echo $this->_tpl_vars['isbn']; ?>
"><?php echo translate(array('text' => 'Supplied by Amazon'), $this);?>
</a></div>
	    <?php elseif ($this->_tpl_vars['provider'] == 'syndetics'): ?>
	      <div class='reviewProvider'><?php echo translate(array('text' => 'Powered by Syndetics'), $this);?>
</div>
	    <?php endif; ?>
    </div>
    <?php endif; ?>
    </div>
    <hr/>
  <?php endforeach; endif; unset($_from); ?>
<?php endforeach; else: ?>
<?php echo translate(array('text' => 'No reviews were found for this record'), $this);?>
.
<?php endif; unset($_from); ?>