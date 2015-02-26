<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new ruven_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="javascript" type="text/javascript" src="<?php echo PLUGIN_DIR_URL;?>tinymce/js/jscolor/jscolor.js"></script>
<script type="text/javascript">

jscolor.install();


jQuery(document).ready(function(){


jQuery('body').on('keydown', 'textarea', function(e) {
    if ((e.which == 13) && !event.shiftKey) {
		jQuery(this).val(jQuery(this).val()+"<br />");
    }
});


	jscolor.install();
	jscolor.bind();
	

/*###########BUTTON############*/

	jQuery("#preview-button a").click(function(){return false;});
	
	var buttonnormalcolor="#444";
	var buttonhovercolor="#000";
	jQuery("#preview-button a").hover(function(){
		jQuery(this).addClass("hover");
		jQuery("#preview-button a span").css({'color':buttonhovercolor});
	},
	function(){
		jQuery(this).removeClass("hover");
		jQuery("#preview-button a span").css({'color':buttonnormalcolor});
	});
	
		
	jQuery("body").on('change','#web-business-popup-settings .important',function(){
		if(jQuery(this)!=""){
			jQuery(this).addClass('valid');
		}else {
			jQuery(this).removeClass('valid');
		}
	});
	
	jQuery("#button-url").change(function(){
		jQuery("#preview-button a").attr("href",jQuery(this).val());
	});
	
	jQuery("#button-text").change(function(){
		jQuery("#preview-button a span").html(jQuery(this).val());
	});
	
	jQuery("#button-type").change(function(){
			jQuery("#preview-button").removeClass("friendly_button_download friendly_button_note friendly_button_tick friendly_button_info friendly_button_alert").css({'background-image':'none'});
			jQuery("#preview-button").addClass("friendly_button_"+jQuery(this).val());
	});
		
	jQuery("#button-icon").change(function(){
		if(jQuery(this).val()!=""){
			jQuery("#preview-button").removeClass("friendly_button_icon friendly_button_download friendly_button_note friendly_button_tick friendly_button_info friendly_button_alert");
			jQuery("#preview-button").addClass("friendly_button_icon");
			jQuery("#preview-button.friendly_button_icon a span").css({'background':'url('+jQuery(this).val()+') 10px center no-repeat'});
		}else{
			jQuery("#preview-button.friendly_button_icon a span").css({"background":''});
			jQuery("#preview-button").removeClass("friendly_button_icon").addClass("friendly_button_"+jQuery("#button-type").val());
		}
	});
	
	jQuery("#button-size").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}

		jQuery("#preview-button a span").css({'font-size':jQuery(this).val()+"px"});
		jQuery("#preview-button a span").css({'height':jQuery(this).val()+"px"});
	});
	
		
	jQuery("#button-border-style").change(function(){
		jQuery("#preview-button").removeClass("friendly_button_less_round friendly_button_round friendly_button_square");
		jQuery("#preview-button").addClass("friendly_button_"+jQuery(this).val());
	});

	
	jQuery("#button-color").change(function(){
		buttonnormalcolor='#'+jQuery(this).val();
		jQuery("#preview-button a span").css({"color":buttonnormalcolor});
	});
	
		
	jQuery("#button-hovercolor").change(function(){
		buttonhovercolor='#'+jQuery(this).val();
	});
	
		
	jQuery("#button-bgcolor").change(function(){
		jQuery("#preview-button a").css({'background-color':'#'+jQuery(this).val()});
	});
	
	jQuery("#button-border-color").change(function(){
		jQuery("#preview-button a").css({border:"1px solid #"+jQuery(this).val()});
	});
	
	jQuery("#button-align").change(function(){
		jQuery("#preview-button").removeClass("friendly_button_left friendly_button_right");
		jQuery("#preview-button").addClass("friendly_button_"+jQuery(this).val());
	});
	
	
	var classes= jQuery("#preview-button").attr("class");
	jQuery("#button-css").change(function(){	
		if(jQuery(this).val()!=""){
			jQuery('.preview-button-class-message').remove();
			jQuery("#preview-button").removeClass();
			jQuery("#preview-button").addClass(jQuery(this).val());
			jQuery("#preview-button").after("<p class='preview-button-class-message'>&laquo;"+jQuery(this).val()+"&raquo; button style doesn't displays there but in your theme</p>")
		}else{
			jQuery('.preview-button-class-message').remove();
			jQuery("#preview-button").addClass(classes);
		}
	});
	
