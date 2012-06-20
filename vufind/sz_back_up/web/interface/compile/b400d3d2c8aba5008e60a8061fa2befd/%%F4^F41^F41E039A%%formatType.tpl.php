<?php /* Smarty version 2.6.19, created on 2012-06-15 09:30:43
         compiled from /usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', '/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl', 17, false),)), $this); ?>
<div class="Format_type">
        <?php if (is_array ( $this->_tpl_vars['summFormats'] )): ?>
        <?php $_from = $this->_tpl_vars['summFormats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
    	<?php if ($this->_tpl_vars['format'] == 'Print Book'): ?> 
    	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
	<?php elseif ($this->_tpl_vars['format'] == 'DVD'): ?>
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
	<?php elseif ($this->_tpl_vars['format'] == 'Music CD'): ?>
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
	<?php elseif ($this->_tpl_vars['format'] == "Blu-Ray"): ?>
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
	<?php elseif ($this->_tpl_vars['format'] == 'Video Download'): ?>
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
	<?php elseif ($this->_tpl_vars['format'] == "CD-ROM"): ?>
	<span><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="Video Download"></span>
    	<?php endif; ?>
    	<span class="iconlabel" ><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>
</span>&nbsp;
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
    	<span class="iconlabel"><?php echo translate(array('text' => $this->_tpl_vars['summFormats']), $this);?>
</span>
        <?php endif; ?>
    </div>