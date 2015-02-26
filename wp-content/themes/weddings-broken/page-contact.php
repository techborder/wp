<?php 
/*
Template Name: Contact Page
*/
get_header(); 
wedding_update_page_layout_meta_settings();
?>
</div>	
</div>
<div id="content" class="page">
	<div class="container">
		<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"  class="widget-area" role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'primary-widget-area' );  ?>
				</div>
			</div>
			<?php } ?>
		
			<script type="text/javascript">
			function refreshCaptcha()
			{
				
			document.getElementById("wd_captcha_img").src=document.getElementById("wd_captcha_img").src.split("&")[0]+'&r='+Math.floor(Math.random()*100);
			document.getElementById("mail_capcode").value='';
			}


			function submit_mail(text1,text2,text5,text3,text4)
			{  
				var send_wedding_email = document.getElementById('wedding_email');
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(document.getElementById("wedding_contactName").value=='<?php echo __('Name','sp_webBusiness'); ?>')      
				{              
				alert(text1);  	 	      
				document.getElementById("wedding_contactName").focus();  	 	    
				}        
				else  
				if(document.getElementById("wedding_email").value=='<?php echo __('Your Email','sp_webBusiness'); ?>')      
				{              
				alert(text2);  	 	      
				document.getElementById("wedding_email").focus();  	 	    
				}  
				else  
				if(!filter.test(send_wedding_email.value))      
				{              
				alert(text5);  	 	      
				document.getElementById("wedding_email").focus();  	 	    
				}     
				else  
				if(document.getElementById("messageText").value=='<?php echo __('Comments','sp_webBusiness'); ?>')      
				{              
				alert(text3);   	 	      
				document.getElementById("messageText").focus();
				}       
				else  
				{
					var name = document.getElementById("wedding_contactName").value;
					var captcha_key = document.getElementById("mail_capcode").value;
					var wedding_email = document.getElementById("wedding_email").value;
					var message = document.getElementById("messageText").value;
					var message_title = document.getElementById("wedding_title").value;
					
					jQuery.ajax({
				  url: "<?php echo admin_url( 'admin-ajax.php' ) ?>?action=themewdcaptchareturn&name="+name+"&email="+wedding_email+"&message="+message+"&captcha_key="+captcha_key+"&message_title="+message_title+"&curenid=<?php echo $post->ID ?>"
				}).done(function(data) {
					if(data=='4'){
						alert('<?php echo __('The name field is required.','sp_webBusiness'); ?>');
						refreshCaptcha();		
					}
					if(data=='3')
					{
						alert('<?php echo __('Incorrect Captcha code. Please try again.','sp_webBusiness'); ?>');
						refreshCaptcha();
					}
					if(data=='5')
					{
						alert('<?php echo __('Error submitting message.','sp_webBusiness'); ?>');
						refreshCaptcha();
					}
				
					if(data=='1')
					{
						alert('<?php echo __('Your message was submitted successfully','sp_webBusiness'); ?>');
						document.getElementById("wedding_contactName").value='';
						document.getElementById("mail_capcode").value='';
						document.getElementById("wedding_email").value='';
						document.getElementById("messageText").value='';
						document.getElementById("wedding_title").value='';
						refreshCaptcha();
					}
				});
			} 
		}
			</script>
		<?php
		
		function getCoordinates($address){ 
			$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
			$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
			$response = wp_remote_fopen($url);
			$json = json_decode($response,TRUE); //generate array object from the response from the web 
			return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']); 
		}
		
	      global $post;
		  global $wpdb;
		  wp_reset_postdata();
		  $web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE);
		  if(isset($web_business_meta["address"]))
			$address = $web_business_meta["address"];
		 
		  if(isset($web_business_meta["about_us"]))
				$about_us = $web_business_meta["about_us"];
		  
		  if(isset($web_business_meta["telephone"]))
				$telephone = $web_business_meta["telephone"];
		 
		  if(isset($web_business_meta["email_to"]))
				$email_to = $web_business_meta["email_to"];
		  
		
