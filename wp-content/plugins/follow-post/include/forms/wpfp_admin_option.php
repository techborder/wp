<?php
	$html = '';
	$html .= '<div class="wrap">';

	global $wpdb;
	
	if(isset($_GET['settings'])  && $_GET['settings'] == '1') {
	
		if(isset($_POST['wpfp-set-submit'])) {

			update_option('wpfp_follow_img_path', $_POST['wpfp_follow_img_path']);
		
			update_option('wpfp_remove_img_path', $_POST['wpfp_remove_img_path']);
			
			$html .= '<div id="message" class="updated fade"><p><strong>Changes Saved</strong></p></div>';

		}

		$html .= '<div class="wpfp_page_link">
					<a href="?page=wpfp_settings">Main Page</a>
				</div>
				<h2>Follow My Blog Post Options</h2>';
		
		$html .= '<fieldset class="fldset">
					<legend class="lgnd"><strong>Post Option</strong></legend>
					<form action="" method="post">';
	
		$html .= '<p>
				<label for="wpfp-thumbsize">Follow Me: <small>Changing the URL of follow me image.</small></label><br />
				<input type="text" size="80" name="wpfp_follow_img_path" id="wpfp-thumbsize" value="' . get_option('wpfp_follow_img_path') .'" />
			</p>';
		
		$html .= '<p>
				<label for="wpfp-fullsize">Remove Me: <small> Changing the URL of remove me image.</small></label><br />
				<input type="text"  size="80" name="wpfp_remove_img_path" id="wpfp-fullsize" value="' . get_option('wpfp_remove_img_path') .'" />
			</p>
				</fieldset>';
			
		
		$html .= '<p>
				<input type="submit" class="button-primary" name="wpfp-set-submit" value="Save Changes" />
			</p>';
		
		$html .= '</form>';
		
	}
	
	else if(isset($_GET['postid']) && $_GET['postid'] != '' ) {
	
			$mydata = $this->model->wpfp_getPostData($_GET['postid']);
			$post_title = $mydata['post_title'];
			
		if(isset($_GET['log']) && $_GET['log'] != '') {
			
			$log = $_GET['log'];
			$html .= '<h2>'.__("View Logs","wpfp").'</h2><br />';
			
			$result = $this->model->wpfp_getdata_using_id($log);
			$email = $result['comment_author_email'];
			
			$args = array(
								'user_email'		=>	$email,
								'comment_post_ID'	=>	$_GET['postid']
							);
			$mail_logs = $this->model->wpfp_getdata_from_log($args);
			
			$html .= '<div>
						<div class="wpfp_view_title">User Mail Id :</div>
						<div>'.$email.'</div>
						<div class="wpfp_clear_both"></div>
						<div class="wpfp_view_title">Post Title :</div>
						<div>'.$post_title.'</div>
					</div>';
			
			if (!empty($mail_logs)) {
				
				$html .= '<table class="widefat" >
						<thead>
						<tr>
							<th scope="col">Mail Subject</th>
							<th scope="col">Mail Body</th>
							<th scope="col">Date</th>
						</tr>
						</thead>';
					
					$alt = ' class="alternate" ';
					
					foreach ($mail_logs as $data) {
						
						$mail_data = $data['mail_data'];
						$mailArr = explode('%$%$%',$mail_data);
						$datetime = new DateTime($data['log_date']);
						$newdate = $datetime->format('jS, F Y h:i:s A');
							
						$html .= '<tr '.$alt.'>
							<td>'.stripslashes($mailArr[0]).'</td>
							<td>'.stripslashes(nl2br($mailArr[1])).'</td>	
							<td>'.$newdate.'</td>	
						</tr>';
									
						if ($alt == '') { $alt = ' class="alternate" '; } else { $alt = '';}
					}
					
					$html .= '</table>';
			
			} else {
				$html .= '<div class="updated" id="message">
							<p><strong>'.__("NO Mail Sent.","wpfp").'</strong></p>
						</div>';
			}
			
		} else { 
			
				if(isset($_POST['Sub']) && $_POST['Sub'] == 'Subscribe') {
					
					if( !empty($_POST['chkid']) ) {
						
						for($k=0;$k<count($_POST['chkid']);$k++ ) {
								
								$res = $wpdb->update(
															FOLLOW_POST_TABLE,
															array(
																	'follow_status'	=>	'1'
																  ),
															array( 'id'	=>	$_POST['chkid'][$k] )
															
														);
						}
					}
				}
		
				if(isset($_POST['UnSub']) && $_POST['UnSub'] == 'UnSubscribe') {
					
					if( !empty($_POST['chkid']) ) {
						
						for($k=0;$k<count($_POST['chkid']);$k++ ) {
							
								$res = $wpdb->update(
															FOLLOW_POST_TABLE,
															array(
																	'follow_status'	=>	'0'
																  ),
															array( 'id'	=>	$_POST['chkid'][$k] )
															
														);
						}
					}
				}
		
		
				$postid = $_GET['postid'];
				$html .= '<h2>'.__("Subscribed  Users For - ","wpfp").$post_title.'</h2><br />';
				$albums = $this->model->wpfp_getdata_using_comment_id($postid);
		
				if (!empty($albums)) {
					
					$html .= '<form method="post" action="">';
					$html .= '<table class="widefat">
							<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">User Email</th>
								<th scope="col">User Type</th>
								<th scope="col">Subscribed</th>
								<th scope="col">View Log</th>				
							</tr>
							</thead>';
						
						$alt = ' class="alternate" ';
						
						foreach ($albums as $data) {
							
							$user_id = $data['user_id'];
							$follow_status = $data['follow_status'];
							
							if($user_id != '0') {
								$userType = __("Registered User","wpfp");
							}	else {
								$userType = __("Guest","wpfp");
							}	
							
							if($follow_status != '0') {
								$followmsg = 'Yes';
							}	else {
								$followmsg = 'No';
							}	
							
							$html .= '<tr'.$alt.'>
								<td><input type="checkbox" name="chkid[]" value="'.$data['id'].'" /></td>
								<td>'.$data['comment_author_email'].'</td>
								<td>'.$userType.'</td>	
								<td>'.$followmsg.'</td>	
								<td><a href="'.$_SERVER['REQUEST_URI'].'&log='.$data['id'].'" class="edit">View Log</a></td>
							</tr>';
										
							if ($alt == '') { $alt = ' class="alternate" '; } else { $alt = '';}
						}
						
						$html .= '<tr>
							<td colspan="5">
								<input type="submit" class="button-secondary" name="Sub" value="Subscribe"  />
								<input type="submit" class="button-secondary" name="UnSub" value="UnSubscribe"  />
		
							</td>
						</tr>	
						</table>
						</form>';
				
				} else { 
					$html .= '<strong>'.__("No Posts yet.","wpfp").'</strong>'; 
				}

		}	
	
	} else {

		$html .= '<div class="wpfp_page_link">
					<a href="?page=wpfp_settings&settings=1">Setting Page</a>
				</div>
				<h2>Post List - Select A Post To View Subscribed Users</h2>
				<br />';

		$albums = $wpdb->get_results("SELECT distinct(comment_post_ID) FROM " . FOLLOW_POST_TABLE, 'ARRAY_A');
		
		$html .= '<table class="widefat">
					<thead>
						<tr>
							<th scope="col">Post Name</th>
							<th scope="col">View Uses</th>				
						</tr>
					</thead>';
		
		if (!empty($albums)) {
				
				$alt = ' class="alternate" ';
				
				foreach ($albums as $data) {
				
					$Pdata = $this->model->wpfp_getPostData($data['comment_post_ID']);
					$post_title = $Pdata['post_title'];
					
					$html .= '<tr '.$alt.'><td>'.$post_title.'</td>
						<td><a href="'.$_SERVER['REQUEST_URI'].'&postid='.$data['comment_post_ID'].'" class="edit">View Users</a></td>
					</tr>';
								
					if ($alt == '') { $alt = ' class="alternate" '; } else { $alt = '';}
				}
						
		} else { 
			$html .= "<tr>
						<td>No Posts yet.
						</td>
					</tr>"; 
		}
		$html .= '</table>';
	}
	$html .= '</div>';
	echo $html;
?>