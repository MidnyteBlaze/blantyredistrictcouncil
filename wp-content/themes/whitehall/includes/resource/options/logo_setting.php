<?php return array(
	'title'      => esc_html__( 'Logo Setting', 'whitehall' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site favicon image', 'whitehall' ),
		),
		
		//Light Logo
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Logo', 'whitehall'),
            'default' => true,
        ),
		array(
			'id'       => 'light_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Logo Image', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site Light logo image', 'whitehall' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Logo Dimentions', 'whitehall' ),
			'subtitle' => esc_html__( 'Select Light Logo Dimentions', 'whitehall' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		
		//Dark Logo
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Logo', 'whitehall'),
            'default' => true,
        ),
		array(
			'id'       => 'dark_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Logo Image', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site Dark logo image', 'whitehall' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		array(
			'id'       => 'dark_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Logo Dimentions', 'whitehall' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimentions', 'whitehall' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		//Sticky Logo
		array(
            'id' => 'normal_logo_show3',
            'type' => 'switch',
            'title' => esc_html__('Enable Sticky Logo', 'whitehall'),
            'default' => true,
        ),
		array(
			'id'       => 'sticky_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Sticky Logo Image', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site Sticky logo image', 'whitehall' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'sticky_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Sticky Logo Dimentions', 'whitehall' ),
			'subtitle' => esc_html__( 'Select Sticky Logo Dimentions', 'whitehall' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		
		//Mobile Logo
		array(
            'id' => 'normal_logo_show4',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'whitehall'),
            'default' => true,
        ),
		array(
			'id'       => 'mobile_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo Image', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site Mobile logo image', 'whitehall' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'whitehall' ),
			'subtitle' => esc_html__( 'Select Mobile Logo Dimentions', 'whitehall' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show4', '=', true ),
		),
		
		//Sidebar Logo
		array(
            'id' => 'normal_logo_show5',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Logo', 'whitehall'),
            'default' => true,
        ),
		array(
			'id'       => 'sidebar_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Sidebar Logo Image', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload site Sidebar logo image', 'whitehall' ),
			'required' => array( 'normal_logo_show5', '=', true ),
		),
		array(
			'id'       => 'sidebar_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Sidebar Logo Dimentions', 'whitehall' ),
			'subtitle' => esc_html__( 'Select Sidebar Logo Dimentions', 'whitehall' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show5', '=', true ),
		),
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
