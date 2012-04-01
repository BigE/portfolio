<?php
define('SITECH_APP_PATH', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'application');
define('SITECH_LIB_PATH', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'lib');
set_include_path(SITECH_LIB_PATH.PATH_SEPARATOR.get_include_path());

require_once('SiTech/Loader.php');
SiTech\Loader::registerAutoload();
SiTech\Loader::loadBootstrap();

try {
	SiTech\Routing\Router::dispatch();
} catch (SiTech\Routing\Exception $ex) {
	var_dump($ex);
} catch (Exception $ex) {
	var_dump($ex);
}
