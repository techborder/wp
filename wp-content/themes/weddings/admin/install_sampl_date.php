<?php

class weddings_sample_date{
	
	public function web_dorado_sample_data_admin_scripts(){
		
		wp_enqueue_script('jquery');	
		
	}


	public function weddings_install_posts(){
		
		if(isset($_GET['install_element']) && $_GET['install_element']=='inst')
		{
			$this->install_post_menu_pages();
		}
		if(isset($_GET['remove_element']) && $_GET['remove_element']=='rem'){		
			$this->remove_post_menu_pages();
			$this->remove_widgets();		
		}
		?>
		<script>
		count_of_installed=1;
		installeation=new Array();
			installeation[1]='Adding Page Our story';
			installeation[2]='Adding Page Bride';
			installeation[3]='Adding Page Party';
			installeation[4]='Adding Top Posts Category';
			installeation[5]='Adding Content Posts Category';
			installeation[6]='Adding Trip Posts Category';
			installeation[7]='Adding Post My Wedding Trip';
			installeation[8]='Adding Post My Wedding Party';
			installeation[9]='Adding Post My Wedding Ring';
			installeation[10]='Adding Post Our story';
			installeation[11]='Adding Post Welcome';
			installeation[12]='Adding Post Jessica Hopkins';
			installeation[13]='Adding Post Jane Smith';
			installeation[14]='Adding Post Sara Brown';
			installeation[15]='Adding Post Nick Brown';
			installeation[16]='Adding Post Trip';
			installeation[17]='Connecting Thumbnails to My Wedding Trip Post';
			installeation[18]='Connecting Thumbnails to My Wedding Party Post';
			installeation[19]='Connecting Thumbnails to My Wedding Ring Post';
			installeation[20]='Connecting Thumbnails to Our story post';
			installeation[21]='Connecting Thumbnails to Jessica Hopkins post';
			installeation[22]='Connecting Thumbnails to Jane Smith post';
			installeation[23]='Connecting Thumbnails to Sara Brown post';
			installeation[24]='Connecting Thumbnails to Nick Brown post';
			installeation[25]='Connecting Thumbnails to Trip post';
			installeation[26]='Adding Menu Wedding';
			installeation[27]='Adding Menu Item Home';
			installeation[28]='Adding Menu Item Our story';
			installeation[29]='Adding Menu Item Bride';
			installeation[30]='Adding Menu Item Party';
			installeation[31]='Adding Slider Options';
			installeation[32]='Adding Widget';
			installeation[33]='The data is installed';

			
			
		count_of_remov=1;
		key_installing=0;
		var installing=Array();
		installeation.forEach(function(value, index) {
			key_installing++;
			installing[key_installing]=index; 
		});		
	    removing=new Array();
			removing[1]='Remove Page Our story';
			removing[2]='Remove Page Bride';
			removing[3]='Remove Page Parent';
			removing[4]='Remove Top Posts Category';
			removing[5]='Remove Content Posts Category';
			removing[6]='Remove Trip Posts Category';
			removing[7]='Remove Post My Wedding Trip';
			removing[8]='Remove Post My Wedding Party';
			removing[9]='Remove Post My Wedding Ring';
			removing[10]='Remove Post Our story';
			removing[11]='Remove Post Welcome';
			removing[12]='Remove Post Jessica Hopkins';
			removing[13]='Remove Post Jane Smith';
			removing[14]='Remove Post Trip';
			removing[15]='Remove Post Sara Brown';
			removing[16]='Remove Post Nick Brown';
			removing[17]='Remove Menu';
			removing[18]='Remove Widgets';
			removing[19]='The data is removed';
			
			key_installing=0;
			var removing_array=Array();
			removing.forEach(function(value, index) {
				key_installing++;
				removing_array[key_installing]=index; 
			});	
			
			function add_install_text(install_text){
				var kent_or_zuyk=count_of_installed%2+1;
				new_element=jQuery('<div class="install_date'+kent_or_zuyk+'"><div  class="install_text">'+install_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
				jQuery('#installed_date_list').append(new_element);
				return new_element;
			}
			function add_remov_text(remov_text){
				var kent_or_zuyk=count_of_remov%2+1;
				new_element=jQuery('<div class="remove_date'+kent_or_zuyk+'"><div  class="remove_text">'+remov_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
				jQuery('#installed_date_list').append(new_element);
				return new_element;
			}
			function submit(remov_or_install,number_action){
				if(number_action==1){
					jQuery('#installed_date_list').html('');
					}
				if(remov_or_install=='install'){
					if(number_action==1){
						count_of_installed=1;
						if(!confirm("This action will install sample data for your theme.Are you sure to proceed?"))
					return;
					}
					element=add_install_text(installeation[count_of_installed]);
					image_complete=jQuery(element).find('img');
					result_div=jQuery(element).find('.result_div');
					jQuery.ajax({
					  url: "<?php echo  admin_url('admin-ajax.php'); ?>?action=install_sample_date&number_of_actoion="+number_action,
					  success: function(data){
						  if(data=='1'){
							image_complete.attr('src','<?php  echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  count_of_installed++;
						  if(count_of_installed!=(1+installeation.reduce(function(prev, curr) {
							  return typeof curr !== "undefined" ? prev+1 : prev;
							}, 0)))
							{
							 
						  	  submit('install',count_of_installed)
							   
						    }
					  }
					});
					return;
				}
				
				if(remov_or_install=='remove'){
					if(number_action==1){
						count_of_remov=1;	
					if(!confirm("This action will remove sample data. Are you sure to proceed?"))
						return;
					}
				    element=add_remov_text(removing[count_of_remov]);
					image_complete=jQuery(element).find('img');
					result_div=jQuery(element).find('.result_div');
					jQuery.ajax({
					  url: "<?php echo  admin_url('admin-ajax.php'); ?>?action=remove_sample_date&number_of_actoion="+number_action,
					  success: function(data){
						  if(data=='1'){
							image_complete.attr('src','<?php  echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  
						   count_of_remov++;
						 if(count_of_remov!=(1+removing.reduce(function(prev, curr) {
							  return typeof curr !== "undefined" ? prev+1 : prev;
							}, 0)))
							{
							 
						  	  submit('remove',count_of_remov)
						    }
					  }
					});
					return;

				}
				
				
			}
		
		
		</script>
		<style>
			.headin_class{
				-webkit-margin-before: 0px;
				-webkit-margin-after: 10px;
				margin-left:59px;
				font-family:Segoe UI;
				width:90%;padding-bottom: 15px;
				border-bottom: rgb(111, 111, 111) solid 2px;
				color: rgb(111, 111, 111);
				font-size:18pt;
				
			}
			#installed_date_list{
				margin-left:59px;
				width:90%;
			}
			#install_remove{
				background-color:#F1F1F1 ;
				margin:10px;
				width:90%;
				margin-left:59px;
				
			}
			#doaction{
				margin: 10px;
				margin-right:0px;
			}
			.install_text{
				color:rgb(111, 111, 111);
				font-family:Segoe UI;
				font-size:15pt;
				float:left;
			}
			.remove_text{
				color:rgb(111, 111, 111);
				font-family:Segoe UI;
				font-size:15pt;
				float:left;
			}
			.list_title{
				font-size:24px;
			}
			.image_load{
				width:16px;
				height:16px;				
			}
			.error_text{
				color: #991111;
				font-size: 15pt;
			}
			.notification_text{
				color: #115A8F;
				font-size: 15pt;
			}
			.install_date2{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#FFFFFF;
			}
			.install_date1{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#F8F8F8;
			}
			.remove_date2{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#FFFFFF;
			}
			.remove_date1{
				padding-top:10px;
				padding-bottom:10px;
				background-color:#F8F8F8;
			}
			.result_div{
	
			}
		</style>
		<?php global $weddings_web_dor; ?>
		<div id="main_install_page">

			<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 2px;">
			    <tr>   
                      <td style="font-size:14px; font-weight:bold">
					     <a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows to add sample data.
                         <a href="<?php echo esc_url($weddings_web_dor).'/wordpress-theme-options/3-9.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
					 </td>   
                      <td  align="right" style="font-size:16px;">
                           <a href="<?php echo esc_url($weddings_web_dor).'/wordpress-themes/wedding.html'; ?>" target="_blank" style="color:red; text-decoration:none;">
                              <img src="<?php echo get_template_directory_uri() ?>/images/header.png" border="0" alt="" width="215">
                           </a>
                        </td>
                </tr>
				<tr>
					<td>
						<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Install Sample Data</h3>
					</td>
				</tr>
			</table>
			
			
			
	
			<div id="install_remove">
				<input type="button" onclick="submit('install',1)" name="" id="doaction" class="button action" value="Install Sample Data">
				<input type="button" onclick="submit('remove',1)" name="" id="doaction" class="button action" value="Remove Sample Data">
			 </div>
			 <div id="installed_date_list">
				
			 </div>
			 <div style="clear:both"></div>
		 </div>
		<?php 	
		
		
		
	}
	public function install_ajax(){
		$action_number=$_GET['number_of_actoion'];
		switch($action_number){
			case 1:{
				
				$insert_page['spec_id']='1';
				
				$insert_page['title']='Our story';
				
				$insert_page['content']="<div class='simple-div'><img alt=\"\" src=\"".  get_template_directory_uri( 'template_url' )."/images/about-us.jpg\" style='float:left; margin: 0px 15px 5px 0px;width: 30%;'/><p style='text-align: left;'>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis.</p></div>";

				echo $this->install_page($insert_page);
				break;
			}	
			case 2:{		
			
				$insert_page['spec_id']='2';				
				$insert_page['title']='Bride';		
				$insert_page['content']='<div class="simple-div service"><img alt="" src="'.get_template_directory_uri( 'template_url' ).'/images/bride1.jpg" style="float:left;"/><ul>
   <h1><span>Sara</span> Brown</h1><br><i style="color: #A8A8A8;">Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</i><br><br><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. </p></ul></div>';	
		
				echo $this->install_page($insert_page);
				break;
			}			
			case 3:{		
			
				$insert_page['spec_id']='3';				
				$insert_page['title']='Party';				
				$insert_page['content']='<div class="simple-div partners"><div class="partners"><img src="'.get_template_directory_uri( 'template_url' ).'/images/gallery_1.jpg" ><img src="'.get_template_directory_uri( 'template_url' ).'/images/gallery_2.jpg" ><p style="padding-top: 13px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p><div class="clear"></div></div><div class="partners"><p style="padding-top: 13px;">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here", making it look like readable English. </p><div class="clear"></div></div><div class="partners"><img src="'.get_template_directory_uri( 'template_url' ).'/images/gallery_3.jpg"><p style="padding-top: 13px;">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p><div class="clear"></div></div></div>';
				echo $this->install_page($insert_page);
				break;
			}	
			case 4:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Top posts', 
					  'category_description' => 'Category for Top Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 5:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Content posts', 
					  'category_description' => 'Category for Content Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 6:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Trip posts', 
					  'category_description' => 'Category for Trip Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 7:{					
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Trip';				
				$insert_post['content']="<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";								
				$insert_post['category']=4;				
				echo $this->install_post($insert_post);
				break;
			}
			case 8:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Party';				
				$insert_post['content']="<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";				
				$insert_post['category']=4;				
				echo $this->install_post($insert_post);
				break;
			}
			
			case 9:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Ring';				
				$insert_post['content']=" <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";				
				$insert_post['category']=4;				
				echo $this->install_post($insert_post);
				break;
			}
			case 10:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Our story';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. ";			
				echo $this->install_post($insert_post);
				break;
			}
			case 11:{		
			 ///content post
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Welcome';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>";		
				
				$insert_post['category']=5;				
				echo $this->install_post($insert_post);
				break;
			}
			case 12:{
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Jessica Hopkins';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available in some form, by injected humour, or randomised words which dont look even slightly believable. ";$insert_post['category']=6;				
				echo $this->install_post($insert_post);
				break;
			}
			case 13:{
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Jane Smith';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available in some form, by injected humour, or randomised words which dont look even slightly believable. ";$insert_post['category']=6;				
				echo $this->install_post($insert_post);
				break;
			}
			case 14:{
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Nick Brown';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available in some form, by injected humour, or randomised words which dont look even slightly believable. ";$insert_post['category']=6;				
				echo $this->install_post($insert_post);
				break;
			}
			case 15:{
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Sara Brown';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available in some form, by injected humour, or randomised words which dont look even slightly believable. ";$insert_post['category']=6;				
				echo $this->install_post($insert_post);
				break;
			}
			case 16:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='About us';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available in some form, by injected humour, or randomised words which dont look even slightly believable.";$insert_post['category']=6;				
				echo $this->install_post($insert_post);
				break;
			}
			case 17:
			case 18:
			case 19:{		
				// insert top post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='top_'.(int)($action_number%3+1).'.jpg';
				$params['post_id']=$action_number-10;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 20:{	
                // insert Our story post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='about_us.png';
				$params['post_id']=10;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 21:
			case 22:
			case 23:
			case 24:
			case 25:{	
                // insert Our story post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='s_'.(int)($action_number%5+1).'.jpg';
				$params['post_id']=$action_number-9;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 26:{		
				$menu_pamas['spec_id']=26;
				$menu_pamas['name']='Wedding';
				$menu_pamas['description']='Menu for Custom Pages';							
				echo $this->install_menu($menu_pamas);
				break;
			}
			case 27:{		
				$params['spec_id']=27;
				$params['menu_title']='Home';
				$params['menu_id']='26';
				$params['menu_url']=esc_url(get_home_url());		
				echo $this->install_menu_item($params);
				break;
			}
			case 28:{		
				$params['spec_id']=28;
				$params['page_id']='1';
				$params['menu_id']='26';
				$params['menu_title']='Our story';		
				echo $this->install_menu_item($params);
				break;
			}
			case 29:{		
				$params['spec_id']=29;
				$params['page_id']='2';
				$params['menu_id']='26';
				$params['menu_title']='Bride';		
				echo $this->install_menu_item($params);
				break;
			}
			case 30:{		
				$params['spec_id']=30;
				$params['page_id']='3';
				$params['menu_id']='26';
				$params['menu_title']='Party';		
				echo $this->install_menu_item($params);
				break;
			}			
			case 31:{
				$inserted_install=get_theme_mod('weddings_install_posts','');
				global $weddings_home_page,$weddings_general_settings_page;
				
				$weddings_home_page->update_parametr('top_post_categories',$inserted_install['4'].',');
				$weddings_home_page->update_parametr('hide_top_posts','');
				$weddings_home_page->update_parametr('hide_about_us','');
				$weddings_home_page->update_parametr('home_abaut_us_post','');
				$weddings_home_page->update_parametr('content_post_categories',$inserted_install['4'].','.$inserted_install['5'].','.$inserted_install['10'].',');
				$weddings_home_page->update_parametr('home_abaut_us_post',$inserted_install['11']);
				$weddings_general_settings_page->update_parametr('grab_image','');
				$weddings_general_settings_page->update_parametr('blog_style','');
				$weddings_home_page->update_parametr('n_of_home_post','6');	
				$weddings_home_page->update_parametr('n_of_testimonials','4');
				$weddings_home_page->update_parametr('content_post_cats',$inserted_install['6'].','.$inserted_install['10'].',');
				$weddings_home_page->update_parametr('content_post',$inserted_install['5'].',');
				$weddings_home_page->update_parametr('cat_name','Testimonials');
				$weddings_home_page->update_parametr('categories_name','My Wedding Gallery');
				
				/// insert slider params
				
				$image_link=get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_1.jpg';
				set_theme_mod('web_busines_image_link',$image_link);
				
				$image_textarea='<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>';
				set_theme_mod('web_busines_image_textarea',$image_textarea);
				echo 1;
				break;
				
				
			}
			case 32:{				
				echo $this->install_widgets();		
				break;		
			}
			
		}
		die();
		
	}
	
	public function remove_ajax(){
		$action_number=$_GET['number_of_actoion'];
		switch($action_number){
			case 1:{
				$params['spec_id']=1;
				echo $this->remove_page_post($params);
				break;
			}
			case 2:{
				$params['spec_id']=2;
				echo $this->remove_page_post($params);
				break;
			}
			case 3:{
				$params['spec_id']=3;
				echo $this->remove_page_post($params);
				break;
			}
			case 4:
			case 5:
			case 6:{
				$params['spec_id']=$action_number;
				echo $this->remove_category($params);
				break;
			}
			case 7:
			case 8:
			case 9:
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:
			case 15:
			case 16:{
				$params['spec_id']=$action_number;
				echo $this->remove_page_post($params);
				break;
			}
			case 17:
			{		
				
				$params['spec_id']=26;
				$params['menu_item'][0]=27;
				$params['menu_item'][1]=28;
				$params['menu_item'][2]=29;
				$params['menu_item'][3]=30;
				echo $this->remove_menu($params);
				break;
			}
			case 18:{	
                $inserted_install=get_theme_mod('weddings_install_posts','');
				if(isset($inserted_install['5']))
					remove_theme_mod( 'top_cat' . $inserted_install['5']);
				if(isset($inserted_install['6']))
					remove_theme_mod( 'content_cat' .$inserted_install['6']);                 				
				echo $this->remove_widgets();	
				break;			
			}
		}
		die();
	}
	
	private function remove_page_post($params){
		$inserted_install=get_theme_mod('weddings_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_post( $inserted_install[$params['spec_id']], true );
			if($sucsses){
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('weddings_install_posts',$inserted_install);
				return 1;	
			}
			else
			{
				if(get_post($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
					unset($inserted_install[$params['spec_id']]);
					set_theme_mod('weddings_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_category($params){
			$inserted_install=get_theme_mod('weddings_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_category( $inserted_install[$params['spec_id']]);
			if($sucsses){
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('weddings_install_posts',$inserted_install);
				return 1;	
			}
			else
			{
				if(get_category($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
					unset($inserted_install[$params['spec_id']]);
					set_theme_mod('weddings_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_menu($params){
	
		$inserted_install=get_theme_mod('weddings_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_nav_menu( $inserted_install[$params['spec_id']]);
			if($sucsses){
				
				foreach($params['menu_item'] as $menu_item){
					if(isset( $inserted_install[$menu_item]))
						unset($inserted_install[$menu_item]);
				}
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('weddings_install_posts',$inserted_install);
				return 1;	
			}
			else
			{ 
				if(wp_get_nav_menu_items($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
					unset($inserted_install[$params['spec_id']]);
					foreach($params['menu_item'] as $menu_item){
						if(isset( $inserted_install[$menu_item]))
							unset($inserted_install[$menu_item]);
					}
					set_theme_mod('weddings_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else{
			return '<div class="notification_text">Not Found</div>';
		}
		
		
	}
	
	private function exsist_in_base($list,$spec_id){
		$exsist=0;
		if($list!='')
			{
				foreach($list as $key=>$value)
				{
					if($key==$spec_id)
						$exsist=1;
				}
			}
		if($exsist)
			{
				return true;
			}
			return false;
		
	}

 
	private function install_category($category_params){
		
		$inserted_install=get_theme_mod('weddings_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$category_params['spec_id']);
		if($exsist){
			$catt=get_category((int)$inserted_install[$category_params['spec_id']]);
			if($catt)
				return '<div class="notification_text">Already exists.</div>';
		}
		$cat_id=wp_insert_category($category_params['param']);
		
		if($cat_id){	
			$inserted_install[$category_params['spec_id']]=$cat_id;
			set_theme_mod('weddings_install_posts',$inserted_install);
			return 1;
		}
		else	{
			$category_params['param']['cat_name']=$category_params['param']['cat_name'].date("H:i:s"); 
			$cat_id=wp_insert_category($category_params['param']);	
			if($cat_id){	
				$inserted_install[$category_params['spec_id']]=$cat_id;
				set_theme_mod('weddings_install_posts',$inserted_install);
				return 1;
			}	
			else
				return '<div class="error_text">Error inserting category.</div>';
		}
				
	}
	
	private function conect_post_thumbnail($params){
		
		
		$inserted_post_pages=get_theme_mod('weddings_install_posts','');
		$exsist=$this->exsist_in_base($inserted_post_pages,$params['spec_id']);
		if($exsist)
		{
			if(wp_get_attachment_image($inserted_post_pages[$params['spec_id']]))
			{
				if(get_post( $inserted_post_pages[$params['post_id']]))
				{
					if(get_post_thumbnail_id($inserted_post_pages[$params['post_id']]))
						return '<div class="notification_text">Already exists.</div>';
					else{
						set_post_thumbnail( $inserted_post_pages[$params['post_id']], $inserted_post_pages[$params['spec_id']] );
						return 1;
					}
						
				}
				else
				{
					return '<div class="notification_text">Post does not exist.</div>';
				}
			}
				
		}
			
		$upload_dir = wp_upload_dir();		
		$image_url=get_template_directory_uri().'/images/'.$params['image_name'];
		$image_data = wp_remote_get($image_url);
		$image_data=$image_data['body'];
		$filename = basename($image_url);
		
		if(wp_mkdir_p($upload_dir['path']))
			$file = $upload_dir['path'] . '/' . $filename;
		else
			$file = $upload_dir['basedir'] . '/' . $filename;
			
		if ( ! WP_Filesystem() ) {
			request_filesystem_credentials($url, '', true, false, null);
			return;
		}
		global $wp_filesystem;
		$wp_filesystem->put_contents($file, $image_data);
		$wp_filetype = wp_check_filetype($filename, null );
		$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
		);
		
		$attach_id = wp_insert_attachment( $attachment, $file,$params['post_id']);
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file);
		
		wp_update_attachment_metadata( $attach_id, $attach_data );	
		if(isset($inserted_post_pages[$params['post_id']]))  {
			
			set_post_thumbnail( $inserted_post_pages[$params['post_id']], $attach_id );
			$inserted_post_pages[$params['spec_id']]=$attach_id;
			set_theme_mod('web_buisnes_install_posts',$inserted_post_pages);
			
		}
		else
		{
			return '<div class="notification_text">post does not exist.</div>';
		}
	return 1;
	}
	
	
	
	private function install_menu($params){
		
		$inserted_install=get_theme_mod('weddings_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$params['spec_id']);
		if($exsist){
			return '<div class="notification_text">Already exists.</div>';
		}
			
		$weddings_menu = array(
			  'cat_name'             => $params['name'], 
			  'category_description' => $params['description'], 
			  'category_nicename'    => '', 
			  'category_parent'      => '',
			  'taxonomy'             => 'nav_menu',
			  'count' 				 => '10'
			);
		
			// Create the menu for custom pages
			$weddings_menu_id = wp_insert_category($weddings_menu);
			if($weddings_menu_id)
			{
				$inserted_install[$params['spec_id']]=$weddings_menu_id;
				set_theme_mod('weddings_install_posts',$inserted_install);			
				$change_selected_dur_menu=get_option('theme_mods_weddings');
	    		$change_selected_dur_menu['nav_menu_locations']['primary-menu']=$weddings_menu_id;
				update_option('theme_mods_weddings',$change_selected_dur_menu);
				return 1;
				
			}
			else
			{
				return '<div class="error_text">error install. menu cannot be created</div>';
			}
		
		
	}
	
	private function install_menu_item($params){
		$inserted_install=get_theme_mod('weddings_install_posts','');

		if(isset($inserted_install[$params['menu_id']]))
			$menu_id=$inserted_install[$params['menu_id']];
		else
			return '<div class="error_text">Menu not found</div>';
			
		$parent=0;
		
		//element isset in base?
		$exsist=$this->exsist_in_base($inserted_install,$params['spec_id']);
		if($exsist){			
			return '<div class="notification_text">Already exists.</div>';
		}
		
		
		/// if element is children
		if(isset($params['parent_of'])){
		
		$parent=$inserted_install[$params['parent_of']];
		
		}
		$page_id=0;
		
		$menu_item_url='';
		if(isset($params['menu_url']))
			$menu_item_url=$params['menu_url'];
		if(isset($inserted_install[$params['page_id']]))
			$page_id=$inserted_install[$params['page_id']];
			$type='page';
			$type='';
			$item_type='';
			if($page_id){
				
			
		$menu_item_id=wp_update_nav_menu_item($menu_id, 0, array('menu-item-title' => $params['menu_title'],
							   'menu-item-object' =>'page',
							   'menu-item-object-id' =>$page_id ,
							   'menu-item-type' => 'post_type',
							   'menu-item-parent-id' =>$parent,
							   'menu-item-status' => 'publish'));
		}
		if($menu_item_url)	{
			
		$menu_item_id=wp_update_nav_menu_item($menu_id, 0,array(
        'menu-item-title' =>  __('Home','weddings'),
        'menu-item-classes' => 'home',
        'menu-item-url' => esc_url(home_url( '/' )), 
        'menu-item-status' => 'publish'));
		
		
		}
							   
		if($menu_item_id)	{   
		$inserted_install[$params['spec_id']]=$menu_item_id;
		set_theme_mod('weddings_install_posts',$inserted_install);
		return 1;
		}
		else
		{
			return '<div class="error_text">Error adding menu item </div>';
		}
							   
	}
		////////////////////// install page
		
		
		
		
		
		
		private function install_page($insert_page){
			
			global $wpdb;
			$inserted_post_pages=get_theme_mod('weddings_install_posts','');
			if($inserted_post_pages!='' && !is_array($inserted_post_pages)){
				$inserted_post_pages='';
				set_theme_mod('weddings_install_posts','');
			}
			$page_exsist=0; // if this page alredy instaled
			
			// chech if page in alredy indtalled
			if($inserted_post_pages!='')
			{
				foreach($inserted_post_pages as $key=>$inserted_post_page)
				{
					if($key==$insert_page['spec_id'])
						$page_exsist=1;
				}
			}
			
			// return if instaled
			if($page_exsist)
			{
				if(get_post( $inserted_post_pages[$insert_page['spec_id']])){
					return '<div class="notification_text">Already exists.</div>';
				}
			}
			$page_parent=0;
			// page 
			if(isset($insert_page['parent_of'])){
				if(!isset($inserted_post_pages[$insert_page['parent_of']])){
					return '<div class="error_text">Parent page does not exist.</div>';	
				}
				else
					$page_parent=$inserted_post_pages[$insert_page['parent_of']];
			}
			
			// set page
			$page=array(
				  'ID'             => NULL, //Are you updating an existing post?
				  'menu_order'     =>$page_parent, //If new post is a page, it sets the order in which it should appear in the tabs.
				  'comment_status' => 'open', // 'closed' means no comments.
				  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
				  'pinged'         => '', //?
				  'post_author'    => get_current_user_id( ),
				  'post_category'  => array('category-slug'),
				  'post_content'   => $insert_page['content'],
				  'post_date'      => date('Y-m-d H:i:s'),
				  'post_date_gmt'  => date('Y-m-d H:i:s'),
				  'post_excerpt'   => '',
				  'post_name'      => $insert_page['title'] ,
				  'post_parent'    => $page_parent,
				  'post_password'  => '',
				  'post_status'    => 'publish',
				  'post_title'     => $insert_page['title'],
				  'post_type'      => 'page', //You may want to insert a regular post, page, link, a menu item or some custom post type
				  'to_ping'        => '',			
				);
				
				
				// create page
				$page_id=wp_insert_post($page);
				
				// when page sucssesfuly instaled
				if(is_numeric($page_id)){
					$value_inserted=1;
					
					/// set page type meta parmaters
						if(isset($insert_page['meta'])){
							
							$value_inserted=$wpdb->insert($wpdb->prefix.'postmeta', array(
																						'post_id'	      => $page_id,
																						'meta_key'        => $insert_page['meta']['meta_key'],
																						'meta_value'      => $insert_page['meta']['meta_value'],        
																							),
																					array(
																						'%d',
																						'%s',
																						'%s',
																					));
												
												
						}
						
						// set  custom meta params in page
						if(isset($insert_page['custom_meta'])){
							
							foreach($insert_page['custom_meta'] as $key=>$value)
								$met[$key]=$value;
								
							add_post_meta($page_id,'_weddings_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_page['spec_id']]=$page_id;
					set_theme_mod('weddings_install_posts',$inserted_post_pages);
					
					if($value_inserted)
						return 1;
					else
						return '<div class="error_text">Error adding page metadata.</div>';	
				}
				else
				{
					return '<div class="error_text">Error creating page.</div>';
				}
	}
	
	
	
	
	private function install_post($insert_post){
			
			global $wpdb;
			$inserted_post_pages=get_theme_mod('weddings_install_posts','');			
			$category='';
			
			// chech if page in alredy indtalled
			
			if($this->exsist_in_base($inserted_post_pages,$insert_post['spec_id']))
			{
				if(get_post( $inserted_post_pages[$insert_post['spec_id']]))
					return '<div class="notification_text">Already exists.</div>';
			}
			
			if(isset($insert_post['category'])){
				if(isset($inserted_post_pages[$insert_post['category']]))
					$category=$inserted_post_pages[$insert_post['category']];
				else
					$category=0;
				if(!$category){
						return '<div class="error_text">Post category not found</div>';
				}
			}
			
			$post_parent=0;
			// page 
			if(isset($insert_post['parent_of'])){
				if(!isset($inserted_post_pages[$insert_post['parent_of']])){
					return '<div class="error_text">Post category not found.</div>';	
				}
				else
					$post_parent=$inserted_post_pages[$insert_post['parent_of']];
			}
			
			// set page
			$post=array(
				  'ID'             => NULL, //Are you updating an existing post?
				  'menu_order'     => $insert_post['spec_id'], //If new post is a page, it sets the order in which it should appear in the tabs.
				  'comment_status' => 'open', // 'closed' means no comments.
				  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
				  'pinged'         => '', //?
				  'post_author'    => get_current_user_id( ),
				  'post_category'  => array($category),
				  'post_content'   => $insert_post['content'],
				  'post_date'      => date('Y-m-d H:i:s'),
				  'post_date_gmt'  => date('Y-m-d H:i:s'),
				  'post_excerpt'   => '',
				  'post_name'      => $insert_post['title'] ,
				  'post_parent'    => $post_parent,
				  'post_password'  => '',
				  'post_status'    => 'publish',
				  'post_title'     => $insert_post['title'],
				  'post_type'      => 'post', //You may want to insert a regular post, page, link, a menu item or some custom post type
				  'to_ping'        => '',			
				);
				
				
				// create page
				$post_id=wp_insert_post($post);
				
				// when page sucssesfuly instaled
				if(is_numeric($post_id)){
					$value_inserted=1;
					
					/// set page type meta parmaters
						if(isset($insert_page['meta'])){
							
							$value_inserted=$wpdb->insert($wpdb->prefix.'postmeta', array(
								'post_id'	      => $post_id,
								'meta_key'        => $insert_post['meta']['meta_key'],
								'meta_value'      => $insert_post['meta']['meta_value'],        
									),
								array(
									'%d',
									'%s',
									'%s',
							));
												
												
						}
						
						// set  custom meta params in page
						if(isset($insert_post['custom_meta'])){
							
							foreach($insert_post['custom_meta'] as $key=>$value)
								$met[$key]=$value;
								
							add_post_meta($page_id,'_weddings_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_post['spec_id']]=$post_id;
					set_theme_mod('weddings_install_posts',$inserted_post_pages);
					
					if($value_inserted)
						return 1;
					else
						return '<div class="error_text"Error adding post metadata.</div>';	
				}
				else
				{
					return '<div class="error_text">Error creating post.</div>';
				}
	}
	
	
	
	public function install_widgets(){
		$widget_web_buis_adsens=get_option('widget_web_buis_adsens');
		$widget_recent_posts=get_option('widget_recent-posts');
		if(isset($widget_web_buis_adsens[2000]))
			return '<div class="notification_text">Already exists.</div>';
						
		$widget_web_buis_adsens[2000]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';	
		
		if(isset($widget_web_buis_adsens[2001]))
			return '<div class="notification_text">Already exists.</div>';
							
		$widget_web_buis_adsens[2001]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';	
		
		if(isset($widget_web_buis_adsens[2002]))
			return '<div class="notification_text">Already exists.</div>';
						
		$widget_web_buis_adsens[2002]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';		
		update_option('widget_web_buis_adsens',$widget_web_buis_adsens);
		
		if(isset($widget_weddings_social[2005]))
			return '<div class="notification_text">Already exists.</div>';		
			
		$widget_weddings_social[2005]['title']='Subscribe';		
		$widget_weddings_social[2005]['show_facebook_icon']='on';
		$widget_weddings_social[2005]['show_twitter_icon']='on';
		$widget_weddings_social[2005]['facebook_url']='facebook';
		$widget_weddings_social[2005]['twitter_url']='twitter';
		$widget_weddings_social[2005]['show_rss_icon']='on';
		$widget_weddings_social[2005]['show_google_icon']='on';		
		$widget_weddings_social[2005]['rss_url']='rss';
		$widget_weddings_social[2005]['google_url']='google';
		$widget_weddings_social[2005]['show_inst_icon']='on';
		$widget_weddings_social[2005]['show_youtube_icon']='on';
		$widget_weddings_social[2005]['inst_url']='inst';
		$widget_weddings_social[2005]['youtube_url']='youtube';
	
		update_option('widget_weddings_social',$widget_weddings_social);
		
		if(isset($widget_recent_posts[2006]))
			return '<div class="notification_text">Already exists.</div>';
		
		$widget_recent_posts[2006]['title']='History';
		$widget_recent_posts[2006]['number']='10';
		$widget_recent_posts[2006]['show_date']='0';
		
		update_option('widget_recent-posts',$widget_recent_posts);
		
		$sidbar_text_add=wp_get_sidebars_widgets();	
		
		$sidbar_text_add['first-footer-widget-area'][2000]='web_buis_adsens-2000';
		$sidbar_text_add['first-footer-widget-area'][2001]='web_buis_adsens-2001';
		$sidbar_text_add['first-footer-widget-area'][2002]='web_buis_adsens-2002';		
		$sidbar_text_add['sidebar-1'][2005]='weddings_social-2005';
		$sidbar_text_add['primary-widget-area'][2006]='recent-posts-2006';
		
		update_option( 'sidebars_widgets', $sidbar_text_add);
		return 1;
	}
	
	
	public function remove_widgets(){
		///// remove widgets
		$widget_web_buis_adsens=get_option('widget_web_buis_adsens');
		$widget_text=get_option('widget_text');
		$widget_recent_posts=get_option('widget_recent-posts');
		
		if(!isset($widget_web_buis_adsens[2000]) || !isset($widget_web_buis_adsens[2001]) || !isset($widget_web_buis_adsens[2002])   || !isset($widget_weddings_social[2005]))
			return '<div class="notification_text">Not Found</div>';
			
		unset($widget_web_buis_adsens[2000]);
		unset($widget_web_buis_adsens[2001]);
		unset($widget_web_buis_adsens[2002]);		
		unset($widget_weddings_social[2005]);
        unset($widget_recent_posts[2006]);
		
		update_option('widget_text',$widget_text);
		update_option('widget_web_buis_adsens',$widget_web_buis_adsens);
		update_option('widget_recent-posts',$widget_recent_posts);

		
		$widget_weddings_social=get_option('widget_weddings_social');
		if(!isset($widget_weddings_social[2005]))
			return '<div class="notification_text">Not Found</div>';
		unset($widget_weddings_social[2005]);
		
		update_option('widget_weddings_social',$widget_weddings_social);
		
		$sidbar_text_add=wp_get_sidebars_widgets();	
		
		
		unset($sidbar_text_add['first-footer-widget-area'][2000]);
		unset($sidbar_text_add['first-footer-widget-area'][2001]);
		unset($sidbar_text_add['first-footer-widget-area'][2002]);				
		unset($sidbar_text_add['sidebar-1'][2005]);
		unset($sidbar_text_add['primary-widget-area'][2006]);
		update_option( 'sidebars_widgets', $sidbar_text_add );
		return 1;		
	}
}


 ?>