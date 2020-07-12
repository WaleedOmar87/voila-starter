<?php

/**
 * Post Content Partial
 *
 * loop post content
 * @package voila
 */
?>

<div <?php post_class('page single-post'); ?>>

	<?php do_action('voila_post_media', get_the_ID()); ?>

	<div class="post-content">

		<?php do_action('voila_single_post_meta', get_the_ID()); ?>

		<div class="post-body-content">
			<?php
			/**
			 * Load the content if is singular , or the excerpt if we are inside a blog page
			 */
			if (is_singular()) {

				the_content();
				the_post_navigation();
			} else {

				the_excerpt();
			}
			?>
		</div>

		<?php do_action('voila_post_tags', get_the_ID()); ?>

		<?php do_action('voila_post_controls', get_the_ID()); ?>

		<?php
		/**
		 * Check if current post is singular to load comments section
		 */
		if (is_singular()) :
			?>
			<div id="post-comments" class="post-comments">
				<?php
					// display comments template
					comments_template();
					?>
			</div>
		<?php endif; ?>

	</div>
</div>