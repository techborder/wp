<?php
/*
Plugin Name: Google Places Reviews Pro
Plugin URI: http://wordimpress.com/plugins/google-places-reviews-pro/
Description: Display Google Places Reviews for one or many businesses anywhere on your WordPress site using an easy to use and intuitive shortcode and widget. This is the premium version of the plugin. Thank you for your purchase and supporting sustained development.
Version: 1.2.3.1
Author: Devin Walker
Author URI: http://imdev.in/
Text Domain: gpr
*/

if ( ! class_exists( 'WP_Google_Places_Reviews' ) ) {

	class WP_Google_Places_Reviews {

		protected static $_instance = null;


		/**
		 * Class Constructor
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'version_check' ), 1 );


		}


		/**
		 * Main Google Places Reviews Instance
		 *
		 * Ensures only one instance of GPR is loaded or can be loaded.
		 *
		 * @since 1.2.2
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}


		/**
		 * Check Plugin Version
		 */
		public function version_check() {

			if ( in_array( 'google-places-reviews/google-places-reviews.php', (array) get_option( 'active_plugins', array() ) ) ) {

				add_action( 'admin_notices', array( &$this, 'admin_notice' ) );

			} else {
				//@DESC: Register Google Places widget
				add_action( 'widgets_init', array( $this, 'init_google_places_reviews_widget' ) );
			}

		}


		/**
		 * Display Admin Notices
		 */
		public function admin_notice() {
			$error_message = __( '<div id="message" class="error"><p><strong>Activation Error:</strong> Please deactivate and uninstall the <em>free</em> version of Google Places Reviews and then reactivate the Pro version.</p> </div>', 'gpr' );
			echo $error_message;
			//Deactivate this beast
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}

		/**
		 * Plugin Setup
		 */
		function init_google_places_reviews_widget() {
			/**
			 * Define Constants
			 */
			define( 'GPR_PLUGIN_NAME', 'google-places-reviews-pro' );
			define( 'GPR_PLUGIN_NAME_PLUGIN', plugin_basename( __FILE__ ) );
			define( 'GPR_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
			define( 'GPR_PLUGIN_URL', plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) );
			define( 'GPR_DEBUG', false ); //turns on non-minified files,

			add_action( 'admin_enqueue_scripts', array( $this, 'gpr_options_scripts' ) );

			//Good to go, proceed with Pro version

			// Include Core Framework class
			require_once GPR_PLUGIN_PATH . '/classes/core.php';

			include_once GPR_PLUGIN_PATH . '/inc/licence/licence.php';

			// Include Licensing
			if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
				// load our custom updater
				include_once GPR_PLUGIN_PATH . '/inc/licence/classes/EDD_SL_Plugin_Updater.php';
			}

			if (is_admin()) {
				include GPR_PLUGIN_PATH . '/admin/admin.php';
			}

			//	global $google_places_reviews;
			// Create plugin instance
			$google_places_reviews = new GPR_Plugin_Framework( __FILE__ );

			// Include options set
			include_once GPR_PLUGIN_PATH . '/inc/options.php';

			// Create options page
			$google_places_reviews->add_options_page( array(), $google_places_reviews_options );

			// Make plugin meta translatable
			__( 'Google Places Reviews', $google_places_reviews->textdomain );
			__( 'Devin Walker', $google_places_reviews->textdomain );
			__( 'gpr', $google_places_reviews->textdomain );

			//Include the widget
			if ( ! class_exists( 'Google_Places_Reviews' ) ) {
				require GPR_PLUGIN_PATH . '/classes/widget.php';
				require GPR_PLUGIN_PATH . '/classes/shortcode.php';
				$gpr_shortcode = new Google_Places_Reviews_Shortcode();
			}

			register_widget( "Google_Places_Reviews" );

			return $google_places_reviews;

		}


		/**
		 * Custom CSS for Options Page
		 */
		function gpr_options_scripts( $hook ) {
			$suffix = defined( 'GPR_DEBUG' ) && GPR_DEBUG ? '' : '.min';
			if ( $hook === 'settings_page_googleplacesreviews' ) {
				wp_register_style( 'gpr_custom_options_styles', plugin_dir_url( __FILE__ ) . '/assets/css/options' . $suffix . '.css' );
				wp_enqueue_style( 'gpr_custom_options_styles' );

			}
		}

	}//end WP_Google_Places_Reviews class
}//end If !class_exists

/**
 * Returns the main instance of Google Places Reviews.
 *
 * @since  1.0
 * @return Google_Places_Reviews()
 */
function WP_Google_Places_Reviews() {
	return WP_Google_Places_Reviews::instance();
}

WP_Google_Places_Reviews();


