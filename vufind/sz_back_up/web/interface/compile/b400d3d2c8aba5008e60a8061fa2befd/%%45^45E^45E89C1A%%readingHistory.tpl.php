<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:32
         compiled from MyResearch/readingHistory.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/readingHistory.tpl', 18, false),array('modifier', 'escape', 'MyResearch/readingHistory.tpl', 96, false),array('modifier', 'formatISBN', 'MyResearch/readingHistory.tpl', 108, false),array('modifier', 'regex_replace', 'MyResearch/readingHistory.tpl', 121, false),array('modifier', 'truncate', 'MyResearch/readingHistory.tpl', 121, false),array('modifier', 'highlight', 'MyResearch/readingHistory.tpl', 121, false),)), $this); ?>
<?php if (( isset ( $this->_tpl_vars['title'] ) )): ?>
<script type="text/javascript">
	alert("<?php echo $this->_tpl_vars['title']; ?>
");
</script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/readingHistory.js" ></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/services/MyResearch/ajax.js" ></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/tablesorter/jquery.tablesorter.min.js"></script>
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
		<?php if ($this->_tpl_vars['user']->cat_username): ?>
			<div class="resulthead">
				<div class="myAccountTitle"><?php echo translate(array('text' => 'My Reading History'), $this);?>
 <?php if ($this->_tpl_vars['historyActive'] == true): ?><span id='readingListWhatsThis' onclick="$('#readingListDisclaimer').toggle();">(What's This?)</span><?php endif; ?></div>
					<?php if ($this->_tpl_vars['userNoticeFile']): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
      
					<div id='readingListDisclaimer' <?php if ($this->_tpl_vars['historyActive'] == true): ?>style='display: none'<?php endif; ?>>
					The library takes seriously the privacy of your library records. Therefore, we do not keep track of what you borrow after you return it. 
					However, our automated system has a feature called "My Reading History" that allows you to track items you check out. 
					Participation in the feature is entirely voluntary. You may start or stop using it, as well as delete any or all entries in "My Reading History" at any time. 
					If you choose to start recording "My Reading History", you agree to allow our automated system to store this data. 
					The library staff does not have access to your "My Reading History", however, it is subject to all applicable local, state, and federal laws, and under those laws, could be examined by law enforcement authorities without your permission. 
					If this is of concern to you, you should not use the "My Reading History" feature.
					</div>
				</div>
          
				<div class="page">
					<form id='readingListForm' action ="<?php echo $this->_tpl_vars['fullPath']; ?>
">
						<div>
							<input name='readingHistoryAction' id='readingHistoryAction' value='' type='hidden' />


							<div id="readingListActionsTop">
								<?php if ($this->_tpl_vars['historyActive'] == true): ?>
									<?php if ($this->_tpl_vars['transList']): ?>
										<a class="button" onclick='return deletedMarkedAction()' href="#">Delete Marked</a>
										<a class="button" onclick='return deleteAllAction()' href="#">Delete All</a>
									<?php endif; ?>
									<a class="button" onclick="return exportListAction();">Export To Excel</a>
									<a class="button" onclick="return optOutAction(<?php if ($this->_tpl_vars['transList']): ?>true<?php else: ?>false<?php endif; ?>)" href="#">Stop Recording My Reading History</a>
								<?php else: ?>
									<a class="button" onclick='return optInAction()' href="#">Start Recording My Reading History</a>
								<?php endif; ?>
							</div>
							
							<?php if ($this->_tpl_vars['transList']): ?>
							<div id="pager" class="pager">
								<?php if ($this->_tpl_vars['pageLinks']['all']): ?><div class="myAccountPagination pagination">Page: <?php echo $this->_tpl_vars['pageLinks']['all']; ?>
</div><?php endif; ?>
								
								<span id="recordsPerPage">
								Records Per Page:
								<select id="pagesize" class="pagesize" onchange="changePageSize()">
									<option value="10" <?php if ($this->_tpl_vars['recordsPerPage'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
									<option value="25" <?php if ($this->_tpl_vars['recordsPerPage'] == 25): ?>selected="selected"<?php endif; ?>>20</option>
									<option value="50" <?php if ($this->_tpl_vars['recordsPerPage'] == 50): ?>selected="selected"<?php endif; ?>>30</option>
									<option value="75" <?php if ($this->_tpl_vars['recordsPerPage'] == 75): ?>selected="selected"<?php endif; ?>>40</option>
									<option value="100" <?php if ($this->_tpl_vars['recordsPerPage'] == 100): ?>selected="selected"<?php endif; ?>>50</option>
								</select>
								</span>
								
								<span id="sortOptions">
								Sort By:
								<select class="sortMethod" id="sortMethod" name="accountSort" onchange="changeAccountSort($(this).val())">
									<?php $_from = $this->_tpl_vars['sortOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortOption'] => $this->_tpl_vars['sortOptionLabel']):
?>
										<option value="<?php echo $this->_tpl_vars['sortOption']; ?>
" <?php if ($this->_tpl_vars['sortOption'] == $this->_tpl_vars['defaultSortOption']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['sortOptionLabel']; ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
								</select>
								</span>
								
								<div class='sortOptions'>
									Hide Covers <input type="checkbox" onclick="$('.imageColumn').toggle();"/>
								</div>
							</div>    
							<?php endif; ?>
          <?php if ($this->_tpl_vars['transList']): ?>
          
          <table class="myAccountTable" id="readingHistoryTable">
            <thead>
              <tr>
                <th><input id='selectAll' type='checkbox' onclick="toggleCheckboxes('.titleSelect', $(this).attr('checked'));" title="Select All/Deselect All"/></th>
                <th><?php echo translate(array('text' => 'Title'), $this);?>
</th>
                <th><?php echo translate(array('text' => 'Format'), $this);?>
</th>
                <th><?php echo translate(array('text' => 'Out'), $this);?>
</th>
              </tr>
            </thead>
            <tbody> 
          
	          <?php $_from = $this->_tpl_vars['transList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['recordKey'] => $this->_tpl_vars['record']):
        $this->_foreach['recordLoop']['iteration']++;
?>
	          <?php if (( $this->_foreach['recordLoop']['iteration'] % 2 ) == 0): ?>
							<tr id="record<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="result alt record<?php echo $this->_foreach['recordLoop']['iteration']; ?>
">
					<?php else: ?>
							<tr id="record<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="result record<?php echo $this->_foreach['recordLoop']['iteration']; ?>
">
					<?php endif; ?>
					<td class="titleSelectCheckedOut myAccountCell">
						<input type="checkbox" name="selected[<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
]" class="titleSelect" id="selected<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" />
						</td>
						<td class="myAccountCell">
				    	<?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>
				    	<div class="imageColumn"> 
						    
						    <a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strcasecmp ( $this->_tpl_vars['readingHistory']->source , 'vufind' ) == 0): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" id="descriptionTrigger<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
						    <img src="<?php echo $this->_tpl_vars['path']; ?>
/bookcover.php?id=<?php echo $this->_tpl_vars['record']['recordId']; ?>
&amp;isn=<?php echo smarty_modifier_formatISBN($this->_tpl_vars['record']['isbn']); ?>
&amp;size=small&amp;upc=<?php echo $this->_tpl_vars['record']['upc']; ?>
&amp;category=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['format_category'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
						    </a>
						    
						    <div id='descriptionPlaceholder<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' style='display:none'></div>

						</div>
						<?php endif; ?>
						    						    <div class='requestThisLink' id="placeHold<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" style="display:none">
						      <a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strcasecmp ( $this->_tpl_vars['readingHistory']->source , 'vufind' ) == 0): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Hold"><img src="<?php echo $this->_tpl_vars['path']; ?>
/interface/themes/default/images/place_hold.png" alt="Place Hold"/></a>
						    </div>				    
				      <div class="myAccountTitleDetails">
						  <div class="resultItemLine1">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
/<?php if (strcasecmp ( $this->_tpl_vars['readingHistory']->source , 'vufind' ) == 0): ?>Record<?php else: ?>EcontentRecord<?php endif; ?>/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" class="title"><?php if (! ((is_array($_tmp=$this->_tpl_vars['record']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", ""))): ?><?php echo translate(array('text' => 'Title not available'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['record']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
<?php endif; ?></a>
							<?php if ($this->_tpl_vars['record']['title2']): ?>
						    <div class="searchResultSectionInfo">
						      <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['record']['title2'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>

						    </div>
						    <?php endif; ?>
						  </div>
				  
						  <div class="resultItemLine2">
						    <?php if ($this->_tpl_vars['record']['author']): ?>
						      <?php echo translate(array('text' => 'by'), $this);?>

						      <?php if (is_array ( $this->_tpl_vars['record']['author'] )): ?>
						        <?php $_from = $this->_tpl_vars['summAuthor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['author']):
?>
						          <a href="<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['author'])) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
						        <?php endforeach; endif; unset($_from); ?>
						      <?php else: ?>
						        <a href="<?php echo $this->_tpl_vars['url']; ?>
/Author/Home?author=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['author'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['author'])) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
</a>
						      <?php endif; ?>
						    <?php endif; ?>
						
						 		<?php if ($this->_tpl_vars['record']['publicationDate']): ?><?php echo translate(array('text' => 'Published'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['publicationDate'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
						  </div>
						  
               </div>
            </td>
						
			      <td class="myAccountCell">
              <?php if (is_array ( $this->_tpl_vars['record']['format'] )): ?>
                <?php $_from = $this->_tpl_vars['record']['format']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
                  <?php echo translate(array('text' => $this->_tpl_vars['format']), $this);?>

                <?php endforeach; endif; unset($_from); ?>
              <?php else: ?>
                <?php echo translate(array('text' => $this->_tpl_vars['record']['format']), $this);?>

              <?php endif; ?>
            </td>
            
            <td class="myAccountCell">      
				       <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['checkout'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php if ($this->_tpl_vars['record']['lastCheckout']): ?> to <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['lastCheckout'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
		        </td>             
            

						
						<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?>
						<script type="text/javascript">
						  $(document).ready(function()<?php echo ' { '; ?>

						      resultDescription('<?php echo $this->_tpl_vars['record']['recordId']; ?>
','<?php echo $this->_tpl_vars['record']['recordId']; ?>
');
						  <?php echo ' }); '; ?>

						</script>
						<?php endif; ?>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
	        </tbody>
      </table>           
	      
				<script type="text/javascript">
        $(document).ready(function() <?php echo ' { '; ?>

          doGetRatings();
          /*$("#readingHistoryTable")
          	.tablesorter(<?php echo '{cssAsc: \'sortAscHeader\', cssDesc: \'sortDescHeader\', cssHeader: \'unsortedHeader\', headers: { 0: { sorter: false}, 3: { sorter: \'date\' }, 4: { sorter: false }, 7: { sorter: false} } }'; ?>
)
            .tablesorterPager(<?php echo '{container: $("#pager")}'; ?>
)
            	;*/
        <?php echo ' }); '; ?>

      </script>
          <?php else: ?>
                        You do not have any items in your reading list.  It may take up to 3 hours for your reading history to be updated after you start recording your history.
          <?php endif; ?>
          <?php if ($this->_tpl_vars['transList']): ?> 	          <div id="readingListActionsBottom">
	            <?php if ($this->_tpl_vars['historyActive'] == true): ?>
	              <?php if ($this->_tpl_vars['transList']): ?>
	                <a class="button" onclick="return deletedMarkedAction()" href="#">Delete Marked</a>
                  <a class="button" onclick="return deleteAllAction()" href="#">Delete All</a>
	              <?php endif; ?>
	                              <a class="button" onclick='return optOutAction(<?php if ($this->_tpl_vars['transList']): ?>true<?php else: ?>false<?php endif; ?>)' href="#">Stop Recording My Reading History</a>
	            <?php else: ?>
	              <a class="button" onclick='return optInAction()' href="#">Start Recording My Reading History</a>
	            <?php endif; ?>
	          </div>
          <?php endif; ?>
          </div>
          </form>
          </div>
        <?php else: ?>
          <div class="page">
            You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
          </div>
        <?php endif; ?>
</div>
  </div>