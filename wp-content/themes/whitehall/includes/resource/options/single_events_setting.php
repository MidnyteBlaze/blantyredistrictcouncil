<?php return array(
	'title'      => esc_html__( 'Single Events Settings', 'whitehall' ),
	'id'         => 'single_whitehall_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'event_facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Facebook', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Twitter', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Linkedin', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Pinterest', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Reddit', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Tumblr', 'whitehall' ),
			'default' => false,
		),
		array(
			'id'      => 'event_digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Events Share', 'whitehall' ),
			'desc'    => esc_html__( 'Enable to show Events Share to Digg', 'whitehall' ),
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





