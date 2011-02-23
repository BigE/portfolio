<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of source
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class SourceController extends Portfolio\Controller\AController
{
	public function diff()
	{
		$this->_view->assign('lang', 'php');
		$this->_view->assign('source', SITECH_APP_PATH.'/source/PHP/Diff/HTML.php');
		$this->_display('source.tpl');
	}

	public function infobox()
	{
		if ($this->_uri->getFormat() == 'css') {
			$this->_view->assign('lang', 'css');
			$this->_view->assign('source', SITECH_APP_PATH.'/../htdocs/css/jquery-infobox-1.0.0.css');
			$this->_display('source.tpl');
		} else {
			$this->_view->assign('lang', 'javascript');
			$this->_view->assign('source', SITECH_APP_PATH.'/../htdocs/js/jquery-infobox-1.0.0.js');
			$this->_display('source.tpl');
		}
	}

	public function init()
	{
		$this->_view->assign('css', array('sh_bright.min.css', 'source.css'));
		$this->_view->assign('js', array('js/sh_main.min.js'));
	}
}
