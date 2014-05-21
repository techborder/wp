<?php
/**
 * Formation child functions and definitions
 *
 * @package Formation Child
 * @since Formation Child 1.0
 */


/**
 * Enqueue scripts
 */
function Formation_child_scripts() {
	
	if (!is_admin()) {
		wp_enqueue_script( 'skrollr', get_stylesheet_directory_uri() . '/js/skrollr.js', array( 'jquery' ), '',  '' );
	}
	
	if (!is_admin()) {
		wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery', 'skrollr' ), '',  '' );
	}
	
}

add_action( 'wp_enqueue_scripts', 'Formation_child_scripts' );
