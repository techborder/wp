<?php
/**
 * The search results template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
<?php if ( have_posts() ) : ?>
    <h1 class="section-headline"><?php printf( __( 'Search Results for: %s', 'meadowhill' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <p class="number-of-results"><?php _e( 'Number of Results: ', 'meadowhill' ); ?><?php echo $wp_query->found_posts; ?></p>
    <div class="post-entries-wrapper">    
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h3 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'meadowhill' ); ?></h3>
      <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'meadowhill' ),
	'next_text' => __( 'Next &rarr;', 'meadowhill' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
      </p>
		</div>
<?php endif; ?>
    </div>
    
<?php else : ?>
    <h1 class="section-headline"><?php _e( 'Nothing Found', 'meadowhill' ); ?></h1>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'meadowhill' ); ?></p>
    <?php get_search_form(); ?>
<?php endif; ?>    
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>