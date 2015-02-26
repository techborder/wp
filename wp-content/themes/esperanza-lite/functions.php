<?php
/**
 * Esperanza functions and definitions
 *
 * @package Esperanza
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'esperanza_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function esperanza_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Esperanza, use a find and replace
	 * to change 'esperanza' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'esperanza', get_template_directory() . '/assets/languages' );

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
		'primary' => __( 'Primary Menu', 'esperanza' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Custom Background.
	add_theme_support( 'custom-background', array(
			'default-position-x' => 'center',
			'default-repeat' => 'no-repeat',
			'default-attachment' => 'fixed'
	));

	// Content editor styling	
    add_editor_style( 'assets/css/editor-style.css' );
}
endif; // esperanza_setup
add_action( 'after_setup_theme', 'esperanza_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function esperanza_widgets_init() {
	
	register_sidebar(array(
		'name' => 'Footer Widget 1',
		'id' => 'footer-1',
		'description' => 'First footer widget area',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 2',
		'id' => 'footer-2',
		'description' => 'Second footer widget area',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => 'Footer Widget 3',
		'id' => 'footer-3',
		'description' => 'Third footer widget area',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'esperanza_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function esperanza_scripts() {
	wp_enqueue_style( 'esperanza-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'esperanza-custom-style', get_template_directory_uri() . '/custom.css' );

	//Add Google Font: Roboto Slab
	wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700');
    wp_enqueue_style( 'googleFonts');

	wp_enqueue_script( 'esperanza-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'esperanza-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'esperanza_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Opitons Framework.
 */ 
if ( !function_exists( 'optionsframework_init' ) ) {
    require get_template_directory() . '/inc/admin/options-framework.php';
}
 
/* 
 * Loads the Options From Different Location as per themes requirement 
 */
function esperanza_options_framework_location_override() {
    return array('/inc/options.php');
}
add_filter('options_framework_location','esperanza_options_framework_location_override');

/* 
 * Change excerpt more string
 */
 function esperanza_excerpt_more( ) {
	global $post;
	return '<span class="read-more"><a href="'. get_permalink($post->ID) . '">Read More...</a></span>';
}
add_filter('excerpt_more', 'esperanza_excerpt_more');

/* 
 * Set excerpt length
 */
function esperanza_custom_excerpt_length( $length ) {
	return of_get_option('esperanza_excerpt_length', $length);
}
add_filter( 'excerpt_length', 'esperanza_custom_excerpt_length', 999 );

/* 
 * Custom Header Codes
 */
add_action( 'wp_head', 'esperanza_custom_header_code' ); 
function esperanza_custom_header_code() {
	
	// Output favicon image
	$favicon = of_get_option('esperanza_favicon_uploader'); 
	if ( ! empty( $favicon ) ) { 
		echo '<link id="favicon" rel="shortcut icon" href="' . $favicon . '" sizes="16x16 32x32 48x48" type="image/png">';
	}
	
	// Output custom CSS
	$custom_css = of_get_option( 'esperanza_custom_css' );
	$input = of_get_option( 'body_font' );
	$selected_font_family = $input['face'];
	$selected_font_size = $input['size'];
	$selected_font_color = $input['color'];
	$heading_input = of_get_option( 'heading_font' );
	$heading_font_family = $heading_input['face'];
	$heading_font_size = $heading_input['size'];
	$heading_font_color = $heading_input['color'];
	$header_bg_color = of_get_option( 'header_bg_color' );
	$footer_bg_color = of_get_option( 'footer_bg_color' );
	$primary_color = of_get_option( 'primary_color' );
	$link_hover_color = of_get_option( 'link_hover_color' );
	$menu_hover_color = of_get_option( 'menu_hover_color' );	
?>	
		<style type="text/css">
			<?php
			echo '/* Custom CSS */' . "\n";
			echo $custom_css . "\n";						
			echo "#masthead { background: ". $header_bg_color ."; } .main-navigation ul ul { background: ". $header_bg_color ."; border-color: ". $primary_color ."; } footer.site-footer { background: ". $footer_bg_color ."; } a, blockquote, .glyphicon-comment, input[type='submit'], .comment-reply-link, #comments #commentform input[type='submit']:hover, .comment-reply-link:hover, .read-more a:hover, #comments #commentform input[type='submit'], .read-more a, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, .entry-content a, .error404 .page-content a, #authorbio .authorinfo h3 a, #comments h2.comments-title, #comments h3#reply-title, .glyphicon-comment, #authorbio .author-avatar img, #comments .comment-author img, .esperanza-recent-posts img, .esperanza-about-me img, .esperanza-recent-comments img, .paging-navigation .nav-links a, .paging-navigation .nav-links span { color: ". $primary_color ."; border-color : ". $primary_color ."; } a:hover { color: ". $link_hover_color ." !important; } nav .nav-menu li a:hover { background: ". $menu_hover_color ." !important; } nav ul a, nav ul a:hover { color: #fff !important; } ";
			?>			
		</style>
	<?php	
}

