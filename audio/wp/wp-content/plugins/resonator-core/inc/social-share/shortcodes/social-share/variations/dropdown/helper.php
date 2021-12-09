<?php

if ( ! function_exists( 'resonator_core_add_social_share_variation_dropdown' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_social_share_variation_dropdown( $variations ) {
		$variations['dropdown'] = esc_html__( 'Dropdown', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_social_share_layouts', 'resonator_core_add_social_share_variation_dropdown' );
}
