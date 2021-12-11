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
class Our_Offices extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_our_offices';
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
        return esc_html__( 'Our Offices', 'whitehall' );
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
            'emergency_tab',
            [
                'label' => esc_html__( 'Emergency Contact', 'whitehall' ),
            ]
        );
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'icon',
            [
				'label' => esc_html__('Select Icon', 'whitehall'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
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
		$this->add_control(
            'btn_title',
            [
                'label'       => __( 'Button Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'separator' => 'before',
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => __( 'Button URL', 'whitehall' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'whitehall' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
		$this->end_controls_section();
		
		//Offices
		$this->start_controls_section(
            'our_offices',
            [
                'label' => esc_html__( 'Our Offices', 'whitehall' ),
            ]
        );
		$this->add_control(
            'bg_image1',
            [
                'label' => __( 'Background Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Offices', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'title',
                            'label' => esc_html__('Office Name', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'phone',
                            'label' => esc_html__('Phone Number', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'email',
                            'label' => esc_html__('Email Address', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'address',
                            'label' => esc_html__('Address', 'whitehall'),
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
        $allowed_tags = wp_kses_allowed_html('post'); ?>
        
        <!-- contact-information-two -->
        <section class="contact-information-two" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image1']['id']); ?>);">
            <div class="layer-bg" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_3">
                            <div class="content-box">
                                <h4><i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i><?php echo wp_kses( $settings['title'], true ); ?></h4>
                                <h2><?php echo wp_kses( $settings['text'], true ); ?></h2>
								
								<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                                <div class="btn-box"><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn style-two"><?php echo wp_kses($settings['btn_title'], true); ?></a></div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content">
                            <div class="two-column-carousel owl-carousel owl-theme owl-nav-none">
                                <?php foreach($settings['slides'] as $key => $item) { ?>
                                <div class="single-item">
                                    <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                    <ul class="info clearfix">
                                        <li>
                                            <p><a href="tel:<?php echo esc_attr(phone_number($item['phone'])); ?>"><?php echo wp_kses( $item['phone'], true ); ?></a><br /><a href="mailto:<?php echo sanitize_email( $item['email'] ); ?>"><?php echo sanitize_email( $item['email'] ); ?></a></p>
                                        </li>
                                        <li>
                                            <p><?php echo wp_kses( $item['address'], true ); ?></p>
                                        </li>
                                    </ul>
									
									<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                    <div class="link"><a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>"><?php echo wp_kses($item['btn_title'], true); ?><i class="flaticon-right-arrow"></i></a></div>
									<?php } ?>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-information-two end -->

        <?php
    }
}
