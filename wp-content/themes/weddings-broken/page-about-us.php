<?php
/*
Template Name: About Us page
*/

get_header(); 
wedding_update_page_layout_meta_settings();
?>
<div id="content" class="page">
  <div class="container">
 <?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?> 
        <div id="sidebar1" class="widget-area" role="complementary">          
          <div class="sidebar-container">
              <?php dynamic_sidebar( 'primary-widget-area' ); ?>
          </div>
        </div><!-- #first .widget-area -->
<?php } ?>
   <div id="blog" class="blog about-us" width="70%">
     <?php 		
			if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="single-post single-page">
						<h3 class="page_title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>  
						<div class="page_content"><?php the_content();?></div>
					</div>	
		<?php endwhile; 
	      endif; 
	      global $post;
		  global $wpdb;
		  wp_reset_postdata();
		  $web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE); 
		  if(isset($web_business_meta["select_1"]))
		  $select_1 = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE ID=%d',$web_business_meta["select_1"]));
		  if(isset($web_business_meta["select_2"]))
		  $select_2 = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE ID=%d',$web_business_meta["select_2"]));
		  ?>
		  
		  
					<div class="clear"></div>
					<?php if(!empty($select_1) && !empty($select_2)){ ?> 
					<div id="our-staff-wrapper">
						<!--- <span   class="staff-button-left"><span>&laquo;Left</span></span>
						<span   class="staff-button-right"><span>Right&raquo;</span></span> -->
						
						<div class="staff-list">
							<div class="staff-list-block">
								<ul id="our-staff">
								
									<li>
										<div class="image-block">	
											<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($web_business_meta["select_1"]) ); ?>" width="150" height="150" alt="" />
										</div>
										<h4><a href="<?php echo $select_1->guid; ?>"><?php echo $select_1->post_title ?></a></h4>
										<span class="description"><?php echo $select_1->post_content; ?></span>
									</li>
									<li>
										<h1 id="our_story" style="text-align: center;display:none;font-size: 170pt;font-family: Sakkal Majalla;-webkit-font-smoothing: subpixel-antialiased;-webkit-transform: translatez(0);-moz-transform: translatez(0);-ms-transform: translatez(0);-o-transform: translatez(0);transform: translatez(0);"> & </h1>
									</li>
									
									<li>
										<div class="image-block">
											<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($web_business_meta["select_2"]) ); ?>" width="150" height="150" alt="" />
										</div>
										<h4><a href="<?php echo $select_2->guid; ?>"><?php echo $select_2->post_title ?></a></h4>
										<span class="description"><?php echo $select_2->post_content; ?></span>
									</li>
									
								</ul>
						 </div>
					</div>
				</div>
<?php } ?>				
                <div class="page-navigation">
		              <?php posts_nav_link(); ?>
	               </div>	
	
</div>
<script>
jQuery('document').ready(function(){
	jQuery('.blog .single-post h3').before(jQuery('#our-staff-wrapper'));
	jQuery('#our-staff h1').eq(0).css('display', 'block');
});
</script>
<?php
	if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
        <div id="sidebar2" class="widget-area" role="complementary">         
             <div class="sidebar-container">
                 <?php dynamic_sidebar( 'secondary-widget-area' ); 
                       ?>
             </div>
        </div><?php } ?><!-- #first .widget-area -->

<?php 
	    global $post;
        $withcomments = true;
		 wp_reset_query();
        if(comments_open())
		{ ?>
            <div class="comments-template">
                <?php echo comments_template(); ?>
            </div>
    <?php
        }
		?>
	   <div class="clear"></div>
	</div>
	   <?php

if ( is_active_sidebar( 'footer-widget-area1' ) ) { ?>
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
          <?php } 

   ?>
</div>                    
<?php get_footer(); ?>  