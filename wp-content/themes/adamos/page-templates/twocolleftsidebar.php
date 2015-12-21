<?php
/*
 * Template Name: Left sidebar
 * Description: A custom page template with sidebar on the left
 *
 * @package adamos
 * @since adamos 1.0
 */

get_header(); ?>

		<div id="primary-right" class="content-area">
			<div id="content-right" class="site-content" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<aside id="sidebar-left">
	 <?php if ( is_active_sidebar( 'sidebar-3' ) && dynamic_sidebar('sidebar-3') ) : else : ?>
			<?php echo '<h4>' . __('Widget Ready', 'adamos') . '</h4>'; ?>
            <?php echo '<p>' . __('This left column is widget ready! Add one in the admin panel.', 'adamos') . '</p>'; ?>     
	<?php endif; ?>  
</aside>
<?php get_footer(); ?>