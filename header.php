<?php

/**
 * Theme Header
 * @package voila
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php

	wp_body_open();

	// Print Overlay And Responsive Navigation Module
	do_action('voila_navigation_module');

	// Print Search Module
	do_action('voila_search_module');

	// Get Page Default Navigation
	do_action('voila_get_navigation', 'classic');
