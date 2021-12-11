<?php
return array(
	'title'      => 'Whitehall Team Setting',
	'id'         => 'whitehall_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'whitehall_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'whitehall' ),
				),
				array(
					'id'    => 'email',
					'type'  => 'text',
					'title' => esc_html__( 'Email Address', 'whitehall' ),
				),
				array(
					'id'    => 'phone',
					'type'  => 'text',
					'title' => esc_html__( 'Phone Number', 'whitehall' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'whitehall' ),
				),
			),
		),
	),
);