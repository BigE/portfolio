<?php
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('PS') || define('PS', PATH_SEPARATOR);
defined('SITECH_APP_PATH') || define('SITECH_APP_PATH', realpath(dirname(__FILE__).'/../application'));
defined('SITECH_LIB_PATH') || define('SITECH_LIB_PATH', realpath(SITECH_APP_PATH.'/../library'));

set_include_path(realpath(SITECH_LIB_PATH).PS.get_include_path());
require_once('SiTech/Loader.php');
SiTech_Loader::registerAutoload();
$uri = new SiTech_Uri();
try {
	SiTech_Loader::loadBootstrap();

	$parts = explode('/', ltrim($uri->getPath(), '/'), 2);
	if (empty($parts[0])) $parts[0] = 'default';
	elseif ($parts[0] == 'info' || $parts[0] == 'info.php') {
		phpinfo();
		exit;
	}

	SiTech_Loader::loadController($parts[0]);
} catch (portfolio_Controller_Exception $ex) {
	$view = new portfolio_Template();
	$view->setLayout('general.tpl');
	$view->assign('page', $uri);
	
	switch ($ex->getHTTPCode()) {
		case portfolio_Controller_Exception::ERROR_404:
			header('HTTP/1.0 404 Not Found');
			$view->display('errors/404.tpl');
			break;

		case portfolio_Controller_Exception::ERROR_500:
			header('HTTP/1.1 500 Internal Server Error');
			$view->display('errors/500.tpl');
			break;
	}
} catch (Exception $ex) {
	header('HTTP/1.1 500 Internal Server Error');
	$view = new portfolio_Template();
	$view->setLayout('general.tpl');
	$view->assign('page', $uri);
	$view->display('errors/500.tpl');
}