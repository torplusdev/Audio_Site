<?php

if ( ! function_exists( 'resonator_core_add_widgets_customizer_options' ) ) {
	/**
	 * Function that add customizer options for this module
	 */
	function resonator_core_add_widgets_customizer_options( $page ) {
	
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'section',
					'name'        => 'resonator_core_performance_widgets_section',
					'title'       => esc_html__( 'Widgets', 'resonator-core' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionality which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'resonator-core' )
				)
			);
			
			foreach ( glob( RESONATOR_CORE_INC_PATH . '/widgets/*', GLOB_ONLYDIR ) as $widget ) {
				$widget_name = basename( $widget );
				
				if ( $widget_name !== 'dashboard' ) {
					$widget_label = ucwords( str_replace( '-', ' ', $widget_name ) );
					$widget_name  = str_replace( '-', '_', $widget_name );
					
					$page->add_field_element(
						array(
							'field_type'        => 'setting',
							'option_type'       => 'option',
							'name'              => "resonator_core_performance_widget_{$widget_name}",
							'default_value'     => false,
							'sanitize_callback' => 'sanitize_checkbox'
						)
					);
					
					$page->add_field_element(
						array(
							'field_type'  => 'control',
							'option_type' => 'checkbox',
							'section'     => 'resonator_core_performance_widgets_section',
							'settings'    => "resonator_core_performance_widget_{$widget_name}",
							'name'        => "resonator_core_performance_widget_{$widget_name}_control",
							'title'       => $widget_label
						)
					);
				}
			}
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_widgets_customizer_options', $page );
		}
	}
	
	add_action( 'resonator_core_action_performance_customizer_options', 'resonator_core_add_widgets_customizer_options' );
}