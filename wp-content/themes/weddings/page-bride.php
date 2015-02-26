<?php 
/*
Template Name: Bride Page
*/

get_header(); 
wedding_update_page_layout_meta_settings();
?>

<div id="content" class="page">
  <div class="container"><?php
        if ( is_active_sidebar( 'primary-widget-area' ) )
		{ ?>   
          <div id="sidebar1" class="widget-area" role="complementary">          
			<div class="sidebar-container">
              <?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</div>
		  </div> <!-- #first .widget-area -->
  <?php }
	
        global $post;
		global $wpdb;
		wp_reset_query();
        $web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE);
       
		
		$web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE); 
		 
		$select = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE ID=%d',$web_business_meta["select"]));
		
		  ?>
		  <style>
		  .tablet .image-block{
			height: inherit !important;
			width: inherit !important;
		  }
		  
		  .phone .entry{
			width: 98% !important;
		  }
		  
		  .phone .image-block{
			height: inherit !important;
		  }
			.web .blog > div,
			.tablet .blog > div{
				min-height: 300px;
			}
		  
		  </style>
		  
	 <div id="blog" class="blog">
        		<div>
        			<h3 class="page_title">
                    	<a href="<?php echo $select->guid; ?>"><?php echo $select->post_title ?></a>
                    </h3>
            		<div class="entry bride">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($web_business_meta["select"]) ); ?>" alt=""/>	
						<?php echo $select->post_content; ?>
                    </div>
        		</div>
	    

   </div>
 <?php		
 if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
        <div id="sidebar2" class="widget-area" role="complementary">         
             <div class="sidebar-container">
                 <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
             </div>
        </div>
<?php } ?>
<?php 
				
	  global $post;
     $withcomments = true;
	 wp_reset_query();
     if(comments_open())
	 {  ?>
            <div class="comments-template">
                <?php wp_reset_query(); echo comments_template(); ?>
            </div>
 <?php }  ?>
	
  </div>
    <div style="clear:both"></div>  
	<?php if ( is_active_sidebar( 'footer-widget-area1' ) ) { ?>
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
					
<?php get_footer(); ?>
