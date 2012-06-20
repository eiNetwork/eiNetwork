<?php /* Smarty version 2.6.19, created on 2012-06-14 15:14:37
         compiled from ei_tpl/result.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'ei_tpl/result.tpl', 1, false),array('modifier', 'regex_replace', 'ei_tpl/result.tpl', 22, false),array('modifier', 'truncate', 'ei_tpl/result.tpl', 22, false),array('modifier', 'highlight', 'ei_tpl/result.tpl', 22, false),array('function', 'translate', 'ei_tpl/result.tpl', 9, false),)), $this); ?>
<div id="record<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" class="resultsList">
        
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
  <div class="result_middle">
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
      <?php echo translate(array('text' => ''), $this);?>

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
      </div>
  
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "/usr/local/VuFind-Plus/vufind/web/interface/themes/einetwork/ei_tpl/formatType.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
    <div class="view_details" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
        <span class="resultAction_img_span"><img alt="view_details" src="/interface/themes/einetwork/images/Art/ActionIcons/ViewDetails.png" class="resultAction_img"></span>
        <span class="resultAction_span"><a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Home?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" class="view_details_a">view details</a></span>
    </div>
    <div class="add_to_cart" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)" name="selected[<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>]" id="selected<?php if ($this->_tpl_vars['summShortId']): ?><?php echo $this->_tpl_vars['summShortId']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['enableBookCart']): ?>onclick="sentToBag('<?php echo ((is_array($_tmp=$this->_tpl_vars['summId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['summTitle'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
', this);"<?php endif; ?>>
        <span class="resultAction_img_span"><img alt="add_to_cart" src="/interface/themes/einetwork/images/Art/ActionIcons/AddToCart.png" class="resultAction_img"></span>
        <span class="resultAction_span" >add to cart</span>
    </div>
    <div class="more_like_this" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
	<span class="resultAction_img_span"><img alt="more like this" src="/interface/themes/einetwork/images/Art/ActionIcons/MoreLikeThis.png" class="resultAction_img"></span>
        <span class="resultAction_span" name="more_like_this" >more like this</span>
    </div>
    <div class="bad_result" onmousemove="mouseOver_normal(event)" onmouseout="mouseOut_normal(event)">
	<span class="resultAction_img_span"><img alt="bad result" src="/interface/themes/einetwork/images/Art/ActionIcons/BadResult.png" class="resultAction_img"></span>
        <span class="resultAction_span" name="bad_reuslt_this" >bad result</span>
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
</div>
</div>