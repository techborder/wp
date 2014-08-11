<?php
/**
 * @package Inkzine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("row archive col-md-4 col-sm-6 homepage-article"); ?>>	
	<div class="featured-thumb col-md-12 col-xs-12">
	<div class="img-meta">
		<div class="meta-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
		<div class="img-meta-link meta-icon"><a class='meta-link' href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a></div>
		<?php if (has_post_thumbnail()) : 
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
		?>
		<div class="img-meta-img meta-icon"><a class='meta-link meta-link-img' title="<?php the_title(); ?>" href="<?php echo $thumb_url[0] ?>"><i class="fa fa-picture-o"></i></a></div>
		<?php endif; ?>
		
	</div>
	<a href="<?php the_permalink(); ?>">
	<?php if (has_post_thumbnail()) :
		the_post_thumbnail();
		else: ?>
	      <img src="<?php echo get_template_directory_uri() ?>/images/cthumb.png">
	<?php				
	endif; 
	?>
	</a>
	</div>
</article><!-- #post-## -->