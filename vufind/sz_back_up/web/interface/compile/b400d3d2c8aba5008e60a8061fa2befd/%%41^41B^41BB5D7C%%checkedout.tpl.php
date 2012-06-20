<?php /* Smarty version 2.6.19, created on 2012-06-18 17:22:57
         compiled from MyResearch/checkedout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/checkedout.tpl', 34, false),array('modifier', 'escape', 'MyResearch/checkedout.tpl', 96, false),array('modifier', 'formatISBN', 'MyResearch/checkedout.tpl', 106, false),array('modifier', 'regex_replace', 'MyResearch/checkedout.tpl', 118, false),array('modifier', 'truncate', 'MyResearch/checkedout.tpl', 118, false),array('modifier', 'highlight', 'MyResearch/checkedout.tpl', 118, false),array('modifier', 'date_format', 'MyResearch/checkedout.tpl', 164, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
/services/MyResearch/ajax.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/holds.js"></script>
<?php if (( isset ( $this->_tpl_vars['title'] ) )): ?>
<script type="text/javascript">
    alert("<?php echo $this->_tpl_vars['title']; ?>
");
</script>
<?php endif; ?>
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
					var recommendedScroller;
	
					recommendedScroller = new TitleScroller('titleScrollerRecommended', 'Recommended', 'recommended');
					recommendedScroller.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=strands:HOME-3&scrollerName=Recommended', false);
				</script>
			<?php endif; ?>
          
      <div class="myAccountTitle"><?php echo translate(array('text' => 'Your Checked Out Items'), $this);?>
</div>
      <?php if ($this->_tpl_vars['userNoticeFile']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['libraryHoursMessage']): ?>
				<div class='libraryHours'><?php echo $this->_tpl_vars['libraryHoursMessage']; ?>
</div>
			<?php endif; ?>
      <?php if ($this->_tpl_vars['transList']): ?>
      	
	      <form id="renewForm" action="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/RenewMultiple">
          <div>
            <a href="#" onclick="return renewSelectedTitles();" class="button">Renew Selected Items</a>
            <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/RenewAll" class="button">Renew All</a>
            <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/CheckedOut?exportToExcel" class="button" id="exportToExcel" >Export to Excel</a>
          </div>
          
          <div id="pager" class="pager">
						<?php if ($this->_tpl_vars['pageLinks']['all']): ?><div class="myAccountPagination pagination">Page: <?php echo $this->_tpl_vars['pageLinks']['all']; ?>
</div><?php endif; ?>
						
						<span id="recordsPerPage">
						Records Per Page:
						<select id="pagesize" class="pagesize" onchange="changePageSize()">
							<option value="10" <?php if ($this->_tpl_vars['recordsPerPage'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
							<option value="25" <?php if ($this->_tpl_vars['recordsPerPage'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
							<option value="50" <?php if ($this->_tpl_vars['recordsPerPage'] == 50): ?>selected="selected"<?php endif; ?>>50</option>
							<option value="75" <?php if ($this->_tpl_vars['recordsPerPage'] == 75): ?>selected="selected"<?php endif; ?>>75</option>
							<option value="100" <?php if ($this->_tpl_vars['recordsPerPage'] == 100): ?>selected="selected"<?php endif; ?>>100</option>
						</select>
						</span>
		        <div class='sortOptions'>
		          <?php echo translate(array('text' => 'Sort by'), $this);?>

		          <select name="accountSort" id="sort" onchange="changeAccountSort($(this).val());">
		          <?php $_from = $this->_tpl_vars['sortOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortVal'] => $this->_tpl_vars['sortDesc']):
?>
		            <option value="<?php echo $this->_tpl_vars['sortVal']; ?>
"<?php if ($this->_tpl_vars['defaultSortOption'] == $this->_tpl_vars['sortVal']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['sortDesc']), $this);?>
</option>
		          <?php endforeach; endif; unset($_from); ?>
		          </select>
		          Hide Covers <input type="checkbox" onclick="$('.imageColumn').toggle();"/>
		        </div>
	        </div>
            
          <div class='clearer'></div>
          <table class="myAccountTable" id="checkedOutTable">
            <thead>
              <tr>
                <th><input id='selectAll' type='checkbox' onclick="toggleCheckboxes('.titleSelect', $(this).attr('checked'));" title="Select All/Deselect All"/></th>
                <th><?php echo translate(array('text' => 'Title'), $this);?>
</th>
                <th><?php echo translate(array('text' => 'Format'), $this);?>
</th>
                <?php if ($this->_tpl_vars['showOut']): ?>
                <th><?php echo translate(array('text' => 'Out'), $this);?>
</th>
                <?php endif; ?>
                <th><?php echo translate(array('text' => 'Due'), $this);?>
</th>
                <?php if ($this->_tpl_vars['showRenewed']): ?>
                <th><?php echo translate(array('text' => 'Renewed'), $this);?>
</th>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['showWaitList']): ?>
                <th><?php echo translate(array('text' => 'Wait List'), $this);?>
</th>
                <?php endif; ?>
                <th><?php echo translate(array('text' => 'Rating'), $this);?>
</th>
              </tr>
            </thead>
            <tbody>
	        <?php $_from = $this->_tpl_vars['transList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['record']):
        $this->_foreach['recordLoop']['iteration']++;
?>
				    <tr id="record<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="result <?php if (( $this->_foreach['recordLoop']['iteration'] % 2 ) == 0): ?>alt<?php endif; ?> <?php if (( $this->_foreach['recordLoop']['iteration'] % 16 ) == 0): ?>newpage<?php endif; ?> record<?php echo $this->_foreach['recordLoop']['iteration']; ?>
">
					  <td class="titleSelectCheckedOut myAccountCell">
						  <input type="checkbox" name="selected[<?php echo $this->_tpl_vars['record']['renewIndicator']; ?>
]" class="titleSelect" id="selected<?php echo $this->_tpl_vars['record']['itemid']; ?>
" />
						</td>
				    
            <td class="myAccountCell">
				    	<?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>
				    	<div class="imageColumn"> 
						    <?php if ($this->_tpl_vars['record']['id']): ?>
						    <a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" id="descriptionTrigger<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
						    <img src="<?php echo $this->_tpl_vars['coverUrl']; ?>
/bookcover.php?id=<?php echo $this->_tpl_vars['record']['id']; ?>
&amp;isn=<?php echo smarty_modifier_formatISBN($this->_tpl_vars['record']['isbn']); ?>
&amp;size=small&amp;upc=<?php echo $this->_tpl_vars['record']['upc']; ?>
&amp;category=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['format_category']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
						    </a>
						    <?php endif; ?>
						    <div id='descriptionPlaceholder<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' style='display:none'></div>
						  </div>
						  <?php endif; ?>
				  
				      <div class="myAccountTitleDetails">
						  <div class="resultItemLine1">
						  <?php if ($this->_tpl_vars['record']['id']): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="title">
							<?php endif; ?>
							<?php if (! ((is_array($_tmp=$this->_tpl_vars['record']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", ""))): ?><?php echo translate(array('text' => 'Title not available'), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['record']['title'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/(\/|:)$/", "") : smarty_modifier_regex_replace($_tmp, "/(\/|:)$/", "")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180, "...") : smarty_modifier_truncate($_tmp, 180, "...")))) ? $this->_run_mod_handler('highlight', true, $_tmp, $this->_tpl_vars['lookfor']) : smarty_modifier_highlight($_tmp, $this->_tpl_vars['lookfor'])); ?>
<?php endif; ?>
							<?php if ($this->_tpl_vars['record']['id']): ?>
							</a>
							<?php endif; ?>
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
						      
              <?php if ($this->_tpl_vars['record']['hasEpub']): ?> 
                <div id='epubPickupOptions'>
                	<?php $_from = $this->_tpl_vars['record']['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
                  <div class='button'><a href="<?php echo $this->_tpl_vars['link']['url']; ?>
"><?php echo $this->_tpl_vars['link']['text']; ?>
</a></div>
                  <?php endforeach; endif; unset($_from); ?>
                </div>
              <?php endif; ?>
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
            <?php if ($this->_tpl_vars['showOut']): ?>
            <td class="myAccountCell">      
				       <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['checkoutdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>

		        </td>
		        <?php endif; ?>
		        <td class="myAccountCell">
		        	<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['duedate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>

		        	<?php if ($this->_tpl_vars['record']['overdue']): ?>
                <span class='overdueLabel'>OVERDUE</span>
              <?php elseif ($this->_tpl_vars['record']['daysUntilDue'] == 0): ?>
                <span class='dueSoonLabel'>(Due today)</span>
              <?php elseif ($this->_tpl_vars['record']['daysUntilDue'] == 1): ?>
                <span class='dueSoonLabel'>(Due tomorrow)</span>
              <?php elseif ($this->_tpl_vars['record']['daysUntilDue'] <= 7): ?>
                <span class='dueSoonLabel'>(Due in <?php echo $this->_tpl_vars['record']['daysUntilDue']; ?>
 days)</span>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['record']['fine']): ?>
              	<span class='overdueLabel'>FINE <?php echo $this->_tpl_vars['record']['fine']; ?>
</span>
              <?php endif; ?>
            </td>  
		        <?php if ($this->_tpl_vars['showRenewed']): ?>
		        <td class="myAccountCell">
		          <?php echo $this->_tpl_vars['record']['renewCount']; ?>

              <?php if ($this->_tpl_vars['record']['renewMessage']): ?>
                <div class='<?php if ($this->_tpl_vars['record']['renewResult'] == true): ?>renewPassed<?php else: ?>renewFailed<?php endif; ?>'>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['renewMessage'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

                </div>
              <?php endif; ?>
            </td>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['showWaitList']): ?>
            <td class="myAccountCell">
                            <?php echo $this->_tpl_vars['record']['holdQueueLength']; ?>

            </td>
            <?php endif; ?>
		                  
            <td class="myAccountCell">                        
						<div id ="searchStars<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultActions">
						  <div class="rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 stat">
							  <div class="statVal">
							    <span class="ui-rater">
							      <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
							      (<span class="ui-rater-rateCount-<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ui-rater-rateCount">0</span>)
							    </span>
							  </div>
						      <div id="saveLink<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
						        <?php if ($this->_tpl_vars['showFavorites'] == 1): ?> 
						        <a href="<?php echo $this->_tpl_vars['url']; ?>
/Resource/Save?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=VuFind" style="padding-left:8px;" onclick="getSaveToListForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'VuFind'); return false;"><?php echo translate(array('text' => 'Add to'), $this);?>
 <span class='myListLabel'>MyLIST</span></a>
						        <?php endif; ?>
						        <?php if ($this->_tpl_vars['user']): ?>
						        	<div id="lists<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></div>
    									<script type="text/javascript">
    									  getSaveStatuses('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
    									</script>
  						      <?php endif; ?>
  						    </div>
                  <?php $this->assign('id', $this->_tpl_vars['record']['id']); ?>
                  <?php $this->assign('shortId', $this->_tpl_vars['record']['shortId']); ?>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/title-review.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						    </div>
						    <script type="text/javascript">
						      $(
						         function() <?php echo ' { '; ?>

						             $('.rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: 'Record', recordId: '<?php echo $this->_tpl_vars['record']['id']; ?>
', rating:0.0, postHref: '<?php echo $this->_tpl_vars['path']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
						         <?php echo ' } '; ?>

						      );
						    </script>
						      
						  </div>
		
						<?php if ($this->_tpl_vars['record']['id'] != -1): ?>
						<script type="text/javascript">
						  addRatingId('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
						  $(document).ready(function()<?php echo ' { '; ?>

						      resultDescription('<?php echo $this->_tpl_vars['record']['id']; ?>
','<?php echo $this->_tpl_vars['record']['id']; ?>
');
						  <?php echo ' }); '; ?>

						</script>
						<?php endif; ?>
            </td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
        </tbody>
      </table>
      
	      <div>
		      <a href="#" onclick="return renewSelectedTitles();" class="button">Renew Selected Items</a>
		      <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/RenewAll" class="button">Renew All</a>
		      <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/CheckedOut?exportToExcel" class="button" id="exportToExcel" >Export to Excel</a>
		    </div>
		  </form>
	    
      <script type="text/javascript">
        $(document).ready(function() <?php echo ' { '; ?>

          doGetRatings();
        <?php echo ' }); '; ?>

      </script>
    <?php else: ?>
	    <?php echo translate(array('text' => 'You do not have any items checked out'), $this);?>
.
    <?php endif; ?>
  <?php else: ?>
    You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
  <?php endif; ?>
  </div>
</div>