<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:29
         compiled from MyResearch/favorites.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/favorites.tpl', 13, false),array('modifier', 'escape', 'MyResearch/favorites.tpl', 61, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
/services/MyResearch/ajax.js"></script>

<div id="page-content" class="content">
  <div id="sidebar">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "MyResearch/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Admin/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  
  <div id="main-content">
      
        <div class="myAccountTitle"><?php echo translate(array('text' => 'Your Lists and Suggestions'), $this);?>
</div>
      
    <?php if ($this->_tpl_vars['userNoticeFile']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
      
    <?php if ($this->_tpl_vars['showStrands'] && $this->_tpl_vars['user']->disableRecommendations == 0): ?>
	    <?php $this->assign('scrollerName', 'Recommended'); ?>
			<?php $this->assign('wrapperId', 'recommended'); ?>
			<?php $this->assign('scrollerVariable', 'recommendedScroller'); ?>
			<?php $this->assign('scrollerTitle', 'Recommended for you'); ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
      <script type="text/javascript">
      <?php echo '
      var recommendedScroller;
      $(document).ready(function (){
      	recommendedScroller = new TitleScroller(\'titleScrollerRecommended\', \'Recommended\', \'recommended\');
        recommendedScroller.loadTitlesFrom(\''; ?>
<?php echo $this->_tpl_vars['url']; ?>
<?php echo '/Search/AJAX?method=GetListTitles&id=strands:HOME-3&scrollerName=Recommended\', false);
      });
      '; ?>

      </script>

	    <?php $this->assign('scrollerName', 'RecentlyViewed'); ?>
			<?php $this->assign('wrapperId', 'recentlyViewed'); ?>
			<?php $this->assign('scrollerVariable', 'recentlyViewedScroller'); ?>
			<?php $this->assign('scrollerTitle', 'Recently Browsed'); ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
      <script type="text/javascript">
      <?php echo '
      var recentlyViewedScroller;
      $(document).ready(function (){
      	recentlyViewedScroller = new TitleScroller(\'titleScrollerRecentlyViewed\', \'RecentlyViewed\', \'recentlyViewed\');
      	recentlyViewedScroller.loadTitlesFrom(\''; ?>
<?php echo $this->_tpl_vars['url']; ?>
<?php echo '/Search/AJAX?method=GetListTitles&id=strands:HOME-4&scrollerName=RecentlyViewed\', false);
      });
      '; ?>

      </script>
    <?php endif; ?>
        
      <div class="yui-u">

      <?php if ($this->_tpl_vars['listList']): ?>
      <div>
         <?php $_from = $this->_tpl_vars['listList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
                
		    <div id="list<?php echo $this->_tpl_vars['list']->id; ?>
" class="titleScrollerWrapper">
				<div id="list<?php echo $this->_tpl_vars['list']->id; ?>
Header" class="titleScrollerHeader">
					<span class="listTitle resultInformationLabel"><a href="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/MyList/<?php echo $this->_tpl_vars['list']->id; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']->title)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a></span>
					<a href='<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/MyList/<?php echo $this->_tpl_vars['list']->id; ?>
'><span class='seriesLink'>View and Edit List</span></a>
				</div>
				<div id="titleScrollerList<?php echo $this->_tpl_vars['list']->id; ?>
" class="titleScrollerBody">
					<div class="leftScrollerButton enabled" onclick="list<?php echo $this->_tpl_vars['list']->id; ?>
Scroller.scrollToLeft();"></div>
					<div class="rightScrollerButton" onclick="list<?php echo $this->_tpl_vars['list']->id; ?>
Scroller.scrollToRight();"></div>
					<div class="scrollerBodyContainer">
						<div class="scrollerBody" style="display:none">
						</div>
						<div class="scrollerLoadingContainer">
							<img id="scrollerLoadingImageList<?php echo $this->_tpl_vars['list']->id; ?>
" class="scrollerLoading" src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/loading_large.gif" alt="Loading..." />
						</div>
					</div>
					<div class="clearer"></div>
					<div id="titleScrollerSelectedTitleList<?php echo $this->_tpl_vars['list']->id; ?>
" class="titleScrollerSelectedTitle"></div>
					<div id="titleScrollerSelectedAuthorList<?php echo $this->_tpl_vars['list']->id; ?>
" class="titleScrollerSelectedAuthor"></div>
				</div>    
			</div>
		    <script type="text/javascript">
		      <?php echo '
		      $(document).ready(function (){
		    	list'; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo 'Scroller = new TitleScroller(\'titleScrollerList'; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo '\', \'List'; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo '\', \'list'; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo '\');
		    		
		    	var url = path + "/MyResearch/AJAX";
		    	var params = "method=GetListTitles&listId=" + '; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo ';;
		    	var fullUrl = url + "?" + params;
		    	list'; ?>
<?php echo $this->_tpl_vars['list']->id; ?>
<?php echo 'Scroller.loadTitlesFrom(fullUrl);
		      });
		    '; ?>

		    </script>
         <?php endforeach; endif; unset($_from); ?>
         <div class='clearer'></div>
      </div>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['tagList']): ?>
      <div>
        <h3 class="tag"><?php echo translate(array('text' => 'Your Tags'), $this);?>
</h3>
        
        <ul class="bulleted">
          <?php $_from = $this->_tpl_vars['tagList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
          <li><a href='<?php echo $this->_tpl_vars['url']; ?>
/Search/Results?lookfor=<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;type=tag'><?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a> (<?php echo $this->_tpl_vars['tag']->cnt; ?>
) 
	          <a href='<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/RemoveTag?tagId=<?php echo $this->_tpl_vars['tag']->id; ?>
' onclick='return confirm("Are you sure you want to remove the tag \"<?php echo ((is_array($_tmp=$this->_tpl_vars['tag']->tag)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
\" from all titles?");'>
	          <img alt="Delete Tag" src="<?php echo $this->_tpl_vars['path']; ?>
/images/silk/tag_blue_delete.png" />
	          </a>
          </li>
          <?php endforeach; endif; unset($_from); ?>
        </ul>
      </div>
      <?php endif; ?>

      </div>
        
    </div>
    
        <script type="text/javascript">
      $(document).ready(function() <?php echo ' { '; ?>

        doGetRatings();
      <?php echo ' }); '; ?>

    </script>


        
  </div>