<?php  






  
/* Initialize TinyMCE
============================================================ */

class ruven_init_tinymce {
  
  
  
  /* Constructor
  ------------------------------------------------------------ */
  
	function __construct()
	{
	  if(!get_option('rvnt_disable_tinymce'))
	  {
  	  add_action('init', array(&$this, 'init'));
  	  add_action('admin_init', array(&$this, 'admin_init'));
  	}
	}
  
  
  
  /* Init
  ------------------------------------------------------------ */
	
	function init()
	{
	  if(!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
			return;
		}
		
		if(get_user_option('rich_editing') == 'true')
		{
			add_filter('mce_external_plugins', array(&$this, 'add_tinymce_plugins'));
			add_filter('mce_buttons', array(&$this, 'add_tinymce_buttons'));
		}
	}
  
  
  
  /* Admin Init
  ------------------------------------------------------------ */
	
	function admin_init()
	{
	  $tinymce_uri = PLUGIN_DIR_URL.'tinymce';
	  
		// CSS
		wp_enqueue_style('rvnt-popup', $tinymce_uri.'/css/popup.css', false, '1.0', 'all');
		
		// JavaScript
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-livequery', $tinymce_uri.'/js/jquery.livequery.js', false, '1.1.1', false);
		wp_enqueue_script('jquery-appendo',   $tinymce_uri.'/js/jquery.appendo.js',   false, '1.0',   false);
		wp_enqueue_script('base64',           $tinymce_uri.'/js/base64.js',           false, '1.0',   false);
		wp_enqueue_script('rvnt-popup',       $tinymce_uri.'/js/popup.js',            false, '1.0',   false);
		wp_enqueue_script('jscolor',       	  $tinymce_uri.'/js/jscolor/jscolor.js',            false, '1.0',   false);
		
		// Localize Script
		wp_localize_script('jquery', 'RuvenShortcodes', array('plugin_folder' => PLUGIN_DIR_URL));
	}
  
  
  
  /* Add TinyMCE Plugin
  ------------------------------------------------------------ */
	
	function add_tinymce_plugins($plugin_array)
	{
		if (get_bloginfo('version') < '3.9') {
			$plugin_array['ruvenShortcodes'] = PLUGIN_DIR_URL.'tinymce/plugin_old.js';
 		}
		else{
			$plugin_array['ruvenShortcodes'] = PLUGIN_DIR_URL.'tinymce/plugin.js';
		}
		return $plugin_array;
	}
  
  
  
  /* Add TinyMCE Button
  ------------------------------------------------------------ */
  
  function add_tinymce_buttons($buttons)
	{
		if (get_bloginfo('version') < '3.9') {
			array_push($buttons, "|", 'ruven_button'); 		
		}
		else{
			array_push($buttons,'ruvenShortcodes');
		}
		
		return $buttons;
	}



}







/* Invoke TinyMCE
============================================================ */

new ruven_init_tinymce();







?>