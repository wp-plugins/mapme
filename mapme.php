<?php
/*
Plugin Name: Mapme
Plugin URI:  https://wordpress.org/plugins/mapme/
Description: Embed community maps from Mapme.com into your WordPress site
Version:     1.0
Author:      Rami Yushuvaev
Author URI:  http://GenerateWP.com/
*/



/*
 * Prevent direct access to the file
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Mapme Shortcode
 */
function mapme_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id'     => '',
			'width'  => '637',
			'height' => '800',
		), $atts )
	);

	// Embed Code
	return '<iframe src="https://mapme.com/' . $id . '/embedded" width="' . $width . '" height="' . $height . '" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" border="0" scrolling="no"></iframe>';

}
add_shortcode( 'mapme', 'mapme_shortcode' );
