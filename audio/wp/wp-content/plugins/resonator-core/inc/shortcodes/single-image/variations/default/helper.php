<?php

if ( ! function_exists( 'resonator_core_add_single_image_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_single_image_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'resonator-core' );

		return $variations;
	}

	add_filter( 'resonator_core_filter_single_image_layouts', 'resonator_core_add_single_image_variation_default' );
}
