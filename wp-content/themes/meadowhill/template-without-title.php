<?php
/**
 * Template Name: Page without Title
 * The template file for pages without the page title.
 * @package MeadowHill
 * @since MeadowHill 1.1.3
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php meadowhill_get_display_image_page(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
  </div> <!-- end of content --> 
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>