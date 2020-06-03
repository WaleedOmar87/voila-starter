<?php

/**
 * Register Theme Features
 * @package voila
 */

if (!function_exists('voila_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function voila_setup()
	{
		/*
         * Make theme available for translation.
         */
		load_theme_textdomain('voila', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// add title tag support
		add_theme_support('title-tag');

		/*
         * Enable support for Post Thumbnails on posts and pages.
         */
		add_theme_support('post-thumbnails');

		// Add post formats support
		add_theme_support('post-formats', array('gallery', 'video', 'image', 'audio'));


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__('Primary', 'voila'),
				'one-page-navigation' => esc_html__('One Page Navigation', 'voila'),
			)
		);

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
	}
endif;
add_action('after_setup_theme', 'voila_setup');


/**
 * Set Content Width
 * @package voila
 */
function voila_content_width()
{
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters('voila_content_width', 960);
}
add_action('after_setup_theme', 'voila_content_width', 0);