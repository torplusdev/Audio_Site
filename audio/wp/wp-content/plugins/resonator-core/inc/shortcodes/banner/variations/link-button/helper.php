<?php

if ( ! function_exists( 'resonator_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_banner_layouts', 'resonator_core_add_banner_variation_link_button' );
}
