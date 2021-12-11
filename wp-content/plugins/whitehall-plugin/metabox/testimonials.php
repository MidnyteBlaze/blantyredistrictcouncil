<?php
return array(
	'title'      => 'Whitehall Testimonials Setting',
	'id'         => 'whitehall_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'whitehall_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'whitehall' ),
				),
			),
		),
	),
);