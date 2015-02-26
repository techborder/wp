<?php
/**
 * Template Name: Logged In
 * The template file for displaying the page content only for logged in users.
 * @package MeadowHill
 * @since MeadowHill 1.1.2
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if ( is_user_logged_in() ) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_page(); ?>

<?php the_content( 'Continue reading' ); ?>
<?php endwhile; endif; ?>

<?php comments_template( '', true ); ?>
<?php } else { ?>
<h1 class="section-headline"><?php the_title(); ?></h1>
<p class="logged-in-message"><?php _e( 'You must be logged in to view this page.', 'meadowhill' ); ?></p>
<?php wp_login_form(); } ?>
  </div> <!-- end of content -->
  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>