<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage WHITEHALL
 * @author     ThemeKalia
 * @version    1.0
 */

if ( class_exists( 'Whitehall_Resizer' ) ) {
	$img_obj = new Whitehall_Resizer();
} else {
	$img_obj = array();
}

$options = whitehall_WSH()->option();

$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>

	<div class="news-block-three">
		<div class="inner-box">
			<figure class="image-box">
				<a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><i class="fas fa-link"></i></a>
				<?php the_post_thumbnail('whitehall_730x500'); ?>
			</figure>
			<div class="post-date"><h3><?php echo get_the_date('d'); ?><span><?php echo get_the_date('M'); ?>’<?php echo get_the_date('y'); ?></span></h3></div>
			<div class="lower-content">
				<?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
				<div class="category"><a href="javascript:;"><i class="flaticon-star"></i><?php echo implode( ', ', (array)$term_list ); ?></a></div>
				<h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>
				<ul class="post-info clearfix">
					<li><i class="far fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php the_author(); ?></a></li>
					<li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></li>
				</ul>
				<?php the_excerpt(); ?>
				<div class="btn-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php esc_html_e('Read More', 'whitehall'); ?></a></div>
				
				<?php if(function_exists('whitehall_share_us_two')): ?>
				<div class="share-option">
					<h6><?php esc_html_e('Share This Post', 'whitehall'); ?></h6>
					<a href="javascript:;" class="share-icon"><i class="flaticon-share"></i></a>
					<?php echo wp_kses(whitehall_share_us_two(get_the_id(), $post->post_name), true); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
    
</div>