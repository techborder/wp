<?php
/**
 * Template Name: Landing Page
 * The template file for displaying a landing page without the menus, right sidebar and footer widget areas.
 * @package MeadowHill
 * @since MeadowHill 1.1.4
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content" class="full-width">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_page(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
  </div> <!-- end of content -->   
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>