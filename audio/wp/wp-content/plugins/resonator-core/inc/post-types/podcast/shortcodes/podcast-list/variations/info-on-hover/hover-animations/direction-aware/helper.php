<?php

if ( ! function_exists( 'resonator_core_filter_podcast_list_info_on_hover_direction_aware' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_filter_podcast_list_info_on_hover_direction_aware( $variations ) {
		$variations['direction-aware'] = esc_html__( 'Direction Aware', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_list_info_on_hover_animation_options', 'resonator_core_filter_podcast_list_info_on_hover_direction_aware' );
}

if ( ! function_exists( 'resonator_core_include_hoverdir_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param array $atts
	 */
	function resonator_core_include_hoverdir_scripts( $atts ) {
		
		if ( $atts['layout'] == 'info-on-hover' && $atts['hover_animation_info-on-hover'] == 'direction-aware' ) {
			wp_enqueue_script( 'hoverdir' );
		}
	}
	
	add_action( 'resonator_core_action_podcast_list_load_assets', 'resonator_core_include_hoverdir_scripts' );
}

if ( ! function_exists( 'resonator_core_register_hoverdir_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function resonator_core_register_hoverdir_scripts( $scripts ) {

		$scripts['hoverdir'] = array(
			'registered'	=> false,
			'url'			=> RESONATOR_CORE_INC_URL_PATH . '/post-types/podcast/shortcodes/podcast-list/variations/info-on-hover/hover-animations/direction-aware/assets/js/plugins/jquery.hoverdir.min.js',
			'dependency'	=> array( 'jquery' )
		);

		return $scripts;
	}

	add_filter( 'resonator_core_filter_podcast_list_register_assets', 'resonator_core_register_hoverdir_scripts' );
}