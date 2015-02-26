<?php

class Wpfp_Model {

	function __construct () {
				
	}

	function serve () {
		
		$me = new Wpfp_Model;
		$me->add_hooks();
	}
	
	function wpfp_getPostData($id) {
		global $wpdb;
		
		$result = $wpdb->get_row("SELECT post_title,post_name,post_content FROM ".$wpdb->posts." WHERE ID = '".$id."'", ARRAY_A);
		
		return $result;
	}
	
	function wpfp_getdata_using_id($id){
		global $wpdb;
		
		$result = $wpdb->get_row("SELECT comment_author_email FROM " . FOLLOW_POST_TABLE . " where id = '".$id."'", ARRAY_A);
		
		return $result;
	}
	
	function wpfp_getdata_using_comment_id($id){
		global $wpdb;
		
		$result = $wpdb->get_results("SELECT * FROM " . FOLLOW_POST_TABLE . " where comment_post_ID = '".$id."'", ARRAY_A);
		
		return $result;
	}
	
	function wpfp_getdata_from_log($args=array()){
		global $wpdb;
		
		$query = "SELECT *  FROM " . FOLLOW_POST_LOG_TABLE . " WHERE 1 = 1";
		
		if(isset($args['user_email']) && !empty($args['user_email']))
			$query .= " AND user_email = '".$args['user_email']."'";
		if(isset($args['comment_post_ID']) && !empty($args['comment_post_ID']))
			$query .= " AND comment_post_ID = '".$args['comment_post_ID']."'";
			
		$result = $wpdb->get_results($query, ARRAY_A);
		
		return $result;
	}
	
	function add_hooks () {
						
	}
}
?>