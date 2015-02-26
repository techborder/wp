<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'ButterBelly Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = butterbelly_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        $lan_stylesheets = array("Default" => "Default", "rtl" => "rtl");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        $captcha_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array(
            array("name" => "General Settings",
                "type" => "heading"),
            array("name" => "Custom Logo",
                "desc" => "Upload a logo for your Website.",
                "id" => "butterbelly_logo",
                "type" => "upload"),
            array("name" => "Custom Favicon",
                "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
                "id" => "butterbelly_favicon",
                "type" => "upload"),
            array("name" => "Mobile Navigation Menu",
                "desc" => "Enter your mobile navigation menu text",
                "id" => "butterbelly_nav",
                "std" => "",
                "type" => "textarea"),
            //Home Page Slider Setting
            array("name" => "Top Feature Settings",
                "type" => "heading"),
            //Slider Speed Setting	
            array("name" => "Top Feature Image",
                "desc" => "The optimal size of the image is 1600px wide x 825px height, but it can be varied as per your requirement.",
                "id" => "butterbelly_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => "Top Feature Heading",
                "desc" => "Mention the heading for the Top Feature.",
                "id" => "butterbelly_sliderheading1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Link for Top Feature Image",
                "desc" => "Mention the URL for first image.",
                "id" => "butterbelly_Sliderlink1",
                "std" => "",
                "type" => "text"),
            array("name" => "Top Feature Description",
                "desc" => "Here mention a short description for the Top Feature heading.",
                "id" => "butterbelly_sliderdes1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Link Text for Top Feature",
                "desc" => "Mention the link text for first slider.",
                "id" => "butterbelly_slider_button1",
                "std" => "",
                "type" => "text"),
            //Homepage Feature Area
            array("name" => "Homepage Feature Area",
                "type" => "heading"),
            array("name" => "Home Page Blog Heading Text",
                "desc" => "Here you can mention a suitable blog text that will display the recent blog posts with images.",
                "id" => "inkthemes_blog_heading",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Home Page Blog Description Text",
                "desc" => "Here you can mention a suitable blog text that will display the recent blog posts with images.",
                "id" => "inkthemes_blog_desc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Image",
                "desc" => "Choose image for your first Feature area. Optimal size 354px x 172px",
                "id" => "butterbelly_fimg1",
                "std" => "",
                "type" => "upload"),
            array("name" => "First Feature Circle Image",
                "desc" => "Choose image for your first Feature Circle area. Optimal size 143px x 143px",
                "id" => "butterbelly_circle_img1",
                "std" => "",
                "type" => "upload"),
            array("name" => "First Feature Heading",
                "desc" => "Enter your text for first feature heading.",
                "id" => "butterbelly_headline1",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First Feature Description",
                "desc" => "Enter your text for first feature description.",
                "id" => "butterbelly_firstdesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "First feature Link",
                "desc" => "Enter your text for First feature Link.",
                "id" => "butterbelly_feature_link1",
                "std" => "",
                "type" => "text"),
            array("name" => "Second Feature Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            //Second Feature Separetor
            array("name" => "Second Feature Image",
                "desc" => "Choose image for your second Feature area. Optimal size 354px x 172px",
                "id" => "butterbelly_fimg2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Second Feature Circle Image",
                "desc" => "Choose image for your Second Feature Circle area. Optimal size 143px x 143px",
                "id" => "butterbelly_circle_img2",
                "std" => "",
                "type" => "upload"),
            array("name" => "Second Feature Heading",
                "desc" => "Enter your heading for second Feature area",
                "id" => "butterbelly_headline2",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second feature Description",
                "desc" => "Enter your text for second feature description.",
                "id" => "butterbelly_seconddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Second feature Link",
                "desc" => "Enter your text for Second feature Link.",
                "id" => "butterbelly_feature_link2",
                "std" => "",
                "type" => "text"),
            array("name" => "Third Feature Starts From Here.",
                "type" => "saperate",
                "class" => "saperator"),
            //Third Feature Separetor
            array("name" => "Third Feature Image",
                "desc" => "Choose image for your thirdthirdthird Feature. Optimal size 354px x 172px",
                "id" => "butterbelly_fimg3",
                "std" => "",
                "type" => "upload"),
            array("name" => "Third Feature Circle Image",
                "desc" => "Choose image for your Third Feature Circle area. Optimal size 143px x 143px",
                "id" => "butterbelly_circle_img3",
                "std" => "",
                "type" => "upload"),
            array("name" => "Third Feature Heading",
                "desc" => "Enter your heading for third Feature area",
                "id" => "butterbelly_headline3",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third Feature Description",
                "desc" => "Enter your text for Third Feature description.",
                "id" => "butterbelly_thirddesc",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Third feature Link",
                "desc" => "Enter your text for Third feature Link.",
                "id" => "butterbelly_feature_link3",
                "std" => "",
                "type" => "text"),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//	
            array("name" => "Styling Options",
                "type" => "heading"),
            array("name" => "Custom CSS",
                "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
                "id" => "butterbelly_customcss",
                "std" => "",
                "type" => "textarea"),
            array("name" => "Footer Settings",
                "type" => "heading"),
            array("name" => "Footer Contact Details",
                "desc" => "Mention the contact details here which will be displayed on the top right corner of Footer Section.",
                "id" => "butterbelly_topright",
                "std" => "",
                "type" => "textarea")
        );

        butterbelly_update_option('of_template', $options);
        butterbelly_update_option('of_themename', $themename);
        butterbelly_update_option('of_shortname', $shortname);
    }

}
?>
