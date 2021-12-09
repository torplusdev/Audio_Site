<?php

if ( ! function_exists( 'resonator_core_add_sticky_header_options' ) ) {
	/**
	 * Function that add additional header layout global options
	 *
	 * @param object $page
	 * @param object $section
	 */
	function resonator_core_add_sticky_header_options( $page, $section ) {
		
		$sticky_section = $section->add_section_element(
			array(
				'name'       => 'qodef_sticky_header_section',
				'dependency' => array(
					'show' => array(
						'qodef_header_scroll_appearance' => array(
							'values'        => 'sticky',
							'default_value' => '',
						),
					),
				),
			)
		);
		
		$sticky_section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_sticky_header_appearance',
				'title'         => esc_html__( 'Sticky Header Appearance', 'resonator-core' ),
				'description'   => esc_html__( 'Select the appearance of sticky header when you scrolling the page', 'resonator-core' ),
				'options'       => array(
					'down' => esc_html__( 'Show Sticky on Scroll Down/Up', 'resonator-core' ),
					'up'   => esc_html__( 'Show Sticky on Scroll Up', 'resonator-core' ),
				),
				'default_value' => 'down',
			)
		);
		
		$sticky_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_sticky_header_skin',
				'title'       => esc_html__( 'Sticky Header Skin', 'resonator-core' ),
				'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'resonator-core' ),
				'options'     => array(
					'none'  => esc_html__( 'None', 'resonator-core' ),
					'light' => esc_html__( 'Light', 'resonator-core' ),
					'dark'  => esc_html__( 'Dark', 'resonator-core' ),
				),
			)
		);
		
		$sticky_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_scroll_amount',
				'title'       => esc_html__( 'Sticky Scroll Amount', 'resonator-core' ),
				'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'resonator-core' ),
				),
			)
		);
		
		$sticky_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_side_padding',
				'title'       => esc_html__( 'Sticky Header Side Padding', 'resonator-core' ),
				'description' => esc_html__( 'Enter side padding for sticky header area', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'resonator-core' ),
				),
			)
		);
		
		$sticky_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_sticky_header_background_color',
				'title'       => esc_html__( 'Sticky Header Background Color', 'resonator-core' ),
				'description' => esc_html__( 'Enter sticky header background color', 'resonator-core' ),
			)
		);
	}
	
	add_action( 'resonator_core_action_after_header_scroll_appearance_options_map', 'resonator_core_add_sticky_header_options', 10, 2 );
}

if ( ! function_exists( 'resonator_core_add_sticky_header_logo_options' ) ) {
	/**
	 * Function that add additional header logo options
	 *
	 * @param object $page
	 * @param array $header_tab
	 */
	function resonator_core_add_sticky_header_logo_options( $page, $header_tab ) {
		
		if ( $header_tab ) {
			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'resonator-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'resonator-core' ),
					'multiple'    => 'no'
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_header_logo_options_map', 'resonator_core_add_sticky_header_logo_options', 10, 2 );
}