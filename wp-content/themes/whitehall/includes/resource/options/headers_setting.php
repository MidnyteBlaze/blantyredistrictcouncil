<?php return array(
	'title'      => esc_html__( 'Header Setting', 'whitehall' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'whitehall' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'whitehall' ),
				'e' => esc_html__( 'Elementor', 'whitehall' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'whitehall' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'whitehall' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'whitehall' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'whitehall' ),
		    'options'  => array(
			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style One', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style Two', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
			    'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style OnePage', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_onepage.png',
			    ),
			    'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style RTL', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_rtl.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v1',
	    ),
		
		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'whitehall' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Bar', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Bar.', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		
		//Weather
		array(
		    'id'       => 'show_weather_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Weather', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Weather.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'weather_text_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Weather Text', 'whitehall' ),
			'required' => array( 'show_weather_v1', '=', true ),
		),
		
		//Top Menu
		array(
		    'id'       => 'show_top_menu_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Menu', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Menu.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_phone_number_v1', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'whitehall' ),
			'required' => array( 'show_working_hours_v1', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'soltech' ),
			'required' => array( 'show_social_media_v1', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v1', '=', true ),
	    ),
		/***********************************************************************
								Sidebar Info V1
		************************************************************************/
		array(
            'id' => 'show_sidebar_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Title
		array(
		    'id'       => 'sidebar_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v1', '=', true ),
	    ),
		
		//Contact Form
		array(
		    'id'       => 'sidebar_cf7_v1',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Contact Form 7 Shortcode', 'whitehall' ),
			'required' => array( 'show_sidebar_v1', '=', true ),
		),
		
		//Contact Info Title
		array(
		    'id'       => 'sidebar_contact_info_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v1', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v1', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_sidebar_v1', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v1', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_sidebar_v1', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_sidebar_social_media_v1', '=', true ),
		),
		/***********************************************************************
								Mobile Menu V1
		************************************************************************/
		array(
            'id' => 'show_mobile_menu_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Menu', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Contact Info Title
		array(
		    'id'       => 'mobile_contact_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_mobile_menu_v1', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v1', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v1', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v1', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_mobile_menu_v1', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v1',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_mobile_social_media_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'whitehall' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_phone_number_v2', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'whitehall' ),
			'required' => array( 'show_working_hours_v2', '=', true ),
		),
		
		//Top Menu
		array(
		    'id'       => 'show_top_menu_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Menu', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Menu.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'soltech' ),
			'required' => array( 'show_social_media_v2', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v2', '=', true ),
	    ),
		/***********************************************************************
								Sidebar Info V1
		************************************************************************/
		array(
            'id' => 'show_sidebar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Title
		array(
		    'id'       => 'sidebar_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v2', '=', true ),
	    ),
		
		//Contact Form
		array(
		    'id'       => 'sidebar_cf7_v2',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Contact Form 7 Shortcode', 'whitehall' ),
			'required' => array( 'show_sidebar_v2', '=', true ),
		),
		
		//Contact Info Title
		array(
		    'id'       => 'sidebar_contact_info_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v2', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v2', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_sidebar_v2', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v2', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_sidebar_v2', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_sidebar_social_media_v2', '=', true ),
		),
		/***********************************************************************
								Mobile Menu V2
		************************************************************************/
		array(
            'id' => 'show_mobile_menu_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Menu', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Contact Info Title
		array(
		    'id'       => 'mobile_contact_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_mobile_menu_v2', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v2', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v2', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v2', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_mobile_menu_v2', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v2',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_mobile_social_media_v2', '=', true ),
		),
		
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style OnePage Settings', 'whitehall' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Show Top Bar', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Show Top Bar.', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v3' ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_phone_number_v3', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'whitehall' ),
			'required' => array( 'show_working_hours_v3', '=', true ),
		),
		
		//Top Menu
		array(
		    'id'       => 'show_top_menu_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Menu', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Menu.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v3',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'soltech' ),
			'required' => array( 'show_social_media_v3', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v3', '=', true ),
	    ),
		/***********************************************************************
								Sidebar Info V3
		************************************************************************/
		array(
            'id' => 'show_sidebar_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Title
		array(
		    'id'       => 'sidebar_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v3', '=', true ),
	    ),
		
		//Contact Form
		array(
		    'id'       => 'sidebar_cf7_v3',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Contact Form 7 Shortcode', 'whitehall' ),
			'required' => array( 'show_sidebar_v3', '=', true ),
		),
		
		//Contact Info Title
		array(
		    'id'       => 'sidebar_contact_info_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v3', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v3', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_sidebar_v3', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v3', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_sidebar_v3', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v3',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_sidebar_social_media_v3', '=', true ),
		),
		/***********************************************************************
								Mobile Menu V3
		************************************************************************/
		array(
            'id' => 'show_mobile_menu_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Menu', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Contact Info Title
		array(
		    'id'       => 'mobile_contact_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_mobile_menu_v3', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v3', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v3', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v3', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_mobile_menu_v3', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v3',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_mobile_social_media_v3', '=', true ),
		),
		
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style RTL Settings', 'whitehall' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		
		//Top Bar
		array(
		    'id'       => 'show_top_bar_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Bar', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Bar.', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		
		//Weather
		array(
		    'id'       => 'show_weather_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Weather', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Weather.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'weather_text_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Weather Text', 'whitehall' ),
			'required' => array( 'show_weather_v4', '=', true ),
		),
		
		//Top Menu
		array(
		    'id'       => 'show_top_menu_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Top Menu', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Top Menu.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		
		//Phone Number
		array(
		    'id'       => 'show_phone_number_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Phone Number', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Phone Number.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'phone_number_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_phone_number_v4', '=', true ),
		),
		
		//Working Hours
		array(
		    'id'       => 'show_working_hours_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Working Hours', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Working Hours.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
		    'id'       => 'working_hours_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Working Hours', 'whitehall' ),
			'required' => array( 'show_working_hours_v4', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_social_media_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		array(
			'id'    => 'social_media_v4',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'soltech' ),
			'required' => array( 'show_social_media_v4', '=', true ),
		),
		
		//Search
		array(
		    'id'       => 'show_search_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Search', 'soltech' ),
		    'desc'     => esc_html__( 'Enable/Disable Search.', 'soltech' ),
			'default'  => '',
			'required' => array( 'show_top_bar_v4', '=', true ),
	    ),
		/***********************************************************************
								Sidebar Info V4
		************************************************************************/
		array(
            'id' => 'show_sidebar_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable Sidebar Information', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Title
		array(
		    'id'       => 'sidebar_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v4', '=', true ),
	    ),
		
		//Contact Form
		array(
		    'id'       => 'sidebar_cf7_v4',
		    'type'     => 'textarea',
		    'title'    => esc_html__( 'Contact Form 7 Shortcode', 'whitehall' ),
			'required' => array( 'show_sidebar_v4', '=', true ),
		),
		
		//Contact Info Title
		array(
		    'id'       => 'sidebar_contact_info_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_sidebar_v4', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'sidebar_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v4', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'sidebar_phone_number_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_sidebar_v4', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'sidebar_email_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_sidebar_v4', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_sidebar_social_media_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_sidebar_v4', '=', true ),
	    ),
		array(
			'id'    => 'sidebar_social_media_v4',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_sidebar_social_media_v4', '=', true ),
		),
		/***********************************************************************
								Mobile Menu V4
		************************************************************************/
		array(
            'id' => 'show_mobile_menu_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Menu', 'whitehall'),
            'default' => false,
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Contact Info Title
		array(
		    'id'       => 'mobile_contact_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Contact Info Title', 'whitehall' ),
			'default'  => '',
		    'required' => array( 'show_mobile_menu_v4', '=', true ),
	    ),
		
		//Address
		array(
		    'id'       => 'mobile_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v4', '=', true ),
		),
		
		//Phone Number
		array(
		    'id'       => 'mobile_phone_number_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Phone Number', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v4', '=', true ),
		),
		
		//Email Address
		array(
		    'id'       => 'mobile_email_address_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Email Address', 'whitehall' ),
			'required' => array( 'show_mobile_menu_v4', '=', true ),
		),
		
		//Social Media
		array(
		    'id'       => 'show_mobile_social_media_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Social Media', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Social Media.', 'whitehall' ),
			'default'  => '',
			'required' => array( 'show_mobile_menu_v4', '=', true ),
	    ),
		array(
			'id'    => 'mobile_social_media_v4',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Media', 'whitehall' ),
			'required' => array( 'show_mobile_social_media_v4', '=', true ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
