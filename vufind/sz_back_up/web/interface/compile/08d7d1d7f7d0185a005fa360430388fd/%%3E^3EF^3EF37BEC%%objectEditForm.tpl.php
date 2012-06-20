<?php /* Smarty version 2.6.19, created on 2012-06-19 13:08:14
         compiled from DataObjectUtil/objectEditForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'DataObjectUtil/objectEditForm.tpl', 36, false),array('modifier', 'string_format', 'DataObjectUtil/objectEditForm.tpl', 87, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['path']; ?>
/js/validate/jquery.validate.min.js" ></script>
<?php if (isset ( $this->_tpl_vars['errors'] ) && count ( $this->_tpl_vars['errors'] ) > 0): ?>
  <div id='errors'>
  <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
    <div id='error'><?php echo $this->_tpl_vars['error']; ?>
</div>
  <?php endforeach; endif; unset($_from); ?>
  </div>
<?php endif; ?>

<form id='objectEditor' method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['submitUrl']; ?>
">
  <?php echo '
  <script type="text/javascript">
  $(document).ready(function(){
    $("#objectEditor").validate();
  });
  </script>
  '; ?>

  
  <div class='editor'>
    <input type='hidden' name='objectAction' value='save' />
    <input type='hidden' name='id' value='<?php echo $this->_tpl_vars['id']; ?>
' />
    
    <?php $_from = $this->_tpl_vars['structure']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['property']):
?>
      <?php $this->assign('propName', $this->_tpl_vars['property']['property']); ?>
      <?php $this->assign('propValue', $this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propName']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}); ?>
      <?php if (( ( ! isset ( $this->_tpl_vars['property']['storeDb'] ) || $this->_tpl_vars['property']['storeDb'] == true ) && ! ( $this->_tpl_vars['property']['type'] == 'label' || $this->_tpl_vars['property']['type'] == 'oneToManyAssociation' || $this->_tpl_vars['property']['type'] == 'hidden' || $this->_tpl_vars['property']['type'] == 'method' ) )): ?>
        <div class='propertyInput' id="propertyRow<?php echo $this->_tpl_vars['propName']; ?>
">
	        	        <label for='<?php echo $this->_tpl_vars['propName']; ?>
' class='objectLabel'><?php echo $this->_tpl_vars['property']['label']; ?>
</label>
          
	        	        <?php if ($this->_tpl_vars['property']['type'] == 'text' || $this->_tpl_vars['property']['type'] == 'folder' || $this->_tpl_vars['property']['type'] == 'integer'): ?>
	          <br/>
	          <input type='<?php echo $this->_tpl_vars['property']['type']; ?>
' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' <?php if ($this->_tpl_vars['property']['maxLength']): ?>maxlength='<?php echo $this->_tpl_vars['property']['maxLength']; ?>
'<?php endif; ?> <?php if ($this->_tpl_vars['property']['size']): ?>size='<?php echo $this->_tpl_vars['property']['size']; ?>
'<?php endif; ?> title='<?php echo $this->_tpl_vars['property']['description']; ?>
' class='<?php if ($this->_tpl_vars['property']['required']): ?>required<?php endif; ?>'/>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'url'): ?>
	          <br/>
	          <input type='text' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' <?php if ($this->_tpl_vars['property']['maxLength']): ?>maxlength='<?php echo $this->_tpl_vars['property']['maxLength']; ?>
'<?php endif; ?> <?php if ($this->_tpl_vars['property']['size']): ?>size='<?php echo $this->_tpl_vars['property']['size']; ?>
'<?php endif; ?> title='<?php echo $this->_tpl_vars['property']['description']; ?>
' class='url <?php if ($this->_tpl_vars['property']['required']): ?>required<?php endif; ?>' />
      
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'date'): ?>
	          <input type='<?php echo $this->_tpl_vars['property']['type']; ?>
' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' value='<?php echo $this->_tpl_vars['propValue']; ?>
' <?php if ($this->_tpl_vars['property']['maxLength']): ?>maxLength='10'<?php endif; ?>  class='<?php if ($this->_tpl_vars['property']['required']): ?>required<?php endif; ?> date'/>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'partialDate'): ?>
	          <?php $this->assign('propNameMonth', $this->_tpl_vars['property']['propNameMonth']); ?>
	          <?php $this->assign('propNameDay', $this->_tpl_vars['property']['propNameDay']); ?>
	          <?php $this->assign('propNameYear', $this->_tpl_vars['property']['propNameYear']); ?>
	          Month: <select name='<?php echo $this->_tpl_vars['propNameMonth']; ?>
' id='<?php echo $this->_tpl_vars['propNameMonth']; ?>
' >
	            <option value=""></option>
	            <option value="1" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '1'): ?>selected='selected'<?php endif; ?>>January</option>
	            <option value="2" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '2'): ?>selected='selected'<?php endif; ?>>February</option>
	            <option value="3" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '3'): ?>selected='selected'<?php endif; ?>>March</option>
	            <option value="4" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '4'): ?>selected='selected'<?php endif; ?>>April</option>
	            <option value="5" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '5'): ?>selected='selected'<?php endif; ?>>May</option>
	            <option value="6" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '6'): ?>selected='selected'<?php endif; ?>>June</option>
	            <option value="7" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '7'): ?>selected='selected'<?php endif; ?>>July</option>
	            <option value="8" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '8'): ?>selected='selected'<?php endif; ?>>August</option>
	            <option value="9" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '9'): ?>selected='selected'<?php endif; ?>>September</option>
	            <option value="10" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '10'): ?>selected='selected'<?php endif; ?>>October</option>
	            <option value="11" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '11'): ?>selected='selected'<?php endif; ?>>November</option>
	            <option value="12" <?php if ($this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameMonth']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '12'): ?>selected='selected'<?php endif; ?>>December</option>
	            </select>
	          Day: <input type='text' name='<?php echo $this->_tpl_vars['propNameDay']; ?>
' id='<?php echo $this->_tpl_vars['propNameDay']; ?>
' value='<?php echo $this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameDay']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}; ?>
' maxLength='2' size='2'/>
	          Year: <input type='text' name='<?php echo $this->_tpl_vars['propNameYear']; ?>
' id='<?php echo $this->_tpl_vars['propNameYear']; ?>
' value='<?php echo $this->_tpl_vars['object']->{(($_var=$this->_tpl_vars['propNameYear']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}; ?>
' maxLength='4' size='4'/>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'textarea' || $this->_tpl_vars['property']['type'] == 'html' || $this->_tpl_vars['property']['type'] == 'crSeparated'): ?>
	          <br/><textarea name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' rows='<?php echo $this->_tpl_vars['property']['rows']; ?>
' cols='<?php echo $this->_tpl_vars['property']['cols']; ?>
' title='<?php echo $this->_tpl_vars['property']['description']; ?>
' class='<?php if ($this->_tpl_vars['property']['required']): ?>required<?php endif; ?>'><?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
	          <?php if ($this->_tpl_vars['property']['type'] == 'html'): ?>
              <script type="text/javascript">
							<?php echo '
							CKEDITOR.replace( \''; ?>
<?php echo $this->_tpl_vars['propName']; ?>
<?php echo '\',
							    {
							          toolbar : \'Basic\'
							    });
							'; ?>

							</script>
            <?php endif; ?>
            
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'password'): ?>
	          <input type='password' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
'/>
	          Repeat the Password:
	          <input type='password' name='<?php echo $this->_tpl_vars['propName']; ?>
Repeat' />
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'currency'): ?>
	          <?php $this->assign('propDisplayFormat', $this->_tpl_vars['property']['displayFormat']); ?>
	          <input type='text' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['propDisplayFormat']) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['propDisplayFormat'])); ?>
'></input>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'label'): ?>
	          <div id='<?php echo $this->_tpl_vars['propName']; ?>
'><?php echo $this->_tpl_vars['propValue']; ?>
</div>
	          
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'html'): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "DataObjectUtil/htmlField.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'enum'): ?>
	          <select name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
Select'>
	          <?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
	            <option value='<?php echo $this->_tpl_vars['propertyValue']; ?>
' <?php if ($this->_tpl_vars['propValue'] == $this->_tpl_vars['propertyValue']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['propertyName']; ?>
</option>
	          <?php endforeach; endif; unset($_from); ?>
	          </select>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'multiSelect'): ?>
	          <?php if (isset ( $this->_tpl_vars['property']['listStyle'] ) && $this->_tpl_vars['property']['listStyle'] == 'checkbox'): ?>
	            <?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
	              <br /><input name='<?php echo $this->_tpl_vars['propName']; ?>
[<?php echo $this->_tpl_vars['propertyValue']; ?>
]' type="checkbox" value='<?php echo $this->_tpl_vars['propertyValue']; ?>
' <?php if (is_array ( $this->_tpl_vars['propValue'] ) && in_array ( $this->_tpl_vars['propertyValue'] , array_keys ( $this->_tpl_vars['propValue'] ) )): ?>checked='checked'<?php endif; ?>><?php echo $this->_tpl_vars['propertyName']; ?>
</input>
	            <?php endforeach; endif; unset($_from); ?>
	          <?php else: ?>
	            <br />
	            <select name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' multiple="multiple">
	            <?php $_from = $this->_tpl_vars['property']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['propertyValue'] => $this->_tpl_vars['propertyName']):
?>
	              <option value='<?php echo $this->_tpl_vars['propertyValue']; ?>
' <?php if ($this->_tpl_vars['propValue'] == $this->_tpl_vars['propertyValue']): ?>selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['propertyName']; ?>
</option>
	            <?php endforeach; endif; unset($_from); ?>
	            </select>
	          <?php endif; ?>
	        
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'image' || $this->_tpl_vars['property']['type'] == 'file'): ?>
	          <br />
	          <?php if ($this->_tpl_vars['propValue']): ?>
	          	<?php if ($this->_tpl_vars['property']['type'] == 'image'): ?>
		            <img src='<?php echo $this->_tpl_vars['path']; ?>
/files/thumbnail/<?php echo $this->_tpl_vars['propValue']; ?>
'/><?php echo $this->_tpl_vars['propValue']; ?>

		            <input type='checkbox' name='remove<?php echo $this->_tpl_vars['propName']; ?>
' id='remove<?php echo $this->_tpl_vars['propName']; ?>
' /> Remove image.
		            <br/>
		          <?php else: ?>
		          	Existing file: <?php echo $this->_tpl_vars['propValue']; ?>

		          	<input type='hidden' name='<?php echo $this->_tpl_vars['propName']; ?>
_existing' id='<?php echo $this->_tpl_vars['propName']; ?>
_existing' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['propValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' /> 
		          	
		          <?php endif; ?>
	          <?php endif; ?>
	          	          <input type="file" name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' size="80"/>
	              
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'checkbox'): ?>
	          <input type='<?php echo $this->_tpl_vars['property']['type']; ?>
' name='<?php echo $this->_tpl_vars['propName']; ?>
' id='<?php echo $this->_tpl_vars['propName']; ?>
' <?php if (( $this->_tpl_vars['propValue'] == 1 )): ?>checked='checked'<?php endif; ?>/>
	          
	        <?php elseif ($this->_tpl_vars['property']['type'] == 'oneToMany'): ?>
	        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "DataObjectUtil/oneToMany.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	        	
	        <?php endif; ?>
	        
		    </div>
	    <?php elseif ($this->_tpl_vars['property']['type'] == 'hidden'): ?>  
	      <input type='hidden' name='<?php echo $this->_tpl_vars['propName']; ?>
' value='<?php echo $this->_tpl_vars['propValue']; ?>
' />
	    <?php endif; ?>
	    <?php if ($this->_tpl_vars['property']['showDescription']): ?>
	    	<div class='propertyDescription'><?php echo $this->_tpl_vars['property']['description']; ?>
</div>
	    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <input type="submit" name="submit" value="Save Changes"/>
  </div>          
</form>