<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkzine
 */
?><!DOCTYPE html>
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
<div id="parallax-bg"></div>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	
	<div id="top-bar">
	<div class="container">
		   <div id="primary-nav-wrapper" class="col-md-12 container">
				<nav id="primary-navigation" class="primary-navigation" role="navigation">
					
						<h1 class="menu-toggle"><?php _e( 'Menu', 'inkzine' ); ?></h1>
						<div class="screen-reader-text skip-link"><a href="#content"><?php _e( 'Skip to content', 'inkzine' ); ?></a></div>
			
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					
				</nav><!-- #site-navigation -->
		</div>
		<div id="fixed-search">
			<?php get_template_part('searchform', 'top') ?>
		</div>	
	</div>
	</div><!--#top-bar-->
	<header id="masthead" class="site-header row container" role="banner">
		<div class="site-branding col-md-12">
		<?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>
			<h1 class="site-title logo-container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php
			echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";	
			}
		else { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> 
			<h2 class="site-description"><?php bloginfo('description') ?></h2>
		<?php	
		}
		?>
		</div>
	</header><!-- #masthead -->
	
	<div id="content" class="site-content row">
	
	<?php
	if ( ( ( of_get_option('tickr_enabled') != 0 ) && (is_home() ) ) )
		{ ?>
    <div id="tickr-wrapper" class="col-md-12 clearfix">
    <div class="tickr-inner-wrapper container">
    <ul class="bxtickr">
    	<?php
    		$args = array( 'posts_per_page' => of_get_option('tickr_count'), 'category' => of_get_option('tickr_category') );
			$lastposts = get_posts( $args );
			foreach ( $lastposts as $post ) :
			  setup_postdata( $post ); ?>
			  	<li><a title="<?php the_title(); ?>" href='<?php the_permalink(); ?>'>
			  	<?php the_title(); ?>
			  	</a></li>
			<?php endforeach; 
			wp_reset_postdata(); 
			?>			
     </ul>   
    </div>
	</div>
    <?php } ?>
	
		<div class="container col-md-12"> 
