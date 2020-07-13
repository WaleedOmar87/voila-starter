<?php

/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($cross_sells) : ?>

	<?php woocommerce_product_loop_start(); ?>

	<?php

		foreach ($cross_sells as $cross_sell) :

			$product = $cross_sell;

		?>

		<div class="col-md-3 col-sm-6">
			<div class="product">
				<div class="product-wrap">
					<?php echo apply_filters(
								'woocommerce_single_product_image_thumbnail_html',
								wc_get_gallery_image_html($product->get_image_id()),
								$product->get_image_id()
							); ?>
					<div class="product-caption">
						<div class="product-description text-center">
							<div class="product-description-wrap">
								<div class="product-title">
									<?php // woocommerce_template_loop_add_to_cart($product);
											do_action('scoda_add_to_cart', $product, [
												'class' => 'btn btn-color btn-circle',
											]); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product-detail">
					<h4><?php echo esc_html( $product->get_title() ); ?></h4>
					<p><?php echo wp_kses( $product->get_price_html() , wp_kses_allowed_html('post')  ); ?></p>
				</div>
			</div>
		</div>

	<?php endforeach; ?>

	<?php woocommerce_product_loop_end(); ?>
<?php endif;
wp_reset_postdata();
