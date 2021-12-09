<?php

if ( ! function_exists( 'resonator_core_filter_clients_list_image_only_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_filter_clients_list_image_only_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_clients_list_image_only_animation_options', 'resonator_core_filter_clients_list_image_only_fade_in' );
}