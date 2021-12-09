<?php

if ( ! function_exists( 'resonator_core_add_podcast_list_variation_info_right' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_variation_info_right( $variations ) {
		
		$variations['info-right'] = esc_html__( 'Info Right', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_list_layouts', 'resonator_core_add_podcast_list_variation_info_right' );
}

if ( ! function_exists( 'resonator_core_add_podcast_list_options_info_right' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	
	function resonator_core_add_podcast_list_options_info_right( $options ) {
		$info_right_options   = array();
		$info_right_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_excerpt',
			'title'      => esc_html__( 'Enable Excerpt', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_right_options[] = array(
			'field_type' => 'text',
			'name'       => 'excerpt_length',
			'title'      => esc_html__( 'Excerpt Length', 'resonator-core' ),
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_right_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_share',
			'title'      => esc_html__( 'Enable Share', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_right_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_button',
			'title'      => esc_html__( 'Enable Read More button', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		
		return array_merge( $options, $info_right_options );
	}
	
	add_filter( 'resonator_core_filter_podcast_list_extra_options', 'resonator_core_add_podcast_list_options_info_right' );
	
}