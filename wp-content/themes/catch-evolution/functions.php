<?php
/**
 * Catch Evolution functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, catchevolution_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'catchevolution_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Catch Themes
 * @subpackage Catch_Evolution
 * @since Catch Evolution 1.0
 */


if ( ! function_exists( 'catchevolution_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function catchevolution_content_width() {
		$layout  = catchevolution_get_theme_layout();

		$content_width = 678;

		if ( $layout == 'three-columns' ) {
			$content_width = 454; /* pixels */
		}

		$GLOBALS['content_width'] = apply_filters( 'catchevolution_content_width', $content_width );
	}
endif;
add_action( 'after_setup_theme', 'catchevolution_content_width', 0 );


/**
 * Tell WordPress to run catchevolution_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'catchevolution_setup' );


if ( ! function_exists( 'catchevolution_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override catchevolution_setup() in a child theme, add your own catchevolution_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,custom headers and backgrounds.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Catch Evolution 1.0
 */
function catchevolution_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Catch Evolution, use a find and replace
	 * to change 'catch-evolution' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'catch-evolution', get_template_directory() . '/languages' );

	/**
     * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
     * @see http://codex.wordpress.org/Function_Reference/add_editor_style
     */
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	/**
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image', 'chat' ) );

	// Load up theme options defaults
	require( get_template_directory() . '/inc/panel/catchevolution-themeoptions-defaults.php' );

	// Load up our theme options page and related code.
	require( get_template_directory() . '/inc/panel/theme-options.php' );

	// Register Sidebar and Widget.
	require( get_template_directory() . '/inc/catchevolution-widgets.php' );

	// Load up our Catch Evolution Pro's Functions
	require( get_template_directory() . '/inc/catchevolution-functions.php' );

	// Load up our Catch Evolution Pro's metabox
	require( get_template_directory() . '/inc/catchevolution-metabox.php' );

	/**
     * This feature enables Jetpack plugin Infinite Scroll
     */
    add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
        'container'      => 'content',
        'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
        'footer'         => 'page',
    ) );

	/**
     * This feature enables custom-menus support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
     */
	register_nav_menus(array(
		'top' 		=> __( 'Fixed Header Top Menu', 'catch-evolution' ),
		'primary' 	=> __( 'Primary Menu', 'catch-evolution' ),
	   	'secondary'	=> __( 'Secondary Menu', 'catch-evolution' ),
		'footer'	=> __( 'Footer Menu', 'catch-evolution' )
	) );

	// Add support for custom backgrounds
	add_theme_support( 'custom-background' );

	/**
     * This feature enables post-thumbnail support for a theme.
     * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
	add_theme_support( 'post-thumbnails' );

	//Featued Posts for Normal Width
	add_image_size( 'featured-slider', 754, 400, true ); // Used for featured posts if a large-feature doesn't exist

	//Featured Posts for Full Width
	add_image_size( 'featured-slider-larger', 1190, 500, true ); // Used for featured posts if a large-feature doesn't exist

	//Plugin Support for WooCommerce
	catchevolution_woocommerce_activated();

	//@remove Remove check when WordPress 4.8 is released
	if ( function_exists( 'has_custom_logo' ) ) {
		/**
		* Setup Custom Logo Support for theme
		* Supported from WordPress version 4.5 onwards
		* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
		*/
		add_theme_support( 'custom-logo' );
	}
}
endif; // catchevolution_setup


if ( ! function_exists( 'catchevolution_get_theme_layout' ) ) :
	/**
	 * Returns Theme Layout prioritizing the meta box layouts
	 *
	 * @uses  get_options
	 *
	 * @action wp_head
	 *
	 * @since Catch Evolution Pro 3.5
	 */
	function catchevolution_get_theme_layout() {
		$id = '';

		global $post, $wp_query;

	    // Front page displays in Reading Settings
		$page_on_front  = get_option('page_on_front') ;
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		// Blog Page or Front Page setting in Reading Settings
		if ( $page_id == $page_for_posts || $page_id == $page_on_front ) {
	        $id = $page_id;
	    }
	    else if ( is_singular() ) {
	 		if ( is_attachment() ) {
				$id = $post->post_parent;
			}
			else {
				$id = $post->ID;
			}
		}

		//Get appropriate metabox value of layout
		if ( '' != $id ) {
			$layout = get_post_meta( $id, 'catchevolution-sidebarlayout', true );
		}
		else {
			$layout = 'default';
		}

		//Load options data
		global $catchevolution_options_settings;
   		$options = $catchevolution_options_settings;

   		//check empty and load default
		if ( empty( $layout ) || 'default' == $layout ) {
			$layout = $options['sidebar_layout'];
		}

		return $layout;
	}
endif; //catchevolution_get_theme_layout


/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );


if ( ! function_exists( 'catchevolution_woocommerce_activated' ) ) :
/**
 * Add Suport for WooCommerce Plugin
 */
function catchevolution_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) {
		add_theme_support( 'woocommerce' );
	    require( get_template_directory() . '/inc/catchevolution-woocommerce.php' );
	}
}
endif; // catchevolution_woocommerce_activated


/**
  * Filters the_category() to output html 5 valid rel tag
  *
  * @param string $text
  * @return string
  */
function catchevolution_html_validate( $text ) {
	$string = 'rel="tag"';
	$replace = 'rel="category"';
	$text = str_replace( $replace, $string, $text );

	return $text;
}
add_filter( 'the_category', 'catchevolution_html_validate' );
add_filter( 'wp_list_categories', 'catchevolution_html_validate' );


/**
 * Migrate Logo to New WordPress core Custom Logo
 *
 * Runs if version number saved in theme_mod "logo_version" doesn't match current theme version.
 */
function catchevolution_logo_migrate() {
	$ver = get_theme_mod( 'logo_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '3.2' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	global $catchevolution_options_settings;
   	$options = $catchevolution_options_settings;

   	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'the_custom_logo' ) ) {
		if( isset( $options['featured_logo_header'] ) && '' != $options['featured_logo_header'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$logo = attachment_url_to_postid( $options['featured_logo_header'] );

			if ( is_int( $logo ) ) {
				set_theme_mod( 'custom_logo', $logo );
			}
		}

		// Delete transients after migration
		delete_transient( 'catchevolution_logo' );

  		// Update to match logo_version so that script is not executed continously
		set_theme_mod( 'logo_version', '3.6' );
	}
}
add_action( 'after_setup_theme', 'catchevolution_logo_migrate' );


/**
 * Migrate Custom Favicon to WordPress core Site Icon
 *
 * Runs if version number saved in theme_mod "site_icon_version" doesn't match current theme version.
 */
function catchevolution_site_icon_migrate() {
	$ver = get_theme_mod( 'site_icon_version', false );

	//Return if update has already been run
	if ( version_compare( $ver, '3.6' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	global $catchevolution_options_settings;
   	$options = $catchevolution_options_settings;

   	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'has_site_icon' ) ) {
		if( isset( $options['fav_icon'] ) && '' != $options['fav_icon'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$site_icon = attachment_url_to_postid( $options['fav_icon'] );

			if ( is_int( $site_icon ) ) {
				update_option( 'site_icon', $site_icon );
			}
		}

	  	// Update to match site_icon_version so that script is not executed continously
		set_theme_mod( 'site_icon_version', '3.6' );
	}
}
add_action( 'after_setup_theme', 'catchevolution_site_icon_migrate' );

/**
 * Customizer Options
 */
require( get_template_directory() . '/inc/panel/customizer/customizer.php' );
