<?php
get_header();
wedding_update_page_layout_meta_settings(); ?>	
</div>	
</div>
<div id="content" class="page">
	<div class="container">
			<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1"  class="widget-area" role="complementary">
				<div class="sidebar-container">
					<?php dynamic_sidebar( 'primary-widget-area' ); ?>
				</div>
			</div>
			<?php } ?>
		   <div id="blog" class="blog">
				<h1 class="page-title" style="text-align: center;letter-spacing: 8px;"><?php _e('<span>Error</span> 404', 'wd_wedding'); ?></h1>
				<p style="text-align: center;"><?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address. Try searching:', 'wd_wedding'); ?></p>
				<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
								<div id="searchbox">
									<div class="searchback">
										<input  type="text" value="" name="s" id="s" class="searchbox_search" placeholder="<?php echo __('Type here','wd_wedding'); ?>"/> 
										<input type="submit" id="searchsubmit" value="<?php echo __('Search','wd_wedding'); ?>" class="read_more"/>
									</div>																		
							   </div>
				</form>
				<img class="imgBox" src="<?php  echo get_template_directory_uri('template_url'); ?>/images/404.png">	     				
		  </div>

    <?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
			<div id="sidebar2" class="widget-area">
				<div class="sidebar-container">
					  <?php dynamic_sidebar( 'secondary-widget-area' );  ?>
				</div>
			</div>     
		<?php } ?>
		
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
