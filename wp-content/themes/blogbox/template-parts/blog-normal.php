<?php
/**
 * Template Part, normal blog
 *
 * used in home.php
 * 
 *
 * @package		blogBox WordPress Theme
 * @copyright	Copyright (C) 2015, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 global $blogBox_options;
?>
<?php get_header(); ?>

<div id="widecolumn">

	<?php
		$exclude_categories = blogBox_exclude_categories();
		$temp = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query('cat='.$exclude_categories.'&paged='.$paged);
		if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php blogBox_post_format(); ?>
			</div>
		<?php endwhile; ?>
			<?php if(function_exists('wp_pagenavi')) {
				echo '<div class="postpagenav">';
					wp_pagenavi();
				echo '</div>';
			} else { ?>
			<div class="postpagenav">
				<div class="left"><?php next_posts_link(esc_html__('&lt;&lt; older entries','blogBox') ); ?></div>
				<div class="right"><?php previous_posts_link(esc_html__(' newer entries &gt;&gt;','blogBox') ); ?></div>
				<br/>
			</div>
			<?php } ?>
			<?php $wp_query = null; $wp_query = $temp;?>
		<?php else : ?>
		<?php endif; ?>
		<br/>
		
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>