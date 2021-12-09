<?php

if ( ! function_exists( 'resonator_core_add_pulse_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function resonator_core_add_pulse_spinner_layout_option( $layouts ) {
		$layouts['pulse'] = esc_html__( 'Pulse', 'resonator-core' );
		
		return $layouts;
	}
	
	add_filter( 'resonator_core_filter_page_spinner_layout_options', 'resonator_core_add_pulse_spinner_layout_option' );
}

if ( ! function_exists( 'resonator_core_set_pulse_spinner_layout_as_default_option' ) ) {
	/**
	 * Function that set default value for page spinner layout options map
	 *
	 * @param string $default_value
	 *
	 * @return string
	 */
	function resonator_core_set_pulse_spinner_layout_as_default_option( $default_value ) {
		return 'pulse';
	}
	
	add_filter( 'resonator_core_filter_page_spinner_default_layout_option', 'resonator_core_set_pulse_spinner_layout_as_default_option' );
}