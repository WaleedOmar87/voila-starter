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

/**
 * Get Post Media
 * @package voila
 */
add_action('voila_get_post_media', function ($post_id, $container = true) {

	$post_thumbnail = get_the_post_thumbnail($post_id);
	$post_thumbnail_url = get_the_post_thumbnail_url($post_id);
	$post_format = get_post_format($post_id);

	// returns video src or audio src
	$post_media = function_exists('get_field') ? get_field('voila_post_media') : false;

	// return embed code
	$post_embed = function_exists('get_field') ? get_field('voila_post_embed') : false;

	// video shortcode
	$video_shortcode = ($post_format === 'video') ? wp_video_shortcode([
		'poster' => $post_thumbnail_url,
		'src' => $post_media['url'],
	]) : false;

	// audio shortcode
	$audio_shortcode = ($post_format === 'audio') ?  wp_audio_shortcode([
		'src' => $post_media['url'],
	]) : false;

	// check which iframe to print
	$iframe_to_print = $video_shortcode | $audio_shortcode | $post_embed;

	?>
	<div class="post-media">
		<?php
			if ($post_format === 'video' || $post_format === 'audio') :
				?>
			<div class="media-player">
				<?php echo esc_html($iframe_to_print); ?>
			</div>
			<?php
				elseif ($post_format === 'gallery' && function_exists('acf_photo_gallery')) :

					$images = acf_photo_gallery('voila_post_gallery', $post_id);
					if (count($images)) :

						?>
				<div class="media-slider">
					<?php
								foreach ($images as $image) {
									?>
						<img src="<?php echo esc_attr($image['full_image_url']); ?>" alt="<?php echo esc_attr($image['title']); ?>">
					<?php
								}
								?>
				</div>
		<?php

				endif;

			else :
				echo esc_html($post_thumbnail);
			endif;
			?>
	</div>
<?php
}, 10, 2);


/**
 * Post Tags
 * @package voila
 */
add_action('voila_post_tags', function ($post_id) {
	?>
	<div class="post-tags">
		<?php
			if (!empty(get_the_tags($post_id))) {
				foreach (get_the_tags($post_id)  as $tag) {
					echo sprintf('<a href="%s">%s</a>',  esc_url($tag->url), esc_html($tag->name));
				}
			} ?>
	</div>
<?php
}, 10, 1);