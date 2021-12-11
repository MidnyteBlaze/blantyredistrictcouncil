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
class About_Department extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_about_department';
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
        return esc_html__( 'About Department', 'whitehall' );
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
            'about_department',
            [
                'label' => esc_html__( 'About Department', 'whitehall' ),
            ]
        );
		$this->add_control(
            'subtitle',
            [
                'label'       => __( 'Sub Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
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
		$this->add_control(
            'phone_title',
            [
                'label'       => __( 'Phone Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'phone',
            [
                'label'       => __( 'Phone Number', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'phone_text',
            [
                'label'       => __( 'Phone Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
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
        
        <!-- about-department -->
        <section class="about-department sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="content_block_11">
                            <div class="content-box">
                                <div class="sec-title light">
									<?php if($settings['subtitle']) { ?>
									<h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span></h6>
									<?php } ?>

									<?php if($settings['title']) { ?>
									<h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
									<div class="title-shape"></div>
									<?php } ?>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                                </div>
                                <div class="inner-box clearfix">
									<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                                    <div class="btn-box pull-left"><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><?php echo wp_kses($settings['btn_title'], true); ?></a></div>
                                    <?php } ?>
									
									<?php if($settings['phone_title'] and $settings['phone'] and $settings['phone_text']) { ?>
									<div class="support-box pull-left">
                                        <i class="flaticon-emergency-call"></i>
                                        <h5><?php echo wp_kses( $settings['phone_title'], true ); ?></h5>
                                        <p><a href="tel:<?php echo esc_attr( phone_number($settings['phone']) ); ?>"><?php echo wp_kses( $settings['phone'], true ); ?></a> <?php echo wp_kses( $settings['phone_text'], true ); ?></p>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                        <figure class="image-box"><img src="<?php echo wp_get_attachment_url($settings['image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-department end -->

        <?php
    }
}
