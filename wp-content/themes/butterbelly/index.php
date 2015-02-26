<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" /> 
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <body>
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
            <div class="header_container index">
                <div class="container_24">
                    <div class="grid_24">
                        <div class="header">
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php if (butterbelly_get_option('butterbelly_logo') != '') { ?><?php echo butterbelly_get_option('butterbelly_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?> logo"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="page_heading_container">
                <div class="container_24">
                    <div class="grid_24">
                        <div class="page_heading_content">
                            <?php butterbelly_breadcrumbs(); ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="page-container">
                <div class="container_24">
                    <div class="grid_24">
                        <div class="page-content">
                            <div class="grid_17 alpha">
                                <div class="content-bar">   
                                    <!--Start Post-->
                                    <?php get_template_part('loop', 'index'); ?>   
                                    <div class="clear"></div>
                                    <nav id="nav-single"> 
                                        <span class="nav-next">
                                            <?php previous_posts_link(NEWER_POSTS); ?>
                                        </span> 
                                        <span class="nav-previous">
                                            <?php next_posts_link(OLDER_POSTS); ?>
                                        </span> 
                                    </nav>
                                </div>
                            </div>
                            <div class="grid_7 omega">
                                <!--Start Sidebar-->
                                <?php get_sidebar(); ?>
                                <!--End Sidebar-->
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>