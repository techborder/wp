<?php
/**
 * The sidebar template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
?>
<div id="sidebar">
<?php if ( has_nav_menu( 'sidebar-menu' ) ) { ?>
      <div class="sidebar-widget">
        <?php wp_nav_menu( array( 'theme_location'=>'sidebar-menu', 'items_wrap' => '<p class="sidebar-headline">'.__( 'Menu', 'meadowhill' ).'</p><ul id="%1$s" class="%2$s">%3$s</ul>' ) ); ?>
      </div><?php } ?>
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</div> <!-- end of sidebar -->