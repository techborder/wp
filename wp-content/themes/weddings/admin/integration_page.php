<?php

class web_dor_integration_page_class{
	
	public $integration;
	
	public $shortintegration;

	public $options_integration;

	
	function __construct(){
		
		$this->integration = "Integration";
		global $special_id_for_db;
		$this->shortintegration = $special_id_for_db."int";
		
		
		$value_of_std[0]=get_theme_mod($this->shortintegration."_integrate_header_enable",'');
		$value_of_std[1]=get_theme_mod($this->shortintegration."_integrate_body_enable",'');
		$value_of_std[2]=get_theme_mod($this->shortintegration."_integrate_singletop_enable",'');
		$value_of_std[3]=get_theme_mod($this->shortintegration."_integrate_singlebottom_enable",'');
		$value_of_std[4]=get_theme_mod($this->shortintegration."_integration_head",'');
		$value_of_std[5]=get_theme_mod($this->shortintegration."_integration_body",'');
		$value_of_std[6]=get_theme_mod($this->shortintegration."_integration_single_top",'');
		$value_of_std[7]=get_theme_mod($this->shortintegration."_integration_single_bottom",'');
		$value_of_std[8]=get_theme_mod($this->shortintegration."_integrate_is_baner_enable",'');
		$value_of_std[9]=get_theme_mod($this->shortintegration."_integrate_baner_image_url",'');
		$value_of_std[10]=get_theme_mod($this->shortintegration."_integrate_baner_click_destination",'');
		$value_of_std[11]=get_theme_mod($this->shortintegration."_integrate_baner_adsens_code",'');

		
		
		$this->options_integration = array(	
             array(
				"name" => "Integration",
				
				"type" => "title"
			),		

			"integrate_header_enable" => array(
			
				"name" => "Enable header code",
				
				"description" => "Enable this option to add the header code specified below. Disabling this option removes the header code from your blog (the code is saved and can be used later on).",
				
				"var_name" => "integrate_header_enable",

				"id" => $this->shortintegration."_integrate_header_enable",

				"std" => $value_of_std[0]
				
			),

			"integrate_body_enable" => array(
			
				"name" => "Enable body code",
				
				"description" => "Enable this option to add the body code specified below. Disabling this option removes the body code from your blog (the code is saved and can be used later on).",
				
				"var_name" => "integrate_body_enable",

				"id" => $this->shortintegration."_integrate_body_enable",

				"std" => $value_of_std[1]
				
			),

			"integrate_singletop_enable" => array(
			
				"name" => "Enable single top code",
				
				"description" => "Enable this option to add the single top code specified below. Disabling this option removes the single top code from your blog (the code is saved and can be used later on).",
				
				"var_name" => "integrate_singletop_enable",

				"id" => $this->shortintegration."_integrate_singletop_enable",

				"std" => $value_of_std[2]
				
			),

			"integrate_singlebottom_enable" => array(
			
				"name" => "Enable single bottom code",
				
				"description" => "Enable this option to add the single bottom code specified below. Disabling this option removes the single bottom code from your blog (the code is saved and can be used later on).",
				
				"var_name" => "integrate_singlebottom_enable",

				"id" => $this->shortintegration."_integrate_singlebottom_enable",

				"std" => $value_of_std[3]
				
			),

			"integration_head" => array(
			
				"name" => "",
				
				"description" => "Here you can add code to appear in the head section of every page of your blog (useful adding javascript or css to all pages)..",
				
				"var_name" => "integration_head",

				"id" => $this->shortintegration."_integration_head",

				"std" => $value_of_std[4]
			
			),

			"integration_body" => array(
			
				"name" => "",
				
				"description" => "Here you can add code to appear in body section of all pages of your blog. Can be used to enter a tracking pixel for a state counter such as Google Analytics.",
				
				"var_name" => "integration_body",

				"id" => $this->shortintegration."_integration_body",

				"std" => $value_of_std[5]
			),

			"integration_single_top" => array(
			
				"name" => "",
				
				"description" => "Here you can add code to be palcedat the top of all single posts (useful for integrating social bookmarking links for instance).",
				
				"var_name" => "integration_single_top",
	
				"id" => $this->shortintegration."_integration_single_top",
	
				"std" => $value_of_std[6]
			),

			"integration_single_bottom" => array(
			
				"name" => "",
				
				"description" => "Here you can add code to be placed at the bottom of all single posts.",
				
				"var_name" => "integration_single_bottom",

				"id" => $this->shortintegration."_integration_single_bottom",

				"std" => $value_of_std[7]
			),
						
			
			"integrate_is_baner_enable" => array(
			
				"name" => "Enable advertisement banner",
				
				"description" => "Enable this option to add advertisement banner (size 468x60) on the bottom of your post pages below the single post content. If enabled you must upload the banner image and fill in the destination URL below.",
				
				"var_name" => "integrate_is_baner_enable",
	
				"id" => $this->shortintegration."_integrate_is_baner_enable",
	
				"std" => $value_of_std[8]
			),

			"integrate_baner_image_url" => array(
			
				"name" => "Upload advertisement banner image",
				
				"description" => "You can upload the advertisement banner (size 468x60) by clicking the Upload banner button.",
				
				"var_name" => "integrate_baner_image_url",
	
				"id" => $this->shortintegration."_integrate_baner_image_url",
	
				"std" => $value_of_std[9]
			),
		
			"integrate_baner_click_destination" => array(
			
				"name" => "The URL of advertisement banner when clicked",
				
				"description" => "You can provide the value of the destination URL when advertisement banner is clicked.",
				
				"var_name" => "integrate_baner_click_destination",
	
				"id" => $this->shortintegration."_integrate_baner_click_destination",
	
				"std" => $value_of_std[10]
			),
		
			"integrate_baner_adsens_code" => array(
			
				"name" => "AdSense Code",
				
				"description" => "Please insert the AdSense code provided by Google.",
				
				"var_name" => "integrate_baner_adsens_code",
	
				"id" => $this->shortintegration."_integrate_baner_adsens_code",
	
				"std" => $value_of_std[11]
			),
	
			
		);
		
		
	}


