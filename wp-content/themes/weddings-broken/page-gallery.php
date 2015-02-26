<?php 
/*
Template Name: Gallery Page
*/
//wp_print_scripts('thickbox');
wp_enqueue_style('thickbox'); 
wp_print_scripts('thickbox');
get_header(); 
wedding_update_page_layout_meta_settings();
 ?>
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

		<script>
			
       //on hover script
            jQuery(document).ready(function() {
			
			
                var zoom = 1.1
                    move = '0';
                    
            jQuery('.GalleryPost').hover(function() { 
             
                jQuery(this).find('img').stop(false,true).animate({ 'top':move, 'left':move}, {duration:300});
                jQuery(this).find('div.caption').stop(false,true).fadeIn(300);
            },
            function() {
                jQuery(this).find('img').stop(false,true).animate({
				
					  'top':'0', 'left':'0'}, {duration:300});   
                jQuery(this).find('div.caption').stop(false,true).fadeOut(400);
            });
         
        });
       
        </script>
        <style>
		
                .zoom-icon{
                   width: 50px !important;
					height: 50px !important;
				
                }
               
    
                .GalleryPost{
                    height: 195px;
                }
				
				.phone .GalleryPost{
					width: 100%;
				}
				 .GalleryPost img {					
					width: 100%;

                }
				#TB_window{
					width: auto !important;
				}
				#TB_window img#TB_Image{
					margin: 0 !important;
					border-right: 1px solid #666;
					border-bottom: 1px solid #666; 
				}
				#TB_load{
					width:230px !important;
				}
				#TB_caption,
				#TB_closeWindow{
					height: 0px;
					padding: 0px;
				}
            </style>
               
       <?php 
            global $post;
		    wp_reset_query();
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
        ?>
        <script>
			jQuery(document).ready(function() {
				jQuery('.GalleryPost img').removeAttr('width');
				jQuery('.GalleryPost img').removeAttr('height');
			});
        </script>
		
        
            
        <?php
            /*print page content*/ 
            if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <div class="single-post">
                        <h3 class="page_title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
					
				<?php endwhile; 
			endif; 
    
            global $wp_query;
            $temp = $wp_query;
            $wp_query= null;
            $wp_query = new WP_Query();
			if(!isset($web_business_meta['gallery_perpage'])){
				$web_business_meta['gallery_perpage']=0;
			}
			
            $wp_query->query('showposts='.($web_business_meta['gallery_perpage']).'&paged='.$paged.'&cat='.$cat_query);
                while ($wp_query->have_posts()) : $wp_query->the_post(); 
                     
            ?>
            
                        <div class="GalleryPost">
								<a href="<?php the_permalink(); ?>">
									<?php  echo wedding_thumbnail('350','300'); ?>
								</a>
								 <?php
								$tumb_id=get_post_thumbnail_id( $post->ID );												
								$thumb_url=wp_get_attachment_image_src($tumb_id,'full');														
								$thumb_url=$thumb_url[0];					
								?>
                                <div class="caption">
                                    <a class="<?php echo $post->ID; ?> thickbox" href="<?php echo $thumb_url; ?>?TB_iframe=1&tbWidth=800&tbHeight=600" >
									   <img class="zoom-icon"  src="<?php echo get_template_directory_uri( 'template_url' ); ?>/images/zoom-icon.png" >
									</a>
                                   
									<?php //wedding_the_excerpt_max_charlength(25); ?>
                                </div>
                        </div>
                        <?php                    
                endwhile; ?>
				<div class="page-navigation">
		              <?php posts_nav_link(); ?>
	               </div>
</div>

				
<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
	<div id="sidebar2"  class="widget-area" role="complementary">
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
		{   ?>	
			 <div class="clear"></div>
             <br />
            <div class="comments-template">
                <?php echo comments_template(); ?>
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
          <?php }   ?>
</div>	

<?php get_footer(); ?>
