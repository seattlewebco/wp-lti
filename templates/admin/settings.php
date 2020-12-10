<?php
/**
 * Settings template.
 *
 * @package SeattleWebCo\WP-LTI
 */

use function SeattleWebCo\WP_LTI\get_template;

?>

<div class="wrap">
	<h1><?php esc_html_e( 'WordPress Learning Tools Interoperability (LTI)', 'wp-lti' ); ?></h1>

	<?php get_template( 'admin/tabs.php', $args ); ?>

	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<table class="form-table" role="presentation">
			<tbody>
				<tr>
					<th scope="row">
						<label for="integrations"><?php esc_html_e( 'Enabled Integrations', 'wp-lti' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text"><span><?php esc_html_e( 'Integrations', 'wp-lti' ); ?></span></legend>
							<label for="integrations_canvas">
								<input 
									name="wp_lti[general][integrations][]" 
									type="checkbox" 
									id="integrations_canvas" 
									value="canvas" 
									<?php checked( true, in_array( 'canvas', $args['settings']['general']['integrations'] ?? array(), true ) ); ?> 
								/>
								<?php esc_html_e( 'Canvas', 'wp-lti' ); ?>
							</label><br>
							<label for="integrations_blackboard">
								<input 
									name="wp_lti[general][integrations][]" 
									type="checkbox" 
									id="integrations_blackboard" 
									value="blackboard"
									<?php checked( true, in_array( 'blackboard', $args['settings']['general']['integrations'] ?? array(), true ) ); ?>  
								/>
								<?php esc_html_e( 'Blackboard', 'wp-lti' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>	
		<input type="hidden" name="action" value="wp_lti_save_settings" />
		<?php wp_nonce_field( 'wp-lti-settings' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
