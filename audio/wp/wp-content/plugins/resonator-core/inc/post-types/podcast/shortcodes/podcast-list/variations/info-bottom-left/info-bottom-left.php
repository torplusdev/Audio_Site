<?php

if ( ! function_exists( 'resonator_core_add_podcast_list_variation_info_bottom_left' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_variation_info_bottom_left( $variations ) {
		
		$variations['info-bottom-left'] = esc_html__( 'Info Bottom Left', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_list_layouts', 'resonator_core_add_podcast_list_variation_info_bottom_left' );
}