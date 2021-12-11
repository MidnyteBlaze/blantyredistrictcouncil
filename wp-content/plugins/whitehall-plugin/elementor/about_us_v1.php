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
class About_Us_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_about_us_v1';
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
        return esc_html__( 'About Us V1', 'whitehall' );
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
            'about_us_v1',
            [
                'label' => esc_html__( 'About Us V1', 'whitehall' ),
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
            'bold_text',
            [
                'label'       => __( 'Bold Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'mayor_name',
            [
                'label'       => __( 'Mayor_name', 'whitehall' ),
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
		$this->add_control(
            'signature',
            [
                'label' => __( 'Signature Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		
		//Social Media
		$this->add_control(
            'social_media',
            [
                'label'   => esc_html__( 'Social Media', 'whitehall' ),
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
                            'name' => 'url',
                            'label' => esc_html__('URL', 'whitehall'),
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
                    ],
            ]
        );
		
		//Features
		$this->add_control(
            'slides',
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
                            'name' => 'phone',
                            'label' => esc_html__('Phone Number', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'phone_text',
                            'label' => esc_html__('Phone Text', 'whitehall'),
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
                    ],
            ]
        );
		$this->add_control(
            'image',
            [
                'label' => __( 'Image', 'whitehall' ),
				'separator' => 'before',
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            'image_text',
            [
                'label'       => __( 'Image Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
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
        
        <!-- about-section -->
        <section class="about-section sec-pad bg-color-1">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <?php if($settings['subtitle']) { ?>
									<h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span></h6>
									<?php } ?>
									
                                    <?php if($settings['title']) { ?>
									<h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                    <div class="title-shape"></div>
									<?php } ?>
                                </div>
                                <div class="text">
                                    <h5><?php echo wp_kses( $settings['bold_text'], true ); ?></h5>
                                    <h4><?php echo wp_kses( $settings['mayor_name'], true ); ?></h4>
                                    <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                                </div>
                                <div class="inner-box clearfix">
                                    <figure class="signature pull-left"><img src="<?php echo wp_get_attachment_url($settings['signature']['id']); ?>" alt="<?php esc_html_e('Signature', 'whitehall'); ?>"></figure>
                                    <ul class="social-style-one clearfix">
										<?php foreach($settings['social_media'] as $key => $item) { ?>
                                        <li><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><i class="fab <?php echo esc_attr( $item['icon'] ); ?>"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="lower-box">
                                    <div class="row clearfix">
										<?php foreach($settings['slides'] as $key => $item) { ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                                <div class="icon-box"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
                                                <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                                <p><a href="tel:<?php echo esc_attr( phone_number($item['phone']) ); ?>"><?php echo wp_kses( $item['phone'], true ); ?></a> <?php echo wp_kses( $item['phone_text'], true ); ?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_1">
                            <div class="image-box">
								<?php if($settings['image']['id']) { ?>
                                <figure class="image"><img src="<?php echo wp_get_attachment_url($settings['image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
								<?php } ?>
								<?php if($settings['image_text']) { ?>
                                <div class="text">
                                    <h4><?php echo wp_kses( $settings['image_text'], true ); ?></h4>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->

        <?php
    }
}
