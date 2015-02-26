<?php 







/* Button
============================================================ */

if(!function_exists('ruven_button'))
{
	function ruven_button($atts, $content = null, $sc_name = '')
	{
     extract( shortcode_atts( array(
		'color' => '#444',
		'hovercolor' => '#000',
		'type' => 'none',
        'size' => 'medium',
		'bgcolor' => 'white',
		'bordercolor' => 'white',
        'borderstyle' => 'less_round',
        'align' => 'center',
        'text' => 'Simple Button',
        'url' => '#',
		'target' => '',
		'css'=>'none000',
		'icon' => 'none000'
      ), $atts ) );
	
		if($css!="none000"){return '<a class="'.$css.'" href="'.$url.'" target="'.$target.'">'.$content.'</a>';}
		$bg="";
		if($icon!="none000"){$bg='background:url('.$icon.') 10px center no-repeat ;'; $type="icon";}
			
		$template=wp_remote_retrieve_body(wp_remote_get(PLUGIN_DIR_URL."shortcodes/button.htm"));	
			
			
		$template=str_replace("{uID}",rand(),$template);
		$template=str_replace("{TYPE}",$type,$template);
		$template=str_replace("{SIZE}",$size,$template);
		$template=str_replace("{BORDERSTYLE}",$borderstyle,$template);
		$template=str_replace("{ALIGN}",$align,$template);
		$template=str_replace("{BGCOLOR}",$bgcolor,$template);
		$template=str_replace("{BORDERCOLOR}",$bordercolor,$template);
		$template=str_replace("{TARGET}",$target,$template);
		$template=str_replace("{BG}",$bg,$template);
		$template=str_replace("{COLOR}",$color,$template);
		$template=str_replace("{HOVERCOLOR}",$hovercolor,$template);
		$template=str_replace("{CONTENT}",$content,$template);
		$template=str_replace("{URL}",$url,$template);
		
		
		
		return $template;
	}
	add_shortcode('button', 'ruven_button');
	
	
}




/* LINK
============================================================ */

if(!function_exists('ruven_link'))
{
  function ruven_link($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'text' => 'Simple link',
		'style' => 'none',
		'color' => '444',
		'hovercolor' => '000',
        'url' => '#',
		'align' => 'none000',
		'css' => 'none000',
		'icon' => 'none000'
      ), $atts ) );
	
	
	if($css!="none000"){return '<a class="'.$css.'" href="'.$url.'">'.$text.'</a>';}
	$bg='';
	if($icon && $icon!="none000"){$bg='background:url('.$icon.') left bottom no-repeat;'; $style="icon";}
	
	
	$template=wp_remote_retrieve_body(wp_remote_get(PLUGIN_DIR_URL."shortcodes/link.htm"));	
				
		$template=str_replace("{uID}",rand(),$template);
	//	$template=str_replace("{SIZE}",$size,$template);
		$template=str_replace("{BG}",$bg,$template);
		$template=str_replace("{ALIGN}",$align,$template);
		$template=str_replace("{COLOR}","#".$color,$template);
		$template=str_replace("{HOVERCOLOR}","#".$hovercolor,$template);
		$template=str_replace("{TEXT}",$content,$template);
		$template=str_replace("{URL}",$url,$template);
		$template=str_replace("{STYLE}",$style,$template);
	
		
		return $template;
  }
  
  add_shortcode('link', 'ruven_link');
}


/* INFOBOX
============================================================ */

if(!function_exists('ruven_infobox'))
{
  function ruven_infobox($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
        'text' => '',
		'size' => '',
        'type' => '',
		'style' => '',
        'border' => '',
		'color' => '#444',
		'bgcolor' => '#fef6d2',
		'width'=>'30%',
		'bordercolor' => '#FFD300',
		'icon' => 'none000'
		
      ), $atts ) );
	
	$bg=$bgcolor.";";
	if($icon!="none000"){$bg='background:url('.$icon.') 5px center no-repeat '.$bgcolor.';'; $type="icon";}
	else{$bg='background-color:'.$bgcolor.';';}
	//if($type!="none" and $type!="" and $type!="icon"){$stricon="wd_infobox_icon";}
	return '<span style=" width:'.$width.'; color:'.$color.'; font-size:'.$size.'px;  '.$bg.' border-color:'.$bordercolor.'" class="wd_infobox '.$stricon.' wd_infobox_'.$border.' wd_infobox_'.$style.' wd_infobox_'.$type.'" style="">'.$content.'</span>';
  }
  
  add_shortcode('infobox', 'ruven_infobox');
}


