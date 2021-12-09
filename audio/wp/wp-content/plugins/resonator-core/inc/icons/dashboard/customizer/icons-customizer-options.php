<?php

if ( ! function_exists( 'resonator_core_add_icons_customizer_options' ) ) {
	/**
	 * Function that add customizer options for this module
	 */
	function resonator_core_add_icons_customizer_options( $page ) {
	
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'section',
					'name'        => 'resonator_core_performance_icon_packs_section',
					'title'       => esc_html__( 'Icon Packs', 'resonator-core' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionality which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'resonator-core' )
				)
			);
			
			foreach ( glob( RESONATOR_CORE_INC_PATH . '/icons/*', GLOB_ONLYDIR ) as $icon_pack ) {
				$icon_pack_name = basename( $icon_pack );
				
				if ( $icon_pack_name !== 'dashboard' ) {
					$icon_pack_label = ucwords( str_replace( '-', ' ', $icon_pack_name ) );
					$icon_pack_name  = str_replace( '-', '_', $icon_pack_name );
					
					$page->add_field_element(
						array(
							'field_type'        => 'setting',
							'option_type'       => 'option',
							'name'              => "resonator_core_performance_icon_pack_{$icon_pack_name}",
							'default_value'     => false,
							'sanitize_callback' => 'sanitize_checkbox'
						)
					);
					
					$page->add_field_element(
						array(
							'field_type'  => 'control',
							'option_type' => 'checkbox',
							'section'     => 'resonator_core_performance_icon_packs_section',
							'settings'    => "resonator_core_performance_icon_pack_{$icon_pack_name}",
							'name'        => "resonator_core_performance_icon_pack_{$icon_pack_name}_control",
							'title'       => $icon_pack_label
						)
					);
				}
			}
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_icons_customizer_options', $page );
		}
	}
	
	add_action( 'resonator_core_action_performance_customizer_options', 'resonator_core_add_icons_customizer_options' );
}