<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Esperanza
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row-fluid" id="footer-body">
				<div id="footer-widgets">

					<div id="footer-widget1">
					<?php if ( !dynamic_sidebar('footer-1') ) : ?>
					<?php endif; ?>
					</div>

					<div id="footer-widget2">
					<?php if ( !dynamic_sidebar('footer-2') ) : ?>
					<?php endif; ?>
					</div>

					<div id="footer-widget3">
					<?php if ( !dynamic_sidebar('footer-3') ) : ?>
					<?php endif; ?>
					</div>
					
					<div class="clearfix"></div>

				</div><!-- #footer-widget1 -->
			</div>
		</div><!-- .container -->
		<div class="site-info">
			<?php do_action( 'esperanza_credits' ); ?>
			<?php echo of_get_option('esperanza_footer_creds', 'Theme: Esperanza  by <a href="http://themes.qlue.co/" rel="nofollow" title="Qlue Themes" target="_blank">Qlue Themes</a>'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>