<?php $options = get_option('startup_options'); ?>
<div class="clear"></div>
</div>
<footer>
<div id="copyright">
<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'startup' ), '&copy;', date('Y'), esc_html(get_bloginfo('name')) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
