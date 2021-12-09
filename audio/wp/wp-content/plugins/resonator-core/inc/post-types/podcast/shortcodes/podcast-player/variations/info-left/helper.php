<?php

if ( ! function_exists( 'resonator_core_add_podcast_player_variation_info-left' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_player_variation_info( $variations ) {
		$variations['info-left'] = esc_html__( 'Info Left', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_player_layouts', 'resonator_core_add_podcast_player_variation_info' );
}