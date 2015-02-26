<?php get_header(); ?>
<?php 	
	  wedding_top_posts(); ?>
	</div>	
</div>

<div id="content" >

 <?php  if( is_home() ){
       wedding_home_about_us();
         }  ?>	
	
		<div class="container">
		
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"   class="widget-area">
				<div class="sidebar-container">				
				<?php  dynamic_sidebar( 'primary-widget-area' ); 	?>					
				</div>
			</div>
			<?php } 
			if( is_home() )
				wedding_content_posts();
			else
				wedding_content_posts_for_home();			

            if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
				<div id="sidebar2"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'secondary-widget-area' ); 	?>
					</div>
				</div>
          <?php } ?>
		<div class="clear"></div>
<?php wedding_integrate_is_baner(); ?>
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
          <?php } 
get_footer(); ?>
