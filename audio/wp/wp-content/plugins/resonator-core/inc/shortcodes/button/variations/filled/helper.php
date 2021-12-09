<?php

if ( ! function_exists( 'resonator_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_button_layouts', 'resonator_core_add_button_variation_filled' );
}
