<?php
class blcr_Customizer {
    public static function blcr_Register($wp_customize) {
        self::blcr_Sections($wp_customize);
        self::blcr_Controls($wp_customize);
    }
    public static function blcr_Sections($wp_customize) {
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('general_setting_panel', array(
            'title' => __('General Setting', 'black-rider'),
            'description' => __('Allows you to setup home page feature area section for Black Rider Theme.', 'black-rider'),
            'priority' => '10',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Site Title Section
         */
        $wp_customize->add_section('title_tagline', array(
            'title' => __('Site Title', 'black-rider'),
            'priority' => '',
            'panel' => 'general_setting_panel'
        ));

        /**
         * Logo and favicon section
         */
        $wp_customize->add_section('general_setting_1', array(
            'title' => __('Logo & Favicon', 'black-rider'),
            'description' => __('Allows you to customize header logo, favicon settings for Black Rider Theme.', 'black-rider'), //Descriptive tooltip
            'panel' => 'general_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Right Contact Area section
         */
        $wp_customize->add_section('general_setting_2', array(
            'title' => __('Right Contact Area', 'black-rider'),
            'description' => __('Allows you to customize Contact area for Black Rider Theme.', 'black-rider'), //Descriptive tooltip
            'panel' => 'general_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Top Header Image Section
         */
        $wp_customize->add_section('header_image', array(
            'title' => __('Header Image', 'black-rider'),
            'priority' => '',
            'panel' => 'general_setting_panel'
        ));

        /**
         * Home page Top Heading Section
         */
        $wp_customize->add_section('home_top_section', array(
            'title' => __('Top Heading Section', 'black-rider'),
            'description' => __('Allows you to setup Top heading section for Black Rider Theme.', 'black-rider'), //Descriptive tooltip
            'panel' => 'general_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page Blog Section
         */
        $wp_customize->add_section('blog_section', array(
            'title' => __('Home Page Testimonial Section', 'black-rider'),
            'description' => __('Allows you to change settings for Home Page Testimonial section for Black Rider Theme.', 'black-rider'),
            'panel' => 'general_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Footer Section
         */
        $wp_customize->add_section('footer_section', array(
            'title' => __('Footer Section Setting', 'black-rider'),
            'description' => __('Allows you to setup footer section for Black Rider Theme.', 'black-rider'),
            'panel' => 'general_setting_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'black-rider'),
            'description' => __('Allows you to setup home page feature area section for Black Rider Theme.', 'black-rider'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_1', array(
            'title' => __('First Feature Area', 'black-rider'),
            'description' => __('Allows you to setup first feature area section for Black Rider Theme.', 'black-rider'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_2', array(
            'title' => __('Second Feature Area', 'black-rider'),
            'description' => __('Allows you to setup second feature area section for Black Rider Theme.', 'black-rider'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_3', array(
            'title' => __('Third Feature Area', 'black-rider'),
            'description' => __('Allows you to setup third feature area section for Black Rider Theme.', 'black-rider'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 4
         */
        $wp_customize->add_section('home_feature_area_4', array(
            'title' => __('Fourth Feature Area', 'black-rider'),
            'description' => __('Allows you to setup fourth feature area section for Black Rider Theme.', 'black-rider'),
            'panel' => 'home_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('style_setting', array(
            'title' => __('Style Setting', 'black-rider'),
            'description' => __('Allows you to setup Theme text and Background color for Black Rider Theme.', 'black-rider'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));

        /**
         * Background color Section
         */
        $wp_customize->add_section('colors', array(
            'title' => __('Background color Setting', 'black-rider'),
            'description' => __('Allows you to change Background color for Black Rider Theme. This only works when no any image set as background image.', 'black-rider'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Background Image Section
         */
        $wp_customize->add_section('background_image', array(
            'title' => __('Background Image setting', 'black-rider'),
            'description' => __('Allows you to change background image for Black Rider Theme. This will overright the background color property', 'black-rider'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Text color Section
         */
        $wp_customize->add_section('text_colors', array(
            'title' => __('Text color setting', 'black-rider'),
            'description' => __('Allows you to change text color for Black Rider Theme.', 'black-rider'),
            'priority' => '',
            'panel' => 'style_setting'
        ));

        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Custom Style Setting', 'black-rider'),
            'description' => __('Allows you to change style using custom css for Black Rider Theme.', 'black-rider'),
            'panel' => 'style_setting',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function blcr_Section_Content() {

        $section_content = array(
            'general_setting_1' => array(
                'inkthemes_logo',
                'inkthemes_favicon'
            ),
            'general_setting_2' => array(
                'inkthemes_nav',
                'inkthemes_topright',
                'inkthemes_contact_number'
            ),
            'home_top_section' => array(
                'inkthemes_page_main_heading',
                'inkthemes_page_sub_heading'
            ),
            'home_feature_area_1' => array(
                'inkthemes_fimg1',
                'inkthemes_firsthead',
                'inkthemes_firstdesc',
                'inkthemes_feature_link1'
            ),
            'home_feature_area_2' => array(
                'inkthemes_fimg2',
                'inkthemes_headline2',
                'inkthemes_seconddesc',
                'inkthemes_feature_link2'
            ),
            'home_feature_area_3' => array(
                'inkthemes_fimg3',
                'inkthemes_headline3',
                'inkthemes_thirddesc',
                'inkthemes_feature_link3'
            ),
            'home_feature_area_4' => array(
                'inkthemes_fimg4',
                'inkthemes_headline4',
                'inkthemes_fourthdesc',
                'inkthemes_feature_link4'
            ),
            'blog_section' => array(
                'inkthemes_blog_heading',
                'inkthemes_blog_count'
            ),
            'text_colors' => array(
                'inkthemes_text_color'
            ),
            'style_section' => array(
                'inkthemes_customcss'
            ),
            'footer_section' => array(
                'inkthemes_footertext'
            )
        );
        return $section_content;
    }

    public static function blcr_Settings() {

        $theme_settings = array(
            'inkthemes_logo' => array(
                'id' => 'inkthemes_options[inkthemes_logo]',
                'label' => __('Custom Logo', 'black-rider'),
                'description' => __('Upload a logo for your Website. The recommended size for the logo is 200px width x 50px height.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'inkthemes_favicon' => array(
                'id' => 'inkthemes_options[inkthemes_favicon]',
                'label' => __('Custom Favicon', 'black-rider'),
                'description' => __('Here you can upload a Favicon for your Website. Specified size is 16px x 16px.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'inkthemes_text_color' => array(
                'id' => 'inkthemes_options[inkthemes_text_color]',
                'label' => __('Custom Text Color', 'black-rider'),
                'description' => __('Choose your theme text color.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'color',
                'default' => '#000'
            ),
            'inkthemes_nav' => array(
                'id' => 'inkthemes_options[inkthemes_nav]',
                'label' => __('Mobile Navigation Menu', 'black-rider'),
                'description' => __('Enter your mobile navigation menu text', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_topright' => array(
                'id' => 'inkthemes_options[inkthemes_topright]',
                'label' => __('Top Right Contact Details', 'black-rider'),
                'description' => __('Mention the contact details here which will be displayed on the top right corner of Website.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_contact_number' => array(
                'id' => 'inkthemes_options[inkthemes_contact_number]',
                'label' => __('Contact Number For Tap To Call Feature', 'black-rider'),
                'description' => __('Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'number',
                'default' => ''
            ),
            'inkthemes_page_main_heading' => array(
                'id' => 'inkthemes_options[inkthemes_page_main_heading]',
                'label' => __('Home Page Top Heading', 'black-rider'),
                'description' => __('Mention the punch line for your business here.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_page_sub_heading' => array(
                'id' => 'inkthemes_options[inkthemes_page_sub_heading]',
                'label' => __('Home Page Sub Heading', 'black-rider'),
                'description' => __('Mention the tagline for your business here that will complement the punch line.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_fimg1' => array(
                'id' => 'inkthemes_options[inkthemes_fimg1]',
                'label' => __('First Feature Image', 'black-rider'),
                'description' => __('Choose image for first feature area. Optimal size 170px x 170px', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg1.jpg'
            ),
            'inkthemes_firsthead' => array(
                'id' => 'inkthemes_options[inkthemes_firsthead]',
                'label' => __('First Feature Heading', 'black-rider'),
                'description' => __('Enter text for first feature area heading.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_firstdesc' => array(
                'id' => 'inkthemes_options[inkthemes_firstdesc]',
                'label' => __('First Feature Description', 'black-rider'),
                'description' => __('Enter text for first feature area description.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_feature_link1' => array(
                'id' => 'inkthemes_options[inkthemes_feature_link1]',
                'label' => __('First feature Link', 'black-rider'),
                'description' => __('Enter link url for first feature area.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'inkthemes_fimg2' => array(
                'id' => 'inkthemes_options[inkthemes_fimg2]',
                'label' => __('Second Feature Image', 'black-rider'),
                'description' => __('Choose image for second feature area. Optimal size 170px x 170px', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg2.jpg'
            ),
            'inkthemes_headline2' => array(
                'id' => 'inkthemes_options[inkthemes_headline2]',
                'label' => __('Second Feature Heading', 'black-rider'),
                'description' => __('Enter text for second feature area heading.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_seconddesc' => array(
                'id' => 'inkthemes_options[inkthemes_seconddesc]',
                'label' => __('Second Feature Description', 'black-rider'),
                'description' => __('Enter text for second feature area description.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_feature_link2' => array(
                'id' => 'inkthemes_options[inkthemes_feature_link2]',
                'label' => __('Second Feature Link', 'black-rider'),
                'description' => __('Enter link url for second feature area.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'inkthemes_fimg3' => array(
                'id' => 'inkthemes_options[inkthemes_fimg3]',
                'label' => __('Third Feature Image', 'black-rider'),
                'description' => __('Choose image for thrid feature area. Optimal size 170px x 170px', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg3.jpg'
            ),
            'inkthemes_headline3' => array(
                'id' => 'inkthemes_options[inkthemes_headline3]',
                'label' => __('Third Feature Heading', 'black-rider'),
                'description' => __('Enter text for second feature area heading.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_thirddesc' => array(
                'id' => 'inkthemes_options[inkthemes_thirddesc]',
                'label' => __('Third Feature Description', 'black-rider'),
                'description' => __('Enter text for third feature area description.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_feature_link3' => array(
                'id' => 'inkthemes_options[inkthemes_feature_link3]',
                'label' => __('Third feature Link', 'black-rider'),
                'description' => __('Enter link url for third feature area.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'inkthemes_fimg4' => array(
                'id' => 'inkthemes_options[inkthemes_fimg4]',
                'label' => __('Fourth Feature Image', 'black-rider'),
                'description' => __('Choose image for fourth feature area. Optimal size 170px x 170px', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg4.jpg'
            ),
            'inkthemes_headline4' => array(
                'id' => 'inkthemes_options[inkthemes_headline4]',
                'label' => __('Fourth Feature Heading', 'black-rider'),
                'description' => __('Enter text for fourth feature area heading.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_fourthdesc' => array(
                'id' => 'inkthemes_options[inkthemes_fourthdesc]',
                'label' => __('Fourth Feature Description', 'black-rider'),
                'description' => __('Enter text for fourth feature area description.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('', 'black-rider')
            ),
            'inkthemes_feature_link4' => array(
                'id' => 'inkthemes_options[inkthemes_feature_link4]',
                'label' => __('Fourth feature Link', 'black-rider'),
                'description' => __('Enter link url for fourth feature area.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'inkthemes_blog_heading' => array(
                'id' => 'inkthemes_options[inkthemes_blog_heading]',
                'label' => __('Home Page Blog Heading', 'black-rider'),
                'description' => __('Enter your text for home Page blog heading section', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_blog_count' => array(
                'id' => 'inkthemes_options[inkthemes_blog_count]',
                'label' => __('Home Page Blog Count', 'black-rider'),
                'description' => __('Enter number of post show on home page.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'number',
                'default' => '3'
            ),
            'inkthemes_customcss' => array(
                'id' => 'inkthemes_options[inkthemes_customcss]',
                'label' => __('Custom CSS', 'black-rider'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'inkthemes_footertext' => array(
                'id' => 'inkthemes_options[inkthemes_footertext]',
                'label' => __('Footer Text', 'black-rider'),
                'description' => __('Write the text here that will be displayed on the footer i.e. at the bottom of the Website.', 'black-rider'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            )
        );
        return $theme_settings;
    }

    public static function blcr_Controls($wp_customize) {

        $sections = self::blcr_Section_Content();
        $settings = self::blcr_Settings();

        foreach ($sections as $section_id => $section_content) {

            foreach ($section_content as $section_content_id) {

                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_url');
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
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_text');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_textarea');

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

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_url');

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

                    case 'color':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_color');

                        $wp_customize->add_control(new WP_Customize_Color_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;

                    case 'number':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_number');

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

                    case 'select':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blcr_sanitize_number');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'select',
                            'choices' => $settings[$section_content_id]['choices']
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
            'sanitize_callback' => array('blcr_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }

    /**
     * adds sanitization callback funtion : textarea
     * @package blcr
     */
    public static function blcr_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : url
     * @package blcr
     */
    public static function blcr_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : text
     * @package blcr
     */
    public static function blcr_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package blcr
     */
    public static function blcr_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package blcr
     */
    public static function blcr_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package blcr
     */
    public static function blcr_sanitize_color($value) {
        $value = sanitize_hex_color($value);
        return $value;
    }

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('blcr_Customizer', 'blcr_Register'));

function blcr_registers() {
    wp_register_script('inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true);
    wp_register_script('inkthemes_customizer_script', get_template_directory_uri() . '/functions/js/inkthemes_customizer.js', array("jquery", "inkthemes_jquery_ui"), true);
    wp_enqueue_script('inkthemes_customizer_script');
    wp_localize_script('inkthemes_customizer_script', 'ink_advert', array(
        'pro' => __('View PRO version', 'black-rider'),
        'url' => esc_url('http://www.inkthemes.com/wp-themes/lead-generation-wordpress-theme/'),
		'support_text' => __('Need Help!','black-rider'),
			'support_url' => esc_url('http://www.inkthemes.com/lets-connect/')
    ));
}

add_action('customize_controls_enqueue_scripts', 'blcr_registers');
