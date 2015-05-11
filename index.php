<?php
/*
Plugin Name: Mapme
Plugin URI:  https://wordpress.org/plugins/mapme/
Description: Embed community maps from Mapme.com into your WordPress site
Version:     1.1
Author:      Rami Yushuvaev
Author URI:  http://GenerateWP.com/
Text Domain: mapme
Domain Path: /languages
*/



/*
 * Prevent direct access to the file
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Add Mapme Admin panel
 */
include_once ( plugin_dir_path( __FILE__ ) . 'admin.php' );



/*
 * Add Mapme API
 */
include_once ( plugin_dir_path( __FILE__ ) . 'api.php' );



/*
 * Add Mapme Rewrite Rules
 */
include_once ( plugin_dir_path( __FILE__ ) . 'rewrite.php' );



/*
 * Add Mapme Shortcodes
 */
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes.php' );



/*
 * Add Mapme SEO
 */
include_once ( plugin_dir_path( __FILE__ ) . 'seo.php' );



/*
 * Add Mapme Sitemap
 */
include_once ( plugin_dir_path( __FILE__ ) . 'sitemap.php' );
