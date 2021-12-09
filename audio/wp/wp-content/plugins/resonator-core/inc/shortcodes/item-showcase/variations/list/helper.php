<?php

if ( ! function_exists( 'resonator_core_add_item_showcase_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_item_showcase_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_item_showcase_layouts', 'resonator_core_add_item_showcase_variation_list' );
}
