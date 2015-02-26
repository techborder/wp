<?php

/////////////////////// include admin

require_once('admin/main_admin_controler.php');
require_once('custom/seo_meta.php');
require_once('front_end/front_end_functions.php');


$wedding_mobile_browser = '0';
$wedding_tablet_browser = '0';

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $wedding_mobile_browser++;
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $wedding_mobile_browser++;
}    
 
 $wedding_user_agent = empty($_SERVER['HTTP_USER_AGENT']) ? false : $_SERVER['HTTP_USER_AGENT'];


$wedding_mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$wedding_mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($wedding_mobile_ua,$wedding_mobile_agents)) {
    $wedding_mobile_browser++;
}
 if(isset($_SERVER['ALL_HTTP']))
if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
    $wedding_mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
    $wedding_mobile_browser = 0;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iemobile')>0) {
	$wedding_mobile_browser++;
}


//////////////////////////////////////tablet
if (preg_match('/(ipad|android|android 3.0|xoom|sch-i800|playbook|tablet|kindle)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $wedding_tablet_browser++;
}
if(preg_match('/(ipad|viewpad|tablet|bolt|xoom|touchpad|playbook|kindle|gt-p|gt-i|sch-i|sch-t|mz609|mz617|mid7015|tf101|g-v|ct1002|transformer|silk| tab)/i', $wedding_user_agent )  ||( preg_match('/android/i', $wedding_user_agent ) && !preg_match('/mobile/i', $wedding_user_agent )) ){
	$wedding_tablet_browser++;
}

if ($wedding_mobile_browser > 0) { define ("wedding_theme\device", "phone" ,TRUE);}

elseif ($wedding_tablet_browser > 0) { define ("wedding_theme\device", "tablet" ,TRUE);}

else {define ("wedding_theme\device", "", TRUE);}  

function wedding_setup() {

add_theme_support( 'custom-header', array(
	// Header image default
	'default-image'       => '',
	// Header text display default
	'header-text'         => false,
	'wp-head-callback'    => 'wedding_header_style',
	
) );

$wedding_defaults = array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $wedding_defaults );


	 load_theme_textdomain('wd_wedding', get_template_directory() . '/languages' );
	 
	 add_editor_style();
}

add_action( 'after_setup_theme', 'wedding_setup' );

function wedding_header_style(){
	$header_image = get_header_image();
	?>
	
	<style type="text/css">		
	<?php
	if ( ! empty( $header_image ) ) {
	?>.site-title {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
		}
		<?php
	}
	?>
	</style>	
	<?php
}

add_action('wp_head', 'wedding_header');

function wedding_header(){
	global  $dor_layout_page,		// leayut class variable
		$dor_typography_page,	// typagraphi class variable
		$dor_integration_page,	// integration class variable
		$dor_seo_page, // seo class variable
		$dor_color_control_page;// color control class variable
	foreach ($dor_color_control_page->options_colorcontrol as $value) {
     $$value['var_name'] = $value['std']; 
	}	
	
	$dor_seo_page->update_SEO();
	$dor_integration_page->update_head_integration(); 

	if ( is_singular() && get_theme_mod( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_get_post_tags('type=monthly&format=link');	

	$dor_layout_page->update_layout_editor();
	$dor_typography_page->print_fornt_end_style_typography();
	$dor_color_control_page->update_color_control();

	wedding_favicon_img();
	wedding_custom_head();
	wedding_custom_color();
	
	////////
	$menu_slug = 'primary-menu';
	 if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) && $locations[ $menu_slug ]!=0) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_slug ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	?>
	<script type="text/javascript">
	setTimeout(function(){
    <?php
	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $id = $menu_item->ID; ?>
		
       if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-item")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "<?php echo $selected_menu_color; ?>  url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-parent")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-page-parent")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		  if(jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub").hasClass("current-menu-ancestor")){
	        jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > ul").css("display", "block");
			jQuery(".top-nav-list.phone .menu-item-<?php echo $id; ?>.has-sub > a").css("background", "url(<?php echo get_template_directory_uri('template_url'); ?>/images/menu_down.png) right no-repeat");
		  }
		 
		
	<?php } ?>
	},500);
	</script>
<?php
}			

}

function wedding_entry_meta() {
    $categories_list = get_the_category_list(', ' );

	if ( $categories_list ) {
		echo '<span class="categories-links"><span class="sep">C.</span> ' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', ' , ' );
	
	if ( $tag_list ) {
		echo '<span class="tags-links"><span class="sep">T. </span>' . $tag_list . '</span>';
	}
}

function wedding_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>','wd_wedding' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		get_the_author()
	);	
} 

function wedding_posted_on_blog() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">Posted on %4$s</time></a>','wd_wedding' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		get_the_author()
	);	
}

function wedding_posted_on_single() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'wd_wedding' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wd_wedding' ), get_the_author() ) ),
		get_the_author()
	);
}

function wedding_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next    = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<nav class="page-navigation">
			<?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title', 'Previous post link' ); ?>
			<?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>', 'Next post link'  ); ?>
		</nav>
	<?php
}

