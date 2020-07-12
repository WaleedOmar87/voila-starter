<?php

/**
 * 404 Page
 * @package voila
 */
get_header();
?>
<section class="page 404-container">
	<div class="container">
		<div class="row">
			<div class="col col-md-8">
				<?php
				// get 404 partial
				get_template_part('includes/partials/404-content');
				?>
			</div>
			<div class="col col-md-4 col-sm-12">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
