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
class Our_Schedules extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_our_schedules';
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
        return esc_html__( 'Our Schedules', 'whitehall' );
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
            'our_schedules',
            [
                'label' => esc_html__( 'Our Schedules', 'whitehall' ),
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
            's_image',
            [
                'label' => __( 'Feature Image', 'whitehall' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
            ]
        );
        $this->add_control(
            's_subtitle',
            [
                'label'       => __( 'Newsletter Sub Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            's_title',
            [
                'label'       => __( 'Newsletter Title', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
		$this->add_control(
			'newsletter_form',
			[
				'label'       => __( 'MailChimp Generated Code here', 'whitehall' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your MailChimp Generated Code here', 'whitehall' ),
			]
		);
        $this->add_control(
            's_text',
            [
                'label'       => __( 'Newsletter Text', 'whitehall' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
              'event_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['block_title' => esc_html__('Upcoming Events', 'whitehall')],
                			['block_title' => esc_html__('Upcoming Metings', 'whitehall')],
                			['block_title' => esc_html__('Community Calendar', 'whitehall')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Button Title', 'whitehall'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Button Title', 'whitehall')
                			],
							[
								'name' => 'query_number',
								'label'   => esc_html__( 'Number of post', 'whitehall' ),
								'type'    => Controls_Manager::NUMBER,
								'default' => 10,
								'min'     => 1,
								'max'     => 100,
								'step'    => 1,
							],
							[
								'name' => 'query_orderby',
								'label'   => esc_html__( 'Order By', 'whitehall' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'date',
								'options' => array(
									'date'       => esc_html__( 'Date', 'whitehall' ),
									'title'      => esc_html__( 'Title', 'whitehall' ),
									'menu_order' => esc_html__( 'Menu Order', 'whitehall' ),
									'rand'       => esc_html__( 'Random', 'whitehall' ),
								),
							],
							[
								'name' => 'query_order',
								'label'   => esc_html__( 'Order', 'whitehall' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'DESC',
								'options' => array(
									'DESC' => esc_html__( 'DESC', 'whitehall' ),
									'ASC'  => esc_html__( 'ASC', 'whitehall' ),
								),
							],
							[
							  'name' => 'query_category',
							  'type' => Controls_Manager::SELECT,
							  'label' => esc_html__('Category', 'whitehall'),
							  'options' => get_categories_list('tribe_events_cat')
							],
						],
					'title_field' => '{{block_title}}',
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
			//'posts_per_page' => $settings['query_number'],
			'tax_query'=> array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					//'terms' => $settings['query_category']
				)
			)
		)); ?>
        
		<!-- schedules-section -->
        <section class="schedules-section sec-pad bg-color-1">
            <div class="bg-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bg_image']['id']); ?>);"></div>
            <div class="auto-container">
                <div class="title-inner">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 title-column">
                            <div class="sec-title light">
								<?php if($settings['subtitle']) { ?>
                                <h6><i class="flaticon-star"></i><span><?php echo wp_kses( $settings['subtitle'], true ); ?></span></h6>
								<?php } ?>
								
								<?php if($settings['title']) { ?>
                                <h2><?php echo wp_kses( $settings['title'], true ); ?></h2>
                                <div class="title-shape"></div>
								<?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                            <div class="text">
                                <p><?php echo wp_kses( $settings['text'], true ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="schedule-tab">
                    <div class="tab-btn-box">
                        <ul class="tab-btns schedule-tab-btns clearfix">
							<?php $i=1; foreach($settings['event_tab'] as $key => $item):?>
							<li class="p-tab-btn <?php if($i == 1) echo 'active-btn'; ?>" data-tab="#tab-<?php echo esc_attr($i); ?>"><?php echo wp_kses($item['block_title'], true); ?></li>
							<?php $i++; endforeach; ?>
                        </ul>
                    </div>
                    <div class="inner-content">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12 col-sm-12 form-column">
                                <div class="subscribe-inner centred">
                                    <div class="upper-box" style="background-image: url(<?php echo wp_get_attachment_url($settings['s_image']['id']); ?>);">
                                        <div class="icon-box"><i class="flaticon-letter"></i></div>
                                        <h3><?php echo wp_kses( $settings['s_subtitle'], true ); ?></h3>
                                        <p><?php echo wp_kses( $settings['s_title'], true ); ?></p>
                                    </div>
                                    <div class="lower-box">
                                        <div class="subscribe-form">
											<?php echo do_shortcode( $settings['newsletter_form'] );?>
                                        </div>
                                        <div class="text">
                                            <h6><?php echo wp_kses( $settings['s_text'], true ); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                                <div class="p-tabs-content">
                                    <?php $j=1; foreach($settings['event_tab'] as $keys => $item):
										
										$paged = whitehall_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
										$this->add_render_attribute( 'wrapper', 'class', 'templatepath-whitehall' );
										$args = array(
											'post_type'      => 'tribe_events',
											'posts_per_page' => whitehall_set( $item, 'query_number' ),
											'orderby'        => whitehall_set( $item, 'query_orderby' ),
											'order'          => whitehall_set( $item, 'query_order' ),
											'paged'          => $paged
										);
										if ( whitehall_set( $item, 'query_exclude' ) ) {
											$item['query_exclude'] = explode( ',', $item['query_exclude'] );
											$args['post__not_in'] = whitehall_set( $item, 'query_exclude' );
										}
										if( whitehall_set( $item, 'query_category' ) ) $args['tribe_events_cat'] = whitehall_set( $item, 'query_category' );
										$query = new \WP_Query( $args );
									if ( $query->have_posts()):	
									?>
                                    <div class="p-tab <?php if($j == 1) echo 'active-tab'; ?>" id="tab-<?php echo esc_attr($j); ?>">
                                        <div class="two-column-carousel owl-carousel owl-theme owl-dots-none">
                                            <?php global $post; $count = 0; $i = 1;
											while ( $query->have_posts() ) : $query->the_post();
											$term_list = wp_get_post_terms(get_the_id(), 'tribe_events_cat', array("fields" => "names"));
											$event_thumbnail_id = get_post_thumbnail_id($post->ID);
											$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id); 
											$start_date = tribe_get_start_date( $post->ID, true, 'd' );
											$start_month = tribe_get_start_date( $post->ID, true, 'M' );
											$start_year = tribe_get_start_date( $post->ID, true, 'y' );
											$start_time = tribe_get_start_time ( $post->ID, 'h:i A' );
											$end_time = tribe_get_end_time ( $post->ID, 'h:i A' );
											?>
                                            <div class="schedule-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="<?php echo esc_url($event_thumbnail_url); ?>" alt="<?php esc_attr_e('Awesome Image', 'whitehall'); ?>"></figure>
                                                        <div class="content-box">
                                                            <div class="post-date"><h3><?php echo wp_kses( $start_date, true ); ?><span><?php echo wp_kses( $start_month, true ); ?>’<?php echo wp_kses( $start_year, true ); ?></span></h3></div>
                                                            <div class="text">
                                                                <span class="category"><i class="flaticon-star"></i><?php echo implode( ', ', (array)$term_list ); ?></span>
                                                                <h4><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo wp_kses(get_the_title( $post->ID ), true);?></a></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <ul class="post-info clearfix">
                                                            <li><i class="flaticon-clock-circular-outline"></i><?php echo wp_kses( $start_time, true );?> - <?php echo wp_kses( $end_time, true );?></li>
                                                            <li><i class="flaticon-gps"></i><?php echo tribe_get_venue( $post->ID ); ?></li>
                                                        </ul>
                                                        <div class="links"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Read More', 'whitehall'); ?><i class="flaticon-right-arrow"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
											<?php $count++; $i++; endwhile;?>
                                        </div>
                                    </div>
                                    <?php $j++; endif; endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- schedules-section end -->

        <?php
    }
}
   