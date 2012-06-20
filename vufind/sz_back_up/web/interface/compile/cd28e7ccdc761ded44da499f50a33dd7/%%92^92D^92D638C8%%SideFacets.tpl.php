<?php /* Smarty version 2.6.19, created on 2012-06-18 13:12:28
         compiled from Search/Recommend/SideFacets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/Recommend/SideFacets.tpl', 4, false),array('modifier', 'escape', 'Search/Recommend/SideFacets.tpl', 14, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['sideFacetSet'] )): ?>
<div data-role="dialog" id="Search-narrow">
  <div data-role="header" data-theme="d" data-position="inline">
    <h1><?php echo translate(array('text' => 'Narrow Search'), $this);?>
</h1>
  </div>
  <div data-role="content">
    <div data-role="collapsible-set" class="narrow-search">
      <?php $_from = $this->_tpl_vars['sideFacetSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['facetLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['facetLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['cluster']):
        $this->_foreach['facetLoop']['iteration']++;
?>
      <div data-role="collapsible" data-collapsed="<?php if (($this->_foreach['facetLoop']['iteration'] <= 1)): ?>false<?php else: ?>true<?php endif; ?>">
        <h4><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
</h4>
        <ul class="narrow" data-role="listview" data-inset="true">
          <?php $_from = $this->_tpl_vars['cluster']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['narrowLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['narrowLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['thisFacet']):
        $this->_foreach['narrowLoop']['iteration']++;
?>
            <?php if ($this->_tpl_vars['thisFacet']['isApplied']): ?>
              <li data-icon="check" class="checked"><a href="" data-rel="back"><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> <span class="ui-li-count"><?php echo $this->_tpl_vars['thisFacet']['count']; ?>
</span></li>
            <?php else: ?>
              <li><a rel="external" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> <span class="ui-li-count"><?php echo $this->_tpl_vars['thisFacet']['count']; ?>
</span></li>
            <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
        </ul>
      </div>
      <?php endforeach; endif; unset($_from); ?>      
    </div>
  </div>
</div>
<?php endif; ?>