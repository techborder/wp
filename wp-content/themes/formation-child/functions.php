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
		wp_enqueue_script( 'skrollr', get_stylesheet_directory_uri() . '/js/skrollr.min.js', array( 'jquery' ), '',  '' );
	}
	
	if (!is_admin()) {
		wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/skrollr-init.js', array( 'jquery', 'skrollr' ), '',  '' );
	}
	
}

add_action( 'wp_enqueue_scripts', 'Formation_child_scripts' );


/**
 * Adds a paragraph in the featured text
 */
//function formation_customizer_header_text_area( $wp_customize ) {
//	
//	$wp_customize->add_section( 'featured_section_paragraph_one', array(
//	'title'       => __( 'Featured Text Area Paragraph 1', 'Formation Child' ),
//	'description' => __( 'This is a settings section to add paragraphs below the Feature Text title on the homepage featured text area.', 'Formation' ),
//	'priority' => 166,
//	)
//	);
//	
//	$wp_customize->add_setting(
//		'featured_text_paragraph_one', array(
//		'default' => __( 'Default Featured Paragraph 1', 'Formation Child' ),
//		'sanitize_callback' => 'Formation_sanitize_text',
//		)
//	);
//	
//	$wp_customize->add_control(
//		'featured_text_paragraph_one', array(
//		'label'    => __( 'Featured Text Paragraph 1', 'Formation Child' ),
//		'section' => 'featured_section_paragraph_one',
//		'type' => 'text',
//		)
//	);
//	
//}
//add_action( 'customize_register', 'formation_customizer_header_text_area' );
//
///**
// * Adds a paragraph in the featured text
// */
//function formation_customizer_header_text_area( $wp_customize ) {
//	
//	$wp_customize->add_section( 'featured_section_paragraphs', array(
//	'title'       => __( 'Featured Text Area Paragraph 1', 'Formation Child' ),
//	'description' => __( 'This is a settings section to add paragraphs below the Feature Text title on the homepage featured text area.', 'Formation' ),
//	'priority' => 166,
//	)
//	);
//	
//	
//}
//add_action( 'customize_register', 'formation_customizer_header_text_area' );


/**
 * Adds a paragraph in the featured text
 */
function feature_text_paragraphs_customizer( $wp_customize ) {
	
	$wp_customize->add_section( 'featured_section_paragraphs', array(
	'title'       => __( 'Featured Text Area Paragraphs', 'Formation Child' ),
	'description' => __( 'Adds paragraphs below the Feature Text title on the homepage featured text area.', 'Formation' ),
	'priority' => 166,
	)
	);
	
	$wp_customize->add_setting(
		'featured_text_paragraph_one', array(
		'default' => __( 'Default Featured Paragraph 1', 'Formation Child' ),
		'sanitize_callback' => 'Formation_sanitize_text',
		)
	);
	
	$wp_customize->add_control(
		'featured_text_paragraph_one', array(
		'label'    => __( 'Featured Text Paragraph 1', 'Formation Child' ),
		'section' => 'featured_section_paragraphs',
		'type' => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'featured_text_paragraph_two', array(
		'default' => __( 'Default Featured Paragraph 2', 'Formation Child' ),
		'sanitize_callback' => 'Formation_sanitize_text',
		)
	);
	
	$wp_customize->add_control(
		'featured_text_paragraph_two', array(
		'label'    => __( 'Featured Text Paragraph 2', 'Formation Child' ),
		'section' => 'featured_section_paragraphs',
		'type' => 'text',
		)
	);
	
	$wp_customize->add_setting(
		'featured_text_paragraph_three', array(
		'default' => __( 'Default Featured Paragraph 3', 'Formation Child' ),
		'sanitize_callback' => 'Formation_sanitize_text',
		)
	);
	
	$wp_customize->add_control(
		'featured_text_paragraph_three', array(
		'label'    => __( 'Featured Text Paragraph 3', 'Formation Child' ),
		'section' => 'featured_section_paragraphs',
		'type' => 'text',
		)
	);
	
}
add_action( 'customize_register', 'feature_text_paragraphs_customizer' );
