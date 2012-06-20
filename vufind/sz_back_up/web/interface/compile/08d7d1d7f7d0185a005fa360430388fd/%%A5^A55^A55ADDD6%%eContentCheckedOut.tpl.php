<?php /* Smarty version 2.6.19, created on 2012-06-15 11:33:00
         compiled from MyResearch/eContentCheckedOut.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/eContentCheckedOut.tpl', 33, false),array('modifier', 'date_format', 'MyResearch/eContentCheckedOut.tpl', 61, false),array('modifier', 'escape', 'MyResearch/eContentCheckedOut.tpl', 76, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
/services/MyResearch/ajax.js"></script>
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
          
      <div class="myAccountTitle"><?php echo translate(array('text' => 'Your Checked Out eContent'), $this);?>
</div>
      <?php if ($this->_tpl_vars['userNoticeFile']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
      
      <?php if ($this->_tpl_vars['transList']): ?>
        <div class='sortOptions'>
                    Hide Covers <input type="checkbox" onclick="$('.imageColumn').toggle();"/>
        </div>
	      
	    <?php endif; ?>
	    
	    <?php if (count ( $this->_tpl_vars['checkedOut'] ) > 0): ?>
	    	<table class="myAccountTable">
	    	<thead>
	    		<tr><th>Title</th><th>Source</th><th>Out</th><th>Due</th><th>Wait List</th><th>Rating</th><th>Read</th></tr>
	    	</thead><tbody>
		    <?php $_from = $this->_tpl_vars['checkedOut']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
		    	<tr>
	        	<td><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['record']['id']; ?>
/Home"><?php echo $this->_tpl_vars['record']['title']; ?>
</a></td>
	        	<td><?php echo $this->_tpl_vars['record']['source']; ?>
</td>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['checkoutdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
	        	<td>
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
	        	</td>
	        	<td><?php echo $this->_tpl_vars['record']['holdQueueLength']; ?>
</td>
	        	<td>
	        		<div id ="searchStars<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="resultActions">
      				  <div class="rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 stat">
      					  <div class="statVal">
      					    <span class="ui-rater">
      					      <span class="ui-rater-starsOff" style="width:90px;"><span class="ui-rater-starsOn" style="width:0px"></span></span>
      					      (<span class="ui-rater-rateCount-<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 ui-rater-rateCount">0</span>)
      					    </span>
      					  </div>
      				      <div id="saveLink<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
      				        <?php if ($this->_tpl_vars['showFavorites'] == 1): ?> 
      				        <a href="<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
/Save" style="padding-left:8px;" onclick="getLightbox('Record', 'Save', '<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
', '', '<?php echo translate(array('text' => 'Add to favorites'), $this);?>
', 'Record', 'Save', '<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'); return false;"><?php echo translate(array('text' => 'Add to'), $this);?>
 <span class='myListLabel'>MyLIST</span></a>
      				        <?php endif; ?>
      				        <?php if ($this->_tpl_vars['user']): ?>
      				        	<div id="lists<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
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

      				             $('.rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: 'EcontentRecord', recordId: '<?php echo $this->_tpl_vars['record']['recordId']; ?>
',  rating:0.0, postHref: '<?php echo $this->_tpl_vars['url']; ?>
/Record/<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/AJAX?method=RateTitle'<?php echo ' } '; ?>
);
      				         <?php echo ' } '; ?>

      				      );
      				    </script>
      				    
                      <?php $this->assign('id', $this->_tpl_vars['record']['recordId']); ?>
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
        				</script>
        				<?php endif; ?>
	        	</td>
	        	<td>
	        									<?php $_from = $this->_tpl_vars['record']['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
								<a href="<?php if ($this->_tpl_vars['link']['url']): ?><?php echo $this->_tpl_vars['link']['url']; ?>
<?php else: ?>#<?php endif; ?>" <?php if ($this->_tpl_vars['link']['onclick']): ?>onclick="<?php echo $this->_tpl_vars['link']['onclick']; ?>
"<?php endif; ?> class="button"><?php echo $this->_tpl_vars['link']['text']; ?>
</a>
							<?php endforeach; endif; unset($_from); ?>
	        	</td>
	        </tr>
		    <?php endforeach; endif; unset($_from); ?>
		    </tbody></table>
	    <?php else: ?>
	    	<div class='noItems'>You do not have any eContent checked out</div>
	    <?php endif; ?>
  <?php else: ?>
    You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
  <?php endif; ?>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() <?php echo ' { '; ?>

		doGetRatings();
	<?php echo ' }); '; ?>

</script>