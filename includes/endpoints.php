<?php
/**
 * Endpoint functions.
 *
 * @package SeattleWebCo\WP-LTI
 */

namespace SeattleWebCo\WP_LTI;

/**
 * Launch request endpoint.
 *
 * @return string
 */
function launch_request() {
	if ( isset( $_REQUEST['ltilogin'] ) ) {
		return;
    }

    var_dump( $_SERVER['REQUEST_METHOD'] );
    var_dump( $_REQUEST );
    exit;

	parse_str( file_get_contents( 'php://input' ), $request );

	$request = wp_parse_args( $request,
		array(
			'context_id'                             => '',
			'context_label'                          => '',
			'context_title'                          => '',
			'context_type'                           => '',
			'custom_context_memberships_url'         => '',
			'custom_context_setting_url'             => '',
			'custom_lineitem_url'                    => '',
			'custom_lineitems_url'                   => '',
			'custom_link_memberships_url'            => '',
			'custom_link_setting_url'                => '',
			'custom_result_url'                      => '',
			'custom_results_url'                     => '',
			'custom_system_setting_url'              => '',
			'custom_tc_profile_url'                  => '',
			'ext_ims_lis_basic_outcome_url'          => '',
			'ext_ims_lis_memberships_id'             => '',
			'ext_ims_lis_memberships_url'            => '',
			'ext_ims_lis_resultvalue_sourcedids'     => '',
			'ext_ims_lti_tool_setting_id'            => '',
			'ext_ims_lti_tool_setting_url'           => '',
			'launch_presentation_css_url'            => '',
			'launch_presentation_document_target'    => '',
			'launch_presentation_locale'             => '',
			'launch_presentation_return_url'         => '',
			'lis_course_offering_sourcedid'          => '',
			'lis_course_section_sourcedid'           => '',
			'lis_outcome_service_url'                => '',
			'lis_person_contact_email_primary'       => '',
			'lis_person_name_family'                 => '',
			'lis_person_name_full'                   => '',
			'lis_person_name_given'                  => '',
			'lis_person_sourcedid'                   => '',
			'lis_result_sourcedid'                   => '',
			'lti_message_type'                       => 'basic-lti-launch-request',
			'lti_version'                            => 'LTI-1p0',
			'oauth_callback'                         => '',
			'oauth_consumer_key'                     => '',
			'oauth_nonce'                            => '',
			'oauth_signature'                        => '',
			'oauth_signature_method'                 => '',
			'oauth_timestamp'                        => '',
			'oauth_version'                          => '',
			'resource_link_description'              => '',
			'resource_link_id'                       => '',
			'resource_link_title'                    => '',
			'roles'                                  => '',
			'tool_consumer_info_product_family_code' => '',
			'tool_consumer_info_version'             => '',
			'tool_consumer_instance_contact_email'   => '',
			'tool_consumer_instance_description'     => '',
			'tool_consumer_instance_guid'            => '',
			'tool_consumer_instance_name'            => '',
			'tool_consumer_instance_url'             => '',
			'user_id'                                => '',
			'user_image'                             => '',
		)
	);

	var_dump( $request );
	exit;
}
add_action( 'template_redirect', __NAMESPACE__ . '\launch_request' );
