<?php



class web_dor_seo_page_class{
	
	public $shortSEO;
	
	public $options_SEO;
	

	
	function __construct(){
		
	
		$this->shortSEO = "seo"; // standart databese prefix
		
		/// get and initial stnadart values
		$value_of_std[0]=get_theme_mod($this->shortSEO."_seo_home_title",'');
		$value_of_std[1]=get_theme_mod($this->shortSEO."_seo_home_description","");
		$value_of_std[2]=get_theme_mod($this->shortSEO."_seo_home_keywords","");
		$value_of_std[3]=get_theme_mod($this->shortSEO."_seo_home_titletext","");
		$value_of_std[4]=get_theme_mod($this->shortSEO."_seo_home_descriptiontext","");	
		$value_of_std[5]=get_theme_mod($this->shortSEO."_seo_home_keywordstext","");	
		$value_of_std[6]=get_theme_mod($this->shortSEO."_seo_home_type","BlogName | Blog description");	
		$value_of_std[7]=get_theme_mod($this->shortSEO."_seo_home_separate","|");	
		$value_of_std[8]=get_theme_mod($this->shortSEO."_seo_single_title","");		
		$value_of_std[9]=get_theme_mod($this->shortSEO."_seo_single_description","");	
		$value_of_std[10]=get_theme_mod($this->shortSEO."_seo_single_keywords","");	
		$value_of_std[11]=get_theme_mod($this->shortSEO."_seo_single_type","BlogName | Post title");	
		$value_of_std[12]=get_theme_mod($this->shortSEO."_seo_single_separate","|");	
		$value_of_std[13]=get_theme_mod($this->shortSEO."_seo_index_description","");	
		$value_of_std[14]=get_theme_mod($this->shortSEO."_seo_index_type","Category name | BlogName");	
		$value_of_std[15]=get_theme_mod($this->shortSEO."_seo_index_separate","|");	

		
	$this->options_SEO = array (
		
			array( 
			
				"name" => "SEO",
			
				"type" => "title"
				
			),
			
			
			////////// HOME PARAMETRS
			
			
			"seo_home_title" => array( 
			
				"name" => "Custom Title",

				"description" => "To create your homepage title, the theme combines your site name with its description. However, you can change the title with the help of custom title option. You need to provide the custom title in the box to replace the default title.",
								
				"var_name" => "seo_home_title",
			
				"id"=>$this->shortSEO."_seo_home_title",
				   
				"std" => $value_of_std[0]
				
			),
				   
			"seo_home_description" => array(
			
				"name" => "Meta Description",

				"description" => "By default, the meta description field is filled out based on your blog description. However, it is also possible to apply a different description. Simply enable this option and type in the custom description below.",
				
				"var_name" => "seo_home_description",
			
				"id"=>$this->shortSEO."_seo_home_description",
				   
				"std" => $value_of_std[1]
				
			),
				   
			"seo_home_keywords" => array(
			
				"name" => "Meta Keywords",

				"description" => "The keywords are not added to the header by default. Nowadays, most of the search engines do not refer to keywords to rank the website, but you can, nevertheless, define the keywords by enabling this option.",
				
				"var_name" => "seo_home_keywords",
			
				"id"=>$this->shortSEO."_seo_home_keywords",
				   
				"std" => $value_of_std[2]
			),
				   
			"seo_home_titletext" => array(
			
				"name" => "",

				"description" => "If custom title are enabled, you can add a custom homepage title in the following field.",
				
				"var_name" => "seo_home_titletext",
		
				"id"=>$this->shortSEO."_seo_home_titletext",
		
				"std" => $value_of_std[3]
			),
		
			"seo_home_descriptiontext" => array(
			
				"name" => "",

				"description" => "If meta descriptions are enabled, you can add a custom description in the following textbox.",
				
				"var_name" => "seo_home_descriptiontext",
		
				"id"=>$this->shortSEO."_seo_home_descriptiontext",
		
				"std" => $value_of_std[4]
			),
		
			"seo_home_keywordstext" => array(
			
				"name" => "",

				"description" => "If meta keywords are enabled, you can add custom keyword in the field below. Separate the keywords by commas.",
				
				"var_name" => "seo_home_keywordstext",
		
				"id"=>$this->shortSEO."_seo_home_keywordstext",
		
				"std" => $value_of_std[5]
			),
		
			"seo_home_type" => array(
			
				"name" => "Autogeneration Method (if Custom Titles are disabled)",

				"description" => "Choosing from menu, you can specify the order in which the title of your blog (site) is generated from site name and blog description in case of autogeneration method.",
				
				"all_values" => array(
									"BlogName | Blog description" => "BlogName | Blog description",
									"Blog description | BlogName" => "Blog description | BlogName",
									"BlogName only" => "BlogName only",						
								),
				
				"var_name" => "seo_home_type",
		
				"id"=>$this->shortSEO."_seo_home_type",
		
				"std" => $value_of_std[6]
			),
		   
			"seo_home_separate" => array(
			
				"name" => "BlogName and Post title Separator",

				"description" => "Here you can specify a character that separates the blog title and post name when the previous autogeneration option is used.",
				
				"var_name" => "seo_home_separate",
		
				"id"=>$this->shortSEO."_seo_home_separate",
		
				"std" => $value_of_std[7]
			),
			
			
			
			//////////// SINGLE PARAMETRS
			
			
			
		
			"seo_single_title" => array(
			
				"name" => "Custom Title",

				"description" => "You can change the title of the pages/posts checking this option.  Define the title in SEO Expert box in the corresponding pages/posts.",
				
				"var_name" => "seo_single_title",
		
				"id"=>$this->shortSEO."_seo_single_title",
		
				"std" => $value_of_std[8]
			),
		
			"seo_single_description" => array(
		
				"name" => "Meta Description",

				"description" => "By default, the meta description field is filled out based on your site description. However, you can change the page/post description providing meta description in SEO Expert box in the corresponding pages/posts.",
				
				"var_name" => "seo_single_description",
		
				"id"=>$this->shortSEO."_seo_single_description",
		
				"std" => $value_of_std[9]
			),
		
			"seo_single_keywords" => array(
			
				"name" => "Meta Keywords",

				"description" => "The keywords are not added to the header by default. However, you can add meta keywords to your post/page. You can list them in SEO Expert box in the corresponding pages/posts.",
				
				"var_name" => "seo_single_keywords",
		
				"id"=>$this->shortSEO."_seo_single_keywords",
		
				"std" => $value_of_std[10]
			),
		
			"seo_single_type" => array(
			
				"name" => "Autogeneration Method (if Custom Titles are Disabled)",

				"description" => "You can choose to keep the default version of combined page/post title and page/post description or choose the order of their appearance.",
				
				"all_values" => array(
									"BlogName | Post title" => "BlogName | Post title",
									"Post title | BlogName" => "Post title | BlogName",
									"Post title only" => "Post title only",						
								),
				
				"var_name" => "seo_single_type",
		
				"id"=>$this->shortSEO."_seo_single_type",
		
				"std" => $value_of_std[11]
			),
		   
			"seo_single_separate" => array(
			
				"name" => "BlogName and Post title Separator",

				"description" => "Here you can add any symbol to separate the sitename and the page/post title in your page/post in case of autogeneration.",
				
				"var_name" => "seo_single_separate",
		
				"id"=>$this->shortSEO."_seo_single_separate",
		
				"std" => $value_of_std[12]
			),
			
			
			
			////////// INDEX PARAMETRS
			
		
				   
			"seo_index_description" => array(
			
				"name" => "Meta Description",

				"description" => "Enabling this option you can add meta description for the categories (applies the Description of the post category).",
				
				"var_name" => "seo_index_description",
		
				"id"=>$this->shortSEO."_seo_index_description",
		
				"std" => $value_of_std[13]
			),
		
			"seo_index_type" => array(
			
				"name" => "Autogeneration Method (if Custom Titles are Disabled)",

				"description" => "You can choose to keep the default version of combining sitename and category name and choose the order of their appearance from the provided options.",
				
				"all_values" => array(
									"BlogName | Category name" => "BlogName | Category name",
									"Category name | BlogName" => "Category name | BlogName",
									"Category name only"		=> "Category name only",						
								),
				
				"var_name" => "seo_index_type",
		
				"id"=>$this->shortSEO."_seo_index_type",
		
				"std" => $value_of_std[14]
			),
		   
			"seo_index_separate" => array(
		
				"name" => "BlogName and Category Name Separator",

				"description" => "Here you can add any symbol to separate the sitename and the category name in your page in case of autogeneration.",
				
				"var_name" => "seo_index_separate",
		
				"id"=>$this->shortSEO."_seo_index_separate",
		
				"std" => $value_of_std[15]
			),	   
		
		);
	}
	
