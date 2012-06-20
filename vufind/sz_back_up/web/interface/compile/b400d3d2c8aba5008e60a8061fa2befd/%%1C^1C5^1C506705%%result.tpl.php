<?php /* Smarty version 2.6.19, created on 2012-06-20 11:37:02
         compiled from RecordDrivers/Index/result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'RecordDrivers/Index/result.tpl', 1, false),array('modifier', 'regex_replace', 'RecordDrivers/Index/result.tpl', 3, false),array('modifier', 'truncate', 'RecordDrivers/Index/result.tpl', 22, false),array('modifier', 'highlight', 'RecordDrivers/Index/result.tpl', 22, false),array('function', 'translate', 'RecordDrivers/Index/result.tpl', 10, false),)), $this); ?>
<div id="record<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" class="resultsList">
<div class="selectTitle">
  <input type="checkbox" class="titleSelect" name="selected[<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>]" id="selected<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['enableBookCart']): ?>onclick="toggleInBag('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summTitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', this);"<?php endif; ?> />&nbsp;
</div>
        
<div class="imageColumn"> 
    <?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>  
    <div id='descriptionPlaceholder<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>' style='display:none'></div>
    <a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" id="descriptionTrigger<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>">
    <img src="<?php echo $this->_tpl_vars['bookCoverUrl']; ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
    </a>
    <?php endif; ?>
        <div class='requestThisLink' id="placeHold<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" style="display:none">
      <a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
    </div>
</div>

<div class="resultDetails">
  <div class="resultItemLine1">
  <?php if ($this->_tpl_vars['summScore']): ?>(<?php echo $this->_tpl_vars['summScore']; ?>
) <?php endif; ?>
	<a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Home?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
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
          <a href="<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
      <?php else: ?>
        <a href="<?php echo $this->_tpl_vars['url']; ?>
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
    <?php $_from = $this->_tpl_vars['summFormats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
      <span class="iconlabel" ><?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>
</span>&nbsp;
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <span class="iconlabel"><?php echo translate(array('text' => $this->_tpl_vars['summFormats']), $this);?>
</span>
  <?php endif; ?>
  <div id = "holdingsSummary<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" class="holdingsSummary">
    <div class="statusSummary" id="statusSummary<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>">
      <span class="unknown" style="font-size: 8pt;"><?php echo translate(array('text' => 'Loading'), $this);?>
...</span>
    </div>
  </div>
</div>

<div id ="searchStars<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" class="resultActions">
  <div class="rate<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?> stat">
	  <div class="statVal">
	    <span class="ui-rater">
	      <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
	      (<span class="ui-rater-rateCount-<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?> ui-rater-rateCount">0</span>)
	    </span>
	  </div>
    <div id="saveLink<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>">
      <?php if ($this->_tpl_vars['user']): ?>
      	<div id="lists<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>"></div>
    		<script type="text/javascript">
    		  getSaveStatuses('<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>');
    		</script>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['showFavorites'] == 1): ?> 
        <a href="<?php echo $this->_tpl_vars['url']; ?>
/Resource/Save?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=VuFind" style="padding-left:8px;" onclick="getSaveToListForm('<?php echo $this->_tpl_vars['summId']; ?>
', 'VuFind'); return false;"><?php echo translate(array('text' => 'Add to'), $this);?>
 <span class='myListLabel'>MyLIST</span></a>
      <?php endif; ?>
    </div>
    <?php $this->assign('id', $this->_tpl_vars['summId']); ?>
    <?php $this->assign('shortId', $this->_tpl_vars['summShortId']); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/title-review.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <script type="text/javascript">
    $(
       function() <?php echo ' { '; ?>

           $('.rate<?php if ($this->_tpl_vars['summShortId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summShortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>').rater(<?php echo '{ '; ?>
module: 'Record', recordId: '<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>',  rating:0.0, postHref: '<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
       <?php echo ' } '; ?>

    );
  </script>
    
</div>


<script type="text/javascript">
  addRatingId('<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>');
  addIdToStatusList('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');
  $(document).ready(function()<?php echo ' { '; ?>

  	resultDescription('<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>','<?php echo $this->_tpl_vars['summId']; ?>
');
  <?php echo ' }); '; ?>

  
</script>

</div>