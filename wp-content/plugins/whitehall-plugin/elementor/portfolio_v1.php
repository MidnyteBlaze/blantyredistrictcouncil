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
class Portfolio_V1 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'whitehall_portfolio_v1';
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
        return esc_html__('Portfolio V1', 'whitehall');
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
            'portfolio_v1',
            [
                'label' => esc_html__('Portfolio V1', 'whitehall'),
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
            'number',
            [
                'label'   => esc_html__('Number of post', 'whitehall'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 9,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_order',
            [
                'label'   => esc_html__('Order', 'whitehall'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__('DESC', 'whitehall'),
                    'ASC'  => esc_html__('ASC', 'whitehall'),
                ),
            ]
        );
        $this->add_control(
            'query_orderby',
            [
                'label'   => esc_html__('Order By', 'whitehall'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__('Date', 'whitehall'),
                    'title'      => esc_html__('Title', 'whitehall'),
                    'menu_order' => esc_html__('Menu Order', 'whitehall'),
                    'rand'       => esc_html__('Random', 'whitehall'),
                ),
            ]
        );
		$this->add_control(
            'cat_include',
            [
                'label'       => esc_html__( 'Category Include IDs', 'whitehall' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Include categories, etc. by ID with comma separated.', 'whitehall' ),
            ]
        );
		$this->add_control(
            'cat_operator',
            [
                'label' => esc_html__('Category Operator', 'whitehall'),
                'type' => Controls_Manager::SELECT,
                'default' => 'IN',
                'options' => array(
					'IN' => esc_html__('IN', 'whitehall'),
					'NOT IN' => esc_html__('NOT IN', 'whitehall'),
				),
                'condition' => [
                    'cat_include!' => ''
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
        $allowed_html = wp_kses_allowed_html('post');

        $paged = get_query_var('paged');
        $paged = whitehall_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

        $this->add_render_attribute('wrapper', 'class', 'templatepath-whitehall');
        $args = array(
            'post_type'      => 'portfolio',
            'posts_per_page' => whitehall_set($settings, 'number'),
            'orderby'        => whitehall_set($settings, 'query_orderby'),
            'order'          => whitehall_set($settings, 'query_order'),
            'paged'          => $paged
        );
		
		//Terms
		$cat_operator = whitehall_set( $settings, 'cat_operator' );
        $terms_array = explode(",", whitehall_set( $settings, 'cat_include' ));
        if(whitehall_set( $settings, 'cat_include' ))
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_cat',
					'field' => 'id',
					'terms' => $terms_array,
					'operator' => $cat_operator
				)
			);
		
        $allowed_html = wp_kses_allowed_html('post');
        $query = new \WP_Query($args);
        $t = '';
        $data_filtration = '';
        $data_posts = '';
        if($query->have_posts())
        {
            ob_start(); ?>

            <?php $count = 0;
            $fliteration = array();
            while($query->have_posts() ): $query->the_post();
                global $post;
                $meta = '';
                $meta1 = '';
                $post_terms = get_the_terms( get_the_id(), 'portfolio_cat');
                foreach( (array)$post_terms as $pos_term )
					$fliteration[$pos_term->term_id] = $pos_term;
					$temp_category = get_the_term_list(get_the_id(), 'portfolio_cat', '', ', ');

					$post_terms = wp_get_post_terms( get_the_id(), 'portfolio_cat');
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
            		$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
					$term_slug = '';
					if($post_terms)
						foreach($post_terms as $p_term)
							$term_slug .= $p_term->slug.' ';
							$term_list = wp_get_post_terms(get_the_id(), 'portfolio_cat', array("fields" => "names")); ?>
                
							<div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
								<div class="portfolio-block-one">
									<div class="inner-box">
										<figure class="image-box"><?php the_post_thumbnail('whitehall_370x400'); ?></figure>
										<div class="content-box">
											<div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><i class="flaticon-right-arrow"></i></a></div>
											<div class="text">
												<p>[ <?php echo implode( ', ', (array)$term_list ); ?> ]</p>
												<h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true )); ?>"><?php the_title(); ?></a></h4>
											</div>
										</div>
									</div>
								</div>
							</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata();
			$data_posts = ob_get_contents();
			ob_end_clean();
			ob_start(); ?>

			<!-- portfolio-section -->
			<section class="portfolio-section sec-pad">
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
					<div class="sortable-masonry">
						<div class="filters">
							<ul class="filter-tabs filter-btns centred clearfix">
								<li class="filter active" data-role="button" data-filter=".all">[ <?php esc_html_e('View All', 'whitehall'); ?> ]</li>
								<?php foreach($fliteration as $t): ?>
								<li class="filter" data-role="button" data-filter=".<?php echo esc_attr(whitehall_set($t, 'slug')); ?>"><?php echo wp_kses(whitehall_set($t, 'name'), $allowed_html); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						
						<div class="items-container row clearfix">
							<?php echo wp_kses($data_posts, $allowed_html); ?>
						</div>
						
						<div class="pagination-wrapper centred">
							<?php whitehall_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="far fa-angle-double-right"></i>', 'prev_text' => '<i class="far fa-angle-double-left"></i>')); ?>
						</div>
					</div>
				</div>
			</section>
			<!-- portfolio-section end -->

        <?php }
    }

}
