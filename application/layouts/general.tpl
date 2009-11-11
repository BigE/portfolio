<?php
$themes = array(
	'blue',
	'deep-red',
	'turqoise',
	'deep-blue',
	'dark-grey',
	'orange'
);

$theme = (empty($_COOKIE['theme']) || !array_search($_COOKIE['theme'], $themes))? $themes[0] : $_COOKIE['theme'];

echo $tpl->doctype('XHTML_10_STRICT'),PHP_EOL;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" />
		<link rel="stylesheet" href="css/global.css" />
		<link rel="stylesheet" href="css/jquery-ui-1.7.2.custom.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/contact.css" />
<?php
if (isset($css)) {
	if (is_array($css)) {
		foreach ($css as $stylesheet) {
			echo "\t\t",'<link rel="stylesheet" href="css/',$stylesheet,'" />',"\n";
		}
	} else {
		echo '<link rel="stylesheet" href="css/',$css,'" />',"\n";
	}
}
?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.simplemodal-1.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script type="text/javascript" src="js/contact.js"></script>
		<script type="text/javascript">
/*<![CDATA[*/
			$(document).ready(function () {
				if (jQuery.browser.msie && jQuery.browser.version <= 6) {
					// IE6 and below don't support PNG transparency, so we need
					// a gif. The png looks better, so we only replace it when the
					// user is using IE6 or lower.
					$('img#logo').attr('src', '/images/logo.gif');
				}

				/* XHTML 1.0 Strict removes the use of target="" in <a> tags. */
				$('a.new-window').click(function() {
					window.open(this.href);
					return(false);
				});
			});
/*]]>*/
		</script>
<?php
if (!empty($jsArr)) {
	foreach ($jsArr as $js) {
		echo "\t\t<script type=\"text/javascript\" src=\"js/$js\"></script>\n";
	}
}
?>
		<!--[if lt IE 7]>
		<style type="text/css">
			div#mainBox {
				/* force for missing max-height in IE6 and below */
				height: 380px;
			}
		</style>
		<![endif]-->
		<!--[if IE]>
		<style type="text/css">
			body {
				/* Font size fix since IE doesn't use CSS3 yet */
				font-size: 10pt;
			}
		</style>
		<![endif]-->
		<title>Eric Gach's Portfolio</title>
    </head>
    <body>
		<div id="content">
			<div id="header" class="<?php echo $theme; ?>"><a href="/"><img id="logo" src="/images/logo.png" alt="Eric's Portfolio" /></a></div>
			<div id="font">
				<a href="#" class="link">Enable Custom Font</a>&nbsp;[<a href="#" class="about">?</a>]
			</div>
			<div id="themes">
				Change Theme:<?php
foreach (array_reverse($themes) as $t) {
	echo '<div class="theme '.$t.'">&nbsp;</div>';
}
?></div>
			<div id="main">
<?php echo rtrim($content, "\n"),"\n"; ?>
			</div>
			<div id="footer" class="<?php echo $theme; ?>">
				Copyright &copy; 2009 - <a class="contact" href="/contact">Eric Gach</a> - All Rights Reserved
				<p>
					<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
					<a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo urlencode('http://portfolio.php-oop.net/css/global.css'); ?>&profile=css3"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
				</p>
			</div>
		</div>
		<div id="general" class="dialog"></div>
    </body>
</html>