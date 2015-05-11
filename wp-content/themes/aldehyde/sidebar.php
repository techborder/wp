<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package aldehyde
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( aldehyde_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php do_action('aldehyde_secondary-width') ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
