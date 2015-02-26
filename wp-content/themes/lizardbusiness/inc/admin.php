<?php
	
if ( !is_user_logged_in() ) return;
function is_dash() {
	 return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) )||is_admin();
}

if ( current_user_can('administrator') ) {
	if ( is_dash() ) {
		include_once ( get_template_directory().'/inc/dashboard.php' );
	} else {
		include_once ( get_template_directory().'/inc/frontend.php' );
	}
}

if ( current_user_can('edit_posts') ) {
	//echo '123';
	include_once ( get_template_directory().'/inc/author.php' );
} //else echo '321';

add_action('wp_ajax_save_customize', 'business_save_customize');
function business_save_customize() {
	global $settings;
	foreach( $_POST['data'] as $key=>$value ){
		$settings['elements'][$key]['show']=($value=='block');
	}
	$result=get_option( 'business-settings' );
	$result['elements']=$settings['elements'];
	update_option( 'business-settings', $result );
	
	die();
}

add_action('wp_ajax_save_fonts', 'business_save_fonts');
function business_save_fonts() {
	global $settings;
	foreach( $_POST['data'] as $key=>$value ){
		$settings['fonts'][$key] = $value;
	}
	$result=get_option( 'business-settings' );
	$result['fonts']=$settings['fonts'];
	update_option( 'business-settings', $result );
	
	
	die();
}



add_action('wp_ajax_save_settings', 'business_save_settings');
function business_save_settings() {
	
	parse_str($_POST['data'], $values);
	$values=business_removeslashes( $values );
	$result=get_option( 'business-settings' );
	$result[$_POST['section']]=$values;
	update_option( 'business-settings', $result );
	echo __( 'New configuration saved.', 'lizard' );
	die();
}



add_action('wp_ajax_business_sendmail', 'business_sendmail');
function business_sendmail() {
	
	parse_str($_POST['data'], $values);
	$values=business_removeslashes( $values );
	$message='';
	foreach( $values as $name=>$value ){
		$message.="\r\n".$name.':'.$value;
	}
	mail('support@lizardthemes.com', 'Topic', $message);
	echo __( 'Your message was sent to support.', 'lizard' );
	die();
}



add_action('wp_ajax_upload_image', 'business_upload_image');
function business_upload_image() {
	
	$file=$_FILES['uploadfile'];
	$overrides['test_form']=false;
	$file=wp_handle_upload( $file, $overrides );
	echo $file['url'];
	
	die();
	
}

function business_removeslashes($var) {
	if (is_array($var)) foreach ($var as $key=>$value) {
		$var[$key]=business_removeslashes($value);
	} else {
		return stripslashes($var);
	}
	return $var;
}

