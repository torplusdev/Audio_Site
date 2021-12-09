<?php

if ( ! function_exists( 'resonator_core_register_fullscreen_search_layout' ) ) {
	/**
	 * Function that add variation layout into global list
	 *
	 * @param array $search_layouts
	 *
	 * @return array
	 */
	function resonator_core_register_fullscreen_search_layout( $search_layouts ) {
		$search_layout = array(
			'fullscreen' => 'FullscreenSearch'
		);

		$search_layouts = array_merge( $search_layouts, $search_layout );

		return $search_layouts;
	}

	add_filter( 'resonator_core_filter_register_search_layouts', 'resonator_core_register_fullscreen_search_layout');
}