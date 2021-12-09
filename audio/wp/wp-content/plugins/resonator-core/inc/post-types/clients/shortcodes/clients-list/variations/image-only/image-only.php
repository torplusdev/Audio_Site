<?php

if ( ! function_exists( 'resonator_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_clients_list_layouts', 'resonator_core_add_clients_list_variation_image_only' );
}