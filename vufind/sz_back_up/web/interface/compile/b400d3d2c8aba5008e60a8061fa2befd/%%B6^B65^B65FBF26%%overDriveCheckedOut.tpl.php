<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:05
         compiled from MyResearch/overDriveCheckedOut.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/overDriveCheckedOut.tpl', 15, false),array('modifier', 'escape', 'MyResearch/overDriveCheckedOut.tpl', 45, false),)), $this); ?>
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
	<?php if ($this->_tpl_vars['user']): ?>
		<div class="myAccountTitle"><?php echo translate(array('text' => 'Your Checked Out Items In OverDrive'), $this);?>
</div>
		<?php if ($this->_tpl_vars['userNoticeFile']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['overDriveCheckedOutItems']): ?>
			<div class='sortOptions'>
				Hide Covers <input type="checkbox" onclick="$('.imageColumnOverdrive').toggle();"/>
			</div>
		<?php endif; ?>

		<?php if (count ( $this->_tpl_vars['overDriveCheckedOutItems'] ) > 0): ?>
			<table class="myAccountTable">
				<thead>
					<tr><th class='imageColumnOverdrive'></th><th>Title</th><th>Checked Out On</th><th>Expires</th><th>Format</th><th>Rating</th><th></th></tr>
				</thead>
				<tbody>
				<?php $_from = $this->_tpl_vars['overDriveCheckedOutItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
					<tr>
						<td rowspan="<?php echo $this->_tpl_vars['record']['numRows']; ?>
" class='imageColumnOverdrive'><img src="<?php echo $this->_tpl_vars['record']['imageUrl']; ?>
"></td>
						<td>
							<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['record']['recordId']; ?>
/Home"><?php endif; ?><?php echo $this->_tpl_vars['record']['title']; ?>
<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?></a><?php endif; ?>
							<?php if ($this->_tpl_vars['record']['subTitle']): ?><br/><?php echo $this->_tpl_vars['record']['subTitle']; ?>
<?php endif; ?>
							<?php if (strlen ( $this->_tpl_vars['record']['record']->author ) > 0): ?><br/>by: <?php echo $this->_tpl_vars['record']['record']->author; ?>
<?php endif; ?>
						</td>
						<td><?php echo $this->_tpl_vars['record']['checkedOutOn']; ?>
</td>
						<td><?php echo $this->_tpl_vars['record']['expiresOn']; ?>
</td>
						<td><?php echo $this->_tpl_vars['record']['format']; ?>
</td>
						<td>							<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?>
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
									$(function() <?php echo ' { '; ?>

										$('.rate<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
').rater(<?php echo '{ '; ?>
module: 'EcontentRecord', recordId: <?php echo $this->_tpl_vars['record']['recordId']; ?>
,  rating:0.0, postHref: '<?php echo $this->_tpl_vars['url']; ?>
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

							<script type="text/javascript">
								addRatingId('<?php echo ((is_array($_tmp=$this->_tpl_vars['record']['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
							</script>
							<?php endif; ?>
						</td>
						<td>
							<a href="<?php echo $this->_tpl_vars['record']['downloadLink']; ?>
" class="button">Download</a>
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class='noItems'>You do not have any titles from OverDrive checked out</div>
		<?php endif; ?>
		<div id='overdriveMediaConsoleInfo'>
		<img src="<?php echo $this->_tpl_vars['path']; ?>
/images/overdrive.png" width="125" height="42" alt="Powered by Overdrive" class="alignleft"/>
		<p>To access OverDrive titles, you will need the <a href="http://www.overdrive.com/software/omc/">OverDrive&reg; Media Console&trade;</a>.  
		If you do not already have the OverDrive Media Console, you may download it <a href="http://www.overdrive.com/software/omc/">here</a>.</p>
		<div class="clearer">&nbsp;</div> 
		<p>Need help transferring a title to your device or want to know whether or not your device is compatible with a particular format?
		Click <a href="http://help.overdrive.com">here</a> for more information. 
		</p>
		 
	</div>
	<?php else: ?>
		You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
	<?php endif; ?>
	</div>
</div>