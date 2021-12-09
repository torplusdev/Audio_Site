<?php

if ( ! function_exists( 'resonator_core_add_podcast_player_variation_info_bottom' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_player_variation_info_bottom( $variations ) {
		$variations['info-bottom'] = esc_html__( 'Info Bottom', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_player_layouts', 'resonator_core_add_podcast_player_variation_info_bottom' );
}