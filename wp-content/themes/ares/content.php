<?php
/**
 * @package ares
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>

        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <?php ares_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (is_search()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content">
            <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'ares')); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'ares'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-footer">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
            <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'ares'));
            if ($categories_list && ares_categorized_blog()) :
                ?>
                <span class="cat-links">
                    <?php printf(__('Posted in %1$s', 'ares'), $categories_list); ?>
                </span>
            <?php endif; // End if categories ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', __(', ', 'ares'));
            if ($tags_list) :
                ?>
                <span class="tags-links">
                    <?php printf(__('Tagged %1$s', 'ares'), $tags_list); ?>
                </span>
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>

        <?php if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) : ?>
            <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'ares'), __('1 Comment', 'ares'), __('% Comments', 'ares')); ?></span>
        <?php endif; ?>

        <?php edit_post_link(__('Edit', 'ares'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
