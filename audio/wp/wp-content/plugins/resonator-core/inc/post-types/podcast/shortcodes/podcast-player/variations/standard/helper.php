<?php

if ( ! function_exists( 'resonator_core_add_podcast_player_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_player_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'resonator-core' );

		return $variations;
	}

	add_filter( 'resonator_core_filter_podcast_player_layouts', 'resonator_core_add_podcast_player_variation_standard' );
}
