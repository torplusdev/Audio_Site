<?php

if ( ! function_exists( 'resonator_core_add_podcast_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_variation_info_below( $variations ) {
		
		$variations['info-below'] = esc_html__( 'Info Below', 'resonator-core' );
		
		return $variations;
	}
	
	add_filter( 'resonator_core_filter_podcast_list_layouts', 'resonator_core_add_podcast_list_variation_info_below' );
}

if ( ! function_exists( 'resonator_core_add_podcast_list_options_info_below' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_options_info_below( $options ) {
		$info_below_options   = array();
		$margin_option        = array(
			'field_type' => 'text',
			'name'       => 'info_below_content_margin_top',
			'title'      => esc_html__( 'Content Top Margin', 'resonator-core' ),
			'dependency' => array(
				'show' => array(
					'layout' => array(
						'values'        => 'info-below',
						'default_value' => ''
					)
				)
			),
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_image',
			'title'      => esc_html__( 'Show Image', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'yes_no', false ),
			'default_value' => 'yes',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_excerpt',
			'title'      => esc_html__( 'Enable Excerpt', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = array(
			'field_type' => 'text',
			'name'       => 'excerpt_length',
			'title'      => esc_html__( 'Excerpt Length', 'resonator-core' ),
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_share',
			'title'      => esc_html__( 'Enable Share', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = array(
			'field_type' => 'select',
			'name'       => 'enable_button',
			'title'      => esc_html__( 'Enable Read More button', 'resonator-core' ),
			'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
			'default_value' => 'no',
			'group'      => esc_html__( 'Layout', 'resonator-core' )
		);
		$info_below_options[] = $margin_option;
		
		return array_merge( $options, $info_below_options );
	}
	
	add_filter( 'resonator_core_filter_podcast_list_extra_options', 'resonator_core_add_podcast_list_options_info_below' );
}