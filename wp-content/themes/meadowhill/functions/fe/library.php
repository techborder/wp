<?php 
/**
 * Library of Theme options functions.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/  

// Display featured images on single posts
function meadowhill_get_display_image_post() { 
    global $meadowhill_options_db;
		if ( $meadowhill_options_db['meadowhill_display_image_post'] == '' || $meadowhill_options_db['meadowhill_display_image_post'] == 'Display' ) { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( $meadowhill_options_db['meadowhill_display_sidebar'] == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function meadowhill_get_display_image_page() {
    global $meadowhill_options_db; 
		if ( $meadowhill_options_db['meadowhill_display_image_page'] == '' || $meadowhill_options_db['meadowhill_display_image_page'] == 'Display' ) { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( is_page_template('template-full-width.php') || is_page_template('template-portfolio.php') || $meadowhill_options_db['meadowhill_display_sidebar'] == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
    <?php endif; ?>
<?php } 
} ?>