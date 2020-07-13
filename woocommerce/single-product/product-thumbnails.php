<?php

/**
 * Single Product Thumbnails
 * @package
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="product-slider flexslider">
		<ul class="slides">
			<?php
			echo esc_html($product->get_id());
			foreach ($attachment_ids as $attachment_id) {
				$thumbnail = wp_get_attachment_image_src($attachment_id, 'medium');
				$image = get_the_post_thumbnail_url($product->get_id(), 'full');

				echo '<li data-thumb="' . esc_url($thumbnail[0]) . '"> <img src="' . esc_url($image) . '" class="img-responsive" alt="testing" /> </li>';
			}
			?>
		</ul>
	</div>
</div>