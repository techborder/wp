<?php
class ButterBelly_Customizer {
    public static function ButterBelly_Register($wp_customize) {
        self::ButterBelly_Sections($wp_customize);
        self::ButterBelly_Controls($wp_customize);
    }
    public static function ButterBelly_Sections($wp_customize) {
        /**
         * General Section
         */
        $wp_customize->add_section('general_setting_section', array(
            'title' => __('General Settings', 'butterbelly'),
            'description' => __('Allows you to customize header logo, favicon, background etc settings for ButterBelly Theme.', 'butterbelly'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
            )
        );
        /**
         * Home Page Top Feature Area
         */
        $wp_customize->add_section('home_top_feature_area', array(
            'title' => __('Top Feature Area', 'butterbelly'),
            'description' => __('Allows you to setup Top feature area section for ButterBelly Theme.', 'butterbelly'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_page_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'butterbelly'),
            'description' => __('Allows you to setup home page feature area section for ButterBelly Theme.', 'butterbelly'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));        
        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_section1', array(
            'title' => __('First Feature Area', 'butterbelly'),
            'description' => __('Allows you to setup first feature area section for ButterBelly Theme.', 'butterbelly'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_section2', array(
            'title' => __('Second Feature Area', 'butterbelly'),
            'description' => __('Allows you to setup second feature area section for ButterBelly Theme.', 'butterbelly'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_section3', array(
            'title' => __('Third Feature Area', 'butterbelly'),
            'description' => __('Allows you to setup third feature area section for ButterBelly Theme.', 'butterbelly'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page Feature area setting
         */
        $wp_customize->add_section('home_page_blog_headings', array(
            'title' => __('Home Page Blog Headings', 'butterbelly'),
            'description' => __('Allows you to setup Blog heading Section for ButterBelly Theme.', 'butterbelly'),
            'panel' => '',
            'priority' => '13',
            'capability' => 'edit_theme_options'
             )
        );
        /**
         * Social Icon Section
         */
        $wp_customize->add_section('social_icon_section', array(
            'title' => __('Social Icons', 'butterbelly'),
            'description' => __('Allows you to setup social site link for ButterBelly Theme.', 'butterbelly'),
            'panel' => '',
            'priority' => '14',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Style Setting', 'butterbelly'),
            'description' => __('Allows you to setup Top Footer Section Text for ButterBelly Theme.', 'butterbelly'),
            'panel' => '',
            'priority' => '15',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Footer Section
         */
        $wp_customize->add_section('footer_settings', array(
            'title' => __('Footer Settings', 'butterbelly'),
            'description' => __('Allows you to change style using custom css for ButterBelly Theme.', 'butterbelly'),
            'panel' => '',
            'priority' => '16',
            'capability' => 'edit_theme_options'
                )
        ); 
    }
    public static function ButterBelly_Section_Content() {

        $section_content = array(
            'general_setting_section' => array(
                'butterbelly_logo',
                'butterbelly_favicon',
                'butterbelly_nav'
            ),
            'home_top_feature_area' => array(
                'butterbelly_slideimage1',
                'butterbelly_sliderheading1',
                'butterbelly_Sliderlink1',
                'butterbelly_sliderdes1',
                'butterbelly_slider_button1'
            ),
            'home_page_blog_headings' => array(
                 'inkthemes_blog_heading',
                 'inkthemes_blog_desc'
            ),
            'home_feature_area_section1' => array(
                'butterbelly_fimg1',
                'butterbelly_circle_img1',
                'butterbelly_headline1',
                'butterbelly_firstdesc',
                'butterbelly_feature_link1'
            ),
            'home_feature_area_section2' => array(
                'butterbelly_fimg2',
                'butterbelly_circle_img2',
                'butterbelly_headline2',
                'butterbelly_seconddesc',
                'butterbelly_feature_link2'
            ),
            'home_feature_area_section3' => array(
                'butterbelly_fimg3',
                'butterbelly_circle_img3',
                'butterbelly_headline3',
                'butterbelly_thirddesc',
                'butterbelly_feature_link3'
            ),           
             'style_section' => array(
                'butterbelly_customcss'
            ),
             'footer_settings' => array(
                'butterbelly_topright'
            )
        );
        return $section_content;
    }

    public static function ButterBelly_Settings() {

        $butterbelly_settings = array(
            'butterbelly_logo' => array(
                'id' => 'butterbelly_options[butterbelly_logo]',
                'label' => __('Custom Logo', 'butterbelly'),
                'description' => __('Choose your own logo. Optimal Size: 221px Wide by 84px Height.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'butterbelly_favicon' => array(
                'id' => 'butterbelly_options[butterbelly_favicon]',
                'label' => __('Custom Favicon', 'butterbelly'),
                'description' => __('Here you can upload a Favicon for your Website. Specified size is 16px x 16px.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),     
            'butterbelly_nav' => array(
                'id' => 'butterbelly_options[butterbelly_nav]',
                'label' => __('Mobile Navigation Menu', 'butterbelly'),
                'description' => __('Enter your mobile navigation menu text.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'Menu'
            ), 
            'butterbelly_slideimage1' => array(
                'id' => 'butterbelly_options[butterbelly_slideimage1]',
                'label' => __('Top Feature Image', 'butterbelly'),
                'description' => __('The optimal size of the image is 1600px wide x 825px height, but it can be varied as per your requirement.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/slider1.jpg'
            ),
            'butterbelly_sliderheading1' => array(
                'id' => 'butterbelly_options[butterbelly_sliderheading1]',
                'label' => __('Top Feature Heading', 'butterbelly'),
                'description' => __('Mention the heading for the Top Feature.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Showcase Your Multiple Images', 'butterbelly')
            ),
            'butterbelly_Sliderlink1' => array(
                'id' => 'butterbelly_options[butterbelly_Sliderlink1]',
                'label' => __('Link for Top Feature Image', 'butterbelly'),
                'description' => __('Mention the URL for first image.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'butterbelly_sliderdes1' => array(
                'id' => 'butterbelly_options[butterbelly_sliderdes1]',
                'label' => __('Top Feature Description', 'butterbelly'),
                'description' => __('Here mention a short description for the Top Feature heading.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('This is a fullwidth slider where you can showcase your multiple business images. The recommended size of the images is 1600 px x 825 px.', 'butterbelly')
            ),
            'butterbelly_slider_button1' => array(
                'id' => 'butterbelly_options[butterbelly_slider_button1]',
                'label' => __('Link Text for Top Feature', 'butterbelly'),
                'description' => __('Mention the link text for top Feature Image', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Read More', 'butterbelly')
            ),            
            // First Feature Box
            'butterbelly_fimg1' => array(
                'id' => 'butterbelly_options[butterbelly_fimg1]',
                'label' => __('First Feature Image', 'butterbelly'),
                'description' => __('Choose image for your first Feature area. Optimal size 354px x 172px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/img1.jpg'
            ),
            'butterbelly_circle_img1' => array(
                'id' => 'butterbelly_options[butterbelly_circle_img1]',
                'label' => __('First Feature Circle Image', 'butterbelly'),
                'description' => __('Choose image for your first Feature Circle area. Optimal size 143px x 143px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circle-img1.jpg'
            ),
            'butterbelly_headline1' => array(
                'id' => 'butterbelly_options[butterbelly_headline1]',
                'label' => __('First Feature Heading', 'butterbelly'),
                'description' => __('Mention the heading for First Feature Box that will showcase your business services.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Happy Customers', 'butterbelly')
            ),       
            'butterbelly_firstdesc' => array(
                'id' => 'butterbelly_options[butterbelly_firstdesc]',
                'label' => __('First Feature Description', 'butterbelly'),
                'description' => __('Write short description for your First Feature Box.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('You can use this feature section to showcase your happy customers those use your business services. It will help to build trust among the audience.', 'butterbelly')
            ),
            'butterbelly_feature_link1' => array(
                'id' => 'butterbelly_options[butterbelly_feature_link1]',
                'label' => __('First feature Link', 'butterbelly'),
                'description' => __('Enter your text for First feature Link.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Second Feature Box
            'butterbelly_fimg2' => array(
                'id' => 'butterbelly_options[butterbelly_fimg2]',
                'label' => __('Second Feature Image', 'butterbelly'),
                'description' => __('Choose image for your Second Feature area. Optimal size 354px x 172px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/img2.jpg'
            ),
            'butterbelly_circle_img2' => array(
                'id' => 'butterbelly_options[butterbelly_circle_img2]',
                'label' => __('Second Feature Circle Image', 'butterbelly'),
                'description' => __('Choose image for your Second Feature Circle area. Optimal size 143px x 143px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circle-img2.jpg'
            ),
            'butterbelly_headline2' => array(
                'id' => 'butterbelly_options[butterbelly_headline2]',
                'label' => __('Second Feature Heading', 'butterbelly'),
                'description' => __('Mention the heading for Second Feature Box that will showcase your business services.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Share Testimonials', 'butterbelly')
            ),       
            'butterbelly_seconddesc' => array(
                'id' => 'butterbelly_options[butterbelly_seconddesc]',
                'label' => __('Second Feature Description', 'butterbelly'),
                'description' => __('Write short description for your Second Feature Box.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('You can also share testimonials in feature section that will prove how much your services are reliable that will make positive impact on visitors coming to your website.', 'butterbelly')
            ),
            'butterbelly_feature_link2' => array(
                'id' => 'butterbelly_options[butterbelly_feature_link2]',
                'label' => __('Second feature Link', 'butterbelly'),
                'description' => __('Enter your text for Second feature Link.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
             // Third Feature Box
            'butterbelly_fimg3' => array(
                'id' => 'butterbelly_options[butterbelly_fimg3]',
                'label' => __('Third Feature Image', 'butterbelly'),
                'description' => __('Choose image for your Third Feature area. Optimal size 354px x 172px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/img3.jpg'
            ),
            'butterbelly_circle_img3' => array(
                'id' => 'butterbelly_options[butterbelly_circle_img3]',
                'label' => __('Third Feature Circle Image', 'butterbelly'),
                'description' => __('Choose image for your Third Feature Circle area. Optimal size 143px x 143px', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circle-img1.jpg'
            ),
            'butterbelly_headline3' => array(
                'id' => 'butterbelly_options[butterbelly_headline3]',
                'label' => __('Third Feature Heading', 'butterbelly'),
                'description' => __('Mention the heading for Third Feature Box that will showcase your business services.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Introduce Team', 'butterbelly')
            ),       
            'butterbelly_thirddesc' => array(
                'id' => 'butterbelly_options[butterbelly_thirddesc]',
                'label' => __('Third Feature Description', 'butterbelly'),
                'description' => __('Write short description for your Third Feature Box.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Even you can introduce your team in the feature section. The people that stand your business. This will give a chance to visitors to know the kind of work your team does.', 'butterbelly')
            ),
            'butterbelly_feature_link3' => array(
                'id' => 'butterbelly_options[butterbelly_feature_link3]',
                'label' => __('Third feature Link', 'butterbelly'),
                'description' => __('Enter your text for Third feature Link.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
             'inkthemes_blog_heading' => array(
                'id' => 'butterbelly_options[inkthemes_blog_heading]',
                'label' => __('Home Page Main Heading', 'butterbelly'),
                'description' => __('Mention the punch line for your business here.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Show your latest posts here.', 'butterbelly')
            ),
            'inkthemes_blog_desc' => array(
                'id' => 'butterbelly_options[inkthemes_blog_desc]',
                'label' => __('Home Page Main Heading', 'butterbelly'),
                'description' => __('Mention the punch line for your business here.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('By default no posts will appear. You need to create one.', 'butterbelly')
            ),
            'butterbelly_customcss' => array(
                'id' => 'butterbelly_options[butterbelly_customcss]',
                'label' => __('Custom CSS', 'butterbelly'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),            
            'butterbelly_topright' => array(
                'id' => 'butterbelly_options[butterbelly_topright]',
                'label' => __('Footer Contact Details', 'butterbelly'),
                'description' => __('Mention the contact details here which will be displayed on the top right corner of Footer Section.', 'butterbelly'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'For Reservation Call : 1.888.222.5847'
            ),   
        );
        return $butterbelly_settings;
    }
    public static function ButterBelly_Controls($wp_customize) {
        $sections = self::ButterBelly_Section_Content();
        $settings = self::ButterBelly_Settings();
        foreach ($sections as $section_id => $section_content) {
            foreach ($section_content as $section_content_id) {
                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'butterbelly_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;
                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'butterbelly_sanitize_text');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    case 'textarea':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'butterbelly_sanitize_textarea');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'butterbelly_sanitize_url');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));

                        break;
                    default:
                        break;
                }
            }
        }
    }
    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('ButterBelly_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }
    /**
     * adds sanitization callback funtion : textarea
     * @package ButterBelly
     */
    public static function butterbelly_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : url
     * @package ButterBelly
     */
    public static function butterbelly_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : text
     * @package ButterBelly
     */
    public static function butterbelly_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package ButterBelly
     */
    public static function butterbelly_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package ButterBelly
     */
    public static function butterbelly_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

}
// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('ButterBelly_Customizer', 'ButterBelly_Register'));
function inkthemes_registers() {
          wp_register_script( 'inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true  );
	wp_register_script( 'inkthemes_customizer_script', get_template_directory_uri() . '/js/inkthemes_customizer.js', array("jquery","inkthemes_jquery_ui"), true  );
	wp_enqueue_script( 'inkthemes_customizer_script' );
	wp_localize_script( 'inkthemes_customizer_script', 'ink_advert', array(
            'pro' => __('View PRO version','butterbelly'),
            'url' => esc_url('http://www.inkthemes.com/wp-themes/corporate-wordpress-theme/'),
			'support_text' => __('Need Help!','butterbelly'),
			'support_url' => esc_url('http://www.inkthemes.com/lets-connect/')
            )
            );
}
add_action( 'customize_controls_enqueue_scripts', 'inkthemes_registers' );
