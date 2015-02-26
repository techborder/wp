<?php  

 
/* Initialize Shortcodes
============================================================ */

class ruven_init_shortcodes {
  
  
  
  /* Constructor
  ------------------------------------------------------------ */
  
	function __construct()
	{
    if(!get_option('rvnt_disable_shortcodes')) {
  	  require_once(PLUGIN_DIR_PATH.'shortcodes/shortcodes.php');
  	  add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts_and_styles'));
  	}
	}
  
  
  
  /* Constructor
  ------------------------------------------------------------ */
  
	function enqueue_scripts_and_styles()
	{
		/*
		if(!is_admin()) {
			function insert_jquery(){
			   wp_enqueue_script('jquery');
			}
			add_filter('wp_head','insert_jquery');  
		}
		*/
	}



}







/* Invoke Shortcodes
============================================================ */

new ruven_init_shortcodes();







?>