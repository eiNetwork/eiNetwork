<?php /* Smarty version 2.6.19, created on 2012-06-19 14:29:08
         compiled from MyResearch/overDriveWishList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/overDriveWishList.tpl', 15, false),)), $this); ?>
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
		<div class="myAccountTitle"><?php echo translate(array('text' => 'Your OverDrive Wish List'), $this);?>
</div>
		<?php if ($this->_tpl_vars['userNoticeFile']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['userNoticeFile'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['overDriveWishList']): ?>
			<div class='sortOptions'>
				Hide Covers <input type="checkbox" onclick="$('.imageColumnOverdrive').toggle();"/>
			</div>
		<?php endif; ?>

		<?php if (count ( $this->_tpl_vars['overDriveWishList'] ) > 0): ?>
			<table class="myAccountTable">
				<thead>
					<tr><th class='imageColumnOverdrive'></th><th>Title</th><th>Author</th><th>Date Added</th><th></th></tr>
				</thead>
				<tbody>
				<?php $_from = $this->_tpl_vars['overDriveWishList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
					<tr>
						<td rowspan="<?php echo $this->_tpl_vars['record']['numRows']; ?>
" class='imageColumnOverdrive'><img src="<?php echo $this->_tpl_vars['record']['imageUrl']; ?>
"></td>
						<td><?php if ($this->_tpl_vars['record']['recordId'] != -1): ?><a href="<?php echo $this->_tpl_vars['path']; ?>
/EcontentRecord/<?php echo $this->_tpl_vars['record']['recordId']; ?>
/Home"><?php endif; ?><?php echo $this->_tpl_vars['record']['title']; ?>
<?php if ($this->_tpl_vars['record']['recordId'] != -1): ?></a><?php endif; ?><?php if ($this->_tpl_vars['record']['subTitle']): ?><br/><?php echo $this->_tpl_vars['record']['subTitle']; ?>
<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['record']['author']; ?>
</td>
						<td><?php echo $this->_tpl_vars['record']['dateAdded']; ?>
</td>
						<td>
							<a href="#" onclick="removeOverDriveRecordFromWishList('<?php echo $this->_tpl_vars['record']['overDriveId']; ?>
')" class="button">Remove</a><br/>
						</td>
					</tr>
					<?php $_from = $this->_tpl_vars['record']['formats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['format']):
?>
					<tr class="overDriveFormat">
						<td colspan="3"><?php echo $this->_tpl_vars['format']['name']; ?>
</td>
						<td>
							<?php if ($this->_tpl_vars['format']['available']): ?>
							<a href="#" onclick="checkoutOverDriveItem('<?php echo $this->_tpl_vars['record']['overDriveId']; ?>
', '<?php echo $this->_tpl_vars['format']['formatId']; ?>
')" class="button">Check&nbsp;Out</a><br/>
							<?php else: ?>
							<a href="#" onclick="placeOverDriveHold('<?php echo $this->_tpl_vars['record']['overDriveId']; ?>
', '<?php echo $this->_tpl_vars['format']['formatId']; ?>
')" class="button">Place&nbsp;Hold</a><br/>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		<?php elseif ($this->_tpl_vars['error']): ?>
			<div class='error'><?php echo $this->_tpl_vars['error']; ?>
</div>
		<?php else: ?>
			<div class='noItems'>You have not added any titles to your wishlist.</div>
		<?php endif; ?>
	<?php else: ?>
		You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
	<?php endif; ?>
	</div>
</div>