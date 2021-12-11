<?php
/**
 * Blog Post Main File.
 *
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data    = \WHITEHALL\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';
$options = whitehall_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else { ?>
<!-- Page Title -->
<section class="page-title" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
	<div class="auto-container">
		<div class="content-box">
			<div class="title centred">
				<h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
			</div>
			<ul class="bread-crumb clearfix">
				<?php echo whitehall_the_breadcrumb(); ?>
			</ul>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- sidebar-page-container -->
<section class="sidebar-page-container sec-pad-2">
	<div class="auto-container">
		<div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'whitehall_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
                <div class="thm-unit-test">
					<div class="blog-details-content">
						
						<div class="inner-box">
							<figure class="image-box"><?php the_post_thumbnail('whitehall_730x500'); ?></figure>
							<div class="post-date"><h3><?php echo get_the_date('d'); ?><span><?php echo get_the_date('M'); ?>’<?php echo get_the_date('y'); ?></span></h3></div>
							<div class="lower-content">
                            	<?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
								<div class="category"><a href="javascript:;"><i class="flaticon-star"></i><?php echo implode( ', ', (array)$term_list ); ?></a></div>
                                <ul class="post-info clearfix">
                                    <li><i class="far fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></li>
                                    <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></li>
                                </ul>
                            </div>
							<?php the_content(); ?>
						</div>
						
						<?php if( has_tag() ) { ?>
						<div class="tags-box">
							<ul class="tags-list clearfix">
								<li><?php esc_html_e('Tags:', 'whitehall'); ?></li>
								<?php the_tags( '<li>', '</li>, <li> ', '</li>' ); ?>
							</ul>
						</div>
						<?php } ?>
						
						<?php if( $options->get( 'single_post_author_box' ) ): ?>
						<div class="author-box">
							<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
							<figure class="author-thumb"><?php echo get_avatar(get_the_author_meta('ID'), 100); ?></figure>
							<?php endif; ?>
							<div class="text">
								<h4><?php the_author(); ?></h4>
								<p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p>
							</div>
						</div>
						<?php endif; ?>
						
						<!-- Comments Area -->
						<?php comments_template(); ?>

					</div>
                </div>
                <?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'whitehall_sidebar', $data );
				}
			?>
        </div>
    </div>
</section>
<!--End blog area--> 

<?php
}
get_footer();
