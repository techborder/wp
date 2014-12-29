<?php
/*---------------------------------------------------------------*/
/* Head Hook
/*---------------------------------------------------------------*/

function of_head() { do_action( 'of_head' ); }

/*---------------------------------------------------------------*/
/* Get the style path currently selected */
/*---------------------------------------------------------------*/

function of_style_path() {
    $style = $_REQUEST['style'];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = get_option('of_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}

/*---------------------------------------------------------------*/
/* Add default options after activation */
/*---------------------------------------------------------------*/

//@since 2.7.0 Mod by denzel, replace the previous function that does not work..
function propanel_default_settings_install(){

if(is_admin()):
 
	global $pagenow;
	
	// check if we are on theme activation page and activated is true.
	if(@$pagenow == 'themes.php' && @$_GET['activated'] == true):
	
	// reset all widgets - need karma fix... update_option( 'sidebars_widgets', $null );

	//if we are on theme activation page, do the following..
	
		$template = get_option('of_template');

			foreach($template as $t):
				$option_name   = $t['id'];
				$default_value = $t['std'];
				$value_check   = get_option("$option_name");
				if($value_check == ''){
				  update_option("$option_name","$default_value");
				}	
		
			endforeach;
	endif; //end if $pagenow
  
endif; //end if is_admin check

}
add_action('init','propanel_default_settings_install',90);

/*---------------------------------------------------------------*/
/* Admin Backend */
/*---------------------------------------------------------------*/
function siteoptions_admin_head() { 
//theme_name is dynamic, depends on which theme the framework is in.
if(function_exists('wp_get_theme')){
	$theme_name = wp_get_theme();
	} else {
		$theme_name = get_current_theme();// get theme name.
	}

//@since 4.0 - only call script when user is on 'Themes' page
		global $pagenow;
		if ($pagenow == 'themes.php') {
		?>
        
<script type="text/javascript">
jQuery(function(){
var message = '<p><strong><?php echo $theme_name; ?> is now activated.</strong> The custom options panel is located under <a href="<?php echo admin_url('admin.php?page=siteoptions'); ?>">Appearance > Site Options</a>.</p>';
jQuery('.themes-php #message2').html(message);
});
</script>

    <?php 
		} //end pagenow check
	} add_action('admin_head', 'siteoptions_admin_head');
?>