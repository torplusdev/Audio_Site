<?php

if ( ! function_exists( 'resonator_core_add_admin_user_options' ) ) {
	/**
	 * Function that add global user options
	 */
	function resonator_core_add_admin_user_options() {
		$qode_framework = qode_framework_get_framework_root();
		$roles_social_scope = apply_filters( 'resonator_core_filter_role_social_array', array( 'administrator', 'author' ));
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => $roles_social_scope,
				'type'  => 'user',
				'title' => esc_html__( 'Social Networks', 'resonator-core' ),
				'slug'  => 'admin-options',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_facebook',
					'title'       => esc_html__( 'Facebook', 'resonator-core' ),
					'description' => esc_html__( 'Enter user Facebook profile URL', 'resonator-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_instagram',
					'title'       => esc_html__( 'Instagram', 'resonator-core' ),
					'description' => esc_html__( 'Enter user Instagram profile URL', 'resonator-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_twitter',
					'title'       => esc_html__( 'Twitter', 'resonator-core' ),
					'description' => esc_html__( 'Enter user Twitter profile URL', 'resonator-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_linkedin',
					'title'       => esc_html__( 'LinkedIn', 'resonator-core' ),
					'description' => esc_html__( 'Enter user LinkedIn profile URL', 'resonator-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_pinterest',
					'title'       => esc_html__( 'Pinterest', 'resonator-core' ),
					'description' => esc_html__( 'Enter user Pinterest profile URL', 'resonator-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_admin_user_options_map', $page );
		}
	}
	
	add_action( 'resonator_core_action_register_role_custom_fields', 'resonator_core_add_admin_user_options' );
}