/*###########LINK############*/



	jQuery("#link-text").change(function(){
		jQuery("#preview-link").html(jQuery(this).val());
	});
	
	jQuery("#link-url").change(function(){
		jQuery("#preview-link a").attr("href",jQuery(this).val());
	});
		
	jQuery("#link-color").change(function(){
		linknormalcolor='#'+jQuery(this).val();
	});
	jQuery("#link-hovercolor").change(function(){
		linkhovercolor='#'+jQuery(this).val();
	});
	
	
	var linknormalcolor="#444";
	var linkhovercolor="#fff";
	jQuery("#preview-link").hover(function(){
		jQuery(this).addClass("hover");
		jQuery("#preview-link.hover").css({'color':linkhovercolor});
	},
	function(){
		jQuery(this).removeClass("hover");
		jQuery("#preview-link").css({'color':linknormalcolor});
	});
	
	jQuery("#link-color").change(function(){
		linknormalcolor='#'+jQuery(this).val();
		jQuery("#preview-link").css({'color':linknormalcolor});
	});

	jQuery("#button-hovercolor").change(function(){
		buttonhovercolor='#'+jQuery(this).val();
	});
	
	
	jQuery("#link-style").change(function(){
		jQuery("#preview-link").removeClass("wd_link_icon wd_link_download wd_link_note wd_link_tick wd_link_info wd_link_alert");
		jQuery("#preview-link").addClass("wd_link_"+jQuery(this).val());
	});
	
	jQuery("#link-icon").change(function(){
		if(jQuery(this).val()!=""){
			jQuery("#preview-link").removeClass("wd_link_icon wd_link_download wd_link_note wd_link_tick wd_link_info wd_link_alert");
			jQuery("#preview-link").addClass("wd_link_icon");
			jQuery("#preview-link").css({'background':'url('+jQuery(this).val()+') left center no-repeat'});
		}else{jQuery("#preview-link").removeClass("wd_link_icon").css({'background-image':'none'});}
	});
	
	jQuery("#link-align").change(function(){
		jQuery("#preview-link").removeClass("wd_link_left wd_link_right wd_link_none000");
		jQuery("#preview-link").addClass("wd_link_"+jQuery(this).val());
	});
	
	var classes= jQuery("#preview-link").attr("class");
	jQuery("#link-css").change(function(){	
		if(jQuery(this).val()!=""){
			jQuery('.preview-link-class-message').remove();
			jQuery("#preview-link").removeClass();
			jQuery("#preview-link").addClass(jQuery(this).val());
			jQuery("#preview-link").after("<p class='preview-link-class-message'>&laquo;"+jQuery(this).val()+"&raquo; link style doesn't displays there but in your theme</p>");
		}else{
			jQuery('.preview-link-class-message').remove();
			jQuery("#preview-link").addClass(classes);
		}
	});

	
	
