<?php
/**
 * Template Name: Homepage
 * The template file for displaying a static homepage with About, Portfolio, Image, Informational and Blog sections.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<?php if ($meadowhill_options_db['meadowhill_display_about_section'] != 'Hide'){ ?>
<div id="wrapper-about">
  <div class="container">
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
    <h2 class="section-headline">ABOUT SECTION</h2>
    <p><?php _e( 'For editing this area, please go to the <strong>Appearance > Widgets</strong> panel in your WordPress administration and insert as many Text widgets as you like into "<strong>About Section on homepage</strong>" widget area. You also can insert into the Text widgets the custom shortcodes (for displaying images, specific post listings, etc. - see Theme documentation).' , 'meadowhill' ); ?></p>
    <p><?php _e( 'If you do not want to display this area, go to the "Theme Options" panel. In "Homepage Settings", you can hide this area.' , 'meadowhill' ); ?></p>
<?php endif; ?>
  </div>
</div>     <!-- end of wrapper-about -->
<?php } ?>

<?php if ($meadowhill_options_db['meadowhill_display_portfolio_section'] != 'Hide'){ ?>
<div id="wrapper-portfolio">
  <div class="container">
    <h2 class="section-headline"><?php if ( $meadowhill_options_db['meadowhill_portfolio_headline'] != '' ){ echo esc_attr($meadowhill_options_db['meadowhill_portfolio_headline']); } 
      else { _e( 'PORTFOLIO SECTION' , 'meadowhill' ); } ?></h2>
    <div class="portfolio-boxes-wrapper">
<?php if ( $meadowhill_options_db['meadowhill_portfolio_category'] != '0' && $meadowhill_options_db['meadowhill_portfolio_category'] != '' ) { ?>
<?php $args1 = array(
  'cat' => esc_attr($meadowhill_options_db['meadowhill_portfolio_category']),
  'showposts' => esc_attr($meadowhill_options_db['meadowhill_portfolio_items']),
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

<?php } else { ?>    
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 1' , 'meadowhill' ); ?></a></h3>
      </div>
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 2' , 'meadowhill' ); ?></a></h3>
      </div>
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 3' , 'meadowhill' ); ?></a></h3>
      </div>
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 4' , 'meadowhill' ); ?></a></h3>
      </div>
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 5' , 'meadowhill' ); ?></a></h3>
      </div>
      <div class="portfolio-box">
        <a class="portfolio-link" href="#nogo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/portfolio.jpg" alt="image" /></a>
        <h3><a class="portfolio-link" href="#nogo"><?php _e( 'Portfolio Item 6' , 'meadowhill' ); ?></a></h3>
      </div>
<?php } ?> 
    </div>   
  </div>
</div>     <!-- end of wrapper-portfolio -->
<?php } ?>

<?php if ( $meadowhill_options_db['meadowhill_display_informational_section'] != 'Hide' ){ ?>
<div id="wrapper-informational">
  <div class="container">
<?php if ( dynamic_sidebar( 'sidebar-7' ) ) : else : ?>
    <h2 class="section-headline">INFORMATIONAL SECTION</h2>
    <p><?php _e( 'For editing this area, please go to the <strong>Appearance > Widgets</strong> panel in your WordPress administration and insert as many Text widgets as you like into "<strong>Informational Section on homepage</strong>" widget area. You also can insert into the Text widgets the custom shortcodes (for displaying images, specific post listings, etc. - see Theme documentation).' , 'meadowhill' ); ?></p>
    <p><?php _e( 'If you do not want to display this area, go to the "Theme Options" panel. In "Homepage Settings", you can hide this area.' , 'meadowhill' ); ?></p>
<?php endif; ?>
  </div>
</div>     <!-- end of wrapper-informational -->
<?php } ?>

<?php if ( $meadowhill_options_db['meadowhill_display_image_section'] != 'Hide' ){ ?>
<div id="wrapper-image">
  <div class="container">
    <div class="image-description">
<?php if ( $meadowhill_options_db['meadowhill_display_text_image_section'] != 'Hide' ){ ?>
      <p><?php if ( $meadowhill_options_db['meadowhill_image_section_text'] != '' ){ echo esc_attr($meadowhill_options_db['meadowhill_image_section_text']); } 
      else { _e( 'For editing this text, go to Theme Options > Homepage Settings > Image Section.' , 'meadowhill' ); } ?></p>
<?php } ?>

<?php if ( $meadowhill_options_db['meadowhill_display_read_more_image_section'] != 'Hide' ) { ?>
      <a class="read-more-button" href="<?php echo esc_url($meadowhill_options_db['meadowhill_read_more_image_section_link']); ?>"><?php _e( 'READ MORE' , 'meadowhill' ); ?></a>
<?php } ?>
    </div>
  </div>
<div class="image-pattern">
</div>
</div>     <!-- end of wrapper-image -->
<?php } ?>

<?php if ( $meadowhill_options_db['meadowhill_display_blog_section'] != 'Hide' ){ ?>
<div id="wrapper-blog">
  <div class="container">
    <h2 class="section-headline"><?php if ( $meadowhill_options_db['meadowhill_blog_headline'] != '' ){ echo esc_attr($meadowhill_options_db['meadowhill_blog_headline']); } 
      else { _e( 'BLOG SECTION' , 'meadowhill' ); } ?></h2>
    <div class="post-entries-wrapper">
<?php $args = array(    
	'post_type' => 'post',
	'post_status' => 'publish',
  'showposts' => esc_attr($meadowhill_options_db['meadowhill_blog_items'])
);
$blog_query = new WP_Query( $args ); 
                
if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
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
    </div>
  </div>
</div>     <!-- end of wrapper-blog -->
<?php } ?>
<?php get_footer(); ?>