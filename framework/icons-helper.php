<?php

/**
 * Register Icon Libraries
 * @package voila
 */

if (!function_exists('voila_get_icon')) {
	function voila_get_icon($icon_name, $family = 'fontawesome', $container = 'i')
	{
		global $wp_filesystem;

		require_once ABSPATH . '/wp-admin/includes/file.php';

		WP_Filesystem();


		$icon_path = sprintf('%s/icons/%s/%s.svg', VOILA_FRAMEWORK_ASSETS_PATH, $family , $icon_name);

		if ($icon_name !== '' && $wp_filesystem->exists($icon_path)) {

			$icon_content = $wp_filesystem->get_contents($icon_path);

			if ($container !== false) {
				return sprintf('<%1$s>%2$s</%1$s>', $container, $icon_content);
			}
			return $icon_content;
		}
	}
}