	/// save changes or reset options
	public function web_dorado_theme_update_and_get_options_integration(){
		
		if ( isset($_GET['page']) && $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "integration_page") {
			if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save') {
				foreach ($this->options_integration as $value) {
					if (isset($_REQUEST[$value['var_name']])) {
						set_theme_mod($value['id'], $_REQUEST[$value['var_name']]);
					} else {
						remove_theme_mod($value['id']);
					}
				}
				header("Location: themes.php?page=web_dorado_theme&controller=integration_page&saved=true");
				die;
			} else if (isset($_REQUEST['action']) && $_REQUEST['action'] =='reset') {
				foreach ($this->options_integration as $value) {
					remove_theme_mod($value['id']);
				}
				header("Location: themes.php?page=web_dorado_theme&controller=integration_page&reset=true");
				die;
			}
		}
	
	}
	
	public function web_dorado_integration_page_admin_scripts(){
		
		wp_enqueue_style('integration_page_main_style',get_template_directory_uri('template_directory').'/admin/css/integration_page.css');	
		

	}
	
	public function dorado_theme_admin_integration(){
	
	if(isset($_REQUEST['controller']) && $_REQUEST['controller']=='integration_page'){
	if (isset($_REQUEST['saved']) && $_REQUEST['saved'] ) 
	
		echo '<div id="message" class="updated"><p><strong>Integration settings are saved.</strong></p></div>';
		
	if (isset($_REQUEST['reset']) && $_REQUEST['reset'] ) 
	
		echo '<div id="message" class="updated"><p><strong>Integration settings are reset.</strong></p></div>';
	}
	
	global $dor_admin_helepr_functions, $web_dor;
	?>
	<script>
	function open_or_hide_param(cur_element){	
				if(cur_element.checked){
					jQuery(cur_element).parent().parent().parent().find('.open_hide').show();
				}
				else
				{
					jQuery(cur_element).parent().parent().parent().find('.open_hide').hide();
				}
	}

	jQuery(document).ready(function() { 
		jQuery('.with_input_home').each(function(){open_or_hide_param_home(this)})
		jQuery('.with_input__').each(function(){open_or_hide_param(this)})
	
	jQuery("#change-integration-1").click(function(){
				jQuery("#integration_2").hide(100);
				jQuery("#integration_1").show(100);
				jQuery("#button_integration-1").addClass("active_button");
				jQuery("#button_integration-2").removeClass("active_button");

		
			});
		  
	jQuery("#change-integration-2").click(function(){
		
				jQuery("#integration_1").hide(100);
				jQuery("#integration_2").show(100);
				jQuery("#button_integration-2").addClass("active_button");
				jQuery("#button_integration-1").removeClass("active_button");

	});
	
	jQuery('#main_integration_page .upload-button').click(function () {
		window.parent.uploadID = jQuery(this).prev('input');
		/*grab the specific input*/
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
		
	window.send_to_editor = function (html) {
		imgurl = jQuery('img', html).attr('src');
		window.parent.uploadID.val(imgurl);
		/*assign the value to the input*/
		tb_remove();
	};
	
	});
	</script>
	
	<div id="main_integration_page">
	
	<table align="center" width="90%" style="margin-top: 0px; margin-bottom: 23px;border-bottom: rgb(111, 111, 111) solid 2px;">
					<tr>
						<td>
							<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;"><?php echo $this->integration; ?></h3>
						</td>
						<td style="padding-left: 10px;width: 36%;font-size:14px; font-weight:bold">
					      <a href="<?php echo $web_dor.'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to add meta keywords,metatags, titles.
                          <a href="<?php echo $web_dor.'/wordpress-theme-options/3-5.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					    </td>
					</tr>
				</table>
		<form method="post"  action="themes.php?page=web_dorado_theme&controller=integration_page">
			<table align="center" width="90%" style=" padding-bottom:0px; padding-top:0px;">
				<tr>
					<td>
							<a href="javascript:;" id="change-integration-1" style="text-decoration:none; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button active_button" id="button_integration-1" style="background: url(<?php get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">Main Integretion</span></a>
							<a href="javascript:;" id="change-integration-2" style="text-decoration:none; background-color:silver; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button" id="button_integration-2" style="background: url(<?php get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">AdSense and Advertisement Integrations</span></a>
<br />
<br />

				<div id="integration_1">
                      <?php
					    $dor_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_header_enable'], $this->options_integration['integration_head']);
					    $dor_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_body_enable'], $this->options_integration['integration_body']);
					    $dor_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_singletop_enable'], $this->options_integration['integration_single_top']);
						$dor_admin_helepr_functions->checkbox_with_textarea($this->options_integration['integrate_singlebottom_enable'], $this->options_integration['integration_single_bottom']);						
                      ?>					  
				</div>
				<div id="integration_2"  style="display:none;">
				      <?php
					    $dor_admin_helepr_functions->only_checkbox($this->options_integration['integrate_is_baner_enable']);
						$dor_admin_helepr_functions->only_upload($this->options_integration['integrate_baner_image_url'], array("input_size"=>"130"));
						$dor_admin_helepr_functions->only_input($this->options_integration['integrate_baner_click_destination'], array("input_size"=>"130"));
						$dor_admin_helepr_functions->only_input($this->options_integration['integrate_baner_adsens_code'], array("input_size"=>"130"));
					  ?>							
						
				</div>
			</td>
		</tr>
	</table>
	<br/>
	<p class="submit" style="float: left; margin-left: 63px; margin-right: 8px;">
			<input class="button" name="save" type="submit" value="Save changes"/>
			<input type="hidden" name="action" value="save"/>
	</p>
   </form>
   <form method="post" action="themes.php?page=web_dorado_theme&controller=integration_page">
		<p class="submit">
			<input class="button" name="reset" type="submit" value="Reset"/>
			<input type="hidden" name="action" value="reset"/>
		</p>
	</form>
</div>
	<?php	
	}	
	public function update_head_integration(){
		
			foreach ($this->options_integration as $value) {
		       if(isset($value['var_name'])) 
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
			if($integrate_header_enable)
				echo stripslashes($integration_head);
	
	}
	public function update_body_integration(){
		
			foreach ($this->options_integration as $value) {
		      if(isset($value['var_name']))
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
		
		if($integrate_body_enable)
			echo stripslashes($integration_body);


	}
	
	public function update_top_of_post_integration()
	{
	
		foreach ($this->options_integration as $value) {
		       if(isset($value['var_name']))
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
	
		if($integrate_singletop_enable)
		echo stripslashes($integration_single_top);
	
	}

	public function update_bottom_of_post_integration()
	{
	
		foreach ($this->options_integration as $value) {
			if(isset($value['var_name']))	
				if (get_theme_mod($value['var_name']) === FALSE) {
					$$value['var_name'] = $value['std'];
				}
		
			}
		
		if($integrate_singlebottom_enable)
		echo stripslashes($integration_single_bottom);
	
	}


}
 