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
		'src' => get_stylesheet_directory_uri() . '/assets/dist/main.css'
	],
	'script' => [
		'id' => 'voila-app',
		'src' => get_stylesheet_directory_uri() . '/assets/dist/main.js'
	],
	'script' => [
		'id' => 'voila-dev-main',
		'src' => esc_url('http://localhost:3000/wordpress_voila/main.js')
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

/**
 * Single Post Meta
 * @package voila
 */
add_action('voila_single_post_meta', function ($post_id) {
	?>
	<div class="post-meta">
		<h2 class="post-title">
			<a href="<?php echo esc_url(get_permalink($post_id)); ?>">
				<?php echo get_the_title($post_id); ?></a>
		</h2>
		<span class="date">
			<?php echo get_the_date('M d, Y', $post_id); ?>
		</span>
	</div>
	<?php
	}, 10, 1);


	/**
	 * Single Post Comments Callback
	 */
	if (!function_exists('voila_comments_callback')) {
		function voila_comments_callback($comment, $args, $depth)
		{

			$comment_class = empty($args['has_children']) ? '' : 'parent';
			$id = 'comment-' . get_comment_ID();
			$avatar =  get_avatar($comment, ($args['avatar_size'] !== 0 ? $args['avatar_size'] : 74));
			?>
		<div id="<?php esc_attr_e($id); ?>" <?php esc_attr_e(comment_class($comment_class)); ?>>
			<div class="comment-body" id="<?php esc_attr_e('comment-div-' . $id); ?>">
				<div class="d-flex">
					<div class="col-2">
						<?php echo wp_kses($avatar, wp_kses_allowed_html('post')); ?>
					</div>
					<div class="col">
						<h4 class="comment-author">
							<?php
									echo wp_kses(get_comment_author_link(), wp_kses_allowed_html('post'));
									?>
						</h4>
						<small class="meta-text">
							<?php echo wp_sprintf(
										esc_html__('%1$s at %2$s'),
										get_comment_date(),
										get_comment_time()
									); ?>
						</small>
						<?php
								if ($comment->comment_approved == 0) {
									echo wp_sprintf('<small class="meta-text text-bold>%s</small>', esc_html__('You comment awaits moderation', 'voila'));
								}
								?>

						<div class="comment-text">
							<?php comment_text(); ?>
						</div>

						<!-- Edit button -->
						<div class="d-flex">
							<?php
									echo  preg_replace(
										'/comment-reply-link/',
										'comment-reply-link btn btn-outline btn-black',
										get_comment_reply_link(
											array_merge($args, array(
												'depth' => $depth,
												'max_depth' => $args['max_depth']
											))
										),
										1
									);
									edit_comment_link(esc_html__('Edit', 'voila'));
									?>
						</div>
						<!-- Reply button -->
					</div>
				</div>
			</div>
			<!-- container end /div is added automatically by wp_list_comments -->
			<!-- </div> -->
		<?php
			}
		}

		/**
		 * Footer Type
		 * get footer partial based on user choice
		 */
		add_action('voila_footer', function () {
			$footer_type = (function_exists('get_field') && get_field('voila_footer_type') != '') ? get_field('voila_footer_type') : 'default';
			get_template_part("includes/partials/footer", $footer_type);
		}, 10);


		/**
		 * Navigation Type
		 * get navigation partial based on user choice
		 */
		add_action('voila_get_navigation', function ($navigation_type = 'default') {
			get_template_part('includes/partials/navigation', $navigation_type);
		}, 10, 1);



		/**
		 * Site Logo
		 * return site logo
		 */
		add_filter('voila_site_logo', function ($color = 'white', $size = 'normal') {

			$logo_white = get_theme_mod('voila_logo_white', esc_url(get_template_directory_uri() . '/assets/src/images/logo-white.png'));

			$logo_black = get_theme_mod('voila_logo_black', esc_url(get_template_directory_uri() . '/assets/src/images/logo-black.png'));

			$tagline = get_theme_mod('blogname', esc_html__('Voila', 'voila'));

			echo wp_sprintf(
				'<a href="%s" class="site-logo logo-%s"><img src="%s" alt="%s" /></a>',
				esc_url(get_site_url()),
				esc_html($size),
				($color === 'white') ? esc_url($logo_white) : $logo_black,
				esc_html($tagline)
			);
		}, 10, 2);

		/**
		 * Navigation Module
		 */
		add_action('voila_navigation_module', function () {
			?>
		<section id="navigation-module" class="module navigation-module white-bg">
			<?php wp_nav_menu(['theme_location' => 'primary', 'container' => 'div']); ?>
		</section>
	<?php
	}, 10);

	/**
	 * Search Module
	 */
	// TODO stopped @ mega menu navigation
	add_action('voila_search_module', function ($style = 'white') {
		?>
		<section id="search-module" class="module search-module <?php esc_html($style); ?>-bg">
			<form id="search-form-module">
				<input type="text" name="s" value="<?php esc_attr_e(get_search_query()) ?>" placeholder="<?php esc_html_e(get_theme_mod('voila_search_placeholder', esc_html__('Type and hit enter..', 'voila'))); ?>" id="fullscreen-search-input" class="search-bar-top">
				<input value="<?php esc_html_e('Search', 'voila'); ?>" type="submit" class="btn btn-input">
			</form>
		</section>
	<?php
	}, 10, 1);