/*###########INFOBOX############*/

	jQuery("#infobox-content").change(function(){
		jQuery("#preview-infobox").html(jQuery(this).val());
	});
	
	jQuery("#infobox-width").change(function(){

		if(parseInt(jQuery(this).val())<0){jQuery(this).val("0%");}
		if(parseInt(jQuery(this).val())>100){jQuery(this).val("100%");}

		jQuery("#preview-infobox").css({'width':parseInt(jQuery(this).val())+"%"});
		jQuery("#web-business-popup-preview .preview-link-class-message").remove();
		jQuery("#preview-infobox").after("<p class='preview-link-class-message'>The width displayed there may not coincide the real sizes. It depends on your content width size.</p>");
	});
	
	jQuery("#infobox-icon").change(function(){
		if(jQuery(this).val()!=""){
			jQuery("#preview-infobox").removeClass("wd_infobox_icon wd_infobox_less_round wd_infobox_round wd_infobox_square");
			jQuery("#preview-infobox").addClass("wd_infobox_icon");
			jQuery("#preview-infobox.wd_infobox_icon").css({'background-image':'url('+jQuery(this).val()+')'});
			jQuery("#preview-infobox").css({'width':(parseInt(jQuery(this).val())-10)+"%"});
		}else{
			jQuery("#preview-infobox.wd_infobox_icon").css({'background-image':""});
			jQuery("#preview-infobox").removeClass("wd_infobox_icon");
		}
	});
	
	jQuery("#infobox-type").change(function(){
		if(jQuery("#infobox-icon").val()!=""){return false;}
		jQuery("#preview-infobox").removeClass("wd_infobox_icon wd_infobox_note wd_infobox_tick wd_infobox_info wd_infobox_alert");
		if(jQuery(this).val()=="none"){jQuery("#preview-infobox").removeClass("wd_infobox_icon wd_infobox_note wd_infobox_tick wd_infobox_info wd_infobox_alert");}
		else{
			jQuery("#preview-infobox").addClass("wd_infobox_"+jQuery(this).val());
			jQuery("#preview-infobox").css({'width':(parseInt(jQuery(this).val())-10)+"%"});
		}
		
	});
	
	jQuery("#infobox-size").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}
		jQuery("#preview-infobox").css({'font-size':jQuery(this).val()+"px"});
	});
	
	jQuery("#infobox-color").change(function(){
		jQuery("#preview-infobox").css({'color':"#"+jQuery(this).val()});
	});
	
	jQuery("#infobox-bgcolor").change(function(){
		jQuery("#preview-infobox").css({'background-color':"#"+jQuery(this).val()});
	});
	
	jQuery("#infobox-bordercolor").change(function(){
		jQuery("#preview-infobox").css({'border-color':"#"+jQuery(this).val()});
	});
	
	jQuery("#infobox-style").change(function(){
		jQuery("#preview-infobox").removeClass("wd_infobox_icon wd_infobox_less_round wd_infobox_round wd_infobox_square");
		jQuery("#preview-infobox").addClass("wd_infobox_"+jQuery(this).val());
	});
	
	
	jQuery("#infobox-border").change(function(){
		jQuery("#preview-infobox").removeClass("wd_infobox_topright wd_infobox_full");
		jQuery("#preview-infobox").addClass("wd_infobox_"+jQuery(this).val());
	});
	
/*###########QUOTE############*/

	jQuery("#quote-content").change(function(){
		jQuery("#preview-quote").html(jQuery(this).val());
	});
	
	jQuery("#quote-width").change(function(){


		if(parseInt(jQuery(this).val())<0){jQuery(this).val("0%");}
		if(parseInt(jQuery(this).val())>100){jQuery(this).val("100%");}
		jQuery("#preview-quote").css({'width':(parseInt(jQuery(this).val())-13)+"%"});
		jQuery("#web-business-popup-preview .preview-link-class-message").remove();
		jQuery("#preview-quote").after("<p class='preview-link-class-message'>The width displayed there may not coincide the real sizes. It depends on your content width size.</p>");
	});
	
	jQuery("#quote-color").change(function(){
		jQuery("#preview-quote").css({'color':"#"+jQuery(this).val()});
	});
		
	jQuery("#quote-style").change(function(){
	
		if(jQuery(this).val()=="none"){
			jQuery(".quote-bgcolor-box").removeClass("block");
			jQuery("#preview-quote").css({"background-color":"#f7f7f7"});
		}
		else{jQuery(".quote-bgcolor-box").addClass("block");}
		
		jQuery("#preview-quote").removeClass("wd_quote_none wd_quote_boxed");
		jQuery("#preview-quote").addClass("wd_quote_"+jQuery(this).val());
	});
	
	jQuery("#quote-bgcolor").change(function(){
		jQuery("#preview-quote").css({'background-color':"#"+jQuery(this).val()});
	});
	
	jQuery("#quote-size").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}
		
		jQuery("#preview-quote").css({'font-size':jQuery(this).val()+"px"});
	});
	
	jQuery("#quote-align").change(function(){
		jQuery("#preview-quote").removeClass("wd_quote_left wd_quote_right");
		jQuery("#preview-quote").addClass("wd_quote_"+jQuery(this).val());
	});
	
	jQuery("#quote-icon").change(function(){
		jQuery("#preview-quote").removeClass("wd_quote_light wd_quote_dark");
		jQuery("#preview-quote").addClass("wd_quote_"+jQuery(this).val());
	});
	
	
