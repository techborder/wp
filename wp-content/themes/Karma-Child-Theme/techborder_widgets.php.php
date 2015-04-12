<?php
/* ---------------------------------------
SOCIAL MEDIA WIDGET
--------------------------------------- */
//add_action('widgets_init', create_function('', 'return register_widget("SocialMediaWidgetTechborder");'));

/**
 * Text widget class
 *
 * @since 2.8.0
 */
class Techb_Widget_Text extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'techb_techb_widget_text', 'description' => __('Techborder - Arbitrary text or HTML.'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('text', __('Techborder Text'), $widget_ops, $control_ops);
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
		$text = apply_filters( 'techb_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
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
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

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

   
	/**
	 * Fires after all default WordPress widgets have been registered.
	 *
	 * @since 2.2.0
	 */
}

add_action('widgets_init', 'techb_widgets_init');


?>