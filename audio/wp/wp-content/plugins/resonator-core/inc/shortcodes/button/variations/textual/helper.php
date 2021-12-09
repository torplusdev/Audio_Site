<?php

if ( ! function_exists( 'resonator_core_add_button_variation_textual' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_button_variation_textual( $variations ) {
		$variations['textual'] = esc_html__( 'Textual', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_button_layouts', 'resonator_core_add_button_variation_textual' );
}
