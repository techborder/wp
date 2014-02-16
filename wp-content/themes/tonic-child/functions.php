<?php

add_action( 'wp_enqueue_scripts', 'child_add_js' );

if ( ! function_exists( 'bavotasan_add_js' ) ) :
/**
 * Load all JavaScript to header
 *
 * This function is attached to the 'wp_enqueue_scripts' action hook.
 *
 * @uses	wp_enqueue_script()
 *
 * @since 1.0.0
 */
//function child_add_js() {
//
//	wp_enqueue_script( 'theme_js_child', get_stylesheet_directory_uri() .'/library/js/theme.js', '', '', true );
//}
endif; // bavotasan_add_js

