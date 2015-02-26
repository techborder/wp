<?php
/**
 * The template used to display Tag Archive pages
 *
 * 
 */
?>
<?php get_header(); ?>  
<div class="page_heading_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading_content">
                <h1><?php printf(TAG_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
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
                        <?php get_template_part('loop', 'tag'); ?> 
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