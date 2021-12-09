<?php

if ( ! function_exists( 'resonator_core_add_podcast_item_list_meta_boxes' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function resonator_core_add_podcast_item_list_meta_boxes( $page ) {

		if ( $page ) {

			$list_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-list',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'List Settings', 'resonator-core' ),
					'description' => esc_html__( 'Podcast list settings', 'resonator-core' )
				)
			);

			$list_tab->add_field_element( array(
				'field_type'  => 'image',
				'name'        => 'qodef_podcast_list_image',
				'title'       => esc_html__( 'Podcast List Image', 'resonator-core' ),
				'description' => esc_html__( 'Upload image to be displayed on podcast list instead of featured image', 'resonator-core' ),
			) );
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_podcast_list_meta_box_map', $list_tab );
		}
	}

	add_action( 'resonator_core_action_after_podcast_meta_box_map', 'resonator_core_add_podcast_item_list_meta_boxes' );
}