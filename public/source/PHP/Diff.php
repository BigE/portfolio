<?php
/**
 *
 */

/**
 * This class makes use of the `diff` function to display the differences between
 * versions of files. Once processed by the diff command, this will compare
 * differences and display a combined output showing line by line changes.
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class Diff
{
	const ATTR_DIFF_BIN = 1;

	const TYPE_FILE = 1;
	const TYPE_STRING = 2;

	protected $_attributes = array();

	protected $_new;
	protected $_original;

	public function __construct()
	{
		$this->setAttribute(self::ATTR_DIFF_BIN, '/usr/bin/diff');
	}

	public function loadNew($contents)
	{
		$this->_new = $contents;
	}

	public function loadOriginal($contents)
	{
		$this->_original = $contents;
	}

	public function getAttribute($attr)
	{
		if (isset($this->_attributes[$attr])) {
			return($this->_attributes[$attr]);
		} else {
			return(null);
		}
	}

	public function setAttribute($attr, $value)
	{
		$this->_attributes[$attr] = $value;
	}
}
