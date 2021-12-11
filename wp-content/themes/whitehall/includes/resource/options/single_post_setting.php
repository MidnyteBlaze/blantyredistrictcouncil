<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'whitehall' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'whitehall' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'whitehall' ),
				'e' => esc_html__( 'Elementor', 'whitehall' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'whitehall' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





