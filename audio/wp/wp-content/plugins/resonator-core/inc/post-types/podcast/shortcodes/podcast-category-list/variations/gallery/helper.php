<?php

if ( ! function_exists( 'resonator_core_add_podcast_category_list_variation_gallery' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_category_list_variation_gallery( $variations ) {
		$variations['gallery'] = esc_html__( 'Gallery', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_category_list_layouts', 'resonator_core_add_podcast_category_list_variation_gallery' );
}
