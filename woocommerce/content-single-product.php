<?php

/**
 * Single Product Template
 */

defined('ABSPATH') || exit;

global $product;

?>

<?php
/**
 *  Hook: woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
if (post_password_required()) {
	echo get_the_password_form();
	return;
}

/**
 *  Hook: woocommerce_before_single_product_summary hook
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
do_action('woocommerce_before_single_product');

?>
<div class="col-6 col-xs-12">
	<?php do_action('woocommerce_before_single_product_summary'); ?>
</div>
<div class="col-6 col-xs-12">
	<?php do_action('woocommerce_single_product_summary'); ?>
</div>
<?php

do_action('woocommerce_after_single_product_summary');

do_action('woocommerce_after_single_product');
