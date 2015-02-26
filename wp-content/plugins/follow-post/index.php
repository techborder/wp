<?php
/*
Plugin Name: WP Follow Blog Post
Plugin URI: http://wordpress.worldwebtechnology.com/follow-my-blog-post
Description: allows visitors to follow changes or comments on a particular posts. 
Version: 1.1
Author: World Web Technology
Author URI: http://wwww.worldwebtechnology.com/
*/


global $wpdb;
define('PLUGIN_FOLLOW_POST', 'WP-follow-blog-post');
define('wpfplevel','10');
define('PLUGIN_FOLLOW_POST_DIR', WP_PLUGIN_URL . '/'.PLUGIN_FOLLOW_POST);
define('FOLLOW_POST_PLUGIN_URL',plugins_url().'/'.PLUGIN_FOLLOW_POST);
define('FOLLOW_POST_TABLE', $wpdb->prefix.'follow_blog_post');
define('FOLLOW_POST_LOG_TABLE', $wpdb->prefix.'follow_blog_post_log');

	// calls the wpfp_install function on activation
	register_activation_hook( __FILE__, 'wpfp_install' );
	
	// calls the wpfp_uninstall function on deactivation
	register_deactivation_hook( __FILE__, 'wpfp_uninstall' );
	
	// does the initial setup
	function wpfp_install() {
		global $wpdb;
		
		$cur = dirname(__FILE__);
		rename($cur."/unsubscribe.php", ABSPATH."/unsubscribe.php");

		
		$sql = "CREATE TABLE IF NOT EXISTS  ".FOLLOW_POST_TABLE." (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `comment_post_ID` bigint(20) NOT NULL DEFAULT '0',
			  `comment_author_email` varchar(100) NOT NULL,
			  `user_id` bigint(20) NOT NULL DEFAULT '0',
			  `follow_status` tinyint(1) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			)";
		$wpdb->query($sql);		
	
		$sql = "CREATE TABLE IF NOT EXISTS ".FOLLOW_POST_LOG_TABLE." (
			  `log_id` int(11) NOT NULL AUTO_INCREMENT,
			  `comment_post_ID` bigint(20) NOT NULL,
			  `user_email` varchar(100) NOT NULL,
			  `mail_data` longtext NOT NULL,
			  `log_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
			   PRIMARY KEY (`log_id`)
				)";
		$wpdb->query($sql);
		
		$opt1 = PLUGIN_FOLLOW_POST_DIR."/images/follow.gif";
		$opt2 = PLUGIN_FOLLOW_POST_DIR."/images/remove.gif";
		update_option('wpfp_follow_img_path', $opt1);
		update_option('wpfp_remove_img_path', $opt2);
		
	}
	// call when plugin is uninstalled
	
	function wpfp_uninstall() {
		global $wpdb;
		
		$cur = dirname(__FILE__);
		rename(ABSPATH."/unsubscribe.php",$cur."/unsubscribe.php" );
	}
	
	require_once 'include/class_wpfp_model.php';
	
	global $wpfp_model;
	$wpfp_model = new Wpfp_Model();
	
	if(is_admin()) {
		require_once 'include/class_wpfp_admin_pages.php';
		Wpfp_AdminPages::serve();	
	} else {
		require_once 'include/class_wpfp_public_pages.php';
		Wpfp_PublicPages::serve();
	}
?>