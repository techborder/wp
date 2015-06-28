<?php
/**
 * klean Theme Customizer
 *
 * @package klean
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function klean_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_panel( 'widgets' );
	
	$wp_customize-> add_setting(
	'logo',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'esc_url_raw',
		)
	);
    
    $wp_customize-> add_control(
	new WP_Customize_Image_Control(
        $wp_customize,
        'logo',
        array(
            'label' => __('OR Logo Upload', 'klean'),
            'section' => 'title_tagline',
            'settings' => 'logo'
            )
        )
    );
	
	$wp_customize-> add_section(
    'klean_social',
    array(
    	'title'			=> __('Social Settings','klean'),
    	'description'	=> __('Manage the Social Icon Setings of your site.','klean'),
    	'priority'		=> 3,
    	)
    );
    
    $wp_customize-> add_setting(
    'social',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'klean_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'social',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Social Icons','klean'),
    	'section'	=> 'klean_social',
    	'priority'	=> 1,
    	)
    );

    $wp_customize-> add_setting(
    'facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'facebook',
    array(
    	'label'		=> __('Facebook URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'twitter',
    array(
    	'label'		=> __('Twitter URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'google-plus',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'google-plus',
    array(
    	'label'		=> __('Google Plus URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'instagram',
    array(
    	'label'		=> __('Instagram URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'pinterest-p',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'pinterest-p',
    array(
    	'label'		=> __('Pinterest URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'youtube',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'youtube',
    array(
    	'label'		=> __('Youtube URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'linkedin',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'linkedin',
    array(
    	'label'		=> __('Linked-In URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );

    
    $wp_customize-> add_setting(
    'vimeo-square',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vimeo-square',
    array(
    	'label'		=> __('Vimeo URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'envelope-o',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'envelope-o',
    array(
    	'label'		=> __('Your E-Mail Info','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'tumblr',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'tumblr',
    array(
    	'label'		=> __('Tumblr URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'stumbleupon',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'stumbleupon',
    array(
    	'label'		=> __('StumbleUpon URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'reddit',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'reddit',
    array(
    	'label'		=> __('Reddit URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'vine',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vine',
    array(
    	'label'		=> __('Vine URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'soundcloud',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'soundcloud',
    array(
    	'label'		=> __('SoundCloud URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    $wp_customize-> add_setting(
    'yelp',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'yelp',
    array(
    	'label'		=> __('Yelp URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
    	)
    );
    
    class Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;background: black; color: white;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	class TextBox_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;background: white; color: black;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}

	$wp_customize-> add_section(
    'custom_set',
    array(
    	'title'			=> __('Custom Settings','klean'),
    	'description'	=> __('Add some custom CSS code to edit your theme.','klean'),
    	'priority'		=> 30,
    	)
    );
    
	$wp_customize->add_setting(
	'css',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'klean_sanitize_text'
		)
	);
 
	$wp_customize->add_control(
	    new Custom_CSS_Control(
	        $wp_customize,
	        'css',
	        array(
	            'label' => __('Custom CSS','klean'),
	            'section' => 'custom_set',
	            'settings' => 'css'
	        )
	    )
	);
	
	$wp_customize->add_setting(
	'klean-footer-text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'klean_sanitize_text'
		)
	);
 
	$wp_customize->add_control(
	    new TextBox_Control(
	        $wp_customize,
	        'klean-footer-text',
	        array(
	            'label' => __('Footer Text','klean'),
	            'section' => 'custom_set',
	            'settings' => 'klean-footer-text'
	        )
	    )
	);
	
	$wp_customize-> add_section(
    'klean_pro',
    array(
    	'title'			=> __('GO PRO !!!','klean'),
    	'description'	=> __('<i>Now you can upgrade to Klean Pro and unlock the full features of the theme. <br><br>The pro version is available at only $25.<br><br><b>To purchase the Pro version, go <a href="http://www.divjot.co/product/super-klean">here</a>.</b></i>','klean'),
    	'priority'		=> 999,
    	)
    );
    
    class MyCustom_Customize_Control extends WP_Customize_Control {    
	    public function render_content() {
	        ?>
	        <label>
						<input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
						<?php echo esc_html( $this->label ); ?>
						<?php if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo $this->description; ?></span>
						<?php endif; ?>
					</label>
					
					<script>
					jQuery(function($){
						/* $('#customize-control-pro_hide' ).show(); */
						/*
wp.customize( 'pro_hide', function( value ) {
							value.bind( function( to ) {
*/
								$( '#customize-control-pro_hide' ).hide();
								$( '#accordion-section-klean_pro #accordion-section-title' ).css({"color":"#fff"});
							/*
} );
						} );
*/						
					});
					</script>

					
	        <?php
	    }
	}
    
    $wp_customize->add_setting(
	'pro_hide',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'klean_sanitize_checkbox',
		)
	);
 
	$wp_customize-> add_control( new MyCustom_Customize_Control( $wp_customize,
    'pro_hide',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Hide this section forever.','klean'),
    	'section'	=> 'klean_pro',
    	'priority'	=> 1,
    	/* 'active_callback' => 'is_front_page', */
    	)
    ));
    
     function klean_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } 
	    else {
	        return '';
	    }
	 }
	 
	 function klean_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
	
	}
add_action( 'customize_register', 'klean_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function klean_customize_preview_js() {
	wp_enqueue_script( 'klean_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'klean_customize_preview_js' );
