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
class Suggestions_And_Complaints extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_suggestions_and_complaints';
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
        return esc_html__( 'Suggestions and Complaints', 'whitehall' );
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
            'suggestions_and_complaints',
            [
                'label' => esc_html__( 'Suggestions and Complaints', 'whitehall' ),
            ]
        );
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Background Image', 'whitehall' ),
				'separator' => 'before',
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        $this->end_controls_section();
		
		//Email
		$this->start_controls_section(
            'email_tab',
            [
                'label' => esc_html__( 'Email Address', 'whitehall' ),
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
            'icon1',
            [
				'label' => esc_html__('Select Icon', 'whitehall'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
		$this->add_control(
            'text1',
            [
                'label'       => __( 'Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'email_address1',
            [
                'label'       => __( 'Email Address', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
		
		//Phone
		$this->start_controls_section(
            'phone_tab',
            [
                'label' => esc_html__( 'Phone Number', 'whitehall' ),
            ]
        );
		$this->add_control(
            'title2',
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
            'icon2',
            [
				'label' => esc_html__('Select Icon', 'whitehall'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
		$this->add_control(
            'text2',
            [
                'label'       => __( 'Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'phone_number2',
            [
                'label'       => __( 'Phone Number', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
		
		//Emergency
		$this->start_controls_section(
            'emergency_tab',
            [
                'label' => esc_html__( 'Emergency', 'whitehall' ),
            ]
        );
		$this->add_control(
            'title3',
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
            'icon3',
            [
				'label' => esc_html__('Select Icon', 'whitehall'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
		$this->add_control(
            'text3',
            [
                'label'       => __( 'Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'phone_number3',
            [
                'label'       => __( 'Phone Number', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
		
		//Social Media
		$this->start_controls_section(
            'social_media_tab',
            [
                'label' => esc_html__( 'Social Media', 'whitehall' ),
            ]
        );
		$this->add_control(
            'title4',
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
            'icon4',
            [
				'label' => esc_html__('Select Icon', 'whitehall'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => get_fontawesome_icons(),
			]
        );
		$this->add_control(
            'text4',
            [
                'label'       => __( 'Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
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
        $this->end_controls_section();
		
		//Contact Us
		$this->start_controls_section(
            'contact_us_tab',
            [
                'label' => esc_html__( 'Contact Us', 'whitehall' ),
            ]
        );
		$this->add_control(
            'bg_image1',
            [
                'label' => __( 'Backgruond Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'cf7_shortocde',
            [
                'label' => esc_html__('Select Contact Form 7', 'whitehall'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => get_contact_form_7_list(),
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
        
        <!-- contact-section -->
        <section class="contact-section">
            <figure class="image-layer"><img src="<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
            <div class="dotted-pattern" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-14.png'); ?>);"></div>
            <div class="auto-container">
                <div class="sec-title centred">
					<?php if($settings['subtitle']) { ?>
					<h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span><i class="flaticon-star"></i></h6>
					<?php } ?>

					<?php if($settings['title']) { ?>
					<h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
					<div class="title-shape"></div>
					<?php } ?>
                </div>
                <div class="info-block">
                    <div class="row clearfix">
                        <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="content-box">
                                                <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon1'] ); ?>"></i></div>
                                                <h4><?php echo wp_kses( $settings['title1'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text1'], true ); ?></p>
                                            </div>
                                            <div class="overlay-content">
                                                <h4><?php echo wp_kses( $settings['title1'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text1'], true ); ?></p>
                                                <a href="mailto:<?php echo sanitize_email( $settings['email_address1'] ); ?>"><?php echo sanitize_email( $settings['email_address1'] ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="content-box">
                                                <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon2'] ); ?>"></i></div>
                                                <h4><?php echo wp_kses( $settings['title2'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text2'], true ); ?></p>
                                            </div>
                                            <div class="overlay-content">
                                                <h4><?php echo wp_kses( $settings['title2'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text2'], true ); ?></p>
                                                <a href="tel:<?php echo esc_attr( phone_number($settings['phone_number2'] )); ?>"><?php echo wp_kses( $settings['phone_number2'], true ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="content-box">
                                                <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon3'] ); ?>"></i></div>
                                                <h4><?php echo wp_kses( $settings['title3'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text3'], true ); ?></p>
                                            </div>
                                            <div class="overlay-content">
                                                <h4><?php echo wp_kses( $settings['title3'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text3'], true ); ?></p>
                                                <a href="tel:<?php echo esc_attr( phone_number($settings['phone_number3'] )); ?>"><?php echo wp_kses( $settings['phone_number3'], true ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 info-column">
                                    <div class="info-block-one">
                                        <div class="inner-box">
                                            <div class="content-box">
                                                <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon4'] ); ?>"></i></div>
                                                <h4><?php echo wp_kses( $settings['title4'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text4'], true ); ?></p>
                                            </div>
                                            <div class="overlay-content">
                                                <h4><?php echo wp_kses( $settings['title4'], true ); ?></h4>
                                                <p><?php echo wp_kses( $settings['text4'], true ); ?></p>
												
												<?php if($settings['social_media']) { ?>
                                                <ul class="social-links clearfix">
													<?php foreach($settings['social_media'] as $key => $item) { ?>
													<li><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><i class="fab <?php echo esc_attr( $item['icon'] ); ?>"></i></a></li>
													<?php } ?>
                                                </ul>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<?php if($settings['cf7_shortocde']){ ?>
                <div class="form-block">
                    <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image1']['id']); ?>);"></div>
                    <div class="contact-form">
						<?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                    </div>
                </div>
				<?php } ?>
            </div>
        </section>
        <!-- contact-section end -->

        <?php
    }
}
