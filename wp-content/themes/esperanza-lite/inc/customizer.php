<?php
/**
 * Esperanza Theme Customizer
 *
 * @package Esperanza
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function esperanza_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_section( 'esperanza_logo_section' , array(
		'title'       => __( 'Logo', 'esperanza' ),
		'priority'    => 30,
		'description' => 'Upload a logo image/text to replace the default site name in the header',
	) );
	
	$wp_customize->add_setting(
		'esperanza_logo_type',
		array(
			'default' => 'image',
		)
	);
	 
	$wp_customize->add_control(
		'esperanza_logo_type',
		array(
			'type' => 'radio',
			'label' => 'Logo Type',
			'section' => 'esperanza_logo_section',
			'choices' => array(
				'image' => 'Image Logo',
				'text' => 'Text Logo'
			),
		)
	);
	
	$wp_customize->add_setting( 'esperanza_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'esperanza_logo', array(
		'label'    => __( 'Logo Image', 'esperanza' ),
		'section'  => 'esperanza_logo_section',
		'settings' => 'esperanza_logo',
	) ) );
	
	$wp_customize->add_setting( 'esperanza_logo_text' );
	$wp_customize->add_control(
		'esperanza_logo_text',
		array(
			'label' => 'Text for Logo',
			'section' => 'esperanza_logo_section',
			'type' => 'text',
		)
	);
	
}
add_action( 'customize_register', 'esperanza_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function esperanza_customize_preview_js() {
	wp_enqueue_script( 'esperanza_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'esperanza_customize_preview_js' );
