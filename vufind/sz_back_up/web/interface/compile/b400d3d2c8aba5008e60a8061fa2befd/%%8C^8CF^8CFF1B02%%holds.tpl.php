<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:12
         compiled from MyResearch/holds.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/holds.tpl', 34, false),array('function', 'html_options', 'MyResearch/holds.tpl', 322, false),array('modifier', 'escape', 'MyResearch/holds.tpl', 138, false),array('modifier', 'formatISBN', 'MyResearch/holds.tpl', 156, false),array('modifier', 'regex_replace', 'MyResearch/holds.tpl', 163, false),array('modifier', 'truncate', 'MyResearch/holds.tpl', 163, false),array('modifier', 'highlight', 'MyResearch/holds.tpl', 163, false),array('modifier', 'date_format', 'MyResearch/holds.tpl', 200, false),)), $this); ?>
<?php if (( isset ( $this->_tpl_vars['title'] ) )): ?>
<script type="text/javascript">
	alert("<?php echo $this->_tpl_vars['title']; ?>
");
</script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/holds.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/services/MyResearch/ajax.js"></script>
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
			

			<div class="myAccountTitle"><?php echo translate(array('text' => 'Holds'), $this);?>
</div>
			<?php if ($this->_tpl_vars['userNoticeFile']): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			
			<?php $_from = $this->_tpl_vars['recordList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sectionKey'] => $this->_tpl_vars['recordData']):
?>
								<div class='holdSection'>
					<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>
						<a name="availableHoldsSection" rel="section"></a>
					<?php else: ?>
						<a name="unavailableHoldsSection" rel="section"></a>
					<?php endif; ?>
					<div class='holdSectionTitle'><?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>Arrived at pickup location<?php else: ?>Requested items not yet available:<?php endif; ?></div>
						<div class='holdSectionBody'>
							<?php if ($this->_tpl_vars['sectionKey'] == 'available' && $this->_tpl_vars['libraryHoursMessage']): ?>
								<div class='libraryHours'><?php echo $this->_tpl_vars['libraryHoursMessage']; ?>
</div>
							<?php endif; ?>
							<?php if (is_array ( $this->_tpl_vars['recordList'][$this->_tpl_vars['sectionKey']] ) && count ( $this->_tpl_vars['recordList'][$this->_tpl_vars['sectionKey']] ) > 0): ?>
								
																<div id='holdsWithSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
Top' class='holdsWithSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
'>
									<form id='withSelectedHoldsFormTop<?php echo $this->_tpl_vars['sectionKey']; ?>
' action='<?php echo $this->_tpl_vars['fullPath']; ?>
'>
										<div>
											<input type="hidden" name="withSelectedAction" value="" />
											<div id='holdsUpdateSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
