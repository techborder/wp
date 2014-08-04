<?php
/*
 * Template Name: Custom Home Page
 * Description: A home page with featured slider and widgets.
 *
 * @package adamos
 * @since adamos 1.0
 */

get_header(); ?>
		
<div id="primary_home" class="content-area">
	<div id="content" class="fullwidth" role="main">
		<div class="section group">
			<div class="col span_1_of_3">         
				<div class="featuretext">
					<h3><?php echo get_theme_mod( 'featured_textbox_header_one' ); ?></h3>
					<p><?php echo get_theme_mod( 'featured_textbox_text_one' ); ?></p>
				</div>
			</div>
		
			<div class="col span_1_of_3">         
				<div class="featuretext">
					 <h3><?php echo get_theme_mod( 'featured_textbox_header_two' ); ?></h3>
					 <p><?php echo get_theme_mod( 'featured_textbox_text_two' ); ?></p>
				</div>
			</div>
			
			<div class="col span_1_of_3">         
				<div class="featuretext">
					 <h3><?php echo get_theme_mod( 'featured_textbox_header_three' ); ?></h3>
					 <p><?php echo get_theme_mod( 'featured_textbox_text_three' ); ?></p>
				</div>
			</div>
		</div>
	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>