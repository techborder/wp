<?php
/**
 * The template for displaying article footers
 *
 * @since 1.0.6
 */
 if ( is_singular() ) {
	?>
	<footer class="entry">
	    <?php
	    wp_link_pages( array( 'before' => '<p id="pages">' . __( 'Pages:', 'matheson' ) ) );
	    edit_post_link( __( '(edit)', 'matheson' ), '<p class="edit-link">', '</p>' );
		the_tags( '<p class="tags"><i class="fa fa-tags"></i> <span>' . __( 'Tags:', 'matheson' ) . '</span>', ' ', '</p>' );
	    ?>
	</footer><!-- .entry -->
	<?php
}