	public function web_dorado_seo_page_admin_scripts(){
	
		wp_enqueue_script('jquery');
		wp_enqueue_style('seo_page_main_style',get_template_directory_uri('template_directory').'/admin/css/seo_page.css');	
		
	} 
	
	public function dorado_theme_admin_seo(){
		
		if (isset($_REQUEST['saved']) && $_REQUEST['saved'] && isset($_GET['controller']) && $_GET['controller'] == "seo_page" ) 
		
			echo '<div id="message" class="updated"><p><strong>SEO settings are saved.</strong></p></div>';
			
		if (isset($_REQUEST['reset']) && $_REQUEST['reset'] && isset($_GET['controller']) && $_GET['controller'] == "seo_page" ) 
		
			echo '<div id="message" class="updated"><p><strong>SEO settings are reset.</strong></p></div>';
			
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
		jQuery(document).ready(function(){
			jQuery('.with_input').each(function(){open_or_hide_param(this)})
			jQuery("#change-seo-1").click(function(){
				
				jQuery("#seo-2").hide(100);
				jQuery("#seo-3").hide(100);
				jQuery("#seo-1").show(100);
				jQuery("#button-1").addClass("active_button");
				jQuery("#button-2").removeClass("active_button");
				jQuery("#button-3").removeClass("active_button");
		
			});
		  
			jQuery("#change-seo-2").click(function(){
				
				jQuery("#seo-1").hide(100);
				jQuery("#seo-3").hide(100);
				jQuery("#seo-2").show(100);
				jQuery("#button-2").addClass("active_button");
				jQuery("#button-3").removeClass("active_button");
				jQuery("#button-1").removeClass("active_button");
		
			});
		  
			jQuery("#change-seo-3").click(function(){
				
				jQuery("#seo-1").hide(100);
				jQuery("#seo-2").hide(100);
				jQuery("#seo-3").show(100);
				jQuery("#button-3").addClass("active_button");
				jQuery("#button-2").removeClass("active_button");
				jQuery("#button-1").removeClass("active_button");
		
		  });
		});
	</script>
	
		<div id="main_seo_page">
			<form method="post" action="themes.php?page=web_dorado_theme&controller=seo_page">
				<table align="center" width="90%" style="margin-top: 0px; margin-bottom: 23px;border-bottom: rgb(111, 111, 111) solid 2px;">
					<tr>
						<td>
							<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">SEO</h3>
						</td>
						<td style="padding-left: 10px;width: 36%;font-size:14px; font-weight:bold">
					      <a href="<?php echo $web_dor.'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows you to add meta keywords,metatags, titles.
                          <a href="<?php echo $web_dor.'/wordpress-theme-options/3-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					    </td>
					</tr>
				</table>
					<div class="params_main_div">
						<a href="javascript:;" id="change-seo-1" style="text-decoration:none; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button active_button" id="button-1" style="background: url(<?php echo  get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">Homepage SEO</span></a>
						<a href="javascript:;" id="change-seo-2" style="text-decoration:none; background-color:silver; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button" id="button-2" style="background: url(<?php echo get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">Single Post Page SEO</span></a>
						<a href="javascript:;" id="change-seo-3" style="text-decoration:none; background-color:silver; color:black; font-family:Segoe UI;color: rgb(111, 111, 111); font-size:10p;"><span class="button" id="button-3" style="background: url(<?php echo get_template_directory_uri('template_url'); ?>/images/button.png) center; background-size: 100% 100%;">Index Page SEO</span></a>
	  
						<div id="seo-1">							
							<?php 
								$dor_admin_helepr_functions->checkbox_with_input($this->options_SEO['seo_home_title'],$this->options_SEO['seo_home_titletext']);  /// SEO HOME TITLE 
								$dor_admin_helepr_functions->checkbox_with_textarea($this->options_SEO['seo_home_description'],$this->options_SEO['seo_home_descriptiontext']); /// SEO HOME DESCRIPTION 
								$dor_admin_helepr_functions->checkbox_with_input($this->options_SEO['seo_home_keywords'],$this->options_SEO['seo_home_keywordstext']); // SEO HOME KEYWORDS     
								$dor_admin_helepr_functions->only_select($this->options_SEO['seo_home_type']); // SEO HOME autognerete method
								$dor_admin_helepr_functions->only_input($this->options_SEO['seo_home_separate']); // SEO HOME SEPERETE   
							?>  					
						</div>
						
						<div id="seo-2" style="display:none;">
							<?php
								$dor_admin_helepr_functions->only_checkbox($this->options_SEO['seo_single_title']); // SEO SINGLE TITLE
								$dor_admin_helepr_functions->only_checkbox($this->options_SEO['seo_single_description']); // SEO SINGLE description
								$dor_admin_helepr_functions->only_checkbox($this->options_SEO['seo_single_keywords']); // SEO SINGLE keywords 
								$dor_admin_helepr_functions->only_select($this->options_SEO['seo_single_type']); // SEO SINGLE autognerete method
								$dor_admin_helepr_functions->only_input($this->options_SEO['seo_single_separate']); // SEO SINGLE SEPERETE   

							?> 
						</div>
						
						<div id="seo-3"  style="display:none;">
						<!--INDEX SEO-->
							<?php
								$dor_admin_helepr_functions->only_checkbox($this->options_SEO['seo_index_description']); // SEO INDEX TITLE
								$dor_admin_helepr_functions->only_select($this->options_SEO['seo_index_type']); // SEO INDEX autognerete method
								$dor_admin_helepr_functions->only_input($this->options_SEO['seo_index_separate']); // SEO INDEX SEPERETE   
							?>
						</div>         
					</div>
				<br />
				<p class="submit" style="float:left; margin-left: 63px; margin-right: 8px;">
					<input class="button" name="save" type="submit" value="Save changes" />
					<input type="hidden" name="action" value="save" />
				</p>
			</form>
			<form method="post" action="themes.php?page=web_dorado_theme&controller=seo_page">
				<p class="submit" style="float:left">
					<input class="button" name="reset" type="submit" value="Reset" />
					<input type="hidden" name="action" value="reset" />
				</p>
			</form>
			<div style="clear:both"></div>
		</div>
		
	<?php
		
	}
	
