<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of liboscar
 *
 * @author eric
 */
class SitechController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';

	public function index()
	{
		$this->_view->display('sitech.tpl');
	}

	protected function _parsePath()
	{
	}
}