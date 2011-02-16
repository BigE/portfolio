<?php
/**
 * This class uses the system diff in a way that makes it easy to show the
 * differences in HTML files. In stead of showing differences line by line, it
 * treats each word and HTML tag as a line. This makes it easier to show the
 * difference between complex HTML documents.
 *
 * @author Eric Gach <eric@php-oop.net>
 */
class Diff_HTML
{
	/**
	 * Location of the diff binary. The default setting is /usr/bin/diff
	 */
	const ATTR_DIFF_BIN = 1;
	/**
	 * Custom HTML output when an added tag is found. The default adds an <ins>
	 * tag that is clickable with a JS alert popup about the tag found.
	 */
	const ATTR_ADD_TAG = 2;
	/**
	 * Custom HTML output when a removed tag is found. The default adds a <del>
	 * tag that is clickable with a JS alert popup about the tag removed.
	 */
	const ATTR_DEL_TAG = 3;

	/**
	 * Attributes for the class.
	 *
	 * @var array
	 */
	protected $_attributes = array();
	/**
	 * The new document to be compared by the diff.
	 *
	 * @var array
	 */
	protected $_new = array();
	/**
	 * The original document to be compared by the diff.
	 *
	 * @var array
	 */
	protected $_original = array();
	/**
	 * Tags that are open while parsing the diff output.
	 *
	 * @var array
	 */
	protected $_openTags = array();

