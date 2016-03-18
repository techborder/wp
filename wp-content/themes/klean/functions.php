<?php
/**
 * klean functions and definitions
 *
 * @package klean
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'klean_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function klean_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on klean, use a find and replace
	 * to change 'klean' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'klean', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'klean' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	add_image_size('home-thumb', 400, 400, true);
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery'
	) );
	
	add_theme_support('custom-header');
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'klean_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // klean_setup
add_action( 'after_setup_theme', 'klean_setup' );



/* 
 *  Adding title tag
*/

add_theme_support( 'title-tag' );



/**
 * Enqueue the stylesheet.
 */
function klean_customizer_stylesheet() {

    wp_register_style( 'klean-customizer-css', get_template_directory_uri() . '/assets/skins/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'klean-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'klean_customizer_stylesheet' );


function klean_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'klean_add_editor_styles' );


/** 
 *Enqueuing  the fonts
 */

function klean_fonts_url() {
    $fonts_url = '';
    
    $source_sans_pro = _x('on', 'Source Sans Pro font: on or off', 'klean');

	if ( 'off' !== $source_sans_pro) {
	    $font_families = array();
	
	    if ('off' !== $source_sans_pro ) {
		    $font_families[] = 'Source Sans Pro:300,400,700';
	    }
		$query_args = array(
		    'family' => urlencode( implode( '|', $font_families ) ),
		    'subset' => urlencode( 'latin,latin-ext' ),
		);
	}
	
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
 
    return $fonts_url;
}

function klean_scripts_styles() {
    wp_enqueue_style( 'klean-fonts', klean_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'klean_scripts_styles' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function klean_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'klean' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home Sidebar Left', 'klean' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home Sidebar Right', 'klean' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'klean' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'klean' ),
		'id'            => 'sidebar-5',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'klean' ),
		'id'            => 'sidebar-6',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'klean_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function klean_scripts() {
	wp_enqueue_style( 'klean-style', get_stylesheet_uri() );

	wp_enqueue_style('klean-bootstrap-style',get_template_directory_uri()."/assets/bootstrap/bootstrap.css", array('klean-style'));
	
	wp_enqueue_style('klean-main-skin',get_template_directory_uri()."/assets/skins/main.css", array('klean-bootstrap-style'));
	
	 wp_enqueue_style('klean-font-awesome', get_template_directory_uri()."/assets/font-awesome/css/font-awesome.min.css", array('klean-main-skin'));
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'klean-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'klean-menu-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );
	
	wp_enqueue_script( 'klean-custom-js', get_template_directory_uri() . '/js/custom.js', array(), true );

	wp_enqueue_script( 'klean-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'klean_scripts' );

function klean_initialize_header() {
	echo "<style>";
	
	echo get_theme_mod('css');
	
	echo "#social-icons span i.fa-circle{color: " . esc_attr( get_theme_mod( 'klean-social-color','black' ) ) . ";}
		  .fa-inverse {color: " . esc_attr( get_theme_mod( 'klean-social-icon-color','white' ) ) . ";}";
		  
	if ( get_theme_mod( 'klean-post-sidebar' ) == true ) {
		echo "#secondary:not(.left-sidebar):not(.right-sidebar) {display: none;}
			  #primary {width: 100%;}";
	}
	
	echo ".site-description {color: " . get_theme_mod('klean-desc-color', '#ffffff') . "; }";
	
	echo "</style>";
	 
	?>
	<script type="text/javascript">
		
		jQuery(function(){
		jQuery('.nav-menu').slicknav({
		});
	});
	
	</script>
		
	<?php
}

add_action('wp_head', 'klean_initialize_header');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
