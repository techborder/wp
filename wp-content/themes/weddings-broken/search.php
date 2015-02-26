<?php 
/*
Template Name: Search Page
*/
global $query_string, $dor_general_settings_page;

//for update general_settings

foreach ($dor_general_settings_page->options_generalsettings as $value)
 {
    if (get_theme_mod( $value['var_name'] ) === FALSE)
	{
		$$value['var_name'] = $value['std']; 
	}
	else 
	{
		$$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}
		
query_posts($query_string .'&showposts=999');
get_search_query();
get_header();

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
			<?php }  ?>
	<div id="blog" class="blog search">
		<div>
			<h3 ><?php echo __('Search', 'wd_wedding'); ?></h3>
			<div class="search-result-info">		
				<p><?php 
				if(count($wp_query->get_posts())==0){
					echo __('No results found', 'wd_wedding');
					?>
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
					}
				else
					echo __('Count', 'wd_wedding')." ".count($wp_query->get_posts()) ; ?> 
				</p>
			</div>
		</div>
		<?php /*print page content*/ 
		if( have_posts() ) { 
			while( have_posts()){ 
				the_post(); ?>
				 <div class="single-post">
					
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
						</a>
					
					
					<?php wedding_entry_cont(); ?>
					<div class="clear"></div>
				</div>
	  <?php } ?>
	     	<div class="page-navigation">
				<?php posts_nav_link(); ?>
			</div>
	  
	<?php	}
?>
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
</div>

<?php get_footer(); ?>
