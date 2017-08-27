<?php
/**************************************
 * Custom Digital Goods Marketplace CMS
 * ************************************/

// This is the base installation path. eg /var/www/html
define("BASEPATH", dirname(__FILE__));

//Application code path
define("APP", BASEPATH.DIRECTORY_SEPARATOR.'application');

//Plugins directory
define("HELPERS", APP.DIRECTORY_SEPARATOR.'Helpers');

//Themes directory
define("THEMES", APP.DIRECTORY_SEPARATOR.'themes');

//System path
define("SYSTEM", BASEPATH.DIRECTORY_SEPARATOR.'system');

// System core path
define("CORE", SYSTEM.DIRECTORY_SEPARATOR.'core');

//SET Views directory
define("VIEWS", APP.DIRECTORY_SEPARATOR.'Views');

// Start the application
require SYSTEM.DIRECTORY_SEPARATOR.'core/Boot.php';
?>
