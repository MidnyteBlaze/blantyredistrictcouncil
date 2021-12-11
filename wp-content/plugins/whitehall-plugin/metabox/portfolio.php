<?php
return array(
	'title'      => 'Whitehall Portfolio Setting',
	'id'         => 'whitehall_meta_portfolio',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'portfolio' ),
	'sections'   => array(
		array(
			'id'     => 'whitehall_portfolio_meta_setting',
			'fields' => array(
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Select Image Dimension', 'whitehall' ),
					'options'  => array(
						'normal_height' => esc_html__( 'Normal Height (370x265)', 'whitehall' ),
						'extra_height' => esc_html__( 'Extra Height (370x560)', 'whitehall' ),
						'extra_width' => esc_html__( 'Extra Width (770x560)', 'whitehall' ),
					),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'whitehall' ),
				),
			),
		),
	),
);