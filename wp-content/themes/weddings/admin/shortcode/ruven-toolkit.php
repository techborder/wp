<?php
/*
Plugin Name: Web-Dorado Shortcode Editor
Description: Web-Dorado Shortcode Editor is easy way to add nicely designed elements in your theme
Version: 1.0
Author: Web-Dorado.com
Author URI: http://www.Web-Dorado.com
Author Email: support@Web-Dorado.com
*/



if(!get_option('rvnt_disable_plugin'))
{
  // Define Constants
  define('PLUGIN_DIR_PATH', get_template_directory().'/admin/shortcode/');
  define('PLUGIN_DIR_URL',  get_template_directory_uri().'/admin/shortcode/');
  
  
  // Includes
  require_once(PLUGIN_DIR_PATH.'init-shortcodes.php');
 // require_once(PLUGIN_DIR_PATH.'init-widgets.php');
  require_once(PLUGIN_DIR_PATH.'init-tinymce.php');
 // require_once(PLUGIN_DIR_PATH.'init-portfolio.php');
}


	
	
add_action( 'admin_print_styles', 'admin_general_style');
function admin_general_style(){
	
	wp_enqueue_style( 'generalstyle', PLUGIN_DIR_URL.'css/style.css');
	echo "<style> .mce-i-ruven-shortcode{
    background-image: url('".PLUGIN_DIR_URL."tinymce/images/icon.png') !important;
}</style> <script>url_ruvenkit='".PLUGIN_DIR_URL."'			
</script>";
}

add_action('wp_print_styles', 'theme_general_style');
function theme_general_style(){
	wp_enqueue_style( 'shortcodestyle', PLUGIN_DIR_URL.'css/style.css');
}


?>