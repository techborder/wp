<?php
/**
 * The author archive template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
<?php if ( have_posts() ) : ?>
<?php the_post(); ?>
    <h1 class="section-headline"><?php printf( __( 'Author Archive: %s', 'meadowhill' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>

<?php rewind_posts(); ?>        
<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info">
		<div class="author-description">
			<h2><?php printf( __( 'About %s', 'meadowhill' ), get_the_author() ); ?></h2>
      <div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'meadowhill_author_bio_avatar_size', 60 ) ); ?>
		  </div>
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
		</div>
<?php endif; ?> 
    
    <div class="post-entries-wrapper">    
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php meadowhill_content_nav( 'nav-below' ); ?>
    </div>    
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>