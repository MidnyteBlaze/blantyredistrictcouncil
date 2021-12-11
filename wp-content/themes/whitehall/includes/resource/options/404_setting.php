<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'whitehall' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'whitehall' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'whitehall' ),
				'e' => esc_html__( 'Elementor', 'whitehall' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'whitehall' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'whitehall' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		//404 Banner
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'whitehall' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'whitehall' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'whitehall' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'whitehall' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'whitehall' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		
		//404 Content
		array(
			'id'       => 'error_page_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '404 Image', 'whitehall' ),
			'desc'     => esc_html__( 'Insert 404 image for content', 'whitehall' ),
			'default'  => array(
			    'url' => WHITEHALL_URI . 'assets/images/icons/error.png',
		    ),
		),
		array(
			'id'    => 'error_404',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'whitehall' ),
			'desc'  => esc_html__( 'Enter 404 title that you want to show.', 'whitehall' ),
		),
		array(
			'id'    => 'error_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Text', 'whitehall' ),
			'desc'  => esc_html__( 'Enter 404 page text that you want to show.', 'whitehall' ),
		),
		array(
			'id'    => 'back_to_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'whitehall' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'whitehall' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'whitehall' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'whitehall' ),
			'default'  => esc_html__( 'Back to Home', 'whitehall' ),
			'required' => array( 'back_to_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);
