<?php

class wedding_sample_date{
	
	public function web_dorado_sample_data_admin_scripts(){
		
		wp_enqueue_script('jquery');	
		
	}


	public function wedding_install_posts(){
		
		if(isset($_GET['install_element']) && $_GET['install_element']=='inst')
		{
			$this->install_post_menu_pages();
			//$this->install_widgets();		
		}
		if(isset($_GET['remove_element']) && $_GET['remove_element']=='rem'){		
			$this->remove_post_menu_pages();
			$this->remove_widgets();		
		}
		?>
		<script>
		count_of_installed=1;
		installeation=new Array();
			installeation[1]='Adding Page Our Story';
			installeation[2]='Adding Page Bride';
			installeation[3]='Adding Page Blog';
			installeation[4]='Adding Page Search';
			installeation[5]='Adding Page Others';
			installeation[6]='Adding Page Gallery';
			installeation[7]='Adding Page Log In';
			installeation[8]='Adding Page Sitemap';
			installeation[9]='Adding Page Contact Us';
			installeation[10]='Adding Gallery Posts Category';
			installeation[11]='Adding Blog Posts Category';
			installeation[12]='Adding Search Posts Category';
			installeation[13]='Adding Top Posts Category';
			installeation[14]='Adding Bride Category';
			installeation[15]='Adding About Us Category';
			installeation[16]='Adding Content Posts Category';	
			installeation[17]='Adding Post My Wedding Party';
			installeation[18]='Adding Post My Wedding Trip';
			installeation[19]='Adding Post My Wedding Ring';
			installeation[20]='Adding Post About Us';
			installeation[21]='Adding Post Bride';
			installeation[22]='Adding Post Morbi in sem quis dui.1';
			installeation[23]='Adding Post Morbi in sem quis dui.2';
			installeation[24]='Adding Post Jane Smith';
			installeation[25]='Adding Post Jessica Hopkins';
			installeation[26]='Adding Post Nick Brown';
			installeation[27]='Adding Post Sara Brown';
			installeation[28]='Adding Post Maya kalpa1';
			installeation[29]='Adding Post Maya kalpa2';
			installeation[30]='Adding Post Maya kalpa3';
			installeation[31]='Adding Post Maya kalpa4';
			installeation[32]='Adding Post Maya kalpa5';
			installeation[33]='Adding Post Maya kalpa6';
			installeation[34]='Adding Post Lorem ipsum is simply1';
			installeation[35]='Adding Post Lorem ipsum is simply2';
			installeation[36]='Adding Post Lorem ipsum is simply3';
			installeation[37]='Adding Post Lorem ipsum is simply4';
			installeation[38]='Adding Post Lorem ipsum is simply5';
			installeation[39]='Adding Post Lorem ipsum is simply6';
			installeation[40]='Adding Post BRIDE1';
			installeation[41]='Adding Post BRIDE2';
			installeation[42]='Adding Post BRIDE3';
			installeation[43]='Connecting Thumbnails to Search Post';
			installeation[44]='Connecting Thumbnails to Bride Post';
			installeation[45]='Connecting Thumbnails to My Wedding Party Post';
			installeation[46]='Connecting Thumbnails to My Wedding Trip Post';
			installeation[47]='Connecting Thumbnails to Accountant Post';
			installeation[48]='Connecting Thumbnails to My Wedding Ring Post';
			installeation[49]='Connecting Thumbnails to About Us Post';
			installeation[50]='Connecting Thumbnails to Gallery Post1';
			installeation[51]='Connecting Thumbnails to Gallery Post2';
			installeation[52]='Connecting Thumbnails to Gallery Post3';
			installeation[53]='Connecting Thumbnails to Gallery Post4';
			installeation[54]='Connecting Thumbnails to Gallery Post5';
			installeation[55]='Connecting Thumbnails to Gallery Post6';
			installeation[56]='Connecting Thumbnails to Blog post 1';
			installeation[57]='Connecting Thumbnails to Blog post 2';
			installeation[58]='Connecting Thumbnails to Search post 1';
			installeation[59]='Connecting Thumbnails to Search post 2';
			installeation[60]='Connecting Thumbnails to Search post 3';
			installeation[61]='Connecting Thumbnails to Search post 4';
			installeation[62]='Connecting Thumbnails to Search post 5';
			installeation[63]='Connecting Thumbnails to Search post 6';
			installeation[64]='Connecting Thumbnails to Bride post 1';
			installeation[65]='Connecting Thumbnails to Bride post 2';
			installeation[66]='Connecting Thumbnails to Bride post 3';
			installeation[67]='Connecting Thumbnails to About Us post';
			installeation[68]='Adding Metadata for About Us,Gallery,Partner,Blog and Bride Pages';
			installeation[69]='Adding Menu Wedding';
			installeation[70]='Adding Menu Item Home';
			installeation[71]='Adding Menu Item Our Story';
			installeation[72]='Adding Menu Item Bride';
			installeation[73]='Adding Menu Item Blog';
			installeation[74]='Adding Menu Item Search';		
			installeation[75]='Adding Menu Item Others';
			installeation[76]='Adding Menu Item Gallery';
			installeation[77]='Adding Menu Item Log In';
			installeation[78]='Adding Menu Item Sitemap';
			installeation[79]='Adding Menu Item Contact Us';
			installeation[80]='Adding Slider Options';
			installeation[81]='Adding Widget';
			installeation[82]='The data is installed';

			
			
		count_of_remov=1;	
	    removing=new Array();
			removing[1]='Remove Page Our Story';
			removing[2]='Remove Page Bride';
			removing[3]='Remove Page Blog';
			removing[4]='Remove Page Search';
			removing[5]='Remove Page Others';
			removing[6]='Remove Page Gallery';
			removing[7]='Remove Page Log In';
			removing[8]='Remove Page Sitemap';
			removing[9]='Remove Page Contact Us';
			removing[10]='Remove Gallery Posts Category';
			removing[11]='Remove Blog Posts Category';
			removing[12]='Remove Search Posts Category';
			removing[13]='Remove Top Posts Category';
			removing[14]='Remove Bride Posts Category';
			removing[15]='Remove About Us Posts Category';
			removing[16]='Remove Content Posts Category';
			removing[17]='Remove Post My Wedding Party';
			removing[18]='Remove Post My Wedding Trip';
			removing[19]='Remove Post My Wedding Ring';
			removing[20]='Remove Post About Us';
			removing[21]='Remove Post Bride';
			removing[22]='Remove Post Morbi in sem quis dui.1';
			removing[23]='Remove Post Morbi in sem quis dui.2';
			removing[24]='Remove Post Jane Smith';
			removing[25]='Remove Post Jessica Hopkins';
			removing[26]='Remove Post Nick Brown';
			removing[27]='Remove Post Sara Brown';
			removing[28]='Remove post Maya kalpa1';
			removing[29]='Remove Post Maya kalpa2';
			removing[30]='Remove Post Maya kalpa3';
			removing[31]='Remove Post Maya kalpa4';
			removing[32]='Remove Post Maya kalpa5';
			removing[33]='Remove Post Maya kalpa6';
			removing[34]='Remove Post Lorem ipsum is simply1';
			removing[35]='Remove Post Lorem ipsum is simply2';
			removing[36]='Remove Post Lorem ipsum is simply3';
			removing[37]='Remove Post Lorem ipsum is simply4';
			removing[38]='Remove Post Lorem ipsum is simply5';
			removing[39]='Remove Post Lorem ipsum is simply6';
			removing[40]='Remove Post BRIDE1';
			removing[41]='Remove Post BRIDE2';
			removing[42]='Remove Post BRIDE3';
			removing[43]='Remove Menu';
			removing[44]='Remove Widgets';
			removing[45]='The data is removed';
				
			
			function add_install_text(install_text){
				var kent_or_zuyk=count_of_installed%2+1;
				new_element=jQuery('<div class="install_date'+kent_or_zuyk+'"><div  class="install_text">'+install_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
				jQuery('#installed_date_list').append(new_element);
				return new_element;
			}
			function add_remov_text(remov_text){
				var kent_or_zuyk=count_of_remov%2+1;
				new_element=jQuery('<div class="remove_date'+kent_or_zuyk+'"><div  class="remove_text">'+remov_text+'&nbsp;&nbsp;&nbsp;&nbsp; </div><div class="result_div"><img class="image_load" src="<?php echo get_template_directory_uri('template_url'); ?>/images/loading.gif" /></div></div>');
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
							image_complete.attr('src','<?php echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  count_of_installed++;
						  if(count_of_installed!=installeation.length){
							 
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
							image_complete.attr('src','<?php echo get_template_directory_uri('template_url'); ?>/images/sucsess.png');
						  }
						  else
						  {
							  result_div.html(data);
						  }	  
						  
						   count_of_remov++;
						  if(count_of_remov!=removing.length){
							 
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
		<?php global $web_dor; ?>
		<div id="main_install_page">

			<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 2px;">
				<tr>
					<td>
						<h3 style="border-bottom:0 !important;margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Install Sample Data</h3>
					</td>
					<td style="padding-left: 10px;width: 340px;font-size:14px; font-weight:bold">
					     <a href="<?php echo $web_dor.'/wordpress-themes-guide-step-1.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">User Manual</a><br />This section allows to add sample data.
                         <a href="<?php echo $web_dor.'/wordpress-theme-options/3-9.html'; ?>" target="_blank" style="color:#126094; text-decoration:none;">More...</a>
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
				$insert_page['title']='Our Story';				
				$insert_page['content']="
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui.</p>";
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-about-us.php';				
				$insert_page['custom_meta']['blog_perpage']='4';
				echo $this->install_page($insert_page);
				break;
			}	
			case 2:{		
				$insert_page['spec_id']='2';				
				$insert_page['title']='Bride';		
				$insert_page['content']="<p style='text-align: left;'>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>";	
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-bride.php';
				$insert_page['custom_meta']['blog_perpage']='3';				
				echo $this->install_page($insert_page);
				break;
			}	
			case 3:{		

				$insert_page['spec_id']='3';				
				$insert_page['title']='Blog';				
				$insert_page['content']="";				
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-blog.php'; 
                $insert_page['custom_meta']['blog_perpage']='2';
				echo $this->install_page($insert_page);
				break;
			}	
			
			case 4:{		
			
				$insert_page['spec_id']='4';				
				$insert_page['title']='Search';				
				$insert_page['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>";				
				
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-search.php';   				
				$insert_page['custom_meta']['gallery_perpage']='6';				
				echo $this->install_page($insert_page);
				break;
			}	
			case 5:{		
			
				$insert_page['spec_id']='5';				
				$insert_page['title']='Others';				
				$insert_page['content']="";
				echo $this->install_page($insert_page);
				break;
			}	
			case 6:{		
			
				$insert_page['spec_id']='6';				
				$insert_page['title']='Gallery';				
				$insert_page['content']="<p>Quisque sit amet est et sapien ullamcorper pharetra.</p>";	
				$insert_page['parent_of']=5;
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-gallery.php'; 
                $insert_page['custom_meta']['gallery_perpage']='6';	
			
				echo $this->install_page($insert_page);
				break;
			}	
			case 7:{		
			
				$insert_page['spec_id']='7';				
				$insert_page['title']='Log In';				
				$insert_page['content']="<p>Quisque sit amet est et sapien ullamcorper pharetra.</p>";			
				$insert_page['parent_of']=5;
				$insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-login.php'; 
				
				echo $this->install_page($insert_page);
				break;
			}	
			case 8:{		
			
				$insert_page['spec_id']='8';				
				$insert_page['title']='Sitemap';				
				$insert_page['content']="<p>Quisque sit amet est et sapien ullamcorper pharetra.</p>";	
                $insert_page['parent_of']=5;
                $insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-sitemap.php'; 				
				echo $this->install_page($insert_page);
				break;
			}	
			case 9:{		
			
				$insert_page['spec_id']='9';				
				$insert_page['title']='Contact Us';				
				$insert_page['content']="";	
	            $insert_page['meta']['meta_key']='_wp_page_template';
				$insert_page['meta']['meta_value']='page-contact.php'; 		
				echo $this->install_page($insert_page);
				break;
			}					
			case 10:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] = array(
					  'cat_name'             => 'Gallery posts', 
					  'category_description' => 'Category for Gallery Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 11:{		
				$category_params['spec_id']=$action_number;
				$category_params['param']  = array(
					  'cat_name'             => 'Blog posts', 
					  'category_description' => 'Category for Blog Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 12:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Search posts', 
					  'category_description' => 'Category for Search Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}	
			case 13:{		
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
			case 14:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'Bride posts', 
					  'category_description' => 'Category for Bride Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}
			case 15:{		
				$category_params['spec_id']=$action_number;
				$category_params['param'] =array(
					  'cat_name'             => 'About Us posts', 
					  'category_description' => 'Category for About Us Posts', 
					  'category_nicename'    => '', 
					  'category_parent'      => ''
					);
				echo $this->install_category($category_params);
				break;
			}
			case 16:{		
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
			
			
			case 17:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Ring';				
				$insert_post['content']="<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";							
				$insert_post['category']=13;				
				echo $this->install_post($insert_post);
				break;
			}
			case 18:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Trip';				
				$insert_post['content']="<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";				
				$insert_post['category']=13;				
				echo $this->install_post($insert_post);
				break;
			}
			
			case 19:{		
			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='My Wedding Party';				
				$insert_post['content']=" <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>";$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";				
				$insert_post['category']=13;				
				echo $this->install_post($insert_post);
				break;
			}
			case 20:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Our Story';				
				$insert_post['content']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. ";
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";				
				echo $this->install_post($insert_post);
				break;
			}
			case 21:{		
			 ///content post
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Bride';				
				$insert_post['content']="<p style='font-size: 17px;line-height: 25px;'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
			<ul style='font-size: 16px;line-height: 28px'>
			  <li>Berbeza dari pendapat umum yang popular</li>
			  <li>Berbeza dari pendapat umum yang popular</li>
			  <li>menelitikan pengunaan perkataan</li>
			  <li>menelitikan pengunaan perkataan</li>
			  <li>Datangnya dari ayat terkadung didalam</li>
			  <li>Datangnya dari ayat terkadung didalam</li>
			  <li>Berbeza dari pendapat umum yang popular</li>
			  <li>Berbeza dari pendapat umum yang popular</li>
			  <li>menelitikan pengunaan perkataan</li>
			  <li>menelitikan pengunaan perkataan</li>
			  <li>Datangnya dari ayat terkadung didalam</li>
			  <li>Datangnya dari ayat terkadung didalam</li>
			 <li>Berbeza dari pendapat umum yang popular</li>
			  <li>Berbeza dari pendapat umum yang popular</li>
			  <li>menelitikan pengunaan perkataan</li>
			  <li>menelitikan pengunaan perkataan</li>
		   </ul>";		
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				$insert_post['category']=16;				
				echo $this->install_post($insert_post);
				break;
			}
			case 22:{		
			/// blog post 1			
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Welcome!';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>";
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				$insert_post['category']=11;				
				echo $this->install_post($insert_post);
				break;
			}
			case 23:{		
			/// blog post 2
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Morbi in sem quis dui';				
				$insert_post['content']="<p style='font-size: 16px;'>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.</p>";					
				$insert_post['category']=11;
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				echo $this->install_post($insert_post);
				break;
			}
			case 24:{		
            /// about us post 1
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Jessica Hopkins';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>";
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				$insert_post['category']=15;				
				echo $this->install_post($insert_post);
				break;
			}
			case 25:{		
			/// about us post 2
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Jane Smith';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";					
				$insert_post['category']=15;
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				echo $this->install_post($insert_post);
				break;
			}
			case 26:{		
			/// about us post 3
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Nick Brown';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				$insert_post['category']=15;				
				echo $this->install_post($insert_post);
				break;
			}
			case 27:{		
			/// about us post 4
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Sara Brown';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";					
				$insert_post['category']=15;
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				echo $this->install_post($insert_post);
				break;
			}
			case 28:
			case 29:
			case 30:
			case 31:
			case 32:
			case 33:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Maya kalpa';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";				
				$insert_post['category']=10;
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				echo $this->install_post($insert_post);
				break;
			}
			case 34:
			case 35:
			case 36:
			case 37:
			case 38:			
			case 39:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Lorem ipsum is simply';				
				$insert_post['content']="<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>";				
				$insert_post['category']=12;
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				echo $this->install_post($insert_post);
				break;
			}
			case 40:
			case 41:
			case 42:{		
				$insert_post['spec_id']=$action_number;				
				$insert_post['title']='Bride';
				$insert_post["layout"]="2";
				$insert_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";
				$insert_post['content']="<h1><span>Sara</span> Brown</h1><br><i style='color: #A8A8A8;'>Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</i><br><br><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. </p>";				
				$insert_post['category']=14;				
				echo $this->install_post($insert_post);
				break;
			}
			case 43:
			case 44:
			case 45:{		
				// insert top post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='top_'.(int)($action_number%3+1).'.jpg';
				$params['post_id']=$action_number-26;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 46:
			case 47:
			case 48:			
			case 49:{		
				// insert about us post thumbnails				
				$params['spec_id']=$action_number;
				$params['image_name']='about_'.(int)($action_number%4+1).'.jpg';
				$params['post_id']=$action_number-22;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 50:
			case 51:
			case 52:
			case 53:
			case 54:
			case 55:{	
                // insert gallery post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='gallery_'.(int)($action_number%6+1).'.jpg';
				$params['post_id']=$action_number-22;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 56:{	
                // insert blog post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='Blog.jpg';
				$params['post_id']=$action_number-34;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 57:{	
                // insert blog post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='Blog1.jpg';
				$params['post_id']=$action_number-34;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 58:
			case 59:
			case 60:
			case 61:
			case 62:
			case 63:
			case 64:
			case 65:
			case 66:{	
                // insert service post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='bride'.(int)($action_number%3+1).'.jpg';
				$params['post_id']=$action_number-24;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 67:{	
                // insert about us post thumbnails			
				$params['spec_id']=$action_number;
				$params['image_name']='about_us.png';
				$params['post_id']=20;	
				echo $this->conect_post_thumbnail($params);
				break;
			}
			case 68:{		
				//////// update some meta values
				$inserted_install=get_theme_mod('wedding_install_posts','');
				
				$met_for_cat_select_gall['categor-'.$inserted_install[10]]='on';
				$met_for_cat_select_gall['gallery_perpage']='6';
				add_post_meta($inserted_install[6], '_web_business_meta', $met_for_cat_select_gall, true) or   update_post_meta($inserted_install[6], '_web_business_meta',$met_for_cat_select_gall);
				
				$met_for_cat_select['categor-'.$inserted_install[11]]='on';
				$met_for_cat_select['blog_perpage']='2';
				$met_for_cat_select["layout"]="2";
				$met_for_cat_select["main_col_width"]="73";
				add_post_meta($inserted_install[3], '_web_business_meta', $met_for_cat_select, true) or   update_post_meta($inserted_install[3], '_web_business_meta',$met_for_cat_select);
				
                $met_for_cat_select_about["select_1"]=$inserted_install[26];
				$met_for_cat_select_about["select_2"]=$inserted_install[27];				
				add_post_meta($inserted_install[1], '_web_business_meta', $met_for_cat_select_about, true) or   update_post_meta($inserted_install[1], '_web_business_meta',$met_for_cat_select_about);
				
				
				
				$met_for_single_post["layout"]="2";
				$met_for_single_post["single_post_text"]="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.";				
				add_post_meta($inserted_install[17], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[17], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[18], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[18], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[19], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[19], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[20], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[20], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[21], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[21], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[22], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[22], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[23], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[23], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[24], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[24], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[25], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[25], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[26], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[26], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[27], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[27], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[28], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[28], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[29], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[29], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[30], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[30], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[31], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[31], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[32], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[32], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[33], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[33], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[34], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[34], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[35], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[35], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[36], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[36], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[37], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[37], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[38], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[38], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[39], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[39], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[40], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[40], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[41], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[41], '_web_business_meta',$met_for_single_post);
				add_post_meta($inserted_install[42], '_web_business_meta', $met_for_single_post, true) or   update_post_meta($inserted_install[42], '_web_business_meta',$met_for_single_post);
				
				$met_for_cat_select_contact["email_to"]="info@info.com";
				$met_for_cat_select_contact["telephone"]="0054 542 258 963";
				$met_for_cat_select_contact["about_us"]="Here are many variations of passages of Ipsum available.Pellentesque habitant morbi tristique senectus et netus.";
				$met_for_cat_select_contact["address"]="Calle Mondo, 30122 Venice, Italy";
				$met_for_cat_select_contact["longval"]="12.340009";
				$met_for_cat_select_contact["latval"]="45.437163";
				add_post_meta($inserted_install[9], '_web_business_meta', $met_for_cat_select_contact, true) or   update_post_meta($inserted_install[9], '_web_business_meta',$met_for_cat_select_contact);
				
				
				$met_for_cat_select_product['categor-'.$inserted_install[12]]='on';
				$met_for_cat_select_product['gallery_perpage']='6';
				add_post_meta($inserted_install[4], '_web_business_meta', $met_for_cat_select_product, true) or   update_post_meta($inserted_install[4], '_web_business_meta',$met_for_cat_select_product);
				
				
				$met_for_cat_select_service["select"]=$inserted_install[42];
				$met_for_cat_select_service["layout"]="2";
				add_post_meta($inserted_install[2], '_web_business_meta', $met_for_cat_select_service, true) or   update_post_meta($inserted_install[2], '_web_business_meta',$met_for_cat_select_service);
				
				$met_for_cat_select_sitemap['static_pages_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				$met_for_cat_select_sitemap['all_categories_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				$met_for_cat_select_sitemap['tags_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				$met_for_cat_select_sitemap['archives_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				$met_for_cat_select_sitemap['authors_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				$met_for_cat_select_sitemap['blog_posts_on']='on';
				add_post_meta($inserted_install[8], '_web_business_meta', $met_for_cat_select_sitemap, true) or   update_post_meta($inserted_install[8], '_web_business_meta',$met_for_cat_select_sitemap);
				
				
				echo '1';
				break;
			}
			case 69:{		
				$menu_pamas['spec_id']=69;
				$menu_pamas['name']='Weddings';
				$menu_pamas['description']='Menu for Custom Pages';							
				echo $this->install_menu($menu_pamas);
				break;
			}
			case 70:{		
				$params['spec_id']=70;
				$params['menu_title']='Home';
				$params['menu_id']='69';
				$params['menu_url']=get_home_url();		
				echo $this->install_menu_item($params);
				break;
			}
			case 71:{		
				$params['spec_id']=71;
				$params['page_id']='1';
				$params['menu_id']='69';
				$params['menu_title']='Our Story';		
				echo $this->install_menu_item($params);
				break;
			}
			case 72:{		
				$params['spec_id']=72;
				$params['page_id']='2';
				$params['menu_id']='69';
				$params['menu_title']='Bride';		
				echo $this->install_menu_item($params);
				break;
			}
			case 73:{		
				$params['spec_id']=73;
				$params['page_id']='3';
				$params['menu_id']='69';
				$params['menu_title']='Blog';		
				echo $this->install_menu_item($params);
				break;
			}
			case 74:{		
				$params['spec_id']=74;
				$params['page_id']='4';
				$params['menu_id']='69';
				$params['menu_title']='Search';		
				echo $this->install_menu_item($params);
				break;
			}
			case 75:{		
				$params['spec_id']=75;
				$params['page_id']='5';
				$params['menu_id']='69';
				$params['menu_title']='Others';		
				echo $this->install_menu_item($params);
				break;
			}
			case 76:{		
				$params['spec_id']=76;
				$params['page_id']='6';
				$params['menu_id']='69';
				$params['parent_of']=75;
				$params['menu_title']='Gallery';			
				echo $this->install_menu_item($params);
				break;
			}
			case 77:{		
				$params['spec_id']=77;
				$params['page_id']='7';
				$params['menu_id']='69';
				$params['parent_of']=75;
				$params['menu_title']='Log In';		
				echo $this->install_menu_item($params);
				break;
			}
			case 78:{		
				$params['spec_id']=78;
				$params['page_id']='8';
				$params['menu_id']='69';
				$params['parent_of']=75;
				$params['menu_title']='Sitemap';		
				echo $this->install_menu_item($params);
				break;
			}
			case 79:{		
				$params['spec_id']=79;
				$params['page_id']='9';
				$params['menu_id']='69';
				$params['menu_title']='Contact Us';		
				echo $this->install_menu_item($params);
				break;
			}	
			case 80:{
				$inserted_install=get_theme_mod('wedding_install_posts','');
				global $dor_home_page,$dor_general_settings_page;
				
				$dor_home_page->update_parametr('top_post_categories',$inserted_install['13'].',');
				$dor_home_page->update_parametr('content_post_categories',$inserted_install['10'].',');
				$dor_general_settings_page->update_parametr('grab_image','');
				$dor_home_page->update_parametr('n_of_home_post','6');
				$dor_home_page->update_parametr('n_of_testimonials','4');
				$dor_home_page->update_parametr('content_post_cats',$inserted_install['15'].',');
				$dor_home_page->update_parametr('content_post',$inserted_install['11'].',');
		
				
				/// insert slider params
				
				$image_link=get_template_directory_uri('template_url').'/images/slider_1.jpg'.';;;;'. get_template_directory_uri('template_url').'/images/slider_2.jpg'.';;;;'.get_template_directory_uri('template_url').'/images/slider_3.jpg';
				set_theme_mod('web_busines_image_link',$image_link);
				
				$image_textarea='<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>;;;;<p style="font-size: 45px; font-weight: 700; text-transform: uppercase;">Lorem ipsum</p><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fameo.</p>';
				set_theme_mod('web_busines_image_textarea',$image_textarea);
				echo 1;
				break;
				
				
			}
			case 81:{				
				echo $this->install_widgets();		
				break;		
			}
			
		}
		die();
		
	}
	
	public function remove_ajax(){
		$action_number=$_GET['number_of_actoion'];
		switch($action_number){
			case 1:
			case 2:
			case 3:
			case 4:
			case 5:
			case 6:
			case 7:
			case 8:
			case 9:{
				$params['spec_id']=$action_number;
				echo $this->remove_page_post($params);
				break;
			}
			case 10:
			case 11:
			case 12:
			case 13:
			case 14:
			case 15:
			case 16:{
				$params['spec_id']=$action_number;
				echo $this->remove_category($params);
				break;
			}
			case 17:
			case 18:
			case 19:
			case 20:
			case 21:
			case 22:
			case 23:
			case 24:
			case 25:
			case 26:
			case 27:
			case 28:
			case 29:
			case 30:
			case 31:
			case 32:
			case 33:
			case 34:
			case 35:
			case 36:
			case 37:
			case 38:
			case 39:
			case 40:
			case 41:
			case 42:{
				$params['spec_id']=$action_number;
				echo $this->remove_page_post($params);
				break;
			}
			case 43:
			{		
				
				$params['spec_id']=69;
				$params['menu_item'][0]=70;
				$params['menu_item'][1]=71;
				$params['menu_item'][2]=72;
				$params['menu_item'][3]=73;
				$params['menu_item'][4]=74;
				$params['menu_item'][5]=75;
				$params['menu_item'][6]=76;
				$params['menu_item'][7]=77;
				$params['menu_item'][8]=78;
				$params['menu_item'][9]=79;
				echo $this->remove_menu($params);
				break;
			}
			case 44:{	
                $inserted_install=get_theme_mod('wedding_install_posts','');
				if(isset($inserted_install['13']))
					remove_theme_mod( 'top_cat' . $inserted_install['13']);
				if(isset($inserted_install['16']))
					remove_theme_mod( 'content_cat' .$inserted_install['16']);                 				
				echo $this->remove_widgets();	
				break;			
			}
		}
		die();
	}
	
	private function remove_page_post($params){
		$inserted_install=get_theme_mod('wedding_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_post( $inserted_install[$params['spec_id']], true );
			if($sucsses){
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_install_posts',$inserted_install);
				return 1;	
			}
			else
			{
				if(get_post($inserted_install[$params['spec_id']]))
				{
					return '<div class="error_text">Error Remove</div>';
				}
				else{
				//	if(isset)
				//	wp_delete_attachment();
					unset($inserted_install[$params['spec_id']]);
					set_theme_mod('wedding_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_category($params){
			$inserted_install=get_theme_mod('wedding_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_category( $inserted_install[$params['spec_id']]);
			if($sucsses){
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_install_posts',$inserted_install);
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
					set_theme_mod('wedding_install_posts',$inserted_install);
					return '<div class="notification_text">Not Found</div>';					
				}
			}
		}
		else
		return '<div class="notification_text">Not Found</div>';
		
	}
	
	private function remove_menu($params){
	
		$inserted_install=get_theme_mod('wedding_install_posts','');
		if(isset($inserted_install[$params['spec_id']])){
			$sucsses=wp_delete_nav_menu( $inserted_install[$params['spec_id']]);
			if($sucsses){
				
				foreach($params['menu_item'] as $menu_item){
					if(isset( $inserted_install[$menu_item]))
						unset($inserted_install[$menu_item]);
				}
				
				unset($inserted_install[$params['spec_id']]);
				set_theme_mod('wedding_install_posts',$inserted_install);
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
					set_theme_mod('wedding_install_posts',$inserted_install);
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
		
		$inserted_install=get_theme_mod('wedding_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$category_params['spec_id']);
		if($exsist){
			$catt=get_category((int)$inserted_install[$category_params['spec_id']]);
			if($catt)
				return '<div class="notification_text">Already exists.</div>';
		}
		$cat_id=wp_insert_category($category_params['param']);
		
		if($cat_id){	
			$inserted_install[$category_params['spec_id']]=$cat_id;
			set_theme_mod('wedding_install_posts',$inserted_install);
			return 1;
		}
		else	{
			$category_params['param']['cat_name']=$category_params['param']['cat_name'].date("H:i:s"); 
			$cat_id=wp_insert_category($category_params['param']);	
			if($cat_id){	
				$inserted_install[$category_params['spec_id']]=$cat_id;
				set_theme_mod('wedding_install_posts',$inserted_install);
				return 1;
			}	
			else
				return '<div class="error_text">Error inserting category.</div>';
		}
				
	}
	
	private function conect_post_thumbnail($params){
		
		
		$inserted_post_pages=get_theme_mod('wedding_install_posts','');
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
			return '<div class="notification_text">postdoes not exist.</div>';
		}
	return 1;
	}
	
	
	
	private function install_menu($params){
		
		$inserted_install=get_theme_mod('wedding_install_posts','');
		$exsist=$this->exsist_in_base($inserted_install,$params['spec_id']);
		if($exsist){
			return '<div class="notification_text">Already exists.</div>';
		}
			
		$wedding_menu = array(
			  'cat_name'             => $params['name'], 
			  'category_description' => $params['description'], 
			  'category_nicename'    => '', 
			  'category_parent'      => '',
			  'taxonomy'             => 'nav_menu',
			  'count' 				 => '10'
			);
		
			// Create the menu for custom pages
			$wedding_menu_id = wp_insert_category($wedding_menu);
			if($wedding_menu_id)
			{
				$inserted_install[$params['spec_id']]=$wedding_menu_id;
				set_theme_mod('wedding_install_posts',$inserted_install);			
				$change_selected_dur_menu=get_option('theme_mods_weddings');
	    		$change_selected_dur_menu['nav_menu_locations']['primary-menu']=$wedding_menu_id;
				update_option('theme_mods_weddings',$change_selected_dur_menu);
				return 1;
				
			}
			else
			{
				return '<div class="error_text">error install. menu cannot be created</div>';
			}
		
		
	}
	
	private function install_menu_item($params){
		$inserted_install=get_theme_mod('wedding_install_posts','');
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
		if(isset($params['page_id']) && isset($inserted_install[$params['page_id']]))
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
        'menu-item-title' =>  __('Home','sp_webBusiness'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));
		
		
		}
							   
		if($menu_item_id)	{   
		$inserted_install[$params['spec_id']]=$menu_item_id;
		set_theme_mod('wedding_install_posts',$inserted_install);
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
			$inserted_post_pages=get_theme_mod('wedding_install_posts','');
			if($inserted_post_pages!='' && !is_array($inserted_post_pages)){
				$inserted_post_pages='';
				set_theme_mod('wedding_install_posts','');
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
								
							add_post_meta($page_id,'_wedding_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_page['spec_id']]=$page_id;
					set_theme_mod('wedding_install_posts',$inserted_post_pages);
					
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
			$inserted_post_pages=get_theme_mod('wedding_install_posts','');			
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
								
							add_post_meta($page_id,'_wedding_meta',$met,TRUE);	
							
						}
					
					///  set in base page alredy createt
					$inserted_post_pages[$insert_post['spec_id']]=$post_id;
					set_theme_mod('wedding_install_posts',$inserted_post_pages);
					
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
		if(isset($widget_web_buis_adsens[1000]))
			return '<div class="notification_text">Already exists.</div>';
						
		$widget_web_buis_adsens[1000]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';	
		
		if(isset($widget_web_buis_adsens[1001]))
			return '<div class="notification_text">Already exists.</div>';
							
		$widget_web_buis_adsens[1001]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';	
		
		if(isset($widget_web_buis_adsens[1002]))
			return '<div class="notification_text">Already exists.</div>';
						
		$widget_web_buis_adsens[1002]['adsenseCode']='<h3 style="padding-top: 70px;padding-bottom:70px">Advertisement</h3>';		
		update_option('widget_web_buis_adsens',$widget_web_buis_adsens);
				
		$widget_wedding_categ=get_option('widget_wedding_categ');
		if(isset($widget_wedding_categ[1003]))
			return '<div class="notification_text">Already exists.</div>';
			
		$widget_wedding_categ[1003]['title']='Latest news';
		$widget_wedding_categ[1003]['categ_id']= $categ_id_by_name;
		$widget_wedding_categ[1003]['post_count']='3';	
	
			
				
		update_option('widget_wedding_categ',$widget_wedding_categ);
		
		if(isset($widget_text[1004]))
			return '<div class="notification_text">Already exists.</div>';
					
		$widget_text[1004]['title']='Contact';		
		$widget_text[1004]['text']='
					<div class="contact-content">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
						<p>Tell:</p>
						<span class="number">
							<p>0054 <strong>542 258 963</strong><p>
							<p>0054 <strong>542 258 963</strong><p>
						</span>
					</div>';					

		update_option('widget_text',$widget_text);
		
		if(isset($widget_wedding_social[1005]))
			return '<div class="notification_text">Already exists.</div>';		
			
		$widget_wedding_social[1005]['title']='Subscribe';		
		$widget_wedding_social[1005]['show_facebook_icon']='on';
		$widget_wedding_social[1005]['show_twitter_icon']='on';
		$widget_wedding_social[1005]['facebook_url']='facebook';
		$widget_wedding_social[1005]['twitter_url']='twitter';
		$widget_wedding_social[1005]['show_rss_icon']='on';
		$widget_wedding_social[1005]['show_google_icon']='on';		
		$widget_wedding_social[1005]['rss_url']='rss';
		$widget_wedding_social[1005]['google_url']='google';
		$widget_wedding_social[1005]['show_inst_icon']='on';
		$widget_wedding_social[1005]['show_youtube_icon']='on';
		$widget_wedding_social[1005]['inst_url']='inst';
		$widget_wedding_social[1005]['youtube_url']='youtube';
	
		update_option('widget_wedding_social',$widget_wedding_social);
		
		if(isset($widget_recent_posts[1006]))
			return '<div class="notification_text">Already exists.</div>';
		
		$widget_recent_posts[1006]['title']='History';
		$widget_recent_posts[1006]['number']='10';
		$widget_recent_posts[1006]['show_date']='0';
		
		update_option('widget_recent-posts',$widget_recent_posts);
		
		$sidbar_text_add=wp_get_sidebars_widgets();	
		
		$sidbar_text_add['footer-widget-area1'][1000]='web_buis_adsens-1000';
		$sidbar_text_add['footer-widget-area1'][1001]='web_buis_adsens-1001';
		$sidbar_text_add['footer-widget-area1'][1002]='web_buis_adsens-1002';
		$sidbar_text_add['footer-widget-area2'][1003]='wedding_categ-1003';
		$sidbar_text_add['footer-widget-area2'][1004]='text-1004';
		$sidbar_text_add['footer-widget-area2'][1005]='wedding_social-1005';
		$sidbar_text_add['primary-widget-area'][1006]='recent-posts-1006';
		
		update_option( 'sidebars_widgets', $sidbar_text_add);
		return 1;
	}
	
	
	public function remove_widgets(){
		///// remove widgets
		$widget_web_buis_adsens=get_option('widget_web_buis_adsens');
		$widget_text=get_option('widget_text');
		$widget_recent_posts=get_option('widget_recent-posts');
		
		if(!isset($widget_web_buis_adsens[1000]) || !isset($widget_web_buis_adsens[1001]) || !isset($widget_web_buis_adsens[1002]) || !isset($widget_wedding_categ[1003]) || !isset($widget_text[1004]) || !isset($widget_wedding_social[1005]))
			return '<div class="notification_text">Not Found</div>';
			
		unset($widget_web_buis_adsens[1000]);
		unset($widget_web_buis_adsens[1001]);
		unset($widget_web_buis_adsens[1002]);
		unset($widget_wedding_categ[1003]);
		unset($widget_text[1004]);
		unset($widget_wedding_social[1005]);
        unset($widget_recent_posts[1006]);
		
		update_option('widget_text',$widget_text);
		update_option('widget_web_buis_adsens',$widget_web_buis_adsens);
		update_option('widget_recent-posts',$widget_recent_posts);
		
		
		$widget_wedding_categ=get_option('widget_wedding_categ');
		if(!isset($widget_wedding_categ[1003]))
			return '<div class="notification_text">Not Found</div>';
		unset($widget_wedding_categ[1003]);
		
		update_option('widget_wedding_categ',$widget_wedding_categ);
		
		
		$widget_wedding_social=get_option('widget_wedding_social');
		if(!isset($widget_wedding_social[1005]))
			return '<div class="notification_text">Not Found</div>';
		unset($widget_wedding_social[1005]);
		
		update_option('widget_wedding_social',$widget_wedding_social);
		
		$sidbar_text_add=wp_get_sidebars_widgets();	
		
		
		unset($sidbar_text_add['footer-widget-area1'][1000]);
		unset($sidbar_text_add['footer-widget-area1'][1001]);
		unset($sidbar_text_add['footer-widget-area1'][1002]);		
		unset($sidbar_text_add['footer-widget-area2'][1003]);
		unset($sidbar_text_add['footer-widget-area2'][1004]);
		unset($sidbar_text_add['footer-widget-area2'][1005]);
		unset($sidbar_text_add['primary-widget-area'][1006]);
		update_option( 'sidebars_widgets', $sidbar_text_add );
		return 1;		
	}
}


 ?>