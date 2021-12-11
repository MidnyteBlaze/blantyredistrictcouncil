<?php
/**
 * Theme functions and definitions.
 */
function whitehall_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'whitehall-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'whitehall-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'whitehall-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'whitehall-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'whitehall_child_enqueue_styles' );