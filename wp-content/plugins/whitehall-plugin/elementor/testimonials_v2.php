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
class Testimonials_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_testimonials_v2';
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
        return esc_html__( 'Testimonials V2', 'whitehall' );
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
            'general_tab',
            [
                'label' => esc_html__( 'General', 'whitehall' ),
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
		
		//Testimonials
		$this->start_controls_section(
            'testimonials_tab',
            [
                'label' => esc_html__( 'Testimonials', 'whitehall' ),
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
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'whitehall' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 36,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'whitehall' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__( 'Order By', 'whitehall' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'whitehall' ),
                    'title'      => esc_html__( 'Title', 'whitehall' ),
                    'menu_order' => esc_html__( 'Menu Order', 'whitehall' ),
                    'rand'       => esc_html__( 'Random', 'whitehall' ),
                ),
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__( 'Order', 'whitehall' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'whitehall' ),
                    'ASC'  => esc_html__( 'ASC', 'whitehall' ),
                ),
            ]
        );
        $this->add_control(
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'whitehall'),
                'options' => get_categories_list('testimonials_cat')
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
            'post_type'      => 'testimonials',
            'posts_per_page' => whitehall_set( $settings, 'query_number' ),
            'orderby'        => whitehall_set( $settings, 'query_orderby' ),
            'order'          => whitehall_set( $settings, 'query_order' ),
            'paged'          => $paged
        );

        if( whitehall_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = whitehall_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
        
        <!-- testimonial-style-two -->
        <section class="testimonial-style-two" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image1']['id']); ?>);">
            <div class="layer-bg" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_3">
                            <div class="content-box">
                                <h4><i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i><?php echo wp_kses( $settings['title'], true ); ?></h4>
                                <h2><?php echo wp_kses( $settings['text'], true ); ?></h2>
								
								<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                                <a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn style-two"><?php echo wp_kses( $settings['btn_title'], true ); ?></a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 testimonial-column">
                        <div class="testimonial-content">
                            <div class="bxslider">
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="slider-content">
                                    <div class="testimonial-block-two">
                                        <div class="inner-box">
                                            <div class="text">
                                                <div class="icon-box"><i class="flaticon-quote"></i></div>
                                                <?php echo wp_kses(the_content(), $settings['text_limit']); ?>
                                            </div>
                                            <div class="author-box">
                                                <figure class="author-thumb"><?php the_post_thumbnail('whitehall_60x60'); ?></figure>
                                                <h4><?php the_title(); ?></h4>
                                                <span class="designation"><?php echo get_post_meta( get_the_id(), 'designation', true ); ?></span>
                                            </div>
                                        </div>
                                    </div>
									<div class="slider-pager">
                                        <ul class="thumb-box clearfix">
                                            <li>
                                                <a class="active" data-slide-index="0" href="#">
                                                    <figure class="thumb thumb-1"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/resource/testimonial-4.png" alt=""></figure>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-slide-index="1" href="#">
                                                    <figure class="thumb thumb-2"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/resource/testimonial-5.png" alt=""></figure>
                                                </a>                                       
                                            </li>
                                            <li>
                                                <a data-slide-index="2" href="#">
                                                    <figure class="thumb thumb-3"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/resource/testimonial-6.png" alt=""></figure>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-two end -->

        <?php }

        wp_reset_postdata();
    }
}
