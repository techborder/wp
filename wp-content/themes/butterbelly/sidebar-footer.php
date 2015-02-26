<div class="grid_6 footer_sec alpha">
    <div class="footer_widget first">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('About Us','butterbelly');?></h4>
            <p><?php _e('We make simple and easy to WordPress themes that will make your website easily. You just need to install it and your website will be ready within a minute.','butterbelly');?></p>
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6 footer_sec">
    <div class="footer_widget">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h4><?php _e('OUR PAGES','butterbelly');?></h4>
            <ul>
                <li><a href="#"><?php _e('Default template ','butterbelly');?></a></li>
                <li><a href="#"><?php _e('Full-width template ','butterbelly');?></a></li>
                <li><a href="#"><?php _e('Home template ','butterbelly');?></a></li>
            </ul>
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6 footer_sec">
    <div class="footer_widget">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('Search Anything','butterbelly');?></h4>
            <p><?php _e('Search Anything Which You Desire.','butterbelly');?></p>
            <form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                <div>
                    <input type="text" onfocus="if (this.value == 'Search here') {
                        this.value = '';
                    }" onblur="if (this.value == '') {
                                this.value = 'Search here';
                            }"  value="Search here" name="s" id="s" />
                    <input type="submit" id="searchsubmit" value="SEARCH" />
                </div>
            </form>          
        <?php endif; ?>
    </div>
</div>
<div class="grid_6 footer_sec omega">
    <div class="footer_widget last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('Use of Widgets','butterbelly');?></h4>
            <p><?php _e('You can easily drag and drop the widgets here to display under the footer. You just need to go to your dashboard and there you can choose the appearance option and then widgets.','butterbelly');?></p>
        <?php endif; ?>
    </div>
</div>