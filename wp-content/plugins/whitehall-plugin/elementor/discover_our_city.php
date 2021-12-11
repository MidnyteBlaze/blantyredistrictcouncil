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
class Discover_Our_City extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_discover_our_city';
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
        return esc_html__( 'Discover Our City', 'whitehall' );
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
            'discover_our_city',
            [
                'label' => esc_html__( 'Discover Our City', 'whitehall' ),
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
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
                            'name' => 'icon',
                            'label' => esc_html__('Select Icon', 'whitehall'),
                            'type' => Controls_Manager::SELECT2,
							'label_block' => true,
                            'options' => get_fontawesome_icons(),
                        ],
						[
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
						[
							'name' => 'link',
							'label' => __( 'Link', 'whitehall' ),
							'type' => Controls_Manager::URL,
							'placeholder' => __( 'https://your-link.com', 'whitehall' ),
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
        
        <!-- discover-section -->
        <section class="discover-section sec-pad" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);">
            <div class="auto-container">
                <div class="sec-title centred light">
					<?php if($settings['subtitle']) { ?>
					<h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span><i class="flaticon-star"></i></h6>
					<?php } ?>

					<?php if($settings['title']) { ?>
					<h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
					<div class="title-shape"></div>
					<?php } ?>
                </div>
                <div class="row clearfix">
                    <?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 discover-block">
                        <div class="discover-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="content-box">
                                    <div class="icon-box"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
                                    <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                    <a href="<?php echo esc_url( $item['link']['url'] ); ?>"><i class="flaticon-right-arrow"></i></a>
                                    <span class="count"><?php echo wp_kses(sprintf('%02d', $i), true); ?></span>
                                </div>
                                <div class="overlay-content">
                                    <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                    <p><?php echo wp_kses( $item['text'], true ); ?></p>
                                    <a href="<?php echo esc_url( $item['link']['url'] ); ?>"><i class="flaticon-right-arrow"></i></a>
                                    <span class="count"><?php echo wp_kses(sprintf('%02d', $i), true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php $i++; } ?>
                </div>
            </div>
        </section>
        <!-- discover-section end -->

        <?php
    }
}