/* 
 * Medium styled Post Navigation
 */
function esperanza_post_navigation( $title_text='' , $image_size='post_thumbnail' , $in_same_term=true, $excluded_terms='', $previous=true) {
	
	// get the next post in same category				
	$next_post = get_adjacent_post( $in_same_term, $excluded_terms, $previous);
	
	// nothing found? try without category
	if ( !$next_post ) {
	
		$in_same_term = false; // get post regardless of category
		$next_post = get_adjacent_post( $in_same_term, $excluded_terms, $previous);
	}
					
	//got a post!				
	if ($next_post) {
		
		// get the featured image			
		$thumb_id = get_post_thumbnail_id($next_post->ID);
		$thumb_url = wp_get_attachment_image_src($thumb_id, $image_size , true);
		
		// if no title text provided then get the category
		if ($title_text=='') {
			$title_text = 'Next article ';
		}
		
		// Get the comments of the next article
		if('open' == $next_post->comment_status) {
			$comment_count = $next_post->comment_count;
			switch($comment_count) {
				case 0: $comment_string = 'No Comments'; break;
				case 1: $comment_string = 'Comment'; break;
				default: $comment_string = $comment_count . ' Comments'; break;
			} 
		} else {
			$comment_string = 'Comments Off';
		}
		
		echo '
		<div class="next-post-preview" style="background-image: url(' . $thumb_url[0] . ');">
		<div class="next-post-preview-wrap">	
			<a href="' . get_permalink( $next_post->ID ) . '" style="text-decoration: none;">
				<div class="next-post-preview-content">					
					<div class="title-text">' . $title_text . '</div>				
					<h2 class="next-post-preview-title">' . $next_post->post_title . '</h2>
					<div class="byline">
						<time>' . get_the_time( 'F j, Y', $next_post->ID ) . '</time> &bull; <span class="italic">by</span>
						<span>' . get_userdata($next_post->post_author)->display_name . '</span> &bull; 
						<span>' . $comment_string . '</span>
					</div> 
				</div>
			</a>
		</div>
		</div>';
		
	}
	
} // end function

/* 
 * Custom Widgets
 */
 
/***** Esperanza Recent Posts *****/
class esperanza_recent_posts extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'esperanza_recent_posts', 

		// Widget name will appear in UI
		__('Esperanza Recent Posts', 'esperanza_recent_posts_domain'), 

		// Widget description
		array( 'description' => __( 'Shows your site\'s most recent posts.', 'esperanza_recent_posts_domain' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		global $post;
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'esperanza_recent_posts_domain' ) : $instance['title'] );
		$number = empty( $instance['number'] ) ? 4 : $instance['number'];
		
		echo $args['before_widget'];
		
			if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

			$query = new WP_Query();
			$query->query( array( 'post_type' => 'post', 'posts_per_page' => $number, 'ignore_sticky_posts' => 1 ) ); ?>
			
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>		
				<div class="esperanza-recent-posts">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<img src="<?php echo $url; ?>"  alt="Thumbnail" />
					<div class="esperanza-post">
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						<p><?php echo get_the_date( ); ?></p>
					</div>
					<div class="clearfix"></div>
				</div>							
			<?php  endwhile; wp_reset_postdata(); endif; 
		
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {	
		$title = empty( $instance['title'] ) ? __( 'Recent Posts', 'esperanza_recent_posts_domain' ) : $instance['title'];
		$number = empty( $instance['number'] ) ? 4 : $instance['number'];
	
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'esperanza_recent_posts_domain' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'esperanza_recent_posts_domain' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3">
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		return $instance;
	}
} // Class esperanza_recent_posts ends here


