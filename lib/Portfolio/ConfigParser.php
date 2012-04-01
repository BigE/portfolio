<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Portfolio;

/**
 * Configuration parser for my portfolio. It will auto detect from the config if
 * we're using development or production and load it specifically.
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class ConfigParser extends \SiTech\ConfigParser\ConfigParser
{
	/**
	 * @var \Portfolio\ConfigParser
	 */
	private static $_instance;

	/**
	 * Pull an option from the configuration. If a production/development setting
	 * is used, then parse it out and return that value.
	 *
	 * @param string $section
	 * @param string $option
	 * @return mixed
	 */
	public function get($section, $option)
	{
		$value = parent::get($section, $option);
		if (is_array($value)) {
			if (parent::getBool('base', 'development') && isset($value['development'])) {
				$value = $value['development'];
			} elseif (!parent::getBool('base', 'development') && isset($value['production'])) {
				$value = $vlaue['production'];
			}
		}

		return($value);
	}

	/**
	 * Singleton to load the ConfigParser class into the portfolio site.
	 *
	 * @return \Portfolio\ConfigParser
	 */
	public static function singleton()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new \Portfolio\ConfigParser(array(\SiTech\ConfigParser\ConfigParser::ATTR_HANDLER => new \SiTech\ConfigParser\Handler\_Array()));
			self::$_instance->read(array(SITECH_APP_PATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'default.php'));
		}

		return(self::$_instance);
	}
}
