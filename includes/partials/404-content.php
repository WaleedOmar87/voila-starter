<?php

/**
 * 404 Content Partial
 *
 * loop post content
 * @package voila
 */
?>

<div <?php post_class('page single-post'); ?>>

	<div class="post-content">

		<div class="post-info">

			<?php
			echo wp_sprintf(
				'<h2 class="page-title">%s</h2><p class="meta-text">%s</p>',
				esc_html__('Looks Like You Are Lost.', 'voila'),
				esc_html__('Try a different search phrase .. ', 'voila')
			);

			get_search_form();
			?>
		</div>

	</div>
</div>