/***** Esperanza About Me *****/
class esperanza_about_me extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'esperanza_about_me', 

		// Widget name will appear in UI
		__('Esperanza About Me', 'esperanza_about_me_domain'), 

		// Widget description
		array( 'description' => __( 'Shows author image and description.', 'esperanza_about_me_domain' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$image = empty( $instance['image'] ) ? __( '', 'esperanza_about_me_domain' ) : $instance['image'];
		$description = empty( $instance['description'] ) ? __( '', 'esperanza_about_me_domain' ) : $instance['description'];
		
		echo $args['before_widget'];		
			echo $args['before_title'] . 'About Me' . $args['after_title']; ?>			
				<div class="esperanza-about-me">
					<img src="<?php echo $image; ?>"  alt="Thumbnail" />
					<div><p><?php echo $description; ?></p></div>
					<div class="clearfix"></div>
				</div>							
				<?php		
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {	
		$image = empty( $instance['image'] ) ? __( '', 'esperanza_about_me_domain' ) : $instance['image'];
		$description = empty( $instance['description'] ) ? __( '', 'esperanza_about_me_domain' ) : $instance['description'];
	
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e( 'Image:', 'esperanza_about_me_domain' ); ?></label><br />
			<img class="custom_media_image" src="<?php echo $image; ?>" style="max-width:100px;" />
			<input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image'); ?>" id="<?php echo $this->get_field_id('image'); ?>" value="<?php echo $image; ?>">
		</p>
		<p><input type="button" value="<?php _e( 'Upload Image', 'esperanza_about_me_domain'); ?>" class="button custom_media_upload" id="custom_image_uploader"/></p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'esperanza_about_me_domain' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo esc_attr( $description ); ?>" />
		</p>
		
		
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		return $instance;
	}
} // Class esperanza_about_me ends here


/***** Esperanza Recent Comments *****/
class esperanza_recent_comments extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'esperanza_recent_comments', 

		// Widget name will appear in UI
		__('Esperanza Recent Comments', 'esperanza_recent_comments_domain'), 

		// Widget description
		array( 'description' => __( 'Shows your site\'s most recent comments.', 'esperanza_recent_comments_domain' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		global $post, $comments, $comment;
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Comments', 'esperanza_recent_comments_domain' ) : $instance['title'] );
		$number = empty( $instance['number'] ) ? 4 : $instance['number'];
		
		echo $args['before_widget'];
		
			echo $args['before_title'] . $title . $args['after_title'];

			$comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish', 'type' => 'comment' ) ) );
			
			if ( $comments ) {
				$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
				_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );
				
				foreach ( (array) $comments as $comment) { ?>
					<div class="esperanza-recent-comments">
						<?php echo get_avatar($comment->comment_author_email, 32); ?>
						<div class="esperanza-comment">
							<?php echo get_comment_author_link(); ?> on
							<a href="<?php echo get_comment_link($comment->comment_ID); ?>"><?php echo $comment->post_title; ?></a>
						</div>
						<div class="clearfix"></div>
					</div>	
					<?php
				}
			}
			
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
	
		$title = empty( $instance['title'] ) ? __( 'Recent Comments', 'esperanza_recent_comments_domain' ) : $instance['title'];
		$number = empty( $instance['number'] ) ? 4 : $instance['number'];
	
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'esperanza_recent_comments_domain' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:', 'esperanza_recent_comments_domain' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3">
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		return $instance;
	}
} // Class esperanza_recent_comments ends here

// Register and load the widget
function esperanza_load_widget() {
	register_widget( 'esperanza_recent_posts' );
	register_widget( 'esperanza_about_me' );
	register_widget( 'esperanza_recent_comments' );
}
add_action( 'widgets_init', 'esperanza_load_widget' );

function esperanza_wdScript(){
  wp_enqueue_media();
  wp_enqueue_script('adsScript', get_template_directory_uri() . '/assets/js/image-upload-widget.js' );
}
add_action('admin_enqueue_scripts', 'esperanza_wdScript');
?>