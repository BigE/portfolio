<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Eric
 */
abstract class portfolio_Abstract_Controller
{
	/**
	 *
	 * @var array
	 */
	protected $_path;
	
	/**
	 *
	 * @var SiTech_Uri
	 */
	protected $_uri;

	public function __construct()
	{
		$this->_uri = new SiTech_Uri();
		$this->_path = explode('/', ltrim($uri->getPath(), '/'));
	}
}
