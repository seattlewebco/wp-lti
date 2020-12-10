<?php
/**
 * Settings tabs template.
 *
 * @package SeattleWebCo\WP-LTI
 */

?>

<div class="wp-lti-tabs">
	<?php
		array_walk(
			$args['tabs'],
			function( $label, $key ) use ( $args ) {
				$class    = ( ! $args['current_tab'] && $args['default_tab'] === $key ) || ( $args['current_tab'] === $key ) ? 'active' : '';
				$endpoint = add_query_arg(
					array(
						'page' => 'wp-lti',
						'tab'  => $key,
					),
					admin_url( 'options-general.php' )
				);

				printf( '<a href="%s" class="wp-lti-tab %s">%s</a>', esc_url( $endpoint ), esc_attr( $class ), esc_html( $label ) );
			}
		);
		?>
</div>
