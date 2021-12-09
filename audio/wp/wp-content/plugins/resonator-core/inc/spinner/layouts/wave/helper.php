<?php

if ( ! function_exists( 'resonator_core_add_wave_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function resonator_core_add_wave_spinner_layout_option( $layouts ) {
		$layouts['wave'] = esc_html__( 'Wave', 'resonator-core' );
		
		return $layouts;
	}
	
	add_filter( 'resonator_core_filter_page_spinner_layout_options', 'resonator_core_add_wave_spinner_layout_option' );
}