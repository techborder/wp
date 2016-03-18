<?php
/**
 * aldehyde Theme Customizer
 *
 * @package aldehyde
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aldehyde_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'aldehyde' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'aldehyde_logo' , array(
	    'default'     => '',
	    'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'aldehyde_logo',
	        array(
	            'label' => 'Upload Logo',
	            'section' => 'title_tagline',
	            'settings' => 'aldehyde_logo',
	            'priority' => 5,
	        )
		)
	);
	
	$wp_customize->add_setting( 'aldehyde_logo_resize' , array(
	    'default'     => 100,
	    'sanitize_callback' => 'aldehyde_sanitize_positive_number',
	) );
	$wp_customize->add_control(
	        'aldehyde_logo_resize',
	        array(
	            'label' => 'Resize & Adjust Logo',
	            'section' => 'title_tagline',
	            'settings' => 'aldehyde_logo_resize',
	            'priority' => 6,
	            'type' => 'range',
	            'active_callback' => 'aldehyde_logo_enabled',
	            'input_attrs' => array(
			        'min'   => 30,
			        'max'   => 200,
			        'step'  => 5,
			    ),
	        )
	);
	
	function aldehyde_logo_enabled($control) {
		$option = $control->manager->get_setting('aldehyde_logo');
		return $option->value() == true;
	}
	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override aldehyde_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('aldehyde_site_titlecolor', array(
	    'default'     => '#FFFFFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'aldehyde_site_titlecolor', array(
			'label' => __('Site Title Color','aldehyde'),
			'section' => 'colors',
			'settings' => 'aldehyde_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('aldehyde_header_desccolor', array(
	    'default'     => '#6bd233',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'aldehyde_header_desccolor', array(
			'label' => __('Site Tagline Color','aldehyde'),
			'section' => 'colors',
			'settings' => 'aldehyde_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	
	$wp_customize->add_setting( 'aldehyde_himg_align' , array(
	    'default'     => true,
	    'sanitize_callback' => 'aldehyde_sanitize_himg_align'
	) );
	
	/* Sanitization Function */
	function aldehyde_sanitize_himg_align( $input ) {
		if (in_array( $input, array('center','left','right') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
	'aldehyde_himg_align', array(
		'label' => __('Header Image Alignment','aldehyde'),
		'section' => 'header_image',
		'settings' => 'aldehyde_himg_align',
		'type' => 'select',
		'choices' => array(
				'center' => __('Center','aldehyde'),
				'left' => __('Left','aldehyde'),
				'right' => __('Right','aldehyde'),
			)
		
	) );
	
	$wp_customize->add_setting( 'aldehyde_himg_darkbg' , array(
	    'default'     => false,
	    'sanitize_callback' => 'aldehyde_sanitize_checkbox'
	) );
	
	$wp_customize->add_control(
	'aldehyde_himg_darkbg', array(
		'label' => __('Add a Dark Filter to make the text Above the Image More Clear and Easy to Read.','aldehyde'),
		'section' => 'header_image',
		'settings' => 'aldehyde_himg_darkbg',
		'type' => 'checkbox'
		
	) );
	
 
	
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'aldehyde_hide_title_tagline',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_hide_title_tagline', array(
		    'settings' => 'aldehyde_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'aldehyde' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'aldehyde_branding_below_logo',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_branding_below_logo', array(
		    'settings' => 'aldehyde_branding_below_logo',
		    'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'aldehyde' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		    'active_callback' => 'aldehyde_title_visible'
		)
	);
	
	function aldehyde_title_visible( $control ) {
		$option = $control->manager->get_setting('aldehyde_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	$wp_customize->add_setting(
		'aldehyde_center_logo',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_center_logo', array(
		    'settings' => 'aldehyde_center_logo',
		    'label'    => __( 'Center Align.', 'aldehyde' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	
	
	// SLIDER PANEL
	$wp_customize->add_panel( 'aldehyde_slider_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Main Slider',
	) );
	
	$wp_customize->add_section(
	    'aldehyde_sec_slider_options',
	    array(
	        'title'     => 'Enable/Disable',
	        'priority'  => 0,
	        'panel'     => 'aldehyde_slider_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'aldehyde_main_slider_enable',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_main_slider_enable', array(
		    'settings' => 'aldehyde_main_slider_enable',
		    'label'    => __( 'Enable Slider.', 'aldehyde' ),
		    'section'  => 'aldehyde_sec_slider_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'aldehyde_main_slider_count',
			array(
				'default' => '0',
				'sanitize_callback' => 'aldehyde_sanitize_positive_number'
			)
	);
	
	// Select How Many Slides the User wants, and Reload the Page.
	$wp_customize->add_control(
			'aldehyde_main_slider_count', array(
		    'settings' => 'aldehyde_main_slider_count',
		    'label'    => __( 'No. of Slides(Min:0, Max: 10)' ,'aldehyde'),
		    'section'  => 'aldehyde_sec_slider_options',
		    'type'     => 'number',
		    'description' => __('Save the Settings, and Reload this page to Configure the Slides.','aldehyde'),
		    
		)
	);
	
		
	
	if ( get_theme_mod('aldehyde_main_slider_count') > 0 ) :
		$slides = get_theme_mod('aldehyde_main_slider_count');
		
		for ( $i = 1 ; $i <= $slides ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'aldehyde_slide_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'aldehyde_slide_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'aldehyde_slide_sec'.$i,
			            'settings' => 'aldehyde_slide_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'aldehyde_slide_sec'.$i,
			    array(
			        'title'     => 'Slide '.$i,
			        'priority'  => $i,
			        'panel'     => 'aldehyde_slider_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'aldehyde_slide_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'aldehyde_slide_title'.$i, array(
				    'settings' => 'aldehyde_slide_title'.$i,
				    'label'    => __( 'Slide Title','aldehyde' ),
				    'section'  => 'aldehyde_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'aldehyde_slide_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'aldehyde_slide_desc'.$i, array(
				    'settings' => 'aldehyde_slide_desc'.$i,
				    'label'    => __( 'Slide Description','aldehyde' ),
				    'section'  => 'aldehyde_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			
			$wp_customize->add_setting(
				'aldehyde_slide_CTA_button'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'aldehyde_slide_CTA_button'.$i, array(
				    'settings' => 'aldehyde_slide_CTA_button'.$i,
				    'label'    => __( 'Custom Call to Action Button Text(Optional)','aldehyde' ),
				    'section'  => 'aldehyde_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'aldehyde_slide_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'aldehyde_slide_url'.$i, array(
				    'settings' => 'aldehyde_slide_url'.$i,
				    'label'    => __( 'Target URL','aldehyde' ),
				    'section'  => 'aldehyde_slide_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;
	
	
	endif;
	
	

	
		
	// Layout and Design
	$wp_customize->add_panel( 'aldehyde_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','aldehyde'),
	) );
	
	$wp_customize->add_section(
	    'aldehyde_design_options',
	    array(
	        'title'     => __('Blog Layout','aldehyde'),
	        'priority'  => 0,
	        'panel'     => 'aldehyde_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'aldehyde_blog_layout',
		array( 'sanitize_callback' => 'aldehyde_sanitize_blog_layout' )
	);
	
	function aldehyde_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','aldehyde','grid_2_column','grid_3_column') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'aldehyde_blog_layout',array(
				'label' => __('Select Layout','aldehyde'),
				'settings' => 'aldehyde_blog_layout',
				'section'  => 'aldehyde_design_options',
				'type' => 'select',
				'choices' => array(
						'aldehyde' => __('Aldehyde Layout','aldehyde'),
						'grid' => __('Basic Blog Layout','aldehyde'),
						'grid_2_column' => __('Grid - 2 Column','aldehyde'),
						'grid_3_column' => __('Grid - 3 Column','aldehyde'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'aldehyde_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','aldehyde'),
	        'priority'  => 0,
	        'panel'     => 'aldehyde_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'aldehyde_disable_sidebar',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_disable_sidebar', array(
		    'settings' => 'aldehyde_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','aldehyde' ),
		    'section'  => 'aldehyde_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'aldehyde_disable_sidebar_home',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_disable_sidebar_home', array(
		    'settings' => 'aldehyde_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','aldehyde' ),
		    'section'  => 'aldehyde_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'aldehyde_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'aldehyde_disable_sidebar_front',
		array( 'sanitize_callback' => 'aldehyde_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'aldehyde_disable_sidebar_front', array(
		    'settings' => 'aldehyde_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','aldehyde' ),
		    'section'  => 'aldehyde_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'aldehyde_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'aldehyde_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'aldehyde_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'aldehyde_sidebar_width', array(
		    'settings' => 'aldehyde_sidebar_width',
		    'label'    => __( 'Sidebar Width','aldehyde' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','aldehyde'),
		    'section'  => 'aldehyde_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'aldehyde_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function aldehyde_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('aldehyde_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	class Aldehyde_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'aldehyde_custom_codes',
    array(
    	'title'			=> __('Custom CSS','aldehyde'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','aldehyde'),
    	'priority'		=> 11,
    	'panel'			=> 'aldehyde_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'aldehyde_custom_css',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'aldehyde_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
	    new Aldehyde_Custom_CSS_Control(
	        $wp_customize,
	        'aldehyde_custom_css',
	        array(
	            'section' => 'aldehyde_custom_codes',
	            'settings' => 'aldehyde_custom_css'
	        )
	    )
	);
	
	function aldehyde_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'aldehyde_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','aldehyde'),
    	'description'	=> __('Enter your Own Copyright Text.','aldehyde'),
    	'priority'		=> 11,
    	'panel'			=> 'aldehyde_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'aldehyde_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'aldehyde_footer_text',
	        array(
	            'section' => 'aldehyde_custom_footer',
	            'settings' => 'aldehyde_footer_text',
	            'type' => 'text'
	        )
	);	
	
	$wp_customize->add_section(
	    'aldehyde_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','aldehyde'),
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'aldehyde_title_font',
		array(
			'default'=> 'Open Sans',
			'sanitize_callback' => 'aldehyde_sanitize_gfont' 
			)
	);
	
	function aldehyde_sanitize_gfont( $input ) {
		if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'aldehyde_title_font',array(
				'label' => __('Title','aldehyde'),
				'settings' => 'aldehyde_title_font',
				'section'  => 'aldehyde_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'aldehyde_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'aldehyde_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'aldehyde_body_font',array(
				'label' => __('Body','aldehyde'),
				'settings' => 'aldehyde_body_font',
				'section'  => 'aldehyde_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
	
	// Social Icons
	$wp_customize->add_section('aldehyde_social_section', array(
			'title' => __('Social Icons','aldehyde'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','protpress'),
					'facebook' => __('Facebook','aldehyde'),
					'twitter' => __('Twitter','aldehyde'),
					'google-plus' => __('Google Plus','aldehyde'),
					'instagram' => __('Instagram','aldehyde'),
					'rss' => __('RSS Feeds','aldehyde'),
					'vine' => __('Vine','aldehyde'),
					'vimeo-square' => __('Vimeo','aldehyde'),
					'youtube' => __('Youtube','aldehyde'),
					'flickr' => __('Flickr','aldehyde'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'aldehyde_social_'.$x, array(
				'sanitize_callback' => 'aldehyde_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'aldehyde_social_'.$x, array(
					'settings' => 'aldehyde_social_'.$x,
					'label' => __('Icon ','aldehyde').$x,
					'section' => 'aldehyde_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'aldehyde_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'aldehyde_social_url'.$x, array(
					'settings' => 'aldehyde_social_url'.$x,
					'description' => __('Icon ','aldehyde').$x.__(' Url','aldehyde'),
					'section' => 'aldehyde_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function aldehyde_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function aldehyde_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function aldehyde_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function aldehyde_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'aldehyde_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aldehyde_customize_preview_js() {
	wp_enqueue_script( 'aldehyde_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aldehyde_customize_preview_js' );
