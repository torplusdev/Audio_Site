<?php

if ( ! function_exists( 'resonator_core_add_podcast_archive_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for podcast archive module
	 */
	function resonator_core_add_podcast_archive_sidebar_options( $tab ) {
		
		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_podcast_archive_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'resonator-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for podcast archives', 'resonator-core' ),
					'default_value' => 'no-sidebar',
					'options'       => resonator_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);
			
			$custom_sidebars = resonator_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_podcast_archive_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'resonator-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on podcast archives', 'resonator-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_podcast_archive_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'resonator-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'resonator-core' ),
					'options'     => resonator_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_podcast_options_archive', 'resonator_core_add_podcast_archive_sidebar_options' );
}

if ( ! function_exists( 'resonator_core_add_podcast_single_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for podcast single module
	 */
	function resonator_core_add_podcast_single_sidebar_options( $tab ) {
		
		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_podcast_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'resonator-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for podcast singles', 'resonator-core' ),
					'default_value' => 'no-sidebar',
					'options'       => resonator_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);
			
			$custom_sidebars = resonator_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_podcast_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'resonator-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on podcast singles', 'resonator-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_podcast_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'resonator-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'resonator-core' ),
					'options'     => resonator_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_podcast_options_single', 'resonator_core_add_podcast_single_sidebar_options' );
}