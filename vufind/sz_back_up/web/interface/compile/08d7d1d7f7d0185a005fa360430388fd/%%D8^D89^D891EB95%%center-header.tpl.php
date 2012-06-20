<?php /* Smarty version 2.6.19, created on 2012-06-14 14:29:06
         compiled from ei_tpl/center-header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'ei_tpl/center-header.tpl', 5, false),array('modifier', 'escape', 'ei_tpl/center-header.tpl', 8, false),)), $this); ?>
<div class="center-header-top">&nbsp;</div>

<div class="center-header-middle">
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

    <span id="search-label">Search</span>
    <span id="search-type">
	  <select id="search-select" name="basicType">
	    <?php $_from = $this->_tpl_vars['basicSearchTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['searchVal'] => $this->_tpl_vars['searchDesc']):
?>
	      <option value="<?php echo $this->_tpl_vars['searchVal']; ?>
"<?php if ($this->_tpl_vars['searchIndex'] == $this->_tpl_vars['searchVal']): ?> selected="selected"<?php endif; ?>>
		<?php echo translate(array('text' => $this->_tpl_vars['searchDesc']), $this);?>

	      </option>
	    <?php endforeach; endif; unset($_from); ?>
	  </select>
    </span>
    <span id="for-label">for</span>
    <span>
      <input id="lookfor" type="text" name="lookfor" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"  />
    </span>

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


<div class="center-header-buttom">&nbsp;</div>
