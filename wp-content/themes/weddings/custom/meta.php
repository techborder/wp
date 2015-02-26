	<script>
	jQuery(document).ready(function(){
		var value = jQuery("input:radio[name='_weddings_meta[layout]']:checked").val();
   		if (value < 4) 
   		{
   			jQuery(".class_for_js").hide();
   		}
   		else
   		{
   			jQuery(".class_for_js").show();
   		}
		jQuery("input:radio[name='_weddings_meta[layout]']").click(function() {
   		var value = jQuery(this).val();
   		if (value < 4) 
   		{
   			jQuery(".class_for_js").hide();
   		}
   		else
   		{
   			jQuery(".class_for_js").show();
   		}
		});
	});
	</script>
	<div class="t_about t_product t_service t_news t_sitemap t_blog t_full t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default">
		<table width="100%" style="margin:40px;">
 		<tr>
 		<td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 0;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="1" <?php checked($meta['layout'], "1"); ?>/>
            <br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -48px;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="2" <?php checked($meta['layout']=="2" || $meta['layout']==""); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -98px;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="3" <?php checked($meta['layout'], "3"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -145px;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="4" <?php checked($meta['layout'], "4"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:46px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -196px;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="5" <?php checked($meta['layout'], "5"); ?>/><br>
        </td>
        <td>
            <div style="width:50px; height:47px; background:url(<?php echo get_template_directory_uri('template_url'); ?>/images/sprite-layouts.png) no-repeat 0 -245px;">
		</div>
            <input type="radio" name="_weddings_meta[layout]" value="6" <?php checked($meta['layout'], "6"); ?>/><br>
                
		</td>
		</tr>
		</table>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page">
			<input type="text" name="_weddings_meta[content_width]" value="<?php if(!empty($meta['content_width'])) echo $meta['content_width']; else echo "1024"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Px &nbsp;&nbsp;&nbsp;:Content Area Width</label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio post_edit_page">
			<input type="text" name="_weddings_meta[main_col_width]" value="<?php if(!empty($meta['main_col_width'])) echo $meta['main_col_width']; else echo "66"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;:Main Column Width</label>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio class_for_js post_edit_page">
			<input type="text" name="_weddings_meta[pr_widget_area_width]" value="<?php if(!empty($meta['pr_widget_area_width'])) echo $meta['pr_widget_area_width']; else echo "17"; ?>" size="2" />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">% &nbsp;&nbsp;&nbsp;&nbsp;:Primary Widget Area Width</label>
		</div>
	</div>
		<div style="margin: 13px 0 11px 4px;" class="t_about t_product t_news t_sitemap t_blog t_gallery t_search t_login t_contact t_portfolio post_edit_page t_default t_service">
			<label>
			<input type="checkbox" name="_weddings_meta[fullwidthpage]" <?php checked($meta['fullwidthpage'], "on"); ?> />
			Full Width Page</label><br/>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="post_edit_page">			
			<textarea rows="4" cols="50" name="_weddings_meta[single_post_text]" size="10"><?php if(isset($meta['single_post_text'])) echo $meta['single_post_text']; ?></textarea><label>&nbsp;&nbsp;&nbsp;&nbsp; Single Post Featured Text</label>
			<br/>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_contact">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Email To:</label>
			<input type="text" name="_weddings_meta[email_to]" value="<?php if(!empty($meta['email_to'])) echo $meta['email_to']; else echo "info@info.com"; ?>"/><br>
		
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Tel:</label>
			<input type="text" name="_weddings_meta[telephone]" value="<?php if(!empty($meta['telephone'])) echo $meta['telephone']; else echo "0054 542 258 963" ?>"/><br>
		
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">About us:</label>
			<input type="text" name="_weddings_meta[about_us]" value="<?php if(!empty($meta['about_us'])) echo $meta['about_us']; else echo "Here are many variations of passages of Ipsum available.Pellentesque habitant morbi tristique senectus et netus." ?>"/><br>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_blog">
			<label>
			<input type="checkbox" name="_weddings_meta[blogstyle]" <?php checked($meta['blogstyle'], "on"); ?> />
			Blog Style mode</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_news t_blog t_service">
			<label>
			<input type="checkbox" name="_weddings_meta[showthumb]" <?php checked($meta['showthumb'], "on"); ?> />
			Hide Auto Thumbnail</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<label>
			<input type="checkbox" name="_weddings_meta[showtitle]" <?php checked($meta['showtitle'], "on"); ?> />
			Show Titles</label><br/>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<label>
			<input type="checkbox" name="_weddings_meta[showdesc]" <?php checked($meta['showdesc'], "on"); ?> />
			Show Descriptions</label><br/>
		</div>
		
		
		<div style="margin: 13px 0 11px 4px;" class="t_portfolio">
			<p style=" padding-bottom: 7px;">Thumbnail Size:</p>
			<label title="Small"><input type="radio" name="_weddings_meta[thumbsize]" value="1" <?php checked($meta['thumbsize'], "1"); ?>/><span>Small</span></label><br><br>
			<label title="Medium"><input type="radio" name="_weddings_meta[thumbsize]" value="2" <?php checked($meta['thumbsize']=="2" || $meta['thumbsize']==""); ?>/><span>Medium</span></label><br><br>
			<label title="Large"><input type="radio" name="_weddings_meta[thumbsize]" value="3" <?php checked($meta['thumbsize'], "3"); ?>/><span>Large</span></label>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_news t_blog t_service">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Number of posts per page:</label>
			<input type="text" name="_weddings_meta[blog_perpage]" value="<?php if(!empty($meta['blog_perpage']) || $meta['blog_perpage']=="0") echo $meta['blog_perpage']; else echo "9"; ?>" size="2" />
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_gallery t_portfolio">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Number of posts per page:</label>
			<input type="text" name="_weddings_meta[gallery_perpage]" value="<?php if(!empty($meta['gallery_perpage']) || $meta['blog_perpage']=="0") echo $meta['gallery_perpage']; else echo "9"; ?>" size="2" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_about">
			<label>Title:</label>
			<input type="text" size="15" name="_weddings_meta[cat_name_about]" value="<?php if(!empty($meta['cat_name_about'])) echo $meta['cat_name_about']; else echo ""; ?>"/>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_news t_blog t_portfolio t_gallery t_service">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Select blog categories:</label><br><br>
			<?php $cats = get_categories('hide_empty=0');
				$site_cats = array();
				foreach ($cats as $categs) {
					?>
					<label style="padding-bottom: 5px; display: block;">
					<?php 
					//echo "<script language=javascript>alert('"."categor-".$categs->cat_ID."');</script>"; 
					?>
					<input type="checkbox" name="_weddings_meta[categor-<?php echo $categs->cat_ID; ?>]" <?php checked(isset($meta["categor-".$categs->cat_ID]) && $meta["categor-".$categs->cat_ID]=="on"); ?> />
					<?php echo $categs->cat_name; ?>
					</label>							
			<?php } ?>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_product">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Select Post:</label><br><br>
			<?php 
			global $wpdb;
			$posts_array = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE post_type="post"');
			
			$count_posts = count($posts_array);
					?>
					<label style="padding-bottom: 5px; display: block;">
					<?php 
					//echo "<script language=javascript>alert('"."categor-".$categs->cat_ID."');</script>"; 
					?>
					<select name="_weddings_meta[select]">
						<?php for($i=0; $i<=$count_posts-1;$i++){ ?>
							  <option value="<?php echo $posts_array[$i]->ID ?>"  <?php if(isset($meta["select"])) selected( $meta["select"], $posts_array[$i]->ID ); ?>><?php echo $posts_array[$i]->post_title ?></option>
						<?php } ?>
					</select>
					
					
					</label>
		</div>
		
		<div style="margin: 13px 0 11px 4px;" class="t_about">
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Select first Post:</label><br><br>
			<?php 
			global $wpdb;
			$posts_array = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'posts WHERE post_type="post"');
			
			$count_posts = count($posts_array);
					?>
					<label style="padding-bottom: 5px; display: block;">
					<?php 
					//echo "<script language=javascript>alert('"."categor-".$categs->cat_ID."');</script>"; 
					?>
					<select name="_weddings_meta[select_1]">
						<?php
						for($i=0; $i<=$count_posts-1;$i++){ 
						?>
							  <option value="<?php echo $posts_array[$i]->ID ?>"  <?php if(isset($meta["select_1"])) selected( $meta["select_1"], $posts_array[$i]->ID ); ?>><?php echo $posts_array[$i]->post_title ?></option>
						<?php } ?>
					</select>
					
					
					</label>							
			
				<label style="font-family: Segoe UI;color: rgb(111, 111, 111); ">Select second Post:</label><br><br>
				<label style="padding-bottom: 5px; display: block;">
					<?php 
					//echo "<script language=javascript>alert('"."categor-".$categs->cat_ID."');</script>"; 
					?>
					<select name="_weddings_meta[select_2]">
						<?php
						for($i=0; $i<=$count_posts-1;$i++){ 
						?>
							  <option value="<?php echo $posts_array[$i]->ID ?>"  <?php if(isset($meta["select_2"])) selected( $meta["select_2"], $posts_array[$i]->ID ); ?>><?php echo $posts_array[$i]->post_title ?></option>
						<?php } ?>
					</select>
					
					
					</label>
			
		</div>
        



		<div style="margin: 13px 0 11px 4px; font-weight: bold;" class="t_sitemap">
			<br/><label>Page Content:</label><br/>
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="_weddings_meta[static_pages_on]" <?php checked($meta['static_pages_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 9px;">Static Pages:</label>
			<input type="text" name="_weddings_meta[static_pages_name]" value="<?php if(!empty($meta['static_pages_name'])) echo $meta['static_pages_name']; else echo "Static Pages:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="_weddings_meta[all_categories_on]" <?php checked($meta['all_categories_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111);">All Categories:</label>
			<input type="text" name="_weddings_meta[all_categories_name]" value="<?php if(!empty($meta['all_categories_name'])) echo $meta['all_categories_name']; else echo "All Categories:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="_weddings_meta[tags_on]" <?php checked($meta['tags_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 48px;">Tags:</label>
			<input type="text" name="_weddings_meta[tags_name]" value="<?php if(!empty($meta['tags_name'])) echo $meta['tags_name']; else echo "Tags:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="_weddings_meta[archives_on]" <?php checked($meta['archives_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 29px;">Archives:</label>
			<input type="text" name="_weddings_meta[archives_name]" value="<?php if(!empty($meta['archives_name'])) echo $meta['archives_name']; else echo "Archives:"; ?>" size="12" />
		</div>
		<div style="margin: 13px 0 11px 4px;" class="t_sitemap">
			<input style="margin-right: 10px;" type="checkbox" name="_weddings_meta[authors_on]" <?php checked($meta['authors_on'], "on"); ?> />
			<label style="font-family: Segoe UI;color: rgb(111, 111, 111); margin-right: 31px;">Authors:</label>
			<input type="text" name="_weddings_meta[authors_name]" value="<?php if(!empty($meta['authors_name'])) echo $meta['authors_name']; else echo "Authors:"; ?>" size="12" />
		</div>