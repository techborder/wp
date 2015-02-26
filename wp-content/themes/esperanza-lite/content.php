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
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php esperanza_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php 
			if(of_get_option('esperanza_excerpt_home_page', false) != true) { 
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'esperanza' ) );
			} else {
				the_excerpt();
			}			
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'esperanza' ),
				'after'  => '</div>',
			) );
		?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>

	
</article><!-- #post-## -->