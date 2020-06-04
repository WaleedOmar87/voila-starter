<?php
/**
* Include Framework Files
* @package voila
*/

define('VOILA_FRAMEWORK_PATH' , get_template_directory() . '/framework');
define('VOILA_FRAMEWORK_ASSETS_PATH' , get_template_directory() . '/framework/framework-assets');

require VOILA_FRAMEWORK_PATH . '/register-assets.php';
require VOILA_FRAMEWORK_PATH . '/icons-helper.php';
require VOILA_FRAMEWORK_PATH . '/register-theme-features.php';
