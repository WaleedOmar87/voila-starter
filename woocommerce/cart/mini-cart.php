<?php

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>


<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<i class="icofont icofont-cart"></i>
	<?php if(!WC()->cart->is_empty()) : ?>
	<span class="badge"><?php echo WC()->cart->cart_contents_count; ?></span>
	<?php endif; ?>
</a>
<?php if (!WC()->cart->is_empty()) : ?>

	<ul class="dropdown-menu cart-list animated <?php echo esc_attr($args['list_class']); ?>">
		<?php
			do_action('woocommerce_before_mini_cart_contents');

			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
					$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
					$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
					$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
				<li class="<?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
					<a href="<?php echo empty($product_permalink) ? '#' : esc_url($product_permalink); ?>" class="photo">
						<?php echo wp_kses($thumbnail , wp_kses_allowed_html('post')); ?>
					</a>
					<h6><a href="<?php echo empty($product_permalink) ? '#' : esc_url($product_permalink); ?>"><?php echo esc_html($product_name); ?></a></h6>

					<p>
						<?php
									echo  isset($cart_item['quantity']) ? $cart_item['quantity'] : '';
									echo  'x - ' .  '<span class="price">' . $product_price . '</span>';
									?>
					</p>
					<?php echo wc_get_formatted_cart_item_data($cart_item); ?>

				</li>
		<?php
				}
			}

			?>
		<li class="total"> <span class="pull-right"><?php do_action('woocommerce_widget_shopping_cart_total'); ?></span> <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="btn btn-default btn-cart"><?php echo esc_html__('Cart', 'scoda'); ?></a> </li>
		<?php

			do_action('woocommerce_mini_cart_contents');
			?>
	</ul>

<?php else : ?>

	<ul class="dropdown-menu cart-list animated cart-is-empty">
		<li>
			<p><?php echo esc_html__('No Products In Cart', 'scoda'); ?></p>
		</li>
	</ul>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>