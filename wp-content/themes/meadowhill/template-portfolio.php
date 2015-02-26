<?php
/**
 * Template Name: Portfolio
 * The template file for displaying page with Portfolio Items.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content" class="full-width">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_page(); ?>

<?php the_content( 'Continue reading' ); ?>
<?php endwhile; endif; ?>

  </div> <!-- end of content -->
   
  </div>
</div>     <!-- end of wrapper-content -->

<div id="wrapper-portfolio">
  <div class="container">
    <h2 class="section-headline"><?php if ( $meadowhill_options_db['meadowhill_portfolio_headline'] != '' ){ echo esc_attr($meadowhill_options_db['meadowhill_portfolio_headline']); } 
      else { _e( 'PORTFOLIO SECTION' , 'meadowhill' ); } ?></h2>
    <div class="portfolio-boxes-wrapper">
<?php if ( $meadowhill_options_db['meadowhill_portfolio_category'] != '0' && $meadowhill_options_db['meadowhill_portfolio_category'] != '' ) { ?>
<?php $args1 = array(
  'cat' => esc_attr($meadowhill_options_db['meadowhill_portfolio_category']),
  'showposts' => '-1',
	'post_type' => 'post',
	'post_status' => 'publish'
);
$my_query = new WP_Query( $args1 ); 
                
if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php if ( has_post_thumbnail() ) : ?>
      <div class="portfolio-box">
        <a class="portfolio-link" title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-thumb' ); ?></a>
        <h3><a class="portfolio-link" title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php meadowhill_short_title(); ?></a></h3>
      </div>
<?php endif; ?>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

<?php } ?>    
    </div>   
  </div>
</div>     <!-- end of wrapper-portfolio -->
<?php get_footer(); ?>