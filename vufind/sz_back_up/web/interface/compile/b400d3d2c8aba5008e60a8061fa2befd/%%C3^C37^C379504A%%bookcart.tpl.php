<?php /* Smarty version 2.6.19, created on 2012-06-15 09:30:44
         compiled from bookcart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'bookcart.tpl', 29, false),array('modifier', 'escape', 'bookcart.tpl', 30, false),array('modifier', 'translate', 'bookcart.tpl', 50, false),)), $this); ?>
<div id="book_bag" style="display:none;">
    <div id="bag_open_button">
    <div class = "icon plus" id="bag_summary_holder">
      <span id ="bag_summary"></span> 
      <a href="#" id="bag_empty_button" class="empty_cart">empty cart</a> 
    </div>
  </div>
   
    <div id="book_bag_canvas" class="round left-side-round" style="display: none;">
        <div id="bag_items"></div>
    
     
    <div id="bag_actions">
            <div id="email_to_box" class="bag_box">
         <h3>Email Your Items</h3>
         To: 
         <input type="text" id="email_to_field" size="40" /><input type="button" class="bag_perform_action_button" value="Send" /> <a href="#" class="button round less-round bag_hide_button">Cancel</a>               
      </div>
      
      <div id="bookcart_login" class="bag_box">
        <h3>Login</h3>
          <div id='bag_login'>
            <form method="post" action="<?php echo $this->_tpl_vars['path']; ?>
/MyResearch/Home" id="loginForm_bookbag">
              <div>
              <?php echo translate(array('text' => 'Username'), $this);?>
: <br />
              <input type="text" name="username" id="bag_username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="25"/>
              <br />
              <?php echo translate(array('text' => 'Password'), $this);?>
:<br />
              <input type="password" name="password" id="bag_password" size="25"/>
              <br />
              <a href="#" class="button round less-round" id="bag_login_submit">Login</a>
              <a href="#" class="button round less-round bag_hide_button" id="bag_login_cancel">Cancel</a>
              </div>
           </form>
         </div>
        
      </div>
      
                
      <div id="save_to_my_list_tags" class="bag_box">
        <h3>Add Items To List</h3>
        <div id='bag_choose_list'>
	        <a href="#" class="button round less-round longer-button" id="new_list">Create a new List</a>
	        	        <div id='new_list_controls' style='display:none'>
						<?php if ($this->_tpl_vars['listError']): ?><p class="error"><?php echo ((is_array($_tmp=$this->_tpl_vars['listError'])) ? $this->_run_mod_handler('translate', true, $_tmp) : translate($_tmp)); ?>
</p><?php endif; ?>
						<form method="post" action="<?php echo $this->_tpl_vars['url']; ?>
/MyResearch/ListEdit" id="listForm"
						      onsubmit='bagAddList(this, &quot;<?php echo translate(array('text' => 'add_list_fail'), $this);?>
&quot;); return false;'>
						  <div>
						  <?php echo translate(array('text' => 'List'), $this);?>
:<br />
						  <input type="text" id="listTitle" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['list']->title)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" size="50"/><br />
						  <?php echo translate(array('text' => 'Description'), $this);?>
:<br />
						  <textarea name="desc" id="listDesc" rows="2" cols="40"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']->desc)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea><br />
						  <?php echo translate(array('text' => 'Access'), $this);?>
:<br />
						  <?php echo translate(array('text' => 'Public'), $this);?>
 <input type="radio" name="public" value="1" />
						  <?php echo translate(array('text' => 'Private'), $this);?>
 <input type="radio" name="public" value="0" checked="checked" /><br />
						  <input type="submit" name="submit" value="<?php echo translate(array('text' => 'Create List'), $this);?>
" />
              <a href="#" class="button round less-round longer-button" id="choose_existing_list">Select Existing List</a>
              <a href="#" class="button round less-round bag_hide_button">Cancel</a>
              </div>
						</form>
	        </div>
	        
	        	        <div id='existing_list_controls'>
		        - or -<br />
		        <?php echo translate(array('text' => 'Choose a List:'), $this);?>
<br />
		        <select name="bookbag_list_select" id="bookbag_list_select">
		          <?php $_from = $this->_tpl_vars['userLists']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
		          <option value="<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</option>
		          <?php endforeach; else: ?>
		          <option value=""><?php echo translate(array('text' => 'My Favorites'), $this);?>
</option>
		          <?php endif; unset($_from); ?>
		        </select>
		        <div id='bag_tags'>
		          Tags:<br /> <input type="text" id="save_tags_field" size="40"/><br />
		          Tags will apply to all items being added.  Use commas to separate tags. If you would like to have a comma within a tag, enclose it within quotes.
		        </div>
		        <input type="button" class="bag_perform_action_button" value="Add"/> 
		        <a href="#" class="button round less-round bag_hide_button">Cancel</a>
	        </div>
	      </div>
      </div>
      <div id="bag_action_in_progress" class="bag_box">                
          <span id="bag_action_in_progress_text">Processing....</span>
      </div>
      <div id="bag_errors" class="bag_box">Warning: <span id="bag_error_message"></span></div> 
    </div>
    
    <div id="bag_links">
      <div class="button round less-round longer-button logged-in-button" style="display: none;"><a href="#" id="bag_add_to_my_list_button" class="icon fav_bag">Save To List</a></div>  
      <div class="button round less-round"><a href="#" id="bag_email_button" class="icon email_bag">Email</a></div>    
      <div class="button round less-round longer-button" ><a href="#" id="bag_request_button" class="icon request_bag">Place Request</a></div>
      <div class="button round less-round"><a href="#" id="bag_print_button" class="icon print_bag">Print</a></div>
      <div class="button round less-round longer-button logged-out-button icon" id="login_bag">Login to Save to List</div>
   </div>
       
  </div>
</div> 