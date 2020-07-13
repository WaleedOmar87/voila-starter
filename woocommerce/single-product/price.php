<?php

/**
 * Product Price
 * @package voila
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

?>
<h3 class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><span><?php echo wp_kses( $product->get_price_html() , wp_kses_allowed_html('post')  ); ?></span></h3>