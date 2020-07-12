<?php

/**
 * WooCommerce Functions
 * @package voila
 */

/**
 * Add woocommerce theme support
 */
add_action('after_setup_theme',  function () {
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
});

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
add_filter('body_class', function ($classes) { {

		$classes[] = 'woocommerce-active';
		return $classes;
	}
});

/**
 * Custom Add To Cart Button
 */
add_action('voila_add_to_cart', function ($product, $args) {
	echo apply_filters(
		'woocommerce_loop_add_to_cart_link',
		sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s><span class="icon"><i class="mdi mdi-cart"></i></span>%s</a>',
			esc_url($product->add_to_cart_url()),
			esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
			esc_attr(isset($args['class']) ? $args['class'] : 'button'),
			isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
			esc_html($product->add_to_cart_text())
		),
		$product,
		$args
	);
}, 10, 2);
