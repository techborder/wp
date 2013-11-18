<?php
/**
 * Title: Footer template.
 *
 * Description: Defines footer content.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
?>

</div><!-- wrapper -->
</div><!-- container -->

<section class="full-width-container footer-full-width">
	<div class="container">
		<div class="container-fluid">
			<?php
			if( cyberchimps_get_option( 'footer_show_toggle' ) == '1' ) {

				do_action( 'cyberchimps_before_footer_widgets' ); ?>

				<div id="footer-widgets" class="row-fluid">
					<div id="footer-widget-container" class="span12">
						<div class="row-fluid">

							<div id="footer_logo" class="span3">
								<?php do_action( 'cyberchimps_header' ); ?>
							</div>

							<?php if( !dynamic_sidebar( 'cyberchimps-footer-widgets' ) ) : ?>

								<aside class="widget-container span3">
								</aside>

								<aside class="widget-container span3">
									<h3 class="widget-title"><?php _e( 'Pages', 'cyberchimps' ); ?></h3>
									<ul>
										<?php wp_list_pages( 'title_li=' ); ?>
									</ul>
								</aside>

								<aside class="widget-container span3">
								</aside>

							<?php endif; ?>
						</div>
						<!-- .row-fluid -->
					</div>
					<!-- #footer-widget-container -->
				</div><!-- #footer-widgets .row-fluid  -->

				<?php do_action( 'cyberchimps_after_footer_widgets' ); ?>

			<?php } ?>

			<?php do_action( 'cyberchimps_before_footer_container' ); ?>

			<footer class="site-footer row-fluid">

				<?php
				do_action( 'cyberchimps_footer' );
				?>

			</footer>
			<!-- .site-footer .row-fluid -->

			<?php do_action( 'cyberchimps_after_footer_container' ); ?>

		</div>
		<!-- #wrapper .container-fluid -->

		<?php do_action( 'cyberchimps_after_wrapper' ); ?>

	</div>
	<!-- container -->

	<?php wp_footer(); ?>

	</body>
	</html>
