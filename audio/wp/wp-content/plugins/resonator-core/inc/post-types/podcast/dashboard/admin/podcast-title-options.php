<?php

if ( ! function_exists( 'resonator_core_add_podcast_title_options' ) ) {
	/**
	 * Function that add title options for podcast module
	 */
	function resonator_core_add_podcast_title_options( $tab ) {
		
		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_podcast_title',
					'title'         => esc_html__( 'Enable Title on Podcast Single', 'resonator-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable podcast single title', 'resonator-core' ),
					'options'       => resonator_core_get_select_type_options_pool( 'yes_no' )
				)
			);
			
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_podcast_title_area_in_grid',
					'title'         => esc_html__( 'Podcast Title in Grid', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will set podcast title area to be in grid', 'resonator-core' ),
					'options'       => resonator_core_get_select_type_options_pool( 'yes_no' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_podcast_options_single', 'resonator_core_add_podcast_title_options' );
}