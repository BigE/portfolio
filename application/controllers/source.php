<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of source
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class SourceController extends \Portfolio\Controller\AController
{
	public function diff()
	{
		$this->_view->assign('css', array('source.css'));
		$this->_view->assign('source', \SiTech\Syntax\Highlight::file(SITECH_APP_PATH.'/source/PHP/Diff/HTML.php', \SiTech\Syntax\Highlight::TYPE_PHP, true));
		$this->_display('source.tpl');
	}
}
