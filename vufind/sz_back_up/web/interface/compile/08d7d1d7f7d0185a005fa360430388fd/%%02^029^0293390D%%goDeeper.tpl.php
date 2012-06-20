<?php /* Smarty version 2.6.19, created on 2012-06-18 13:31:22
         compiled from Record/goDeeper.tpl */ ?>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="header">
	<a onclick="hideLightbox(); return false;" href="">close</a>
	<?php echo $this->_tpl_vars['title']; ?>

</div>
<div id="popupboxContent" class="content">
		<div id='goDeeperContent'>
	<div id='goDeeperLinks'>
	<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dataAction'] => $this->_tpl_vars['option']):
?>
	<div class='goDeeperLink'><a href='#' onclick="getGoDeeperData('<?php echo $this->_tpl_vars['dataAction']; ?>
', '<?php echo $this->_tpl_vars['id']; ?>
', '<?php echo $this->_tpl_vars['isbn']; ?>
', '<?php echo $this->_tpl_vars['upc']; ?>
');return false;"><?php echo $this->_tpl_vars['option']; ?>
</a></div>
	<?php endforeach; endif; unset($_from); ?>
	</div>
	<div id='goDeeperOutput'><?php echo $this->_tpl_vars['defaultGoDeeperData']; ?>
</div>
	</div>
	<div id='goDeeperEnd'>&nbsp;</div>
</div>