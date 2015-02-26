<?php
/**
 * Template Name: Page without Comments
 * The template file for pages without the comments section.
 * @package MeadowHill
 * @since MeadowHill 1.1.3
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_page(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
  </div> <!-- end of content -->  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>