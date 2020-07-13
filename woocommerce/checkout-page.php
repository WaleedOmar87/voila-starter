<?php

/**
* Checkout Page Template
 * @package voila
 */

get_header();

?>
<!--=== Products Start ======-->
<section class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				while (have_posts()) :
					the_post();

					the_content();

				endwhile;

				wp_reset_query();
				?>
			</div>
		</div>
	</div><!-- end container -->
</section>
<!--=== Products End ======-->

<?php get_footer();
