// start the popup specefic scripts
// safe to use jQuery(function($) {})(jQuery);
jQuery(document).ready(function() {



	jQuery("body").on('click',"#web-business-insert-shortcode-button",function(){		
		var url = jQuery("body").find('#button-url').val();
		var text = jQuery("body").find('#button-text').val();
		var type = jQuery("body").find('#button-type').val();
		var size =jQuery("body").find('#button-size').val();
		var bgcolor = "#"+jQuery("body").find('#button-bgcolor').val();	
		var color = "#"+jQuery("body").find('#button-color').val();	
		var hovercolor = "#"+jQuery("body").find('#button-hovercolor').val();					
		var bordercolor = "#"+jQuery("body").find('#button-border-color').val();	
		var borderstyle = jQuery("body").find('#button-border-style').val(); 
		var align =jQuery("body").find('#button-align').val(); 
		var icon =jQuery("body").find('#button-icon').val(); 
		var css =jQuery("body").find('#button-css').val(); 
		
		var target="";
		if(jQuery("body").find('#button-target').is(":checked")){target="_blank";}
		else {target="";}
		
		var output = '';
		if(text==""){text="Simple Button";}
		if(url=="" || !url){url="#";}
		if(css=="" || !css){css="none000";}
		if(icon=="" || !css){icon="none000";}
		
		output='[button url='+url+'  type='+type+' icon='+icon+' size='+size+' bgcolor='+bgcolor+'  bordercolor='+bordercolor+' color='+color+' hovercolor='+hovercolor+'   borderstyle='+borderstyle+' align='+align+' css='+css+' color='+color+' target='+target+']'+text+'[/button]';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-link",function(){		
		var text = jQuery("body").find('#link-text').val();
		var url = jQuery("body").find('#link-url').val();
		var style = jQuery("body").find('#link-style').val(); 
		var align = jQuery("body").find('#link-align').val(); 
		var icon = jQuery("body").find('#link-icon').val(); 
		var css = jQuery("body").find('#link-css').val();
		var color = jQuery("body").find('#link-color').val(); 
		var hovercolor = jQuery("body").find('#link-hovercolor').val(); 
		
		var output = '';
		if(text==""){text="Simple link";}
		if(url=="" || !url){url="#";}
		if(css=="" || !css){css="none000";}
		if(icon=="" || !icon){icon="none000";}
		output='[link style='+style+' url='+url+' align='+align+' icon='+icon+' css='+css+' color='+color+' hovercolor='+hovercolor+']'+text+'[/link]';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-infobox",function(){		
		
		var text = jQuery("body").find('#infobox-content').val();
		var size =jQuery("body").find('#infobox-size').val();
		var type =jQuery("body").find('#infobox-type').val(); 
		var border =jQuery("body").find('#infobox-border').val(); 
		var style =jQuery("body").find('#infobox-style').val(); 
		var color = "#"+jQuery("body").find('#infobox-color').val(); 
		var bordercolor = "#"+jQuery("body").find('#infobox-bordercolor').val(); 
		var bgcolor = "#"+jQuery("body").find('#infobox-bgcolor').val(); 
		var width = jQuery("body").find('#infobox-width').val(); 
		var icon = jQuery("body").find('#infobox-icon').val(); 

		var target="";
		
		if(icon=="" || !icon){icon="none000";}else{type="none";}
		var output = '';
		
		if(text==""){text="Lorem Ipsum is simply dummy text of the printing and typesetting industry";}
		output='[infobox  size='+size+' icon='+icon+' type='+type+' width='+width+' bgcolor='+bgcolor+' bordercolor='+bordercolor+' color='+color+'  size='+size+' border='+border+' style='+style+' ]'+text+'[/infobox]';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-quote",function(){		
		var text = jQuery("body").find('#quote-content').val();
		var style =jQuery("body").find('#quote-style').val(); 
		var align =jQuery("body").find('#quote-align').val(); 
		var color ="#"+ jQuery("body").find('#quote-color').val(); 
		var bgcolor ="#"+ jQuery("body").find('#quote-bgcolor').val(); 
		var icon = jQuery("body").find('#quote-icon').val(); 
		var width = jQuery("body").find('#quote-width').val(); 
		var size =jQuery("body").find('#quote-size').val();
		
				
		var output = '';
		if(text==""){text="Lorem Ipsum is simply dummy text of the printing and typesetting industry";}
		backgroundcolor="";
		if(style!="none"){backgroundcolor='bgcolor='+bgcolor;}
		output='[quote '+backgroundcolor+' icon='+icon+'  size='+size+' width='+width+' color='+color+' align='+align+']'+text+'[/quote]';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});

	
		
	jQuery("body").on('click',"#web-business-insert-shortcode-contactform",function(){		
		var email = jQuery("body").find('#contactform-email').val();
		var subject = jQuery("body").find('#contactform-subject').val();
			
		var output = '';
		output='[contactform email='+email+' subject='+subject+']';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-tabs",function(){		
		var width = jQuery("body").find('#tabs-width').val(); 	
		var tabsize = jQuery("body").find('#tabs-tabsize').val(); 	
		var contentsize = jQuery("body").find('#tabs-contentsize').val(); 	

		var output = '';
		var tabs="";
	
		jQuery(".wd_tabs li").each(function(i) {
			tabs+='[tab size='+tabsize+']'+jQuery("#wd_tabs_"+(i+1)+" a").html()+'[/tab][content size='+contentsize+']'+jQuery("#wd_tabs_content_"+(i+1)).html()+'[/content]';
		});
		
		output='[tabs width='+width+']'+tabs+'[/tabs]';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-relatedposts",function(){	
		var limit = jQuery("body").find('#relatedposts-limit').val();
		var thumbwidth = jQuery("body").find('#relatedposts-thumb-width').val();
		var thumbheight = jQuery("body").find('#relatedposts-thumb-height').val();
		var size = jQuery("body").find('#relatedposts-size').val();
		var color ="#"+jQuery("body").find('#relatedposts-color').val();
		var hovercolor ="#"+jQuery("body").find('#relatedposts-hovercolor').val();
		var position = jQuery("body").find('#relatedposts-position').val();

		
		var output = '';
		
		output='[relatedpost limit='+limit+' position='+ position+' thumbwidth='+thumbwidth+' thumbheight='+thumbheight+' size='+size+' color='+color+' hovercolor='+hovercolor+']';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});
	
	
	jQuery("body").on('click',"#web-business-insert-shortcode-columns",function(){	
		var output = '';
		var i=0;
		jQuery("#web-business-popup-preview div.column-box ul").each(function(){
			if(i==0){var first='first=first';}else{first='';}
			output+='['+jQuery(this).attr("class")+' '+first+']'+jQuery(this).attr("data-name")+'[/'+jQuery(this).attr("class")+']';
			i++;
		});

		
		
		
		//output='[relatedpost limit='+limit+' thumbwidth='+thumbwidth+' thumbheight='+thumbheight+' size='+size+' color='+color+' hovercolor='+hovercolor+']';
		tinyMCE.activeEditor.selection.setContent(output);
		self.parent.tb_remove(); 
		return false;
	});

});