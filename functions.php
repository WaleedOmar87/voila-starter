<?php
/**
* Theme Functions
* @package voila
*/


/**
* Load Framework Files
*/
require_once get_template_directory() . '/framework/include-framework.php';


/**
* Load Template Functions
*/
require_once get_template_directory() . '/includes/theme-functions/template-functions.php';

/**
 * Customizer Settings.
 */
require_once get_template_directory() . '/includes/theme-functions/customizer-settings.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/includes/theme-functions/woocommerce-functions.php';
}

/**
* Install Plugins
*/
require_once get_template_directory() . '/includes/theme-functions/install-plugins.php';