	/**
	 * This is an array of tags that will be noted in the diff as added/removed.
	 *
	 * @var array
	 */
	private $_tags = array(
		'br'    => 'Line Break',
		'h1'    => 'Heading 1',
		'h2'    => 'Heading 2',
		'h3'    => 'Heading 3',
		'h4'    => 'Heading 4',
		'h5'    => 'Heading 5',
		'h6'    => 'Heading 6',
		'p'     => 'Paragraph',
		'table' => 'Table',
		'td'    => 'Table Data',
		'tr'    => 'Table Row'
	);

	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->setAttribute(self::ATTR_DIFF_BIN, '/usr/bin/diff');
		$this->setAttribute(self::ATTR_ADD_TAG, '<ins class="diff tag" onclick="alert(\'Added \\\'[tag]\\\' tag\');">[+]</ins>');
		$this->setAttribute(self::ATTR_DEL_TAG, '<del class="diff tag" onclick="alert(\'Removed \\\'[tag]\\\' tag\');">[-]</del>');
	}

	/**
	 * This calls the toHtml method so the output can be viewed.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return($this->toHtml());
	}

	/**
	 * This will execute the diff on the HTML and store the results in an array
	 * for parsing and output.
	 */
	public function diff()
	{
		$orig = tempnam('/tmp', 'orig');
		$new = tempnam('/tmp', 'new');

		if (!$orig || !$new) {
			throw new Expection('Failed to create temporary files for diff');
		}

		file_put_contents($orig, implode("\n", $this->_original)."\n");
		file_put_contents($new, implode("\n", $this->_new)."\n");

		$this->_diff = explode("\n", shell_exec($this->getAttribute(self::ATTR_DIFF_BIN)." -u $orig $new"));

		unlink($orig);
		unlink($new);
	}

	/**
	 * Get an attributes value. If the attribute is not set, this will return
	 * null.
	 *
	 * @param int $attr This should be a Diff_HTML::ATTR_* constant
	 * @return mixed
	 */
	public function getAttribute($attr)
	{
		if (isset($this->_attributes[$attr])) {
			return($this->_attributes[$attr]);
		} else {
			return(null);
		}
	}

	/**
	 * Load the new document into the engine to prepare for diff.
	 *
	 * @param string $contents
	 */
	public function loadNew($contents)
	{
		$this->_new = $this->_convert($contents);
	}

	/**
	 * Load the original document into the engine to prepare for diff.
	 *
	 * @param string $contents
	 */
	public function loadOriginal($contents)
	{
		$this->_original = $this->_convert($contents);
	}

	/**
	 * Set the attribute to the value specified.
	 *
	 * @param int $attr This should be one of the Diff_HTML::ATTR_* constants.
	 * @param mixed $value The value to set the attribute to.
	 */
	public function setAttribute($attr, $value)
	{
		$this->_attributes[$attr] = $value;
	}

	/**
	 * This changes the diff code into usable HTML. The HTML output will show
	 * the differences in the old and new markup as well as mark each HTML tag
	 * that was changed in the document.
	 *
	 * @return string
	 */
	public function toHtml()
	{
		$output = array();

		for ($i = 0; $i < sizeof($this->_diff); $i++) {
			if (substr($this->_diff[$i], 0, 4) === '--- ' || substr($this->_diff[$i], 0, 4) === '+++ ') {
				// These lines are ignored, they're just the start of the diff
				// that tells the names of the files.
			} else {
				switch ($this->_diff[$i][0]) {
					case '@':
						list($extra1, $orig, $new, $extra2) = explode(' ', $this->_diff[$i], 4);
						$new = explode(',', $new);
						if (intval($new[0]) > 1) {
							for ($x = 0; $x < $new[0]; $x++) {
								$this->_outNormal($this->_new[$x], $output);
							}
						}
						break;

					case '+':
						$this->_outAdd(substr($this->_diff[$i], 1), $output);
						break;

					case '-':
						$this->_outRemove(substr($this->_diff[$i], 1), $output);
						break;

					case ' ':
						$this->_outNormal(substr($this->_diff[$i], 1), $output);
						break;
				}
			}
		}

		return(implode(' ', $output));
	}

	/**
	 * Store the HTML output into the specified file.
	 *
	 * @param string $filename
	 * @return bool
	 */
	public function toFile($filename)
	{
		return(file_put_contents($filename, $this->toHtml()));
	}

	/**
	 * This function will convert all input to work with the diff so that it can
	 * parse each word and tag as a line.
	 *
	 * @param string $contents
	 * @return string
	 */
	protected function _convert($contents)
	{
		/*$contents = str_replace(array("\r\n", "\r", ' '), "\n", trim($contents));
		$contents = str_replace(array('<', '>'), array("\n<", ">\n"), $contents);*/
		$contents = str_replace(array("<", ">"), array("\n<", ">\n"), preg_replace("/(\r\n|\r|\n|\t|\s{2,500})/m", " ", $contents));
		$array = explode("\n", $contents);
		$out = array();

		foreach ($array as $line) {
			if (empty($line)) continue;
			if ($line[0] != '<' && strpos($line, ' ') !== false) {
				$extra = explode(' ', $line);
				foreach ($extra as $line) {
					if (!empty($line)) {
						$out[] = $line;
					}
				}
			} else {
				$out[] = $line;
			}
		}

		return($out);
	}

	/**
	 * This will add a line to the output of content that has been added to the
	 * document in the new version.
	 *
	 * @param string $line Line of diff output that we're parsing.
	 * @param array $output Array of output to append to.
	 */
	protected function _outAdd($line, array &$output)
	{
		if ($line[0] == '<') {
			if ($line[1] == '/') {
				$tag = substr($line, 2, -1);
				if (isset($this->_tags[$tag]) && ($key = in_array($tag, $this->_openTags)) === false) {
					$output[] = str_replace('[tag]', $this->_tags[$tag], $this->getAttribute(self::ATTR_ADD_TAG)).$line;
				} else {
					unset($this->_tags[$key]);
					$output[] = $line;
				}
			} else {
				if (($end = strpos($line, ' ')) === false) {
					$end = -1;
				} else {
					$end--;
				}

				$tag = substr($line, 1, $end);
				if (isset($this->_tags[$tag])) {
					$this->_openTags[] = $tag;
					$output[] = $line.str_replace('[tag]', $this->_tags[$tag], $this->getAttribute(self::ATTR_ADD_TAG));
				} else {
					$output[] = $line;
				}
			}
		} else {
			$output[] = '<ins class="diff">'.$line.'</ins>';
		}
	}

	/**
	 * This adds a line to the output that exists in both documents.
	 *
	 * @param string $line Line of diff output that we're parsing.
	 * @param array $output Array of output to append to.
	 */
	protected function _outNormal($line, array &$output)
	{
		$output[] = $line;
	}

	/**
	 * This adds output to show that the line was removed from the new document.
	 * If it is a HTML tag that was removed, we just display a placeholder where
	 * the tag would have been, but leave the tag out of the output.
	 *
	 * @param string $line Line of diff output that we're parsing.
	 * @param array $output Array of output to append to.
	 */
	protected function _outRemove($line, array &$output)
	{
		if ($line[0] == '<') {
			/* If its a tag, we don't display the tag in the diff output, just a
			   note that its been removed from the text. */
			if ($line[1] == '/') {
				$tag = substr($line, 2, -1);
			} else {
				if (($end = strpos($line, ' ')) === false) {
					$end = -1;
				} else {
					$end--;
				}

				$tag = substr($line, 1, $end);
			}

			if (isset($this->_tags[$tag])) {
				$output[] = str_replace('[tag]', $this->_tags[$tag], $this->getAttribute(self::ATTR_DEL_TAG));
			}
		} else {
			$output[] = '<del class="diff">'.$line.'</del>';
		}
	}
}
