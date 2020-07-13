<?php

/**
 * Single Product Template
 * @package voila
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header();

do_action('woocommerce_before_main_content');

?>

<section class="page single-post-container">
	<div class="container">
		<div class="row">
			<!-- get /content-single-product.php -->
			<?php while (have_posts()) : ?>
				<?php the_post(); ?>
				<?php
					wc_get_template_part('content', 'single-product'); ?>
			<?php endwhile; // end of the loop.
			?>
		</div>
		<div class="row">
			<?php woocommerce_cross_sell_display($limit = 4); ?>
		</div>
	</div>
</section>

<?php

do_action('woocommerce_after_main_content');

get_footer();
