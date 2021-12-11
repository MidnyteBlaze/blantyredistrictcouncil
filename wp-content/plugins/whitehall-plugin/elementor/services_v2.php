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
class Services_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_services_v2';
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
        return esc_html__( 'Services V2', 'whitehall' );
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
            'register_services_tab',
            [
                'label' => esc_html__( 'Register Services', 'whitehall' ),
            ]
        );
		$this->add_control(
            'bg_image',
            [
                'label' => __( 'Backgruond Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
		$this->add_control(
            'register_services',
            [
                'label'   => esc_html__( 'Register Services', 'whitehall' ),
                'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
                'default' =>
                    [

                    ],
                'fields' =>
                    [
						[
                            'name' => 'icon',
                            'label' => esc_html__('Select Icon', 'whitehall'),
                            'type' => Controls_Manager::SELECT2,
							'label_block' => true,
                            'options' => get_fontawesome_icons(),
                        ],
                        [
                            'name' => 'title',
                            'label' => esc_html__('Title', 'whitehall'),
                            'type' => Controls_Manager::TEXTAREA,
                        ],
                        [
                            'name' => 'text',
                            'label' => esc_html__('Text', 'whitehall'),
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
		
		//Online Services
		$this->start_controls_section(
            'online_services_tab',
            [
                'label' => esc_html__( 'Online Services', 'whitehall' ),
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
            'online_services',
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
                            'name' => 'link',
                            'label' => esc_html__('Link', 'whitehall'),
                            'type' => Controls_Manager::TEXT,
							'label_block' => true,
                        ],
                    ],
            ]
        );
		$this->add_control(
            'bottom_text',
            [
                'label'       => __( 'Bottom Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
				'separator' => 'before',
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
        $allowed_tags = wp_kses_allowed_html('post');

        $paged = whitehall_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

        $this->add_render_attribute( 'wrapper', 'class', 'templatepath-whitehall' );
        $args = array(
            'post_type'      => 'service',
            'posts_per_page' => whitehall_set( $settings, 'query_number' ),
            'orderby'        => whitehall_set( $settings, 'query_orderby' ),
            'order'          => whitehall_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( whitehall_set( $settings, 'query_category' ) ) $args['service_cat'] = whitehall_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>

		<!-- online-services -->
        <section class="online-services" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image1']['id']); ?>);">
            <div class="layer-bg" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                            <?php foreach($settings['register_services'] as $key => $item) { ?>
                            <div class="content_block_3">
                                <div class="content-box">
                                    <h4><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i><?php echo wp_kses( $item['title'], true ); ?></h4>
                                    <h2><?php echo wp_kses( $item['text'], true ); ?></h2>
									
									<?php if($item['btn_link']['url'] and $item['btn_title']) { ?>
                                    <div class="btn-box"><a href="<?php echo esc_url( $item['btn_link']['url'] ); ?>" class="theme-btn style-two"><?php echo wp_kses( $item['btn_title'], true ); ?></a></div>
									<?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                        <div class="inner-content">
                            <div class="row clearfix">
                                <?php foreach($settings['online_services'] as $key => $item) { ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 single-column">
                                    <div class="online-block-one">
                                        <div class="inner-box">
                                            <div class="icon-box"><i class="fas fa-check"></i></div>
                                            <h5><a href="<?php echo esc_url( $item['link'] ); ?>"><?php echo wp_kses( $item['title'], true ); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                            <div class="more-text"><p><?php echo wp_kses( $settings['bottom_text'], true ); ?></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- online-services end -->

        <?php }

        wp_reset_postdata();
    }
}
