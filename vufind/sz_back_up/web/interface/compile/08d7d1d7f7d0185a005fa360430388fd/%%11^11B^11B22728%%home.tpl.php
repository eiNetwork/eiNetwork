<?php /* Smarty version 2.6.19, created on 2012-06-15 09:05:16
         compiled from Author/home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'Author/home.tpl', 6, false),array('modifier', 'escape', 'Author/home.tpl', 11, false),array('modifier', 'truncate_html', 'Author/home.tpl', 39, false),)), $this); ?>
<div id="page-content" class="content">
	<div id="sidebar">
	    <?php if ($this->_tpl_vars['enrichment']['novelist']['similarAuthorCount'] != 0): ?>
    	<div class="sidegroup">
	         
	      <h4><?php echo translate(array('text' => 'Similar Authors'), $this);?>
</h4>
	
	      <ul class="similar">
	        <?php $_from = $this->_tpl_vars['enrichment']['novelist']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['similar']):
?>
	        <li>
	          <a href=<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['similar'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
><?php echo $this->_tpl_vars['similar']; ?>
</a>
	          </span>
	        </li>
	        
	        <?php endforeach; endif; unset($_from); ?>
	      </ul>
	      
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
       <?php if ($this->_tpl_vars['info']): ?>
       <div class="authorbio yui-ge">
       <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
 
       <?php if ($this->_tpl_vars['info']['image']): ?>
       <img src="<?php echo $this->_tpl_vars['info']['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['altimage'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" width="150px" class="alignleft recordcover">
       <?php endif; ?>
       <?php echo ((is_array($_tmp=$this->_tpl_vars['info']['description'])) ? $this->_run_mod_handler('truncate_html', true, $_tmp, 4500, "...", false) : smarty_modifier_truncate_html($_tmp, 4500, "...", false)); ?>

       <p>
          <a href="http://<?php echo $this->_tpl_vars['wiki_lang']; ?>
.wikipedia.org/wiki/<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" target="new"><span class="note"><?php echo translate(array('text' => 'wiki_link'), $this);?>
</span></a></p>
       <div class="clearer" ></div>
       </div>
       <?php endif; ?>
 
             <div class="yui-ge resulthead">
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
          
        </div>

        <div class="yui-u toggle">
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
        </div>

      </div>

       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Search/list-list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
      </div>
    </div>
</div>