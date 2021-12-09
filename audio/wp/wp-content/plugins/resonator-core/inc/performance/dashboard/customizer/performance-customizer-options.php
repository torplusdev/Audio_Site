<?php

if ( ! function_exists( 'resonator_core_add_performance_customizer_options' ) ) {
	/**
	 * Function that add customizer options for this module
	 */
	function resonator_core_add_performance_customizer_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'type' => 'customizer',
			)
		);
	
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'panel',
					'name'        => 'resonator_core_performance_panel',
					'priority'    => 250,
					'title'       => esc_html__( 'Qode Performance', 'resonator-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_performance_customizer_options', $page );
		}
	}
	
	add_action( 'qode_framework_action_customizer_resonator_core_performance_panel', 'resonator_core_add_performance_customizer_options' );
}