<?php







/* Button Config
============================================================ */

$ruven_shortcodes['button'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/button.htm'),
	'data_name' => 'button',
	'popup_title' => __('Insert Button Shortcode', 'ruventhemes')
);


/* Link Config
============================================================ */

$ruven_shortcodes['link'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/link.htm'),
	'data_name' => 'link',
	'popup_title' => __('Insert Link Shortcode', 'ruventhemes')
);






/* Infobox Config
============================================================ */

$ruven_shortcodes['infobox'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/infobox.htm'),
	'data_name' => 'infobox',
	'popup_title' => __('Insert Info Box Shortcode', 'ruventhemes')
);



/* Quote Box Config
============================================================ */
$ruven_shortcodes['quote'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/quote.htm'),
	'data_name' => 'quote',
	'popup_title' => __('Insert Quote Box Shortcode', 'ruventhemes')
);




/* Contact Form Config
============================================================ */
$ruven_shortcodes['contactform'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/contact.form.htm'),
	'data_name' => 'contactform',
	'popup_title' => __('Insert Contact Form Shortcode', 'ruventhemes')
);



/* Tabs  Config
============================================================ */
$ruven_shortcodes['tabs'] = array(
	'content'=> wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/tabs.htm'),
	'data_name' => 'tabs',
	'popup_title' => __('Insert Tabs Creator Shortcode', 'ruventhemes')
);


/* RElated Posts  Config
============================================================ */
$ruven_shortcodes['relatedposts'] = array(
	'content'=> str_replace("{PLUGIN.URL}",PLUGIN_DIR_URL,wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/relatedposts.htm')),
	'data_name' => 'relatedposts',
	'popup_title' => __('Insert Related Posts Shortcode', 'ruventhemes')
);




/* Columns Layout  Config
============================================================ */
$ruven_shortcodes['columns'] = array(
	'content'=> str_replace("{PLUGIN.URL}",PLUGIN_DIR_URL,wp_remote_fopen(plugin_dir_path( __FILE__ ).'popup.contents/columns.htm')),
	'data_name' => 'columns',
	'popup_title' => __('Insert Columns Layout Shortcode', 'ruventhemes')
);




?>