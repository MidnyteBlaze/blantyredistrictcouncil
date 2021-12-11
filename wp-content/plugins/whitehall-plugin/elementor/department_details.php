<?php namespace WHITEHALLPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Department_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_department_details';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Department Details', 'whitehall' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-briefcase';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'whitehall' ];
    }

    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'department_details',
            [
                'label' => esc_html__( 'Department Details', 'whitehall' ),
            ]
        );
		$this->add_control(
            'image',
            [
                'label' => __( 'Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'text',
            [
                'label'       => __( 'Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
		
		//Features
		$this->start_controls_section(
            'features_tab',
            [
                'label' => esc_html__( 'Features', 'whitehall' ),
            ]
        );
		$this->add_control(
            'features',
            [
                'label'   => esc_html__( 'Features', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
							'name' => 'image',
							'label' => __( 'Image', 'whitehall' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//City Details
		$this->start_controls_section(
            'city_details_tab',
            [
                'label' => esc_html__( 'City Details', 'whitehall' ),
            ]
        );
		$this->add_control(
            'city_detail',
            [
                'label'   => esc_html__( 'City Details', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'icon',
                            'label' => esc_html__('Select Icon', 'whitehall'),
                            'type' => Controls_Manager::SELECT2,
							'label_block' => true,
                            'options' => get_fontawesome_icons(),
                        ],
						[
							'name' => 'image',
							'label' => __( 'Image', 'whitehall' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'features',
                            'label' => esc_html__('Features', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'btn_title',
                            'label' => esc_html__('Button Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'whitehall'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com/', 'whitehall' ),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//Download Resources
		$this->start_controls_section(
            'download_resources_tab',
            [
                'label' => esc_html__( 'Download Resources', 'whitehall' ),
            ]
        );
        $this->add_control(
            'title1',
            [
                'label'       => __( 'Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Download Resources', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
							'name' => 'icon_image',
							'label' => __( 'Icon Image', 'whitehall' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],
						[
                            'name' => 'file_size',
                            'label' => esc_html__('File Description', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_title',
                            'label' => esc_html__('Button Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'whitehall'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => __( 'https://your-link.com/', 'whitehall' ),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                        ],
                    ],
            ]
        );
		$this->end_controls_section();
		
		//Sidebar
		$this->start_controls_section(
            'sidebar_tab',
            [
                'label' => esc_html__( 'Sidebar', 'whitehall' ),
            ]
        );
		$this->add_control(
			'sidebar',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'manzil' ),
				'separate' => 'before',
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => whitehall_get_sidebars(),
			]
		);
        $this->end_controls_section();
    }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- department-details -->
        <section class="department-details bg-color-1 sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="department-details-content">
							<?php if($settings['image']['id']) { ?>
                            <div class="upper-image">
                                <figure class="image"><img src="<?php echo wp_get_attachment_url($settings['image']['id']); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                            </div>
							<?php } ?>
							
                            <div class="text">
                                <h3><?php echo wp_kses( $settings['title'], true ); ?></h3>
                                <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                            </div>
							
							<?php if($settings['features']) { ?>
                            <div class="discription-box centred">
                                <div class="two-column-carousel owl-carousel owl-theme owl-nav-none">
                                    <?php foreach($settings['features'] as $key => $item) { ?>
									<div class="single-item">
                                        <div class="inner-box">
                                            <figure class="image-box"><img src="<?php echo wp_get_attachment_url($item['image']['id']); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                            <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                        </div>
                                        <div class="overlay-content">
                                            <figure class="image-box"><img src="<?php echo wp_get_attachment_url($item['image']['id']); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                            <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
							<?php } ?>
							
							<?php if($settings['city_detail']) { ?>
                            <div class="highlights-box">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                    <?php foreach($settings['city_detail'] as $key => $item) { ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                            <div class="image-box">
                                                <figure class="image"><img src="<?php echo wp_get_attachment_url($item['image']['id']); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                                <div class="icon-box"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                            <div class="text">
                                                <h3><?php echo wp_kses( $item['title'], true ); ?></h3>
                                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
												
												<?php $features_list = $item['features'];
												if(!empty($features_list)){
												$features_list = explode("\n", ($features_list)); ?>
                                                <ul class="list clearfix">
													<?php foreach($features_list as $features): ?>
                                                    <li><i class="flaticon-bird"></i><?php echo wp_kses($features, true); ?></li>
													<?php endforeach; ?>
                                                </ul>
												<?php } ?>
												
												<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                                <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><?php echo wp_kses($item['btn_title'], true); ?><i class="flaticon-right-arrow"></i></a>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
							<?php } ?>
							
							<?php if($settings['slides']) { ?>
                            <div class="download-box">
                                <h3><?php echo wp_kses( $settings['title1'], true ); ?></h3>
                                <ul class="download-list clearfix">
                                    <?php foreach($settings['slides'] as $key => $item) { ?>
									<li>
                                        <div class="icon-box"><img src="<?php echo wp_get_attachment_url($item['icon_image']['id']); ?>" alt="<?php esc_attr_e('Icon', 'whitehall'); ?>"></div>
                                        <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                        <span><?php echo wp_kses( $item['file_size'], true ); ?></span>
										
										<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                        <a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><?php echo wp_kses($item['btn_title'], true); ?></a>
										<?php } ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
							<?php } ?>
                        </div>
                    </div>
					
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="department-sidebar">
                            <?php dynamic_sidebar( $settings['sidebar'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- department-details end -->

        <?php
    }
}
