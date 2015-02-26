<?php
////////////////////// add meta boxs for page and posts
add_action( 'add_meta_boxes', 'web_buisnes_seo_meta_boxs' );
/* Do something with the data entered */
add_action( 'save_post', 'web_buisnes_seo_save_postdata' );
/* Adds a box to the main column on the Post and Page edit screens */
function web_buisnes_seo_meta_boxs() {
     global $dor_seo_page;
	 foreach ($dor_seo_page->options_SEO as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id'],FALSE) === FALSE) {
				$$value['var_name'] = $value['std'];
			} else {
				$$value['var_name'] = get_theme_mod($value['id']);			
			}
		}
    }
	
    $screens = array( 'post', 'page' );
	if($seo_single_title || $seo_single_description || $seo_single_keywords){
    foreach ($screens as $screen) {
        add_meta_box('web_business_seo_meta',__( 'SEO Weddings Box', 'sp_webBusiness' ),'web_busines_seo_metadate', $screen  );
    }
	}
}
/* Prints the box content */
function web_busines_seo_metadate( $post ) {
	global $dor_seo_page;
	 foreach ($dor_seo_page->options_SEO as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id'],FALSE) === FALSE) {
				$$value['var_name'] = $value['std'];
			} else {
				$$value['var_name'] = get_theme_mod($value['id']);			
			}
		}
    }
    
  $value_title 		= get_post_meta( $post->ID, '_single_post_soe_title', true );
  $value_description= get_post_meta( $post->ID, '_single_post_soe_description',true);
  $value_keywords	= get_post_meta( $post->ID, '_single_post_soe_keywords',true);
 if(!$seo_single_title){
  ?>
  <script> 
  jQuery( document ).ready(function() {
   jQuery('#seo_meta_title').css('display','none');
});  
  </script>
  <?php
  }

   if(!$seo_single_description){
  ?>
  <script> 
  jQuery( document ).ready(function() {
   jQuery('#seo_meta_desc').css('display','none');
});  
  </script>
  <?php
  }

   if(!$seo_single_keywords){
  ?>
  <script> 
  jQuery( document ).ready(function() {
   jQuery('#seo_meta_key').css('display','none');
});  
  </script>
  <?php
  }
 ?>
  <div style="width:100%" id="newmeta">
    <div class="seo_meta" id="seo_meta_title">
	   <h4>Title</h4>
	   <input type="text" id="single_post_soe_title" name="single_post_soe_title"  style="width:100%" value="<?php echo  $value_title; ?>">
    </div>
    <div class="seo_meta" id="seo_meta_desc">
	   <h4>Description</h4>
	   <input type="text" id="single_post_soe_description" name="single_post_soe_description"  style="width:100%" value="<?php echo  $value_description ?>">
    </div>
    <div class="seo_meta" id="seo_meta_key">
	   <h4>Keywords</h4>
	   <input type="text" id="single_post_soe_keywords" name="single_post_soe_keywords"  style="width:100%" value="<?php echo  $value_keywords ?>">
    </div>
	<div style="clear:both;"></div>
  </div>
  
  
  <?php
}
/* When the post is saved, saves our custom data */
function web_buisnes_seo_save_postdata( $post_id ) {
	

  // First we need to check if the current user is authorised to do this action. 
  if (isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }
  // Thirdly we can save the value to the database
	$value_title = '';
	$value_description = '';
	$value_keywords = '';
	if(isset($_POST['single_post_soe_title']))
		$value_title=$_POST['single_post_soe_title'];
		
	if(isset($_POST['single_post_soe_description']))
		$value_description=$_POST['single_post_soe_description'];
		
	if(isset($_POST['single_post_soe_keywords']))
		$value_keywords=$_POST['single_post_soe_keywords'];
	
  	add_post_meta($post_id, '_single_post_soe_title', $value_title, true) or   update_post_meta($post_id, '_single_post_soe_title', $value_title);
	add_post_meta($post_id, '_single_post_soe_description', $value_description, true) or  update_post_meta($post_id, '_single_post_soe_description', $value_description);
	add_post_meta($post_id, '_single_post_soe_keywords', $value_keywords, true) or  update_post_meta($post_id, '_single_post_soe_keywords', $value_keywords);
}
