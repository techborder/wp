<?php
  $is_front_page = get_option('spa_theme_options',spa_the_theme_setup());
  if ( 'posts' == get_option( 'show_on_front') && $is_front_page['front_page'] != 'yes' ) {
  get_template_part('index');
  }
  else { 
  get_header(); 
  get_template_part('index', 'slider') ;
  get_template_part('index', 'services'); 
  get_template_part('index','product'); 
  get_template_part('index','news');
  get_footer();
  }
  ?>