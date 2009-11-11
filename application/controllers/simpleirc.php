<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of simpleirc
 *
 * @author Eric
 */
class SimpleircController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';

	public function index()
	{
		$this->python();
	}

	public function php()
	{
		$this->_view->display('simpleirc/php.tpl');
	}
	
	public function python()
	{
		$this->_view->display('simpleirc/python.tpl');
	}

	protected function _parsePath()
	{
	}
}
