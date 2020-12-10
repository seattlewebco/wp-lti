<?php
/**
 * Helper functions.
 *
 * @package SeattleWebCo\WP-LTI
 */

namespace SeattleWebCo\WP_LTI;

/**
 * Load a template file from filename.
 *
 * @param string $filename Filename path.
 * @param array  $args Arguments passed to template.
 * @return string
 */
function get_template( $filename, $args = array() ) {
	$filename = trim( str_replace( '.php', '', $filename ) ) . '.php';

	if ( file_exists( WP_LTI_DIR . 'templates/' . $filename ) ) {
		load_template( WP_LTI_DIR . 'templates/' . $filename, true, $args );
	}

	return '';
}
