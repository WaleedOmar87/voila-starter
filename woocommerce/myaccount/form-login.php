<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<!-- User Login And Registration -->
<div class="table-display">
	<div class="login v-align text-center">
		<div class="signup-box">
			<ul id="signup-tabs" class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#login"><?php echo esc_html__('Login', 'scoda'); ?></a>
				</li>

				<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
					<li><a data-toggle="tab" href="#account"><?php echo esc_html__('Create Account', 'scoda'); ?></a></li>
				<?php endif; ?>
			</ul>

			<div id="signup-content" class="tab-content">
				<div id="login" class="tab-pane fade in active">
					<!--=== Form ===-->
					<form method="post" class="woocommerce-form woocommerce-form-login login form login_type text-center">

						<?php do_action('woocommerce_login_form_start'); ?>

						<!--=== Username ===-->
						<input type="text" name="username" class="form-control mb-20 woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php echo esc_attr('Username', 'scoda'); ?>" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />

						<!--=== Password ===-->
						<input type="password" name="password" class="woocommerce-Input woocommerce-Input--text input-text form-control mb-20" placeholder="<?php echo esc_attr('Password', 'scoda'); ?>" id="password" autocomplete="current-password" />

						<?php do_action('woocommerce_login_form'); ?>

						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'scoda'); ?></span>

						<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>

						<!--=== Submit ===-->
						<button type="submit" name="login" class="woocommerce-button button woocommerce-form-login__submit btn btn-color btn-circle full-width" name="login" value="<?php echo esc_attr('LOGIN', 'scoda'); ?>">
							<?php echo esc_html__('LOGIN', 'scoda'); ?>
						</button>

						<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
							<!--=== Signup Text ===-->
							<h6 class="mt-20 gray-light"><?php echo esc_html__("DON'T HAVE AN ACCOUNT?", 'scoda'); ?></h6>
							<!--=== Signup Button ===-->
							<a href="#"><?php echo esc_html__('SIGN UP', 'scoda'); ?><i class="fa fa-angle-double-right"></i>
							</a>
						<?php endif; ?>

						<p class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'scoda'); ?></a>
						</p>

						<?php do_action('woocommerce_login_form_end'); ?>
					</form>
					<!--=== End Form ===-->
				</div>

				<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

					<div id="account" class="tab-pane fade">
						<!--=== Form ===-->
						<form method="post" class="form login_type text-center woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

							<?php do_action('woocommerce_register_form_start'); ?>

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
								<!--=== Username ===-->
								<input type="text" name="username" class="form-control mb-20 woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php echo esc_html__('Your Name', 'scoda'); ?>" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
							<?php endif; ?>

							<!--=== Your Email ===-->
							<input type="email" class="form-control mb-20 woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" placeholder="<?php echo esc_html__('Your Username', 'scoda'); ?>" />

							<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
								<!--=== Password ===-->
								<input type="password" name="password" class="form-control mb-20 woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php echo esc_html__('Password', 'scoda'); ?>" id="reg_password" autocomplete="new-password" />
							<?php else : ?>

								<p>
									<?php esc_html_e('A password will be sent to your email address.', 'scoda'); ?></p>

							<?php endif; ?>

							<?php do_action('woocommerce_register_form'); ?>

							<!--=== Submit ===-->
							<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
							<button type="submit" name="register" class="btn btn-color btn-circle full-width woocommerce-Button woocommerce-button button woocommerce-form-register__submit" value="<?php esc_attr_e('Register Now', 'scoda'); ?>">
								<?php echo esc_html__('REGISTER NOW', 'scoda'); ?>
							</button>

							<?php do_action('woocommerce_register_form_end'); ?>

						</form>
						<!--=== End Form ===-->
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>