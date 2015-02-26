<?php
/**
 * The tag archive template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
<?php if ( have_posts() ) : ?>
    <h1 class="section-headline"><?php printf( __( 'Tag Archive: %s', 'meadowhill' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php if ( tag_description() ) : ?><div class="archive-meta"><?php echo tag_description(); ?></div><?php endif; ?>
    <div class="post-entries-wrapper">    
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php meadowhill_content_nav( 'nav-below' ); ?>
    </div>    
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>