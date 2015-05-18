<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package goranchild
 */
?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" role="navigation">
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'footer',
						'menu_class'      => 'clear',
						'depth'           => 1,
					) );
				?>
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://techborder.com/', 'Techborder' ) ); ?>"><?php printf( __( 'Designed by %s.', 'Techborder' ), 'Techborder' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

