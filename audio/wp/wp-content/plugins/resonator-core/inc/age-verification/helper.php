<?php

if ( ! function_exists( 'resonator_core_get_age_verification' ) ) {
	/**
	 * Loads age-verification HTML
	 */
	function resonator_core_get_age_verification() {
		if ( resonator_core_get_post_value_through_levels( 'qodef_enable_age_verification' ) === 'yes' ) {
			resonator_core_load_age_verification_template();
		}
	}
	
	// Get age-verification HTML
	add_action( 'resonator_action_before_page_header', 'resonator_core_get_age_verification' );
}

if ( ! function_exists( 'resonator_core_body_class_age_verification' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function resonator_core_body_class_age_verification( $classes ) {
		if ( ! isset( $_COOKIE['disabledAgeVerification'] ) ) {
			$classes[] = 'qodef-age-verification--opened';
		}
		
		return $classes;
	}
	
	// Add plugin's body classes
	add_filter( 'body_class', 'resonator_core_body_class_age_verification' );
}

if ( ! function_exists( 'resonator_core_age_verification_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function resonator_core_age_verification_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'age-verification' ) {
			$position = 98;
		}
		
		return $position;
	}
	
	add_filter( 'resonator_core_filter_admin_options_map_position', 'resonator_core_age_verification_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'resonator_core_load_age_verification_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function resonator_core_load_age_verification_template() {
		$logo_image = resonator_core_get_option_value( 'admin', 'qodef_age_verification_logo_image' );
		
		$params                     = array();
		$params['logo_image']       = ! empty( $logo_image ) ? $logo_image : resonator_core_get_post_value_through_levels( 'qodef_logo_main' );
		$params['title']            = resonator_core_get_option_value( 'admin', 'qodef_age_verification_title' );
		$params['subtitle']         = resonator_core_get_option_value( 'admin', 'qodef_age_verification_subtitle' );
		$params['note']             = resonator_core_get_option_value( 'admin', 'qodef_age_verification_note' );
		$params['link']             = resonator_core_get_option_value( 'admin', 'qodef_age_verification_link' );
		$background_image           = resonator_core_get_option_value( 'admin', 'qodef_age_verification_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['prevent_behavior'] = resonator_core_get_option_value( 'admin', 'qodef_age_verification_prevent_behavior' );
		
		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-prevent--' . $params['prevent_behavior'] : 'qodef-prevent--cookies';
		$params['holder_classes'] = implode( ' ', $holder_classes );
		
		echo resonator_core_get_template_part( 'age-verification', 'templates/age-verification', '', $params );
	}
}