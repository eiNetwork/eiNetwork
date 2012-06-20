<?php /* Smarty version 2.6.19, created on 2012-06-19 10:50:15
         compiled from Record/view-syndetics-av-summary.tpl */ ?>
<div class='avSummaryTitle'>Summary</div>
<div class='summary'><?php echo $this->_tpl_vars['avSummaryData']['summary']; ?>
</div>

<div class='avSummaryTitle'>Track Listing</div>
<div class='trackListing'>
<?php $_from = $this->_tpl_vars['avSummaryData']['trackListing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['track']):
?>
<div class='track'>
<span class='trackNumber'><?php echo $this->_tpl_vars['track']['number']; ?>
</span>
<span class='trackName'><?php echo $this->_tpl_vars['track']['name']; ?>
</span>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>