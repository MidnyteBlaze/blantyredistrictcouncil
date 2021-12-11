<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package WHITEHALL
 * @since   1.0
 * @version 1.0
 */
$options = whitehall_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$icon_href = $options->get( 'image_favicon' ); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
		<?php if( $icon_href ):?>
        <link rel="shortcut icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
        <?php else:?>
        <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri(). '/assets/images/favicon.png'); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url(get_template_directory_uri(). '/assets/images/favicon.png'); ?>" type="image/x-icon">
		<?php endif;?>
	<?php endif;?>
	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<?php
if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
}?>
    
<?php do_action( 'whitehall_main_header' ); ?>
