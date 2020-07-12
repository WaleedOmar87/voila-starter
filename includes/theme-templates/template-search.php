<?php

/**
 * Template Search
 * @package voila
 */
get_header();

/**
 * Prepare Search Query
 */
$voila_query_args = [
	'post_type' => 'post',
	'post_status' => 'published',
	'posts_per_page' => get_option('posts_per_page', 9),
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
	's' => get_search_query()
];
$voila_search = new WP_Query($voila_query_args);

?>
<section id="search-page" class="page search-container">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php
				echo wp_kses(
					wp_sprintf(
						'<h1 class="page-title">%s <b>%s</b></h1>',
						esc_html__('Search Results For ', 'voila'),
						get_search_query()
					),
					wp_kses_allowed_html('post')
				); ?>
			</div>
		</div>
		<div class="row">
			<div class="col col-md-8">
				<?php
				if ($voila_search->have_posts()) : while ($voila_search->have_posts()) : $voila_search->the_post();
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
