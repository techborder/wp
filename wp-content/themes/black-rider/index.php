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
<?php get_header(); ?>
<div class="slider-wrapper">
    <span class="top-shadow"></span>
    <div class="flexslider">
        <ul class="slides">
            <li>  
                <img src="<?php header_image(); ?>"  alt="" />                
            </li>           
        </ul>			  
    </div>
</div>         
<div class="clear"></div>
<div class="home_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="home-content">
                <div class="page_info_wrapper">
                    <div class="page_info">
                        <?php if (blcr_get_option('inkthemes_page_main_heading') != '') { ?>
                            <h1><?php echo stripslashes(blcr_get_option('inkthemes_page_main_heading')); ?></h1>
                        <?php } else { ?>
                            <h1><?php _e('Premium WordPress Themes with Single.', 'blcr'); ?></h1>
                        <?php } ?>
                    </div>
                    <?php if (blcr_get_option('inkthemes_page_sub_heading') != '') { ?>
                        <p><?php echo stripslashes(blcr_get_option('inkthemes_page_sub_heading')); ?></p>
                    <?php } else { ?>
                        <p><?php _e('The best thing about Colorway Theme is the ease with the help of which you can convert your Website in various different Niches. Your Clients Would Love Their Site & You Would smile in the back thinking about the Time That You Spend Building their Sites.', 'blcr'); ?></p>
                    <?php } ?>

                </div>
                <div class="feature_box">
                    <div class="grid_6 alpha">
                        <div class="feature_inner_box first">
                            <?php if (blcr_get_option('inkthemes_fimg1') != '') { ?>
                                <div class="circle"><a href="<?php echo blcr_get_option('inkthemes_feature_link1'); ?>"><img src="<?php echo blcr_get_option('inkthemes_fimg1'); ?>" alt="Feature image" /></a></div>
                            <?php } else { ?>
                                <div class="circle">
                                    <a href="<?php echo blcr_get_option('inkthemes_feature_link1'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg1.jpg" alt="Feature image" /></a></div>
                            <?php } ?>		
                            <?php if (blcr_get_option('inkthemes_firsthead') != '') { ?>
                                <h6 class="feature_title"><a href="<?php
                                    if (blcr_get_option('inkthemes_feature_link1') != '') {
                                        echo blcr_get_option('inkthemes_feature_link1');
                                    }
                                    ?>"><?php echo stripslashes(blcr_get_option('inkthemes_firsthead')); ?></a></h6>
                                <?php } else { ?>
                                <h6><?php _e('<a href="#">Premium WordPress Themes with Single Click</a>', 'blcr'); ?></h6>
                            <?php } ?>
                            <?php if (blcr_get_option('inkthemes_firstdesc') != '') { ?>
                                <p><?php echo stripslashes(blcr_get_option('inkthemes_firstdesc')); ?></p>
                            <?php } else { ?>
                                <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                                    Website. Also, the professional and Clean design.', 'blcr'); ?></p>
                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="grid_6">
                        <div class="feature_inner_box second">
                            <?php if (blcr_get_option('inkthemes_fimg2') != '') { ?>
                                <div class="circle"><a href="<?php echo blcr_get_option('inkthemes_feature_link2'); ?>"><img src="<?php echo blcr_get_option('inkthemes_fimg2'); ?>" alt="Feature image" /></a></div>
                            <?php } else { ?>
                                <div class="circle">
                                    <a href="<?php echo blcr_get_option('inkthemes_feature_link2'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg2.jpg" alt="Feature image" /></a></div>
                            <?php } ?>		
                            <?php if (blcr_get_option('inkthemes_headline2') != '') { ?>
                                <h6 class="feature_title"><a href="<?php
                                    if (blcr_get_option('inkthemes_feature_link2') != '') {
                                        echo blcr_get_option('inkthemes_feature_link2');
                                    }
                                    ?>"><?php echo stripslashes(blcr_get_option('inkthemes_headline2')); ?></a></h6>
                                <?php } else { ?>
                                <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'blcr'); ?></a></h6>
                            <?php } ?>
                            <?php if (blcr_get_option('inkthemes_seconddesc') != '') { ?>
                                <p><?php echo stripslashes(blcr_get_option('inkthemes_seconddesc')); ?></p>
                            <?php } else { ?>
                                <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                                    Website. Also, the professional and Clean design .', 'blcr'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="grid_6">
                        <div class="feature_inner_box third">
                            <?php if (blcr_get_option('inkthemes_fimg3') != '') { ?>
                                <div class="circle"><a href="<?php echo blcr_get_option('inkthemes_feature_link3'); ?>"><img src="<?php echo blcr_get_option('inkthemes_fimg3'); ?>" alt="Feature image" /></a></div>
                            <?php } else { ?>
                                <div class="circle">
                                    <a href="<?php echo blcr_get_option('inkthemes_feature_link3'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg3.jpg" alt="Feature image" /></a></div>
                            <?php } ?>		
                            <?php if (blcr_get_option('inkthemes_headline3') != '') { ?>
                                <h6 class="feature_title"><a href="<?php
                                    if (blcr_get_option('inkthemes_feature_link3') != '') {
                                        echo blcr_get_option('inkthemes_feature_link3');
                                    }
                                    ?>"><?php echo stripslashes(blcr_get_option('inkthemes_headline3')); ?></a></h6>
                                <?php } else { ?>
                                <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'blcr'); ?></a></h6>
                            <?php } ?>
                            <?php if (blcr_get_option('inkthemes_thirddesc') != '') { ?>
                                <p><?php echo stripslashes(blcr_get_option('inkthemes_thirddesc')); ?></p>
                            <?php } else { ?>
                                <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                                    Website. Also, the professional and Clean design.', 'blcr'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="grid_6 omega">
                        <div class="feature_inner_box fourth">
                            <?php if (blcr_get_option('inkthemes_fimg4') != '') { ?>
                                <div class="circle"><a href="<?php echo blcr_get_option('inkthemes_feature_link4'); ?>"><img src="<?php echo blcr_get_option('inkthemes_fimg4'); ?>" alt="Feature image" /></a></div>
                            <?php } else { ?>
                                <div class="circle">
                                    <a href="<?php echo blcr_get_option('inkthemes_feature_link4'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/circleimg4.jpg" alt="Feature image" /></a></div>
                            <?php } ?>		
                            <?php if (blcr_get_option('inkthemes_headline4') != '') { ?>
                                <h6 class="feature_title"><a href="<?php
                                    if (blcr_get_option('inkthemes_feature_link4') != '') {
                                        echo blcr_get_option('inkthemes_feature_link4');
                                    }
                                    ?>"><?php echo stripslashes(blcr_get_option('inkthemes_headline4')); ?></a></h6>
                                <?php } else { ?>
                                <h6><a href="#"><?php _e('Premium WordPress Themes with Single Click', 'blcr'); ?></a></h6>
                            <?php } ?>
                            <?php if (blcr_get_option('inkthemes_fourthdesc') != '') { ?>
                                <p><?php echo stripslashes(blcr_get_option('inkthemes_fourthdesc')); ?></p>
                            <?php } else { ?>
                                <p><?php _e('The Theme had a simple layout which attracts the Client to the 
                                    Website. Also, the professional and Clean design.', 'blcr'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom_feature">
                <?php if (blcr_get_option('inkthemes_blog_heading') != '') { ?>
                    <h1 class="blog-heading"><?php echo stripslashes(blcr_get_option('inkthemes_blog_heading')); ?></h1>
                <?php } else { ?>
                    <h1 class="blog-heading"><?php _e('Our Latest Blogs', 'blcr'); ?></h1>
                <?php } ?>
                <div class="grid_16 alpha">
                    <div class="blog_feature">
                        <?php                        
                        $limit = get_option('posts_per_page');
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $wp_query = new WP_Query();
                        $wp_query->query('showposts=' . $limit . '&paged=' . $paged);
                        ?>
                        <?php
                        $i = 0;
                        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                $i++;
                            endwhile;
                        endif;
                        ?>	
                        <?php
                        $count = 0;
                        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                $count++;
                                ?>
                                <!--Start post-->
                                <div class="post <?php
                                if ($count == $i) {
                                    echo 'last-post';
                                }
                                ?>">
                                         <?php if (has_post_thumbnail()) { ?>
                                        <div class='post-image'><a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('post-thumbnails', array('class' => 'postimg')); ?>
                                            </a></div>
                                    <?php } else { ?>
                                        <?php blcr_get_image(216, 168); ?> 
                                        <?php
                                    }
                                    ?>
                                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                    <div class="post_content">                
                                        <ul class="post_meta">
                                            <li class="posted_by"><?php the_author_posts_link(); ?></li>
                                            <li class="post_date"><?php echo get_the_time('M-d-Y') ?></a></li>
                                            <li class="post_category"><?php the_category(', '); ?></li>
                                            <li class="postc_comment">&nbsp;<?php comments_popup_link('0 Comments.', '1 Comments.', '% Comments.'); ?></li>
                                        </ul>
                                        <?php echo blcr_trim_excerpt(40); ?>
                                        <a class="read-more" href="<?php the_permalink() ?>"><?php echo READ_MORE; ?></a>
                                    </div>              
                                </div>
                                <?php
                            endwhile;
                            ?>
                            <div class="clear"></div>
                            <nav id="nav-single"> 
                                <span class="nav-next">
                                    <?php previous_posts_link(NEWER_POSTS); ?>
                                </span>
                                <span class="nav-previous">
                                    <?php next_posts_link(OLDER_POSTS); ?>
                                </span>  </nav>
                            <?php
                        endif;
                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="grid_8 omega">
                    <div class="sidebar">
                    </div>
                </div>
                <div class=" grid_8 omega">
                    <div class="sidebar home">
                        <?php if (is_active_sidebar('home-page-widget-area')) : ?>
                            <?php dynamic_sidebar('home-page-widget-area'); ?>                       
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>