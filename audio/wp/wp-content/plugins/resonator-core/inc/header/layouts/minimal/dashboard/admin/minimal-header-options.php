<?php

if ( ! function_exists( 'resonator_core_add_minimal_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function resonator_core_add_minimal_header_options( $page, $general_header_tab ) {
		
		$section = $general_header_tab->add_section_element(
			array(
				'name'       => 'qodef_minimal_header_section',
				'title'      => esc_html__( 'Minimal Header', 'resonator-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'minimal',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'yesno',
				'name'        => 'qodef_minimal_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'resonator-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'resonator-core' ),
				'default_value' => 'no',
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_height',
				'title'       => esc_html__( 'Header Height', 'resonator-core' ),
				'description' => esc_html__( 'Enter header height', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'resonator-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'resonator-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'resonator-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_minimal_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'resonator-core' ),
				'description' => esc_html__( 'Enter header background color', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'resonator-core' )
				)
			)
		);

	}
	
	add_action( 'resonator_core_action_after_header_options_map', 'resonator_core_add_minimal_header_options', 10, 2 );
}