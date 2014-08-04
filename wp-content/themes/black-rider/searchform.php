<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div>
        <input type="text" onfocus="if (this.value == '<?php _e('Search','blcr'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search','blcr'); ?>';}"  value="<?php _e('Search','blcr'); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="" />
    </div>
</form>
<div class="clear"></div>
