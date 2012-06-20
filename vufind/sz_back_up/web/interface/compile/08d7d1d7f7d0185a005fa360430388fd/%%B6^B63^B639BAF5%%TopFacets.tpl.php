<?php /* Smarty version 2.6.19, created on 2012-06-14 14:29:11
         compiled from Search/Recommend/TopFacets.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/Recommend/TopFacets.tpl', 11, false),array('modifier', 'escape', 'Search/Recommend/TopFacets.tpl', 11, false),)), $this); ?>
    <?php if ($this->_tpl_vars['topFacetSet']): ?>
      <?php $_from = $this->_tpl_vars['topFacetSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['cluster']):
?>
        <?php if ($this->_tpl_vars['cluster']['label'] == 'Category'): ?>
            <?php if (( $this->_tpl_vars['categorySelected'] == false )): ?>
	            <div id="formatCategories">
	            <div id='categoryValues'>
	            <?php $_from = $this->_tpl_vars['cluster']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['narrowLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['narrowLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['thisFacet']):
        $this->_foreach['narrowLoop']['iteration']++;
?>
	                		                <?php if ($this->_tpl_vars['thisFacet']['value'] != 'Other'): ?>
				        <?php if ($this->_tpl_vars['thisFacet']['isApplied']): ?>
				        <span class='categoryValue categoryValue<?php echo translate(array('text' => ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>
'><img class='categoryIcon' src='<?php echo $this->_tpl_vars['url']; ?>
/interface/themes/default/images/<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['imageName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.png' alt='<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'/> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="removeFacetLink">(remove)</a></span>
				        <?php else: ?>
				        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><span class='categoryValue categoryValue<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' ><img class='categoryIcon' src='<?php echo $this->_tpl_vars['url']; ?>
/interface/themes/default/images/<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['imageName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.png' alt='<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'/>(<?php echo $this->_tpl_vars['thisFacet']['count']; ?>
)</span></a>
				        <?php endif; ?>
			        <?php endif; ?>
		        <?php endforeach; endif; unset($_from); ?>
	            </div>
	            </div>
            <?php endif; ?>
        <?php else: ?>
  <div class="authorbox">
  <table class="facetsTop navmenu narrow_begin">
    <tr><th colspan="<?php echo $this->_tpl_vars['topFacetSettings']['cols']; ?>
"><?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
<span><?php echo translate(array('text' => 'top_facet_suffix'), $this);?>
</span></th></tr>
        <?php $_from = $this->_tpl_vars['cluster']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['narrowLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['narrowLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['thisFacet']):
        $this->_foreach['narrowLoop']['iteration']++;
?>
        <?php if ($this->_foreach['narrowLoop']['iteration'] == ( $this->_tpl_vars['topFacetSettings']['rows'] * $this->_tpl_vars['topFacetSettings']['cols'] ) + 1): ?>
    <tr id="more<?php echo $this->_tpl_vars['title']; ?>
"><td><a href="#" onclick="moreFacets('<?php echo $this->_tpl_vars['title']; ?>
'); return false;"><?php echo translate(array('text' => 'more'), $this);?>
 ...</a></td></tr>
  </table>
  <table class="facetsTop navmenu narrowGroupHidden" id="narrowGroupHidden_<?php echo $this->_tpl_vars['title']; ?>
">
    <tr><th colspan="<?php echo $this->_tpl_vars['topFacetSettings']['cols']; ?>
"><div class="top_facet_additional_text"><?php echo translate(array('text' => 'top_facet_additional_prefix'), $this);?>
<?php echo translate(array('text' => $this->_tpl_vars['cluster']['label']), $this);?>
<span><?php echo translate(array('text' => 'top_facet_suffix'), $this);?>
</span></div></th></tr>
        <?php endif; ?>
    <?php if ($this->_foreach['narrowLoop']['iteration'] % $this->_tpl_vars['topFacetSettings']['cols'] == 1): ?>
    <tr>
    <?php endif; ?>
        <?php if ($this->_tpl_vars['thisFacet']['isApplied']): ?>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> <img src="/images/silk/tick.png" alt="Selected"> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['removalUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="removeFacetLink">(remove)</a></td>
        <?php else: ?>
        <td><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['thisFacet']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['thisFacet']['count']; ?>
)</td>
        <?php endif; ?>
    <?php if ($this->_foreach['narrowLoop']['iteration'] % $this->_tpl_vars['topFacetSettings']['cols'] == 0 || ($this->_foreach['narrowLoop']['iteration'] == $this->_foreach['narrowLoop']['total'])): ?>
    </tr>
    <?php endif; ?>
        <?php if ($this->_foreach['narrowLoop']['total'] > ( $this->_tpl_vars['topFacetSettings']['rows'] * $this->_tpl_vars['topFacetSettings']['cols'] ) && ($this->_foreach['narrowLoop']['iteration'] == $this->_foreach['narrowLoop']['total'])): ?>
    <tr><td><a href="#" onclick="lessFacets('<?php echo $this->_tpl_vars['title']; ?>
'); return false;"><?php echo translate(array('text' => 'less'), $this);?>
 ...</a></td></tr>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
  </table>
  </div>
        <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>