<?php

class Wpfp_AdminPages {

	var $model;
	
	function __construct () {
				
		global $wpfp_model;
		$this->model = $wpfp_model;
	}

	function serve () {
		
		$me = new Wpfp_AdminPages;
		$me->add_hooks();
	}

	function wpfp_add_admin() {
		add_options_page('Follow My Blog Post', 'Follow My Blog Post', wpfplevel, 'wpfp_settings', array($this,'wpfp_options')); // add setting page
	}
	
	function wpfp_options(){
		include('forms/wpfp_admin_option.php');
	}
	
	function wpfp_admin_print_styles() {
		
		wp_register_style('wpfp-admin-style',  FOLLOW_POST_PLUGIN_URL.'/css/style-admin.css');
		wp_enqueue_style('wpfp-admin-style');
		
	}
	
	function add_hooks () {
		
		// Register options and menu
		add_action('admin_menu', array($this,'wpfp_add_admin') );
		add_action('admin_print_styles', array($this, 'wpfp_admin_print_styles') );
				
	}
}
?>