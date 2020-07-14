<?php
/**
* Customizer Settings
* these settings use Kirki Customizer Framework
* @package voila
*/

if (!class_exists('Kirki')) {
	return;
}
// require customizer helper class
require_once VOILA_FRAMEWORK_PATH . '/customizer-helper.php';

$voila_customizer_settings = [
	'site_settings' => [
		"title" => esc_html__("Site Settings", 'voila'),
		"desc" => esc_html__("Edit Site Settings", 'voila'),
		"fields" => [
			[
				"id" => "logo_default",
				"title" => esc_html__("Default Logo", 'voila'),
				"type" => "image"
			],
			[
				"id" => "logo_white",
				"desc" => esc_html__("a light version of your logo that can be used on dark backgrounds. ", 'voila'),
				"title" => esc_html__("Site Logo Light Version", 'voila'),
				"type" => "image"
			],
			[
				"id" => "footer_copyrights",
				"title" => esc_html__("Footer Copyright Text", 'voila'),
				"type" => "textarea",
				"default" => ""
			]
		]
	],
	"blog_settings" => [
		"title" => esc_html__("Blog Settings", 'voila'),
		"desc" => esc_html__("Edit Blog Settings", 'voila'),
		"fields" => [
			[
				"id" => "single_post_type",
				"title" => esc_html__("Single Post Type", 'voila'),
				"type" => "select",
				"default" => "default",
				"placeholder" => esc_html__("Select Post Type", 'voila'),
				"choices" => [
					"default" => esc_html__("Classic With Sidebar", 'voila'),
					"fullwidth" => esc_html__("Fullwidth With No Sidebar", 'voila')
				]
			],
			[
				"id" => "post_share_text",
				"title" => esc_html__("Post Share Text", 'voila'),
				"type" => "textarea",
				"default" => "Share"
			]
		]
	],
	"page_settings" =>  [
		"title" =>  esc_html__("Page Settings", 'voila'),
		"desc" =>  esc_html__("Edit Page Settings", 'voila'),
		"fields" =>  [
			[
				"id" =>  "search_placeholder",
				"title" => esc_html__("Search Placeholder", 'voila'),
				"type" =>  "textarea",
				"default" => esc_html__("Search ..", 'voila')
			],
			[
				"id" =>  "enable_gototop",
				"title" => esc_html__("Enable Go To Top Button", 'voila'),
				"type" =>  "switch",
				"default" =>  "on",
				"choices" =>  [
					"on" =>  "On",
					"off" =>  "Off"
				]
			]
		]
	],
	"store_settings" =>  [
		"title" => esc_html__("Store Settings", 'voila'),
		"desc" => esc_html__("Edit Store Settings", 'voila'),
		"fields" =>  [
			[
				"id" =>  "store_limit",
				"title" => esc_html__("Limit Store Products", 'voila'),
				"type" =>  "number",
				"default" =>  9,
				"input_attr" =>  [
					"min" =>  0,
					"max" =>  100,
					"step" =>  1
				]
			]
		]
	],
	"contact_information" =>  [
		"title" => esc_html__("Contact Information", 'voila'),
		"desc" => esc_html__("Add your contact information , these information will be displayed in Contact Us Widget and Contact page template.", 'voila'),
		"fields" =>  [
			[
				"id" =>  "contact_address",
				"title" =>  "Address",
				"type" =>  "textarea",
				"default" =>  ""
			],
			[
				"id" =>  "contact_phone",
				"title" => esc_html__("Phone Number", 'voila'),
				"type" =>  "textarea",
				"default" =>  ""
			],
			[
				"id" =>  "contact_email",
				"title" => esc_html__("Email Address", 'voila'),
				"type" =>  "textarea",
				"default" =>  ""
			],
			[
				"id" =>  "contact_website",
				"title" => esc_html__("Website Url", 'voila'),
				"type" =>  "textarea",
				"default" =>  ""
			]
		]
	],
	"portfolio_settings" =>  [
		"title" => esc_html__("Portfolio Settings", 'voila'),
		"desc" => esc_html__("Edit Portfolio Settings", 'voila'),
		"fields" =>  [
			[
				"id" =>  "enable_cover_in_single_post",
				"title" => esc_html__("Enable Single Post Cover", 'voila'),
				"type" =>  "switch",
				"desc" => esc_html__("Enable or disable fullwidth cover in single portfolio post page.", 'voila'),
				"default" =>  "on",
				"choices" =>  [
					"on" =>  "On",
					"off" =>  "Off"
				]
			]
		]
	],
	"footer_settings" =>  [
		"title" => esc_html__("Footer Settings", 'voila'),
		"desc" => esc_html__("Edit Footer Settings", 'voila'),
		"fields" =>  []
	],
	"social_settings" =>  [
		"title" => esc_html__("Social Media Settings", 'voila'),
		"desc" => esc_html__("Edit Social Media Settings", 'voila'),
		"fields" =>  [
			[
				"id" =>  "facebook_url",
				"title" => esc_html__("Add your facebook page url", 'voila'),
				"type" =>  "text",
				"default" =>  ""
			],
			[
				"id" =>  "twitter_url",
				"title" => esc_html__("Add your twitter url", 'voila'),
				"type" =>  "text",
				"default" =>  ""
			],
			[
				"id" =>  "linkedin_url",
				"title" => esc_html__("Add your linkedin url", 'voila'),
				"type" =>  "text",
				"default" =>  ""
			],
			[
				"id" =>  "instagram_url",
				"title" => esc_html__("Add your instagram page url", 'voila'),
				"type" =>  "text",
				"default" =>  ""
			],
			[
				"id" =>  "pinterest_url",
				"title" => esc_html__("Add your pinterest page url", 'voila'),
				"type" =>  "text",
				"default" =>  ""
			],
			[
				"id" =>  "discord",
				"title" => esc_html__("Add your discord url", 'voila'),
				"type" =>  "textarea",
				"default" =>  ""
			]
		]
	],
	"style_settings" => [
		'title' => esc_html__('Style Settings', 'voila'),
		'desc' => esc_html__('Change theme style and typography settings', 'voila'),
		'fields' => [
			// colors palette #d42e22
			[
				'id' => 'color_palette',
				'title' => esc_html__('Color Palette', 'voila'),
				'type' => 'palette',
				'default' => 'red',
				'choices'  => [
					'red' => [
						'#d42e22'
					],
					'green' => [
						'#00c07f'
					],
					'yellow' => [
						'#FDD835'
					] ,
					'orange' => [
						'#f39c12'
					] ,
					'asphalt' => [
						'#34495e'
					] ,
					'purple' => [
						'#8e44ad'
					]
				],
				'priority'    => 10,
				'transport'   => 'auto'

			],
			[
				'id' => 'accent_color'  ,
				'title' => esc_html__('Custom Accent Color' , 'voila') ,
				'label' => esc_html__('Custom Accent Color' , 'voila') ,
				'description' => esc_html__('Add custom accent color , custom accent color field will disable the choice of Color Palette' , 'voila'),
				'type' => 'color' ,
				'default' => ''
			] ,
			[
				'id' => 'body_typography',
				'title' => esc_html__('Body Typography', 'voila'),
				'label' => esc_html__('Body Typography', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-family'    => 'Montserrat',
					'variant'        => 'normal',
					'font-size'      => '15px',
					'line-height'    => '1.6',
					'font-weight' => '400',
					'color'          => '#525252',
					'text-transform' => 'none',
					'text-align'     => 'left',
				],
				'choices' => [
					'fonts' => [
						'google' => ['popularity', 30],
						'standard' => [
							'Montserrat',
							'Rubik'
						],
					],
				],
				'priority'    => 10,
				'transport'   => 'auto'
			],
			[
				'id' => 'heading_typography',
				'title' => esc_html__('Heading Typography', 'voila'),
				'label' => esc_html__('Heading Typography', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-family'    => 'Rubik'
				],
				'choices' => [
					'fonts' => [
						'google' => ['popularity', 30],
						'standard' => [
							'Rubik',
							'Montserrat',
							'Roboto',
						],
					],
				],
				'priority'    => 10,
				'transport'   => 'auto'
			] ,
			[
				'id' => 'h1_font_size',
				'title' => esc_html__('H1 Font Size', 'voila'),
				'label' => esc_html__('H1 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '42px'
				]
			] ,
			[
				'id' => 'h2_font_size',
				'title' => esc_html__('H2 Font Size', 'voila'),
				'label' => esc_html__('H2 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '32px'
				]
			] ,
			[
				'id' => 'h3_font_size',
				'title' => esc_html__('H3 Font Size', 'voila'),
				'label' => esc_html__('H3 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '28px'
				]
			] ,
			[
				'id' => 'h4_font_size',
				'title' => esc_html__('H4 Font Size', 'voila'),
				'label' => esc_html__('H4 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '26px'
				]
			] ,
			[
				'id' => 'h5_font_size',
				'title' => esc_html__('H5 Font Size', 'voila'),
				'label' => esc_html__('H5 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '20px'
				]
			] ,
			[
				'id' => 'h6_font_size',
				'title' => esc_html__('H6 Font Size', 'voila'),
				'label' => esc_html__('H6 Font Size', 'voila'),
				'type'        => 'typography',
				'default'     => [
					'font-size'    => '15px'
				]
			] ,
		]
	]
];

$voila_customizer = new Voila_Customizer_Settings($voila_customizer_settings);