<?php 

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
		<div id="blog" class="blog" >		
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					  <div class="single-post single-page">
							<h3 class="page_title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>						 
						<?php the_content();  ?>
					 </div>				
			    <?php endwhile; ?>
			   <div class="navigation">
					<?php posts_nav_link(); ?>
			   </div>
			<?php endif; ?>
			
<?php
               global $post;
			   $withcomments = true;
				if(comments_open())
				{	wp_reset_query(); ?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php
				}		
			?>

  </div>
  <?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
	<div id="sidebar2"  class="widget-area" role="complementary">
		<div class="sidebar-container">
			<?php dynamic_sidebar( 'secondary-widget-area' );  ?>
		</div>
	</div>     
			<?php } ?>
	   <div class="clear"></div>
	</div>
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
          <?php } ?>                 
<?php get_footer(); ?>