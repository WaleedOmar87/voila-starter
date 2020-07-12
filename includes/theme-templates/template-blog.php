<?php

/**
 * Default Blog Template
 * @package voila
 */
get_header();
?>
<section id="blog" class="page blog-default-container">
	<div class="container">
		<div class="row">
			<div class="col col-md-8">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
						// load post content
						get_template_part('includes/partials/post-content');

					endwhile;
					voila_blog_pagination();
				endif;
				wp_reset_query();
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
