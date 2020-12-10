<?php
/**
 * Admin settings.
 *
 * @package SeattleWebCo/WP-LTI
 */

namespace SeattleWebCo\WP_LTI\Admin;

use function SeattleWebCo\WP_LTI\get_template;

/**
 * Add plugin options to Settings
 *
 * @return void
 */
function options_page() {
	add_options_page(
		esc_html__( 'WordPress LTI', 'wp-lti' ),
		esc_html__( 'WordPress LTI', 'wp-lti' ),
		'manage_options',
		'wp-lti',
		function() {
			get_template(
				'admin/settings.php',
				array(
					'tabs'              => array(
						'general'       => esc_html__( 'General', 'wp-lti' ),
						'integrations'  => esc_html__( 'Integrations', 'wp-lti' ),
					),
					'default_tab'       => 'general',
					// phpcs:ignore
					'current_tab'       => $_GET['tab'] ?? '',
					'settings'          => get_option( 'wp_lti' ),
				)
			);
		}
	);
}
add_action( 'admin_menu', __NAMESPACE__ . '\options_page' );

/**
 * Enqueue assets to options page.
 *
 * @return void
 */
function admin_scripts() {
	wp_enqueue_script( 'wp-lti-main', WP_LTI_URL . 'assets/js/main.js', array(), get_plugin_data( WP_LTI_FILE )['Version'], true );
	wp_enqueue_style( 'wp-lti-main', WP_LTI_URL . 'assets/css/main.css', array(), get_plugin_data( WP_LTI_FILE )['Version'] );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\admin_scripts' );

/**
 * Saves the options page settings.
 *
 * @return void
 */
function save_settings() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to do that.', 'wp-lti' ) );
	}

	// phpcs:ignore
	if ( ! \wp_verify_nonce( $_POST['_wpnonce'] ?? '', 'wp-lti-settings' ) ) {
		wp_die( esc_html__( 'Invalid nonce, please go back and try again.', 'wp-lti' ) );
	}

	// phpcs:ignore
	update_option( 'wp_lti', $_POST['wp_lti'] ?? array() );

	// phpcs:ignore
	wp_safe_redirect( home_url( $_POST['_wp_http_referer'] ) );
	exit;
}
add_action( 'admin_post_wp_lti_save_settings', __NAMESPACE__ . '\save_settings' );
