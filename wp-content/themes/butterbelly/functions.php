<?php

include_once get_template_directory() . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory() . '/functions/';
require_once ($functions_path . 'define_template.php');
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces 
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function butterbelly_wp_enqueue_scripts() {
    wp_enqueue_script('butterbelly-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
    wp_enqueue_script('butterbelly-cunfon-yui', get_template_directory_uri() . '/js/cufon-yui.js', array('jquery'));
    wp_enqueue_script('butterbelly-Ink-font', get_template_directory_uri() . '/js/Inkfont_300_400.font.js', array('jquery'));
    wp_enqueue_script('butterbelly-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . "/js/mobile-menu.js", array('jquery'), '', true);
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'butterbelly_wp_enqueue_scripts');

/**
 * Load plugin notification file
 */
require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/inkthemes-plugin-notify.php');
add_action('tgmpa_register', 'inkthemes_plugins_notify');

//
function butterbelly_get_option($name) {
    $options = get_option('butterbelly_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function butterbelly_update_option($name, $value) {
    $options = get_option('butterbelly_options');
    $options[$name] = $value;
    return update_option('butterbelly_options', $options);
}

//
function butterbelly_delete_option($name) {
    $options = get_option('butterbelly_options');
    unset($options[$name]);
    return update_option('butterbelly_options', $options);
}

?>
