<?php
/* --------------------------------- */
/* Custom functions                  */
/* --------------------------------- */

/**
 * Social Networks widget with Yelp.
 */
class SocialMediaWidgetTechborder extends WP_Widget
{
	function SocialMediaWidgetTechborder()
	{
		$widget_ops = array(
		'classname' => 'social_widget_techborder',
		'description' => __('Link to your RSS feed and Social Media accounts.', 'truethemes_localize')
		);
		$this->WP_Widget('social_networks_techborder', __('CUSTOM - Social Networks by Techborder', 'truethemes_localize'), $widget_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title      = apply_filters('widget_title', $instance['title']);
		$title_link = strip_tags($instance['title_link']);
		if (!empty($title_link)) {
			$title_page = get_post($title_link);
		}
		$networks['RSS']        = $instance['rss'];
		$networks['Twitter']    = $instance['twitter'];
		$networks['Facebook']   = $instance['facebook'];
		$networks['Email']      = $instance['email'];
		$networks['Flickr']     = $instance['flickr'];
		$networks['YouTube']    = $instance['youtube'];
		$networks['LinkedIn']   = $instance['linkedin'];
		$networks['Pinterest']  = $instance['pinterest'];
		$networks['Instagram']  = $instance['instagram'];
		$networks['FourSquare'] = $instance['foursquare'];
		$networks['Delicious']  = $instance['delicious'];
		$networks['Digg']       = $instance['digg'];
		$networks['Google +']   = $instance['google'];
		$networks['Dribbble']   = $instance['dribbble'];
		$networks['Skype']      = $instance['skype'];
		$networks['Yelp']       = $instance['yelp'];
		$display                = $instance['display'];
		$vectorcheckbox         = $instance['vectorcheckbox'];
		$social_title_checkbox  = $instance['social_title_checkbox'];
		$colorcheckbox          = $instance['colorcheckbox'];
		$ttsocialtarget         = $instance['ttsocialtarget'];
		
	echo $before_widget;
	if (!empty($title)) {echo $before_title;}
	if (!empty($title_link)) {
		echo "<a href=\"" . get_permalink($title_page->ID) . "\">";
	}
	if (empty($title)) {
		echo $title_page->post_title;
	} else {
		echo $title;
	}
	if (!empty($title_link)) {
		echo "</a>";
	}

if (!empty($title)) {echo $after_title;}
?>

<ul class="social_icons<?php if( $vectorcheckbox && $vectorcheckbox == '1' ) {echo ' tt_vector_social_icons';} if( $colorcheckbox && $colorcheckbox == '1' ) {echo ' tt_vector_social_icons tt_vector_social_color';} if( $social_title_checkbox && $social_title_checkbox == '1' ) {echo ' tt_show_social_title';} if( empty($social_title_checkbox) ) {echo ' tt_no_social_title';} if( empty($vectorcheckbox) || empty($colorcheckbox) ) {echo ' tt_image_social_icons';} ?>">
<?php if (empty($networks['RSS'])): ?>
<li><a href="<?php bloginfo('rss2_url');?>" class="rss" title="<?php _e('RSS Feed', 'truethemes_localize');?>"><?php _e('RSS', 'truethemes_localize');?></a></li>

<?php else: ?>

<li><a href="<?php echo $networks['RSS'];?>" class="rss" title="<?php _e('RSS Feed', 'truethemes_localize');?>"><?php _e('RSS', 'truethemes_localize');?></a></li>

<?php endif;?>

<?php
	foreach (array(
		"Twitter",
		"Facebook",
		"Email",
		"Flickr",
		"YouTube",
		"LinkedIn",
		"Pinterest",
		"Instagram",
		"FourSquare",
		"Delicious",
		"Digg",
		"Google +",
		"Dribbble",
		"Skype",
		"Yelp"
	) as $network):
?>
<?php if (!empty($networks[$network])):?>
<li><a href="<?php echo $networks[$network];?>" class="<?php echo strtolower($network);?>" title="<?php echo $network;?>"<?php if( $ttsocialtarget && $ttsocialtarget == '1' ) {echo ' target="_blank"';}?>><?php echo str_replace(" ", '', $network);?></a></li>
<?php endif;endforeach;?>

</ul>

<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance               = $old_instance;
		$instance['title']      = strip_tags($new_instance['title']);
		$instance['title_link'] = $new_instance['title_link'];
		$instance['rss']        = $new_instance['rss'];
		$instance['twitter']    = $new_instance['twitter'];
		$instance['facebook']   = $new_instance['facebook'];
		$instance['email']      = $new_instance['email'];
		$instance['flickr']     = $new_instance['flickr'];
		$instance['youtube']    = $new_instance['youtube'];
		$instance['linkedin']   = $new_instance['linkedin'];
		$instance['pinterest']  = $new_instance['pinterest'];
		$instance['instagram']  = $new_instance['instagram'];
		$instance['foursquare'] = $new_instance['foursquare'];
		$instance['delicious']  = $new_instance['delicious'];
		$instance['digg']       = $new_instance['digg'];
		$instance['google']     = $new_instance['google'];
		$instance['dribbble']   = $new_instance['dribbble'];
		$instance['skype']      = $new_instance['skype'];
		$instance['yelp']       = $new_instance['yelp'];
		$instance['display']    = $new_instance['display'];
		$instance['vectorcheckbox']          = strip_tags($new_instance['vectorcheckbox']);
		$instance['social_title_checkbox']   = strip_tags($new_instance['social_title_checkbox']);
		$instance['colorcheckbox']           = strip_tags($new_instance['colorcheckbox']);
		$instance['ttsocialtarget']           = strip_tags($new_instance['ttsocialtarget']);
		
		return $instance;
	}
	
	function form($instance)
	{
		//@since 4.0.4 dev 5 declare all instance as empty to prevent PHP undefined index notice.
		$instance   = wp_parse_args((array) $instance, array(
		 'title' => '',
		 'techb_text' => '',
		 'title_link' => '',
		 'rss' => '',
		 'twitter'=>'',
		 'facebook'=>'',
		 'email'=>'',
		 'flickr'=>'', 
		 'youtube'=>'', 
		 'linkedin'=>'',
		 'pinterest'=>'', 
		 'instagram'=>'', 
		 'foursquare'=>'',
		 'delicious'=>'',
		 'digg'=>'',
		 'google'=>'',
		 'dribbble'=>'',
		 'skype'=>'',
		 'yelp'=>'',
		 'display'=>'',
		 'vectorcheckbox'=>'',
		 'social_title_checkbox'=>'',
		 'colorcheckbox'=>'',
		 'ttsocialtarget'=> ''
		  ));
		
		$title           = strip_tags($instance['title']);
		$title_link      = strip_tags($instance['title_link']);
		
		//define variables to prevent wp_debug error.
		$rss = $twitter = $facebook = $flickr = $youtube = $linkedin = $pinterest = $instagram = $foursquare = $delicious = $digg = $google = $dribbble = $skype = $yelp = $display = $vectorcheckbox = $social_title_checkbox = $colorcheckbox = $ttsocialtarget = '';
		$rss        = $instance['rss'];
		$twitter    = $instance['twitter'];
		$facebook   = $instance['facebook'];
		$email      = $instance['email'];
		$flickr     = $instance['flickr'];
		$youtube    = $instance['youtube'];
		$linkedin   = $instance['linkedin'];
		$pinterest  = $instance['pinterest'];
		$instagram  = $instance['instagram'];
		$foursquare = $instance['foursquare'];
		$delicious  = $instance['delicious'];
		$digg       = $instance['digg'];
		$google     = $instance['google'];
		$dribbble   = $instance['dribbble'];
		$skype      = $instance['skype'];
		$yelp       = $instance['yelp'];
		$display    = $instance['display'];
		$vectorcheckbox           = $instance['vectorcheckbox'];
		$social_title_checkbox    = $instance['social_title_checkbox'];
		$colorcheckbox            = $instance['colorcheckbox'];
		$ttsocialtarget           = $instance['ttsocialtarget'];
		$text                     = format_to_edit($instance['techb_text']);
		?>
	
		<p><br /><?php _e('Please enter the full URL to each of your Social Media accounts below.<br /><br />Simply leave the field blank if you do not wish to display that Social Media service.', 'truethemes_localize'); ?></p><br />
		
		<p style="color:#999;">
		<input id="<?php echo $this->get_field_id('vectorcheckbox'); ?>" name="<?php echo $this->get_field_name('vectorcheckbox'); ?>" type="checkbox" value="1" <?php checked( '1', $vectorcheckbox ); ?> />
		<label for="<?php echo $this->get_field_id('vectorcheckbox'); ?>"><?php _e('Check this box to switch to clean-style retina-ready vector icons.', 'truethemes_localize'); ?></label>
		</p><br />
		
		<p style="color:#999;">
		<input id="<?php echo $this->get_field_id('colorcheckbox'); ?>" name="<?php echo $this->get_field_name('colorcheckbox'); ?>" type="checkbox" value="1" <?php checked( '1', $colorcheckbox ); ?> />
		<label for="<?php echo $this->get_field_id('colorcheckbox'); ?>"><?php _e('Check this box to switch to colored retina-ready vector icons.', 'truethemes_localize'); ?></label>
		</p><br />
		
		<p style="color:#999;">
		<input id="<?php echo $this->get_field_id('social_title_checkbox'); ?>" name="<?php echo $this->get_field_name('social_title_checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $social_title_checkbox ); ?> />
		<label for="<?php echo $this->get_field_id('social_title_checkbox'); ?>"><?php _e('Check this box to display the social media name next to it\'s icon. (ie. "Twitter") ', 'truethemes_localize'); ?></label>
		</p><br />
		
		<p>
		<input id="<?php echo $this->get_field_id('ttsocialtarget'); ?>" name="<?php echo $this->get_field_name('ttsocialtarget'); ?>" type="checkbox" value="1" <?php checked( '1', $ttsocialtarget ); ?> />
		<label for="<?php echo $this->get_field_id('ttsocialtarget'); ?>"><?php _e('Check this box to open the Social Icon links in a new window', 'truethemes_localize'); ?></label>
		</p><br />
		
		<p><label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:<br />(ie. "Social Networks")', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('title_link');?>"><?php _e('Link the Title?', 'truethemes_localize');?></label>     
			
		<?php
		wp_dropdown_pages(array(
		'selected'         => $title_link,
		'name'             => $this->get_field_name('title_link'),
		'show_option_none' => __('None', 'truethemes_localize'),
		'sort_column'      => 'menu_order, post_title',
		'id'               => 'tt-social-widget-dropdown' //@since 4.0
		));
		?>
		</p>
				
		<p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS Feed:<br />(leave empty for default RSS Feed)', 'truethemes_localize'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('twitter');?>"><?php _e('Twitter:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter');?>" name="<?php echo $this->get_field_name('twitter');?>" type="text" value="<?php echo esc_attr($twitter);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('facebook');?>"><?php _e('Facebook:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook');?>" name="<?php echo $this->get_field_name('facebook');?>" type="text" value="<?php echo esc_attr($facebook);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('email');?>"><?php _e('Email Address:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email');?>" name="<?php echo $this->get_field_name('email');?>" type="text" value="<?php echo esc_attr($email);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('flickr');?>"><?php _e('Flickr:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr');?>" name="<?php echo $this->get_field_name('flickr');?>" type="text" value="<?php echo esc_attr($flickr);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('youtube');?>"><?php _e('Youtube:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('youtube');?>" name="<?php echo $this->get_field_name('youtube');?>" type="text" value="<?php echo esc_attr($youtube);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('linkedin');?>"><?php _e('LinkedIn:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin');?>" name="<?php echo $this->get_field_name('linkedin');?>" type="text" value="<?php echo esc_attr($linkedin);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('pinterest');?>"><?php _e('Pinterest:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('pinterest');?>" name="<?php echo $this->get_field_name('pinterest');?>" type="text" value="<?php echo esc_attr($pinterest);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('instagram');?>"><?php _e('Instagram:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('instagram');?>" name="<?php echo $this->get_field_name('instagram');?>" type="text" value="<?php echo esc_attr($instagram);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('foursquare');?>"><?php _e('FourSquare:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('foursquare');?>" name="<?php echo $this->get_field_name('foursquare');?>" type="text" value="<?php echo esc_attr($foursquare);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('delicious');?>"><?php _e('Delicious:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('delicious');?>" name="<?php echo $this->get_field_name('delicious');?>" type="text" value="<?php echo esc_attr($delicious);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('digg');?>"><?php _e('Digg:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('digg');?>" name="<?php echo $this->get_field_name('digg');?>" type="text" value="<?php echo esc_attr($digg);?>" /></p>
		
		
		<p><label for="<?php echo $this->get_field_id('google');?>"><?php _e('Google+:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('google');?>" name="<?php echo $this->get_field_name('google');?>" type="text" value="<?php echo esc_attr($google);?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('dribbble');?>"><?php _e('Dribbble:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('dribbble');?>" name="<?php echo $this->get_field_name('dribbble');?>" type="text" value="<?php echo esc_attr($dribbble);?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('skype');?>"><?php _e('Skype:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('skype');?>" name="<?php echo $this->get_field_name('skype');?>" type="text" value="<?php echo esc_attr($skype);?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('yelp');?>"><?php _e('Yelp:', 'truethemes_localize');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('yelp');?>" name="<?php echo $this->get_field_name('yelp');?>" type="text" value="<?php echo esc_attr($yelp);?>" /></p>
		
			
		<?php
	}
}

/**
 * Register the custom widgets for child theme.
 */
function techb_widgets_init() {
	if ( !is_blog_installed() )
		return;
	
	register_widget('SocialMediaWidgetTechborder');
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