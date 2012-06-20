<?php /* Smarty version 2.6.19, created on 2012-06-15 13:55:44
         compiled from API/listWidgetTabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'API/listWidgetTabs.tpl', 8, false),array('modifier', 'escape', 'API/listWidgetTabs.tpl', 8, false),)), $this); ?>
<div id="listWidget<?php echo $this->_tpl_vars['widget']->id; ?>
" class="ui-tabs listWidget">
	<?php if (count ( $this->_tpl_vars['widget']->lists ) > 1): ?>
		<?php if (! isset ( $this->_tpl_vars['widget']->listDisplayType ) || $this->_tpl_vars['widget']->listDisplayType == 'tabs'): ?>
					  <ul>
				<?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
				<?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
		  	<li><a href="#list-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo $this->_tpl_vars['list']->name; ?>
</a></li>
		  	<?php endif; ?>
		  	<?php endforeach; endif; unset($_from); ?>
		  </ul>
		<?php else: ?>
			<div class='listWidgetSelector'>
				<select class="availableLists" id="availableLists<?php echo $this->_tpl_vars['widget']->id; ?>
" onchange="changeSelectedList();return false;">
					<?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
					<?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
			  	<option value="list-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo $this->_tpl_vars['list']->name; ?>
</option>
			  	<?php endif; ?>
			  	<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		<?php endif; ?>
  <?php endif; ?>
  
  <?php $this->assign('listIndex', '0'); ?>
  <?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
  	<?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] && $this->_tpl_vars['user']->disableRecommendations == 0 ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
  	  <?php $this->assign('listIndex', $this->_tpl_vars['listIndex']+1); ?>
  		<?php $this->assign('listName', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
  		<?php $this->assign('scrollerName', ($this->_tpl_vars['listName'])); ?>
			<?php $this->assign('wrapperId', ($this->_tpl_vars['listName'])); ?>
			<?php $this->assign('scrollerVariable', "listScroller".($this->_tpl_vars['listName'])); ?>
			<?php $this->assign('Links', $this->_tpl_vars['list']->links); ?>
			
			<?php if (count ( $this->_tpl_vars['widget']->lists ) == 1): ?>
				<?php $this->assign('scrollerTitle', $this->_tpl_vars['list']->name); ?>
			<?php endif; ?>
			<?php if (! isset ( $this->_tpl_vars['widget']->listDisplayType ) || $this->_tpl_vars['widget']->listDisplayType == 'tabs'): ?>
				<?php $this->assign('display', 'true'); ?>
			<?php else: ?>
				<?php if ($this->_tpl_vars['listIndex'] == 1): ?>
					<?php $this->assign('display', 'true'); ?>
				<?php else: ?>
					<?php $this->assign('display', 'false'); ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "titleScroller.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	<?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  
  <script type="text/javascript">
        
    <?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
	    <?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
	    	var listScroller<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
;
	    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php echo '
      
    $(document).ready(function(){
    	'; ?>
<?php if (count ( $this->_tpl_vars['widget']->lists ) > 1 && ( ! isset ( $this->_tpl_vars['widget']->listDisplayType ) || $this->_tpl_vars['widget']->listDisplayType == 'tabs' )): ?><?php echo '
      $(\'#listWidget'; ?>
<?php echo $this->_tpl_vars['widget']->id; ?>
<?php echo '\').tabs({ selected: 0 });
      '; ?>

      <?php endif; ?>
      <?php $this->assign('index', 0); ?>
      <?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['listLoop']['iteration']++;
?>
     		<?php $this->assign('listName', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
      	<?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
      		<?php if ($this->_tpl_vars['index'] == 0): ?>
	      	  listScroller<?php echo $this->_tpl_vars['listName']; ?>
 = new TitleScroller('titleScroller<?php echo $this->_tpl_vars['listName']; ?>
', '<?php echo $this->_tpl_vars['listName']; ?>
', 'list<?php echo $this->_tpl_vars['listName']; ?>
', <?php if ($this->_tpl_vars['widget']->showTitleDescriptions == 1): ?>true<?php else: ?>false<?php endif; ?>, '<?php echo $this->_tpl_vars['widget']->onSelectCallback; ?>
');
			  	  listScroller<?php echo $this->_tpl_vars['listName']; ?>
.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=<?php echo $this->_tpl_vars['list']->source; ?>
&scrollerName=<?php echo $this->_tpl_vars['listName']; ?>
', false);
			  	<?php endif; ?>
		  	  <?php $this->assign('index', $this->_tpl_vars['index']+1); ?>
	    	<?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>

      <?php if (! isset ( $this->_tpl_vars['widget']->listDisplayType ) || $this->_tpl_vars['widget']->listDisplayType == 'tabs'): ?>
      $('#listWidget<?php echo $this->_tpl_vars['widget']->id; ?>
').bind('tabsshow', function(event, ui) <?php echo '{
      	showList(ui.index);
      });
      '; ?>
<?php endif; ?><?php echo '
    });

		$(window).bind(\'beforeunload\', function(e) {
			'; ?>

			<?php if (! isset ( $this->_tpl_vars['widget']->listDisplayType ) || $this->_tpl_vars['widget']->listDisplayType == 'tabs'): ?>
				$('#listWidget<?php echo $this->_tpl_vars['widget']->id; ?>
').tabs(<?php echo '{ selected: 0 }'; ?>
);
			<?php else: ?>
				var availableListsSelector = $("#availableLists<?php echo $this->_tpl_vars['widget']->id; ?>
");
				var availableLists = availableListsSelector[0];
				var selectedOption = availableLists.options[0];
				var selectedValue = selectedOption.value;
				$('#availableLists<?php echo $this->_tpl_vars['widget']->id; ?>
').val(selectedValue);
			<?php endif; ?>
			<?php echo '
		});

    function changeSelectedList(){
      //Show the correct list 
      var availableListsSelector = $("#availableLists'; ?>
<?php echo $this->_tpl_vars['widget']->id; ?>
<?php echo '");
      var availableLists = availableListsSelector[0];
      var selectedOption = availableLists.options[availableLists.selectedIndex];
      
      var selectedList = selectedOption.value;
      $("#listWidget'; ?>
<?php echo $this->_tpl_vars['widget']->id; ?>
<?php echo ' > .titleScroller").hide();
      $("#" + selectedList).show(); 
      showList(availableLists.selectedIndex);
    }

    function showList(listIndex){
    	'; ?>

    	<?php $this->assign('index', 0); ?>
    	<?php $_from = $this->_tpl_vars['widget']->lists; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['listLoop']['iteration']++;
?>
    		<?php $this->assign('listName', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']->name)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\W/', '') : smarty_modifier_regex_replace($_tmp, '/\W/', '')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
      	<?php if ($this->_tpl_vars['list']->displayFor == 'all' || ( $this->_tpl_vars['list']->displayFor == 'loggedIn' && $this->_tpl_vars['user'] ) || ( $this->_tpl_vars['list']->displayFor == 'notLoggedIn' && ! $this->_tpl_vars['user'] )): ?>
      		<?php if ($this->_tpl_vars['index'] == 0): ?>
      			if (listIndex == <?php echo $this->_tpl_vars['index']; ?>
)<?php echo '{'; ?>

      				listScroller<?php echo $this->_tpl_vars['listName']; ?>
.activateCurrentTitle();
      			<?php echo '}'; ?>

			  	<?php else: ?>
			  		else if (listIndex == <?php echo $this->_tpl_vars['index']; ?>
)<?php echo '{'; ?>

				  		if (listScroller<?php echo $this->_tpl_vars['listName']; ?>
 == null)<?php echo '{'; ?>

				  			listScroller<?php echo $this->_tpl_vars['listName']; ?>
 = new TitleScroller('titleScroller<?php echo $this->_tpl_vars['listName']; ?>
', '<?php echo $this->_tpl_vars['listName']; ?>
', 'list<?php echo $this->_tpl_vars['listName']; ?>
', <?php if ($this->_tpl_vars['widget']->showTitleDescriptions == 1): ?>true<?php else: ?>false<?php endif; ?>, '<?php echo $this->_tpl_vars['widget']->onSelectCallback; ?>
');
					  		listScroller<?php echo $this->_tpl_vars['listName']; ?>
.loadTitlesFrom('<?php echo $this->_tpl_vars['url']; ?>
/Search/AJAX?method=GetListTitles&id=<?php echo $this->_tpl_vars['list']->source; ?>
&scrollerName=<?php echo $this->_tpl_vars['listName']; ?>
', false);
					  	<?php echo '}else{'; ?>

				  			listScroller<?php echo $this->_tpl_vars['listName']; ?>
.activateCurrentTitle();
				  		<?php echo '}'; ?>

      			<?php echo '}'; ?>

		  	  <?php endif; ?>
		  	  <?php $this->assign('index', $this->_tpl_vars['index']+1); ?>
	    	<?php endif; ?>
	    <?php endforeach; endif; unset($_from); ?>
	    <?php echo '
    }
    '; ?>

  </script>
</div>