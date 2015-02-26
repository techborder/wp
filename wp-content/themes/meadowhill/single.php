<?php
/**
 * The post template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_post(); ?>

<?php if ( $meadowhill_options_db['meadowhill_display_meta_post'] == '' || $meadowhill_options_db['meadowhill_display_meta_post'] == 'Display' ) { ?>
<p class="post-info"><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>

<?php the_content( 'Continue reading' ); ?>

<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'meadowhill' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php endwhile; endif; ?>

<?php if ( $meadowhill_options_db['meadowhill_next_preview_post'] == '' || $meadowhill_options_db['meadowhill_next_preview_post'] == 'Display' ) :  meadowhill_prev_next('meadowhill-post-nav');  endif; ?>

<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>