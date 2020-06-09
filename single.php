<?php

/**
 * Single Post
 * @package voila
 */

get_header();

$voila_get_post_layout = (function_exists('get_field') &&
	get_field('voila_post_layout')) ? get_field('voila_post_layout') : 'right-sidebar';
?>

<section class="single-post-container">

	<?php
	while (have_posts()) : the_post();

		?>
		<div <?php post_class('page single-post'); ?>>

			<?php do_action('voila_post_media', get_the_ID()); ?>

			<div class="post-content">

				<?php do_action('voila_single_post_meta' , get_the_ID()); ?>

				<div class="post-body-content">
					<?php
						the_content();
						the_post_navigation();
						?>
				</div>

				<?php do_action('voila_post_tags' , get_the_ID()); ?>

				<?php do_action('voila_post_controls', get_the_ID()); ?>

				<div id="post-comments" class="post-comments">
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;
						?>
				</div>
			</div>
		</div>

		<!-- sidebar -->

	<?php
	endwhile;
	wp_reset_query();
	?>
</section>
<?php
get_footer();