/*###########TABS############*/
	
	function height(){
		var  height1=jQuery("#preview-tabs .wd_tabs").height()
		var  height2=0;
		jQuery("#preview-tabs .wd_tabs_content li").each(function(){
			if(jQuery(this).height()>height2){height2=jQuery(this).height();}
		});
		jQuery("#preview-tabs .wd_tabs_content").height(height2);
		jQuery("#preview-tabs").height(height1*1+height2*1+5);
	}
	
	
	jQuery("#tabs-width").change(function(){
		if(parseInt(jQuery(this).val())<0){jQuery(this).val("10%");}
		if(parseInt(jQuery(this).val())>100){jQuery(this).val("100%");}
		jQuery("#preview-tabs").css({'width':parseInt(jQuery(this).val())+"%"});
		jQuery("#web-business-popup-preview .preview-link-class-message").remove();
		jQuery("#preview-tabs").after("<p class='preview-link-class-message'>The width displayed there may not coincide the real sizes. It depends on your content width size.</p>");
	});
	
	jQuery("#tabs-tabsize").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}
		
		jQuery("#preview-tabs .wd_tabs *").css({'font-size':jQuery(this).val()+"px"});
	});
	
	jQuery("#tabs-contentsize").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}
		jQuery("#preview-tabs .wd_tabs_content *").css({'font-size':jQuery(this).val()+"px"});
	});
	
	
	
	jQuery(".add-new-tab").click(function(){
		iiii=parseInt(jQuery('body').find('.tab-settings').length)+1;
		var active="";
		var tabsize=jQuery('#preview-tabs .wd_tabs li').css("font-size");
		var contentsize=jQuery('#preview-tabs .wd_tabs_content li div').css("font-size");
		

		
		if(iiii=="1"){active='class="active"';}
		jQuery(this).parent().after('<div class="tab-settings" data-id="'+iiii+'"><span class="number">Tab No#'+iiii+'</span><a class="remove" href="#remove">Remove</a><label>Title</label><input type="text" value="Title '+iiii+'" data-id="wd_tabs_input_'+iiii+'" /><label>Content</label><textarea data-id="wd_tabs_content_input_'+iiii+'">Content '+iiii+'</textarea></div>');
		jQuery("#preview-tabs .wd_tabs").append('<li  id="wd_tabs_'+iiii+'"><a '+active+' href="#wd_tabs_content_'+iiii+'" style="font-size:'+tabsize+';">Title '+iiii+'</a></li>');
		jQuery("#preview-tabs .wd_tabs_content").append('<li '+active+' id="wd_tabs_content_'+iiii+'"><div  style="font-size:'+contentsize+';">Content '+iiii+'</div></li>');
		height();
		return false;
	});
	

	jQuery(".wd_tabs").on("click"," li a",function(){
		jQuery(".wd_tabs li a").removeClass("active");
		jQuery(this).addClass("active");
		jQuery(".wd_tabs_content li").css({visibility:"hidden"})
		var content=jQuery(this).attr("href").replace("#","");
		jQuery('#'+content).css({visibility:"visible"});
		return false;
	});
	
	
	jQuery("#web-business-popup-settings").on("change",".tab-settings input",function(){
		var title=jQuery(this).attr("data-id").replace("input_","");
		jQuery("#"+title).children().html(jQuery(this).val());
		
		height();
	});
	
	jQuery("#web-business-popup-settings").on("change",".tab-settings textarea",function(){
		var content=jQuery(this).attr("data-id").replace("input_","");
		jQuery("#"+content+" div").html(jQuery(this).val());
		
		height();
	});
	
	
	jQuery("#web-business-popup-settings").on("click",".remove",function(){
		var id=jQuery(this).parents('.tab-settings').attr("data-id");
		jQuery(this).parents('.tab-settings').remove();
		jQuery("#wd_tabs_"+id).remove();
		jQuery("#wd_tabs_content_"+id).remove();
		
		height();
	});
	
	
