<?php /* Smarty version 2.6.19, created on 2012-06-19 13:51:50
         compiled from Admin/userSuggestions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'Admin/userSuggestions.tpl', 34, false),array('modifier', 'date_format', 'Admin/userSuggestions.tpl', 37, false),)), $this); ?>
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
          <h1>User Suggestions</h1>
          <?php if ($this->_tpl_vars['showHidden'] == false): ?>
          <a href='<?php echo $this->_tpl_vars['url']; ?>
/Admin/UserSuggestions'>Hide Hidden Suggestions</a>
          <?php else: ?>
          <a href='<?php echo $this->_tpl_vars['url']; ?>
/Admin/UserSuggestions?showHidden'>Show Hidden Suggestions</a>
          <?php endif; ?>
          <br />
          <form name='suggestions' method="post">
          <div class='adminTableRegion' style='overflow:auto;'>
          <table class="adminTable" id='suggestions'>
            <thead>
                <tr>
                  <th id='nameHeader' class='headerCell'><label title='The name of the user who entered the suggestion'>Name</label></th>
                  <th id='emailHeader' class='headerCell'><label title='The email address of the user who entered the suggestion'>E-mail</label></th>
                  <th id='suggestionHeader' class='headerCell'><label title='The text of the suggestion'>Suggestion</label></th>
                  <th id='enteredOnHeader' class='headerCell'><label title='When the suggestion was entered'>Entered On</label></th>
                  <th id='hideHeader' class='headerCell'><label title='Check to remove the hide the suggestion from view.'>Hide?</label></th>
                  <th id='notesHeader' class='headerCell'><label title='Internal notes by an administrator if needed.'>Internal Notes</label></th>
                  <th id='deleteHeader' class='headerCell'><label title='Check to remove the Suggestion from the system.'>Delete?</label></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset ( $this->_tpl_vars['suggestions'] ) && is_array ( $this->_tpl_vars['suggestions'] )): ?>
                    <?php $_from = $this->_tpl_vars['suggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['suggestion']):
?>
                    <tr>
                      <td><input type='hidden' name='id[<?php echo $this->_tpl_vars['id']; ?>
]' value='<?php echo $this->_tpl_vars['id']; ?>
'/><?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
                      <td><a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->email)) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->email)) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a></td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->suggestion)) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->enteredOn)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
</td>
                      <td class='hide'><input type='checkbox' name='hide[<?php echo $this->_tpl_vars['id']; ?>
]' <?php if ($this->_tpl_vars['suggestion']->hide == 1): ?>checked='checked'<?php endif; ?>/></td>
                      <td class='notes'><textarea name='internalNotes[<?php echo $this->_tpl_vars['id']; ?>
]'><?php echo ((is_array($_tmp=$this->_tpl_vars['suggestion']->internalNotes)) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</textarea></td>
                      <td class='delete'><input type='checkbox' name='delete[<?php echo $this->_tpl_vars['id']; ?>
]'/></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </tbody>
          </table>
          </div>
          <input type="submit" name="submit" value="Save Changes"/>
          </form>
  </div>
</div>