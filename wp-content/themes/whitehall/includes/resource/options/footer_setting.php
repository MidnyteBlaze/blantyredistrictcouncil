<?php return array(
	'title'      => esc_html__( 'Footer Setting', 'whitehall' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'whitehall' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'whitehall' ),
				'e' => esc_html__( 'Elementor', 'whitehall' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'whitehall' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'whitehall' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'whitehall' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'whitehall' ),
		    'options'  => array(
			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
			    'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style RTL', 'whitehall' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer_rtl.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v6',
	    ),
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Show Footer Top
		array(
		    'id'       => 'show_footer_top_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Top', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Top.', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
	    ),
		
		//Footer Logo
		array(
            'id' => 'show_footer_logo',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Logo', 'whitehall'),
            'default' => true,
			'required' => array( 'show_footer_top_v1', '=', true ),
        ),
		array(
			'id'       => 'footer_logo_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload Footer logo image', 'whitehall' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/footer-logo.png' ),
			'required' => array( 'show_footer_logo', '=', true ),
		),
		
		//Newsletter
		array(
		    'id'       => 'show_footer_newsletter_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Newsletter', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Newsletter.', 'whitehall' ),
			'required' => array( 'show_footer_top_v1', '=', true ),
	    ),
		array(
		    'id'       => 'footer_newsletter_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter Title', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v1', '=', true ),
		),
		array(
		    'id'       => 'footer_newsletter_text_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter Text', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v1', '=', true ),
		),
		array(
		    'id'       => 'footer_newsletter_id_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter ID', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v1', '=', true ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v1',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'whitehall' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		
		//Navigation
		array(
            'id' => 'show_footer_menu_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'whitehall'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
        ),
		
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'whitehall' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		
		//Navigation
		array(
            'id' => 'show_footer_menu_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'whitehall'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
        ),
		
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style RTL Settings', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Show Footer Top
		array(
		    'id'       => 'show_footer_top_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Top', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Top.', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
	    ),
		
		//Footer Logo
		array(
            'id' => 'show_footer_logo',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Logo', 'whitehall'),
            'default' => true,
			'required' => array( 'show_footer_top_v3', '=', true ),
        ),
		array(
			'id'       => 'footer_logo_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo', 'whitehall' ),
			'subtitle' => esc_html__( 'Upload Footer logo image', 'whitehall' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/footer-logo.png' ),
			'required' => array( 'show_footer_logo', '=', true ),
		),
		
		//Newsletter
		array(
		    'id'       => 'show_footer_newsletter_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Footer Newsletter', 'whitehall' ),
		    'desc'     => esc_html__( 'Enable/Disable Footer Newsletter.', 'whitehall' ),
			'required' => array( 'show_footer_top_v3', '=', true ),
	    ),
		array(
		    'id'       => 'footer_newsletter_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter Title', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v3', '=', true ),
		),
		array(
		    'id'       => 'footer_newsletter_text_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter Text', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v3', '=', true ),
		),
		array(
		    'id'       => 'footer_newsletter_id_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Newsletter ID', 'whitehall' ),
			'required' => array( 'show_footer_newsletter_v3', '=', true ),
		),
		
		//Copyrights
		array(
			'id'      => 'copyrights_v3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'whitehall' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'whitehall' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		
		//Navigation
		array(
            'id' => 'show_footer_menu_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Menu', 'whitehall'),
            'default' => true,
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
        ),
		
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
