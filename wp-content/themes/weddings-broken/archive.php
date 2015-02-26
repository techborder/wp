<?php  get_header(); ?>
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

	<?php if (have_posts()) : 
	      $post = $posts[0]; 
		
		 if (is_category()) { ?>
		<h2><?php _e('Archive For The ', 'wd_wedding'); ?>&ldquo;<?php single_cat_title(); ?>&rdquo; <?php _e('Category', 'wd_wedding'); ?></h2>
	 	<?php  } elseif( is_tag() ) { ?>
		<h2 class="styledHeading"><?php _e('Posts Tagged ', 'wd_wedding'); ?>&ldquo;<?php single_tag_title(); ?>&rdquo;</h2>
		<?php  } elseif (is_day()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'wd_wedding'); ?><?php the_time( get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_month()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'wd_wedding'); ?><?php the_time( get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_year()) { ?>
		<h2 class="styledHeading"><?php _e('Archive For ', 'wd_wedding'); ?><?php the_time( get_option( 'date_format' )); ?></h2>
		<?php  } elseif (is_author()) { ?>
		<h2 class="styledHeading"><?php _e('Author Archive', 'wd_wedding'); ?></h2>
		<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="styledHeading"><?php _e('Blog Archives', 'wd_wedding'); ?></h2>
	 	<?php } ?>
			
		<?php while (have_posts()) : the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post">
					<h3>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
							   
			   <?php  wedding_entry_cont(); ?>
			   
			</div>			
		</div>

		<?php endwhile; ?>
		  	<div class="page-navigation">
		       <?php posts_nav_link(); ?>
	        </div>
	<?php else : ?>

		<h2 ><?php _e('Not Found', 'wd_wedding'); ?></h2>
		<p><?php _e('There are not posts belonging to this category or tag. Try searching below:', 'wd_wedding'); ?></p>
		<?php get_search_form(); ?>
	
	<?php endif; ?>
	



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
