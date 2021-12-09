<?php

if ( ! function_exists( 'resonator_core_add_top_area_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function resonator_core_add_top_area_options( $page, $general_header_tab ) {

		$top_area_section = $general_header_tab->add_section_element(
			array(
				'name'        => 'qodef_top_area_section',
				'title'       => esc_html__( 'Top Area', 'resonator-core' ),
				'description' => esc_html__( 'Options related to top area', 'resonator-core' ),
				'dependency'  => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => resonator_core_dependency_for_top_area_options(),
							'default_value' => apply_filters( 'resonator_core_filter_header_layout_default_option_value', '' )
						)
					)
				)
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_top_area_header',
				'title'         => esc_html__( 'Top Area', 'resonator-core' ),
				'description'   => esc_html__( 'Enable top area', 'resonator-core' )
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'resonator-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'resonator-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			)
		);

        $top_area_options_section -> add_field_element (
            array (
                'field_type'    => 'yesno',
                'name'          => 'qodef_top_area_header_in_grid',
                'title'         => esc_html__ ( 'Content in Grid', 'behold-core' ),
                'description'   => esc_html__ ( 'Set content to be in grid', 'behold-core' ),
                'default_value' => 'no',
            )
        );

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'resonator-core' ),
				'description' => esc_html__( 'Choose top area background color', 'resonator-core' )
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'resonator-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'resonator-core' )
				)
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'resonator-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'resonator-core' )
				)
			)
		);
	}

	add_action( 'resonator_core_action_after_header_options_map', 'resonator_core_add_top_area_options', 20, 2 );
}