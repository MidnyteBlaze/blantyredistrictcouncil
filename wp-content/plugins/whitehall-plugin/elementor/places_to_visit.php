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
class Places_To_Visit extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_places_to_visit';
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
        return esc_html__( 'Places To Visit', 'whitehall' );
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
            'places_to_visit',
            [
                'label' => esc_html__( 'Places To Visit', 'whitehall' ),
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
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
            'video_image',
            [
                'label' => __( 'Video Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'video_url',
            [
                'label'       => __( 'Video URL', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->end_controls_section();
		
		//Accordion
		$this->start_controls_section(
            'accordion_tab',
            [
                'label' => esc_html__( 'Accordion', 'whitehall' ),
            ]
        );
		$this->add_control(
            'slides',
            [
                'label'   => esc_html__( 'Accordion', 'whitehall' ),
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
                            'name' => 'subtitle',
                            'label' => esc_html__('Sub Title', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
						[
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
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
        
        <!-- place-section -->
        <section class="place-section sec-pad pb-140">
            <div class="vector-image" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
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
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 video-column">
                            <div class="video_block_1">
                                <div class="video-inner" style="background-image: url(<?php echo wp_get_attachment_url($settings['video_image']['id']); ?>);">
                                    <div class="video-btn">
										
										<?php if($settings['video_url']) { ?>
                                        <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="lightbox-image" data-caption="">
                                            <i class="flaticon-play-arrow"></i>
                                            <span class="border-animation border-1"></span>
                                            <span class="border-animation border-2"></span>
                                            <span class="border-animation border-3"></span>
                                        </a>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <ul class="accordion-box">
                                    <?php $i=1; foreach($settings['slides'] as $key => $item) { ?>
                                    <li class="accordion block <?php if($i == 1) echo 'active-block'; ?>">
                                        <div class="acc-btn <?php if($i == 1) echo 'active'; ?>">
                                            <div class="icon-outer"></div>
                                            <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                                        </div>
                                        <div class="acc-content <?php if($i == 1) echo 'current'; ?>">
                                            <div class="text">
                                                <h5><?php echo wp_kses( $item['subtitle'], true ); ?></h5>
												
												<?php if($item['text']) { ?>
                                                <ul class="list clearfix">
                                                    <?php echo wp_kses( $item['text'], true ); ?>
                                                </ul>
												<?php } ?>
                                            </div>
                                        </div>
                                    </li>
									<?php $i++; } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- place-section end -->

        <?php
    }
}
