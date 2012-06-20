<?php /* Smarty version 2.6.19, created on 2012-06-18 13:11:04
         compiled from layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'layout.tpl', 7, false),array('function', 'js', 'layout.tpl', 18, false),array('function', 'css', 'layout.tpl', 24, false),array('function', 'translate', 'layout.tpl', 35, false),)), $this); ?>
<!DOCTYPE html> 
<html> 
  <head>
    <meta charset="utf-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/> 
    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['site']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

        <script type="text/javascript">
    //<![CDATA[
      var path = '<?php echo $this->_tpl_vars['path']; ?>
';
      var loggedIn = <?php if ($this->_tpl_vars['user']): ?>true<?php else: ?>false<?php endif; ?>;
    //]]>
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4/jquery.mobile-1.0a4.min.css" />
    <?php echo smarty_function_js(array('filename' => "jquery-1.7.1.min.js"), $this);?>

    <?php echo smarty_function_js(array('filename' => "common.js"), $this);?>

    <?php echo smarty_function_js(array('filename' => "jquery_cookie.js"), $this);?>

    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4/jquery.mobile-1.0a4.min.js"></script>
    <?php echo smarty_function_js(array('filename' => "cart_cookie.js"), $this);?>

    <?php echo smarty_function_js(array('filename' => "cart.js"), $this);?>
    
    <?php echo smarty_function_css(array('filename' => "styles.css"), $this);?>

    <?php echo smarty_function_css(array('filename' => "formats.css"), $this);?>

  </head> 
  <body>
    <?php if ($this->_tpl_vars['hold_message']): ?>
     <?php echo $this->_tpl_vars['hold_message']; ?>

    <?php else: ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/".($this->_tpl_vars['pageTemplate']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
    <?php endif; ?>
    <div data-role="dialog" id="Language-dialog">
      <div data-role="header" data-theme="d" data-position="inline">
        <h1><?php echo translate(array('text' => 'Language'), $this);?>
</h1>
      </div>
      <div data-role="content">
        <?php if (is_array ( $this->_tpl_vars['allLangs'] ) && count ( $this->_tpl_vars['allLangs'] ) > 1): ?>
        <form method="post" name="langForm" action="#" id="langForm" data-ajax="false">
          <div data-role="fieldcontain">
            <label for="langForm_mylang"><?php echo translate(array('text' => 'Language'), $this);?>
:</label>
            <select id="langForm_mylang" name="mylang">
              <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langCode'] => $this->_tpl_vars['langName']):
?>
                <option value="<?php echo $this->_tpl_vars['langCode']; ?>
"<?php if ($this->_tpl_vars['userLang'] == $this->_tpl_vars['langCode']): ?> selected="selected"<?php endif; ?>><?php echo translate(array('text' => $this->_tpl_vars['langName']), $this);?>
</option>
              <?php endforeach; endif; unset($_from); ?>
            </select>
            <input type="submit" value="<?php echo translate(array('text' => 'Set'), $this);?>
" />
          </div>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>