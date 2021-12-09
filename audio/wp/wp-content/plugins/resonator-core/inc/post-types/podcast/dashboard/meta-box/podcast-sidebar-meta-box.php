<?php

if ( ! function_exists( 'resonator_core_add_podcast_single_sidebar_meta_boxes' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function resonator_core_add_podcast_single_sidebar_meta_boxes( $page ) {
		
		if ( $page ) {
			
			$sidebar_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-sidebar',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Sidebar Settings', 'resonator-core' ),
					'description' => esc_html__( 'Podcast sidebar settings', 'resonator-core' )
				)
			);
			
			$sidebar_tab->add_field_element(
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
				$sidebar_tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_podcast_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'resonator-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on podcast singles', 'resonator-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$sidebar_tab->add_field_element(
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
	
	add_action( 'resonator_core_action_after_podcast_meta_box_map', 'resonator_core_add_podcast_single_sidebar_meta_boxes', 12 );
}