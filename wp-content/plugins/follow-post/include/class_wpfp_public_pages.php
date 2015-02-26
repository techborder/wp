<?php

class Wpfp_PublicPages {

	var $model;
	
	function __construct () {
				
		global $wpfp_model;
		$this->model = $wpfp_model;
	}

	function serve () {
		
		$me = new Wpfp_PublicPages;
		$me->add_hooks();
	}

	function wpfp_do_filter() {
	//if( is_single() ) {
		add_filter('the_content', array($this,'wpfp_follow_filter'), 1);
	//}
	}
		
	function wpfp_follow_filter($post) {
		global $wpdb;
		
		$user = wp_get_current_user();
		$userid = $user->ID;
		$comment_author_email = $user->user_email;
		
		if(isset($_POST['followstatus']) ) {

			$comment_post_ID = get_the_ID();
		
			$follow_status = $_POST['followstatus'];
					
			if($follow_status != '1') { $follow_status = 1;}
			else { $follow_status = 0;}
			
			$result = $wpdb->get_row("select id from ".FOLLOW_POST_TABLE."  where user_id = '".$userid."' and comment_post_ID = '".$comment_post_ID."' ", ARRAY_A);
			
			if(count($result) <= 0) {
				$args = array(
									'comment_post_ID'		=>	$comment_post_ID,
									'comment_author_email'	=>	$comment_author_email,
									'user_id'				=>	$userid,
									'follow_status'			=>	$follow_status
									
								);
				$wpdb->insert(FOLLOW_POST_TABLE,$args);
								
			} else {
			
				$wpdb->update(
									FOLLOW_POST_TABLE,
									array(
												'comment_author_email'	=>	$comment_author_email,
												'user_id'				=>	$userid,
												'follow_status'			=>	$follow_status
											),
									array(
												'id'	=>	$result['id']
											)
								);
			}
		}
				
		if($userid != '0') {
		
			$data = $wpdb->get_row("select follow_status from ".FOLLOW_POST_TABLE."  where user_id = '".$userid."'", ARRAY_A);
			
			$follow_status = $data['follow_status'];
			
			if($follow_status != '1' ) { $follow_status = 0;}
			
			$post1  = "<form name='followform' id='followform' method='post' action='".$_SERVER['REQUEST_URI']."'>";
			if($follow_status != '1') {
				
				$post1 .= "<input type='image' src='".get_option('wpfp_follow_img_path')."' name='follow' alt='Follow Me' title='Follow Me''>";	
			
			} else {
				$post1 .= "<input type='image' src='".get_option('wpfp_remove_img_path')."' name='remove' alt='Remove Me' title='Remove Me'>";	
			}
			
			$comment_post_ID = get_the_ID();
			$datan = $wpdb->get_row("select count(*) as cnt from ".FOLLOW_POST_TABLE." where comment_post_ID = '".$comment_post_ID."' and follow_status = 1", ARRAY_A);
			
			$numn = $datan['cnt'];
						 		  
			$post1 .= " (".$numn." Users)";
			
			$post1 .= "<input type='hidden' name='followstatus' value='".$follow_status."'>";		
			$post1 .= "</form>";	
			$post = $post1.$post;
		}
		
		return $post;
	}
	
	function wpfp_comment_form() {
		global $wpdb;
		
		$user = wp_get_current_user();
		$userid = $user->ID;
		$follow_status = '0';
		$f_text = "<b>Follow Me</b>"; 
		
		if($userid != '0' ){
			
			$data = $wpdb->get_row("select follow_status from ".FOLLOW_POST_TABLE."  where user_id = '".$userid."'", ARRAY_A);
			
			$follow_status = $data['follow_status'];
			if($follow_status != '0' && $follow_status != '' ) { 
				$follow_status = '1';
				$f_text = "<b>Uncheck Checkbox To remove From Following</b>"; 
			}
		}
		
		echo '<div id="zrx_captcha2">
				<table>
					<tr>
						<td align="left" valign="top">
							<input type="checkbox" name="followstatus_chk" id="followstatus_chk"';
								if($follow_status == '1') { echo "checked=\"checked\"";}
							echo ' />' . $f_text;
				echo '</td>
					</tr>
				</table>
			</div>';
	?>
		<script type="text/javascript">
			//<![CDATA[
			
			for( i = 0; i < document.forms.length; i++ ) {
				if( typeof(document.forms[i].followstatus_chk) != 'undefined' ) {
					commentForm = document.forms[i].comment.parentNode;
					break;
				}
			}
			var commentArea = commentForm.parentNode;
			var captchafrm = document.getElementById("zrx_captcha2");
			commentArea.insertBefore(captchafrm, commentForm);
			//commentArea.publicKey.size = commentArea.author.size;
			//commentArea.publicKey.className = commentArea.author.className;
			//]]>
		</script>
	<?php 
	}
	
