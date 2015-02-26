<?php
global $dor_integration_page;
get_header(); 
wedding_update_page_layout_meta_settings();
global $post;
global $wpdb;
wp_reset_postdata();
$web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE);
?>
</div>	
</div>
<div id="content" class="page">
		<div class="container">
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1" class="widget-area">
				<div class="sidebar-container">
				  <?php dynamic_sidebar( 'primary-widget-area' );  ?>
				</div>
			</div>
				<?php }	?>
			
			<div id="blog" class="blog">
   				<?php $dor_integration_page->update_top_of_post_integration(); 
			    if(have_posts()) { ?><?php while(have_posts()) { the_post(); ?>
				    <div class="single-post">															    
						<div class="entry" style="background: #F8F8F8; padding-right: 15px;">	
							<div style="display: table;">
							<?php the_post_thumbnail(array(170,250)); ?>
							<h3 style="font-weight: bold; padding-bottom: 15px;">
								<a class="title_href" href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<i style="color: #a8a8a8;"><?php						
							if(isset($web_business_meta['single_post_text'])) echo $web_business_meta['single_post_text']; ?> </i>
							</div>
						</div>
						<?php the_content(); ?>
					</div>
					<?php $dor_integration_page->update_bottom_of_post_integration(); 
					wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Page', 'wd_wedding' ) . '</span>', 'after' => '</div>', 'link_before' => '<span class="page-links-number">', 'link_after' => '</span>' ) ); 
			        wedding_post_nav(); ?>
			</div>
		<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
			<div id="sidebar2" class="widget-area">
				<div class="sidebar-container">
				  <?php dynamic_sidebar( 'secondary-widget-area' );  ?>
				</div>
			</div>     
			<?php } ?>
					<?php 
				
					global $post;
					$withcomments = true;
					if(comments_open()){	
					wp_reset_query();
					?>
			       <div class="comments-template">
				      <?php echo comments_template(); ?>
			       </div>	
           <?php  }  ?>
	

<?php }} 

wedding_integrate_is_baner();

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