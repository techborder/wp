<?php
/**
 * blogbox Post Format Image
 *
 *The Image Post Format is basically the same as the Standard Post Format. The only 
 * difference is that there is a drop shadow on the images. Thus not ideal for embedding 
 * in your post, but you can if you want. It is really designed for single images with a 
 * little text.
 *
 *
 * @package		blogBox WordPress Theme
 * @copyright	Copyright (C) 2015, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */

/* Get the user choices for the theme options */
global $blogbox_options;

$display_post_icon = $blogbox_options['bB_use_post_format_icons'];
?>	
<h2 class="post-title">
	 <?php 	
		if ( $display_post_icon == 1 ) {
			echo '<span class="post-icon"><i class="fa fa-picture-o" title="Image"></i></span>';
		} 
	?>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	<?php if ( comments_open()) {
		$post_comments = get_comments( array ( 'type' => 'comment', 'post_id' => $post->ID )); ?>
		<span class="comments"><a href="<?php comments_link(); ?>"><i class="fa fa-comment" title="Comments"></i>&nbsp;<?php echo count($post_comments); ?></a></span>
	<?php } ?>
</h2>

<div class="clearfix"></div>

<?php blogbox_post_metatop(); ?>

<div class="clearfix"></div>

<?php  if (has_post_thumbnail()) {
	echo '<div class="image-post-feature">';
		the_post_thumbnail(array(600,600));
	echo '</div>';
} ?>
	
<div class="image-entry">
	<?php the_content(esc_html__('Read more','blogbox')); ?>
</div>

<div class="clearfix"></div>

<?php blogbox_post_metabottom('image') ?>

<div class="clearfix"></div>