<?php
if ( ! function_exists( "whitehall_add_metaboxes" ) ) {
	function whitehall_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'portfolio.php',
			'service.php',
			'department.php',
			'team.php',
			'testimonials.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( WHITEHALLPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/whitehall_options/boxes", "whitehall_add_metaboxes" );
}

