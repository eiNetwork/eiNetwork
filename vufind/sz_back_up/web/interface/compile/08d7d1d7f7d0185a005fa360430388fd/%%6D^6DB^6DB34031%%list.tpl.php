<?php /* Smarty version 2.6.19, created on 2012-06-20 13:53:51
         compiled from Search/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/list.tpl', 32, false),array('modifier', 'escape', 'Search/list.tpl', 35, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/services/EcontentRecord/ajax.js"></script>
<?php if (( isset ( $this->_tpl_vars['title'] ) )): ?>
<script type="text/javascript">
	alert("<?php echo $this->_tpl_vars['title']; ?>
");
</script>
<?php endif; ?>
<div id="page-content" class="content">
    <div id="left-bar">
	<?php if ($this->_tpl_vars['sideRecommendations']): ?>
		<?php $_from = $this->_tpl_vars['sideRecommendations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recommendations']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['recommendations'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
  </div>
  
  <div id="main-content">
    <div id="searchInfo">
      	<?php if ($this->_tpl_vars['topRecommendations']): ?>
		<?php $_from = $this->_tpl_vars['topRecommendations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recommendations']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['recommendations'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>

      	<div class="resulthead">
	<div class="yui-u first">
		<?php if ($this->_tpl_vars['recordCount']): ?>
		<?php echo translate(array('text' => 'Showing'), $this);?>

		<b><?php echo $this->_tpl_vars['recordStart']; ?>
</b> - <b><?php echo $this->_tpl_vars['recordEnd']; ?>
</b>
		<?php echo translate(array('text' => 'of'), $this);?>
 <b><?php echo $this->_tpl_vars['recordCount']; ?>
</b>
		<?php if ($this->_tpl_vars['searchType'] == 'basic'): ?><?php echo translate(array('text' => 'for search'), $this);?>
: <b>'<?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'</b>,<?php endif; ?>
		<?php endif; ?>
		<?php echo translate(array('text' => 'query time'), $this);?>
: <?php echo $this->_tpl_vars['qtime']; ?>
s
		<?php if ($this->_tpl_vars['spellingSuggestions']): ?>
		<br/><br/>
		<div class="correction"><strong><?php echo translate(array('text' => 'spell_suggest'), $this);?>
</strong>:<br/>
			<?php $_from = $this->_tpl_vars['spellingSuggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['termLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['termLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['term'] => $this->_tpl_vars['details']):
        $this->_foreach['termLoop']['iteration']++;
?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['term'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 &raquo; <?php $_from = $this->_tpl_vars['details']['suggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['suggestLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suggestLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['word'] => $this->_tpl_vars['data']):
        $this->_foreach['suggestLoop']['iteration']++;
?>
				<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['replace_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['word'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
				<?php if ($this->_tpl_vars['data']['expand_url']): ?>
				<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['expand_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/expand.png" alt="<?php echo translate(array('text' => 'spell_expand_alt'), $this);?>
"/></a>
				<?php endif; ?>
				<?php if (! ($this->_foreach['suggestLoop']['iteration'] == $this->_foreach['suggestLoop']['total'])): ?>, <?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if (! ($this->_foreach['termLoop']['iteration'] == $this->_foreach['termLoop']['total'])): ?><br/><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<?php endif; ?>
        </div>

        <div class="yui-u toggle">
	        <?php if ($this->_tpl_vars['recordCount']): ?>
	          <?php echo translate(array('text' => 'Sort'), $this);?>

	          <select name="sort" onchange="document.location.href = this.options[this.selectedIndex].value;">
	          <?php $_from = $this->_tpl_vars['sortList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortLabel'] => $this->_tpl_vars['sortData']):
?>
	            <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['sortData']['sortUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"<?php if ($this->_tpl_vars['sortData']['selected']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['sortData']['desc']), $this);?>
</option>
	          <?php endforeach; endif; unset($_from); ?>
	          </select>
	        <?php endif; ?>
        </div>

      </div>
      
      <?php if ($this->_tpl_vars['subpage']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['subpage'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
        <?php echo $this->_tpl_vars['pageContent']; ?>

      <?php endif; ?>

      <?php if ($this->_tpl_vars['prospectorNumTitlesToLoad'] > 0): ?>
        <script type="text/javascript">getProspectorResults(<?php echo $this->_tpl_vars['prospectorNumTitlesToLoad']; ?>
, <?php echo $this->_tpl_vars['prospectorSavedSearchId']; ?>
);</script>
      <?php endif; ?>
            <div id='prospectorSearchResultsPlaceholder'></div>
        
      <?php if ($this->_tpl_vars['pageLinks']['all']): ?><div class="pagination"><?php echo $this->_tpl_vars['pageLinks']['all']; ?>
</div><?php endif; ?>
      
      <div class="searchtools">
        <strong><?php echo translate(array('text' => 'Search Tools'), $this);?>
:</strong>
        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['rssLink'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="feed"><?php echo translate(array('text' => 'Get RSS Feed'), $this);?>
</a>
        <a href="<?php echo $this->_tpl_vars['url']; ?>
/Search/Email" class="mail" onclick="getLightbox('Search', 'Email', null, null, '<?php echo translate(array('text' => 'Email this'), $this);?>
'); return false;"><?php echo translate(array('text' => 'Email this Search'), $this);?>
</a>
        <?php if ($this->_tpl_vars['savedSearch']): ?><a href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/SaveSearch?delete=<?php echo $this->_tpl_vars['searchId']; ?>
" class="delete"><?php echo translate(array('text' => 'save_search_remove'), $this);?>
</a><?php else: ?><a href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/SaveSearch?save=<?php echo $this->_tpl_vars['searchId']; ?>
" class="add"><?php echo translate(array('text' => 'save_search'), $this);?>
</a><?php endif; ?>
        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['excelLink'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="exportToExcel"><?php echo translate(array('text' => 'Export To Excel'), $this);?>
</a>
      </div>
      
      <b class="bbot"><b></b></b>
    </div>
      </div>
	
 
  
 
  <div id="right-bar">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ei_tpl/right-bar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>


</div>
