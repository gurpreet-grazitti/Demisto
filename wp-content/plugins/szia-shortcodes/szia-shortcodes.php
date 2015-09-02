<?php
/**
 * Plugin Name: Szia Theme Shortcodes
 * 
 * Description: Szia Theme Shortcodes plugin for wordpress
 * Version: 1.0
 * Author: Smartdatasoft
 * Author URI: http://www.smartdatasoft.com/
 * Requires at least: 3.5
 * Tested up to: 3.6
 * Text Domain: szia
 * Domain Path: /i18n/languages/
 *
 * @package Restaurant
 * @category Core
 * @author Smartdatasoft
 */
 
function restaurant_shortcodes_activation() {
	
	
}
register_activation_hook(__FILE__, 'restaurant_shortcodes_activation');

function restaurant_shortcodes_deactivation() {
	
}

register_deactivation_hook(__FILE__, 'restaurant_shortcodes_deactivation');

if(!class_exists('RestShortcodes')):
	
    class RestShortcodes{

        public static $plugindir, $pluginurl;

        function __construct(){			
            RestShortcodes::$plugindir = dirname(__FILE__);			
            RestShortcodes::$pluginurl = plugins_url('',__FILE__);			
            add_action( 'admin_enqueue_scripts', array($this,'load_restaurant_shortcodes_admin_scripts') );					
            add_action( 'init', array($this,'restaurant_shortcode_button') );            
        }


        function load_restaurant_shortcodes_admin_scripts(){			
            wp_enqueue_script('jquery');			
        }


        function restaurant_shortcode_button() {

            if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )		
                return;

            // Add only in Rich Editor mode

            if ( get_user_option('rich_editing') == 'true') {		
                add_filter("mce_external_plugins", array($this,"restaurant_add_shortcode_tinymce_plugin"));		
                add_filter('mce_buttons', array($this,'restaurant_register_shortcode_button'));		
            }

        }

        /**
         * Register the TinyMCE Shortcode Button
         */

        function restaurant_register_shortcode_button($buttons) {		
            array_push($buttons, "|", "sziashortcodes");		
            return $buttons;		
        }

        /**		
         * Load the TinyMCE plugin: shortcode_plugin.js		
         */

        function restaurant_add_shortcode_tinymce_plugin($plugin_array) {			
           $plugin_array['sziashortcodes'] = RestShortcodes::$pluginurl . '/assets/js/shortcode_plugin.js';		
           return $plugin_array;		
        }

    }


    $RestShortcodes = new RestShortcodes();

    require_once( RestShortcodes::$plugindir . "/lib/shortcodes.php" );
	
endif;


?>