'>
												<?php if ($this->_tpl_vars['allowFreezeHolds'] && $this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
													<?php if ($this->_tpl_vars['showDateWhenSuspending']): ?>
														Suspend until (MM/DD/YYYY): 
														<input type="text" size="10" name="suspendDateTop" id="suspendDateTop" value="" />
														<script type="text/javascript"><?php echo '
															$(function() {
																$( "#suspendDateTop" ).datepicker({ minDate: 0, showOn: "both", buttonImage: "'; ?>
<?php echo $this->_tpl_vars['path']; ?>
<?php echo '/images/silk/calendar.png", numberOfMonths: 2,	buttonImageOnly: true});
															});'; ?>

														</script>
													<?php endif; ?>
													<input type="submit" class="button" name="freezeSelected" value="Suspend Selected" title="Suspending a hold prevents the hold from being filled, but keeps your place in queue. This is great if you are going on vacation or want to space out your holds." onclick="return freezeSelectedHolds();"/>
													<input type="submit" class="button" name="thawSelected" value="Activate Selected" title="Activate the hold to allow the hold to be filled again." onclick="return thawSelectedHolds();"/>
												<?php endif; ?>
												<input type="submit" class="button" name="cancelSelected" value="Cancel Selected" onclick="return cancelSelectedHolds();"/>
												<input type="submit" class="button" id="exportToExcel<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>Available<?php else: ?>Unavailable<?php endif; ?>" name="exportToExcel<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>Available<?php else: ?>Unavailable<?php endif; ?>" value="Export to Excel">
											</div>
										</div>
									</form> 								</div>
													
								<div id="pager" class="pager">
									<?php if ($this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
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
									<?php endif; ?>
									<div class='sortOptions'>
										<?php if ($this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
										<?php echo translate(array('text' => 'Sort'), $this);?>

										<select name="accountSort" id="sort<?php echo $this->_tpl_vars['sectionKey']; ?>
" onchange="changeAccountSort($(this).val());">
										<?php $_from = $this->_tpl_vars['sortOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortVal'] => $this->_tpl_vars['sortDesc']):
?>
											<option value="<?php echo $this->_tpl_vars['sortVal']; ?>
"<?php if ($this->_tpl_vars['defaultSortOption'] == $this->_tpl_vars['sortVal']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['sortDesc']), $this);?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select> 
										<?php endif; ?>
										Hide Covers <input type="checkbox" onclick="$('.imageColumn').toggle();"/>
									</div>
								</div>

								
									
								<div class='clearer'></div>
							
								<table class="myAccountTable" id="holdsTable<?php echo $this->_tpl_vars['sectionKey']; ?>
">
									<thead>
										<tr>
											<th><input id='selectAll<?php echo $this->_tpl_vars['sectionKey']; ?>
' type='checkbox' onclick="toggleCheckboxes('.titleSelect<?php echo $this->_tpl_vars['sectionKey']; ?>
', $(this).attr('checked'));" title="Select All/Deselect All"/></th>
											<th><?php echo translate(array('text' => 'Title'), $this);?>
</th>
											<th><?php echo translate(array('text' => 'Format'), $this);?>
</th>
											<?php if ($this->_tpl_vars['showPlacedColumn']): ?>
											<th><?php echo translate(array('text' => 'Placed'), $this);?>
</th>
											<?php endif; ?>
											<th><?php echo translate(array('text' => 'Pickup'), $this);?>
</th>
											<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>
												<th><?php echo translate(array('text' => 'Available'), $this);?>
</th>
												<th><?php echo translate(array('text' => 'Expires'), $this);?>
</th>
											<?php else: ?>
												<?php if ($this->_tpl_vars['showPosition']): ?>
												<th><?php echo translate(array('text' => 'Position'), $this);?>
</th>
												<?php endif; ?>
												<th><?php echo translate(array('text' => 'Status'), $this);?>
</th>
											<?php endif; ?>
											<th><?php echo translate(array('text' => 'Rating'), $this);?>
</th>
										</tr>
									</thead>
									<tbody>
						
										<?php $_from = $this->_tpl_vars['recordList'][$this->_tpl_vars['sectionKey']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recordLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recordLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['record']):
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
												<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>
													<input type="checkbox" name="availableholdselected[]" value="<?php echo $this->_tpl_vars['record']['cancelId']; ?>
" id="selected<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['cancelId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="titleSelect<?php echo $this->_tpl_vars['sectionKey']; ?>
 titleSelect"/>&nbsp;
												<?php else: ?>
													<input type="checkbox" name="waitingholdselected[]" value="<?php echo $this->_tpl_vars['record']['cancelId']; ?>
" id="selected<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['cancelId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="titleSelect<?php echo $this->_tpl_vars['sectionKey']; ?>
 titleSelect"/>&nbsp;
												<?php endif; ?>
											</td>
										
											<td class="myAccountCell">
												<?php if ($this->_tpl_vars['user']->disableCoverArt != 1): ?>
												<div class="imageColumn"> 
													<div id='descriptionPlaceholder<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' style='display:none'></div>
													<a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
?searchId=<?php echo $this->_tpl_vars['searchId']; ?>
&amp;recordIndex=<?php echo $this->_tpl_vars['recordIndex']; ?>
&amp;page=<?php echo $this->_tpl_vars['page']; ?>
" id="descriptionTrigger<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">
													<img src="<?php echo $this->_tpl_vars['coverUrl']; ?>
/bookcover.php?id=<?php echo $this->_tpl_vars['record']['recordId']; ?>
&amp;isn=<?php echo smarty_modifier_formatISBN($this->_tpl_vars['record']['isbn']); ?>
&amp;size=small&amp;upc=<?php echo $this->_tpl_vars['record']['upc']; ?>
&amp;category=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['format_category']['0'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" class="listResultImage" alt="<?php echo translate(array('text' => 'Cover Image'), $this);?>
"/>
													</a>
												</div>
												<?php endif; ?>
									
												<div class="myAccountTitleDetails">
													<div class="resultItemLine1">
														<a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
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
											
											<?php if ($this->_tpl_vars['showPlacedColumn']): ?>
											<td class="myAccountCell">
												<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['create'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>

											</td>
											<?php endif; ?>
											
											<td class="myAccountCell">
												<?php if ($this->_tpl_vars['sectionKey'] == 'available' && $this->_tpl_vars['record']['hasEpub']): ?>
																										<?php $_from = $this->_tpl_vars['record']['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
														<a href="<?php echo $this->_tpl_vars['link']['url']; ?>
" class="button"><?php echo $this->_tpl_vars['link']['text']; ?>
</a>
													<?php endforeach; endif; unset($_from); ?>
												<?php else: ?>
														<?php echo $this->_tpl_vars['record']['location']; ?>

												<?php endif; ?>
											</td>
											
											<?php if ($this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
												<?php if ($this->_tpl_vars['showPosition']): ?>
												<td class="myAccountCell">
													<?php echo $this->_tpl_vars['record']['position']; ?>

												</td>
												<?php endif; ?>
											
												<td class="myAccountCell">
														<?php if ($this->_tpl_vars['record']['frozen']): ?>
															<span class='frozenHold'>
														<?php endif; ?><?php echo $this->_tpl_vars['record']['status']; ?>
 
														<?php if ($this->_tpl_vars['record']['frozen'] && $this->_tpl_vars['showDateWhenSuspending']): ?>until <?php echo ((is_array($_tmp=$this->_tpl_vars['record']['reactivate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</span><?php endif; ?>
														<?php if (strlen ( $this->_tpl_vars['record']['freezeMessage'] ) > 0): ?>
															<div class='<?php if ($this->_tpl_vars['record']['freezeResult'] == true): ?>freezePassed<?php else: ?>freezeFailed<?php endif; ?>'>
																<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['freezeMessage'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

															</div>
														<?php endif; ?>
												</td>
											<?php endif; ?>
											
											<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>
												<td class="myAccountCell">
												<?php if ($this->_tpl_vars['record']['availableTime']): ?> 
													<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['availableTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %d, %Y at %l:%M %p") : smarty_modifier_date_format($_tmp, "%b %d, %Y at %l:%M %p")); ?>

												<?php else: ?>
													Now
												<?php endif; ?>
												</td>
												
												<td class="myAccountCell">
												<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['expire'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %d, %Y") : smarty_modifier_date_format($_tmp, "%b %d, %Y")); ?>

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
																(<span class="ui-rater-rateCount-<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ui-rater-rateCount">0</span>)
															</span>
														</div>
															<div id="saveLink<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
																<?php if ($this->_tpl_vars['showFavorites'] == 1): ?> 
																<a href="<?php echo $this->_tpl_vars['url']; ?>
/Resource/Save?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&amp;source=VuFind" style="padding-left:8px;" onclick="getSaveToListForm('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', 'VuFind'); return false;"><?php echo translate(array('text' => 'Add to'), $this);?>
 <span class='myListLabel'>MyLIST</span></a>
																<?php endif; ?>
																<?php if ($this->_tpl_vars['user']): ?>
																	<div id="lists<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></div>
															<script type="text/javascript">
																getSaveStatuses('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
															</script>
																<?php endif; ?>
															</div>
														</div>
														<script type="text/javascript">
															$(
																 function() <?php echo ' { '; ?>

																		 $('.rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['shortId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: 'Record', recordId: '<?php echo $this->_tpl_vars['record']['recordId']; ?>
',	rating:0.0, postHref: '<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
																 <?php echo ' } '; ?>

															);
														</script>
														
														<?php $this->assign('id', $this->_tpl_vars['record']['recordId']); ?>
														<?php $this->assign('shortId', $this->_tpl_vars['record']['shortId']); ?>
														<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Record/title-review.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
													</div>
													
													<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?>
													<script type="text/javascript">
														addRatingId('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
														$(document).ready(function()<?php echo ' { '; ?>

																resultDescription('<?php echo $this->_tpl_vars['record']['recordId']; ?>
','<?php echo $this->_tpl_vars['record']['recordId']; ?>
');
														<?php echo ' }); '; ?>

													</script>
													<?php endif; ?>
													
													
											</td>
										</tr>
									<?php endforeach; endif; unset($_from); ?>
								</tbody>
							</table>
					
														<div class='holdsWithSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
'>
								<form id='withSelectedHoldsFormBottom<?php echo $this->_tpl_vars['sectionKey']; ?>
' action='<?php echo $this->_tpl_vars['fullPath']; ?>
'>
									<div>
										<input type="hidden" name="withSelectedAction" value="" />
										<div id='holdsUpdateSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
Bottom' class='holdsUpdateSelected<?php echo $this->_tpl_vars['sectionKey']; ?>
'>
											<?php if ($this->_tpl_vars['allowFreezeHolds'] && $this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
												<?php if ($this->_tpl_vars['showDateWhenSuspending']): ?>
													Suspend until (MM/DD/YYYY): 
													<input type="text" size="10" name="suspendDateBottom" id="suspendDateBottom" value="" />
													<script type="text/javascript"><?php echo '
														$(function() {
															$( "#suspendDateBottom" ).datepicker({ minDate: 0, showOn: "both", buttonImage: "'; ?>
<?php echo $this->_tpl_vars['path']; ?>
<?php echo '/images/silk/calendar.png", numberOfMonths: 2,	buttonImageOnly: true});
														});'; ?>

													</script>
												<?php endif; ?>
												<input type="submit" class="button" name="freezeSelected" value="Suspend Selected" title="Suspending a hold prevents the hold from being filled, but keeps your place in queue. This is great if you are going on vacation or want to space out your holds." onclick="return freezeSelectedHolds();"/>
												<input type="submit" class="button" name="thawSelected" value="Activate Selected" title="Activate the hold to allow the hold to be filled again." onclick="return thawSelectedHolds();"/>
											<?php endif; ?>
											<input type="submit" class="button" name="cancelSelected" value="Cancel Selected" onclick="return cancelSelectedHolds();"/>
											<?php if ($this->_tpl_vars['allowChangeLocation'] && $this->_tpl_vars['sectionKey'] == 'unavailable'): ?>
												<div id='holdsUpdateBranchSelction'>
													Change Pickup Location for Selected Items to: 
													<?php echo smarty_function_html_options(array('name' => 'withSelectedLocation','options' => $this->_tpl_vars['pickupLocations'],'selected' => $this->_tpl_vars['resource']['currentPickupId']), $this);?>

													<input type="submit" name="updateSelected" value="Go" onclick="return updateSelectedHolds();"/>
												</div>
											<?php endif; ?>
											<input type="submit" class="button" id="exportToExcel<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>Available<?php else: ?>Unavailable<?php endif; ?>" name="exportToExcel<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>Available<?php else: ?>Unavailable<?php endif; ?>" value="Export to Excel">
										</div>
									</div>
								</form>
							</div>
						<?php else: ?> 							<?php if ($this->_tpl_vars['sectionKey'] == 'available'): ?>
								<?php echo translate(array('text' => 'You do not have any holds that are ready to be picked up'), $this);?>
.
							<?php else: ?>
								<?php echo translate(array('text' => 'You do not have any holds that are not available yet'), $this);?>
.
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; endif; unset($_from); ?> 			<script type="text/javascript">
				$(document).ready(function() <?php echo ' { '; ?>

					doGetRatings();
					$("#holdsTableavailable").tablesorter(<?php echo '{cssAsc: \'sortAscHeader\', cssDesc: \'sortDescHeader\', cssHeader: \'unsortedHeader\', headers: { 0: { sorter: false}, 3: {sorter : \'date\'}, 4: {sorter : \'date\'}, 7: { sorter: false} } }'; ?>
);
				<?php echo ' }); '; ?>

			</script>
		<?php else: ?> 			You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
		<?php endif; ?>
	</div>
</div>