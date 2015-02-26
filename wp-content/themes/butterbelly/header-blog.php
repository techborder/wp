<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?>
        </title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" /> 
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="menu_container">
            <div class="container_24">
                <div class="grid_24">
                    <div class="menu-wrapper">
                        <div id="MainNav">
                            <?php if (butterbelly_get_option('butterbelly_nav') != '') { ?><a href="#" class="mobile_nav closed"><?php echo stripslashes(butterbelly_get_option('butterbelly_nav')); ?><span></span></a>
                            <?php } else { ?> <a href="#" class="mobile_nav closed"><?php _e('Pages Navigation Menu', 'butterbelly'); ?><span></span></a>
                            <?php } ?>
                            <?php butterbelly_nav(); ?> 
                        </div> 
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="index_container">
            <div class="header_container not_home">              
                <div class="container_24">
                    <div class="grid_24">
                        <div class="header">
                            <div class="logo">
                                <?php if (butterbelly_get_option('butterbelly_logo') != '') { ?>
                                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo butterbelly_get_option('butterbelly_logo'); ?>" alt="<?php bloginfo('name'); ?> logo"/></a>
                                <?php } else { ?>
                                    <hgroup>
                                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                        <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                                    </hgroup>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>