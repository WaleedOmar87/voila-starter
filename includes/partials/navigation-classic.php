<?php

/**
 * Classic Navigation Menu
 * @package voila
 */

?>
<header id="site-header" class="header-section" role="banner">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php echo apply_filters('voila_site_logo', 'black'); ?>
			</div>

			<div class="col">
				<?php wp_nav_menu( ['theme_location' => 'primary'] ); ?>
			</div>

			<div class="col ml-auto">
				<a href="#" class="button icon-button module-button" data-module-trigger="search-module">
					<?php
					echo wp_kses(
						voila_get_icon('search'),
						wp_kses_allowed_html('post')
					);
					?>
				</a>
				<a href="#" class="button icon-button module-button" data-module-trigger="navigation-module">
					<?php
					echo wp_kses(
						voila_get_icon('align-justify'),
						wp_kses_allowed_html('post')
					);
					?>
				</a>
			</div>
		</div>
	</div>
</header>