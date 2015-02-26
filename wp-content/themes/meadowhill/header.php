<?php
/**
 * The header template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $meadowhill_options_db; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?>
<?php if ($meadowhill_options_db['meadowhill_favicon_url'] != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($meadowhill_options_db['meadowhill_favicon_url']); ?>" />
<?php } ?>
<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?> id="wrapper">
 
<div id="wrapper-header">
  <div id="header">
    <div class="header-bar">
      <div class="title-box">
<?php if ( $meadowhill_options_db['meadowhill_header_title_format'] != 'Logo' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
<?php if ( $meadowhill_options_db['meadowhill_logo_url'] != '' ){ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($meadowhill_options_db['meadowhill_logo_url']); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } else { ?>
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
<?php } ?>
      </div>
      
<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
      <div class="menu-box"><?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'header-menu' ) ); ?></div>
<?php }} ?>
    </div>
    
<?php if ( is_home() || is_front_page() ) { ?>
    <div class="header-description">
<?php if ( $meadowhill_options_db['meadowhill_display_site_description_homepage'] != 'Hide' ) { ?>
      <h1 class="site-description"><?php bloginfo( 'description' ); ?></h1>
<?php } ?>
<?php if ( $meadowhill_options_db['meadowhill_display_read_more_homepage'] != 'Hide' ) { ?>
      <a class="read-more-button" href="<?php echo esc_url($meadowhill_options_db['meadowhill_read_more_link']); ?>"><?php _e( 'READ MORE' , 'meadowhill' ); ?></a>
<?php } ?>
    </div>
<?php } ?>
  </div>
<div class="header-pattern">
</div>
</div>     <!-- end of wrapper-header -->