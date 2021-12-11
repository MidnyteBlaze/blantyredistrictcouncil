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
class Contact_Info extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_contact_info';
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
        return esc_html__( 'Contact Info', 'whitehall' );
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
            'contact_info',
            [
                'label' => esc_html__( 'Contact Info', 'whitehall' ),
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
            'contact_list',
            [
                'label'   => esc_html__( 'Contact List', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
                        [
                            'name' => 'heading',
                            'label' => esc_html__('Heading', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
							'name' => 'icons',
							'label' => esc_html__('Enter The icons', 'whitehall'),
							'type' => Controls_Manager::SELECT2,
							'options'  => get_fontawesome_icons()
						],
                        [
                            'name' => 'content',
                            'label' => esc_html__('Content', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
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
                            'name' => 'icon',
                            'label' => esc_html__('Select Icon', 'whitehall'),
                            'type' => Controls_Manager::SELECT2,
							'label_block' => true,
                            'options' => get_fontawesome_icons(),
                        ],
						[
                            'name' => 'social_link',
							'label' => __( 'Social Link', 'whitehall' ),
							'type' => Controls_Manager::URL,
							'placeholder' => __( 'https://your-link.com/', 'whitehall' ),
							'show_external' => true,
							'default' => [
								'url' => '',
								'is_external' => true,
								'nofollow' => true,
							],
						]
                    ],
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
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
        
        <!-- contact-information -->
        <section class="contact-information">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-6 col-sm-12 content-column">
                        <div class="content_block_12">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span></h6>
                                    <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                    <div class="title-shape"></div>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                                    <?php foreach($settings['contact_list'] as $key => $item) { ?>
                                    <div class="contact_box_n two">
                                        <p>
                                            <span><i class="fa <?php echo esc_attr( $item['icons'], true ); ?>"></i><?php echo wp_kses( $item['heading'], true ); ?> </span>
                                            <?php echo wp_kses( $item['content'], true ); ?>
                                        </p>
                                    </div>
                                    <?php } ?>
                                </div>
								
								<?php if($settings['social_media']){ ?>
								<div class="social-box">
                                    <ul class="social-style-one clearfix">
										<?php foreach($settings['social_media'] as $key => $item) { ?>
										<li><a href="<?php echo esc_url( $item['social_link']['url'] ); ?>" title="<?php echo esc_attr($item['title']); ?>" target="_blank"><i class="fab <?php echo esc_attr($item['icon']); ?>"></i></a></li>
										<?php } ?>
                                    </ul>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-7 col-md-12 col-sm-12 contact-column">
                        <div class="contact_form_box">
                            
                            <?php if($settings['cf7_shortocde']){ ?>
                            <div id="contact-form" class="default-form">
                                <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_shortocde']).'"]'); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- contact-information end -->

        <?php
    }
}
