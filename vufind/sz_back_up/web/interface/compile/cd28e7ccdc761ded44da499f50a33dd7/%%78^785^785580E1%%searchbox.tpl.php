<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from Search/searchbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/searchbox.tpl', 4, false),array('modifier', 'escape', 'Search/searchbox.tpl', 6, false),array('modifier', 'replace', 'Search/searchbox.tpl', 22, false),array('modifier', 'translate', 'Search/searchbox.tpl', 22, false),)), $this); ?>
<form method="get" action="<?php echo $this->_tpl_vars['path']; ?>
/Union/Search" data-ajax="false">
  <div data-role="fieldcontain">
    <label class="offscreen" for="searchForm_lookfor">
        <?php echo translate(array('text' => 'Search'), $this);?>

    </label>
    <input type="search" placeholder="<?php echo translate(array('text' => 'Search'), $this);?>
" name="lookfor" id="searchForm_lookfor" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
    <label class="offscreen" for="searchSource"><?php echo translate(array('text' => 'Source'), $this);?>
</label>
  	<select name="searchSource" id="searchSource" title="Select what to search.  Items marked with a * will redirect you to one of our partner sites." onchange='enableSearchTypes();'>
      <?php $_from = $this->_tpl_vars['searchSources']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['searchKey'] => $this->_tpl_vars['searchOption']):
?>
        <option value="<?php echo $this->_tpl_vars['searchKey']; ?>
" <?php if ($this->_tpl_vars['searchKey'] == $this->_tpl_vars['searchSource']): ?>selected="selected"<?php endif; ?> title="<?php echo $this->_tpl_vars['searchOption']['description']; ?>
"><?php if ($this->_tpl_vars['searchOption']['external']): ?>* <?php endif; ?><?php echo $this->_tpl_vars['searchOption']['name']; ?>
</option>
      <?php endforeach; endif; unset($_from); ?>
    </select>
    
  	<label class="offscreen" for="searchForm_type"><?php echo translate(array('text' => 'Search Type'), $this);?>
</label>
    <select id="searchForm_type" name="basicType" data-native-menu="false">
      <?php $_from = $this->_tpl_vars['basicSearchTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['searchVal'] => $this->_tpl_vars['searchDesc']):
?>
        <option value="<?php echo $this->_tpl_vars['searchVal']; ?>
"<?php if ($this->_tpl_vars['searchType'] == $this->_tpl_vars['searchVal']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['searchDesc']), $this);?>
</option>
      <?php endforeach; endif; unset($_from); ?>
    </select>
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
  <div data-role="fieldcontain">
    <input type="submit" name="submit" value="<?php echo translate(array('text' => 'Find'), $this);?>
"/>
  </div>
  <?php if ($this->_tpl_vars['lastSort']): ?><input type="hidden" name="sort" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastSort'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><?php endif; ?>
</form>