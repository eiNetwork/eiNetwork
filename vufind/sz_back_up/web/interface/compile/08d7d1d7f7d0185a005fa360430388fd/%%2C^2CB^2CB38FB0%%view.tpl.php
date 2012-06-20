<?php /* Smarty version 2.6.19, created on 2012-06-20 13:53:42
         compiled from Record/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/view.tpl', 2, false),array('modifier', 'trim', 'Record/view.tpl', 60, false),array('modifier', 'lower', 'Record/view.tpl', 90, false),array('modifier', 'regex_replace', 'Record/view.tpl', 90, false),array('modifier', 'formatISBN', 'Record/view.tpl', 240, false),array('modifier', 'stripTags', 'Record/view.tpl', 437, false),array('modifier', 'truncate', 'Record/view.tpl', 437, false),array('function', 'translate', 'Record/view.tpl', 35, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['addThis'] )): ?>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js?pub=<?php echo ((is_array($_tmp=$this->_tpl_vars['addThis'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"></script>
<?php endif; ?>
<script type="text/javascript">
<?php echo '$(document).ready(function(){'; ?>

	GetHoldingsInfo('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
');
	<?php if ($this->_tpl_vars['isbn'] || $this->_tpl_vars['upc']): ?>
		GetEnrichmentInfo('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['isbn10'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['upc'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
');
	<?php endif; ?>
	<?php if ($this->_tpl_vars['isbn']): ?>
		GetReviewInfo('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['isbn'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
');
	<?php endif; ?>
	<?php if ($this->_tpl_vars['enablePospectorIntegration'] == 1): ?>
		GetProspectorInfo('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
');
	<?php endif; ?>
	<?php if ($this->_tpl_vars['user']): ?>
		redrawSaveStatus();
	<?php endif; ?>
	
	<?php if (( isset ( $this->_tpl_vars['title'] ) )): ?>
		alert("<?php echo $this->_tpl_vars['title']; ?>
");
	<?php endif; ?>
<?php echo '});'; ?>


function redrawSaveStatus() <?php echo '{'; ?>

		getSaveStatus('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', 'saveLink');
<?php echo '}'; ?>

</script>

<div id="page-content" class="content">
	<?php if ($this->_tpl_vars['error']): ?><p class="error"><?php echo $this->_tpl_vars['error']; ?>
</p><?php endif; ?> 
	<div id="left-bar">
		<div class="sidegroup" id="series">
		<?php if ($this->_tpl_vars['series']): ?>
		<div class="left-bar-lable"><?php echo translate(array('text' => 'Series'), $this);?>
:</div>
			<?php $_from = $this->_tpl_vars['series']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seriesItem']):
        $this->_foreach['loop']['iteration']++;
?>
					<div class="left-bar-value"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?lookfor=%22<?php echo ((is_array($_tmp=$this->_tpl_vars['seriesItem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
%22&amp;type=Series"><?php echo ((is_array($_tmp=$this->_tpl_vars['seriesItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		</div>
		<div class="sidegroup" id="subjects">
		<?php if ($this->_tpl_vars['subjects']): ?>
			<div class="left-bar-lable"><?php echo translate(array('text' => 'Subjects'), $this);?>
</div>
				<div class="left-bar-value">
				<?php $_from = $this->_tpl_vars['subjects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subject']):
        $this->_foreach['loop']['iteration']++;
?>
					<?php $_from = $this->_tpl_vars['subject']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subjectPart']):
        $this->_foreach['subloop']['iteration']++;
?>
						<?php if (! ($this->_foreach['subloop']['iteration'] <= 1)): ?> -- <?php endif; ?>
						<a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?lookfor=%22<?php echo ((is_array($_tmp=$this->_tpl_vars['subjectPart']['search'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
%22&amp;basicType=Subject"><?php echo ((is_array($_tmp=$this->_tpl_vars['subjectPart']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
					<?php endforeach; endif; unset($_from); ?>
					<br />
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endif; ?>
		</div>
		
		<div class="sidegroup" id="titleDetailsSidegroup" style="display:none">
			<h4><?php echo translate(array('text' => 'Title Details'), $this);?>
</h4>
					<?php if ($this->_tpl_vars['mainAuthor']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Main Author'), $this);?>
:</div>
					<div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mainAuthor'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mainAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['corporateAuthor']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Corporate Author'), $this);?>
:</div>
					<div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>a></div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['contributors']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Contributors'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['contributors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contributor']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contributor'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contributor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['published']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Published'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['published']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['publish']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['publish'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['streetDate']): ?>
						<div class="sidebarLabel"><?php echo translate(array('text' => 'Street Date'), $this);?>
:</div>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['streetDate'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endif; ?>
					
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Format'), $this);?>
:</div>
					<?php if (is_array ( $this->_tpl_vars['recordFormat'] )): ?>
					 <?php $_from = $this->_tpl_vars['recordFormat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['displayFormat']):
        $this->_foreach['loop']['iteration']++;
?>
						 <div class="sidebarValue"><span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['displayFormat'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['displayFormat']), $this);?>
</span></div>
					 <?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<div class="sidebarValue"><span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['recordFormat'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['recordFormat']), $this);?>
</span></div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['mpaaRating']): ?>
						<div class="sidebarLabel"><?php echo translate(array('text' => 'Rating'), $this);?>
:</div>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['mpaaRating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['physicalDescriptions']): ?>
			<div class="sidebarLabel"><?php echo translate(array('text' => 'Physical Desc'), $this);?>
:</div>
				<?php $_from = $this->_tpl_vars['physicalDescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['physicalDescription']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['physicalDescription'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
					
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Language'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['recordLanguage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endforeach; endif; unset($_from); ?>
					
					<?php if ($this->_tpl_vars['editionsThis']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Edition'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['editionsThis']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['edition']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['edition'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['isbns']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'ISBN'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['isbns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmpIsbn']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['tmpIsbn'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['issn']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'ISSN'), $this);?>
:</div>
						<div class="sidebarValue"><?php echo $this->_tpl_vars['issn']; ?>
</div>
						<?php if ($this->_tpl_vars['goldRushLink']): ?>
				<div class="sidebarValue"><a href='<?php echo $this->_tpl_vars['goldRushLink']; ?>
' target='_blank'>Check for online articles</a></div>
			<?php endif; ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['upc']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'UPC'), $this);?>
:</div>
					<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['upc'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['series']): ?>
					<div class="sidebarLabel"><?php echo translate(array('text' => 'Series'), $this);?>
:</div>
					<?php $_from = $this->_tpl_vars['series']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seriesItem']):
        $this->_foreach['loop']['iteration']++;
?>
						<div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?lookfor=%22<?php echo ((is_array($_tmp=$this->_tpl_vars['seriesItem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
%22&amp;type=Series"><?php echo ((is_array($_tmp=$this->_tpl_vars['seriesItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['arData']): ?>
						<div class="sidebarLabel"><?php echo translate(array('text' => 'Accelerated Reader'), $this);?>
:</div>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['arData']['interestLevel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
						<div class="sidebarValue">Level <?php echo ((is_array($_tmp=$this->_tpl_vars['arData']['readingLevel'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['arData']['pointValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 Points</div>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['lexileScore']): ?>
						<div class="sidebarLabel"><?php echo translate(array('text' => 'Lexile Score'), $this);?>
:</div>
						<div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['lexileScore'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
					<?php endif; ?>
					
		</div>
		
		<?php if ($this->_tpl_vars['showTagging'] == 1): ?>
		<div class="sidegroup" id="tagsSidegroup" style="display:none">
			<h4><?php echo translate(array('text' => 'Tags'), $this);?>
</h4>
			<div id="tagList">
			<?php if ($this->_tpl_vars['tagList']): ?>
				<?php $_from = $this->_tpl_vars['tagList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tagLoop']['iteration']++;
?>
					<div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?tag=<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a> (<?php echo $this->_tpl_vars['tag']->cnt; ?>
)</div>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<div class="sidebarValue"><?php echo translate(array('text' => 'No Tags'), $this);?>
, <?php echo translate(array('text' => 'Be the first to tag this record'), $this);?>
!</div>
			<?php endif; ?>
			</div>
			<div class="sidebarValue">
				<a href="<?php echo $this->_tpl_vars['path']; ?>
/Resource/AddTag?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=VuFind" class="tool add"
					 onclick="GetAddTagForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'VuFind'); return false;"><?php echo translate(array('text' => 'Add Tag'), $this);?>
</a>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="sidegroup" id="similarTitlesSidegroup" style="display:none">
		 		 <div id="similarTitlePlaceholder"></div>
		 <?php if (is_array ( $this->_tpl_vars['similarRecords'] )): ?>
		 <div id="relatedTitles">
			<h4><?php echo translate(array('text' => 'Other Titles'), $this);?>
</h4>
			<ul class="similar">
				<?php $_from = $this->_tpl_vars['similarRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['similar']):
?>
				<li>
					<?php if (is_array ( $this->_tpl_vars['similar']['format'] )): ?>
						<span class="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['similar']['format'][0])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
">
					<?php else: ?>
						<span class="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['similar']['format'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
">
					<?php endif; ?>
					<a href="<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['similar']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['similar']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
					</span>
					<span style="font-size: 80%">
					<?php if ($this->_tpl_vars['similar']['author']): ?><br/><?php echo translate(array('text' => 'By'), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['similar']['author'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
					</span>
				</li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		 </div>
		 <?php endif; ?>
		</div>
		
		<div class="sidegroup" id="similarAuthorsSidegroup" style="display:none">
			<div id="similarAuthorPlaceholder"></div>
		</div>
		
		<?php if (is_array ( $this->_tpl_vars['editions'] ) && ! $this->_tpl_vars['showOtherEditionsPopup']): ?>
		<div class="sidegroup" id="otherEditionsSidegroup" style="display:none">
			<h4><?php echo translate(array('text' => 'Other Editions'), $this);?>
</h4>
				<?php $_from = $this->_tpl_vars['editions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['edition']):
?>
					<div class="sidebarLabel">
						<a href="<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['edition']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edition']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
					</div>
					<div class="sidebarValue">
					<?php if (is_array ( $this->_tpl_vars['edition']['format'] )): ?>
						<?php $_from = $this->_tpl_vars['edition']['format']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
							<span class="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['format'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo $this->_tpl_vars['format']; ?>
</span>
						<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<span class="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edition']['format'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo $this->_tpl_vars['edition']['format']; ?>
</span>
					<?php endif; ?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['edition']['edition'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

					<?php if ($this->_tpl_vars['edition']['publishDate']): ?>(<?php echo ((is_array($_tmp=$this->_tpl_vars['edition']['publishDate']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php endif; ?>
					</div>
				<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['enablePospectorIntegration'] == 1): ?>
		<div class="sidegroup">
				<div id="inProspectorPlaceholder"></div>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['linkToAmazon'] == 1 && $this->_tpl_vars['isbn']): ?>
		<div class="titledetails">
			<a href="http://amazon.com/dp/<?php echo smarty_modifier_formatISBN($this->_tpl_vars['isbn']); ?>
" class='amazonLink'> <?php echo translate(array('text' => 'View on Amazon'), $this);?>
</a>
		</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['classicId']): ?>
		<div id = "classicViewLink"><a href ="<?php echo $this->_tpl_vars['classicUrl']; ?>
/record=<?php echo ((is_array($_tmp=$this->_tpl_vars['classicId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" target="_blank">Classic View</a></div>
		<?php endif; ?>
	</div>
		</div>
	<div id="main-content" class="full-result-content">
            <div id="inner-main-content">
		
			<div id="record_record">
			<div id="record_record_up">
				<div class="recordcoverWrapper">

					<a href="<?php echo $this->_tpl_vars['bookCoverUrl']; ?>
">							
						<img alt="<?php echo translate(array('text' => 'Book Cover'), $this);?>
" class="recordcover" src="<?php echo $this->_tpl_vars['bookCoverUrl']; ?>
" />
					</a>
					<div id="goDeeperLink" class="godeeper" style="display:none">
						<a href="<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/GoDeeper" onclick="ajaxLightbox('<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/GoDeeper?lightbox', null,'5%', '90%', 50, '85%'); return false;">
						<img alt="<?php echo translate(array('text' => 'Go Deeper'), $this);?>
" src="<?php echo $this->_tpl_vars['path']; ?>
/images/deeper.png" class="godeeper_img" /></a>
					</div>
				</div>
				<div id="record_record_up_middle">
						<div id='recordTitle'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['recordTitleSubtitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
												<?php if ($this->_tpl_vars['mainAuthor']): ?>
							<div class="recordAuthor">
								<span class="resultLabel"></span>
								<span class="resultValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['mainAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mainAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span>
							</div>
						<?php endif; ?>
							
						<?php if ($this->_tpl_vars['corporateAuthor']): ?>
							<div class="recordAuthor">
								<span class="resultLabel"><?php echo translate(array('text' => 'Corporate Author'), $this);?>
:</span>
								<span class="resultValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span>
							</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showOtherEditionsPopup']): ?>
						<div id="otherEditionCopies">
							<div style="font-weight:bold"><a href="#" onclick="loadOtherEditionSummaries('<?php echo $this->_tpl_vars['id']; ?>
', false)"><?php echo translate(array('text' => 'Other Formats and Languages'), $this);?>
</a></div>
						</div>
						<?php endif; ?>
				</div>
				<div id="record_action_button">
					<div class="round-rectangle-button" id="add-to-cart" <?php if ($this->_tpl_vars['enableBookCart']): ?>onclick="sentToBag('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['recordTitleSubtitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', this);"<?php endif; ?>>
						<span class="action-img-span"><img id="add-to-cart-img" alt="add to cart" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" /></span>
						<span class="action-lable-span">add to cart</span>
					</div>
					<div class="round-rectangle-button" id="request-now">
						<span class="action-img-span"><img id="request-now-img" alt="request now" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/RequestNow.png" /></span>
						<span class="action-lable-span">request now</span>
					</div>
					<div class="round-rectangle-button" id="add-to-wish-list" onclick="getSaveToListForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'VuFind'); return false;">
						<span class="action-img-span"><img id="add-to-wish-list-img" alt="add to wish list" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToWishList.png" /></span>
						<span class="action-lable-span">add to wish list</span>
					</div>
					<div class="round-rectangle-button" id="find-in-library">
						<span class="action-img-span"><img id="find-in-library-img" alt="find in library" class="action-img" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" /></span>
						<span class="action-lable-span">find in library</span>
					</div>
				</div>
			</div>	
			<div id="record_record_down">
				<div id="book_format_options_lable">
					<b>Book Format Options</b>
				</div>
				<div class="Format_type">
					<?php if (is_array ( $this->_tpl_vars['recordFormat'] )): ?>
					<?php $_from = $this->_tpl_vars['recordFormat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
					<?php if ($this->_tpl_vars['format'] == 'Print Book'): ?> 
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/Book.png"/ alt="Print Book"></span>
					<?php elseif ($this->_tpl_vars['format'] == 'DVD'): ?>
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="DVD"></span>
					<?php elseif ($this->_tpl_vars['format'] == 'Music CD'): ?>
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/MusicCD.png"/ alt="Music CD"></span>
					<?php elseif ($this->_tpl_vars['format'] == "Blu-Ray"): ?>
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/BluRay.png"/ alt="Blu Ray"></span>
					<?php elseif ($this->_tpl_vars['format'] == 'Video Download'): ?>
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/VideoDownload.png"/ alt="Video Download"></span>
					<?php elseif ($this->_tpl_vars['format'] == "CD-ROM"): ?>
					<span class="format_img_span"><img class="format_img" src="/interface/themes/einetwork/images/Art/Materialicons/DVD.png"/ alt="Video Download"></span>
					<?php endif; ?>
					<span class="iconlabel" ><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>
</span>&nbsp;
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<span class="iconlabel"><?php echo translate(array('text' => $this->_tpl_vars['summFormats']), $this);?>
</span>
					<?php endif; ?>
				</div>
				
			</div>
		</div>
		
		
						<div id="record-details-column">
			<div id="record-details-header">
				<div id="holdingsSummaryPlaceholder" class="holdingsSummaryRecord"></div>
				
						
					<div class="clearer">&nbsp;</div>
		</div>
			
			<?php if ($this->_tpl_vars['summary']): ?>
			<div class="resultInformation">
				<div class="resultInformationLabel"><?php echo translate(array('text' => 'Description'), $this);?>
</div>
				<div class="recordDescription">
					<?php if (strlen ( $this->_tpl_vars['summary'] ) > 300): ?>
						<span id="shortSummary">
						<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summary'])) ? $this->_run_mod_handler('stripTags', true, $_tmp, '<b><p><i><em><strong><ul><li><ol>') : smarty_modifier_stripTags($_tmp, '<b><p><i><em><strong><ul><li><ol>')))) ? $this->_run_mod_handler('truncate', true, $_tmp, 300) : smarty_modifier_truncate($_tmp, 300)); ?>
						<a href='#' onclick='$("#shortSummary").slideUp();$("#fullSummary").slideDown()'>More</a>
						</span>
						<span id="fullSummary" style="display:none">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['summary'])) ? $this->_run_mod_handler('stripTags', true, $_tmp, '<b><p><i><em><strong><ul><li><ol>') : smarty_modifier_stripTags($_tmp, '<b><p><i><em><strong><ul><li><ol>')); ?>
						<a href='#' onclick='$("#shortSummary").slideDown();$("#fullSummary").slideUp()'>Less</a>
						</span>
					<?php else: ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['summary'])) ? $this->_run_mod_handler('stripTags', true, $_tmp, '<b><p><i><em><strong><ul><li><ol>') : smarty_modifier_stripTags($_tmp, '<b><p><i><em><strong><ul><li><ol>')); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
						<div class="resultInformation">
				<div class="resultInformationLabel"><?php echo translate(array('text' => 'Publish Reviews'), $this);?>
</div>
				<div class="recordSubjects">
					<div id = "staffReviewtab" >
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/view-staff-reviews.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
				</div>
			</div>
			<div class="resultInformation">
				<div class="resultInformationLabel"><?php echo translate(array('text' => 'Community Reviews'), $this);?>
</div>
				<div class="recordSubjects">
					<?php if ($this->_tpl_vars['showAmazonReviews'] || $this->_tpl_vars['showStandardReviews']): ?>
						<h4>Professional Reviews</h4>
						<div id='reviewPlaceholder'></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="resultInformation">
				<div class="resultInformationLabel">Details</div>
				<div class="recordSubjects">
					<table>
					<?php if ($this->_tpl_vars['published']): ?>
					<tr>
						<td class="details_lable">Publish</td>
						<td>
							<table>
								<?php $_from = $this->_tpl_vars['published']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['publish']):
        $this->_foreach['loop']['iteration']++;
?>
									<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['publish'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['edition']): ?>
					<tr>
						<td class="details_lable">Edition</td>
						<td>
							<table>
							<?php $_from = $this->_tpl_vars['editionsThis']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['edition']):
        $this->_foreach['loop']['iteration']++;
?>
								<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['edition'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
							<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['lang']): ?>
						<tr>
							<td class="details_lable"><?php echo translate(array('text' => 'Language'), $this);?>
</td>
							<td>
								<table>
								<?php $_from = $this->_tpl_vars['recordLanguage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
									<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['lang'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
								</table>
							</td>
						</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['physicalDescription']): ?>
					<tr>
						<td class="details_lable">Description</td>
						<td>
							<table>
								<?php $_from = $this->_tpl_vars['physicalDescriptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['physicalDescription']):
        $this->_foreach['loop']['iteration']++;
?>
									<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['physicalDescription'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['note']): ?>
					<tr>
					<td class="details_lable">Note</td>
					<td>
						<table>
							<?php $_from = $this->_tpl_vars['notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['note']):
?>
								<tr><td><?php echo $this->_tpl_vars['note']; ?>
</td></tr>
							<?php endforeach; endif; unset($_from); ?>
						</table>
					</td>
					</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['corporateAuthor']): ?>
					<tr>
					<td class="details_lable">Addit Author</td>
					<td>
						<table>
							<tr>
								<a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['corporateAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
							</tr>
						</table>
					</td>
					</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['contributors']): ?>
						<td><?php echo translate(array('text' => 'Contributors'), $this);?>
</td>
						<td>
							<table>
							<?php $_from = $this->_tpl_vars['contributors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contributor']):
        $this->_foreach['loop']['iteration']++;
?>
							<tr><td><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contributor'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contributor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td></tr>
							<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['tmpIsbn']): ?>
						<tr>
							<td class="details_lable">ISBN</td>
							<td>
								<table>
								<?php $_from = $this->_tpl_vars['isbns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmpIsbn']):
        $this->_foreach['loop']['iteration']++;
?>
									<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['tmpIsbn'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
								</table>
							</td>
						</tr>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['issn']): ?>
						<tr>
						<td class="details_lable"><?php echo translate(array('text' => 'ISSN'), $this);?>
</td>
						
						<td><?php echo $this->_tpl_vars['issn']; ?>
</td>
						</tr>
						<?php if ($this->_tpl_vars['goldRushLink']): ?>
						<tr>
							<td></td>
							<td><a href='<?php echo $this->_tpl_vars['goldRushLink']; ?>
' target='_blank'>Check for online articles</a></td>
						</tr>
						<?php endif; ?>
					<?php endif; ?>
					</table>
				</div>
			</div>
		</div>
	 
				<?php if ($this->_tpl_vars['showStrands']): ?>
			<div id="relatedTitleInfo" class="ui-tabs">
				<ul>
					<li><a href="#list-similar-titles">Similar Titles</a></li>
					<li><a href="#list-also-viewed">People who viewed this also viewed</a></li>
					<li><a id="list-series-tab" href="#list-series" style="display:none">Also in this series</a></li>
				</ul>
				
				<?php $this->assign('scrollerName', 'SimilarTitles'); ?>
				<?php $this->assign('wrapperId', "similar-titles"); ?>
				<?php $this->assign('scrollerVariable', 'similarTitleScroller'); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
				<?php $this->assign('scrollerName', 'AlsoViewed'); ?>
				<?php $this->assign('wrapperId', "also-viewed"); ?>
				<?php $this->assign('scrollerVariable', 'alsoViewedScroller'); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			
				<?php $this->assign('scrollerName', 'Series'); ?>
				<?php $this->assign('wrapperId', 'series'); ?>
				<?php $this->assign('scrollerVariable', 'seriesScroller'); ?>
				<?php $this->assign('fullListLink', ($this->_tpl_vars['path'])."/Record/".($this->_tpl_vars['id'])."/Series"); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			</div>
			<?php echo '
			<script type="text/javascript">
				var similarTitleScroller;
				var alsoViewedScroller;
				
				$(function() {
					$("#relatedTitleInfo").tabs();
					$("#moredetails-tabs").tabs();
					
					'; ?>

					<?php if ($this->_tpl_vars['defaultDetailsTab']): ?>
						$("#moredetails-tabs").tabs('select', '<?php echo $this->_tpl_vars['defaultDetailsTab']; ?>
');
					<?php endif; ?>
					
					similarTitleScroller = new TitleScroller('titleScrollerSimilarTitles', 'SimilarTitles', 'similar-titles');
					similarTitleScroller.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=strands:PROD-2&recordId=<?php echo $this->_tpl_vars['id']; ?>
&scrollerName=SimilarTitles', false);
		
					<?php echo '
					$(\'#relatedTitleInfo\').bind(\'tabsshow\', function(event, ui) {
						if (ui.index == 0) {
							similarTitleScroller.activateCurrentTitle();
						}else if (ui.index == 1) { 
							if (alsoViewedScroller == null){
								'; ?>

								alsoViewedScroller = new TitleScroller('titleScrollerAlsoViewed', 'AlsoViewed', 'also-viewed');
								alsoViewedScroller.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=strands:PROD-1&recordId=<?php echo $this->_tpl_vars['id']; ?>
&scrollerName=AlsoViewed', false);
							<?php echo '
							}else{
								alsoViewedScroller.activateCurrentTitle();
							}
						}
					});
				});
			</script>
			'; ?>

		<?php elseif ($this->_tpl_vars['showSimilarTitles']): ?>
			<div id="relatedTitleInfo" class="ui-tabs">
				<ul>
					<li><a href="#list-similar-titles">Similar Titles</a></li>
					<li><a id="list-series-tab" href="#list-series" style="display:none">Also in this series</a></li>
				</ul>
				
				<?php $this->assign('scrollerName', 'SimilarTitlesVuFind'); ?>
				<?php $this->assign('wrapperId', "similar-titles-vufind"); ?>
				<?php $this->assign('scrollerVariable', 'similarTitleVuFindScroller'); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				<?php $this->assign('scrollerName', 'Series'); ?>
				<?php $this->assign('wrapperId', 'series'); ?>
				<?php $this->assign('scrollerVariable', 'seriesScroller'); ?>
				<?php $this->assign('fullListLink', ($this->_tpl_vars['path'])."/Record/".($this->_tpl_vars['id'])."/Series"); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			</div>
			<?php echo '
			<script type="text/javascript">
				var similarTitleScroller;
				var alsoViewedScroller;
				
				$(function() {
					$("#relatedTitleInfo").tabs();
					$("#moredetails-tabs").tabs();
					
					'; ?>

					<?php if ($this->_tpl_vars['defaultDetailsTab']): ?>
						$("#moredetails-tabs").tabs('select', '<?php echo $this->_tpl_vars['defaultDetailsTab']; ?>
');
					<?php endif; ?>
					
					similarTitleVuFindScroller = new TitleScroller('titleScrollerSimilarTitles', 'SimilarTitles', 'similar-titles');
					similarTitleVuFindScroller.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=similarTitles&recordId=<?php echo $this->_tpl_vars['id']; ?>
&scrollerName=SimilarTitles', false);
		
					<?php echo '
					$(\'#relatedTitleInfo\').bind(\'tabsshow\', function(event, ui) {
						if (ui.index == 0) {
							similarTitleVuFindScroller.activateCurrentTitle();
						}
					});
				});
			</script>
			'; ?>

		<?php else: ?>
			<div id="relatedTitleInfo" style="display:none">
				
				<?php $this->assign('scrollerName', 'Series'); ?>
				<?php $this->assign('wrapperId', 'series'); ?>
				<?php $this->assign('scrollerVariable', 'seriesScroller'); ?>
				<?php $this->assign('fullListLink', ($this->_tpl_vars['path'])."/Record/".($this->_tpl_vars['id'])."/Series"); ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			</div>
			
		<?php endif; ?>
		
		<div id="moredetails-tabs">
						<ul>
				<li><a href="#holdingstab"><?php echo translate(array('text' => 'Copies'), $this);?>
</a></li>
				<?php if ($this->_tpl_vars['notes']): ?>
					<li><a href="#notestab"><?php echo translate(array('text' => 'Notes'), $this);?>
</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['showAmazonReviews'] || $this->_tpl_vars['showStandardReviews']): ?>
					<li><a href="#reviewtab"><?php echo translate(array('text' => 'Reviews'), $this);?>
</a></li>
				<?php endif; ?>
				<li><a href="#readertab"><?php echo translate(array('text' => 'Reader Comments'), $this);?>
</a></li>
				<li><a href="#citetab"><?php echo translate(array('text' => 'Citation'), $this);?>
</a></li>
				<li><a href="#stafftab"><?php echo translate(array('text' => 'Staff View'), $this);?>
</a></li>
			</ul>
			
						<?php if ($this->_tpl_vars['notes']): ?>
				<div id ="notestab">
					<ul class='notesList'>
					<?php $_from = $this->_tpl_vars['notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['note']):
?>
						<li><?php echo $this->_tpl_vars['note']; ?>
</li>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			<?php endif; ?>
			
			
			<div id="reviewtab">
				<div id = "staffReviewtab" >
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/view-staff-reviews.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
				 
				<?php if ($this->_tpl_vars['showAmazonReviews'] || $this->_tpl_vars['showStandardReviews']): ?>
				<h4>Professional Reviews</h4>
				<div id='reviewPlaceholder'></div>
				<?php endif; ?>
			</div>
			
			<?php if ($this->_tpl_vars['showComments'] == 1): ?>
				<div id = "readertab" >
					<div style ="font-size:12px;" class ="alignright" id="addReview"><span id="userreviewlink" class="add" onclick="$('#userreview<?php echo $this->_tpl_vars['shortId']; ?>
').slideDown();">Add a Review</span></div>
					<div id="userreview<?php echo $this->_tpl_vars['shortId']; ?>
" class="userreview">
						<span class ="alignright unavailable closeReview" onclick="$('#userreview<?php echo $this->_tpl_vars['shortId']; ?>
').slideUp();" >Close</span>
						<div class='addReviewTitle'>Add your Review</div>
						<?php $this->assign('id', $this->_tpl_vars['id']); ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/submit-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/view-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
			<?php endif; ?>
			
			<div id = "citetab" >
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/cite.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			
			<div id = "stafftab">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['staffDetails'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			
			<div id = "holdingstab">
		<?php if ($this->_tpl_vars['internetLinks']): ?>
		<h3><?php echo translate(array('text' => 'Internet'), $this);?>
</h3>
		<?php $_from = $this->_tpl_vars['internetLinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['internetLink']):
?>
		<?php if ($this->_tpl_vars['proxy']): ?>
		<a href="<?php echo $this->_tpl_vars['proxy']; ?>
/login?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['internetLink']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['internetLink']['linkText'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><br/>
		<?php else: ?>
		<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['internetLink']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['internetLink']['linkText'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><br/>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
				<div id="holdingsPlaceholder"></div>
				<?php if ($this->_tpl_vars['enablePurchaseLinks'] == 1 && ! $this->_tpl_vars['purchaseLinks']): ?>
					<div class='purchaseTitle'><a href="#" onclick="return showPurchaseOptions('<?php echo $this->_tpl_vars['id']; ?>
');"><?php echo translate(array('text' => 'Buy a Copy'), $this);?>
</a></div>
				<?php endif; ?>
				
			</div>
		</div> 		
		<?php echo '
		<script type="text/javascript">
			$(function() {
				$("#moredetails-tabs").tabs();
			});
		</script>
		'; ?>

            </div>
	</div>
        <div id="right-bar">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/right-bar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
</div>

<?php if ($this->_tpl_vars['showStrands']): ?>
<?php echo '
<!-- Event definition to be included in the body before the Strands js library -->
<script type="text/javascript">
if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}
StrandsTrack.push({
	 event:"visited",
	 item: "'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo '"
});
</script>
'; ?>

<?php endif; ?>