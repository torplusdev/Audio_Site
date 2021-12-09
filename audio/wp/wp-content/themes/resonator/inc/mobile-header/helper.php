<?php

if ( ! function_exists( 'resonator_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function resonator_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'resonator_filter_mobile_header_template', resonator_get_template_part( 'mobile-header', 'templates/mobile-header' ) );
	}

	add_action( 'resonator_action_page_header_template', 'resonator_load_page_mobile_header' );
}

if ( ! function_exists( 'resonator_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function resonator_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'resonator_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'resonator' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'resonator_action_after_include_modules', 'resonator_register_mobile_navigation_menus' );
}
