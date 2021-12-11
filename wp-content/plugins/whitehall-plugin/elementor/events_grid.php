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
class Events_Grid extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_events_grid';
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
        return esc_html__( 'Events Grid', 'whitehall' );
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
            'events_grid',
            [
                'label' => esc_html__( 'Events Grid', 'whitehall' ),
            ]
        );
        $this->add_control(
            'query_number',
            [
                'label'   => esc_html__( 'Number of post', 'whitehall' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
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
        
		<!-- events-grid -->
        <section class="events-grid sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <?php 
						if ( empty( $events ) ) :
						echo 'Sorry, nothing found.';
						else: 
						foreach( $events as $event ) : 

						$event_thumbnail_id = get_post_thumbnail_id($event->ID);
						$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

						$start_datetime = tribe_get_start_date( $event->ID );
						$end_datetime = tribe_get_end_date( $event->ID );

						$start_date = tribe_get_start_date($event->ID, null, false, 'd' );
						$end_date = tribe_get_end_date($event->ID, null, false, 'd M, Y' );

						$start_time = tribe_get_start_time ( $event->ID, 'h:i A' );
						$end_time = tribe_get_end_time ( $event->ID, 'h:i A' );

						$location = get_option('location');
						$term_list = wp_get_post_terms(get_the_id(), 'tribe_events_cat', array("fields" => "names"));
					?>
                    <div class="col-lg-4 col-md-6 col-sm-12 schedule-block">
                        <div class="schedule-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="<?php echo esc_url($event_thumbnail_url); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                    <div class="content-box">
                                        <div class="post-date"><h3><?php echo get_the_date('d'); ?><span><?php echo get_the_date('M'); ?>’<?php echo get_the_date('y'); ?></span></h3></div>
                                        <div class="text">
                                            <span class="category"><i class="flaticon-star"></i><?php echo implode( ', ', (array)$term_list ); ?></span>
                                            <h4><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo wp_kses(get_the_title( $event->ID ), true); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <ul class="post-info clearfix">
                                        <li><i class="flaticon-clock-circular-outline"></i><?php echo wp_kses($start_date, true); ?> - <?php echo wp_kses($end_date, true); ?></li>
                                        <li><i class="flaticon-gps"></i><?php echo tribe_get_venue( $event->ID ); ?></li>
                                    </ul>
                                    <div class="links"><a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php esc_html_e('Read More', 'whitehall'); ?><i class="flaticon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        <!-- events-grid end -->

        <?php
    }
}
   