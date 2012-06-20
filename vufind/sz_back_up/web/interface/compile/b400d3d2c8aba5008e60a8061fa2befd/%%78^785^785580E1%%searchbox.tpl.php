<?php /* Smarty version 2.6.19, created on 2012-06-18 09:11:08
         compiled from Search/searchbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/searchbox.tpl', 3, false),array('modifier', 'escape', 'Search/searchbox.tpl', 6, false),array('modifier', 'replace', 'Search/searchbox.tpl', 38, false),array('modifier', 'translate', 'Search/searchbox.tpl', 38, false),)), $this); ?>
<div class="searchform">
  <?php if ($this->_tpl_vars['searchType'] == 'advanced'): ?>
    <a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Advanced?edit=<?php echo $this->_tpl_vars['searchId']; ?>
" class="small"><?php echo translate(array('text' => 'Edit this Advanced Search'), $this);?>
</a> |
    <a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Advanced" class="small"><?php echo translate(array('text' => 'Start a new Advanced Search'), $this);?>
</a> |
    <a href="<?php echo $this->_tpl_vars['url']; ?>
" class="small"><?php echo translate(array('text' => 'Start a new Basic Search'), $this);?>
</a>
    <br /><?php echo translate(array('text' => 'Your search terms'), $this);?>
 : "<b><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</b>"
  <?php else: ?>
    <form method="get" action="<?php echo $this->_tpl_vars['path']; ?>
/Union/Search" id="searchForm" class="search" onsubmit='startSearch();'>
      <div id="searchbar">
      <select name="basicType" id="type">
      <?php $_from = $this->_tpl_vars['basicSearchTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['searchVal'] => $this->_tpl_vars['searchDesc']):
?>
        <option value="<?php echo $this->_tpl_vars['searchVal']; ?>
"<?php if ($this->_tpl_vars['searchIndex'] == $this->_tpl_vars['searchVal']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['searchDesc']), $this);?>
</option>
      <?php endforeach; endif; unset($_from); ?>
      </select>
      <input id="lookfor" type="text" name="lookfor" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
      <input type="submit" name="submit" id='searchBarFind' value="<?php echo translate(array('text' => 'Find'), $this);?>
" />
			<?php if ($this->_tpl_vars['filterList'] || $this->_tpl_vars['hasCheckboxFilters']): ?>
	    <div class="keepFilters">
	      <input id="retainFiltersCheckbox" type="checkbox" onclick="filterAll(this);" /> <?php echo translate(array('text' => 'basic_search_keep_filters'), $this);?>

	      <div style="display:none;">
	        <?php $_from = $this->_tpl_vars['filterList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['data']):
?>
		        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
		          <input type="checkbox" name="filter[]" value='<?php echo $this->_tpl_vars['value']['field']; ?>
:"<?php echo ((is_array($_tmp=$this->_tpl_vars['value']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"' />
		        <?php endforeach; endif; unset($_from); ?>
	        <?php endforeach; endif; unset($_from); ?>
	        <?php $_from = $this->_tpl_vars['checkboxFilters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['current']):
?>
            <?php if ($this->_tpl_vars['current']['selected']): ?>
              <input type="checkbox" name="filter[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['current']['filter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
	      </div>
	    </div>
      <?php endif; ?>
      </div>
      <div id="shards">
			<?php if (isset ( $this->_tpl_vars['shards'] )): ?>
				<?php $_from = $this->_tpl_vars['shards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['shard'] => $this->_tpl_vars['isSelected']):
?>
					<input type="checkbox" <?php if ($this->_tpl_vars['isSelected']): ?>checked="checked" <?php endif; ?>name="shard[]" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['shard'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' id="shard<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shard'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', '')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> <label for="shard<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shard'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '') : smarty_modifier_replace($_tmp, ' ', '')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['shard'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
      </div>
      <div id="searchTools">
          <a href="<?php echo $this->_tpl_vars['path']; ?>
/Browse/Home"><?php echo translate(array('text' => 'Browse the Catalog'), $this);?>
</a>
	      <?php if ($this->_tpl_vars['showAdvancedSearchbox'] == 1): ?>
	        <a href="<?php echo $this->_tpl_vars['path']; ?>
/Search/Advanced" class="small"><?php echo translate(array('text' => 'Advanced Search'), $this);?>
</a>
	      <?php endif; ?>
	      <?php if (is_array ( $this->_tpl_vars['allLangs'] ) && count ( $this->_tpl_vars['allLangs'] ) > 1): ?>
	         <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langCode'] => $this->_tpl_vars['langName']):
?>
	           <a class='languageLink <?php if ($this->_tpl_vars['userLang'] == $this->_tpl_vars['langCode']): ?> selected<?php endif; ?>' href="<?php echo ((is_array($_tmp=$this->_tpl_vars['fullPath'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php if ($this->_tpl_vars['requestHasParams']): ?>&amp;<?php else: ?>?<?php endif; ?>mylang=<?php echo $this->_tpl_vars['langCode']; ?>
"><?php echo translate(array('text' => $this->_tpl_vars['langName']), $this);?>
</a>
	         <?php endforeach; endif; unset($_from); ?>
	      <?php endif; ?>
	      	      <a href="<?php echo $this->_tpl_vars['url']; ?>
/Help/Home?topic=search" title="<?php echo translate(array('text' => 'Search Tips'), $this);?>
" onclick="window.open('<?php echo $this->_tpl_vars['url']; ?>
/Help/Home?topic=search', 'Help', 'width=625, height=510'); return false;">
	        Help <img id='searchHelpIcon' src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/help.png" alt="<?php echo translate(array('text' => 'Search Tips'), $this);?>
" />
	      </a>
      </div>
      
            <?php $this->assign('hasCheckboxFilters', '0'); ?>
      <?php if (isset ( $this->_tpl_vars['checkboxFilters'] ) && count ( $this->_tpl_vars['checkboxFilters'] ) > 0): ?>
        <?php $_from = $this->_tpl_vars['checkboxFilters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['current']):
?>
          <?php if ($this->_tpl_vars['current']['selected']): ?>
            <?php $this->assign('hasCheckboxFilters', '1'); ?>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
      <?php endif; ?>
      
    </form>
    <?php if (false && strlen ( $this->_tpl_vars['lookfor'] ) > 0 && count ( $this->_tpl_vars['repeatSearchOptions'] ) > 0): ?>
    <div class='repeatSearchBox'>
      <label for='repeatSearchIn'>Repeat Search In: </label>
      <select name="repeatSearchIn" id="repeatSearchIn">
        <?php $_from = $this->_tpl_vars['repeatSearchOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeatSearchOption']):
?>
          <option value="<?php echo $this->_tpl_vars['repeatSearchOption']['link']; ?>
"><?php echo $this->_tpl_vars['repeatSearchOption']['name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
      </select>
      <input type="button" name="repeatSearch" value="<?php echo translate(array('text' => 'Go'), $this);?>
" onclick="window.open(document.getElementById('repeatSearchIn').options[document.getElementById('repeatSearchIn').selectedIndex].value)">
    </div>
    <?php endif; ?>
    
  <?php endif; ?>
</div>