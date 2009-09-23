<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exception
 *
 * @author Eric
 */
class portfolio_Controller_Exception extends SiTech_Exception
{
	const ERROR_404 = 1;
	const ERROR_500 = 2;

	protected $_httpCode;

	public function __construct($message, $args = array(), $httpCode = null)
	{
		if (!empty($httpCode)) {
			$this->_httpCode = $httpCode;
		}

		parent::__construct($message, $args);
	}

	public function getHTTPCode()
	{
		return($this->_httpCode);
	}
}
