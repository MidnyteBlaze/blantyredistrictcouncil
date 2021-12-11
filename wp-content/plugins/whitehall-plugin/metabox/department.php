<?php
return array(
	'title'      => 'Whitehall Department Setting',
	'id'         => 'whitehall_meta_department',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'department' ),
	'sections'   => array(
		array(
			'id'     => 'whitehall_department_meta_setting',
			'fields' => array(
				array(
					'id'       => 'icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Department Icons', 'whitehall' ),
					'options'  => get_fontawesome_icons(),
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