function wedding_widgets_init()
{
    // Area 1, located at the top of the sidebar.
    register_sidebar(array(
            'name' => __('Primary Widget Area', 'WebBusiness'),
            'id' => 'primary-widget-area',
            'description' => __('The primary widget area', 'WebBusiness'),
            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',
            'after_widget' => '</div> ',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );

    // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

    register_sidebar(array(
            'name' => __('Secondary Widget Area', 'WebBusiness'),
            'id' => 'secondary-widget-area',
            'description' => __('The secondary widget area', 'WebBusiness'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
   
	// Area 3, located at the bottom of the sidebar.
    register_sidebar(array(
            'name' => __('Footer Widget Area 1', 'WebBusiness'),
            'id' => 'footer-widget-area1',
            'description' => __('The footer widget area', 'WebBusiness'),
            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',
            'after_widget' => '</div> ',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
	
	// Area 4, located at the bottom of the sidebar.
    register_sidebar(array(
            'name' => __('Footer Widget Area 2', 'WebBusiness'),
            'id' => 'footer-widget-area2',
            'description' => __('The footer widget area', 'WebBusiness'),
            'before_widget' => '<div id="%1$s" class="widget-area %2$s">',
            'after_widget' => '</div> ',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}

add_filter( 'wp_nav_menu_objects', 'wedding_add_menu_parent_class' );
function wedding_add_menu_parent_class( $items ) {
		
			$parents = array();
			foreach ( $items as $item ) {
				if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
					$parents[] = $item->menu_item_parent;
				}
			}
		
			foreach ( $items as $item ) {
				if ( in_array( $item->ID, $parents ) ) {
					$item->classes[] = 'haschild';
				}
			}
		
			return $items;
		}

//Register sidebars by running wedding_widgets_init() on the widgets_init hook.
add_action('widgets_init', 'wedding_widgets_init');

//Add support for WordPress 3.0's custom menus
add_action('init', 'wedding_register_menu');

//Register area for custom menu
function wedding_register_menu()
{

    register_nav_menu('primary-menu', __('Primary Menu','wd_wedding'));

}
add_filter('nav_menu_css_class' , 'wedding_special_nav_class' , 10 , 2);
function wedding_special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function wedding_add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="menu-item', $output, 1);  
  $output = substr_replace($output, 'class="last menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}

add_filter('wp_nav_menu', 'wedding_add_first_and_last');

function wedding_add_first_and_last_page_list($output) {
  $output = preg_replace('/class="page_item/', 'class="first page_item', $output, 1);  
  if(strripos($output, 'class="page_item'))
  $output = substr_replace($output, 'class="last page_item', strripos($output, 'class="page_item'), strlen('class="page_item'));
  return $output;
}

add_filter('wp_list_pages', 'wedding_add_first_and_last_page_list');

//Enable post and comments RSS feed links to head

add_theme_support('automatic-feed-links');

// Enable post thumbnails


    add_theme_support('post-thumbnails', array('post'));

    set_post_thumbnail_size(150, 150);


add_action('publish_page', 'wedding_add_custom_field_automatically');

add_action('publish_post', 'wedding_add_custom_field_automatically');

function wedding_add_custom_field_automatically($post_ID)
{

    if (!wp_is_post_revision($post_ID)) {

        add_post_meta($post_ID, 'field-name', 'custom value', true);

    }

}

if( !function_exists('wedding_the_excerpt_max_charlength')){
	function wedding_the_excerpt_max_charlength($charlength,$content=false) {
	if($content)
	{
		$excerpt=$content;
	}
	else
	{
		$excerpt = get_the_excerpt();
	}
		$charlength++;
	
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut ).'...';
			} else {
				echo $subex.'...';
			}
			
		} else {
			echo $excerpt;
		}
	}
}

function wedding_post_thumbnail($width, $height)
{

    $thumb = get_post_custom_values("Image");

    if (!empty($thumb)) {

        $str = '<img src="' . $thumb[0] . '" width="' . $width . '" height="' . $height . '" alt="' . get_the_title() . '" width="' . $width . '" height="' . $height . '" border="0" />';
        return $str;

    }

    return !empty($thumb);
}

function wedding_catch_that_image()
{

    global $post, $posts;

    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/', $post->post_content, $matches);
	if(isset($matches [1] [0])){	
    	$first_img = $matches [1] [0];
	}
    if (empty($first_img)) {

        //Defines a default image

        $first_img = get_template_directory_uri('template_url') . "/images/default.jpg";

    }

    return $first_img;
}


function wedding_first_image($width, $height,$url_or_img=0)
{
    $thumb = wedding_catch_that_image();
    if ($thumb) {

        $str = "<img src=\"";
        $str .= $thumb;

        $str .= '"';
        $str .= 'alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'" border="0" />';
        return $str;
    }
}

function wedding_empty_thumb()
{

    $thumb = get_post_custom_values("Image");

    return !empty($thumb);

}

function wedding_display_thumbnail($width, $height)
{
    if (has_post_thumbnail()) the_post_thumbnail(array($width, $height));

    elseif (!wedding_empty_thumb()) {
        return wedding_first_image($width, $height);
    } else {
        return wedding_post_thumbnail($width, $height);
    }
}

function wedding_thumbnail($width, $height)
{

    if (has_post_thumbnail())

        the_post_thumbnail(array($width, $height));

    elseif (wedding_empty_thumb()) {

        return wedding_post_thumbnail($width, $height);

    }
}



function wedding_remove_more_jump_link($link)
{

    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }

    return $link;

}

add_filter('the_content_more_link', 'wedding_remove_more_jump_link');

function wedding_p2h_comment($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	
	switch ($comment->comment_type){
		case '' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-avatar"><?php echo get_avatar($comment, $size = '54'); ?></div>
		<div class="comment-body">
			<p class="comment-meta"><span
					class="comment-author"><?php comment_author_link(); ?></span><?php _e(' on ', 'wd_wedding'); ?><?php comment_date() ?><?php _e(' at ', 'wd_wedding'); ?><?php comment_time() ?>
				.</p>
			<?php if ($comment->comment_approved == '0') { ?>
				<p><strong><?php _e('Your comment is awaiting moderation.', 'wd_wedding'); ?></strong></p>
			<?php } ?>
		
			<?php comment_text(); ?>
		
			<p class="comment-reply-meta"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
		</div>
		<?php
		break;
		
		case 'pingback'  :
		case 'trackback' :
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="post pingback">
		<p><?php _e('Pingback:', 'wd_wedding'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'wd_wedding'), ' '); ?></p>
		<?php
		break;
		
	}
}



function wedding_update_general_settings()
{

    global $dor_general_settings_page;

    foreach ($dor_general_settings_page->options_generalsettings as $value) {

        if (get_option($value['id']) === FALSE) {
            $$value['id'] = $value['std'];
        } else {
            $$value['id'] = get_option($value['id']);
        }

    }
}




$themename = "Slider Options";
$shortname = "ct";

//add_action('admin_init', 'mytheme_add_init');


///////////////////////////////////
///////////////////////////////////
//theme options end
///////////////////////////////////
///////////////////////////////////


/***************/
/*page meta box*/
/***************/

add_action('admin_init', 'wedding_meta_init');

function wedding_meta_init()
{

    wp_enqueue_script('web_business_meta_js', get_template_directory_uri() . '/custom/meta.js', array('jquery'));
    wp_enqueue_style('web_business_meta_css', get_template_directory_uri() . '/custom/meta.css');

    foreach (array('post', 'page') as $type) {
        add_meta_box('web_business_all_meta', 'Wedding Custom Meta Box', 'wedding_meta_setup', $type, 'normal', 'high');
    }

    add_action('save_post', 'wedding_meta_save');
}

function wedding_meta_setup()
{

	global $dor_layout_page,$dor_general_settings_page,$post;
	
	foreach ($dor_general_settings_page->options_generalsettings as $value) 
{
    if (get_theme_mod( $value['id'] ) === FALSE)
	{
		 $$value['var_name'] = $value['std']; 
	} else {
		 $$value['var_name'] = get_theme_mod( $value['id'] ); 
	}
}

	foreach ($dor_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id']) === FALSE) {
				
				$$value['var_name'] = $value['std'];
			} else {
				
				$$value['var_name'] = get_theme_mod($value['id']);
			}
		}

	}
    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID, '_web_business_meta', TRUE);

	if( gettype ($post->ID) == 'integer' ){
		$meta=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area ,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'show_comments' => $blog_style,
			'blogstyle' => '',
			'showthumb' => '',
			'blog_perpage' => get_option("_n_of_home_post",3),
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
		);
		
	}
	else
	{
		$meta_if_par_not_initilas=array(
			'layout' =>  $default_layout ,
			'content_width' =>  $content_area ,
			'main_col_width' =>  $main_column ,
			'pr_widget_area_width' =>  $pwa_width,
			'fullwidthpage' => $full_width,
			'show_comments' => $blog_style,
			'blogstyle' => '',
			'showthumb' => '',
			'blog_perpage' => get_option("_n_of_home_post",3),
			'showtitle' => '',
			'showdesc' => '',
			'detect_portrait' => '',
			'thumbsize' => '2',
			'static_pages_on' => '',			
			'all_categories_on' => '',
			'tags_on' => '',
			'archives_on' => '',
			'authors_on' => '',
			'blog_posts_on' => '',
		);
		foreach($meta_if_par_not_initilas as $key=>$meta_if_par_not_initila){
			
			if(!isset($meta[$key])){
				$meta[$key]=$meta_if_par_not_initila;
			}
		
		}
		
	}

    // instead of writing HTML here, lets do an include
    include(get_template_directory() . '/custom/meta.php');

    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="web_business_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function wedding_meta_save($post_id)
{
    // authentication checks

    // check user permissions
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'page') {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    } else {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }

    // authentication passed, save data

    // var types
    // single: _web_business_meta[var]
    // array: _web_business_meta[var][]
    // grouped array: _web_business_meta[var_group][0][var_1], _web_business_meta[var_group][0][var_2]

    $current_data = get_post_meta($post_id, '_web_business_meta', TRUE);
	if(isset($_POST['_web_business_meta']))
    $new_data = $_POST['_web_business_meta'];

    wedding_meta_clean($new_data);

    if ($current_data) {
        if (is_null($new_data)) delete_post_meta($post_id, '_web_business_meta');
        else update_post_meta($post_id, '_web_business_meta', $new_data);
    } elseif (!is_null($new_data)) {
        add_post_meta($post_id, '_web_business_meta', $new_data, TRUE);
    }

    return $post_id;
}

