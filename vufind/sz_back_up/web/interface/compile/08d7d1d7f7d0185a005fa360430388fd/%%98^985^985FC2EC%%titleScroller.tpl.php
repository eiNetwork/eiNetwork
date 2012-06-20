<?php /* Smarty version 2.6.19, created on 2012-06-20 13:53:48
         compiled from titleScroller.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'titleScroller.tpl', 5, false),array('function', 'img', 'titleScroller.tpl', 24, false),)), $this); ?>
<div id="list-<?php echo $this->_tpl_vars['wrapperId']; ?>
" <?php if ($this->_tpl_vars['display'] == 'false'): ?>style="display:none"<?php endif; ?> class="titleScroller">
	<div id="<?php echo $this->_tpl_vars['wrapperId']; ?>
" class="titleScrollerWrapper">
		<?php if ($this->_tpl_vars['scrollerTitle'] || $this->_tpl_vars['Links']): ?>
		<div id="list-<?php echo $this->_tpl_vars['wrapperId']; ?>
Header" class="titleScrollerHeader">
			<span class="listTitle resultInformationLabel"><?php if ($this->_tpl_vars['scrollerTitle']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['scrollerTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php endif; ?></span>
			
      
			<?php if ($this->_tpl_vars['Links']): ?>
				<?php $_from = $this->_tpl_vars['Links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
					<div class='linkTab'>
						<a href='<?php echo $this->_tpl_vars['link']->link; ?>
'><span class='seriesLink'><?php echo $this->_tpl_vars['link']->name; ?>
</span></a>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			
		</div>
		<?php endif; ?>
		<div id="titleScroller<?php echo $this->_tpl_vars['scrollerName']; ?>
" class="titleScrollerBody">
			<div class="leftScrollerButton enabled" onclick="<?php echo $this->_tpl_vars['scrollerVariable']; ?>
.scrollToLeft();"></div>
			<div class="rightScrollerButton" onclick="<?php echo $this->_tpl_vars['scrollerVariable']; ?>
.scrollToRight();"></div>
			<div class="scrollerBodyContainer">
				<div class="scrollerBody" style="display:none"></div>
				<div class="scrollerLoadingContainer">
					<img id="scrollerLoadingImage<?php echo $this->_tpl_vars['scrollerName']; ?>
" class="scrollerLoading" src="<?php echo smarty_function_img(array('filename' => "loading_large.gif"), $this);?>
" alt="Loading..." />
				</div>
			</div>
			<div class="clearer"></div>
			<div id="titleScrollerSelectedTitle<?php echo $this->_tpl_vars['scrollerName']; ?>
" class="titleScrollerSelectedTitle"></div>
			<div id="titleScrollerSelectedAuthor<?php echo $this->_tpl_vars['scrollerName']; ?>
" class="titleScrollerSelectedAuthor"></div>
		</div>    
	</div>
</div>