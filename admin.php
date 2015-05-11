<?php
/*
 * Prevent direct access to the file
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Mapme admin menu
 */
function mapme_add_admin_menu() { 

	add_options_page(
		__( 'Mapme', 'mapme' ),
		__( 'Mapme', 'mapme' ),
		'manage_options',
		'mapme',
		'mapme_options_page'
	);

}
add_action( 'admin_menu', 'mapme_add_admin_menu' );



/*
 * Mapme admin layout
 */
function mapme_options_page() { 

	?>
	<h1><?php esc_html_e( 'Mapme', 'mapme' ); ?></h1>

	<form action='options.php' method='post'>

		<?php
		settings_fields( 'mapme_admin_page' );
		do_settings_sections( 'mapme_admin_page' );
		submit_button();
		?>

	</form>
	<?php

}



/*
 * Register Mapme settings
 */
function mapme_settings_init() { 

	register_setting(
		'mapme_admin_page',
		'mapme_settings'
	);

	add_settings_section(
		'mapme_mapme_admin_page_section', 
		__( 'Settings', 'mapme' ), 
		'mapme_settings_section_render', 
		'mapme_admin_page'
	);

	add_settings_field( 
		'mapme_map_id', 
		__( 'Map ID', 'mapme' ), 
		'mapme_map_id_render', 
		'mapme_admin_page', 
		'mapme_mapme_admin_page_section' 
	);

	add_settings_field( 
		'mapme_companies_list', 
		__( 'Companies List', 'mapme' ), 
		'mapme_companies_list_render', 
		'mapme_admin_page', 
		'mapme_mapme_admin_page_section' 
	);

	add_settings_field( 
		'mapme_company_link', 
		__( 'Company Info Link', 'mapme' ), 
		'mapme_company_link_render', 
		'mapme_admin_page', 
		'mapme_mapme_admin_page_section' 
	);

}
add_action( 'admin_init', 'mapme_settings_init' );



function mapme_settings_section_render() {

	echo '<p>';
	printf(
		__( 'The plugin works with 3 basic shortcodes: %1$s, %2$s and %3$s.', 'mapme' ),
		'<code>[mapme]</code>',
		'<code>[mapme-list]</code>',
		'<code>[mapme-info]</code>'
	);
	echo '</p>';

	echo '<p>';
	_e( 'To make the magic happen, enter the following information:', 'mapme' );
	echo '</p>';

}
function mapme_map_id_render() { 

	$options = get_option( 'mapme_settings' );
	?>
	<input type='text' name='mapme_settings[mapme_map_id]' value='<?php echo $options['mapme_map_id']; ?>' class='regular-text'>
	<p class="description"><?php _e( 'Map id from the <a href="http://mapme.com/content/maps/">Map list</a>.', 'mapme' ); ?></p>
	<?php

}
function mapme_companies_list_render() { 

	$options = get_option( 'mapme_settings' );
	?>
	<input type='checkbox' name='mapme_settings[mapme_companies_list]' <?php checked( $options['mapme_companies_list'], 1 ); ?> value='1'> <?php _e( 'In the company list, make the companies clickable URLs', 'mapme' ); ?>
	<p class="description"><?php printf( __( 'When using the %s shortcode, you can show a simple list of companies or a linkble list.', 'mapme' ), '<code>[mapme-list]</code>' ); ?></p>
	<?php

}
function mapme_company_link_render() { 

	$options = get_option( 'mapme_settings' );
	?>
	<input type='text' name='mapme_settings[mapme_company_link]' value='<?php echo $options['mapme_company_link']; ?>' class='regular-text'>
	<p class="description"><?php printf( __( 'Link to the page with the %s shortcode.', 'mapme' ), '<code>[mapme-info]</code>' ); ?></p>
	<?php

}
