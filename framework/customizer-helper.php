<?php
/**
* Customizer Helper
* @package voila
*/

class Voila_Customizer_Settings
{
	public $config;
	public $error = false;

	function __construct($settings)
	{
		$this->config = $settings;
		$this->init();
	}

	function init()
	{
		if (empty($this->config)) {
			return;
		}
		if (!class_exists('Kirki')) {
			$this->error = new WP_Error(esc_html__('Kirki Plugin Is Not Installed', 'voila'));
			return $this->error;
		}
		$this->register_sections($this->config);
	}

	function register_sections()
	{
		Kirki::add_config('voila_customizer_settings', [
			'capability' => 'edit_theme_options',
			'option_type' => 'theme_mod',
		]);
		Kirki::add_panel('voila_panel', array(
			'priority' => 10,
			'title' => esc_html__('voila Settings', 'voila'),
			'description' => esc_html__('Edit Theme Settings', 'voila'),
		));
		foreach ($this->config as $id => $page) {
			$section_id = 'voila_' . $id;
			Kirki::add_section($section_id, [
				'title' => $page['title'],
				'description' => $page['desc'],
				'panel' => 'voila_panel',
				'priority' => 160,
			]);

			foreach ($page['fields'] as $field) {
				$field_id = 'voila_' . $field['id'];
				Kirki::add_field('voila_customizer_settings', [
					'type' => $field['type'],
					'settings' => $field_id,
					'label' => $field['title'],
					'placeholder' => isset($field['placeholder']) ? $field['placeholder'] : false,
					'section' => $section_id,
					'choices' => isset($field['choices']) ? $field['choices'] : false,
					'default' => isset($field['default']) ? $this->esc_default($field['type'], $field['default'], 'voila') : '',
					'priority' => 10
				]);
			}
		}
	}

	function stdToArray($std)
	{
		$array = [];
		foreach ($std as $id => $field) {
			$array[$id] = $field;
		}
		return $array;
	}

	function esc_default($type, $content)
	{
		if ($type === 'image' || $type === 'link') {
			return esc_url($content);
		}
		return $content;
	}
}