function wedding_meta_clean(&$arr)
{
    if (is_array($arr)) {
        foreach ($arr as $i => $v) {
            if (is_array($arr[$i])) {
                wedding_meta_clean($arr[$i]);

                if (!count($arr[$i])) {
                    unset($arr[$i]);
                }
            } else {
                if (trim($arr[$i]) == '') {
                    unset($arr[$i]);
                }
            }
        }

        if (!count($arr)) {
            $arr = NULL;
        }
    }
}

/*******************/
/*page meta box end*/
/*******************/

//search filter
function wedding_SearchFilter($query)
{
    if ($query->is_search or $query->is_feed) {
// Portfolio
		if(!isset($_GET['inc-posts']) && !isset($_GET['inc-pages'])){
			
				$query->set('post_type', array('post', 'page'));
			
		}
		else
        if ($_GET['inc-posts'] == "on" && $_GET['inc-pages'] != "on") {
            $query->set('post_type', 'post');
        } else if ($_GET['inc-posts'] != "on" && $_GET['inc-pages'] == "on") {
            $query->set('post_type', 'page');
        } else if ($_GET['inc-posts'] == "on" && $_GET['inc-pages'] == "on") {
            $query->set('post_type', array('post', 'page'));
        } else {
            $query->set('post_type', '');
        }
        if (isset($_GET['month']) && $_GET['month'] != "no") {
            $query->set('year', substr($_GET['month'], 0, 4));
            $query->set('monthnum', substr($_GET['month'], 4, 2));
        }
    }

    return $query;
}

// This filter will jump into the loop and arrange our results before they're returned
//add_filter('pre_get_posts', 'wedding_SearchFilter');


