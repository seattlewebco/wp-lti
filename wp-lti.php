<?php
/**
 * Plugin Name:     WordPress LTI
 * Description:     WordPress Learning Tools Interoperability Integration
 * Version:         1.0.0
 * Author:          Seattle Web Co.
 * Author URI:      https://seattlewebco.com
 * Text Domain:     wp-lti
 * Domain Path:     /languages/
 * Contributors:    seattlewebco, dkjensen
 * Requires PHP:    7.0.0
 *
 * @package SeattleWebCo/WP-LTI
 */

namespace SeattleWebCo\WP_LTI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_LTI_FILE', __FILE__ );
define( 'WP_LTI_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_LTI_URL', plugin_dir_url( __FILE__ ) );

require_once 'vendor/autoload.php';

require_once 'includes/helpers.php';
require_once 'includes/endpoints.php';
require_once 'includes/admin/settings.php';

/**
 * Activation hook
 */
function wp_lti_activation() {
	if ( version_compare( PHP_VERSION, '7.1.0', '<' ) ) {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die(
			esc_html__( 'This plugin requires a minimum PHP version of 7.1.0', 'wp-lti' ),
			esc_html__( 'Plugin activation error', 'wp-lti' ),
			array(
				'response'  => 200,
				'back_link' => true,
			)
		);
	}

	delete_option( 'rewrite_rules' );

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, __NAMESPACE__ . '\wp_lti_activation' );
