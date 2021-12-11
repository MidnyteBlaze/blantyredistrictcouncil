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

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div class="form-group">
		<fieldset>
			<input type="search" class="form-control" name="s" placeholder="<?php esc_attr_e( 'Search Here', 'whitehall' ); ?>">
			<input type="submit" value="<?php esc_attr_e( 'Search Now!', 'whitehall' ); ?>" class="theme-btn style-four">
		</fieldset>
	</div>
</form>
