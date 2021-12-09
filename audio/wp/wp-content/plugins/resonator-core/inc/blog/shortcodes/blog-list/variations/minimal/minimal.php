<?php

if ( ! function_exists( 'resonator_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_blog_list_layouts', 'resonator_core_add_blog_list_variation_minimal' );
}