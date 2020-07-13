<?php

/**
 * Product Meta
 * @package voila
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="product-fabric-detail product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

		<span class="sku_wrapper"><?php echo esc_html__('SKU:', 'scoda'); ?>
			<span class="sku">
				<?php
					$sku_data = ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'scoda');
					echo esc_attr($sku_data);
					?>
			</span>
		</span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'scoda') . ' ', '</span>'); ?>

	<?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'scoda') . ' ', '</span>'); ?>

	<?php do_action('woocommerce_product_meta_end'); ?>

</div>