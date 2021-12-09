<?php

if ( ! function_exists( 'resonator_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_icon_with_text_layouts', 'resonator_core_add_icon_with_text_variation_before_title' );
}
