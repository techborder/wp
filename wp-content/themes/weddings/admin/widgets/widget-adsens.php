<?php 
class web_buis_adsens extends WP_Widget
{
    function web_buis_adsens(){
		$widget_ops = array('description' => 'Displays Adsense');
		$control_ops = array('width' => 400, 'height' => 500);
		parent::WP_Widget(false,$name='Adsense',$widget_ops,$control_ops);
	}

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);

		$adsenseCode = empty( $instance['adsenseCode'] ) ? '' : $instance['adsenseCode'];

		echo $before_widget;

		?>
		<div style="overflow: hidden;">
			<?php echo stripslashes($adsenseCode); ?>
		</div> 
	<?php
		echo $after_widget;
				
		}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		
		$instance = $old_instance;
		$instance['adsenseCode'] = wp_filter_post_kses( addslashes($new_instance['adsenseCode']));

		return $instance;
		
		}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
				//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Adsense', 'adsenseCode'=>'' ) );

		$title = esc_attr( $instance['title'] );
		$adsenseCode = esc_textarea( $instance['adsenseCode'] );	
		
		echo '<p><label for="' . $this->get_field_id('adsenseCode') . '">' . 'Adsense Code:' . '</label><textarea cols="20" rows="12" class="widefat" id="' . $this->get_field_id('adsenseCode') . '" name="' . $this->get_field_name('adsenseCode') . '" >'. stripslashes($adsenseCode) .'</textarea></p>';

		
		}

}// end web_buis_adv class
add_action('widgets_init', create_function('', 'return register_widget("web_buis_adsens");'))
?>