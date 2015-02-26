<?php
/**
 * The template used for displaying page content in page.php
 *
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
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'esperanza' ),
				'after'  => '</div>',
			) );
		?>	<?php edit_post_link( __( 'Edit', 'esperanza' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->