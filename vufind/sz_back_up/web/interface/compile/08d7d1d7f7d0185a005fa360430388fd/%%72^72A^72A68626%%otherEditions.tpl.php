<?php /* Smarty version 2.6.19, created on 2012-06-18 17:09:31
         compiled from Resource/otherEditions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Resource/otherEditions.tpl', 3, false),array('function', 'img', 'Resource/otherEditions.tpl', 21, false),array('modifier', 'regex_replace', 'Resource/otherEditions.tpl', 10, false),array('modifier', 'escape', 'Resource/otherEditions.tpl', 10, false),array('modifier', 'formatISBN', 'Resource/otherEditions.tpl', 14, false),array('modifier', 'truncate', 'Resource/otherEditions.tpl', 27, false),array('modifier', 'highlight', 'Resource/otherEditions.tpl', 27, false),)), $this); ?>
<div onmouseup="this.style.cursor='default';" id="popupboxHeader" class="header">
	<a onclick="hideLightbox(); return false;" href="">close</a>
	<?php echo translate(array('text' => 'Other Editions'), $this);?>

</div>
<div id="popupboxContent" class="content">
	<?php if (is_array ( $this->_tpl_vars['otherEditions'] )): ?>
		<div id="otherEditionsPopup">
			<?php $_from = $this->_tpl_vars['otherEditions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['resource']):
        $this->_foreach['recordLoop']['iteration']++;
?>
				<div class="result <?php if (( $this->_foreach['recordLoop']['iteration'] % 2 ) == 0): ?>alt<?php endif; ?>">
					<div id="record<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultsList">
						<div class="imageColumn"> 
							 <?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>
							 <a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strtoupper ( $this->_tpl_vars['resource']->source ) == 'VUFIND'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" id="descriptionTrigger<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
								<img src="<?php echo $this->_tpl_vars['path']; ?>
/bookcover.php?id=<?php echo $this->_tpl_vars['resource']->record_id; ?>
&amp;isn=<?php echo smarty_modifier_formatISBN($this->_tpl_vars['resource']->isbn); ?>
&amp;size=small&amp;upc=<?php echo $this->_tpl_vars['resource']->upc; ?>
&amp;category=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->format_category)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
								</a>
								<div id='descriptionPlaceholder<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' style='display:none'></div>
							 <?php endif; ?>
								
																<div class='requestThisLink' id="placeHold<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
									<a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strtoupper ( $this->_tpl_vars['resource']->source ) == 'VUFIND'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo smarty_function_img(array('filename' => "place_hold.png"), $this);?>
" alt="Place Hold"/></a>
								</div>
						</div>
					
						<div class="resultDetails">
							<div class="resultItemLine1">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strtoupper ( $this->_tpl_vars['resource']->source ) == 'VUFIND'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="title"><?php if (! $this->_tpl_vars['resource']->title): ?><?php echo translate(array('text' => 'Title not available'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->title)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
<?php endif; ?></a>
							</div>
						
							<div class="resultItemLine2">
								<?php if ($this->_tpl_vars['resource']->author): ?>
									<?php echo translate(array('text' => 'by'), $this);?>

									<a href="<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->author)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->author)) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
								<?php endif; ?>
							</div>
						
							<?php if (is_array ( $this->_tpl_vars['resource']->format )): ?>
								<?php $_from = $this->_tpl_vars['resource']->format; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
									<span><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>
</span>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<span><?php echo translate(array('text' => $this->_tpl_vars['resource']->format), $this);?>
</span>
							<?php endif; ?>
							
							<?php if ($this->_tpl_vars['resource']->source == 'eContent'): ?>
							<div id = "holdingsEContentSummary<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="holdingsSummary">
								<div class="statusSummary" id="statusSummary<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
									<span class="unknown" style="font-size: 8pt;"><?php echo translate(array('text' => 'Loading'), $this);?>
...</span>
								</div>
							</div>
							<?php else: ?>
							<div id = "holdingsSummary<?php echo $this->_tpl_vars['resource']->shortId; ?>
" class="holdingsSummary">
								<div class="statusSummary" id="statusSummary<?php echo $this->_tpl_vars['resource']->shortId; ?>
">
									<span class="unknown" style="font-size: 8pt;"><?php echo translate(array('text' => 'Loading'), $this);?>
...</span>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; else: ?>
				Sorry, we couldn't find any other copies of this title in different languages or formats.  
			<?php endif; unset($_from); ?>
		</div>
	<?php endif; ?>
</div>
<script type="text/javascript">
<?php $_from = $this->_tpl_vars['otherEditions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['resource']):
?>
	addIdToStatusList('<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', '<?php echo $this->_tpl_vars['resource']->source; ?>
');
	resultDescription('<?php echo $this->_tpl_vars['resource']->record_id; ?>
','<?php echo $this->_tpl_vars['resource']->shortId; ?>
', '<?php echo $this->_tpl_vars['resource']->source; ?>
');
<?php endforeach; endif; unset($_from); ?>
	doGetStatusSummaries();
</script>