<?php

/**
 * Register Theme Assets
 * @package voila
 */
class Voila_Register_Theme_Assets
{

	private $list_of_assets = [];

	function __construct($list_of_assets = false)
	{
		if (is_array($list_of_assets)) {
			$this->list_of_assets = $list_of_assets;
			$this->register_assets();
		}
	}
	public function add_assets()
	{
		foreach ($this->list_of_assets as $type => $asset) {

			$dependency = isset($asset['dependency']) ? $asset['dependency'] : false;

			if ($type === 'style') {
				wp_enqueue_style($asset['id'],  $asset['src'], $dependency);
			}
			if ($type === 'script') {
				wp_enqueue_script($asset['id'], $asset['src'], $dependency);
			}
		}
	}

	public function register_assets()
	{
		add_action('wp_enqueue_scripts', [$this, 'add_assets']);
	}
}
