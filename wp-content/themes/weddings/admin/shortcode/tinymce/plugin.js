(function ()
{
	// create ruvenShortcodes plugin
	tinymce.create("tinymce.plugins.ruvenShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addButton('ruvenShortcodes', {
			type: 'menubutton',
			icon:"ruven-shortcode",
            menu: [
			///buttons function
                {text: 'Buttons', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=button&width=" + 1024)
					}
				},
				
			///Links
                {text: 'Links', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=link&width=" + 1024)
					}
				},
				
			///Info Box
			
				{text: 'Info Box', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=infobox&width=" + 1024)
					}
				},
				
			///Quote box
			
				{text: 'Quote box', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=quote&width=" + 1024)
					}
				},
				
			///Tabs Creator
			
				{text: 'Tabs Creator', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=tabs&width=" + 1024)
					}
				},
				
			///Related Posts

				{text: 'Related Posts', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=relatedposts&width=" + 1024)
					}
				},
			///Columns Layout
			
				{text: 'Columns Layout', onclick: function() {
						tb_show("Shortcode Editor", url + "/popup.php?popup=columns&width=" + 1024)
					}
				},
				{	text: 'Dividers',
					type: 'menuitem', 
					menu: [{text: 'Horizontal Rule', onclick: function() {
						alert('hr');
								tinyMCE.activeEditor.selection.setContent("[hr]");
							}
						},
						{text: 'Divider', onclick: function() {
								tinyMCE.activeEditor.selection.setContent("[divider]");
							}
						}
					]
				
				},

            ]
			});
		},
	
	});
	
	// add ruvenShortcodes plugin
	tinymce.PluginManager.add("ruvenShortcodes", tinymce.plugins.ruvenShortcodes);
})();