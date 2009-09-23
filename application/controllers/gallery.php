<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery
 *
 * @author Eric Gach <eric at php-oop.net>
 */
class GalleryController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';

	/**
	 * This displays a demo of the gallery. Not quite sure how I'm going to
	 * acomplish this.
	 */
	public function demo()
	{
		$this->_view->display('gallery/demo.tpl');
	}
	
	public function index()
	{
		$this->_view->display('gallery/index.tpl');
	}

	protected function _parsePath()
	{
	}
}
