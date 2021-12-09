<?php

if ( ! function_exists( 'resonator_core_nav_menu_meta_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function resonator_core_nav_menu_meta_options( $page ) {
		
		if ( $page ) {
			
			$section = $page->add_section_element(
				array(
					'name'  => 'qodef_nav_menu_section',
					'title' => esc_html__( 'Main Menu', 'resonator-core' )
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_dropdown_top_position',
					'title'       => esc_html__( 'Dropdown Position', 'resonator-core' ),
					'description' => esc_html__( 'Enter value in percentage of entire header height', 'resonator-core' ),
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_page_header_meta_map', 'resonator_core_nav_menu_meta_options' );
}