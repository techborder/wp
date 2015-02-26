<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--Start post-->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            $content = $post->post_content;
            $searchimages = '~<img [^>]* />~';
            /* Run preg_match_all to grab all the images and save the results in $pics */
            preg_match_all($searchimages, $content, $pics);
            // Check to see if we have at least 1 image
            $iNumberOfPics = count($pics[0]);
            if (($iNumberOfPics > 0) || (has_post_thumbnail())) {
                ?>
                <div class="post_image"> 
                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <?php
                    } else {
                        echo butterbelly_main_image();
                    }
                    ?>
                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post_comment"><?php comments_popup_link('0', '1', '%', '', 'off'); ?></div>
                </div>
            <?php } else {
                ?>
                <h1 class="post_title without_image"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php } ?>
            <div class="post_content">                
                <ul class="post_meta">                 
                    <li class="post_date"><span>On</span>&nbsp;<?php echo get_the_time('M, d, Y') ?></li>
                    <li class="posted_by"><span></span>&nbsp;<?php the_author_posts_link(); ?></li>
                </ul>
                <?php the_excerpt(); ?>
                <a class="read_more" href="<?php the_permalink() ?>"><?php echo CONTINUE_READING_DOTS; ?></a>
            </div>
        </div>
        <!--End post-->
    <?php
    endwhile;
else:
    ?>
    <div class="post">
        <p>
    <?php echo SORRY_NO_POST_MATCHED; ?>
        </p>
    </div>
<?php endif;
?>
<!--End post-->