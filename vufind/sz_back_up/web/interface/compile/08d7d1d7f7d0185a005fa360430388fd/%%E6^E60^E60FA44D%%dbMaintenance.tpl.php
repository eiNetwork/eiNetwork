<?php /* Smarty version 2.6.19, created on 2012-06-19 15:52:30
         compiled from Admin/dbMaintenance.tpl */ ?>
<div id="page-content" class="content">
  <?php if ($this->_tpl_vars['error']): ?><p class="error"><?php echo $this->_tpl_vars['error']; ?>
</p><?php endif; ?> 
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
    <h1>Database Maintenance</h1>
    <div id="maintenanceOptions"></div>
    <form id="dbMaintenance" action="<?php echo $this->_tpl_vars['path']; ?>
/Admin/<?php echo $this->_tpl_vars['action']; ?>
">
    <div>
    <table>
    <thead>
      <tr>
        <th><input type="checkbox" id="selectAll" onclick="toggleCheckboxes('.selectedUpdate', $('#selectAll').attr('checked'));"/></th>
        <th>Name</th>
        <th>Description</th>
        <th>Already Run?</th>
        <?php if ($this->_tpl_vars['showStatus']): ?>
        <th>Status</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['sqlUpdates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['updateKey'] => $this->_tpl_vars['update']):
?>
      <tr class="<?php if ($this->_tpl_vars['update']['alreadyRun']): ?>updateRun<?php else: ?>updateNotRun<?php endif; ?>" <?php if ($this->_tpl_vars['update']['alreadyRun']): ?>style="display:none"<?php endif; ?>>
        <td><input type="checkbox" name="selected[<?php echo $this->_tpl_vars['updateKey']; ?>
]" <?php if (! $this->_tpl_vars['update']['alreadyRun']): ?>checked="checked"<?php endif; ?> class="selectedUpdate"/></td>
        <td><?php echo $this->_tpl_vars['update']['title']; ?>
</td>
        <td><?php echo $this->_tpl_vars['update']['description']; ?>
</td>
        <td><?php if ($this->_tpl_vars['update']['alreadyRun']): ?>Yes<?php else: ?>No<?php endif; ?></td>
        <?php if ($this->_tpl_vars['showStatus']): ?>
        <td><?php echo $this->_tpl_vars['update']['status']; ?>
</td>
        <?php endif; ?>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
    </table>
    <input type="submit" name="submit" class="button" value="Run Selected Updates"/>
    <input type="checkbox" name="hideUpdatesThatWereRun" id="hideUpdatesThatWereRun" checked="checked" onclick="$('.updateRun').toggle();"><label for="hideUpdatesThatWereRun">Hide updates that have been run</label>
    </div>
    </form>
    
  </div>
</div>