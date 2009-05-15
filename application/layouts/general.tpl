<?php
echo $tpl->doctype('XHTML_10_STRICT'),PHP_EOL;
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<base href="http://portfolio.seksibody.com<?php if ($_SERVER['SERVER_PORT'] != 80) { echo ':'.$_SERVER['SERVER_PORT']; }?>/" />
		<link rel="stylesheet" href="/css/global.css" />
		<link rel="stylesheet" href="/css/contact.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="/js/jquery.simplemodal-1.2.3.min.js"></script>
		<script type="text/javascript" src="/js/contact.js"></script>
<?php
if (!empty($jsArr)) {
	foreach ($jsArr as $js) {
		echo "\t\t<script type=\"text/javascript\" src=\"/js/$js\"></script>\n";
	}
}
?>
		<title>Eric Gach's Portfolio</title>
    </head>
    <body>
		<div id="content">
			<div id="header"><a href="/index.php"><img src="/images/logo.png" alt="Eric's Portfolio" /></a></div>
<?php echo $content; ?>
			<div id="footer">
				Copyright &copy; 2009 - <a class="contact" href="/contact">Eric Gach</a> - All Rights Reserved
			</div>
		</div>
    </body>
</html>