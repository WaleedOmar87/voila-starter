<?php

/**
 * Archive Template
 * @package voila
 */

get_header();

?>
<section class="page single-post-container">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				// print the archive title
				echo wp_kses(
					wp_sprintf(
						'<h1 class="page-title archive-title">%s</h1>',
						get_the_archive_title()
					),
					wp_kses_allowed_html('post')
				);

				// print the archive description
				echo wp_kses(
					wp_sprintf(
						'<p class="meta-text archive-description">%s</p>',
						get_the_archive_description()
					),
					wp_kses_allowed_html('post')
				);

				?>
			</div>
		</div>
		<div class="row">
			<div class="col col-md-8">
				<?php
				while (have_posts()) : the_post();

					get_template_part('includes/partials/post-content');

				endwhile;
				voila_blog_pagination();
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
