<?php
/**
 * This bootstrap file is what ties everything together and makes the whole site
 * work. While SiTech is not a framework, tying everything together can make it
 * act like a framework. This takes more work than frameworks, but gives you far
 * more control over the code and actions itself.
 */

$config = SiTech_ConfigParser::load();
$config->read(array(SITECH_APP_PATH.'/config/app.ini'));
$tpl = new SiTech_Template(SITECH_APP_PATH.'/views');