/*###########RELATED POSTS############*/

	jQuery("#relatedposts-limit").change(function(){	
		count=5;
		if(parseInt(jQuery("#relatedposts-limit").val())>0){
			count=parseInt(jQuery("#relatedposts-limit").val());
		}

		llist="";
		lli=jQuery("#preview-relatedposts ul li:first-child").html();
		lli="<li>"+lli+"</li>";
		for(var i=0;i<count; i++){
			llist=llist+lli;
		}
		jQuery("#preview-relatedposts ul").html(llist);
		relatedposthover();
	});
	
	jQuery("#relatedposts-thumb-width").change(function(){	
		var str=jQuery("#preview-relatedposts ul a img").width()/jQuery("#preview-relatedposts ul a img").height();
		width=parseInt(jQuery("#relatedposts-thumb-width").val());
		if(width==""){return false;}
		height=Math.round(width/str);
		jQuery("#relatedposts-thumb-height").val(height);
		jQuery("#preview-relatedposts ul a img").width(width).height(height);
	});
	
	jQuery("#relatedposts-thumb-height").change(function(){	
		var str=jQuery("#preview-relatedposts ul a img").width()/jQuery("#preview-relatedposts ul a img").height();
		height=parseInt(jQuery("#relatedposts-thumb-height").val());
		if(height==""){return false;}
		width=Math.round(height*str);
		jQuery("#relatedposts-thumb-width").val(width);
		jQuery("#preview-relatedposts ul a img").width(width).height(height);
	});
	
	
	jQuery("#relatedposts-size").change(function(){
		if(jQuery(this).val()<0){jQuery(this).val(0);}
		
		jQuery("#preview-relatedposts ul a span").css({'font-size':jQuery(this).val()+"px"});
	});
	
	
	var relatednormalcolor="#444";
	var relatedhovercolor="#fff";
	function relatedposthover(){
		jQuery("#preview-relatedposts ul a").hover(function(){
			jQuery(this).addClass("hover");
			jQuery("#preview-relatedposts").find("ul a.hover").css({'color':relatedhovercolor});
		},
		function(){
			jQuery(this).removeClass("hover");
			jQuery("#preview-relatedposts").find("ul a").css({'color':relatednormalcolor});
		});	
	}
	relatedposthover();
	jQuery("#relatedposts-color").change(function(){	
		relatednormalcolor='#'+jQuery(this).val();
		jQuery("#preview-relatedposts ul a").css({'color':relatednormalcolor});
	});
	
	jQuery("#relatedposts-hovercolor").change(function(){	
		relatedhovercolor='#'+jQuery(this).val();
	});
	
	
	jQuery("#relatedposts-position").change(function(){	
		jQuery("#preview-relatedposts ul").removeClass("left");
		if(jQuery(this).val()=="left"){jQuery("#preview-relatedposts ul").addClass("left")}
	});
	
