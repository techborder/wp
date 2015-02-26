<?php 
/*
Template Name: Blog Page
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
			
			<div id="blog" class="blog">
				<?php  /*print page content*/ 
				 global $post;
				 wp_reset_postdata();
				$web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE);
				$cats = get_categories('hide_empty=0');
				$site_cats = array();
				$cat_query="";
				foreach ($cats as $categs) 
				{
					if (isset($web_business_meta["categor-".$categs->cat_ID]) && $web_business_meta["categor-".$categs->cat_ID]=="on")
					{
						$cat_query.=$categs->cat_ID.",";
					}                         
				}
				if(have_posts()) : 
					while(have_posts()) : the_post(); ?>
						<div>
							<h3 class="page_title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="blog-description">
								<?php the_content(); ?>
							</div>
						</div>
			   <?php endwhile;
			   endif; 
			   
			 
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				if(!isset($web_business_meta['blog_perpage']))
					$web_business_meta['blog_perpage']=0;
				$wp_query->query('showposts='.($web_business_meta['blog_perpage']).'&paged='.$paged.'&cat='.$cat_query);

					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				
						<div class="blog-post-div">							
				            <?php wedding_page_blog(); ?>							
						</div>
						<?php endwhile; ?>
                        <div class="page-navigation">
		                  <?php posts_nav_link(); ?>
	                    </div>
			</div>

			<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
				<div id="sidebar2"  class="widget-area">
					<div class="sidebar-container">
					  <?php dynamic_sidebar( 'secondary-widget-area' );  ?>
					</div>
				</div>     
				<?php } ?>
		
		<div class="clear"></div>
	
			  <?php
		global $post;
			  $withcomments = true;
			  wp_reset_query();
			  if(comments_open())
			  {  ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php
				}		
			?>
	</div>
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
          <?php } 
			  
			  ?>
</div>
<?php get_footer(); ?>
