<?php
/**
 * Search Form template
 *
 * @package WHITEHALL
 * @author ThemeKalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="search-widget">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
		<div class="form-group">
			<input type="search" name="s" placeholder="<?php esc_html_e( 'Enter Keyword ...', 'whitehall' ); ?>">
			<button type="submit"><i class="far fa-search"></i></button>
		</div>
	</form>
</div>
