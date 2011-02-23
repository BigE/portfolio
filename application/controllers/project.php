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

	public function infobox()
	{
		$this->_view->assign('css', array('jquery-infobox-1.0.0.css'));
		$this->_view->assign('js', array('js/jquery-infobox-1.0.0.js'));
	}

	public function irssinotify()
	{
		$screens = array();

		$images = new DirectoryIterator(SITECH_APP_PATH.'/../htdocs/images/irssinotify/');
		foreach ($images as $img) {
			if ($img->isDir() || substr($img->getFilename(), 0, 6) == 'thumb_') continue;
			if (substr($img->getFilename(), strrpos($img->getFilename(), '.')) == '.jpg') {
				$screens[] = $img->getFilename();
			}
		}

		$this->_view->assign('screens', $screens);
	}

	public function liboscar()
	{
	}

	public function simpleirc()
	{
	}

	public function sitech()
	{
	}
}
