<?php

/**
 * Product Description
 * @package voila
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);

if (!$short_description) {
	return;
}

?>
<div class="single-product-des">
	<h5><?php echo esc_html__('Product Description', 'scoda'); ?></h5>
	<p>
		<?php echo wp_kses($short_description , wp_kses_allowed_html( 'post' )); ?>
	</p>
</div>