?>
	<div id="blog" class="blog">
			<?php if(isset($address) && $address!=""){ ?>
			<script type="text/javascript"> 
				function init_map(){
					var myOptions = {zoom:13,center:new google.maps.LatLng(<?php echo getCoordinates($address); ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};
					map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
					marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo getCoordinates($address); ?>)});
					infowindow = new google.maps.InfoWindow({content:"<?php echo $address; ?>" });
					google.maps.event.addListener(marker, "click", function(){
					infowindow.open(map,marker);});
					infowindow.open(map,marker);}					
					google.maps.event.addDomListener(window, 'load', init_map);
			</script>
				<?php	
				}

			   if ( have_posts() ) :
					while (have_posts()) : the_post(); ?>
	<div>				
	  <h3 class="page_title">
		 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	  </h3>
	  <?php the_content(); ?>  
	</div>  
	<?php if($web_business_meta!=""){ ?>
	<div style="overflow:hidden;padding-bottom: 40px;">
				<div id="gmap_canvas"></div>
				<div id="contact_info">
					<ul>
					<?php if(isset($web_business_meta["address"])){ ?>
						<li id="about_info"><?php echo $web_business_meta["address"]; ?></li>
					<?php 
						}
					if(isset($web_business_meta["telephone"])){ ?>
						<li id="tel_info"><?php echo $web_business_meta["telephone"]; ?></li>
						<?php 
					}
					if(isset($web_business_meta["email_to"])){ ?>
						<li id="mail_info"><?php echo $web_business_meta["email_to"]; ?></li>
					<?php } ?>
					</ul>
				</div>
				<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
	</div>
	<?php } ?>
	<div id="contactDiv">
		 <form action="<?php the_permalink(); ?>" id="contactForm" method="post" name="send_mail">
		   <div id="contactFormDiv">
			  <ul class="forms">
				<li class="inputback">
					<div class="styled-input">
						<input type="text" placeholder="<?php echo __('Full Name','wd_wedding'); ?>" name="wedding_contactName" id="wedding_contactName" value="<?php if( isset( $_POST['wedding_contactName'] ) ) echo esc_attr($_POST['wedding_contactName']); ?>" class="requiredField" />
					</div>  
				   <?php if(!isset($nameError)) $nameError='';   if( $nameError != '' ) { ?>
				   <span class="error"><?php echo $nameError;?></span> 
				  <?php } ?>
			   </li>
			   <li class="inputback">
					<div class="styled-input">
						<input type="text" placeholder="<?php echo __('Your Email','wd_wedding'); ?>" name="wedding_email" id="wedding_email" value="<?php if( isset( $_POST['wedding_email'] ) )  echo esc_attr($_POST['wedding_email']);  ?>" class="requiredField email" />
					</div>
				  <?php if(!isset($emailError)) $emailError=''; if($emailError != '') { ?>
				   <span class="error"><?php echo $emailError; ?></span>
				   <?php } ?>
			   </li>
			   <li class="inputback">
					<div class="styled-input">
						<input type="text" placeholder="<?php echo __('Message title','wd_wedding'); ?>" name="wedding_title" id="wedding_title" value="<?php if( isset( $_POST['wedding_title'] ) )  echo esc_attr($_POST['wedding_title']); ?>" class="requiredField title" />
					</div>
				   <?php if(!isset($emailError)) $emailError=''; if($emailError != '') { ?>
				   <span class="error"><?php echo $emailError;?></span>
				   <?php } ?>
			   </li>
			 </ul>     
		</div>
		<div class="inputback-textarea">
			 <div class="message-textarea">
			      <textarea class="requiredField" placeholder="<?php echo __('Comments','wd_wedding'); ?>" name="wedding_comments" id="messageText" rows="20" cols="30" ><?php if( isset( $_POST['wedding_comments'] ) ) { echo esc_attr($_POST['wedding_comments']); }  ?></textarea>
			 </div>        
		</div>	
		<div class="left">
			 <img type="captcha" digit="6" src="<?php echo admin_url(); ?>/admin-ajax.php?action=themewdcaptcha&amp;digit=6&amp;i=form_id_temp" id="wd_captcha_img" class="captcha_img" onclick="captcha_refresh('_wd_captcha','form_id_temp')">
			 <a href="javascript:refreshCaptcha();" style="text-decoration:none">&nbsp;<div border="0" id="contactRefresh"></div></a>
			 <input type="text" name="captchainput" id="mail_capcode" value="" class="requiredField"/>
			<span id="caphid"></span>
		</div>		   
		<div class="left" id="contactSend">
			 <input type="button"  class="contact_send read_more" style="margin-right:10px;" value="<?php echo __('Send','sp_webBusiness'); ?>" onclick='submit_mail("<?php echo __('The Name field is required.','sp_webBusiness'); ?>","<?php echo __('The email field is required.','sp_webBusiness'); ?>","<?php echo __('Please provide a valid email address.','sp_webBusiness'); ?>","<?php echo 'The Message field is required.'; ?>","<?php echo __('Incorrect Captcha code. Please try again.','sp_webBusiness'); ?>");' />	 
			 <input type="reset" value="<?php echo __('Reset','wd_wedding'); ?>" class="reset"/>
		</div>
	 </form>
	</div>

	<?php endwhile;
	endif; 
	
	
		?>
	</div>

<?php			
		 if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
			<div id="sidebar2" class="widget-area" role="complementary">         
				 <div class="sidebar-container">
					 <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
				 </div>
			</div><?php } ?>	  
	<?php   
		global $post;
		$withcomments = true;
		wp_reset_query();
		if(comments_open()){	?>
			<div class="comments-template">
					<?php echo comments_template(); ?>
			</div>	
    <?php
        }
	?>
		<div style="clear:both"></div>
		</div>	
		
<?php	if ( is_active_sidebar( 'footer-widget-area1' ) ) { ?>
				<div id="sidebar3"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'footer-widget-area1' ); 	?>
					</div>
				</div>
          <?php } ?>   

			<?php if ( is_active_sidebar( 'footer-widget-area2' ) ) { ?>
				<div id="sidebar4"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'footer-widget-area2' ); 	?>
					</div>
				</div>
          <?php } ?>	
</div>

<?php
get_footer(); ?>  