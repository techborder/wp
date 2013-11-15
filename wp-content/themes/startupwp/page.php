<?php get_header(); ?>
<article id="content">
<?php while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-content">
<?php 
if ( has_post_thumbnail() ) {
the_post_thumbnail();
} 
?>
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'startup' ) . '&after=</div>') ?>
<?php edit_post_link( __( 'Edit', 'startup' ), '<div class="edit-link">', '</div>' ) ?>
</div>
</div>
<?php comments_template( '', true ); ?>
<?php endwhile;?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>