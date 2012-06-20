<?php /* Smarty version 2.6.19, created on 2012-06-19 17:00:56
         compiled from RecordDrivers/Resource/listentry.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'RecordDrivers/Resource/listentry.tpl', 1, false),array('modifier', 'escape', 'RecordDrivers/Resource/listentry.tpl', 1, false),array('modifier', 'formatISBN', 'RecordDrivers/Resource/listentry.tpl', 9, false),array('modifier', 'truncate', 'RecordDrivers/Resource/listentry.tpl', 22, false),array('modifier', 'highlight', 'RecordDrivers/Resource/listentry.tpl', 22, false),array('modifier', 'lower', 'RecordDrivers/Resource/listentry.tpl', 41, false),array('function', 'translate', 'RecordDrivers/Resource/listentry.tpl', 9, false),array('function', 'img', 'RecordDrivers/Resource/listentry.tpl', 16, false),)), $this); ?>
<div id="record<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultsList">
	<div class="selectTitle">
		<input type="checkbox" name="selected[<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
]" id="selected<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" />&nbsp;
	</div>
				
	<div class="imageColumn"> 
		 <?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>
		 <a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if ($this->_tpl_vars['resource']->source == 'VuFind'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
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
/<?php if ($this->_tpl_vars['resource']->source == 'VuFind'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo smarty_function_img(array('filename' => "place_hold.png"), $this);?>
" alt="Place Hold"/></a>
			</div>
	</div>

	<div class="resultDetails">
		<div class="resultItemLine1">
		<a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if ($this->_tpl_vars['resource']->source == 'VuFind'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="title"><?php if (! $this->_tpl_vars['resource']->title): ?><?php echo translate(array('text' => 'Title not available'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->title)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
<?php endif; ?></a>
		<?php if ($this->_tpl_vars['listTitleStatement']): ?>
			<div class="searchResultSectionInfo">
				<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['listTitleStatement'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>

			</div>
			<?php endif; ?>
		</div>
	
		<div class="resultItemLine2">
			<?php if ($this->_tpl_vars['resource']->author): ?>
				<?php echo translate(array('text' => 'by'), $this);?>

				<a href="<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->author)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->author)) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
			<?php endif; ?>
	 
			<?php if ($this->_tpl_vars['listDate']): ?><?php echo translate(array('text' => 'Published'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['listDate']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
		</div>
	
		<?php if (is_array ( $this->_tpl_vars['listFormats'] )): ?>
			<?php $_from = $this->_tpl_vars['listFormats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
				<span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['format'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>
</span>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			<span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['listFormats'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['listFormats']), $this);?>
</span>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['listTags']): ?>
					<?php echo translate(array('text' => 'Your Tags'), $this);?>
:
					<?php $_from = $this->_tpl_vars['listTags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tagLoop']['iteration']++;
?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
/Search/Results?tag=<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a><?php if (! ($this->_foreach['tagLoop']['iteration'] == $this->_foreach['tagLoop']['total'])): ?>,<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['listNotes']): ?>
					<?php echo translate(array('text' => 'Notes'), $this);?>
: 
					<?php $_from = $this->_tpl_vars['listNotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['note']):
?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['note'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<br />
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
		
		<div id = "holdingsSummary<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="holdingsSummary">
			<div class="statusSummary" id="statusSummary<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
				<span class="unknown" style="font-size: 8pt;"><?php echo translate(array('text' => 'Loading'), $this);?>
...</span>
			</div>
		</div>
	</div>

	<div id ="searchStars<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->shortId)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultActions">
		<div class="rate<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 stat">
			<div id="saveLink<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
				<?php if ($this->_tpl_vars['allowEdit']): ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/Edit?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php if (! is_null ( $this->_tpl_vars['listSelected'] )): ?>&amp;list_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['listSelected'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
<?php endif; ?>&amp;source=<?php echo $this->_tpl_vars['resource']->source; ?>
" class="edit tool"><?php echo translate(array('text' => 'Edit'), $this);?>
</a>
												<a
						<?php if (is_null ( $this->_tpl_vars['listSelected'] )): ?>
							href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/Home?delete=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&src=<?php echo $this->_tpl_vars['resource']->source; ?>
"
						<?php else: ?>
							href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/MyList/<?php echo ((is_array($_tmp=$this->_tpl_vars['listSelected'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?delete=<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&src=<?php echo $this->_tpl_vars['resource']->source; ?>
"
						<?php endif; ?>
						class="delete tool" onclick="return confirm('Are you sure you want to delete this?');"><?php echo translate(array('text' => 'Delete'), $this);?>
</a>
				<?php endif; ?>
			</div>
			<div class="statVal">
				<span class="ui-rater">
					<span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
					(<span class="ui-rater-rateCount-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ui-rater-rateCount">0</span>)
				</span>
			</div>
			<?php $this->assign('id', $this->_tpl_vars['resource']->record_id); ?>
			<?php $this->assign('shortId', $this->_tpl_vars['resource']->shortId); ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/title-review.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
		</div>
		<script type="text/javascript">
			$(
				 function() <?php echo ' { '; ?>

						 $('.rate<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: '<?php if ($this->_tpl_vars['resource']->source == 'VuFind'): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>', recordId: '<?php echo $this->_tpl_vars['resource']->record_id; ?>
',	rating:0.0, postHref: '<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
				 <?php echo ' } '; ?>

			);
		</script>
			
	</div>
	<script type="text/javascript">
		addRatingId('<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
		$(document).ready(function()<?php echo ' { '; ?>

			addIdToStatusList('<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', '<?php echo $this->_tpl_vars['resource']->source; ?>
');
			resultDescription('<?php echo $this->_tpl_vars['resource']->record_id; ?>
','<?php echo ((is_array($_tmp=$this->_tpl_vars['resource']->record_id)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\./", "") : smarty_modifier_regex_replace($_tmp, "/\./", "")); ?>
', '<?php echo $this->_tpl_vars['resource']->source; ?>
');
		<?php echo ' }); '; ?>

	</script>
</div>
