<?php
/**
 * @package Esperanza
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="entry-image">
		<a href="<?php echo get_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<?php } ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php esperanza_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'esperanza' ),
				'after'  => '</div>',
			) );
		?>
		<footer class="entry-meta">
			<?php $tag_list = get_the_tag_list( '<span class="tags-links">', __( '', 'esperanza' ), '</span>' ); ?>
			
			<?php 
				if ( '' != $tag_list ) {
					// This blog has tags so we should probably display them here
					$tag_text = __( '%1$s', 'esperanza' );
					printf(
						$tag_text,
						$tag_list
					);
				} // end check for tags on this blog
			?>
			
		</footer><!-- .entry-meta -->
	</div><!-- .entry-content -->
			
	<?php esperanza_post_navigation(); ?>
	
	<div id="authorbio">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?>			
		</div>
		<div class="authorinfo">
			<h3><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h3>
			<?php the_author_meta( 'description' ); ?>			
		</div>
		<div class="clearfix"></div>
		<hr />
	</div>
</article><!-- #post-## -->