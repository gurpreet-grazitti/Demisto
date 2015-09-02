<?php
/**
 * Plugin Name: Szia Theme Post Types
 * 
 * Description: Szia Theme Post Types plugin for wordpress
 * Version: 1.0
 * Author: Smartdatasoft
 * Author URI: http://www.smartdatasoft.com/
 * Requires at least: 3.5
 * Tested up to: 3.7
 * Text Domain: szia
 * Domain Path: /i18n/languages/
 *
 * @package Szia
 * @category Core
 * @author Smartdatasoft
 */
  
$sziaplugindir = dirname(__FILE__);			
$sziapluginurl = plugins_url('',__FILE__);

require_once $sziaplugindir . "/post-types/testimonial.php";
require_once $sziaplugindir . "/post-types/recent-works.php";
require_once $sziaplugindir . "/post-types/works-slider.php";
require_once $sziaplugindir . "/post-types/team.php";
require_once $sziaplugindir . "/post-types/post-format-settings.php";

?>