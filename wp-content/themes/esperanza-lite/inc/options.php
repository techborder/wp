<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$options = array();
		
	$options[] = array(
		'name' => __('General', 'esperanza'),
		'type' => 'heading');	

	$options[] = array(
		'name' => __('Favicon', 'esperanza'),
		'desc' => __('Upload a favicon for your website.', 'esperanza'),
		'id' => 'esperanza_favicon_uploader',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Background Stripe Overlay', 'esperanza'),
		'desc' => __('Uncheck this to remove the stripe overlay that covers the background image.', 'esperanza'),
		'id' => 'esperanza_stripe_overlay',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Enable Sticky Header', 'esperanza'),
		'desc' => __('Check this to enable the sticky header feature. (The header will stay fixed at the top of the window when you scroll down)', 'esperanza'),
		'id' => 'esperanza_sticky_header',
		'std' => '0',
		'type' => 'checkbox');
	
	$options[] = array(
		'name' => __('Footer Credentials', 'esperanza'),
		'desc' => __('Customize the copyright message in the footer here.', 'esperanza'),
		'id' => 'esperanza_footer_creds',
		'std' => 'Theme: Esperanza  by <a href="http://themes.qlue.co/" rel="nofollow" title="Qlue Themes" target="_blank">Qlue Themes</a>',
		'type' => 'textarea');
	
	$options[] = array(
		'name' => __('Posts & Pages', 'esperanza'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Excerpt Length', 'esperanza'),
		'desc' => __('Set the excerpt length here (number of words)', 'esperanza'),
		'id' => 'esperanza_excerpt_length',
		'std' => '55',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Excerpt in home page', 'esperanza'),
		'desc' => __('Check this to show post excerpt in home page.', 'esperanza'),
		'id' => 'esperanza_excerpt_home_page',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Turn off Comments in pages', 'esperanza'),
		'desc' => __('Check this to turn off the comments in pages.', 'esperanza'),
		'id' => 'esperanza_turn_off_page_comment',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Styling', 'esperanza'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Primary Color', 'esperanza'),
		'desc' => __('Default color is #FF9934.', 'esperanza'),
		'id' => 'primary_color',
		'std' => '#FF9934',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Header Background Color', 'esperanza'),
		'desc' => __('Default color is #C3984A.', 'esperanza'),
		'id' => 'header_bg_color',
		'std' => '#C3984A',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Menu hover Color', 'esperanza'),
		'desc' => __('Default color is #FF9934.', 'esperanza'),
		'id' => 'menu_hover_color',
		'std' => '#FF9934',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Link hover Color', 'esperanza'),
		'desc' => __('Default color is #FF9934.', 'esperanza'),
		'id' => 'link_hover_color',
		'std' => '#FF9934',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Footer Background Color', 'esperanza'),
		'desc' => __('Default color is #C3984A.', 'esperanza'),
		'id' => 'footer_bg_color',
		'std' => '#C3984A',
		'type' => 'color' );	

	$options[] = array(
		'name' => __('Advanced', 'esperanza'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Enter your custom CSS styles', 'esperanza'),
		'desc' => __('This CSS will overwrite the CSS of style.css file.', 'esperanza'),
		'id' => 'esperanza_custom_css',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Help', 'esperanza'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Support:', 'esperanza'),
		'desc' => __('Esperanza WordPress theme is designed and developed by Qlue Themes. For any queries or help regarding this theme, use our <a href="http://support.qlue.co/forums/" target="_blank">support forum</a>.', 'esperanza'),
		'type' => 'info');
		
	$options[] = array(
		'name' => __('Documentation:', 'esperanza'),
		'desc' => __('Please check <a href="http://support.qlue.co/kb/esperanza/" target="_blank">Esperanza Knowledgebase</a> for theme documentation and tutorial videos.', 'esperanza'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Theme Demo:', 'esperanza'),
		'desc' => __('For a live demo of Esperanza theme check <a href="http://themes.qlue.co/esperanza/" target="_blank">http://themes.qlue.co/esperanza/</a>', 'esperanza'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Contribute:', 'esperanza'),
		'desc' => __('If you are interested in contributing to the development of this theme please check our <a href="https://bitbucket.org/buzzupp/esperanza" target="_blank">BitBucket repository</a>.', 'esperanza'),
		'type' => 'info');

	return $options;
}
?>