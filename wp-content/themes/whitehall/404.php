<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage whitehall
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$allowed_html = wp_kses_allowed_html( 'post' );
$error_image = $options->get( 'error_page_image' );
$error_image = whitehall_set( $error_image, 'url', WHITEHALL_URI . 'assets/images/icons/error.png' ); ?>

<?php get_header();
$data = \WHITEHALL\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'whitehall_banner', $data );
$options = whitehall_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else { ?>

<!-- error-section -->
<section class="error-section centred">
	<div class="auto-container">
		<div class="inner-box">
			<figure class="image-box"><img src="<?php echo esc_url($error_image); ?>" alt="<?php esc_attr_e('404 Image', 'whitehall'); ?>"></figure>
			<h2><?php echo wp_kses( $options->get( 'error_title' ), $allowed_html ) ? wp_kses( $options->get( 'error_title' ), $allowed_html ) : esc_html_e( 'Something Went Wrong, Try Later', 'whitehall' ); ?></h2>
			<p><?php echo wp_kses( $options->get( 'error_text' ), $allowed_html ) ? wp_kses( $options->get( 'error_text' ), $allowed_html ) : esc_html_e( 'You may have mistyped the address or the page <br />may have moved.', 'whitehall' ); ?></p>
			
			<?php if ( $options->get('back_to_home_btn') ) : ?>
			<a href="<?php echo( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><span class="btn-title"><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back to Home', 'whitehall' ); ?></span></a>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- error-section end -->

<?php
}
get_footer(); ?>
