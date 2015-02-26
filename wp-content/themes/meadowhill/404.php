<?php
/**
 * The 404 page (Not Found) template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
    <h1 class="section-headline"><?php _e( 'Nothing Found', 'meadowhill' ); ?></h1>
    <p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'meadowhill' ); ?></p>
<?php get_search_form(); ?>
  </div> <!-- end of content -->
  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>