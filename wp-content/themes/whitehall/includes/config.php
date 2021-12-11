<?php
/**
 * Theme config file.
 *
 * @package WHITEHALL
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['whitehall_main_header'][] 	= array( 'whitehall_preloader', 98 );
$config['default']['whitehall_main_header'][] 	= array( 'whitehall_main_header_area', 99 );

$config['default']['whitehall_main_footer'][] 	= array( 'whitehall_preloader', 98 );
$config['default']['whitehall_main_footer'][] 	= array( 'whitehall_main_footer_area', 99 );

$config['default']['whitehall_sidebar'][] 	    = array( 'whitehall_sidebar', 99 );

$config['default']['whitehall_banner'][] 	    = array( 'whitehall_banner', 99 );


return $config;