	function wpfp_comment_post($comment_ID,$appStatus) {
		
		global $wpdb;
		
		$user = wp_get_current_user();
		$userid = $user->ID;
		$comment_author_email = $user->user_email;
		$comment_post_ID = $_POST['comment_post_ID'];
					
		if($userid == '0' && $_POST['followstatus_chk'] != 'on' ) {} else {
		
			if($_POST['followstatus_chk'] == 'on') {$follow_status = 1;} 
			else { $follow_status = 0;}
		
			if($userid == '0') {
				$comment_author_email = $_POST['email'];
			}
			
			if(trim($comment_author_email) != '') {
		
				$sel  = $wpdb->get_results("select id from ".FOLLOW_POST_TABLE."  where comment_author_email = '".$comment_author_email."' and comment_post_ID = '".$comment_post_ID."'", ARRAY_A);
											
				if(count($sel) <= 0) {
					
					$args = array(
										'comment_post_ID'	=>	$comment_post_ID,
										'comment_author_email'	=>	mysql_escape_string(stripslashes(trim($comment_author_email))),
										'user_id'	=>	$userid,
										'follow_status'	=>	$follow_status
									);
					$wpdb->insert(FOLLOW_POST_TABLE, $args);
									
				} else {
									
					$wpdb->update(
										FOLLOW_POST_TABLE,
										array(
													'comment_post_ID'	=>	$comment_post_ID,
													'comment_author_email'	=>	$comment_author_email,
													'follow_status'			=>	$follow_status
												),
										array(	'id'	=>	$sel['id']	)
									);
									
				}
			
			}
			
			if($appStatus == '1' || $appStatus === 'approve' ) {
				$appStatus = 'approve';
				$this->wpfp_follow_post_call($comment_ID,$appStatus);
			}
					
		}	
				
	}
	
	function wpfp_follow_post_call($comment_ID,$appStatus,$extraParam = '') {
		global $wpdb;
		
		if($extraParam != '') {
			$comment_post_ID = $extraParam;
			$appStatus = 'approve';
		} else {
			
			$data = $wpdb->get_row("select comment_post_ID from ".$wpdb->comments." where comment_ID = '".$comment_ID."'", ARRAY_A);
			
			$comment_post_ID = $data['comment_post_ID'];
		}
						
		if( $appStatus === 'approve' ) {
				
			$data = $this->model->wpfp_getdata_using_comment_id($comment_post_ID);
		
			foreach ( $data as $value ) {
				$emails[] =   $value['comment_author_email'];
				$ids[]    =   $value['id'];
			}
		
		
			$Pdata = $this->model->wpfp_getPostData($comment_post_ID); 
			$ptitle = $Pdata['post_title'];
			
			$fromEmail = get_option('admin_email');
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Admin '.$fromEmail.'' . "\r\n";
			
			$subject = 'Post '.$ptitle.' Updated at <a href="'.get_option('siteurl').'">'.get_option('blogname').'</a>';
			
			for ($k_=0;$k_<count($ids);$k_++) {
			
				$unsubscribe_url = get_option('siteurl')."/unsubscribe.php?uid=".$ids[$k_];
	
				$message = "Post ".$ptitle." Updated  <br /><br />If You Want To See Page Click below link <br /><a href='".get_permalink($comment_post_ID)."'>".get_permalink($comment_post_ID)."</a> <br /><br />If You want to unsubscribe <a href=\"".$unsubscribe_url."\">Click Here</a>";
				
				$mail_data = $subject. "%$%$%". $message; 
				//$setmail = mail($emails[$k_], $subject, $message, $headers);
				if(1) {
										
					$args = array(
										'comment_post_ID'	=>	$comment_post_ID,
										'user_email'		=>	$emails[$k_],
										'mail_data'			=>	mysql_escape_string(stripslashes(trim($mail_data))),
										'log_date'			=>	date('Y-m-d H:i:s')										
									);
					$wpdb->insert(FOLLOW_POST_LOG_TABLE,$args);		
				}
			}
		}
	}
	
	function wpfp_save_post($postID) {
			
		$newpostID = wp_is_post_revision($postID);
		//print_r($_POST);
		if($newpostID) {
			$finalID = $newpostID;
			$data = $this->model->wpfp_getPostData($postID);
			$OldContent = $data['post_content']; 
			
			//$Ndata = $this->model->wpfp_getPostData($finalID);
			$NewContent = $_POST['content']; 
			
			//echo "<br>Old Content".$OldContent;
			
			if($NewContent != $OldContent)	 {
				$this->wpfp_follow_post_call('','approve',$finalID);
			} else {
					echo "NO Process";
			}
		}	
		else {
			$finalID = $postID;
		}
	
	}	
	
	function wpfp_public_print_styles() {
		
		wp_register_style('wpfp-public-style',  FOLLOW_POST_PLUGIN_URL.'/css/style-public.css');
		wp_enqueue_style('wpfp-public-style');
		
	}
	
	function add_hooks () {
		
		add_action('wp_print_styles', array($this, 'wpfp_public_print_styles') );
		
		add_action('init', array($this,'wpfp_do_filter') );
		add_action('comment_form', array($this,'wpfp_comment_form') );
		add_action('comment_post', array($this,'wpfp_comment_post'),1,2);
		add_action('wp_set_comment_status', array($this,'wpfp_follow_post_call'),1,2);
		add_action('save_post', array($this,'wpfp_save_post') );
	}
}
?>