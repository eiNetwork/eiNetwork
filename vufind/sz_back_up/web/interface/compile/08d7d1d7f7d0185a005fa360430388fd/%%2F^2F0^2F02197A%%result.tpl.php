<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:32
         compiled from RecordDrivers/Econtent/result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'RecordDrivers/Econtent/result.tpl', 1, false),array('modifier', 'regex_replace', 'RecordDrivers/Econtent/result.tpl', 3, false),array('modifier', 'truncate', 'RecordDrivers/Econtent/result.tpl', 35, false),array('modifier', 'highlight', 'RecordDrivers/Econtent/result.tpl', 35, false),array('modifier', 'lower', 'RecordDrivers/Econtent/result.tpl', 67, false),array('function', 'translate', 'RecordDrivers/Econtent/result.tpl', 10, false),)), $this); ?>
<div id="record<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultsList">
	<div class="selectTitle">
		<input type="checkbox" name="selected[econtentRecord<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
]" id="selectedEcontentRecord<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" <?php if ($this->_tpl_vars['enableBookCart']): ?>onclick="toggleInBag('econtentRecord<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summTitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:'\")$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:'\")$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', this);"<?php endif; ?> />&nbsp;
	</div>
	
	<div class="imageColumn"> 
		<?php if (! isset ( $this->_tpl_vars['user']->disableCoverArt ) || $this->_tpl_vars['user']->disableCoverArt != 1): ?>	
		<div id='descriptionPlaceholder<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' style='display:none'></div>
		<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" id="descriptionTrigger<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
		<img src="<?php echo $this->_tpl_vars['bookCoverUrl']; ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
		</a>
		<?php endif; ?>
				<div class='requestThisLink' id="placeEcontentHold<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
			<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
		</div>
		
				<div class='checkoutLink' id="checkout<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
			<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Checkout"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/checkout.png" alt="Checkout"/></a>
		</div>
		
				<div class='accessOnlineLink' id="accessOnline<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
			<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Home?detail=holdingstab#detailsTab"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/access_online.png" alt="Access Online"/></a>
		</div>
				<div class='addToWishListLink' id="addToWishList<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
			<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/AddToWishList"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/add_to_wishlist.png" alt="Access Online"/></a>
		</div>
	</div>

<div class="resultDetails">
	<div class="resultItemLine1">
	<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" class="title"><?php if (! ((is_array($_tmp=$this->_tpl_vars['summTitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", ""))): ?><?php echo translate(array('text' => 'Title not available'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summTitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
<?php endif; ?></a>
	<?php if ($this->_tpl_vars['summTitleStatement']): ?>
		<div class="searchResultSectionInfo">
			<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summTitleStatement'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>

		</div>
		<?php endif; ?>
	</div>

	<div class="resultItemLine2">
		<?php if ($this->_tpl_vars['summAuthor']): ?>
			<?php echo translate(array('text' => 'by'), $this);?>

			<?php if (is_array ( $this->_tpl_vars['summAuthor'] )): ?>
				<?php $_from = $this->_tpl_vars['summAuthor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['author']):
?>
					<a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['summAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['summAuthor'])) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
			<?php endif; ?>
		<?php endif; ?>
 
		<?php if ($this->_tpl_vars['summDate']): ?><?php echo translate(array('text' => 'Published'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['summDate']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
	</div>
	
	<div class="resultItemLine3">
		<?php if (! empty ( $this->_tpl_vars['summSnippetCaption'] )): ?><b><?php echo translate(array('text' => $this->_tpl_vars['summSnippetCaption']), $this);?>
:</b><?php endif; ?>
		<?php if (! empty ( $this->_tpl_vars['summSnippet'] )): ?><span class="quotestart">&#8220;</span>...<?php echo ((is_array($_tmp=$this->_tpl_vars['summSnippet'])) ? $this->_run_mod_handler('highlight', true, $_tmp) : smarty_modifier_highlight($_tmp)); ?>
...<span class="quoteend">&#8221;</span><br /><?php endif; ?>
	</div>

	<?php if (is_array ( $this->_tpl_vars['summFormats'] )): ?>
		<?php echo ''; ?><?php $_from = $this->_tpl_vars['summFormats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['formatLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['formatLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['format']):
        $this->_foreach['formatLoop']['iteration']++;
?><?php echo ''; ?><?php if (($this->_foreach['formatLoop']['iteration']-1) != 0): ?><?php echo ', '; ?><?php endif; ?><?php echo '<span class="iconlabel '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['format'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?><?php echo '">'; ?><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?><?php echo '</span>'; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

	<?php else: ?>
		<span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summFormats'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['summFormats']), $this);?>
</span>
	<?php endif; ?>
	<div id = "holdingsEContentSummary<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="holdingsSummary">
		<div class="statusSummary" id="statusSummary<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
			<span class="unknown" style="font-size: 8pt;"><?php echo translate(array('text' => 'Loading'), $this);?>
...</span>
		</div>
	</div>
</div>

<div id ="searchStars<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultActions">
	<div class="rateEContent<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 stat">
		<div class="statVal">
			<span class="ui-rater">
				<span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
				(<span class="ui-rater-rateCount-<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ui-rater-rateCount">0</span>)
			</span>
		</div>
		<div id="saveLink<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
			<?php if ($this->_tpl_vars['user']): ?>
				<div id="lists<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></div>
				<script type="text/javascript">
					getSaveStatuses('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
				</script>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['showFavorites'] == 1): ?> 
				<a href="<?php echo $this->_tpl_vars['path']; ?>
/Resource/Save?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=eContent" style="padding-left:8px;" onclick="getSaveToListForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'eContent'); return false;"><?php echo translate(array('text' => 'Add to'), $this);?>
 <span class='myListLabel'>MyLIST</span></a>
			<?php endif; ?>
		</div>
		<?php $this->assign('id', $this->_tpl_vars['summId']); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "EcontentRecord/title-review.tpl", 'smarty_include_vars' => array('id' => $this->_tpl_vars['summId'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<script type="text/javascript">
		$(
			 function() <?php echo ' { '; ?>

					 $('.rateEContent<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: 'EcontentRecord', recordId: <?php echo $this->_tpl_vars['summId']; ?>
,	rating:0.0, postHref: '<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
			 <?php echo ' } '; ?>

		);
	</script>
		
</div>


<script type="text/javascript">
	addRatingId('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', 'eContent');
	addIdToStatusList('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', <?php if (strcasecmp ( $this->_tpl_vars['source'] , 'OverDrive' ) == 0): ?>'OverDrive'<?php else: ?>'eContent'<?php endif; ?>);
	$(document).ready(function()<?php echo ' { '; ?>

		resultDescription('<?php echo $this->_tpl_vars['summId']; ?>
','<?php echo $this->_tpl_vars['summId']; ?>
', 'eContent');
	<?php echo ' }); '; ?>

	
</script>

</div>