<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of irssiproxy
 *
 * @author Eric Gach <eric at php-oop.net>
 */
class IrssinotifyController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';

	public function index()
	{
		$this->_view->display('irssinotify/index.tpl');
	}

	public function screens()
	{
		$this->_view->display('irssinotify/screens.tpl');
	}

	protected function _parsePath()
	{
	}
}