/*###########COLUMNS LAYOUT############*/

	jQuery("#columns-limit").change(function(){
		var divclass=jQuery(this).val().substring(1);
		jQuery("#web-business-popup-settings div").removeClass("block");
		jQuery("#web-business-popup-settings ."+divclass).addClass("block");
		
		var number=jQuery(this).val().charAt(0);
		var count=number[number.length - 1];
		var width=100/count;
		
		var element='<div class="column-container" style="width:'+(width-1)+'%;height:20px;border:1px dashed #444;display:inline-block"></div>';
		jQuery("#web-business-popup-preview").html('<div class="column-box"><a class="delete"></a></div>');
		/*for(var i=0;i<count;i++){
			jQuery("#web-business-popup-preview").append(element);
		}*/
	});
	
	jQuery("#web-business-popup-settings div.columns-editor a").click(function(){
	
		var number=jQuery(this).html().charAt(0);
		var count=jQuery(this).html().substr(jQuery(this).html().length - 1);
		//alert(number);
		var name=jQuery(this).attr("data-id");
		 i=0;
		// alert((jQuery("#web-business-popup-preview>div.reserved").length*1+number*1)+" count"+count);
		
		/*jQuery("#web-business-popup-preview>div").not(".reserved").each(function(){
			if(i==number){return false;}
			jQuery(this).addClass("reserved "+name);
			i++;
		 });*/
		 
		jQuery(".preview-column-class-message").remove();
		if((parseInt(jQuery("#web-business-popup-preview .column-box ul li").length)*1+parseInt(number))*1>parseInt(count)){
				jQuery("#web-business-popup-preview .column-box").after('<p class="preview-column-class-message">Layout: Maximum number of columns is '+count+'.</p>');
				return false;	
		}
		 var list="";
		 
		 for (var i=0;i<number;i++){
			list=list+'<li></li>';
		 }
		 
		 var block='<ul data-name="Column '+jQuery(this).html()+'" class="'+name+'">'+list+'</ul>';
		 jQuery("#web-business-popup-preview>div.column-box").append(block);
		 
	});	
	
	jQuery("#web-business-popup-preview").on("click","div.column-box a.delete",function(){
		jQuery(".preview-column-class-message").remove();
		jQuery("#web-business-popup-preview").find("div.column-box ul:last-child").remove();
	});
	
	jQuery("#web-business-popup .header .top-menu li a").click(function(){

		var title=jQuery(this).html();
		var id=jQuery(this).attr("href").replace("#","");
		
		if(id=="hr"){
			tinyMCE.activeEditor.selection.setContent("[hr]");
			self.parent.tb_remove(); 
			return false;
		}else if(id=="divider"){
			tinyMCE.activeEditor.selection.setContent("[divider]");
			self.parent.tb_remove(); 
			return false;
		}else{
			<?php if (get_bloginfo('version') < '3.9') { ?>
			tinyMCE.activeEditor.execCommand("ruvenPopup", false, {
				title: title,
				identifier: id
			})
			<?php }else{?>
				tb_show("Shortcode Editor", url_ruvenkit + "tinymce/popup.php?popup="+id+"&width=" + 1024)

			<?php }?>
			
		}
	});		
	
	jQuery("#web-business-popup .header .top-menu li a[href='#<?php echo $shortcode->data_name; ?>']").addClass("active");
		
	
});
</script>
</head>
<body>

<div id="web-business-popup">
	<div id="web-business-shortcode-wrap">
			<!--<div class="header">
				TITLE 
				<?php echo $shortcode->popup_id; ?>
			</div>	-->
			<div class="header">
			<ul class="top-menu">
				<li><a href="#button">Buttons</a></li>
				<li><a href="#link">Links</a></li>
				<li><a href="#infobox">Info Box</a></li>
				<li><a href="#quote">Quote box</a></li>
				<li><a href="#tabs">Tabs Creator</a></li>
				<li><a href="#relatedposts">Related Posts</a></li>
				<li><a href="#columns">Columns Layout</a></li>
				<li class="hassub">Dividers
					<ul>
						<li><a href="#hr">Horizontal Rule</a></li>
						<li><a href="#divider">Divider</a></li>						
					</ul>
				</li>
			</ul>
			</div>	
			<form method="post" id="web-business-sc-form">
			<?php echo $shortcode->output; ?>
				<!--CONTENT -->
				
				
				<!--BUTTONE -->
				<div id="web-business-insert-shortcode"><span>Insert Shortcode</span><a href="" id="web-business-insert-shortcode-<?php echo $shortcode->data_name; ?>" class="button-primary web-business-insert">Insert</a></div>			
			</form>
		<div class="clear"></div>
		
	</div>

</div>

</body>
</html>