	//// update options

	public function web_dorado_theme_update_and_get_options(){

		if (isset($_GET['page']) && $_GET['page'] == "web_dorado_theme" && isset($_GET['controller']) && $_GET['controller'] == "seo_page" ) {
			
			if (isset($_REQUEST['action']) && $_REQUEST['action']  == 'save' ){
				
				foreach ( $this->options_SEO as $value ) {
					
					set_theme_mod( $value['id'], $_REQUEST[ $value['var_name'] ] ); 
					
				}
				
				foreach ($this->options_SEO as $value) {
					
					if( isset( $_REQUEST[ $value['var_name'] ] ) ) {
						
						 set_theme_mod( $value['id'], $_REQUEST[ $value['var_name'] ] ); 
						 
					} 
					else {
						
						 remove_theme_mod( $value['id'] ); 
						 
					} 
				}
				
				header("Location: themes.php?page=web_dorado_theme&controller=seo_page&saved=true");
				die;
				
			} 
			elseif( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ) {
				
				foreach ($this->options_SEO as $value) {
					
					remove_theme_mod( $value['id'] ); 
				}
				
					header("Location: themes.php?page=web_dorado_theme&controller=seo_page&reset=true");
					die;
				
			}
				
		}
			
	}
	public function update_SEO(){
		

    global $wp_query, $ID;


    foreach ($this->options_SEO as $value) {
		if(isset($value['id'])){
			
			if (get_theme_mod($value['id'],FALSE) === FALSE) {
				
				$$value['var_name'] = $value['std'];
				
			} else {
				
				$$value['var_name'] = get_theme_mod($value['id']);			
			}
			
		}

    }
	if (is_single() || is_page()){
		
		global $post;
		$value_title 		= stripslashes(get_post_meta( $post->ID, '_single_post_soe_title', true ));
		$value_description	= stripslashes(get_post_meta( $post->ID, '_single_post_soe_description',true));
		$value_keywords		= stripslashes(get_post_meta( $post->ID, '_single_post_soe_keywords',true));
		
		
	}

	//update titles 

    $sitename = stripslashes(html_entity_decode(get_bloginfo('name'), ENT_QUOTES));
    $site_description = stripslashes(html_entity_decode(get_bloginfo('description'), ENT_QUOTES));
	global $post;
	if(isset($post))
    $post_title = stripslashes(get_the_title($post->ID));

    
    if (is_home()) {
        if ($seo_home_title) {			
			echo "<title>" . stripslashes($seo_home_titletext) . "</title>";		
		}
        else {
			
            if ($seo_home_type == 'BlogName | Blog description') 
				echo "<title>" . $sitename . stripslashes($seo_home_separate) . $site_description . "</title>";
				
            if ($seo_home_type == 'Blog description | BlogName') 
				echo "<title>" . $site_description . stripslashes($seo_home_separate) . $sitename . "</title>";
				
            if ($seo_home_type == 'BlogName only') 
				echo "<title>" . $sitename . "</title>";
				
        }
    }
    if (is_single() || is_page()) {
	
        if ($value_title  != '' && $seo_single_title){
			 
			echo "<title>" .stripslashes($value_title) . "</title>";
			
		}
        else {

			if ($seo_single_type == 'BlogName | Post title') 
				echo "<title>" . $sitename. stripslashes($seo_single_separate) . $post_title . "</title>";
				
            if ($seo_single_type == 'Post title | BlogName') 
				echo "<title>" . $post_title . stripslashes($seo_single_separate) . $sitename. "</title>";
				
            if ($seo_single_type == 'Post title only') 
				echo "<title>" . $post_title . "</title>";
			
				
        }

    }
	
	   
	   if (is_category() || is_archive() || is_search()) {

		if ($seo_index_type == 'Category name | BlogName') 
			echo "<title>" . esc_attr(wp_title('', false, '')) . stripslashes($seo_index_separate) . $sitename . "</title>";
				
		if ($seo_index_type == 'BlogName | Category name') 
			echo "<title>" . $sitename . stripslashes($seo_index_separate) . esc_attr(wp_title('', false, '')). "</title>";
			
		if ($seo_index_type == 'Category name only') 
			echo "<title>" . esc_attr(wp_title('', false, '')) . "</title>";		
    }


	//update titles end 		

	//update site descripsions
    $description_added = false;  
    if (is_home() && $seo_home_description) 
		echo '<meta name="description" content="' . stripslashes($seo_home_descriptiontext) . '" />';
   	if (is_single() || is_page())	
    if ($value_description && $value_description  !== '' && $seo_single_description) {
		
         echo '<meta name="description" content="' . stripslashes( $value_description ) . '" />';
		 $description_added = true;
    }

    $cat = get_query_var( 'cat' );

  
		
   if (is_category()) {
		
     $exists2 = get_category($cat)->description;

    if ($exists2 !== '' && $seo_index_description) {
		  echo '<meta name="description" content="' . $exists2 . '" />';
		  $description_added = true;
		}  
    }
	
    if (is_archive() && $seo_index_description && !$description_added){ 
		echo '<meta name="description" content="Currently viewing archives from' . esc_attr(wp_title('', false, '')) . '" />';
		$description_added = true;
	}	
    if (is_search() && $seo_index_description && ! $description_added) {
		echo '<meta name="description" content="' . esc_attr(wp_title('', false, '')) . '" />';
        $description_added = true;
	}
	//update site descriptions end 	

	//update site keywords

    if (is_home() && $seo_home_keywords) 
		echo '<meta name="keywords" content="' . stripslashes($seo_home_keywordstext) . '" />';
	if (is_single() || is_page())
		if ($value_keywords !== '' && $seo_single_keywords) {
		
			echo '<meta name="keywords" content="' . stripslashes($value_keywords) . '" />';
		}
	//update site keywords end 		


		
		
	}


}
?>