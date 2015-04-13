<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package aldehyde
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aldehyde' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	

	<header id="masthead" class="site-header" role="banner" data-parallax="scroll" data-image-src="<?php echo get_header_image() ?>" data-position-x="<?php echo get_theme_mod('aldehyde_himg_align','center'); ?>;" >
	
		<div id="top-bar">
			<div class="container">
				<div id="top-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'top', /* 'link_before' => '<span class="hvr-shutter-in-vertical">', 'link_after' => '</span>' */ ) ); ?>
				</div>
				<div class="social-icons">
				<?php get_template_part('social', 'fa'); ?>
				<a id="searchicon">
					<i class="fa fa-search"></i>
				</a>	 
				</div>
			</div>
		</div>
	
		<div class="container">
		<?php $aldehyde_branding_class =  get_theme_mod('aldehyde_center_logo') ? 'col-md-12 col-sm-12 col-xs-12' : 'col-md-4';
			  $aldehyde_menu_class =  get_theme_mod('aldehyde_center_logo') ? 'col-md-12' : 'col-md-8';  ?>
			<div class="site-branding <?php echo $aldehyde_branding_class; ?>">
				<?php if ( get_theme_mod('aldehyde_logo') != "" ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod('aldehyde_logo'); ?>"></a>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
				<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>	
			
			
			<nav id="site-navigation" class="main-navigation <?php echo $aldehyde_menu_class; ?>" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
			<div id="slickmenu"></div>
			
		</div>	<!--container-->
		
		<?php get_template_part('slider', 'nivo' ); ?>
		
	</header><!-- #masthead -->
	
	<div class="mega-container" >
			
		<div id="content" class="site-content container">