function wedding_update_page_layout_meta_settings()
{
	
	global $dor_layout_page, $post;
	foreach ($dor_layout_page->options_themeoptions as $value) {
		if(isset($value['id'])){
			if (get_theme_mod($value['id']) === FALSE) {
				
				$$value['var_name'] = $value['std'];
			} else {
				
				$$value['var_name'] = get_theme_mod($value['id']);
			}
		}

	}


    /*update page layout*/
  
	
	if(isset($post))
    $web_business_meta = get_post_meta($post->ID, '_web_business_meta', TRUE);

		
		if(!isset($web_business_meta['content_width']))
		$web_business_meta['content_width'] = $content_area;
		if(!isset($web_business_meta['main_col_width']))
		$web_business_meta['main_col_width'] = $main_column;
		if(!isset($web_business_meta['layout']))
		$web_business_meta['layout'] = $default_layout;
		if(!isset($web_business_meta['pr_widget_area_width']))
		$web_business_meta['pr_widget_area_width'] = $pwa_width;

	if (isset($web_business_meta['fullwidthpage']) && $web_business_meta['fullwidthpage']) {		
		$them_content_are_width='100%';
		?><script>var full_width_web_buisnes=1</script>
		  <style  type="text/css">
				     #footer-bottom{
						padding: 15px !important;
					}
		  </style><?php		
	}
	else {
			
		if(isset($web_business_meta['content_width']))
			$them_content_are_width=$web_business_meta['content_width'] . "px;";
		else
			$them_content_are_width=$content_area;
		
	}
    switch ($web_business_meta['layout']) {
        //set styles leauts
        case 1:
			?>
            <style type="text/css">
			#sidebar1,
			#sidebar2 {
				display:none;
			}
			#blog	{
				display:block; 
				margin: 0 auto;
				float: none;
			};
       
            .container{
				width:<?php echo $them_content_are_width; ?>
            }          			 
            </style>
			<?php
            break;
        case 2:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:right;
			}
			#blog{
				display:block;
				float:left;
			} 
            .container{
            width:<?php echo $them_content_are_width; ?>
            }
            #blog{
            width:<?php echo $web_business_meta['main_col_width']; ?>%;
            }
            #sidebar1{
            width:<?php echo (100  - $web_business_meta['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 3:
			?>
            <style type="text/css">
			#sidebar2{
				display:none;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
            width:<?php echo $them_content_are_width; ?>
            }
            #blog{
            width:<?php echo $web_business_meta['main_col_width']; ?>%;
            }
            #sidebar1{
            width:<?php echo (100  - $web_business_meta['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 4:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
						border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block; float:right;
			} 
			#blog{
				display:block;
				float:left;
			}
            .container{
            width:<?php echo $them_content_are_width; ?>
            }
            #blog{
            width:<?php echo $web_business_meta['main_col_width'] ; ?>%;
            }
            #sidebar1{
            width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
            }
            #sidebar2{
            width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
            }
            </style>
			 <?php
            break;
        case 5:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
						border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:left;
			} 
			#sidebar1 {
				display:block;
				float:left;
			} 
			#blog{
				display:block;
				float:right;
			}
            .container{
            width:<?php echo $them_content_are_width; ?>
            }
            #blog{
            width:<?php echo $web_business_meta['main_col_width']; ?>%;
            }
            #sidebar1{
            width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
            }
            #sidebar2{
            width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
            }
            </style>
			<?php
            break;
        case 6:
		?>
            <style type="text/css">
			.tablet #sidebar1, .phone #sidebar1{
						border-bottom: 1px dashed #959595;
			}
			#sidebar2{
				display:block;
				float:right;
			} 
			#sidebar1 {
				display:block;
				float:left; 
			} 
			#blog{
				display:block;
				float:left;
			}    			       
            .container{
            width:<?php echo $them_content_are_width; ?>
            }
            #blog{
            width:<?php echo $web_business_meta['main_col_width']; ?>%;
            }
            #sidebar1{
            width:<?php echo $web_business_meta['pr_widget_area_width']; ?>%;
            }
            #sidebar2{
            width:<?php echo (100  - $web_business_meta['pr_widget_area_width'] - $web_business_meta['main_col_width']); ?>%;
            }            
            </style><?php
            break;
    }
    /*update page layout end*/
}

/*customize*/



add_action('wp_ajax_themewdcaptchareturn', 'wedding_theme_wd_captchareturn');

function wedding_theme_wd_captchareturn(){
  //Check to see if the honeypot captcha field was filled in
   @session_start();

  if ( trim( $_GET['captcha_key'] ) !== $_SESSION['web_dor_them_cap_code'] ) {
    $captchaError = true;
	echo '3';
	exit;
  } else {
 
    //Check to make sure that the name field is not empty
      if ( trim($_GET['name']) === '') {
		  echo '4';
		  exit;
        $nameError = 'You forgot to enter your name.';
        $hasError = true;
      } else {
        $name = trim( $_GET['name'] );
      }
    
      
    //If there is no error, send the email
	if(isset($_GET['captcha_key']))
      $code=$_GET['captcha_key'];
    else
      $code='';

     if($code!='' and $code==$_SESSION['web_dor_them_cap_code'] ) {
        global $post;		
		$email=$_GET['email'];
        $web_dorado_meta_date = get_post_meta( $_GET['curenid'],'_web_business_meta',TRUE );
		if(isset($web_dorado_meta_date['email_to']) && $web_dorado_meta_date['email_to']!='')
         $emailTo = $web_dorado_meta_date['email_to'];
		else 
		 $emailTo = get_option( 'admin_email');
        $subject = $_GET['message_title'];
		$comments=$_GET['message'];
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $mail_send = wp_mail($emailTo, $subject, $body, '');
		if(!$mail_send){
			echo '5';
			exit;
		}

			
       echo '1';
	   
     }
  }

	
	die();
	
	
}

add_action('wp_ajax_themewdcaptcha', 'wedding_theme_wd_captcha');
add_action('wp_ajax_nopriv_themewdcaptcha', 'wedding_theme_wd_captcha');
function wedding_theme_wd_captcha()
{
 if(isset($_GET['action']) && $_GET['action']=='themewdcaptcha'){
  $cap_width=80;
$cap_height=30;
$cap_quality=100;
$cap_length_min=6;
$cap_length_max=6;
$cap_digital=1;
$cap_latin_char=1;
function code_generic($_length,$_digital=1,$_latin_char=1)
{
$dig=array(0,1,2,3,4,5,6,7,8,9);
$lat=array('a','b','c','d','e','f','g','h','j','k','l','m','n','o',
'p','q','r','s','t','u','v','w','x','y','z');
$main=array();
if ($_digital) $main=array_merge($main,$dig);
if ($_latin_char) $main=array_merge($main,$lat);
shuffle($main);
$pass=substr(implode('',$main),0,$_length);
return $pass;
}
if(isset($_GET['checkcap'])=='1'){
if($_GET['checkcap']=='1')
{
@session_start();
if(isset($_GET['cap_code'])){ 
if($_GET['cap_code']==$_SESSION['web_dor_them_cap_code'])
echo 1;
}
else echo 0;
}}
else
{
$l=rand($cap_length_min,$cap_length_max);
$code=code_generic($l,$cap_digital,$cap_latin_char);
@session_start();
$_SESSION['web_dor_them_cap_code']= $code;
$canvas=imagecreatetruecolor($cap_width,$cap_height);
$c=imagecolorallocate($canvas,rand(150,255),rand(150,255),rand(150,255));
imagefilledrectangle($canvas,0,0,$cap_width,$cap_height,$c);
$count=strlen($code);
$color_text=imagecolorallocate($canvas,0,0,0);
for($it=0;$it<$count;$it++)
{ $letter=$code[$it];
  imagestring($canvas,6,(10*$it+10),$cap_height/4,$letter,$color_text);
}
for ($c = 0; $c < 150; $c++){
	$x = rand(0,79);
	$y = rand(0,29);
	$col='0x'.rand(0,9).'0'.rand(0,9).'0'.rand(0,9).'0';
	imagesetpixel($canvas, $x, $y, $col);
	}
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');
header('Content-Type: image/jpeg');
imagejpeg($canvas,null,$cap_quality);

}	
die('');
}
}



/// include requerid scripts and styles


add_filter('wp_head','wedding_include_requerid_scripts_for_theme',1);

