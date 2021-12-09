<?php

if ( ! function_exists( 'resonator_core_register_standard_with_breadcrumbs_title_layout' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $layouts
	 *
	 * @return array
	 */
	function resonator_core_register_standard_with_breadcrumbs_title_layout( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = 'ResonatorCoreStandardWithBreadcrumbsTitle';

		return $layouts;
	}

	add_filter( 'resonator_core_filter_register_title_layouts', 'resonator_core_register_standard_with_breadcrumbs_title_layout' );
}

if ( ! function_exists( 'resonator_core_add_standard_with_breadcrumbs_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function resonator_core_add_standard_with_breadcrumbs_title_layout_option( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = esc_html__( 'Standard with breadcrumbs', 'resonator-core' );

		return $layouts;
	}

	add_filter( 'resonator_core_filter_title_layout_options', 'resonator_core_add_standard_with_breadcrumbs_title_layout_option' );
}

