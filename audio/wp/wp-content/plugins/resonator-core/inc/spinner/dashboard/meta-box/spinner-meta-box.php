<?php

if ( ! function_exists( 'resonator_core_add_page_spinner_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function resonator_core_add_page_spinner_meta_box( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_spinner',
					'title'       => esc_html__( 'Enable Page Spinner', 'resonator-core' ),
					'description' => esc_html__( 'Enable Page Spinner Effect', 'resonator-core' ),
					'options'     => resonator_core_get_select_type_options_pool( 'yes_no' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_general_page_meta_box_map', 'resonator_core_add_page_spinner_meta_box', 9 );
}