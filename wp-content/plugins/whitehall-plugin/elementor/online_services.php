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
class Online_Services extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_online_services';
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
        return esc_html__( 'Online Services', 'whitehall' );
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
            'online_services',
            [
                'label' => esc_html__( 'Online Services', 'whitehall' ),
            ]
        );
		$this->add_control(
            'style',
            [
                'label'   => esc_html__( 'Style', 'whitehall' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1' => esc_html__( 'Style 1', 'whitehall' ),
                    'style2' => esc_html__( 'Style 2', 'whitehall' ),
                ),
            ]
        );
		$this->add_control(
            'left_bg_image',
            [
                'label' => __( 'Left Background Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [
                    'style' => 'style1'
                ]
            ]
        );
		$this->add_control(
            'right_bg_image',
            [
                'label' => __( 'Right Background Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition' => [
                    'style' => 'style1'
                ]
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
            'slides',
            [
                'label'   => esc_html__( 'Online Services', 'whitehall' ),
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
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                    ],
            ]
        );
        $this->end_controls_section();
		
		//Your Ideas
		$this->start_controls_section(
            'your_ideas',
            [
                'label' => esc_html__( 'Your Ideas', 'whitehall' ),
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
            'btn_title',
            [
                'label'       => __( 'Button Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
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
        
		<?php if($settings['style'] == 'style1') { ?>
        <!-- solutions-section -->
        <section class="solutions-section">
            <figure class="image-layer"><img src="<?php echo wp_get_attachment_url($settings['left_bg_image']['id']); ?>" alt="<?php esc_html_e('Awesome Image', 'whitehall'); ?>"></figure>
            <div class="pattern-box">
                <div class="pattern-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-2.png'); ?>);"></div>
                <div class="pattern-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-3.png'); ?>);"></div>
                <div class="pattern-3" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-3.png'); ?>);"></div>
                <div class="pattern-4 float-bob-y" style="background-image: url(<?php echo wp_get_attachment_url($settings['right_bg_image']['id']); ?>);"></div>
            </div>
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
                <div class="inner-container">
                    <div class="upper-box clearfix">
                        <?php foreach($settings['slides'] as $key => $item) { ?>
                        <div class="solution-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
                                <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="bg-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
                        <div class="text pull-left">
							<?php if($settings['icon']) { ?>
                            <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i></div>
							<?php } ?>
                            <h3><?php echo wp_kses( $settings['title1'], true ); ?></h3>
                            <p><?php echo wp_kses( $settings['text1'], true ); ?></p>
                        </div>
						
						<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                        <div class="btn-box pull-right">
                            <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn"><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- solutions-section end -->

		<?php } else { ?>

		<!-- solutions-section -->
        <section class="solutions-section alternat-2">
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
                <div class="inner-container mr-0">
                    <div class="upper-box clearfix">
						<?php foreach($settings['slides'] as $key => $item) { ?>
                        <div class="solution-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
                                <h4><?php echo wp_kses( $item['title'], true ); ?></h4>
                                <p><?php echo wp_kses( $item['text'], true ); ?></p>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                    <div class="lower-box clearfix">
                        <div class="bg-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
                        <div class="text pull-left">
                            <?php if($settings['icon']) { ?>
                            <div class="icon-box"><i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i></div>
							<?php } ?>
                            <h3><?php echo wp_kses( $settings['title1'], true ); ?></h3>
                            <p><?php echo wp_kses( $settings['text1'], true ); ?></p>
                        </div>
						
						<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                        <div class="btn-box pull-right">
                            <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn"><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- solutions-section end -->
		<?php } ?>

        <?php
    }
}
