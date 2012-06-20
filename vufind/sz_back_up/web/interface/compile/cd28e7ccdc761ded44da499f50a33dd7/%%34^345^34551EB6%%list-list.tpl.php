<?php /* Smarty version 2.6.19, created on 2012-06-18 13:12:28
         compiled from Search/list-list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'js', 'Search/list-list.tpl', 1, false),array('function', 'translate', 'Search/list-list.tpl', 4, false),array('modifier', 'escape', 'Search/list-list.tpl', 7, false),array('modifier', 'replace', 'Search/list-list.tpl', 24, false),)), $this); ?>
<?php echo smarty_function_js(array('filename' => "check_item_statuses.js"), $this);?>

<?php if ($this->_tpl_vars['filterList']): ?>
<ul class="filters" data-role="listview" data-inset="true" data-dividertheme="e">
	<li data-role="list-divider"><?php echo translate(array('text' => 'adv_search_filters'), $this);?>
</li>
	<?php $_from = $this->_tpl_vars['filterList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['filterLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filterLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['filters']):
        $this->_foreach['filterLoop']['iteration']++;
?>
		<?php $_from = $this->_tpl_vars['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filter']):
?>
		<li data-icon="minus"><a data-icon="minus" rel="external" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['filter']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
		<?php if (! ($this->_foreach['filterLoop']['iteration'] <= 1)): ?>
			<?php echo translate(array('text' => 'AND'), $this);?>

		<?php endif; ?>
		<?php echo translate(array('text' => $this->_tpl_vars['field']), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['filter']['display'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<ul class="results" data-role="listview" data-split-icon="plus" data-split-theme="c">
	<?php $_from = $this->_tpl_vars['recordSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['record']):
        $this->_foreach['recordLoop']['iteration']++;
?>
		<li> <?php echo $this->_tpl_vars['record']; ?>
</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>

<div data-role="controlgroup" data-type="horizontal" align="center">
<?php if ($this->_tpl_vars['pageLinks']['back']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['pageLinks']['back'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' href=', ' class="prevLink" data-role="button" data-rel="back" href=') : smarty_modifier_replace($_tmp, ' href=', ' class="prevLink" data-role="button" data-rel="back" href=')); ?>
 <?php endif; ?> 
<?php if ($this->_tpl_vars['pageLinks']['next']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['pageLinks']['next'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' href=', ' class="nextLink" rel="external" data-role="button" href=') : smarty_modifier_replace($_tmp, ' href=', ' class="nextLink" rel="external" data-role="button" href=')); ?>
 <?php endif; ?>
</div>