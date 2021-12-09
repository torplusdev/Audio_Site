<?php

if ( ! function_exists( 'resonator_core_add_author_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_author_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_author_list_layouts', 'resonator_core_add_author_list_variation_info_below' );
}
