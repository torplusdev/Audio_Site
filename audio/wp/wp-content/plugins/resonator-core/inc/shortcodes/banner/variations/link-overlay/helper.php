<?php

if ( ! function_exists( 'resonator_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_banner_layouts', 'resonator_core_add_banner_variation_link_overlay' );
}
