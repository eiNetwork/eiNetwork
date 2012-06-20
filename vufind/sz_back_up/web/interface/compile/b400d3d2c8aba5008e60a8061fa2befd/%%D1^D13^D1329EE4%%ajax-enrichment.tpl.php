<?php /* Smarty version 2.6.19, created on 2012-06-18 17:25:54
         compiled from Record/ajax-enrichment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Record/ajax-enrichment.tpl', 5, false),array('modifier', 'regex_replace', 'Record/ajax-enrichment.tpl', 16, false),array('function', 'translate', 'Record/ajax-enrichment.tpl', 12, false),)), $this); ?>
<SimilarAuthors><![CDATA[<?php if ($this->_tpl_vars['enrichment']['novelist']['similarAuthorCount'] != 0): ?>
  <h4 id="similarAuthorTitle" >Similar Authors</h4>
  <?php $_from = $this->_tpl_vars['enrichment']['novelist']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['similarAuthor']):
?>
    <div class="sidebarLabel">
      <a href=<?php echo $this->_tpl_vars['path']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['similarAuthor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&lookfor=><?php echo $this->_tpl_vars['similarAuthor']; ?>
</a>
    </div>
  <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>]]></SimilarAuthors>
<SeriesInfo><![CDATA[<?php echo $this->_tpl_vars['seriesInfo']; ?>
]]></SeriesInfo>
<SeriesDefaultIndex><?php echo $this->_tpl_vars['enrichment']['novelist']['seriesDefaultIndex']; ?>
</SeriesDefaultIndex>
<SimilarTitles><![CDATA[<?php if ($this->_tpl_vars['showSimilarTitles']): ?>
<h4><?php echo translate(array('text' => 'Similar Titles'), $this);?>
</h4>
  <?php $_from = $this->_tpl_vars['enrichment']['novelist']['similarTitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['similar']):
?>
  <?php if ($this->_tpl_vars['similar']['recordId'] != -1): ?>
  <div class="sidebarLabel">
    <a href="<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['similar']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['similar']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
  </div>  
  <div class="sidebarValue">
    <?php if ($this->_tpl_vars['similar']['author']): ?><?php echo translate(array('text' => 'By'), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['similar']['author'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
    <?php if ($this->_tpl_vars['similar']['publishDate']): ?> <?php echo translate(array('text' => 'Published'), $this);?>
: (<?php echo ((is_array($_tmp=$this->_tpl_vars['similar']['publishDate']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)<?php endif; ?>
  </div>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>]]></SimilarTitles>
<ShowGoDeeperData><?php echo $this->_tpl_vars['showGoDeeper']; ?>
</ShowGoDeeperData>