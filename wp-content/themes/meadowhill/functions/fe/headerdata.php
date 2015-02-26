<?php
/**
 * Headerdata of Theme options.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/  

// additional js and css
if(	!is_admin()){
function meadowhill_fonts_include () {
global $meadowhill_options_db;
// Google Fonts
$bodyfont = $meadowhill_options_db['meadowhill_body_google_fonts'];
$headingfont = $meadowhill_options_db['meadowhill_headings_google_fonts'];
$descriptionfont = $meadowhill_options_db['meadowhill_description_google_fonts'];
$headlinefont = $meadowhill_options_db['meadowhill_headline_google_fonts'];
$postentryfont = $meadowhill_options_db['meadowhill_postentry_google_fonts'];
$sidebarfont = $meadowhill_options_db['meadowhill_sidebar_google_fonts'];
$imagefont = $meadowhill_options_db['meadowhill_image_google_fonts'];
$menufont = $meadowhill_options_db['meadowhill_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$imagefonturl = $fonturl.$imagefont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('meadowhill-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('meadowhill-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('meadowhill-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('meadowhill-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('meadowhill-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('meadowhill-google-font6', $sidebarfonturl);
		 }
     if ($imagefont != 'default' && $imagefont != ''){
      wp_enqueue_style('meadowhill-google-font7', $imagefonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('meadowhill-google-font8', $menufonturl);
		 }
}
add_action( 'wp_enqueue_scripts', 'meadowhill_fonts_include' );
}

// additional js and css
function meadowhill_css_include () {
  global $meadowhill_options_db;
	if ( $meadowhill_options_db['meadowhill_css'] == 'Burning Autumn (default)' || $meadowhill_options_db['meadowhill_css'] == '' ){
			wp_enqueue_style('meadowhill-style', get_stylesheet_uri());
		}

	if ( $meadowhill_options_db['meadowhill_css'] == 'Autumn Forest' ){
			wp_enqueue_style('meadowhill-style-autumn-forest', get_template_directory_uri().'/css/autumn-forest.css');
		}

	if ( $meadowhill_options_db['meadowhill_css'] == 'Autumn Sunlight' ){
			wp_enqueue_style('meadowhill-style-autumn-sunlight', get_template_directory_uri().'/css/autumn-sunlight.css');
		}
    
  if ( $meadowhill_options_db['meadowhill_css'] == 'Blue' ){
			wp_enqueue_style('meadowhill-style-blue', get_template_directory_uri().'/css/blue.css');
		}
}
add_action( 'wp_enqueue_scripts', 'meadowhill_css_include' );

// Display sidebar
function meadowhill_display_sidebar() {
    global $meadowhill_options_db;
    $display_sidebar = $meadowhill_options_db['meadowhill_display_sidebar']; 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper .container #sidebar { display: none; } #wrapper .container #content { width: 100%; }', 'meadowhill'); ?>
<?php } 
}

// Page title width
function meadowhill_get_page_title_width() {
    global $meadowhill_options_db;
    $page_title_width = $meadowhill_options_db['meadowhill_page_title_width']; 
		if ($page_title_width != '' && $page_title_width != '50%') { ?>
		<?php _e('#wrapper .title-box { width: ', 'meadowhill'); ?><?php echo $page_title_width ?><?php _e(';}', 'meadowhill'); ?>
<?php } 
}

// Header menu width
function meadowhill_get_header_menu_width() {
    global $meadowhill_options_db;
    $header_menu_width = $meadowhill_options_db['meadowhill_header_menu_width']; 
		if ($header_menu_width != '' && $header_menu_width != '50%') { ?>
		<?php _e('#wrapper .menu-box { width: ', 'meadowhill'); ?><?php echo $header_menu_width ?><?php _e(';}', 'meadowhill'); ?>
<?php } 
}

// Header menu format
function meadowhill_get_header_menu_format() {
    global $meadowhill_options_db;
    $header_menu_format = $meadowhill_options_db['meadowhill_header_menu_format']; 
		if ($header_menu_format == 'Drop-down') { ?>
		<?php _e('.js .menu-box .selectnav {display: block; float: right; height: 28px; position: relative; right: 22px; top: 31px; width: 90%;} .js #nav {display: none;}', 'meadowhill'); ?>
<?php } 
}

// Header background image URL
function meadowhill_get_header_image_url() {
    global $meadowhill_options_db;
    $header_image_url = get_header_image(); ?> 
		<?php echo '#wrapper #wrapper-header {background-image: url('; ?><?php echo $header_image_url ?><?php echo '); }'; ?>
<?php 
}

// Header background image height
function meadowhill_get_header_image_height() {
    global $meadowhill_options_db;
    $header_image_height = $meadowhill_options_db['meadowhill_header_image_height']; 
		if ($header_image_height != '' && $header_image_height != '400') { ?>
		<?php _e('#wrapper #wrapper-header {height: ', 'meadowhill'); ?><?php echo $header_image_height ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Background Pattern for Header Image
function meadowhill_get_header_background_pattern() {
    global $meadowhill_options_db;
    $header_background_pattern = $meadowhill_options_db['meadowhill_header_background_pattern'];
    if ($header_background_pattern == 'None') { ?>
		<?php _e('#wrapper .header-pattern { background-image: none; }', 'meadowhill'); ?>
<?php } 
}

// Background Pattern for Footer
function meadowhill_get_footer_background_pattern() {
    global $meadowhill_options_db;
    $footer_background_pattern = $meadowhill_options_db['meadowhill_footer_background_pattern'];
    if ($footer_background_pattern == 'None') { ?>
		<?php _e('#wrapper .footer-pattern { background-image: none; }', 'meadowhill'); }
    else { _e('#wrapper .footer-pattern { opacity: 0.2; filter: alpha(opacity=20); }', 'meadowhill'); ?>
<?php } 
}

// Homepage Header background image URL
function meadowhill_get_homepage_header_image_url() {
    global $meadowhill_options_db;
    $homepage_header_image_url = $meadowhill_options_db['meadowhill_homepage_header_image_url']; 
		if ($homepage_header_image_url != '') { ?>
		<?php echo 'html .home #wrapper-header, html .blog #wrapper-header {background-image: url('; ?><?php echo esc_url($homepage_header_image_url); ?><?php echo ') !important; }'; ?>
<?php } 
}

// Background Pattern for Homepage Header Image
function meadowhill_get_homepage_header_background_pattern() {
    global $meadowhill_options_db;
    $homepage_header_background_pattern = $meadowhill_options_db['meadowhill_homepage_header_background_pattern'];
    $theme_folder = get_template_directory_uri();
    if ($homepage_header_background_pattern == 'Pattern 1 (default)') { ?>
		<?php echo 'html .home .header-pattern, html .blog .header-pattern { background-image: url('; ?><?php echo $theme_folder ?><?php echo '/images/pattern-1.png) !important; }'; } 
    elseif ($homepage_header_background_pattern == 'None') { ?>
		<?php echo 'html .home .header-pattern, html .blog .header-pattern { background-image: none !important; }'; ?>
<?php } 
}

// Position of Site Description
function meadowhill_get_site_description_position() {
    global $meadowhill_options_db;
    $site_description_position = $meadowhill_options_db['meadowhill_site_description_position']; 
		if ($site_description_position != '' && $site_description_position != '20') { ?>
		<?php _e('#wrapper #header .header-description {bottom: ', 'meadowhill'); ?><?php echo $site_description_position ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
} 

// Image Section height
function meadowhill_get_image_section_height() {
    global $meadowhill_options_db;
    $image_section_height = $meadowhill_options_db['meadowhill_image_section_height']; 
		if ($image_section_height != '' && $image_section_height != '370') { ?>
		<?php _e('#wrapper #wrapper-image {height: ', 'meadowhill'); ?><?php echo $image_section_height ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Image Section background image URL
function meadowhill_get_image_section_image_url() {
    global $meadowhill_options_db;
    $image_section_image_url = $meadowhill_options_db['meadowhill_image_section_image_url']; 
		if ($image_section_image_url != '') { ?>
		<?php echo '#wrapper #wrapper-image {background-image: url('; ?><?php echo esc_url($image_section_image_url); ?><?php echo ') !important; }'; ?>
<?php } 
}

// Background Pattern for Image Section background image
function meadowhill_get_image_section_background_pattern() {
    global $meadowhill_options_db;
    $image_section_background_pattern = $meadowhill_options_db['meadowhill_image_section_background_pattern'];
    if ($image_section_background_pattern == 'None') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { background-image: none !important; }', 'meadowhill'); ?>
<?php } 
} 

// Position of Image Section text
function meadowhill_get_image_section_text_position() {
    global $meadowhill_options_db;
    $image_section_text_position = $meadowhill_options_db['meadowhill_image_section_text_position']; 
		if ($image_section_text_position != '' && $image_section_text_position != '125') { ?>
		<?php _e('#wrapper #wrapper-image .image-description {top: ', 'meadowhill'); ?><?php echo $image_section_text_position ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
} 

// Body font
function meadowhill_get_body_font() {
    global $meadowhill_options_db;
    $bodyfont = $meadowhill_options_db['meadowhill_body_google_fonts']; 
		if ($bodyfont != 'default' && $bodyfont != '') { ?>
		<?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper #content #commentform .form-allowed-tags, #wrapper #content #commentform p { font-family: "', 'meadowhill'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Site title font
function meadowhill_get_headings_google_fonts() {
    global $meadowhill_options_db;
    $headingfont = $meadowhill_options_db['meadowhill_headings_google_fonts']; 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .site-title { font-family: "', 'meadowhill'); ?><?php echo $headingfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;}', 'meadowhill'); ?>
<?php } 
}

// Site description font
function meadowhill_get_description_font() {
    global $meadowhill_options_db;
    $descriptionfont = $meadowhill_options_db['meadowhill_description_google_fonts']; 
		if ($descriptionfont != 'default' && $descriptionfont != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .site-description {font-family: "', 'meadowhill'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Image Section font
function meadowhill_get_image_font() {
    global $meadowhill_options_db;
    $imagefont = $meadowhill_options_db['meadowhill_image_google_fonts'];
		if ($imagefont != 'default' && $imagefont != '') { ?>
		<?php _e('#wrapper #wrapper-image .image-description p {font-family: "', 'meadowhill'); ?><?php echo $imagefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Page/post headlines font
function meadowhill_get_headlines_font() {
    global $meadowhill_options_db;
    $headlinefont = $meadowhill_options_db['meadowhill_headline_google_fonts'];
		if ($headlinefont != 'default' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "', 'meadowhill'); ?><?php echo $headlinefont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Post entry font
function meadowhill_get_postentry_font() {
    global $meadowhill_options_db;
    $postentryfont = $meadowhill_options_db['meadowhill_postentry_google_fonts']; 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper .container .post-entry .post-entry-headline { font-family: "', 'meadowhill'); ?><?php echo $postentryfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Sidebar widget headlines font
function meadowhill_get_sidebar_widget_font() {
    global $meadowhill_options_db;
    $sidebarfont = $meadowhill_options_db['meadowhill_sidebar_google_fonts'];
		if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Footer widget headlines font
function meadowhill_get_footer_widget_font() {
    global $meadowhill_options_db;
    $sidebarfont = $meadowhill_options_db['meadowhill_sidebar_google_fonts'];
		if ($sidebarfont != 'default' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Header menu font
function meadowhill_get_menu_font() {
    global $meadowhill_options_db;
    $menufont = $meadowhill_options_db['meadowhill_menu_google_fonts']; 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper-header #header .header-bar .menu-box { font-family: "', 'meadowhill'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// User defined CSS.
function meadowhill_get_own_css() {
    global $meadowhill_options_db;
    $own_css = $meadowhill_options_db['meadowhill_own_css']; 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function meadowhill_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php meadowhill_get_own_css(); ?>
<?php meadowhill_display_sidebar(); ?>
<?php meadowhill_get_page_title_width(); ?>
<?php meadowhill_get_header_menu_width(); ?>
<?php meadowhill_get_header_menu_format(); ?>
<?php meadowhill_get_header_image_url(); ?>
<?php meadowhill_get_header_image_height(); ?>
<?php meadowhill_get_header_background_pattern(); ?>
<?php meadowhill_get_footer_background_pattern(); ?>
<?php meadowhill_get_homepage_header_image_url(); ?>
<?php meadowhill_get_homepage_header_background_pattern(); ?>
<?php meadowhill_get_site_description_position(); ?>
<?php meadowhill_get_image_section_height(); ?>
<?php meadowhill_get_image_section_image_url(); ?>
<?php meadowhill_get_image_section_background_pattern(); ?>
<?php meadowhill_get_image_section_text_position(); ?>
<?php meadowhill_get_body_font(); ?>
<?php meadowhill_get_headings_google_fonts(); ?>
<?php meadowhill_get_description_font(); ?>
<?php meadowhill_get_image_font(); ?>
<?php meadowhill_get_headlines_font(); ?>
<?php meadowhill_get_postentry_font(); ?>
<?php meadowhill_get_sidebar_widget_font(); ?>
<?php meadowhill_get_footer_widget_font(); ?>
<?php meadowhill_get_menu_font(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'meadowhill_custom_styles');	?>