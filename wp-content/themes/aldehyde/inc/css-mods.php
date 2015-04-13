<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function aldehyde_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	//TItle Tagline hidden.
	if ( get_theme_mod('aldehyde_hide_title_tagline') ) :
		echo "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	//If Title and Desc is set to Show Below the Logo
	if (  get_theme_mod('aldehyde_branding_below_logo') ) :
		
		echo "#masthead #text-title-desc { display: block; clear: both; } ";
		
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('aldehyde_center_logo') ) :
		
		echo "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		echo "#site-navigation { text-align: center; margin-top: 10px; } #site-navigation ul { float: none; } #site-navigation ul li { float: none; display: inline-block; } #site-navigation ul li ul li { text-align: left; }";
		
	endif;
	
	//Exception: When Logo is Centered, and Title Not Set to display in next line.
	if ( get_theme_mod('aldehyde_center_logo') && !get_theme_mod('aldehyde_branding_below_logo') ) :
		echo ".site-branding #text-title-desc { text-align: left; }";
	endif;
	
	//Exception: When Logo is centered, but there is no logo.
	if ( get_theme_mod('aldehyde_center_logo') && !get_theme_mod('aldehyde_logo') ) :
		echo ".site-branding #text-title-desc { text-align: center; }";
	endif;
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('aldehyde_center_logo') ) :
		echo "#masthead #site-logo img { transform-origin: left; }";
	endif;	
	
	
	//Modify Menu bars, if header image has been set
	if ( get_header_image() ) :
		// echo "#site-navigation { background: ".aldehyde_fade("#f4f4f4", 0.9)."; }";
	endif;
	
	if (get_theme_mod('aldehyde_himg_darkbg')) :
		echo "#masthead { background: rgba(0,0,0,0.5);}";
	endif;
	
	if ( get_theme_mod('aldehyde_title_font') ) :
		echo ".title-font, h1, h2, .section-title { font-family: ".get_theme_mod('aldehyde_title_font')."; }";
	endif;
	
	if ( get_theme_mod('aldehyde_body_font') ) :
		echo "body { font-family: ".get_theme_mod('aldehyde_body_font')."; }";
	endif;
	
	if ( get_theme_mod('aldehyde_site_titlecolor') ) :
		echo "#masthead h1.site-title a { color: ".get_theme_mod('aldehyde_site_titlecolor', '#FFFFFF')."; }";
	endif;
	
	
	if ( get_theme_mod('aldehyde_header_desccolor','#777') ) :
		echo "#masthead h2.site-description { color: ".get_theme_mod('aldehyde_header_desccolor','#6bd233')."; }";
	endif;
	
	if ( get_theme_mod('aldehyde_custom_css') ) :
		echo  get_theme_mod('aldehyde_custom_css');
	endif;
	
	
	if ( get_theme_mod('aldehyde_logo_resize') ) :
		$val = get_theme_mod('aldehyde_logo_resize')/100;
		echo "#masthead #site-logo img { transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;

	echo "</style>";
}

add_action('wp_head', 'aldehyde_custom_css_mods');