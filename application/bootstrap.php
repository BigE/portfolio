<?php
// Now that we're in the bootstrap, load everything neccisary for the site.
$config = SiTech\ConfigParser::load(array(SiTech\ConfigParser::ATTR_HANDLER => new SiTech\ConfigParser\Handler\_Array()));
$config->read(array(SITECH_APP_PATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'default.php'));
