</div>
<div class="footer_top_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer_top_content">
                <div class="grid_24 omega">  
                    <div class="call_us">
                        <?php if (butterbelly_get_option('butterbelly_topright') != '') { ?>
                            <p> <?php echo stripslashes(butterbelly_get_option('butterbelly_topright')); ?></p>
                        <?php } else {
                            ?>
                            <p><?php _e('For Reservation Call : 1.888.222.5847','butterbelly');?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer">
                <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">      
                <div class="copyrightinfo"><?php $inkthemes_site_url='http://www.inkthemes.com'; ?>
                    <p class="copyright"><a href="<?php esc_url($inkthemes_site_url); ?>"><?php _e('ButterBelly Theme','butterbelly');?> </a> <?php _e('Powered By ','butterbelly');?><a href="http://www.wordpress.org"> <?php _e('WordPress','butterbelly');?></a></p>
                </div>		 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
