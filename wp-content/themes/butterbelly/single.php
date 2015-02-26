<?php
/**
 * The Template for displaying all single posts.
 *
 * @subpackage ButterBelly
 * @since ButterBelly 1.0
 */
?>
<?php get_header(); ?>
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
                    <div class="content-bar single_post">
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div class="post single">
                                    <h1 class="post_title"><?php the_title(); ?></h1>
                                    <div class="post_content">                
                                        <ul class="post_meta">                 
                                            <li class="post_date"><span>On</span>&nbsp;<a href="#"><?php echo get_the_time('M, d, Y') ?></a></li>
                                            <li class="posted_by"><span></span>&nbsp;<a href="#"><?php the_author_posts_link(); ?></a></li>
                                            <li class="post_category"><span></span>&nbsp;<a href="#"><?php the_category(', '); ?></a></li>
                                        </ul>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <!--End post-->
                            <?php endwhile;
                            wp_reset_query();
                        else:
                            ?>
                            <div class="post single">
                                <p>
                            <?php echo SORRY_NO_POST_MATCHED; ?>
                                </p>
                            </div>
<?php endif;
?>
                        <!--End post-->
                        <!--Start Comment box-->
<?php comments_template(); ?>
                        <!--End Comment box-->
                    </div>
                </div>
                <div class="grid_7 omega">
<?php get_sidebar(); ?>
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