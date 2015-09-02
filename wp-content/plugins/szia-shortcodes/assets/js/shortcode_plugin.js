/* Adapted from http://brettterpstra.com/adding-a-tinymce-button/ */



(function() {

	tinymce.create('tinymce.plugins.SziaShortcodes', {

		init : function(ed, url) {
                        
                        
			ed.addButton('sziashortcodes', {

				title : 'Szia Shortcodes',

				image : url+'./../images/shortcode.png',

				onclick : function() {

					ed.windowManager.open({

						file : url + './../../lib/tinymce_shortcodes.php',

						width : 330,

						height : 120,

						inline : 1

					});

				}



			});

		},
		createControl : function(n, cm) {

			return null;

		},

		getInfo : function() {

			return {

				longname : "Shortcodes",

				author : 'sds',

				version : "1.0"

			};

		}

	});

	tinymce.PluginManager.add('sziashortcodes', tinymce.plugins.SziaShortcodes);

})();