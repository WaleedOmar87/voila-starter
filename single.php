<?php

/**
 * Single Post
 * @package voila
 */

get_header();

$voila_get_post_layout = (function_exists('get_field') &&
	get_field('voila_post_layout')) ? get_field('voila_post_layout') : 'right-sidebar';
?>

<section class="page single-post-container">
	<div class="container">
		<div class="row">
			<div class="col col-md-8">
				<?php
				while (have_posts()) : the_post();

					get_template_part('includes/partials/post-content');

				endwhile;
				wp_reset_query(); ?>
			</div>
			<div class="col col-md-4 col-sm-12">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
