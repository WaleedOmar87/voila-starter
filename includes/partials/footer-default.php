<?php

/**
 * Footer Default Partial
 * @package voila
 */
?>
<footer class="footer footer-default section-bg-dark">
	<div class="container">
		<div class="row">
			<div class="col col-md-2 col-sm-2">
				<?php echo apply_filters('voila_site_logo', 'white'); ?>
			</div>
			<div class="col">
				<?php echo apply_filters('voila_inline_navigation' , 'footer-navigation' , 'white'); ?>
			</div>
			<div class="col col-md-3 col-sm-4">
				<?php echo apply_filters('voila_social_icons' , ['facebook' => 'voila_facebook_url' , 'twitter' => 'voila_twitter_url' , 'behance' => 'voila_behance_url'] , 'small' , 'white'); ?>
			</div>
		</div>
	</div>
</footer>