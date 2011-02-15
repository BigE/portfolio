<?php
// Now that we're in the bootstrap, load everything neccisary for the site.
$config = Portfolio\ConfigParser::singleton();

// Define the base uri so the dispatch knows where to look in the URL for the
// controller and action.
define('SITECH_BASEURI', $config->get('base', 'url'));
