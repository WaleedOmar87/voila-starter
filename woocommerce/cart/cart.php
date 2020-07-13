<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>

	<div class="table-responsive">

		<table class="shop_table_responsive cart woocommerce-cart-form__contents table table-bordered shop-cart" cellspacing="0">
			<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-thumbnail"><?php esc_html_e('Item' , 'scoda'); ?></th>
					<th class="product-name"><?php esc_html_e('Product', 'scoda'); ?></th>
					<th class="product-price"><?php esc_html_e('Price', 'scoda'); ?></th>
					<th class="product-quantity"><?php esc_html_e('Quantity', 'scoda'); ?></th>
					<th class="product-subtotal"><?php esc_html_e('Subtotal', 'scoda'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action('woocommerce_before_cart_contents'); ?>

				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
						$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
						?>
						<tr style="border-collapse: none;" class="woocommerce-cart-form__cart-item cart_item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

							<td class="product-remove">
								<?php
										echo apply_filters(
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icofont-close-circled"></i></a>',
												esc_url(wc_get_cart_remove_url($cart_item_key)),
												esc_html__('Remove this item', 'scoda'),
												esc_attr($product_id),
												esc_attr($_product->get_sku())
											),
											$cart_item_key
										);
										?>
							</td>

							<td class="product-thumbnail">
								<?php
										$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

										if (!$product_permalink) {
											echo wp_kses($thumbnail , wp_kses_allowed_html('post')); // PHPCS: XSS ok.
										} else {
											printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
										}
										?>
							</td>

							<td class="product-name" data-title="<?php esc_attr_e('Product', 'scoda'); ?>">
								<?php
										if (!$product_permalink) {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
										} else {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
										}

										do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

										// Meta data.
										echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

										// Backorder notification.
										if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
											echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'scoda') . '</p>', $product_id));
										}
										?>
							</td>

							<td class="product-price" data-title="<?php esc_attr_e('Price', 'scoda'); ?>">
								<span>
									<?php
											echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
											?>
								</span>
							</td>

							<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'scoda'); ?>">
								<?php
										if ($_product->is_sold_individually()) {
											$product_quantity = sprintf('1 <input class="form-control" type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
										} else {
											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $_product->get_max_purchase_quantity(),
													'min_value'    => '0',
													'product_name' => $_product->get_name(),
												),
												$_product,
												false
											);
										}

										echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
										?>
							</td>

							<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'scoda'); ?>">
								<?php
										echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
										?>
							</td>
						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>
	</div><!-- end table responsive -->

	<div class="row">
		<div class="col-md-12">
			<div class="payment-box">
				<div class="row">
					<div class="col-md-6">
						<div class="summary-cart">
							<h6 class="upper-case"><?php echo esc_html__('Order Details', 'scoda'); ?></h6>
							<?php
							/**
							 * Cart collaterals hook.
							 * @extends cart-totals.php
							 * @hooked woocommerce_cross_sell_display
							 * @hooked woocommerce_cart_totals - 10
							 */
							// do_action('woocommerce_cart_collaterals');
							woocommerce_cart_totals();
							?>
							<div class="check-btns">
								<?php
								// checkout button
								$checkout_url = wc_get_checkout_url();
								?>

								<button type="submit" class="btn btn-green btn-animate" name="update_cart" value="<?php esc_attr_e('Update cart', 'scoda'); ?>"><span><?php esc_html_e('Update cart', 'scoda'); ?></span><i class="icofont icofont-refresh"></i></button>


								<?php do_action('woocommerce_proceed_to_checkout'); ?>

							</div>
						</div>
					</div>
					<?php if (get_option('woocommerce_enable_coupons')) : ?>
						<div class="col-md-6">
							<div class="form-coupon">
								<h6 class="upper-case"><?php echo esc_html__('Have A Coupon?', 'scoda'); ?></h6>
								<div class="input-group">
									<input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'scoda'); ?>" />

									<div class="input-group-btn">
										<button type="submit" class="btn btn-color btn-animate" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'scoda'); ?>">
											<span>
												<?php esc_attr_e('Apply coupon', 'scoda'); ?>
												<i class="icofont icofont-check"></i>
											</span>
										</button>
										<?php
											do_action('woocommerce_cart_actions');
											wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce');
											?>
									</div>

									<?php do_action('woocommerce_cart_coupon'); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php do_action('woocommerce_cart_contents'); ?>

	<?php do_action('woocommerce_after_cart_contents'); ?>

	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<?php do_action('woocommerce_after_cart'); ?>