/* QUOTE
============================================================ */

if(!function_exists('ruven_quote'))
{
  function ruven_quote($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'color' => '#444',
		'bgcolor'=>'',
		'icon'=>'dark',
		'width'=>'30%',
		'size' => '',
        'align' => ''
      ), $atts ) );
 
	return '<span style="color:'.$color.'; background-color:'.$bgcolor.'; width:'.$width.'; font-size:'.$size.'px;" class="wd_quote wd_quote_'.$align.'  wd_quote_'.$icon.'">'.$content.'</span>';
  }
  
  add_shortcode('quote', 'ruven_quote');
}


/* Contact Form
============================================================ */
/*
if(!function_exists('ruven_contactform'))
{
  function ruven_contactform ($atts)
  {
     extract( shortcode_atts( array(
		'subject' => '',
        'email' => ''
      ), $atts ) );
 
	return 
	'<form action="">
	<div class="wd_contactform">
		<label for="wd-contactform-name">Name</label>
		<input type="text" id="wd-form-name" />
		<label for="wd-contactform-email">Email</label>
		<input type="text" id="wd-form-email" />
		<label for="wd-contactform-message">Message</label>
		<textarea type="text" id="wd-form-message"></textarea>
		<input type="button" value="Send" id="wd-form-submit" />
	</div>
	</form>';
  }
  
  add_shortcode('contactform', 'ruven_contactform');
}*/



/* TABS
============================================================ */

if(!function_exists('ruven_tabs'))
{
  function ruven_tabs($atts, $content, $sc_name = ''){
	 extract( shortcode_atts( array("width"=>"100"), $atts ) );
	 
	$js=wp_remote_retrieve_body(wp_remote_get(PLUGIN_DIR_URL."shortcodes/tabs.htm"));	
	return '<div id="tabs_'.rand().'" class="wd_tabs_block"  style="width:'.$width.'%";>'.do_shortcode($content).$js.'</div>';
  }
  add_shortcode('tabs', 'ruven_tabs');
}

$tabID=0;
if(!function_exists('ruven_tab'))
{
	function ruven_tab($atts, $content, $sc_name = ''){
		 extract( shortcode_atts( array("size"=>""), $atts ) );
		$tabID++;
		return '<li id="wd_tabs_br" class="tab"><a href="#wd_tabs_content_*" style="font-size:'.$size.'px">'.$content.'</a></li>';
	}
	add_shortcode('tab', 'ruven_tab');
}

if(!function_exists('ruven_content'))
{
	function ruven_content($atts, $content, $sc_name = ''){
		extract( shortcode_atts( array("size"=>""), $atts ) );
		return '<li id="wd_tabs_content_br" class="content" style="font-size:'.$size.'px">'.$content.'</li>';
	}
	add_shortcode('content', 'ruven_content');
}



/* RELATED POSTS
============================================================ */

if(!function_exists('ruven_related')){
	
  function ruven_related( $atts, $content, $sc_name = '' ) {
	
	extract(shortcode_atts(array(
	    'limit' => '5',
		'size' => '12',
		'thumbwidth'=>'60',
		'thumbwidth'=>'',
		'color' => '#666',
		'position' => 'none',
		'hovercolor' => '#fff'
		
	), $atts));
 
	global $wpdb, $post, $table_prefix;
 	$postID=0;
	if ($post->ID) {

 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);
 
		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";
		$block='<ul class="wd_related_posts '.$position.'">{LIST}</ul>';
		$related = $wpdb->get_results($q);
 		if ( $related ) {
			$js=wp_remote_retrieve_body(wp_remote_get(PLUGIN_DIR_URL."shortcodes/relatedpost.htm"));
			foreach($related as $b=>$r) {
			$sjs=$js;
				$sjs=str_replace("{postID}",$postID,$sjs);
				$sjs=str_replace("{COLOR}",$color,$sjs);
				$sjs=str_replace("{HOVERCOLOR}",$hovercolor,$sjs);

			
			 $related_thumbnail = get_post_meta($r->ID, "thumbnail_url", $single = true);  
			 if($related_thumbnail){$thumbnail=$related_thumbnail;}else{$thumbnail="chka";}
				$post_id=$r->ID;
				$retval .= '<li id="relatedpost_'.$postID.'"><a onmouseover="hover'.$postID.'();" onmouseout="out'.$postID.'();" style=" color:'.$color.'; font-size:'.$size.'px" title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'
				.get_the_post_thumbnail( $post_id, array($thumbwidth,$thumbheight)).'<span>'.wptexturize($r->post_title)."</span>".
				'</a>'.$sjs.'</li>';
				$postID++;
			}
		}
		
		$output=str_replace('{LIST}',$retval,$block);
		return $output;
	}
	return;
}

	add_shortcode('relatedpost', 'ruven_related');
}

