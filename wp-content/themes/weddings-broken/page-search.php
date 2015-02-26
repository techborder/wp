<?php 
/*
Template Name: Search Page
*/

get_header();
wedding_update_page_layout_meta_settings();?>
<div id="content" class="page">
     <div class="container">
	 <?php
		 if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>  
        <div id="sidebar1" class="widget-area" role="complementary">          
          <div class="sidebar-container">
              <?php dynamic_sidebar( 'primary-widget-area' ); ?>
          </div>
        </div><!-- #first .widget-area -->
	<?php }
    
            global $post;
			wp_reset_query();
            $web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE);
            $cats = get_categories('hide_empty=0');
            $cat_query="";           
            foreach ($cats as $categs)
			{
                if (isset($web_business_meta["categor-".$categs->cat_ID]) && $web_business_meta["categor-".$categs->cat_ID]=="on") 
				{
                    $cat_query.=$categs->cat_ID.",";
                }                         
            }
        ?>
		
        <div id="blog" class="blog">       
									<?php /*print page content*/ 
						if( have_posts() ) { 
							while( have_posts()){ 
								the_post(); ?>
								 <div class="single-post">
									<h3 class="page_title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="entry">
										<?php the_content(); ?>
									</div>
								</div>
					  <?php }
						}; ?>
							<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
								<div id="searchbox">
									<div class="searchback">
										<input type="text" value="<?php echo __('Search...','sp_webBusiness'); ?>" name="s" id="s" class="searchbox_search" pplaceholder="Search..." onclick="if(document.getElementById('s').value=='Search...'){ this.value=''; }" onblur="this.value=!this.value?'Search...':this.value;" /> 										
										<input type="submit" id="searchsubmit" value="<?php echo __('Search','sp_webBusiness'); ?>" class="read_more" />
									</div>
									
									<div class="search-settings-block">
										<label  id="inc-posts" style="margin-right: 14px;"><input type="checkbox" name="inc-posts" /><?php echo __('Posts','sp_webBusiness'); ?></label>
										<label  id="inc-pages"  style="margin-right: 14px;"><input type="checkbox" name="inc-pages" /><?php echo __('Pages','sp_webBusiness'); ?></label>
										<script>
											$("#inc-posts input").click(function(){
												if($(this).parent().hasClass("active")){$(this).parent().removeClass("active");}
												else{$(this).parent().addClass("active");}
											});
											$("#inc-pages input").click(function(){
												if($(this).parent().hasClass("active")){$(this).parent().removeClass("active");}
												else{$(this).parent().addClass("active");}
											});
										</script>
										<div class="styled-select"><?php wp_dropdown_categories( 'show_option_all='.__('All Categories','sp_webBusiness').'' ); ?> </div>
										<div class="styled-select">
										</div>
									 </div>
								 </div>
							</form>
							<?php            
			global $post;
			$withcomments = true;
			wp_reset_query();
				if(comments_open()){	
			?>
					<div class="comments-template">
						<?php echo comments_template();	?>
					</div>
			<?php
				} ?>
		</div>
	
<?php

     if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
        <div id="sidebar2" class="widget-area" role="complementary">         
             <div class="sidebar-container">
                 <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
             </div>
        </div><?php } ?>
    <div style="clear:both"></div> 
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