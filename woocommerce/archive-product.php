<?php

/**
 * Shop Page
 * @package voila
 */

get_header();
do_action('scoda_shop_intro');

?>

<!--=== Products Start ======-->
<section class="page">
	<div class="container container-fluid">
		<div class="row">
			<?php
				do_action('scoda_shop_layout');
			?>
		</div>
	</div>
</section>
<!--=== Products End ======-->
<?php
get_footer();
