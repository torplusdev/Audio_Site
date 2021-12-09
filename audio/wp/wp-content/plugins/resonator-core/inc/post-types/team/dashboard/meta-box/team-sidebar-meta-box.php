<?php

if ( ! function_exists( 'resonator_core_add_team_single_sidebar_meta_boxes' ) ) {
	/**
	 * Function that add sidebar meta boxes for team single module
	 */
	function resonator_core_add_team_single_sidebar_meta_boxes( $page, $has_single ) {
		
		if ( $page && $has_single ) {
			$section = $page->add_section_element(
				array(
					'name'       => 'qodef_team_sidebar_section',
					'title'      => esc_html__( 'Sidebar Settings', 'resonator-core' )
				)
			);
			$section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_team_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'resonator-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for team singles', 'resonator-core' ),
					'default_value' => '',
					'options'       => resonator_core_get_select_type_options_pool( 'sidebar_layouts' )
				)
			);
			
			$custom_sidebars = resonator_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$section->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_team_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'resonator-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on team singles', 'resonator-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'resonator-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'resonator-core' ),
					'options'     => resonator_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_team_meta_box_map', 'resonator_core_add_team_single_sidebar_meta_boxes', 10, 2 );
}
