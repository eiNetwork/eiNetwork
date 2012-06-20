<?php /* Smarty version 2.6.19, created on 2012-06-20 10:51:39
         compiled from MyResearch/profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'MyResearch/profile.tpl', 11, false),array('function', 'html_options', 'MyResearch/profile.tpl', 26, false),array('modifier', 'escape', 'MyResearch/profile.tpl', 16, false),)), $this); ?>
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
      <h3><?php echo translate(array('text' => 'Your Profile'), $this);?>
hello</h3></div>
      
      <div class="page">
      <form action='' method='post'>
      <table class="citation" width="100%">
        <tr><th width="100px"><?php echo translate(array('text' => 'Full Name'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['fullname'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'Address'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['address1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'City'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'State'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['state'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'Zip'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['zip'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'Phone Number'), $this);?>
:</th><td><?php if ($this->_tpl_vars['edit'] == true): ?><input name='phone' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' size='50' maxlength='75' /><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?></td></tr>
        <tr><th><?php echo translate(array('text' => 'E-mail'), $this);?>
:</th><td><?php if ($this->_tpl_vars['edit'] == true): ?><input name='email' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' size='50' maxlength='75' /><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?></td></tr>
        <tr><th><?php echo translate(array('text' => 'Fines'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['fines'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'Expiration Date'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['expires'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'Home Library'), $this);?>
:</th><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['homeLocation'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
        <tr><th><?php echo translate(array('text' => 'My First Alternate Library'), $this);?>
:</th><td><?php if ($this->_tpl_vars['edit'] == true): ?><?php echo smarty_function_html_options(array('name' => 'myLocation1','options' => $this->_tpl_vars['locationList'],'selected' => $this->_tpl_vars['profile']['myLocation1Id']), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['myLocation1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?></td></tr>
        <tr><th><?php echo translate(array('text' => 'My Second Alternate Library'), $this);?>
:</th><td><?php if ($this->_tpl_vars['edit'] == true): ?><?php echo smarty_function_html_options(array('name' => 'myLocation2','options' => $this->_tpl_vars['locationList'],'selected' => $this->_tpl_vars['profile']['myLocation2Id']), $this);?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['myLocation2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?></td></tr>
        <?php if ($this->_tpl_vars['userIsStaff']): ?>
        <tr><th><?php echo translate(array('text' => 'Bypass Automatic Logout'), $this);?>
:</th><td><?php if ($this->_tpl_vars['edit'] == true): ?><input type='radio' name="bypassAutoLogout" value='yes' <?php if ($this->_tpl_vars['profile']['bypassAutoLogout'] == 1): ?>checked='checked'<?php endif; ?>/>Yes&nbsp;&nbsp;<input type='radio' name="bypassAutoLogout" value='no' <?php if ($this->_tpl_vars['profile']['bypassAutoLogout'] == 0): ?>checked='checked'<?php endif; ?>/>No<?php else: ?><?php if ($this->_tpl_vars['profile']['bypassAutoLogout'] == 0): ?>No<?php else: ?>Yes<?php endif; ?><?php endif; ?></td></tr>
        <?php endif; ?>        
      </table>
      
      <?php if ($this->_tpl_vars['canUpdate']): ?>
	      <?php if ($this->_tpl_vars['edit'] == true): ?>
	      <input type='submit' value='Update Profile' name='update'/>
	      <?php else: ?>
	      <input type='submit' value='Edit Personal Information' name='edit'/>
	      <?php endif; ?>
      <?php endif; ?>
      </form>
      
            <?php if (count ( $this->_tpl_vars['user']->roles ) > 0): ?>
      <h3><?php echo translate(array('text' => 'Your Roles'), $this);?>
</h3>
      <table class='citation'>
        <?php $_from = $this->_tpl_vars['user']->roles; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role']):
?>
          <tr><td><?php echo $this->_tpl_vars['role']; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?> 
      </table>
      <?php endif; ?>
      
    <?php else: ?>
      <div class="page">
      You must login to view this information. Click <a href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Login">here</a> to login.
    <?php endif; ?></div>
    <b class="bbot"><b></b></b>
    </div>
  
	</div>
</div>