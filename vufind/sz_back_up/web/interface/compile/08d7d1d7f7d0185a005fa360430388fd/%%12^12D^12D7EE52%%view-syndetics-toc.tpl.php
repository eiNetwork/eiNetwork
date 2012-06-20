<?php /* Smarty version 2.6.19, created on 2012-06-18 14:05:55
         compiled from Record/view-syndetics-toc.tpl */ ?>
<div class='tableOfContents'>
<?php $_from = $this->_tpl_vars['tocData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chapter']):
?>
<div class='tocEntry'>
<span class='tocLabel'><?php echo $this->_tpl_vars['chapter']['label']; ?>
</span>
<span class='tocTitle'><?php echo $this->_tpl_vars['chapter']['title']; ?>
</span>
<span class='tocPage'><?php echo $this->_tpl_vars['chapter']['page']; ?>
</span>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>