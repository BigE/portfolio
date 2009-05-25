<?php
echo $tpl->doctype('XHTML_10_STRICT'),PHP_EOL;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<base href="http://portfolio.seksibody.com<?php if ($_SERVER['SERVER_PORT'] != 80) { echo ':'.$_SERVER['SERVER_PORT']; }?>/" />
		<link rel="stylesheet" href="/css/global.css" />
		<link rel="stylesheet" href="/css/contact.css" />
<?php
if (isset($css)) {
	if (is_array($css)) {
		foreach ($css as $stylesheet) {
			echo "\t\t",'<link rel="stylesheet" href="/css/',$stylesheet,'" />',"\n";
		}
	} else {
		echo '<link rel="stylesheet" href="/css/',$css,'" />',"\n";
	}
}
?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="/js/jquery.simplemodal-1.2.3.min.js"></script>
		<script type="text/javascript" src="/js/contact.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				if (jQuery.browser.msie && jQuery.browser.version <= 6) {
					// IE6 and below don't support PNG transparency, so we need
					// a gif. The png looks better, so we only replace it when the
					// user is using IE6 or lower.
					$('img#logo').attr('src', '/images/logo.gif');
				}
			});
		</script>
<?php
if (!empty($jsArr)) {
	foreach ($jsArr as $js) {
		echo "\t\t<script type=\"text/javascript\" src=\"/js/$js\"></script>\n";
	}
}
?>
		<!--[if lte IE 6]>
		<style type="text/css">
			div#mainBox {
				/* force for missing max-height in IE6 and below */
				height: 380px;
			}
		</style>
		<![endif]-->
		<title>Eric Gach's Portfolio</title>
    </head>
    <body>
		<div id="content">
			<div id="header"><a href="/"><img id="logo" src="/images/logo.png" alt="Eric's Portfolio" /></a></div>
<?php echo $content; ?>
			<div id="footer">
				Copyright &copy; 2009 - <a class="contact" href="/contact">Eric Gach</a> - All Rights Reserved
			</div>
		</div>
    </body>
</html>