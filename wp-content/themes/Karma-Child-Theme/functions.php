<?php
/* --------------------------------- */
/* Custom functions                  */
/* --------------------------------- */

//insert custom functions here
// Load Global Elements
//require_once('techborder_widgets.php');

/**
 * Register our sidebars and widgetized areas.
 *
 */

/**
 * Text widget class
 *
 * @since 2.8.0
 */
class Techb_Widget_Text extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'techb_widget_text', 'description' => __('Techborder - Arbitrary text or HTML.'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('techborder_text', __('Techborder Text'), $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $techb_widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$text = apply_filters( 'techb_widget_text', empty( $instance['techborder_text'] ) ? '' : $instance['techborder_text'], $instance );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['techborder_text'] =  $new_instance['techborder_text'];
		else
			$instance['techborder_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['techborder_text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'techborder_text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['techborder_text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('techborder_text'); ?>" name="<?php echo $this->get_field_name('techborder_text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
	}
}

/**
 * Register all of the .
 *
 *
 * @since 2.2.0
 */
function techb_widgets_init() {
	if ( !is_blog_installed() )
		return;
	
	register_widget('Techb_Widget_Text');
}

add_action('widgets_init', 'techb_widgets_init');


/* ----------------------------------------------------- */
/* Do not touch code below this line - sky may fall      */
/* ----------------------------------------------------- */

//@since 4.0.1, codes for compatibility with Better WordPress Minify Plugin
function karma_bwm_style() {
	wp_enqueue_style( 'karma-style', get_stylesheet_uri() );
}

//Checks for activated Better WordPress Minify Plugin, before adding action.
if(function_exists('bwp_minify')){
add_action( 'wp_enqueue_scripts', 'karma_bwm_style' );
}

?>