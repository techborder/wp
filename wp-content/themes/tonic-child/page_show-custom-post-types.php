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

$args = array( 'post_type' => 'tribe_events', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	the_title();
	echo '<div class="entry-content">';
	the_content();
	echo '</div>';
endwhile;
?>

    </div><!-- #primary.c8 -->

<?php get_footer(); ?>

