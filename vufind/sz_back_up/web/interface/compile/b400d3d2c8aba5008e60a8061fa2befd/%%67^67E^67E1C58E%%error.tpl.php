<?php /* Smarty version 2.6.19, created on 2012-06-19 10:38:56
         compiled from error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'error.tpl', 149, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<?php echo '
<title>An Error has Occurred</title>
<style>


html { overflow:hidden; }
body { font: 60px \'SilkscreenNormal\', Arial, sans-serif; letter-spacing:0; background:#25d; color:#fff; }

/* Thanks, http://www.colorzilla.com/gradient-editor/ */
#container {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: #083a7f;
	background: -moz-linear-gradient(top, #083a7f 0%, #242b3d 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#083a7f), color-stop(100%,#242b3d));
	background: -webkit-linear-gradient(top, #083a7f 0%,#242b3d 100%);
	background: -o-linear-gradient(top, #083a7f 0%,#242b3d 100%);
	background: -ms-linear-gradient(top, #083a7f 0%,#242b3d 100%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#083a7f\', endColorstr=\'#242b3d\', GradientType=0);
	background: linear-gradient(top, #083a7f 0%,#242b3d 100%);
}

h1, h2 { margin:0; text-shadow:0 5px 0px rgba(0,0,0,.2); }
h1 { font-size:1em; }
h2 { font-size:.5em; }
a { color:#fff; }
h3 { font-size:.25em; margin:1em 50px; }
h3, h3 a { color:#6b778d; }
h3 img { margin:0 3px; }
h4 { font-size:.30em; margin:1em 50px; }
h4, h4 a { color:#ffffff; }

#title { position:absolute; top:50%; width:100%; height:322px; margin-top:-180px; text-align:center; z-index:10; }
#debug { position:absolute; top:75%; width:50%; margin-left:25%; height:20%; text-align:left; z-index:10;overflow:auto; font-size:11px; }
#debug h4 { font-size:13px; margin: 1em 0px;}
.cloud { position:absolute; display:block;}
.puff { position:absolute; display:block; width:15px; height:15px; background:white; opacity:.05; filter:alpha(opacity=5); }

</style>
<script>
function randomInt(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min
}

function randomChoice(items) {
	return items[randomInt(0, items.length-1)]
}

var PIXEL_SIZE = 25

function makeCloud() {
	var w = 8,
		h = 5,
		maxr = Math.sqrt(w*w + h*h),
		density = .4

	var cloud = document.createElement(\'div\')
	cloud.className = \'cloud\'
	for (var x=-w; x<=w; x++) {
		for (var y=-h; y<=h; y++) {
			r = Math.sqrt(x*x + y*y)
			if (r/maxr < Math.pow(Math.random(), density)) {
				var puff = document.createElement(\'div\')
				puff.className = \'puff\'
				puff.style.left = (x + w) * PIXEL_SIZE + \'px\'
				puff.style.top = (y + h) * PIXEL_SIZE + \'px\'
				cloud.appendChild(puff)
			}
		}
	}
	return cloud
}

clouds = []

function randomPosition(max) {
	return Math.round(randomInt(-400, max)/PIXEL_SIZE)*PIXEL_SIZE
}

function addCloud(randomLeft) {
	var cloudiness = .3

	if (Math.random() < cloudiness) {
		newCloud = {
			x: randomLeft ? randomPosition(document.documentElement.clientWidth) : -400,
			el: makeCloud()
		}

		newCloud.el.style.top = randomPosition(document.documentElement.clientHeight) + \'px\'
		newCloud.el.style.left = newCloud.x + \'px\'
		document.body.appendChild(newCloud.el)
		clouds.push(newCloud)
	}
}

function animateClouds() {
	var speed = 25

	addCloud()

	var newClouds = []
	for (var i=0; i<clouds.length; i++) {
		var cloud = clouds[i]
		cloud.x += speed

		if (cloud.x > document.documentElement.clientWidth) {
			document.body.removeChild(cloud.el)
		} else {
			cloud.el.style.left = cloud.x + \'px\'
			newClouds.push(cloud)
		}
	}

	clouds = newClouds
}

function start() {
	if (arguments.callee.ran) { return; }
	arguments.callee.ran = true

	setInterval(animateClouds, 2*1000)

	for (n=0; n<50; n++) {
		addCloud(true)
	}
}

if (document.addEventListener) {
	document.addEventListener(\'DOMContentLoaded\', start, false)
}
window.onload = start
</script>
'; ?>

</head>
<body>
	<div id="container">
		<div id="title">
			
			<h1>Oops, an error occurred</h1>
			<h2>This error has been logged and we are working on a fix.</h2>
			<h4><?php echo $this->_tpl_vars['error']->getMessage(); ?>
</h4>
			<h4><?php echo translate(array('text' => 'Please contact the Library Reference Department for assistance'), $this);?>
<br /></h4>
    	<h4><a href="mailto:<?php echo $this->_tpl_vars['supportEmail']; ?>
"><?php echo $this->_tpl_vars['supportEmail']; ?>
</a></h4>
		</div>
		<div id ="debug">
			<?php if ($this->_tpl_vars['debug']): ?>
			  <h4><?php echo translate(array('text' => 'Debug Information'), $this);?>
</h4>
				<p class="errorStmt"><?php echo $this->_tpl_vars['error']->getDebugInfo(); ?>
</p>
			  <?php $this->assign('errorCode', $this->_tpl_vars['error']->getCode()); ?>
			  <?php if ($this->_tpl_vars['errorCode']): ?>
			  <p class="errorMsg"><?php echo translate(array('text' => 'Code'), $this);?>
: <?php echo $this->_tpl_vars['errorCode']; ?>
</p>
			  <?php endif; ?>
			  <p><?php echo translate(array('text' => 'Backtrace'), $this);?>
:</p>
			  <?php $_from = $this->_tpl_vars['error']->backtrace; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trace']):
?>
			    [<?php echo $this->_tpl_vars['trace']['line']; ?>
] <?php echo $this->_tpl_vars['trace']['file']; ?>
<br />
			  <?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		</div>
	</div>
	
</body>
</html>