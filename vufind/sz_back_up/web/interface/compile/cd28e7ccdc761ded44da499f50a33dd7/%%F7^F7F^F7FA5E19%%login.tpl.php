<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:20
         compiled from MyResearch/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'MyResearch/login.tpl', 4, false),array('modifier', 'translate', 'MyResearch/login.tpl', 5, false),array('function', 'translate', 'MyResearch/login.tpl', 9, false),)), $this); ?>
<div data-role="page" id="MyResearch-login">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div data-role="content">
    <h3><?php echo ((is_array($_tmp=$this->_tpl_vars['pageTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
    <?php if ($this->_tpl_vars['message']): ?><div class="error"><?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</div><?php endif; ?>
    <?php if ($this->_tpl_vars['authMethod'] != 'Shibboleth'): ?>
    <form method="post" action="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" name="loginForm" data-ajax="false">
      <div data-role="fieldcontain">
        <label for="username"><?php echo translate(array('text' => 'Username'), $this);?>
:</label>
        <input id="username" type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
      </div>
      <div data-role="fieldcontain">
        <label for="password"><?php echo translate(array('text' => 'Password'), $this);?>
:</label>
        <input id="password" type="password" name="password"/>
        <input type="checkbox" id="showPwd" name="showPwd" onchange="return pwdToText('password')"/><label for="showPwd"><?php echo translate(array('text' => 'Reveal Password'), $this);?>
</label>
        <?php if (! $this->_tpl_vars['inLibrary']): ?>
        <input type="checkbox" id="rememberMe" name="rememberMe"/><label for="rememberMe"><?php echo translate(array('text' => 'Remember Me'), $this);?>
</label>
        <?php endif; ?>
      </div>
      <div data-role="fieldcontain">
        <input type="submit" name="submit" value="<?php echo translate(array('text' => 'Login'), $this);?>
"/>
      </div>
        <?php if ($this->_tpl_vars['followup']): ?><input type="hidden" name="followup" value="<?php echo $this->_tpl_vars['followup']; ?>
"/><?php endif; ?>
        <?php if ($this->_tpl_vars['followupModule']): ?><input type="hidden" name="followupModule" value="<?php echo $this->_tpl_vars['followupModule']; ?>
"/><?php endif; ?>
        <?php if ($this->_tpl_vars['followupAction']): ?><input type="hidden" name="followupAction" value="<?php echo $this->_tpl_vars['followupAction']; ?>
"/><?php endif; ?>
        <?php if ($this->_tpl_vars['recordId']): ?><input type="hidden" name="recordId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['recordId'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/><?php endif; ?>
        <?php if ($this->_tpl_vars['comment']): ?><input type="hidden" name="comment" name="comment" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/><?php endif; ?>
      </form>
      <?php if ($this->_tpl_vars['authMethod'] == 'DB'): ?><a rel="external" data-role="button" href="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Account"><?php echo translate(array('text' => 'Create New Account'), $this);?>
</a><?php endif; ?>
    <?php endif; ?>
  </div>    
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
