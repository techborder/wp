<?php
/**
 * The archive template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-blog">
  <div class="container">
<?php if ( have_posts() ) : ?>
    <h1 class="section-headline"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'meadowhill' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'meadowhill' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'meadowhill' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'meadowhill' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'meadowhill' ) ) . '</span>' );
					else :
						_e( 'Archives', 'meadowhill' );
					endif;
				?></h1>
    <div class="post-entries-wrapper">    
<?php while (have_posts()) : the_post(); ?> 
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php meadowhill_content_nav( 'nav-below' ); ?>
    </div>    
  </div>
</div>     <!-- end of wrapper-blog -->
<?php get_footer(); ?>