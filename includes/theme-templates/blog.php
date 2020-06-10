<?php

/**
 * Default Blog Template
 * @package voila
 */
get_header();
?>
<section id="blog" class="section-page blog-default">
	<div class="flex flex-wrap">
		<div class="w-1/4">
			<?php
			if (have_posts()) : while (have_posts()) : the_post();
					?>
					<article <?php esc_attr_e(post_class()); ?>>

						<?php do_action('voila_get_post_media'); ?>

						<h2 class="post-title">
							<?php the_title(); ?>
						</h2>

						<div class="post-content">
							<?php the_content(); ?>
						</div>

					</article>
			<?php
				endwhile;
				voila_blog_pagination();
			endif;
			wp_reset_query();
			?>
		</div>
		<div class="w-3/4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php

get_footer();
