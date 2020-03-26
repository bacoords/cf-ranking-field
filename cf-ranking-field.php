<?php
/**
 * Plugin Name
 *
 * @package           CFRankingField
 * @author            Brian Coords
 * @copyright         2020 Brian Coords
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Caldera Forms Ranking Field
 * Plugin URI:        https://briancoords.com/cf-ranking-field
 * Description:       Ranking field type for Caldera Forms.
 * Version:           0.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Brian Coords
 * Author URI:        https://briancoords.com
 * Text Domain:       cf-ranking-field
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */



/**
 * Full path to this directory
 *
 * Use to set path to template files
 *
 * @since 0.0.1
 */
define( 'CF_RANKING_FIELD_PATH', plugin_dir_path( __FILE__ ) );
define( 'CF_RANKING_FIELD_VERSION', '0.0.3' );
define( 'CF_RANKING_FIELD_URL', plugins_url( '/', __FILE__ ) );


add_action( 'caldera_forms_includes_complete', 'cf_ranking_field_init' );

/**
 * Load plugin
 *
 * @since 0.0.1
 *
 * @uses "caldera_forms_includes_complete" action
 */
function cf_ranking_field_init() {
	add_filter( 'caldera_forms_get_field_types', 'cf_ranking_field_init_field', 15 );

}


/**
 * Add custom field type
 *
 * @since 0.0.1
 *
 * @uses "caldera_forms_get_field_types" filter
 *
 * @param array $fields
 *
 * @return array
 */
function cf_ranking_field_init_field( $fields ) {
	$fields['ranking'] = array(
		'field'       => __( 'Ranking Field', 'cf-ranking-field' ),
		'description' => __( 'Rank a list of items', 'cf-ranking-field' ),
		'file'        => CF_RANKING_FIELD_PATH . 'lib/field.php',
		'category'    => __( 'Select', 'caldera-forms' ),
		'setup'       => array(
			'template' => CF_RANKING_FIELD_PATH . 'lib/config.php',
			'preview'  => CF_RANKING_FIELD_PATH . 'lib/preview.php',
		),
		'viewer'      => 'cf_ranking_field_viewer',
		'scripts'     => array(
			includes_url() . 'js/jquery/ui/core.min.js',
			includes_url() . 'js/jquery/ui/widget.min.js',
			includes_url() . 'js/jquery/ui/mouse.min.js',
			includes_url() . 'js/jquery/ui/sortable.min.js',
			CF_RANKING_FIELD_URL . 'assets/cf-ranking-field-frontend.js?v=' . CF_RANKING_FIELD_VERSION,
		),
		'styles'     => array(
			CF_RANKING_FIELD_URL . 'assets/cf-ranking-field-frontend.css?v=' . CF_RANKING_FIELD_VERSION,
		),
	);

	return $fields;
}


/**
 * Helper to create an options array with keys.
 *
 * @param [type] $options
 * @return void
 */
function cf_ranking_field_create_options_array( $options ) {
	$options = explode( PHP_EOL, $options );
	$return  = array();
	foreach ( $options as $option ) {
		$key            = sanitize_title( $option );
		$return[ $key ] = $option;
	}
	return $return;
}

/**
 * Save handler.
 *
 * @param [type] $value
 * @param [type] $field
 * @param [type] $form
 * @return void
 */
function cf_ranking_field_viewer( $value, $field, $form ) {

	$return = '<ol>';

	// Grab our options array.
	$options = cf_ranking_field_create_options_array( $field['config']['options'] );
	if ( $value ) {
		foreach ( $value as $val ) {
			$return .= '<li>' . $options[ $val ] . '</li>';
		}
	}

	$return .= '</ol>';
	return $return;
}




// function cf_ranking_field_process_attributes( $field ) {
// 	if ( $field['config']['options'] ) {
// 		$field['config']['options_array'] = cf_ranking_field_create_options_array( $field['config']['options'] );
// 	}
// 	return $field;
// }
// add_filter( 'caldera_forms_render_get_field_type-cf-ranking-field', 'cf_ranking_field_process_attributes' );

