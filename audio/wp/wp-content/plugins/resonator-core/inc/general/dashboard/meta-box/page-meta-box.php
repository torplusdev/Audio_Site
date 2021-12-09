<?php

if ( ! function_exists( 'resonator_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function resonator_core_add_general_page_meta_box( $page ) {

		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'resonator-core' ),
				'description' => esc_html__( 'General page layout settings', 'resonator-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_custom_css_class',
				'title'       => esc_html__( 'Page Custom CSS Class', 'mellifera-core' ),
				'description' => esc_html__( 'Set custom CSS Class to body tag', 'mellifera-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'resonator-core' ),
				'description' => esc_html__( 'Set background color', 'resonator-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'resonator-core' ),
				'description' => esc_html__( 'Set background image', 'resonator-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Image Repeat', 'resonator-core' ),
				'description' => esc_html__( 'Set background image repeat', 'resonator-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'resonator-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'resonator-core' ),
					'repeat'    => esc_html__( 'Repeat', 'resonator-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'resonator-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'resonator-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Image Size', 'resonator-core' ),
				'description' => esc_html__( 'Set background image size', 'resonator-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'resonator-core' ),
					'contain' => esc_html__( 'Contain', 'resonator-core' ),
					'cover'   => esc_html__( 'Cover', 'resonator-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Image Attachment', 'resonator-core' ),
				'description' => esc_html__( 'Set background image attachment', 'resonator-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'resonator-core' ),
					'fixed'  => esc_html__( 'Fixed', 'resonator-core' ),
					'scroll' => esc_html__( 'Scroll', 'resonator-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'resonator-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'resonator-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'resonator-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'resonator-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'resonator-core' ),
				'description'   => esc_html__( 'Set boxed layout', 'resonator-core' ),
				'default_value' => '',
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'resonator-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'resonator-core' ),
				'description' => esc_html__( 'Set boxed background color', 'resonator-core' )
			)
		);

        $boxed_section->add_field_element(
            array(
                'field_type'  => 'image',
                'name'        => 'qodef_boxed_background_pattern',
                'title'       => esc_html__( 'Boxed Background Pattern', 'resonator-core' ),
                'description' => esc_html__( 'Set boxed background pattern', 'resonator-core' )
            )
        );

        $boxed_section->add_field_element(
            array(
                'field_type'  => 'select',
                'name'        => 'qodef_boxed_background_pattern_behavior',
                'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'resonator-core' ),
                'description' => esc_html__( 'Set boxed background pattern behavior', 'resonator-core' ),
                'options'     => array(
                    ''       => esc_html__( 'Default', 'resonator-core' ),
                    'fixed'  => esc_html__( 'Fixed', 'resonator-core' ),
                    'scroll' => esc_html__( 'Scroll', 'resonator-core' )
                ),
            )
        );

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'resonator-core' ),
				'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'resonator-core' ),
				'default_value' => '',
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'resonator-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'resonator-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'resonator-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'resonator-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'resonator-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'resonator-core' )
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'resonator-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'resonator-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'resonator-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'resonator-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'resonator-core' ),
				'options'     => resonator_core_get_select_type_options_pool( 'content_width' )
			)
		);

		$general_tab->add_field_element( array(
			'field_type'    => 'yesno',
			'default_value' => 'no',
			'name'          => 'qodef_content_behind_header',
			'title'         => esc_html__( 'Always put content behind header', 'resonator-core' ),
			'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'resonator-core' ),
		) );

		// Hook to include additional options after module options
		do_action( 'resonator_core_action_after_general_page_meta_box_map', $general_tab );
	}

	add_action( 'resonator_core_action_after_general_meta_box_map', 'resonator_core_add_general_page_meta_box', 9 );
}

if ( ! function_exists( 'resonator_core_add_general_page_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function resonator_core_add_general_page_meta_box_callback( $callbacks ) {
		$callbacks['page'] = 'resonator_core_add_general_page_meta_box';
		
		return $callbacks;
	}
	
	add_filter( 'resonator_core_filter_general_meta_box_callbacks', 'resonator_core_add_general_page_meta_box_callback' );
}