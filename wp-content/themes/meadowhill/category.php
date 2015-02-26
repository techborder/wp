<?php
/**
 * The category archive template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
<?php if ( have_posts() ) : ?>
    <h1 class="section-headline"><?php single_cat_title(); ?></h1>
<?php if ( category_description() ) : ?><div class="archive-meta"><?php echo category_description(); ?></div><?php endif; ?>
    <div class="post-entries-wrapper">    
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php meadowhill_content_nav( 'nav-below' ); ?>
    </div>    
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>