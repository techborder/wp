<?php
/**
 * Plugin Name: Allow same email
 * Description: Allows same email to be used multiple times. Removes email exists check or clears the error.
 * Plugin URI:  http://wordpress.stackexchange.com/questions/75565/how-to-use-same-email-for-multiple-users
 * Author:      StackExchange and David Regal
 * Author URI:  http://wordpress.stackexchange.com/users/64033/skurfur
 */
add_filter('user_profile_update_errors', 'see_skip_email_exist');
function see_skip_email_exist($errors){
    if (is_wp_error($errors) && $errors->get_error_data('email_exists') != null) {
        $errors->remove('email_exists');
    }
    define( 'WP_IMPORTING', 'SKIP_EMAIL_EXIST' );
    return $errors;
}
?>
