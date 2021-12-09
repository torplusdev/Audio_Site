<?php

if ( ! function_exists( 'resonator_core_add_podcast_list_variation_info_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_variation_info_on_hover( $variations ) {
		
		$variations['info-on-hover'] = esc_html__( 'Info On Hover', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_list_layouts', 'resonator_core_add_podcast_list_variation_info_on_hover' );
}