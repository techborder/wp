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
	$wp_customize->get_control( 'header_textcolor' )->label		= __('Site Title Color', 'klean');
	$wp_customize->get_control( 'header_textcolor' )->priority	= 11;
	$wp_customize->remove_section( 'nav' );
	
	$wp_customize-> add_setting(
    'klean-desc-color',
    array(
	    'default'			=> '#ffffff',
    	'sanitize_callback'	=> 'sanitize_hex_color',
    	'transport'			=> 'postMessage',
    	)
    );
    
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'klean-desc-color',
	        array(
	            'label' => __('Site Description Color','klean'),
	            'section' => 'colors',
	            'settings' => 'klean-desc-color',
                'priority'  => 12
	        )
	    )
	);
	
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
    'klean_layout',
    array(
    	'title'			=> __('Layout Settings','klean'),
    	'description'	=> __('Manage the Layout Settings of your site.','klean'),
    	'priority'		=> 1,
    	)
    );
    
    $wp_customize-> add_setting(
    'klean-post-sidebar',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'klean_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'klean-post-sidebar',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Hide Sidebar on Posts/Pages','klean'),
    	'section'	=> 'klean_layout',
    	'priority'	=> 1,
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
    'klean-social-color',
    array(
    	'sanitize_callback'	=> 'sanitize_hex_color',
    	)
    );
    
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'klean-social-color',
	        array(
	            'label' => __('Background of the Social Icons','klean'),
	            'section' => 'klean_social',
	            'settings' => 'klean-social-color',
                'priority'  => 1
	        )
	    )
	);
	
	$wp_customize-> add_setting(
    'klean-social-icon-color',
    array(
    	'sanitize_callback'	=> 'sanitize_hex_color',
    	)
    );
    
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'klean-social-icon-color',
	        array(
	            'label' => __('Color of the Social Icons','klean'),
	            'section' => 'klean_social',
	            'settings' => 'klean-social-icon-color',
                'priority'   => 2
	        )
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
        'priority'   => 3
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
        'priority'   => 4
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
        'priority'   => 5
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
        'priority'   => 6
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
        'priority'   => 7
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
        'priority'   => 8
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
        'priority'   => 9
    	)
    );

    
    $wp_customize-> add_setting(
    'vimeo',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vimeo',
    array(
    	'label'		=> __('Vimeo URL','klean'),
    	'section'	=> 'klean_social',
    	'type'		=> 'text',
        'priority'   => 10
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
        'priority'   => 11
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
        'priority'   => 12
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
        'priority'   => 13
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
        'priority'   => 14
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
        'priority'   => 15
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
        'priority'   => 16
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
        'priority'   => 17
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
    	'title'			=> __('Upgrade to Pro !!!','klean'),
    	'description'	=> __('<i>If you liked the theme, you can upgrade to Super Klean and unlock the full features of the theme. <br><br>Super Klean offers a multitude of features such as - <ul><li><b>Featured Area</b></li><li><b>Slider and Video support for Header</b></li><li><b>Multiple Layouts</b></li><li><b>WooCommerce Support</b></li></ul> and much more. <br><br>Also, Lifetime free Customer Support is provided for all our premium themes.<br><br><b>You can check out the Premium Version <a href="http://www.divjot.co/product/super-klean">here</a>.</b></i>','klean'),
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

	if ( $wp_customize->is_preview() ) {
	    add_action( 'wp_footer', 'klean_customize_preview', 21);
	}
	
	function klean_customize_preview() {
    ?>
    <script type="text/javascript">
        ( function( jQuery ) {
            wp.customize('klean-desc-color',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-description').css('color', to );
                });
            });
             wp.customize('header_textcolor',function( value ) {
                value.bind(function(to) {
                    jQuery('.site-title a').css('color', to );
                });
            });
        } )( jQuery )
    </script>
    <?php
}  // End function klean_customize_preview()
	
	}
add_action( 'customize_register', 'klean_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function klean_customize_preview_js() {
	wp_enqueue_script( 'klean_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'klean_customize_preview_js' );

