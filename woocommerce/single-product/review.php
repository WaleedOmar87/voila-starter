<?php

/**
 * Product Review
 * @package voila
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div <?php comment_class(); ?> id="div-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php
		/**
		 * The woocommerce_review_before hook
		 *
		 * @hooked woocommerce_review_display_gravatar - 10
		 */
		do_action('woocommerce_review_before', $comment);
		?>

		<div class="comment-text">

			<?php
			/**
			 * The woocommerce_review_before_comment_meta hook.
			 *
			 * @hooked woocommerce_review_display_rating - 10
			 */
			do_action('woocommerce_review_before_comment_meta', $comment);

			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action('woocommerce_review_meta', $comment);

			do_action('woocommerce_review_before_comment_text', $comment);

			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			do_action('woocommerce_review_comment_text', $comment);

			do_action('woocommerce_review_after_comment_text', $comment);
			?>

		</div>
	</div>