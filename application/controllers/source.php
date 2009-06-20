<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of source
 *
 * @author Eric
 */
class SourceController extends portfolio_Abstract_Controller
{
	protected $_layout = 'general.tpl';
	
	public function __construct()
	{
		parent::__construct(false);
	}

	public function sourceDiff()
	{
		$this->_view->assign('page', SITECH_APP_PATH.'/../public/source/PHP/Diff/HTML.php');
		$this->_view->display('source.tpl');
	}
	
	public function __call($name, $arguments)
	{
		switch ($name) {
			case 'diff':
				$this->sourceDiff();
				break;

			default:
				throw new portfolio_Controller_Exception('The source view "%s" was not found.', array($name), portfolio_Controller_Exception::ERROR_404);
				break;
		}
	}

	protected function _parsePath()
	{
	}
}
