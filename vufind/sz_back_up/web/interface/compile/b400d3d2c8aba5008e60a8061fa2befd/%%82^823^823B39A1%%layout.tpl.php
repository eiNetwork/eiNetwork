<?php /* Smarty version 2.6.19, created on 2012-06-20 12:06:13
         compiled from layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'layout.tpl', 5, false),array('modifier', 'escape', 'layout.tpl', 120, false),array('function', 'css', 'layout.tpl', 9, false),array('function', 'translate', 'layout.tpl', 77, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="<?php echo $this->_tpl_vars['userLang']; ?>
"><?php echo '<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><title>'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['pageTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 64, "...") : smarty_modifier_truncate($_tmp, 64, "...")); ?><?php echo '</title>'; ?><?php if ($this->_tpl_vars['addHeader']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['addHeader']; ?><?php echo ''; ?><?php endif; ?><?php echo '<link rel="search" type="application/opensearchdescription+xml" title="Library Catalog Search" href="'; ?><?php echo $this->_tpl_vars['url']; ?><?php echo '/Search/OpenSearch?method=describe" />'; ?><?php if ($this->_tpl_vars['consolidateCss']): ?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "consolidated_css.css"), $this);?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "jqueryui.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "styles.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "basicHtml.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "top-menu.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "library-footer.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "title-scroller.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "my-account.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "holdingsSummary.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "ratings.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "book-bag.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "jquery.tooltip.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "tooltip.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "record.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "search-results.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "suggestions.css"), $this);?><?php echo ''; ?><?php echo smarty_function_css(array('filename' => "reports.css"), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo smarty_function_css(array('media' => 'print','filename' => "print.css"), $this);?><?php echo '<script type="text/javascript">path = \''; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '\';loggedIn = '; ?><?php if ($this->_tpl_vars['user']): ?><?php echo 'true'; ?><?php else: ?><?php echo 'false'; ?><?php endif; ?><?php echo ';</script>'; ?><?php if ($this->_tpl_vars['consolidateJs']): ?><?php echo '<script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/API/ConsolidatedJs"></script>'; ?><?php else: ?><?php echo '<script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/jquery-1.7.1.min.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/jqueryui/jquery-ui-1.8.18.custom.min.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/jquery.plugins.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/scripts.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/tablesorter/jquery.tablesorter.min.js"></script>'; ?><?php if ($this->_tpl_vars['enableBookCart']): ?><?php echo '<script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/bookcart/json2.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/bookcart/bookcart.js"></script>'; ?><?php endif; ?><?php echo ''; ?><?php echo '<script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/title-scroller.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/services/Search/ajax.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/services/Record/ajax.js"></script><script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/overdrive.js"></script>'; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['includeAutoLogoutCode'] == true): ?><?php echo '<script type="text/javascript" src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo '/js/autoLogout.js"></script>'; ?><?php endif; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['theme_css'] )): ?><?php echo '<link rel="stylesheet" type="text/css" href="'; ?><?php echo $this->_tpl_vars['theme_css']; ?><?php echo '" />'; ?><?php endif; ?><?php echo '</head><body class="'; ?><?php echo $this->_tpl_vars['module']; ?><?php echo ' '; ?><?php echo $this->_tpl_vars['action']; ?><?php echo '">'; ?><?php echo '<script type="text/javascript">'; ?><?php echo '
    jQuery(function (){
      jQuery(\'#'; ?><?php echo ''; ?><?php echo $this->_tpl_vars['focusElementId']; ?><?php echo ''; ?><?php echo '\').focus();
    });'; ?><?php echo '</script><!-- Current Physical Location: '; ?><?php echo $this->_tpl_vars['physicalLocation']; ?><?php echo ' -->'; ?><?php echo '<div id="lightboxLoading" class="lightboxLoading" style="display: none;">'; ?><?php echo translate(array('text' => 'Loading'), $this);?><?php echo '...</div><div id="lightboxError" style="display: none;">'; ?><?php echo translate(array('text' => 'lightbox_error'), $this);?><?php echo '</div><div id="lightbox" onclick="hideLightbox(); return false;"></div><div id="popupbox" class="popupBox"></div>'; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bookcart.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<div id="pageBody" class="'; ?><?php echo $this->_tpl_vars['page_body_style']; ?><?php echo '">'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top-menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<div class="searchheader"><div class="searchcontent"><a href="'; ?><?php if ($this->_tpl_vars['homeLink']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['homeLink']; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['url']; ?><?php echo ''; ?><?php endif; ?><?php echo '"><img src="'; ?><?php echo $this->_tpl_vars['path']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['smallLogo']; ?><?php echo '" alt="VuFind" class="alignleft" /></a>'; ?><?php if ($this->_tpl_vars['pageTemplate'] != 'advanced.tpl'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['module'] == 'Summon'): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Summon/searchbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['module'] == 'WorldCat'): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "WorldCat/searchbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Search/searchbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '<div class="clearer">&nbsp;</div></div></div>'; ?><?php if ($this->_tpl_vars['showBreadcrumbs']): ?><?php echo '<div class="breadcrumbs"><div class="breadcrumbinner"><a href="'; ?><?php echo $this->_tpl_vars['url']; ?><?php echo '">'; ?><?php echo translate(array('text' => 'Home'), $this);?><?php echo '</a> <span>&gt;</span>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/breadcrumbs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div></div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['useSolr'] || $this->_tpl_vars['useWorldcat'] || $this->_tpl_vars['useSummon']): ?><?php echo '<div id="toptab"><ul>'; ?><?php if ($this->_tpl_vars['useSolr']): ?><?php echo '<li'; ?><?php if ($this->_tpl_vars['module'] != 'WorldCat' && $this->_tpl_vars['module'] != 'Summon'): ?><?php echo ' class="active"'; ?><?php endif; ?><?php echo '><a href="'; ?><?php echo $this->_tpl_vars['url']; ?><?php echo '/Search/Results?lookfor='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?><?php echo '">'; ?><?php echo translate(array('text' => 'University Library'), $this);?><?php echo '</a></li>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['useWorldcat']): ?><?php echo '<li'; ?><?php if ($this->_tpl_vars['module'] == 'WorldCat'): ?><?php echo ' class="active"'; ?><?php endif; ?><?php echo '><a href="'; ?><?php echo $this->_tpl_vars['url']; ?><?php echo '/WorldCat/Search?lookfor='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?><?php echo '">'; ?><?php echo translate(array('text' => 'Other Libraries'), $this);?><?php echo '</a></li>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['useSummon']): ?><?php echo '<li'; ?><?php if ($this->_tpl_vars['module'] == 'Summon'): ?><?php echo ' class="active"'; ?><?php endif; ?><?php echo '><a href="'; ?><?php echo $this->_tpl_vars['url']; ?><?php echo '/Summon/Search?lookfor='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['lookfor'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?><?php echo '">'; ?><?php echo translate(array('text' => 'Journal Articles'), $this);?><?php echo '</a></li>'; ?><?php endif; ?><?php echo '</ul></div><div style="clear: left;"></div>'; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['module'])."/".($this->_tpl_vars['pageTemplate']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['hold_message']): ?><?php echo '<script type="text/javascript">lightbox();document.getElementById(\'popupbox\').innerHTML = "'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['hold_message'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?><?php echo '";</script>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['renew_message']): ?><?php echo '<script type="text/javascript">lightbox();document.getElementById(\'popupbox\').innerHTML = "'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['renew_message'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?><?php echo '";</script>'; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "library-footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div> '; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['productionServer']): ?><?php echo ''; ?><?php echo '
	<!-- <script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push([\'_setAccount\', \'{* Your tracking code goes here *}\']);
	  _gaq.push([\'_trackPageview\']);
	  _gaq.push([\'_trackPageLoadTime\']);
	
	  (function() {
	    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
	    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
	    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>  -->
	'; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['user'] && $this->_tpl_vars['user']->disableRecommendations == 0 && $this->_tpl_vars['strandsAPID']): ?><?php echo ''; ?><?php echo '
	  <script type="text/javascript">
	
	  //This code can actually be used anytime to achieve an "Ajax" submission whenever called
	  if (typeof StrandsTrack=="undefined"){StrandsTrack=[];}
	    
	  StrandsTrack.push({
	     event:"userlogged",
	     user: "'; ?><?php echo ''; ?><?php echo $this->_tpl_vars['user']->id; ?><?php echo ''; ?><?php echo '"
	  });
	    
	  </script>
	  '; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['strandsAPID']): ?><?php echo ''; ?><?php echo '
  <!-- Strands Library MUST be included at the end of the HTML Document, before the /body closing tag and JUST ONCE -->
  <script type="text/javascript" src="http://bizsolutions.strands.com/sbsstatic/js/sbsLib-1.0.min.js"></script>
  <script type="text/javascript">
    try{ SBS.Worker.go("vFR4kNOW4b"); } catch (e){};
  </script>'; ?><?php echo ''; ?><?php endif; ?><?php echo '</body></html>'; ?>