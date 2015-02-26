<?php
/**
 * MeadowHill functions and definitions.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/

/**
 * MeadowHill theme variables.
 *  
*/    
$meadowhill_themename = "MeadowHill";							//Theme Name
$meadowhill_themever = "1.2.1";										//Theme version
$meadowhill_shortname = "meadowhill";							//Shortname 
$meadowhill_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to MeadowHill Framework and theme specific functions
$meadowhill_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$meadowhill_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$meadowhill_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$meadowhill_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE] 
require_once ($meadowhill_be_path . 'fw-setup.php');		   // Init 
require_once ($meadowhill_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($meadowhill_fe_path . 'headerdata.php');		 // Include css and js
require_once ($meadowhill_fe_path . 'library.php');	       // Include library, functions

/**
 * MeadowHill theme basic setup.
 *  
*/
function meadowhill_setup() {
	// Makes MeadowHill available for translation.
	load_theme_textdomain( 'meadowhill', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  add_editor_style( 'editor-style.css' );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color.
	$defaults = array(
	'default-color'          => '', 
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 9999 );
  add_image_size( 'portfolio-thumb', 344, 252, true );
  add_image_size( 'fullwidth-thumb', 1100, 9999 );
  // This theme uses a custom header background image.
  $args = array(
	'flex-width'     => true,
	'flex-height'    => true,
	'default-image'  => get_template_directory_uri() . '/images/meadow-hill.jpg',
  'random-default' => true,
  'header-text'    => false,
  'uploads'        => true,);
  add_theme_support( 'custom-header', $args );
  add_theme_support( 'title-tag' );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 750; }
}
add_action( 'after_setup_theme', 'meadowhill_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function meadowhill_scripts_styles() {
	global $wp_styles;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'meadowhill-placeholders', get_template_directory_uri() . '/js/placeholders.js', array(), '2.1.0', true );
    wp_enqueue_script( 'meadowhill-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'meadowhill-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'meadowhill-responzive', get_template_directory_uri() . '/js/responzive.js', array(), '1.0', true );
	// Loads the main stylesheet.
	  wp_enqueue_style( 'meadowhill-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'meadowhill_scripts_styles' );

/**
 * Backwards compatibility for older WordPress versions which do not support the Title Tag feature.
 *  
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function meadowhill_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'meadowhill_wp_title', 10, 2 );
}

/**
 * Register our menus.
 *
 */
function meadowhill_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'meadowhill' ),
      'sidebar-menu' => __( 'Sidebar Menu', 'meadowhill' )
    )
  );
}
add_action( 'after_setup_theme', 'meadowhill_register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function meadowhill_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Main Sidebar', 'meadowhill' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on posts and pages.', 'meadowhill' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="sidebar-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'meadowhill' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'meadowhill' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'meadowhill' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'meadowhill' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'meadowhill' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
  register_sidebar( array(
		'name' => __( 'About Section on homepage', 'meadowhill' ),
		'id' => 'sidebar-6',
		'description' => __( 'Insert here as many Text widgets as you want for displaying information in About Section on your homepage.', 'meadowhill' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="section-headline">',
		'after_title' => '</h2>',
	) );
  register_sidebar( array(
		'name' => __( 'Informational Section on homepage', 'meadowhill' ),
		'id' => 'sidebar-7',
		'description' => __( 'Insert here as many Text widgets as you want for displaying information in Informational Section on your homepage.', 'meadowhill' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="section-headline">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'meadowhill_widgets_init' );

/**
 * Short title for Portfolio Items.
 *
*/
function meadowhill_short_title() {
$title = get_the_title();
$limit = "28";
$pad = "...";
if( strlen( $title ) <= $limit) {
echo esc_attr($title);
} else {
$title = substr( $title, 0, $limit ) . $pad;
echo esc_attr($title);
}
}

if ( ! function_exists( 'meadowhill_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function meadowhill_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'meadowhill' ); ?></h3>
      <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'meadowhill' ),
	'next_text' => __( 'Next &rarr;', 'meadowhill' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
      </p>
		</div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function meadowhill_prev_next($nav_id) { ?>
<?php $meadowhill_previous_post = get_adjacent_post( false, "", true );
$meadowhill_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
  <h3 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'meadowhill' ); ?></h3>
<?php if ( !empty($meadowhill_previous_post) ) { ?>
	<p class="nav-previous"><a href="<?php echo esc_url(get_permalink($meadowhill_previous_post->ID)); ?>" title="<?php echo esc_attr($meadowhill_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'meadowhill' ); ?></a></p>
<?php } if ( !empty($meadowhill_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($meadowhill_next_post->ID)); ?>" title="<?php echo esc_attr($meadowhill_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'meadowhill' ); ?></a></p>
<?php } ?>
</div>
<?php }

if ( ! function_exists( 'meadowhill_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function meadowhill_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'meadowhill' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'meadowhill' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'meadowhill' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'meadowhill' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'meadowhill' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'meadowhill' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'meadowhill' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'meadowhill_filter_menu_class', 10, 2 );
function meadowhill_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
} ?>