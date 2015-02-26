<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Esperanza
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<?php if( of_get_option( 'esperanza_stripe_overlay', true ) != false ) { ?>
	<div class="bl-background">
		<div id="stripe"></div>
	</div>
	<?php } ?>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>	
		<header id="masthead" class="site-header <?php if( of_get_option( 'esperanza_sticky_header' ) != false ) { echo 'affix'; } ?>" role="banner">
			<div class="container">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h2 class="menu-toggle">
						<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="clearfix"></div>
					</h2>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'esperanza' ); ?></a>
					<a class="brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='Esperanza' rel='home'>				
					<?php if ( get_theme_mod( 'esperanza_logo' ) || get_theme_mod( 'esperanza_logo_text' ) ) : ?>
						<?php if ( 'image' == get_theme_mod( 'esperanza_logo_type' ) ) : ?>						
							<img src='<?php echo esc_url( get_theme_mod( 'esperanza_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>						
						<?php else : ?>						
							<span><?php if(get_theme_mod( 'esperanza_logo_text')) { echo get_theme_mod( 'esperanza_logo_text'); } else { echo esc_attr( get_bloginfo( 'name', 'display' ) ); } ?></span>						
						<?php endif; ?>
					<?php else : ?>					
						<span><?php bloginfo( 'name' ); ?></span>					
					<?php endif; ?>				
					</a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<div class="clearfix"></div>
				</nav><!-- #site-navigation -->
			</div><!-- .container -->
		</header><!-- #masthead -->
		<div id="content" class="site-content container">