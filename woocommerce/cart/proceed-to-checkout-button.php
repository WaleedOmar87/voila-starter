<?php

/**
 * Proceed To Checkout Button
 * @package voila
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<a class="btn btn-color btn-animate" href="<?php echo esc_url(wc_get_checkout_url()); ?>"><span><?php echo esc_html__('Proceed to Checkout', 'scoda'); ?> <i class="icofont icofont-check"></i></span></a>