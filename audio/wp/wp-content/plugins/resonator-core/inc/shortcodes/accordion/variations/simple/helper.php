<?php

if ( ! function_exists( 'resonator_core_add_accordion_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_accordion_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_accordion_layouts', 'resonator_core_add_accordion_variation_simple' );
}
