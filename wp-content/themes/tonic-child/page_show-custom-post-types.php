<?php
/*
 * Template Name: Show custom post types.
 * Description: For debugging problems with custom post types.
 */
$bavotasan_theme_options = bavotasan_theme_options();
get_header(); ?>

    <div id="primary" <?php bavotasan_primary_attr(); ?>>
<?php

$post_types = get_post_types( '', 'names' ); 

echo '<h1>DEBUG: All post types.</h1>';
foreach ( $post_types as $post_type ) {

   echo '<p>' . $post_type . '</p>';
}

$args = array(
   'public'   => true,
   '_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

$post_types = get_post_types( $args, $output, $operator ); 

echo '<h1>DEBUG: Custom post types.</h1>';
foreach ( $post_types  as $post_type ) {

   echo '<p>' . $post_type . '</p>';
}

        while ( have_posts() ) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (!is_page('home')): ?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content( __( 'Read more &rarr;', 'tonic' ) ); ?>
                </div><!-- .entry-content -->

                <?php get_template_part( 'content', 'footer' ); ?>
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
            comments_template( '', true );
        endwhile; // end of the loop.
        ?>

    </div><!-- #primary.c8 -->

<?php get_footer(); ?>

