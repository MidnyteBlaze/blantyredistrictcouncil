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
class History extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_history';
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
        return esc_html__( 'History', 'whitehall' );
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
            'history',
            [
                'label' => esc_html__( 'History', 'whitehall' ),
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
            'slides',
            [
                'label'   => esc_html__( 'History', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
                            'name' => 'year',
                            'label' => esc_html__('Year', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                        [
                            'name' => 'subtitle',
                            'label' => esc_html__('Sub Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
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
        
        <!-- history-section -->
        <section class="history-section">
            <figure class="image-layer"><img src="<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
							<?php if($settings['subtitle']) { ?>
							<h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span></h6>
							<?php } ?>

							<?php if($settings['title']) { ?>
							<h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
							<div class="title-shape"></div>
							<?php } ?>
							
                            <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                            <div class="single-item <?php if($i % 2) echo 'style-one'; else echo 'style-two text-right'; ?>">
                                <figure class="image-box"><img src="<?php echo wp_get_attachment_url($item['image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
                                <div class="text">
                                    <span><?php echo wp_kses( $item['year'], true ); ?></span>
                                    <h6><?php echo wp_kses( $item['subtitle'], true ); ?></h6>
                                    <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                    <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                </div>
                            </div>
							<?php $i++; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- history-section -->

        <?php
    }
}
