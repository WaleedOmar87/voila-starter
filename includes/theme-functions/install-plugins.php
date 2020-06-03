<?php
/**
* Install Theme Plugins
* @package
*/

require_once get_template_directory() . '/includes/vendor/class-tgm-plugin-activation.php';

add_action(
	'tgmpa_register',
	function () {
		$plugins = [
			[
				'name' => esc_html__('Advanced Custom Fields', 'voila'),
				'slug' => 'advanced-custom-fields',
				'required' => true,
			], [
				'name' => esc_html__('Kirki Customizer Framework', 'voila'),
				'slug' => 'kirki',
				'required' => true,
			],
			[
				'name' => esc_html__('ACF Photo Gallery', 'voila'),
				'slug' => 'navz-photo-gallery',
				'required' => true
			],
			[
				'name' => esc_html__('Contact Form by WPForms – Drag & Drop Form Builder for WordPress', 'voila'),
				'slug' => 'wpforms-lite',
				'required' => false
			],
			[
				'name' => esc_html__('MC4WP: Mailchimp for WordPress', 'voila'),
				'slug' => 'mailchimp-for-wp',
				'required' => false
			],
			[
				'name' => esc_html__('Voila Addons', 'voila'),
				'slug' => 'voila_addons',
				'required' => false,
				'source'             => get_stylesheet_directory() . '/include/plugins/theme-plugins/voila_addons.zip'
			]
		];

		$config = [
			'domain' => 'voila', // Text domain - likely want to be the same as your theme.
			'default_path' => '', // Default absolute path to pre-packaged plugins
			'parent_slug' => 'themes.php', // Default parent URL slug
			'menu' => esc_html__('install-required-plugins', 'voila'), // Menu slug
			'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices' => true, // Show admin notices or not
			'is_automatic' => true, // Automatically activate plugins after installation or not
			'message' => '', // Message to output right before the plugins table

		];

		tgmpa($plugins, $config);
	}
);
