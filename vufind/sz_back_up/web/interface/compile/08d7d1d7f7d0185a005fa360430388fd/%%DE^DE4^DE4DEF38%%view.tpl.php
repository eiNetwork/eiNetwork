<?php /* Smarty version 2.6.19, created on 2012-06-14 17:05:46
         compiled from EcontentRecord/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'EcontentRecord/view.tpl', 3, false),array('modifier', 'lower', 'EcontentRecord/view.tpl', 60, false),array('modifier', 'regex_replace', 'EcontentRecord/view.tpl', 60, false),array('modifier', 'replace', 'EcontentRecord/view.tpl', 195, false),array('modifier', 'formatISBN', 'EcontentRecord/view.tpl', 224, false),array('modifier', 'truncate', 'EcontentRecord/view.tpl', 232, false),array('function', 'translate', 'EcontentRecord/view.tpl', 34, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/services/EcontentRecord/ajax.js"></script>
<?php if (! empty ( $this->_tpl_vars['addThis'] )): ?>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js?pub=<?php echo ((is_array($_tmp=$this->_tpl_vars['addThis'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"></script>
<?php endif; ?>
<script type="text/javascript">
<?php echo '$(document).ready(function(){'; ?>

	GetEContentHoldingsInfo('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
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
	  //alert("<?php echo $this->_tpl_vars['title']; ?>
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
  <div id="sidebar">
    <div class="sidegroup" id="titleDetailsSidegroup">
      <h4><?php echo translate(array('text' => 'Title Details'), $this);?>
</h4>
    	<?php if ($this->_tpl_vars['eContentRecord']->author): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Main Author'), $this);?>
:</div>
          <div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->author)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->author)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
          <?php endif; ?>
          
          <?php if (count ( $this->_tpl_vars['additionalAuthorsList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Additional Authors'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['additionalAuthorsList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['additionalAuthorsListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['additionalAuthorsListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['additionalAuthorsListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['eContentRecord']->publisher): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Publisher'), $this);?>
:</div>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->publisher)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['eContentRecord']->publishDate): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Published'), $this);?>
:</div>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->publishDate)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endif; ?>
          
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Format'), $this);?>
:</div>
          <?php if (is_array ( $this->_tpl_vars['eContentRecord']->format() )): ?>
           <?php $_from = $this->_tpl_vars['eContentRecord']->format(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['displayFormat']):
        $this->_foreach['loop']['iteration']++;
?>
             <div class="sidebarValue"><span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['displayFormat'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['displayFormat']), $this);?>
</span></div>
           <?php endforeach; endif; unset($_from); ?>
          <?php else: ?>
            <div class="sidebarValue"><span class="iconlabel <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['eContentRecord']->format())) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[^a-z0-9]/", "") : smarty_modifier_regex_replace($_tmp, "/[^a-z0-9]/", "")); ?>
"><?php echo translate(array('text' => $this->_tpl_vars['eContentRecord']->format), $this);?>
</span></div>
          <?php endif; ?>
          
		  
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Language'), $this);?>
:</div>
          <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->language)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          
          <?php if ($this->_tpl_vars['eContentRecord']->edition): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Edition'), $this);?>
:</div>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->edition)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endif; ?>

          <?php if (count ( $this->_tpl_vars['lccnList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'LCCN'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['lccnList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lccnListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['lccnListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>

          <?php if (count ( $this->_tpl_vars['isbnList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'ISBN'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['isbnList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['isbnListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['isbnListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>

          <?php if (count ( $this->_tpl_vars['issnList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'ISSN'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['issnList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['issnListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['issnListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
             
          <?php if (count ( $this->_tpl_vars['upcList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'UPC'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['upcList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['upcListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['upcListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
          
          <?php if (count ( $this->_tpl_vars['seriesList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Series'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['seriesList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seriesListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?lookfor=%22<?php echo ((is_array($_tmp=$this->_tpl_vars['seriesListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
%22&amp;type=Series"><?php echo ((is_array($_tmp=$this->_tpl_vars['seriesListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?> 
          
          <?php if (count ( $this->_tpl_vars['topicList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Topic'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['topicList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['topicListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['topicListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>       

          <?php if (count ( $this->_tpl_vars['genreList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Genre'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['genreList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['genreListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['genreListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>   

          <?php if (count ( $this->_tpl_vars['regionList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Region'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['regionList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['regionListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['regionListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>  

          <?php if (count ( $this->_tpl_vars['eraList'] ) > 0): ?>
          <div class="sidebarLabel"><?php echo translate(array('text' => 'Era'), $this);?>
:</div>
          <?php $_from = $this->_tpl_vars['eraList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['eraListItem']):
        $this->_foreach['loop']['iteration']++;
?>
            <div class="sidebarValue"><?php echo ((is_array($_tmp=$this->_tpl_vars['eraListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?> 
          
    </div>
    
    <?php if ($this->_tpl_vars['showTagging'] == 1): ?>
    <div class="sidegroup" id="tagsSidegroup">
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
&amp;source=eContent" class="tool add"
           onclick="GetAddTagForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'eContent'); return false;"><?php echo translate(array('text' => 'Add Tag'), $this);?>
</a>
      </div>
    </div>
    <?php endif; ?>
    
  	<div class="sidegroup" id="similarTitlesSidegroup">
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
    
    <div class="sidegroup" id="similarAuthorsSidegroup">
      <div id="similarAuthorPlaceholder"></div>
    </div>
    
    <?php if (is_array ( $this->_tpl_vars['editions'] ) && ! $this->_tpl_vars['showOtherEditionsPopup']): ?>
    <div class="sidegroup" id="otherEditionsSidegroup">
      <h4><?php echo translate(array('text' => 'Other Editions'), $this);?>
</h4>
        <?php $_from = $this->_tpl_vars['editions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['edition']):
?>
          <div class="sidebarLabel">
          	<?php if ($this->_tpl_vars['edition']['recordtype'] == 'econtentRecord'): ?>
          	<a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edition']['id'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'econtentRecord', '') : smarty_modifier_replace($_tmp, 'econtentRecord', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edition']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
          	<?php else: ?>
          	<a href="<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['edition']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['edition']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
          	<?php endif; ?>
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
  </div>   
  <div id="main-content" class="full-result-content">
    <div id="record-header">
      <?php if (isset ( $this->_tpl_vars['previousId'] )): ?>
        <div id="previousRecordLink"><a href="<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['previousType']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['previousId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['previousIndex']; ?>
&amp;page=<?php if (isset ( $this->_tpl_vars['previousPage'] )): ?><?php echo $this->_tpl_vars['previousPage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['page']; ?>
<?php endif; ?>" title="<?php if (! $this->_tpl_vars['previousTitle']): ?><?php echo translate(array('text' => 'Previous'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['previousTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")); ?>
<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/prev.png" alt="Previous Record"/></a></div>
      <?php endif; ?>
      <div id="recordTitleAuthorGroup">
                <div id='recordTitle'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['eContentRecord']->title)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
        <?php if ($this->_tpl_vars['user'] && $this->_tpl_vars['user']->hasRole('epubAdmin')): ?>
        <?php if ($this->_tpl_vars['eContentRecord']->status != 'active'): ?><span id="eContentStatus">(<?php echo $this->_tpl_vars['eContentRecord']->status; ?>
)</span><?php endif; ?>
        <span id="editEContentLink"><a href='<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['id']; ?>
/Edit'>(edit)</a></span>
        <?php if ($this->_tpl_vars['eContentRecord']->status != 'archived' && $this->_tpl_vars['eContentRecord']->status != 'deleted'): ?>
        	<span id="archiveEContentLink"><a href='<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['id']; ?>
/Archive' onclick="return confirm('Are you sure you want to archive this record?  The record should not have any holds or checkouts when it is archived.')">(archive)</a></span>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['eContentRecord']->status != 'deleted'): ?>
        	<span id="deleteEContentLink"><a href='<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['id']; ?>
/Delete' onclick="return confirm('Are you sure you want to delete this record?  The record should not have any holds or checkouts when it is deleted.')">(delete)</a></span>
        <?php endif; ?>
        <?php endif; ?>
        </div>
                <?php if ($this->_tpl_vars['eContentRecord']->author): ?>
          <div class="recordAuthor">
            <span class="resultLabel">by</span>
            <span class="resultValue"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->author)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->author)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span>
          </div>
        <?php endif; ?>
        
      </div>
      <div id ="recordTitleRight">
		    <?php if (isset ( $this->_tpl_vars['nextId'] )): ?>
		      <div id="nextRecordLink"><a href="<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['nextType']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['nextId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['nextIndex']; ?>
&amp;page=<?php if (isset ( $this->_tpl_vars['nextPage'] )): ?><?php echo $this->_tpl_vars['nextPage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['page']; ?>
<?php endif; ?>" title="<?php if (! $this->_tpl_vars['nextTitle']): ?><?php echo translate(array('text' => 'Next'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['nextTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")); ?>
<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/next.png" alt="Next Record"/></a></div>
		    <?php endif; ?>
      	<?php if ($this->_tpl_vars['lastsearch']): ?>
	      <div id="returnToSearch">
	      	<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastsearch'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
#record<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo translate(array('text' => 'Return to Search Results'), $this);?>
</a>
	      </div>
		    <?php endif; ?>
   	  </div>
   	</div>
      <div id="image-column">
      			<?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?> 
			 
        <div id = "recordcover">  
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
/images/deeper.png" /></a>
          </div>
        </div>
        </div>  
      <?php endif; ?>
      
      	  <div class='requestThisLink' id="placeHold<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
	    <a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
	  </div>
	  
	  	  <div class='checkoutLink' id="checkout<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
	    <a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Checkout"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/checkout.png" alt="Checkout"/></a>
	  </div>
	  
	  	  <div class='accessOnlineLink' id="accessOnline<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
	    <a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Home?detail=holdingstab#detailsTab"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/access_online.png" alt="Access Online"/></a>
	  </div>
	  
	  	  <div class='addToWishListLink' id="addToWishList<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
	    <a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/AddToWishList"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/add_to_wishlist.png" alt="Add To Wish List"/></a>
	  </div>
	  
	  <?php if ($this->_tpl_vars['showOtherEditionsPopup']): ?>
		<div id="otherEditionCopies">
			<div style="font-weight:bold"><a href="#" onclick="loadOtherEditionSummaries('<?php echo $this->_tpl_vars['id']; ?>
', true)"><?php echo translate(array('text' => 'Other Formats and Languages'), $this);?>
</a></div>
		</div>
		<?php endif; ?>

      <?php if ($this->_tpl_vars['goldRushLink']): ?>
      <div class ="titledetails">
        <a href='<?php echo $this->_tpl_vars['goldRushLink']; ?>
' >Check for online articles</a>
      </div>
      <?php endif; ?>
          
        
      <div id="myrating" class="stat">
	    <div class="statVal">
		  <div class="ui-rater">
		  	<span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:63px"></span></span>
	      </div>
        </div>
        <script type="text/javascript">
        $(
         function() <?php echo ' { '; ?>

             $('#myrating').rater(<?php echo '{ '; ?>
 module:'EcontentRecord', rating:'<?php if ($this->_tpl_vars['user']): ?><?php echo $this->_tpl_vars['ratingData']['user']; ?>
<?php else: ?><?php echo $this->_tpl_vars['ratingData']['average']; ?>
<?php endif; ?>', recordId: '<?php echo $this->_tpl_vars['id']; ?>
', postHref: '<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['id']; ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
         <?php echo ' } '; ?>

	    );
        </script>
      </div>
    </div>     
    <div id="record-details-column">
      <div id="record-details-header">
	      <div id="holdingsSummaryPlaceholder" class="holdingsSummaryRecord">Loading...</div>
	      <?php if ($this->_tpl_vars['enableProspectorIntegration'] == 1): ?>
	      <div id="prospectorHoldingsPlaceholder"></div>
	      <?php endif; ?>
	      <div id="recordTools">
		    <ul>
		      
		      <?php if (! $this->_tpl_vars['tabbedDetails']): ?>
		        <li><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Cite" class="cite" id="citeLink" onclick='ajaxLightbox("<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/Cite?lightbox", "#citeLink"); return false;'><?php echo translate(array('text' => 'Cite this'), $this);?>
</a></li>
		      <?php endif; ?>
		      <?php if ($this->_tpl_vars['showTextThis'] == 1): ?>
		        <li><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/SMS" class="sms" id="smsLink" onclick="ajaxLightbox('<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/SMS?lightbox', '#citeLink'); return false;"><?php echo translate(array('text' => 'Text this'), $this);?>
</a></li>
		      <?php endif; ?>
		      <?php if ($this->_tpl_vars['showEmailThis'] == 1): ?>
		        <li><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Email" class="mail" id="mailLink" onclick="ajaxLightbox('<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/Email?lightbox', '#citeLink'); return false;"><?php echo translate(array('text' => 'Email this'), $this);?>
</a></li>
		      <?php endif; ?>
		      <?php if (is_array ( $this->_tpl_vars['exportFormats'] ) && count ( $this->_tpl_vars['exportFormats'] ) > 0): ?>
		        <li>
		          <a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Export?style=<?php echo ((is_array($_tmp=$this->_tpl_vars['exportFormats']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="export" onclick="toggleMenu('exportMenu'); return false;"><?php echo translate(array('text' => 'Export Record'), $this);?>
</a><br />
		          <ul class="menu" id="exportMenu">
		            <?php $_from = $this->_tpl_vars['exportFormats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['exportFormat']):
?>
		              <li><a <?php if ($this->_tpl_vars['exportFormat'] == 'RefWorks'): ?> <?php endif; ?>href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Export?style=<?php echo ((is_array($_tmp=$this->_tpl_vars['exportFormat'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo translate(array('text' => 'Export to'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['exportFormat'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
		            <?php endforeach; endif; unset($_from); ?>
		          </ul>
		        </li>
		      <?php endif; ?>
		      <?php if ($this->_tpl_vars['showFavorites'] == 1): ?>
		        <li id="saveLink"><a href="<?php echo $this->_tpl_vars['path']; ?>
/Resource/Save?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=eContent" class="fav" onclick="getSaveToListForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'eContent'); return false;"><?php echo translate(array('text' => 'Add to favorites'), $this);?>
</a></li>
		      <?php endif; ?>
		      <?php if (! empty ( $this->_tpl_vars['addThis'] )): ?>
		        <li id="addThis"><a class="addThis addthis_button"" href="https://www.addthis.com/bookmark.php?v=250&amp;pub=<?php echo ((is_array($_tmp=$this->_tpl_vars['addThis'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo translate(array('text' => 'Bookmark'), $this);?>
</a></li>
		      <?php endif; ?>
		    </ul>
		  </div>
		  
      	  <div class="clearer">&nbsp;</div>
	  </div>
      
      <?php if ($this->_tpl_vars['eContentRecord']->description): ?>
      <div class="resultInformation">
        <div class="resultInformationLabel"><?php echo translate(array('text' => 'Description'), $this);?>
</div>
        <div class="recordDescription">
          <?php echo ((is_array($_tmp=$this->_tpl_vars['eContentRecord']->description)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        </div>
      </div>
      <?php endif; ?>
      
      <?php if (count ( $this->_tpl_vars['subjectList'] ) > 0): ?>
      <div class="resultInformation">
        <div class="resultInformationLabel"><?php echo translate(array('text' => 'Subjects'), $this);?>
</div>
        <div class="recordSubjects">
          <?php $_from = $this->_tpl_vars['subjectList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subjectListItem']):
        $this->_foreach['loop']['iteration']++;
?>
              <a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Results?lookfor=%22<?php echo ((is_array($_tmp=$this->_tpl_vars['subjectListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
%22&amp;type=Subject"><?php echo ((is_array($_tmp=$this->_tpl_vars['subjectListItem'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
            <br />
          <?php endforeach; endif; unset($_from); ?>
        </div>
      </div>
      <?php endif; ?>
      
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
		
		<a id="detailsTabAnchor" name="detailsTab" href="#detailsTab"></a>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/view-staff-reviews.tpl", 'smarty_include_vars' => array()));
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
          <div style ="font-size:12px;" class ="alignright" id="addReview"><span id="userreviewlink" class="add" onclick="$('#userreview<?php echo $this->_tpl_vars['id']; ?>
').slideDown();">Add a Review</span></div>
          <div id="userreview<?php echo $this->_tpl_vars['id']; ?>
" class="userreview">
            <span class ="alignright unavailable closeReview" onclick="$('#userreview<?php echo $this->_tpl_vars['id']; ?>
').slideUp();" >Close</span>
            <div class='addReviewTitle'>Add your Review</div>
            <?php $this->assign('id', $this->_tpl_vars['id']); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "EcontentRecord/submit-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </div>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "EcontentRecord/view-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          
										<?php if ($this->_tpl_vars['chiliFreshAccount'] && ( $this->_tpl_vars['isbn'] || $this->_tpl_vars['upc'] || $this->_tpl_vars['issn'] )): ?>
						<h4>Chili Fresh Reviews</h4>
						<?php if ($this->_tpl_vars['isbn']): ?>
						<div class="chili_review" id="isbn_<?php echo $this->_tpl_vars['isbn10']; ?>
"></div>
						<div id="chili_review_<?php echo $this->_tpl_vars['isbn10']; ?>
" style="display:none" align="center" width="100%"></div>
						<?php elseif ($this->_tpl_vars['upc']): ?>
						<div class="chili_review_<?php echo $this->_tpl_vars['upc']; ?>
" id="isbn"></div>
						<div id="chili_review_<?php echo $this->_tpl_vars['upc']; ?>
" style="display:none" align="center" width="100%"></div>
						<?php elseif ($this->_tpl_vars['issn']): ?>
						<div class="chili_review_<?php echo $this->_tpl_vars['issn']; ?>
" id="isbn"></div>
						<div id="chili_review_<?php echo $this->_tpl_vars['issn']; ?>
" style="display:none" align="center" width="100%"></div>
						<?php endif; ?>
					<?php endif; ?>
        </div>
      <?php endif; ?>
      
      <div id = "citetab" >
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/cite.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
      
      <div id = "holdingstab">
      	<div id="holdingsPlaceholder">Loading...</div>
      	<?php if ($this->_tpl_vars['showOtherEditionsPopup']): ?>
				<div id="otherEditionCopies">
					<div style="font-weight:bold"><a href="#" onclick="loadOtherEditionSummaries('<?php echo $this->_tpl_vars['id']; ?>
', true)"><?php echo translate(array('text' => 'Other Formats and Languages'), $this);?>
</a></div>
				</div>
				<?php endif; ?>
        <?php if ($this->_tpl_vars['enablePurchaseLinks'] == 1): ?>
					<div class='purchaseTitle button'><a href="#" onclick="return showEcontentPurchaseOptions('<?php echo $this->_tpl_vars['id']; ?>
');"><?php echo translate(array('text' => 'Buy a Copy'), $this);?>
</a></div>
				<?php endif; ?>
       <?php if ($this->_tpl_vars['eContentRecord']->sourceUrl): ?>
      	<div id="econtentSource">
      		<a href="<?php echo $this->_tpl_vars['eContentRecord']->sourceUrl; ?>
">Access original files</a>
      	</div>
      	<?php endif; ?>
      </div>
      
      <?php if ($this->_tpl_vars['eContentRecord']->marcRecord): ?>
        <div id = "stafftab">
        	<pre style="overflow:auto"><?php echo ''; ?><?php echo $this->_tpl_vars['eContentRecord']->marcRecord; ?><?php echo ''; ?>
</pre>
	      </div>
      <?php endif; ?>
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

<?php if ($this->_tpl_vars['showStrands']): ?>   
<?php echo '
<!-- Event definition to be included in the body before the Strands js library -->
<script type="text/javascript">
if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}
StrandsTrack.push({
   event:"visited",
   item: "'; ?>
econtentRecord<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo '"
});
</script>
'; ?>

<?php endif; ?>
     