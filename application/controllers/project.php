<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class ProjectController extends Portfolio\Controller\AController
{
	protected $_layout = 'general.tpl';

	public function diff()
	{
		$orig = 'The quick brown fox<br />jummped over the fence.';
		$new = '<h3>The Fox</h3><p>The quick brown fox jumped over the fence!</p>';

		require_once(SITECH_APP_PATH.'/source/PHP/Diff/HTML.php');
		$diff = new Diff_HTML();
		$diff->loadOriginal($orig);
		$diff->loadNew($new);
		$diff->diff();

		$this->_view->assign('css', array('diff.css'));
		$this->_view->assign('original', $orig);
		$this->_view->assign('new', $new);
		$this->_view->assign('diff', $diff);
	}

	public function gallery()
	{
	}

	public function simpleirc()
	{
	}

	public function sitech()
	{
	}
}
