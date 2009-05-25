<?php
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('PS') || define('PS', PATH_SEPARATOR);
defined('SITECH_APP_PATH') || define('SITECH_APP_PATH', realpath(dirname(__FILE__).'/../application'));
defined('SITECH_LIB_PATH') || define('SITECH_LIB_PATH', realpath(SITECH_APP_PATH.'/../library'));

set_include_path(realpath(SITECH_APP_PATH.'/../public/source/PHP').PS.get_include_path());

require_once('SiTech/Loader.php');
SiTech_Loader::registerAutoload();
SiTech_Loader::loadBootstrap();

$uri = new SiTech_Uri();
$view = new SiTech_Template(SITECH_APP_PATH.'/views');

switch ($uri->getPath()) {
	case '/':
	case '/home':
	case '/index':
		$view->setLayout('general.tpl');
		$view->display('main.tpl');
		break;

	case '/diff':
		$orig = 'The quick brown fox<br>jummped over the fence.';
		$new = '<h3>The Fox</h3><p>The quick brown fox jumped over the fence!</p>';
		$view->setLayout('general.tpl');
		$diff = new Diff_HTML();
		$diff->loadOriginal($orig);
		$diff->loadNew($new);
		$diff->diff();
		$view->assign('css', array('diff.css'));
		$view->assign('original', $orig);
		$view->assign('new', $new);
		$view->assign('diff', $diff);
		$view->display('diff.tpl');
		break;

	default:
		header("HTTP/1.0 404 Not Found");
		$view->setLayout('general.tpl');
		$view->assign('page', $uri);
		$view->display('404.tpl');
		break;
}