/* COLUMNS
============================================================ */


if(!function_exists('ruven_twocol_one'))
{
  function ruven_twocol_one($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout twocol_one '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('twocol_one', 'ruven_twocol_one');
}

// ============================================================ 

if(!function_exists('ruven_threecol_one'))
{
  function ruven_threecol_one($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout threecol_one '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('threecol_one', 'ruven_threecol_one');
}

// ============================================================ 

if(!function_exists('ruven_threecol_two'))
{
  function ruven_threecol_two($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout threecol_two '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('threecol_two', 'ruven_threecol_two');
}


// ============================================================ 

if(!function_exists('ruven_fourcol_one'))
{
  function ruven_fourcol_one($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fourcol_one '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fourcol_one', 'ruven_fourcol_one');
}


// ============================================================ 

if(!function_exists('ruven_fourcol_two'))
{
  function ruven_fourcol_two($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fourcol_two '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fourcol_two', 'ruven_fourcol_two');
}


// ============================================================ 

if(!function_exists('ruven_fourcol_three'))
{
  function ruven_fourcol_three($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fourcol_three '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fourcol_three', 'ruven_fourcol_three');
}



// ============================================================ 

if(!function_exists('ruven_fivecol_one'))
{
  function ruven_fivecol_one($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fivecol_one '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fivecol_one', 'ruven_fivecol_one');
}


// ============================================================ 

if(!function_exists('ruven_fivecol_two'))
{
  function ruven_fivecol_two($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fivecol_two '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fivecol_two', 'ruven_fivecol_two');
}



// ============================================================ 

if(!function_exists('ruven_fivecol_three'))
{
  function ruven_fivecol_three($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fivecol_three '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fivecol_three', 'ruven_fivecol_three');
}



// ============================================================ 

if(!function_exists('ruven_fivecol_four'))
{
  function ruven_fivecol_four($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout fivecol_four '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('fivecol_four', 'ruven_fivecol_four');
}


// ============================================================ 

if(!function_exists('ruven_sixcol_one'))
{
  function ruven_sixcol_one($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout sixcol_one '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('sixcol_one', 'ruven_sixcol_one');
}



// ============================================================ 

if(!function_exists('ruven_sixcol_two'))
{
  function ruven_sixcol_two($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout sixcol_two '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('sixcol_two', 'ruven_sixcol_two');
}



// ============================================================ 

if(!function_exists('ruven_sixcol_three'))
{
  function ruven_sixcol_three($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout sixcol_three '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('sixcol_three', 'ruven_sixcol_three');
}


// ============================================================ 

if(!function_exists('ruven_sixcol_four'))
{
  function ruven_sixcol_four($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout sixcol_four '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('sixcol_four', 'ruven_sixcol_four');
}



// ============================================================ 

if(!function_exists('ruven_sixcol_five'))
{
  function ruven_sixcol_five($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(
		'first' => ''
      ), $atts ) );
	return '<p class="wd_column_layout sixcol_five '.$first.'">'.$content.'</p>';
  }
  
  add_shortcode('sixcol_five', 'ruven_sixcol_five');
}



/* DIVIDERS
============================================================ */

/* HR
============================================================ */
if(!function_exists('ruven_hr'))
{
  function ruven_hr($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(), $atts ) );
 
	return '<hr class="wd_hr"/>';
  }
  
  add_shortcode('hr', 'ruven_hr');
}

/* Divider
============================================================ */
if(!function_exists('ruven_divider'))
{
  function ruven_divider($atts, $content, $sc_name = '')
  {
     extract( shortcode_atts( array(), $atts ) );
 
	return '<div class="wd_divider"></div>';
  }
  
  add_shortcode('divider', 'ruven_divider');
}