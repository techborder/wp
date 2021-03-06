<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core fullframe-core and provides some helper functions using fullframe-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.0 
 */

//define theme version
if ( !defined( 'FULLFRAME_THEME_VERSION' ) )
define ( 'FULLFRAME_THEME_VERSION', '1.6' );

/**
 * Implement the core functions
 */
require get_template_directory() . '/inc/fullframe-core.php';