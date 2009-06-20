<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of default
 *
 * @author Eric
 */
class DefaultController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';

	public function index()
	{
		$this->_view->display('main.tpl');
	}
	
	protected function _parsePath()
	{
	}
}
