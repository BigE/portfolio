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
	protected $_action;
	
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

	/**
	 *
	 * @var portfolio_Template
	 */
	protected $_view;

	public function __construct($catchUndefined = true)
	{
		$this->_view = new portfolio_Template();
		
		if (property_exists($this, '_layout')) {
			$this->_view->setLayout($this->_layout);
		}

		$this->_uri = new SiTech_Uri();
		$parts = explode('/', ltrim($this->_uri->getPath(), '/'));
		/* get rid of the controller name */
		array_shift($parts);

		/* now get the action */
		if (empty($parts[0])) {
			$this->_action = 'index';
		} else {
			$this->_action = $parts[0];
			array_shift($parts);
		}

		$this->_path = $parts;
		$this->_parsePath();

		if (method_exists($this, $this->_action) || $catchUndefined === false) {
			call_user_func(array($this, $this->_action));
		} else {
			throw new portfolio_Controller_Exception('Invalid action "%s"', array($this->_action), portfolio_Controller_Exception::ERROR_404);
		}
	}

	abstract protected function _parsePath();
}
