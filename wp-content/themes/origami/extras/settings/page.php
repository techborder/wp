<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<?php $theme = wp_get_theme(); ?>
	<h2 id="theme-settings-title">
		<img src="<?php echo esc_url( apply_filters('siteorigin_settings_page_icon', get_template_directory_uri() . '/extras/settings/images/icon.png' ) ) ?>">
		<?php printf(__( '%s Theme Settings', 'origami' ), $theme->get('Name')) ?>
	</h2>

	<?php siteorigin_settings_change_message(); ?>
	
	<form action="options.php" method="post" id="siteorigin-settings-form">
		<?php settings_fields( 'theme_settings' ); ?>
		<?php do_settings_sections( 'theme_settings' ) ?>

		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'origami'); ?>" id="siteorigin-settings-submit" />
			<a href="http://siteorigin.com/threads/theme-<?php echo get_template() ?>/" target="_blank" id="siteorigin-theme-support"><?php _e( 'Theme Support Forum', 'origami' ) ?></a>
		</p>
		<input type="hidden" id="current-tab-field" name="theme_settings_current_tab" value="<?php echo intval( get_theme_mod('_theme_settings_current_tab', 0) ) ?>" />
	</form>
</div> 