<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diff
 *
 * @author Eric
 */
class DiffController extends portfolio_Abstract_Controller
{
	public function index()
	{
		set_include_path(realpath(SITECH_APP_PATH.'/../public/source/PHP').PS.get_include_path());
		$orig = 'The quick brown fox<br />jummped over the fence.';
		$new = '<h3>The Fox</h3><p>The quick brown fox jumped over the fence!</p>';
		$this->_view->setLayout('general.tpl');
		$diff = new Diff_HTML();
		$diff->loadOriginal($orig);
		$diff->loadNew($new);
		$diff->diff();
		$this->_view->assign('css', array('diff.css'));
		$this->_view->assign('original', $orig);
		$this->_view->assign('new', $new);
		$this->_view->assign('diff', $diff);
		$this->_view->display('diff.tpl');
	}

	protected function _parsePath()
	{
	}
}
