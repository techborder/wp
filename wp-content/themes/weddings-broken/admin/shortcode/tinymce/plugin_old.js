(function ()
{
	// create ruvenShortcodes plugin
	tinymce.create("tinymce.plugins.ruvenShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("ruvenPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Shortcode Editor", url + "/popup.php?popup=" + popup + "&width=" + 1024);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "ruven_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('ruven_button', {
                    title: "Shortcode Editor",
					image: RuvenShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

						
                btn.onRenderMenu.add(function (c, b)
				{	
					//Menu items
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Links", "link" );
					a.addWithPopup( b, "Info Box", "infobox" );
					a.addWithPopup( b, "Quote box", "quote" );
					a.addWithPopup( b, "Tabs Creator", "tabs" );
					a.addWithPopup( b, "Related Posts", "relatedposts" );
					a.addWithPopup( b, "Columns Layout", "columns" );
				
					
					var dividers=b.addMenu({title: "Dividers"});
							
					a.addWithPopup(dividers, "Horizontal Rule", "hr" );
					a.addWithPopup(dividers, "Divider", "divider" );			
					
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					if(id=="hr"){
						tinyMCE.activeEditor.selection.setContent("[hr]");
						return false;
					}else if(id=="divider"){
						tinyMCE.activeEditor.selection.setContent("[divider]");
						return false;
					}
					tinyMCE.activeEditor.execCommand("ruvenPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Webdorado Shortcode Editor',
				author: 'web-dorado.com',
				authorurl: 'http://web-dorado.com',
				infourl: 'http://web-dorado.com',
				version: "1.0"
			}
		}
	});
	
	// add ruvenShortcodes plugin
	tinymce.PluginManager.add("ruvenShortcodes", tinymce.plugins.ruvenShortcodes);
})();