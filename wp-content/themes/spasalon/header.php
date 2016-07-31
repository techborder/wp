<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
?>
<!-- Navbar -->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if( $current_options['enable_logo_text'] == true ){
					bloginfo('name');
				}else{
				?>
				<img alt="<?php bloginfo("name"); ?>" src="<?php echo ( esc_url($current_options['upload_image']) ? $current_options['upload_image'] : get_template_directory_uri() . '/images/logo.png' ); ?>" class="img-responsive" style="width:<?php echo esc_html($current_options['width']).'px'; ?>; height:<?php echo esc_html($current_options['height']).'px'; ?>;">
				<?php } ?>
				
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php _e('Toggle navigation', 'spasalon'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
				wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'  => 'nav-collapse collapse navbar-inverse-collapse',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'walker' => new webriti_nav_walker()) 
				); 
			?>
		</div>
	</div>
</nav>	
<!-- End of Navbar -->

<div class="clearfix"></div>