function wedding_include_requerid_scripts_for_theme(){
	wp_enqueue_script('jquery');	
	wp_enqueue_script('conect_js',get_template_directory_uri().'/scripts/conect_js.js');
	wp_enqueue_script('jquery-effects-transfer');
	wp_enqueue_script('google_maps', 'http://maps.google.com/maps/api/js?sensor=false');
	wp_enqueue_style('nivo_slider',get_template_directory_uri().'/slideshow/style.css');
	wp_enqueue_script('custom_js',get_template_directory_uri().'/scripts/javascript.js');
	wp_enqueue_script('response', get_template_directory_uri().'/scripts/responsive.js');
	wp_enqueue_style( 'webdr-style', get_stylesheet_uri(), array(), '2013-11-18' );

	if ( is_singular() && get_theme_mod( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
}



add_action( 'pre_get_posts', 'wedding_main_queries' );

function wedding_main_queries($query){
	if(is_home() && is_front_page() && $query->is_main_query()){
		
		global $paged;
		global $dor_home_page;
		foreach ($dor_home_page->options_homepage as $value) 
		{
			if(isset($value['id']))
			{
				if (get_theme_mod( $value['id'] ) === FALSE)
				{
					 $$value['var_name'] = $value['std']; 
				} 
				else { 		
					$$value['var_name'] = get_theme_mod( $value['id'] );
				}	
			}
		}
		//$cats = get_theme_mod('wedding_content_post_categories');		
        $cat_query="";
		$cat_checked="";
      
		$cat_query=substr($content_post_categories, 0, -1);
		$query->set( 'showposts', $n_of_home_post );
		$query->set( 'paged', $paged );
		$query->set( 'cat', $cat_query );
		$query->set( 'order', 'DESC' );
	}
}


function wedding_darkest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) - (hexdec( $color_part_1 )* $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  - (( ( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) - (( ( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	if(strlen($color_part_1)<2) $color_part_1="0".$color_part_1;
	if(strlen($color_part_2)<2) $color_part_2="0".$color_part_2;
	if(strlen($color_part_3)<2) $color_part_3="0".$color_part_3;

	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}


function wedding_ligthest_brigths($color,$pracent){

	$new_color=$color;
	if(!(strlen($new_color==6) || strlen($new_color)==7))
	{
		return $color;
	}
	$color_vandakanishov=strpos($new_color,'#');
	if($color_vandakanishov == false) {
		$new_color= str_replace('#','',$new_color);
	}
	$color_part_1=substr($new_color, 0, 2);
	$color_part_2=substr($new_color, 2, 2);
	$color_part_3=substr($new_color, 4, 2);
	$color_part_1=dechex( (int) (hexdec( $color_part_1 ) + (( 255-( hexdec( $color_part_1 ) ) ) * $pracent / 100 )));
	$color_part_2=dechex( (int) (hexdec( $color_part_2)  + (( 255-( hexdec( $color_part_2 ) ) ) * $pracent / 100 )));
	$color_part_3=dechex( (int) (hexdec( $color_part_3 ) + (( 255-( hexdec( $color_part_3 ) ) ) * $pracent / 100 )));
	$new_color=$color_part_1.$color_part_2.$color_part_3;
	if($color_vandakanishov == false){
		return $new_color;
	}
	else{
		return '#'.$new_color;
	}

}
function wedding_remove_last_comma($string=''){
	
	if(substr($string,-1)==',')
		return substr($string, 0, -1);
	else
		return $string;
	
}

add_filter('body_class', 'wedding_multisite_body_classes');
function wedding_multisite_body_classes($classes){
	foreach($classes as $key=>$class)
	{
		if($class=='blog')
		$classes[$key]='blog_body';
	}
	return $classes;
	
}

function wedding_custom_head(){
	
global $dor_general_settings_page;
foreach ( $dor_general_settings_page->options_generalsettings as $value ) {
	if(isset($value['id'])){
		
		if ( get_theme_mod( $value['id'] ) === FALSE ) {
		   $$value['id'] = $value['std']; 
		} 
		else {
		   $$value['id'] = get_theme_mod( $value['id'] ); 
		}
		
	}
}?>

<script>
	var skzbi_hasce="<?php echo get_template_directory_uri(); ?>";
	$ = jQuery;
</script>
<?php

	echo "<style>".stripslashes(get_theme_mod("_custom_css"))."</style>";
?>

<?php
	
	
}



function wedding_custom_color(){

global $dor_color_control_page;

foreach ($dor_color_control_page->options_colorcontrol as $value) {
     $$value['var_name'] = $value['std']; 
}
$background_color = get_background_color();
?>

<script type="text/javascript">
if(typeof(window.parent.wedding_menu_links_hover_color)=='undefined')
	var wedding_menu_links_hover_color='';
else
	var wedding_menu_links_hover_color=window.parent.wedding_menu_links_hover_color;
	
if(typeof(window.parent.wedding_menu_links_color)=='undefined')
	var wedding_menu_links_color='';
else
	var wedding_menu_links_color=window.parent.wedding_menu_links_color;

if(typeof(window.parent.wedding_link_color_stop)=='undefined')
	var wedding_link_color_stop='';
else
	var wedding_link_color_stop=window.parent.wedding_link_color_stop;
	
if(typeof(window.parent.wedding_logo_text_color)=='undefined')
	var wedding_logo_text_color='';
else
	var wedding_logo_text_color=window.parent.wedding_logo_text_color;	

if(typeof(window.parent.wedding_link_color_hover)=='undefined')
	var wedding_link_color_hover='';
else
	var wedding_link_color_hover=window.parent.wedding_link_color_hover;

if(typeof(window.parent.wedding_static_color)=='undefined')
	var wedding_static_color='';
else
	var wedding_static_color=window.parent.wedding_static_color;

if(typeof(window.parent.wedding_selected_menu_color)=='undefined')
	var wedding_selected_menu_color='';
else
	var wedding_selected_menu_color=window.parent.wedding_selected_menu_color;

if(typeof(window.parent.wedding_footer_back_color)=='undefined')
	var wedding_footer_back_color='';
else
	var wedding_footer_back_color=window.parent.wedding_footer_back_color;
	
if(typeof(window.parent.wedding_featured_posts_color)=='undefined')
	var wedding_featured_posts_color='';
else
	var wedding_featured_posts_color=window.parent.wedding_featured_posts_color;	

if(typeof(window.parent.wedding_sideb_background_color)=='undefined')
	var wedding_sideb_background_color='';
else
	var wedding_sideb_background_color=window.parent.wedding_sideb_background_color;
	
if(typeof(window.parent.wedding_top_posts_color)=='undefined')
	var wedding_top_posts_color='';
else
	var wedding_top_posts_color=window.parent.wedding_top_posts_color;	

if(typeof(window.parent.wedding_menu_hover_back_color)=='undefined')
	var wedding_menu_hover_back_color='';
else
	var wedding_menu_hover_back_color=window.parent.wedding_menu_hover_back_color;

if(typeof(window.parent.wedding_content_back_color)=='undefined')
	var wedding_content_back_color='';
else
	var wedding_content_back_color=window.parent.wedding_content_back_color;

if(typeof(window.parent.wedding_footer_sidebar)=='undefined')
	var wedding_footer_sidebar='';
else
	var wedding_footer_sidebar=window.parent.wedding_footer_sidebar;	
	
if(typeof(window.parent.wedding_primary_text_color)=='undefined')
	var wedding_primary_text_color='';
else
	var wedding_primary_text_color=window.parent.wedding_primary_text_color;

if(typeof(window.parent.wedding_text_headers_color)=='undefined')
	var wedding_text_headers_color='';
else
	var wedding_text_headers_color=window.parent.wedding_text_headers_color;

if(typeof(window.parent.wedding_footer_text_color)=='undefined')
	var wedding_footer_text_color='';
else
	var wedding_footer_text_color=window.parent.wedding_footer_text_color;

	if(typeof(window.parent.wedding_logo_text_color_for_phone)=='undefined')
	var wedding_logo_text_color_for_phone='';
else
	var wedding_logo_text_color_for_phone=window.parent.wedding_logo_text_color_for_phone;
	
function hex2rgb(hex) {
	if (hex[0]=="#") hex=hex.substr(1);
		if (hex.length==3) {
			var temp=hex; hex='';
			temp = /^([a-f0-9])([a-f0-9])([a-f0-9])$/i.exec(temp).slice(1);
			for (var i=0;i<3;i++) hex+=temp[i]+temp[i];
		}
		var triplets = /^([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})$/i.exec(hex).slice(1);
		return {
			red:   parseInt(triplets[0],16),
			green: parseInt(triplets[1],16),
			blue:  parseInt(triplets[2],16)
		}
	}
	
jQuery(document).ready(function() { 

jQuery(function(){	
    jQuery('#top-nav-list li:not(.top-nav-list .current-menu-item, #top-nav-list .activem, .phone .top-nav-list .current_page_item), .top-nav-list li:not( .top-nav-list .current-menu-item, .top-nav-list .active, .phone .top-nav-list .current_page_item)').hover(
	<?php
$menucolor=str_replace('#','',$selected_menu_color);
$menubg_color='rgba('.HEXDEC(SUBSTR($menucolor, 0, 2)).','.HEXDEC(SUBSTR($menucolor, 2, 2)).','.HEXDEC(SUBSTR($menucolor, 4, 2)).',0.4'.')'; 

?>
       function(){	
            if(wedding_menu_hover_back_color == ""){
				jQuery(this).css('background-color','<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>');
			}
            else{
				var anyString = wedding_menu_hover_back_color;
				var hex = wedding_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css('background-color', hextorgb);						
			}	   
		}, 
	   function(){
			if(wedding_static_color == ""){
				jQuery(this).css('background-color', 'transparent');
			}
			else{						
				jQuery(this).css('background-color', wedding_static_color);
			}
		}	
    );
	//jQuery('a').css('color', '<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#ffffff"; } ?>');
	
	 jQuery('.phone #top-nav-list li:not(.top-nav-list .current-menu-item, .phone #top-nav-list .active, .phone .top-nav-list .current_page_item), .phone .top-nav-list li:not( .top-nav-list .current-menu-item, .top-nav-list .active, .phone .top-nav-list .current_page_item)').hover(
	<?php
$menucolor1=str_replace('#','',$selected_menu_color);
$menubg_color1='rgba('.HEXDEC(SUBSTR($menucolor1, 0, 2)).','.HEXDEC(SUBSTR($menucolor1, 2, 2)).','.HEXDEC(SUBSTR($menucolor1, 4, 2)).',0.4'.')'; 

?>
       function(){	
            if(wedding_menu_hover_back_color == ""){
				jQuery(this).attr('style', 'background-color: <?php if($menubg_color1){ echo $menubg_color1; } else { echo "#044967"; } ?> !important');
			}
            else{
				var anyString = wedding_menu_hover_back_color;
				var hex = wedding_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css('background-color', hextorgb);						
			}	   
		}, 
	   function(){
				jQuery(this).attr('style', 'background-color: <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
			if(wedding_static_color == ""){
			}
			else{						
				jQuery(this).css('background-color', wedding_static_color);
			}
		}	
    );
	
	if(wedding_content_back_color == ''){	 
	     jQuery( '#sidebar3 .sidebar-container, #sidebar4, #sidebar4 .sidebar-container' ).css('background-color','<?php if($content_back_color){ echo $content_back_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '#sidebar3 .sidebar-container, #sidebar4, #sidebar4 .sidebar-container' ).css('background-color',wedding_content_back_color );	
    }
	
	if(wedding_footer_sidebar == ''){	 
	     jQuery( '#sidebar4, #sidebar4 .sidebar-container' ).css('background-color','<?php if($footer_sidebar){ echo $footer_sidebar; } else { echo "#f8f8f8"; } ?>' );
    } else {	
	    jQuery( '#sidebar4, #sidebar4 .sidebar-container' ).css('background-color',wedding_footer_sidebar );	
    }
	
    jQuery('#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a').hover(
		function(){
		<?php 
		$menucolor=str_replace('#','',$selected_menu_color);
		$menubg_color='rgba('.HEXDEC(SUBSTR($menucolor, 0, 2)).','.HEXDEC(SUBSTR($menucolor, 2, 2)).','.HEXDEC(SUBSTR($menucolor, 4, 2)).',0.4'.')'; 
		?>
			if(wedding_menu_hover_back_color == '')
				jQuery(this).css( "background-color", "<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>");
			else{
				var anyString = wedding_menu_hover_back_color;
				var hex = wedding_menu_hover_back_color;
				var rgb = hex2rgb(hex);
				var hextorgb = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
				jQuery(this).css( "background-color", wedding_menu_hover_back_color);
				}
			if(wedding_menu_links_hover_color == '')
				jQuery(this).css( "color", "<?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?>");
			else
				jQuery(this).css( "color", wedding_menu_links_hover_color);	
        }, 
		function(){
		<?php 
			$selectedmenucoloro=str_replace('#','',$selected_menu_color);
	$selmenubg_coloro='rgba('.HEXDEC(SUBSTR($selectedmenucoloro, 0, 2)).','.HEXDEC(SUBSTR($selectedmenucoloro, 2, 2)).','.HEXDEC(SUBSTR($selectedmenucoloro, 4, 2)).',0.4'.')';
		?>
			if(wedding_selected_menu_color == "")
				jQuery(this).css( "background-color", "<?php if($selmenubg_coloro){ echo $selmenubg_coloro; } else { echo "#044967"; } ?>");
			else
				jQuery(this).css( "background-color", wedding_selected_menu_color);
			if(wedding_menu_links_hover_color == '')
				jQuery(this).css( "color", "<?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?>");
			else
				jQuery(this).css( "color", wedding_menu_links_hover_color);	
		}
	);
    jQuery('a:not(#top-nav-list a):not(.site-title-a):not(.top-nav-list a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a)').hover(
      function(){
			if(wedding_link_color_hover == '')
				jQuery(this).css('color', '<?php if($primary_links_hover_color){ echo $primary_links_hover_color; } else { echo "#000000"; } ?>');
			else
				jQuery(this).css( 'color', wedding_link_color_hover );
        }, 
		function(){
			if(wedding_link_color_stop == '')
				jQuery(this).css('color', '<?php if($primary_links_color){ echo $primary_links_color; } else { echo "#000000"; } ?>');
			else
				jQuery(this).css( 'color', wedding_link_color_stop);
		}
    );
	if(wedding_link_color_stop == ''){	 
	     jQuery( 'a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a), .gallery_cat, .test_cat, .blog h3' ).css('color','<?php if($primary_links_color){ echo $primary_links_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( 'a:not(#top-nav-list a):not(.site-title-a):not(h1 a):not(h2 a):not(h5 a):not(h6 a):not(#wpadminbar a):not(#blackbox-web-debug a), .gallery_cat, .test_cat, .blog h3' ).css('color',wedding_link_color_stop );	
    }
	
	if(wedding_selected_menu_color == ''){	 
	<?php
	$selectedmenucolor=str_replace('#','',$selected_menu_color);
	$selmenubg_color='rgba('.HEXDEC(SUBSTR($selectedmenucolor, 0, 2)).','.HEXDEC(SUBSTR($selectedmenucolor, 2, 2)).','.HEXDEC(SUBSTR($selectedmenucolor, 4, 2)).',0.4'.')';  ?>
	     jQuery( '.top-nav-list .current-menu-item,.top-nav-list li.current_page_item, .top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active' ).css('background-color','<?php if($selmenubg_color){ echo $selmenubg_color; } else { echo "#044A9F"; } ?>' );
		 jQuery( '.sep' ).css('color','<?php if($selmenubg_color){ echo $selmenubg_color; } else { echo "#044A9F"; } ?>' );
		
    } else {
		var anyString = wedding_selected_menu_color;
		var hex = wedding_selected_menu_color;
		var rgb = hex2rgb(hex);
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '.top-nav-list .current-menu-item,.top-nav-list li.current_page_item, .top-nav-list.phone   li ul li:hover  > a,.top-nav-list.phone   li ul li  > a:hover, .top-nav-list.phone   li ul li  > a:focus, .top-nav-list.phone   li ul li  > a:active' ).css('background-color',hextorgba );	
    }
    if(wedding_footer_back_color == ''){	 
	     jQuery( '#footer, .device' ).css('background-color','<?php if($footer_back_color){ echo $footer_back_color; } else { echo "#E3E2E2"; } ?>' );
    } else {	
	    jQuery( '#footer, .device' ).css('background-color',wedding_footer_back_color );	
    }
    
    if(wedding_primary_text_color == ''){	 
	     jQuery( '#wrapper, #content, #sidebar3 p, #sidebar4 p, .blog p, .blog span, .sep' ).css('color','<?php if($primary_text_color){ echo $primary_text_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '#wrapper, #content, #sidebar3 p, #sidebar4 p, .blog p, #top-posts span, .sep' ).css('color',wedding_primary_text_color );	
    } 
    if(wedding_static_color == ''){	 
		<?php  $color=str_replace('#','',$menu_elem_back_color);
	    $bg_color='rgba('.HEXDEC(SUBSTR($color, 0, 2)).','.HEXDEC(SUBSTR($color, 2, 2)).','.HEXDEC(SUBSTR($color, 4, 2)).',0.4'.')'; ?>
	     jQuery( '#top-nav-list>li>ul, #top-nav, .read_more' ).css('background-color','<?php if($bg_color){ echo $bg_color; } else { echo "#091F3C"; } ?>' );
		 
    } else {	
		var anyString = wedding_static_color;
		var hex = wedding_static_color;
		var rgb = hex2rgb(hex);
		var hextorgb = "rgb("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";	
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '#top-nav-list>li>ul, #top-nav, .read_more' ).css('background-color',hextorgba );	
		
    }	
	if(wedding_text_headers_color == ''){
		 var slider_dir = jQuery('#top-nav').height();	
	     jQuery( 'h1, h2:not(.blog h2), h3:not(#top-posts-list h3):not(.widget-area h3):not(.blog h3), h4, h5, h6, .blog_wel h2 > a,#sidebar3, #sidebar4' ).css('color','<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' );
		 jQuery("#ccc").html("h1, h2, h3, h4, h5, h6{color:<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>;}");
		 jQuery('#top-nav-list > li ul  li').attr('style', 'border-bottom: 1px solid #<?php echo wedding_darkest_brigths($text_headers_color,10); ?>');
		 jQuery( '#top-nav-list > li ul' ).attr('style', 'border-bottom: 2px solid #<?php echo wedding_darkest_brigths($text_headers_color,10); ?>');
		 jQuery(".web #slideshow, .tablet #slideshow").attr("style","border-bottom: 1px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>; margin-top: -"+slider_dir+ "px");
		 jQuery( '.widget-area > ul li' ).css('color', '<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' );
		 jQuery( 'h1 a, h2 a, h3 a:not(#top-posts-list h3 a):not(h3 a), h4 a:not(h4 a), h5 a, h6 a' ).css('color','<?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?>' ); 
		 jQuery( '.sub-menu, .contact_send' ).attr('style','background-color: <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		 jQuery('#top-nav-list > li > a:hover, #top-nav-list > li.active > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		
		 jQuery("#top-nav-list > li.active > a").attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");
		 jQuery("#top-nav-list ul li > a").attr("style","border-top: 3px solid transparent !important");
		 jQuery('#top-nav-list > li.current_page_item > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
		 jQuery("#top-nav-list > li.current_page_item > a").hover(function(){
		 jQuery(this).attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");				
			},function(){
		 jQuery(this).attr("style","border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important");
			  });				
			jQuery('.top-nav-list > li.current_page_item > a').attr('style', 'border-top: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
			
			jQuery( '.blog_test img' ).attr('style', 'border-bottom: 3px solid <?php if($text_headers_color){ echo $text_headers_color; } else { echo "#0B2749"; } ?> !important');
    } else {
		var slider_dir = jQuery('#top-nav').height();
		setTimeout(function() {
		jQuery("#top-nav-list > li.current_page_item > a, #top-nav-list > li.current-menu-ancestor > a").attr("style","border-top: 3px solid "+wedding_text_headers_color+" !important");
		jQuery( '.web #slideshow, .tablet #slideshow' ).attr('style', 'border-bottom: 1px solid '+wedding_text_headers_color+'; margin-top: -'+slider_dir+ 'px');
		},100);
		jQuery('#top-nav-list > li ul  li').attr('style', 'border-bottom: 1px solid '+wedding_text_headers_color);
		jQuery( '.widget-area > ul li' ).css('color', wedding_text_headers_color );
		jQuery( '#top-nav-list > li ul' ).attr('style', 'border-bottom: 2px solid '+wedding_text_headers_color);
		jQuery( 'h1, h2:not(.blog h2), h3:not(#top-posts-list h3):not(.widget-area h3).blog h3, h4, h5, h6, #sidebar3, #sidebar4' ).css('color',wedding_text_headers_color );	
		jQuery("#ccc").html("h1, h2, h3, h4, h5, h6{color:"+wedding_text_headers_color+";}");	
		jQuery( '.sub-menu, .contact_send' ).attr('style','background-color:'+ wedding_text_headers_color +' !important');
		jQuery( 'h1 a, h2 a, h3 a:not(#top-posts-list h3 a):not(h3 a), h4 a:not(h4 a), h5 a, h6 a' ).css('color',wedding_text_headers_color );	
		jQuery('#top-nav-list > li > a:hover').attr('style', 'border-top: 3px solid '+wedding_text_headers_color+' !important');
		jQuery("#top-nav-list > li a").hover(function(){
			jQuery(this).attr("style","border-top: 3px solid "+wedding_text_headers_color+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid transparent !important");
			  });
		jQuery("#top-nav-list > li.active > a").attr("style","border-top: 3px solid "+wedding_text_headers_color+" !important");
		jQuery("#top-nav-list ul li > a").attr("style","border-top: 3px solid transparent !important");				
		jQuery("#top-nav-list > li.current_page_item > a").hover(function(){
		jQuery(this).attr("style","border-top: 3px solid "+wedding_text_headers_color+" !important");				
				},function(){
				jQuery(this).attr("style","border-top: 3px solid "+wedding_text_headers_color+" !important");
			  });				 
		jQuery( '.blog_test img' ).attr('style', 'border-bottom: 3px solid '+wedding_text_headers_color+' !important');
    } 
	if(wedding_footer_text_color == ''){	 
	     jQuery( '.device, #footer' ).css('color','<?php if($footer_text_color){ echo $footer_text_color; } else { echo "#000000"; } ?>' );
    } else {	
	    jQuery( '.device, #footer' ).css('color',wedding_footer_text_color );	
    }

	if(wedding_top_posts_color == ''){	 
	     jQuery( '.top-posts-texts' ).css('background-color','<?php if($top_posts_color){ echo $top_posts_color; } else { echo "#012331"; } ?>' );
    } else {	
	    jQuery( '.top-posts-texts' ).css('background-color',wedding_top_posts_color );	
    }
	if(wedding_sideb_background_color == ''){	 
	     jQuery( '#sidebar1 .sidebar-container, #sidebar2 .sidebar-container, .commentlist li' ).css('background-color','<?php if($sideb_background_color){ echo $sideb_background_color; } else { echo "#ffffff"; } ?>' );
    } else {	
	    jQuery( '#sidebar1 .sidebar-container, #sidebar2 .sidebar-container, .commentlist li' ).css('background-color',wedding_sideb_background_color );	
    }
	if(wedding_menu_hover_back_color == ''){			
	     jQuery( '.get_title, #menu-button-block' ).css('background-color','<?php if($menubg_color){ echo $menubg_color; } else { echo "#044967"; } ?>' );
    } else {
		var anyString = wedding_menu_hover_back_color;
		var hex = wedding_menu_hover_back_color;
		var rgb = hex2rgb(hex);
		var hextorgb = "rgb("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";	
		var hextorgba = "rgba("+rgb.red+","+rgb.green+","+rgb.blue+",0.4)";
	    jQuery( '.get_title, #menu-button-block' ).css('background-color',hextorgba );	
    }

	if(wedding_logo_text_color == ''){	 
	     jQuery( '.site-title-a, .styledHeading' ).css('color','<?php if($logo_text_color){ echo $logo_text_color; } else { echo "#ffffff"; } ?>' );
    } else {	
	    jQuery( '.site-title-a, .styledHeading' ).css('color',wedding_logo_text_color );	
    } 
	
	if(wedding_menu_links_hover_color == ''){	 
	     jQuery( '#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .read_more, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a' ).attr('style', 'color: <?php if($menu_links_hover_color){ echo $menu_links_hover_color; } else { echo "#ffffff"; } ?> !important' );
    } else {	
	    jQuery( '#top-nav-list .current-menu-item > a, #top-nav-list .current_page_item > a, .read_more, .top-nav-list .current-menu-item > a, .top-nav-list .current_page_item > a' ).attr('style', 'color: ' +wedding_menu_links_hover_color+ ' !important' );	
    }
	if(wedding_menu_links_color == ""){	 
	     jQuery( "#top-nav-list li a:not(#top-nav-list .current-menu-item a, #top-nav-list .active), .top-nav-list li a:not(.top-nav-list .current-menu-item a, .top-nav-list .active)" ).css("color","<?php if($menu_links_color){ echo $menu_links_color; } else { echo "#ffffff"; } ?>" );
    } else {	
	    jQuery( "#top-nav-list li a:not(#top-nav-list .current-menu-item a, #top-nav-list .active), .top-nav-list li a:not(.top-nav-list .current-menu-item a, .top-nav-list .active)" ).css("color",wedding_menu_links_color );	
    }  
});
});
</script>
<style id="ccc" type="text/css">
</style>
<?php
}
?>
