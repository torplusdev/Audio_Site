<?php

if ( ! function_exists( 'resonator_core_add_image_with_text_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_image_with_text_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_image_with_text_layouts', 'resonator_core_add_image_with_text_variation_text_below' );
}
