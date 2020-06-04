<?php

/**
 * Default Sidebar
 * @package voila
 */

if (!is_active_sidebar('voila-sidebar')) {
	return;
}
?>
<aside class="sidebar">
	<?php dynamic_sidebar('voila-sidebar'); ?>
</aside>