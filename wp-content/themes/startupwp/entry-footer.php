<?php global $post; if ( 'post' == $post->post_type ) : ?>
<div class="entry-footer">
<?php 
if ( is_category() && $catz = startup_catz(', ') ) : // ?>
<span class="cat-links"><?php printf( __( 'Also posted in %s', 'startup' ), $catz ); ?></span>
<span class="meta-sep"> | </span>
<?php else : ?>
<span class="cat-links"><?php _e( 'Posted in ', 'startup' ); ?><?php echo get_the_category_list(', '); ?></span>
<span class="meta-sep"> | </span>
<?php endif; ?>
<?php if ( is_tag() && $tag_it = startup_tag_it(', ') ) : // ?>
<span class="tag-links"><?php printf( __( 'Also tagged %s', 'startup' ), $tag_it ); ?></span>
<?php else : ?>
<span class="tag-links"><?php the_tags( 'Tagged: ', ', ', '. ', 'startup' ); ?></span>
<?php endif; ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a Comment', 'startup' ), __( '1 Comment', 'startup' ), __( '% Comments', 'startup' ) ); ?></span>
<?php edit_post_link( __( 'Edit', 'startup' ), '<div class="edit-link">', '</div>' ) ?>
</div>
<?php endif; ?>