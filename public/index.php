<?php
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('SITECH_APP_PATH') || define('SITECH_APP_PATH', realpath(dirname(__FILE__).'/../application'));

defined('SITECH_LIB_PATH') || define('SITECH_LIB_PATH', realpath(SITECH_APP_PATH.'/../library'));

set_include_path(SITECH_LIB_PATH.DS.get_include_path());

require_once('SiTech/Loader.php');
SiTech_Loader::registerAutoload();

$view = new SiTech_Template('main.tpl', SITECH_APP_PATH.'/views');
$view->setLayout('general.tpl');
$view->display();
/*
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<base href="http://portfolio.seksibody.com<?php if ($_SERVER['SERVER_PORT'] != 80) { echo ':'.$_SERVER['SERVER_PORT']; }?>/" />
		<link rel="stylesheet" href="/css/global.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="/js/jquery-ui-1.7.1.custom.min.js"></script>
		<script type="text/javascript" src="/js/jquery.corner.js"></script>
		<script type="text/javascript">
// Want to show each header in a rounded way.
$(document).ready(function () {
	$('div.examples h3').corner();
	if (jQuery.browser.msie && jQuery.browser.version < 7) {
		$('#ie6').html('I noticed you\'re using IE ' + jQuery.browser.version + '. While this design is compatable with your browser, there are minor problems that could cause some inconvinence. I reccomend you upgrade or use <a href="http://www.opera.com" target="new">Opera</a>. Thanks.');
		$('#ie6').effect('highlight', {color: '#ff7979'}, 2000);
	}
});
		</script>
        <title>Eric Gach's Portfolio</title>
    </head>
    <body>
		<div id="content">
			<div id="header"><a href="/index.php"><img src="/images/logo.png" /></a></div>
			<div id="description">
				<h3>About This Site</h3>
				<p>All code examples listed here are technologies or ideas used in different projects.
				The projects languages range from PHP &amp; Javascript to C &amp; C#. All projects
				listed here are fully working demos to show examples of previous work completed or
				ideas implemented into projects.</p>
				<p><strong>Eric's Resume</strong><br />Download - <a href="/docs/resume.pdf">PDF</a> - <a href="/docs/resume.doc">Word Document</a></p>
				<div id="ie6"></div>
			</div>
			<div id="technologies">
				<div id="php" class="examples">
					<h3>PHP Technologies</h3>
					<div class="projects">
						<a href="">PHP Diff</a>
						<a href="">Gallery</a>
						<a href="">SiTech Library</a>
					</div>
				</div>
				<div id="jquery" class="examples">
					<h3>JQuery</h3>
					<div class="projects">
						<a href="">Example 1</a>
						<a href="">Example 2</a>
						<a href="">Example 3</a>
					</div>
				</div>
				<div id="csharp" class="examples">
					<h3>C/C++/C#</h3>
					<div class="projects">
						<a href="">IrssiProxy (C#)</a>
						<a href="">liboscar (C)</a>
					</div>
				</div>
			</div>
			<div id="footer">
				Copyright &copy; 2009 - <a href="">Eric Gach</a> - All Rights Reserved
			</div>
		</div>
    </body>
</html>*/
