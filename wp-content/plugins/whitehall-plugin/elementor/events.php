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
class Events extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_events';
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
        return esc_html__( 'Events', 'whitehall' );
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
		
		//Events
		$this->start_controls_section(
            'events_tab',
            [
                'label' => esc_html__( 'Events', 'whitehall' ),
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
            'query_category',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Category', 'whitehall'),
                'options' => get_categories_list('tribe_events_cat')
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

        $count = 1;
		$events = tribe_get_events(array(
			'posts_per_page' => $settings['query_number'],
			'tax_query'=> array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => $settings['query_category']
				)
			)
		)); ?>
        
		<!-- schedules-style-two -->
        <section class="schedules-style-two" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image1']['id']); ?>);">
            <div class="layer-bg" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_3">
                            <div class="content-box">
                                <h4><i class="flaticon-romantic-date"></i><?php echo wp_kses( $settings['title'], true ); ?></h4>
                                <h2><?php echo wp_kses( $settings['text'], true ); ?></h2>
								
								<?php if($settings['btn_link']['url'] and $settings['btn_title']) { ?>
                                <div class="btn-box"><a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="theme-btn style-two"><?php echo wp_kses( $settings['btn_title'], true ); ?></a></div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="inner-content">
                            <div class="schedule-carousel">
                                <?php global $post;
									if ( empty( $events ) ) :
									echo 'Sorry, nothing found.';
									else: 
									foreach( $events as $event ) : 

									$event_thumbnail_id = get_post_thumbnail_id($event->ID);
									$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

									$start_datetime = tribe_get_start_date( $event->ID );
									$end_datetime = tribe_get_end_date( $event->ID );

									$start_date = tribe_get_start_date( $event->ID, true, 'd' );
									$start_month = tribe_get_start_date( $event->ID, true, 'M' );
									$start_year = tribe_get_start_date( $event->ID, true, 'y' );

									$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
									$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );

									$location = get_option('location');
									$term_list = wp_get_post_terms($post->ID, 'tribe_events_cat', array("fields" => "names"));
								?>
                                <div class="schedule-block-two">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="<?php echo esc_url($event_thumbnail_url); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                            <div class="text">
                                                <div class="category"><p><i class="flaticon-star"></i>Grid View</p></div>
                                                <h3><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true); ?></a></h3>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="date"><h3><?php echo wp_kses( $start_date, true ); ?><span><?php echo wp_kses( $start_month, true ); ?>’<?php echo wp_kses( $start_year, true ); ?></span></h3></div>
                                            <ul class="post-info clearfix">
                                                <li><i class="flaticon-clock-circular-outline"></i><?php echo wp_kses($start_time, true); ?> - <?php echo wp_kses($end_time, true); ?></li>
                                                <li><i class="flaticon-gps"></i><?php echo tribe_get_venue( $event->ID ); ?></li>
                                            </ul>
                                            <div class="icon-box"><i class="flaticon-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- schedules-style-two -->
                
        <?php
    }
}
   