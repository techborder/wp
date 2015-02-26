<?php
/**
 * The WooCommerce pages template file.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/
get_header(); ?>
  <div id="headline-wrapper">
    <h1 class="content-headline"><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></h1>
  </div>  
<?php liveride_get_breadcrumb(); ?>  
  <div id="main-content">    
    <div id="content">    
      <div class="entry-content">
<?php woocommerce_content(); ?>
      </div>  
    </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>