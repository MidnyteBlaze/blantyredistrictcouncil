<?php
/**
 * Single Image File.
 *
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 */

?>
<?php
if ( class_exists( 'Whitehall_Resizer' ) ) {
	$img_obj = new Whitehall_Resizer();

}
$width = $data->get( 'sidebar' ) ? '769' : '1170';
$allowed_html = wp_kses_allowed_html( 'post' );
?>


<div class="single-avatar singlee">
	<?php if ( class_exists( 'Whitehall_Resizer' ) ) : ?>

		<?php echo wp_kses( $img_obj->resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, 460, true ), $allowed_html ); ?>
	<?php else : ?>
		<?php the_post_thumbnail( 'full' ); ?>
	<?php endif; ?>

	<?php if ( $options->get( 'small_image' ) && has_post_thumbnail() ) : ?>

		<span><?php echo esc_url(get_avatar( get_the_author_meta( 'ID' ), 41 )); ?></span>

	<?php endif; ?>

</div>
