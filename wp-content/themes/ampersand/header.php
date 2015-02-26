<?php
/**
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Ampersand
 * @since Ampersand 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
			<div class="header-inside">
				<div class="navigation-wrap clearfix">
					<div class="hgroup">
						<?php if ( get_theme_mod( 'ampersand_customizer_logo' ) ) { ?>
					    	<h1 class="logo-image">
								<a href="<?php echo home_url( '/' ); ?>">
									<img src="<?php echo esc_url( get_theme_mod( 'ampersand_customizer_logo' ) );?>" alt="<?php the_title_attribute(); ?>" />
									<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
								</a>
							</h1>
					    <?php } else { ?>
							<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>

							<?php if ( ! get_theme_mod( 'ampersand_hide_tagline', true ) ) { ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
							<?php } ?>
						<?php } ?>
					</div>

					<div class="navigation-wrap-inside clearfix">
						<div class="navigation-toggle">
							<nav role="navigation" class="site-navigation main-navigation">
								<h1 class="menu-toggle"><i class="fa fa-bars"></i> <?php _e( 'Menu', 'ampersand' ); ?></h1>
								<div class="assistive-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'ampersand' ); ?></a></div>
								<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
							</nav><!-- .site-navigation .main-navigation -->
						</div>
					</div><!-- .navigation-wrap-inside -->
				</div><!-- .navigation-wrap -->

				<?php get_template_part( 'template-titles' ); ?>
			</div><!-- .header-inside -->
		</div><!-- .header-wrap -->
	</header><!-- #masthead .site-header -->

	<div class="inside-page animated fadeIn">