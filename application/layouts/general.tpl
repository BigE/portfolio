<?php echo $tpl->doctype('XHTML_10_STRICT'); ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<base href="<?php echo SITECH_BASEURI; ?>" />
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/general.css" />
		<link rel="stylesheet" href="css/hot-sneaks/jquery-ui-1.8.9.custom.css" />
		<?php if (isset($css) && is_array($css)): foreach ($css as $s): ?>
		<link rel="stylesheet" href="css/<?php echo $s; ?>" />
		<?php endforeach; endif; ?>
		<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>
		<script src="js/general.js" type="text/javascript"></script>
		<script src="js/contact.js" type="text/javascript"></script>
		<title>Eric Gach's Portfolio</title>
	</head>
	<body>
		<div id="main" class="ui-widget">
			<div id="header" class="ui-widget-header ui-corner-bottom">
				<h1>Test</h1>
			</div>
			<div id="content">
				<?php echo $content; ?>
				<br style="clear: both;" />
			</div>
			<div id="footer" class="ui-widget-header ui-corner-top">
				Copyright &copy; 2009-2011 - <a id="contact" href="contact.html">Eric Gach</a> - All Rights Reserved
			</div>
		</div>
	</body>
</html>