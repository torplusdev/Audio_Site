<?php

if ( ! function_exists( 'resonator_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function resonator_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'resonator-core' );

		return $options;
	}

	add_filter( 'resonator_core_filter_header_scroll_appearance_option', 'resonator_core_add_fixed_header_option' );
}