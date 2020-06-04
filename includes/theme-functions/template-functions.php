<?php

/**
 * Template Functions
 * theme template functions such as custom logo , custom sidebars , and enqueuing assets
 * @package voila
 */

// Load Assets Helper
require_once get_template_directory() . '/framework/register-assets.php';

/**
 * Register Widget Areas.
 */
function voila_register_widgets()
{
	register_sidebar([
		'name' => esc_html__('Sidebar Widgets', 'voila'),
		'id' => 'voila-sidebar',
		'description' => esc_html__('Add widgets to the blog sidebar', 'voila'),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	]);
	register_sidebar(array(
		'name' => esc_html__('Footer Widgets', 'voila'),
		'id' => 'voila-footer',
		'description' => esc_html__('Add widgets to the footer.', 'voila'),
		'before_widget' => '<div id="%1$s" class="col-sm-6 %2$s col-md-3"><div class="widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	));
	register_sidebar(array(
		'name' => esc_html__('Shop Sidebar', 'voila'),
		'id' => 'voila-shop-sidebar',
		'description' => esc_html__('Add widgets to shop page sidebar.', 'voila'),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
}
add_action('widgets_init', 'voila_register_widgets');


/**
 * Enqueue Theme Assets
 * TODO register theme assets
 */
$voila_register_assets = new Voila_Register_Theme_Assets([
	'style' => [
		'id' => 'voila-main',
		'src' => '#'
	]
]);

/**
* Blog Pagination
*/
if (!function_exists('voila_blog_pagination')) {
	function voila_blog_pagination()
	{
		$args = [];
		$class = 'pagination';
		if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

		$args = wp_parse_args($args, [
			'mid_size'           => 2,
			'type' => 'list',
			'prev_text' => voila_get_icon('chevron-left'),
			'next_text' => voila_get_icon('chevron-right'),
			'screen_reader_text' => '',
		]);

		$links     = paginate_links($args);
		$template  = apply_filters('voila_navigation_markup_template', '
    <div class="pagination pagination-blog %1$s" role="navigation">
				%3$s %4$s %5$s
    </div>', $args, $class);

		echo sprintf($template, $class, $args['screen_reader_text'], false, str_replace("<ul class='page-numbers", "<ul class='pagination", $links), false);
	}
}