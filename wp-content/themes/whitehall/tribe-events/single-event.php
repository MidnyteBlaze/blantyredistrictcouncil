<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.2.4
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $post;
$event_id = get_the_ID();

$data = \WHITEHALL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'blog-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = whitehall_WSH()->option();

$event_thumbnail_id = get_post_thumbnail_id($event_id);
$event_thumbnail_url = wp_get_attachment_url($event_thumbnail_id);

$start_datetime = tribe_get_start_date( $event_id );
$end_datetime = tribe_get_end_date( $event_id );

$start_date = tribe_get_start_date($event_id, null, false, 'd' );
$end_date = tribe_get_end_date($event_id, null, false, 'd M, Y' );

$start_time = tribe_get_start_time ( $event_id, 'h:i A' );
$end_time = tribe_get_end_time ( $event_id, 'h:i A' );

$location = get_option('location'); ?>

<!-- Page Title -->
<section class="page-title style-two" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
	<div class="auto-container">
		<div class="content-box">
			<div class="title centred">
				<h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></h1>
			</div>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- event-details -->
<section class="event-details">
	<div class="auto-container">
		<?php while ( have_posts() ) : the_post(); ?>
		
			<div class="overview-box">
				<div class="row clearfix">
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<?php the_content();?>
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
				</div>
			</div>

			<!-- Event meta -->
			<div class="purpose-box">
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div>

			<?php if(function_exists('whitehall_share_us_events')): ?>
			<div class="social-box centred">
				<h4><?php esc_html_e('Share With Others', 'whitehall'); ?></h4>
				<?php echo wp_kses(whitehall_share_us_events(get_the_id(), $post->post_name ), true); ?>
			</div>
			<?php endif; ?>
		
		<?php endwhile; ?>
	</div>
</section>
<!-- event-details end -->
