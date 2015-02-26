<?php
/**
 * The main template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
    <h2 class="section-headline"><?php if ( $meadowhill_options_db['meadowhill_blog_headline'] != '' ){ echo esc_attr($meadowhill_options_db['meadowhill_blog_headline']); } 
      else { _e( 'BLOG SECTION' , 'meadowhill' ); } ?></h2>
    <div class="post-entries-wrapper">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php post_class('post-entry'); ?>>
        <h3 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="post-info"><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?><?php if ( comments_open() ) : ?><span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span><?php endif; ?></p>
        <div class="post-thumbnail">
          <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          <a class="post-read-more" href="<?php echo get_permalink(); ?>"><?php _e( 'READ MORE' , 'meadowhill' ); ?></a>
        </div>
        <div class="post-entry-content"><?php global $more; $more = 0; ?><?php the_content(); ?></div>
      </div>
<?php endwhile; endif; ?>
<?php meadowhill_content_nav( 'nav-below' ); ?>
    </div>
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>