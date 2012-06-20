<?php /* Smarty version 2.6.19, created on 2012-06-18 13:33:04
         compiled from Search/list-none.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Search/list-none.tpl', 7, false),array('modifier', 'escape', 'Search/list-none.tpl', 11, false),)), $this); ?>
<div id="page-content" class="content">
    <div id="sidebar">
    	<?php if ($this->_tpl_vars['spellingSuggestions']): ?>
	  <div class="sidegroup" id="spellingSuggestions">
	  	<h4><?php echo translate(array('text' => 'spell_suggest'), $this);?>
</h4>
	  	<div class="sidegroupContents">
	  	  <dl class="narrowList navmenu narrow_begin">
	      <?php $_from = $this->_tpl_vars['spellingSuggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['termLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['termLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['term'] => $this->_tpl_vars['details']):
        $this->_foreach['termLoop']['iteration']++;
?>
	        <dd><?php echo ((is_array($_tmp=$this->_tpl_vars['term'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 &raquo; <?php $_from = $this->_tpl_vars['details']['suggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['suggestLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suggestLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['word'] => $this->_tpl_vars['data']):
        $this->_foreach['suggestLoop']['iteration']++;
?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['replace_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['word'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php if ($this->_tpl_vars['data']['expand_url']): ?> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['expand_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="/images/silk/expand.png" alt="<?php echo translate(array('text' => 'spell_expand_alt'), $this);?>
"/></a> <?php endif; ?><?php if (! ($this->_foreach['suggestLoop']['iteration'] == $this->_foreach['suggestLoop']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?></dd>
	      <?php endforeach; endif; unset($_from); ?>
	      </dl>
	    </div>
	  </div>
	<?php endif; ?>
      
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
    <div class="resulthead"><h3><?php echo translate(array('text' => 'nohit_heading'), $this);?>
</h3></div>
      
      <p class="error"><?php echo translate(array('text' => 'nohit_prefix'), $this);?>
 - <b><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</b> - <?php echo translate(array('text' => 'nohit_suffix'), $this);?>
</p>

    <div>
    <ul id="noResultsSuggest">
    <li>Check the spelling of your search terms.</li>
    <li>Restate your query by using more, other or broader terms.</li>
    </ul>

      <?php if ($this->_tpl_vars['parseError']): ?>
          <p class="error"><?php echo translate(array('text' => 'nohit_parse_error'), $this);?>
</p>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['spellingSuggestions']): ?>
        <div class="correction"><?php echo translate(array('text' => 'nohit_spelling'), $this);?>
:<br/>
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
?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['replace_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['word'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php if ($this->_tpl_vars['data']['expand_url']): ?> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['expand_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src="/images/silk/expand.png" alt="<?php echo translate(array('text' => 'spell_expand_alt'), $this);?>
"/></a> <?php endif; ?><?php if (! ($this->_foreach['suggestLoop']['iteration'] == $this->_foreach['suggestLoop']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php if (! ($this->_foreach['termLoop']['iteration'] == $this->_foreach['termLoop']['total'])): ?><br/><?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        </div>
        <br/>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['prospectorNumTitlesToLoad'] > 0): ?>
     <script type="text/javascript">getProspectorResults(<?php echo $this->_tpl_vars['prospectorNumTitlesToLoad']; ?>
, <?php echo $this->_tpl_vars['prospectorSavedSearchId']; ?>
);</script>
          <div id='prospectorSearchResultsPlaceholder'></div>
      <?php endif; ?>
      
      
            <?php if (strlen ( $this->_tpl_vars['lookfor'] ) > 0 && count ( $this->_tpl_vars['repeatSearchOptions'] ) > 0): ?>
    <div class='repeatSearchHead'><h4>Try another catalog</h4></div>
      <div class='repeatSearchList'>
      <?php $_from = $this->_tpl_vars['repeatSearchOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeatSearchOption']):
?>
        <div class='repeatSearchItem'>
            <a href="<?php echo $this->_tpl_vars['repeatSearchOption']['link']; ?>
" class='repeatSearchName' target='_blank'><?php echo $this->_tpl_vars['repeatSearchOption']['name']; ?>
</a><?php if ($this->_tpl_vars['repeatSearchOption']['description']): ?> - <?php echo $this->_tpl_vars['repeatSearchOption']['description']; ?>
<?php endif; ?>
		      </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php endif; ?>

		<?php if ($this->_tpl_vars['enableMaterialsRequest']): ?>
    Can't find what you are looking for? Try our <a href="<?php echo $this->_tpl_vars['path']; ?>
/MaterialsRequest/NewRequest">Materials Request Service</a>.</div>
    <?php endif; ?>
		
    </div>
</div>