<?php

if ( ! function_exists( 'resonator_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function resonator_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'resonator-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'resonator-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'resonator-core' ),
					'description' => esc_html__( 'Set background color', 'resonator-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'resonator-core' ),
					'description' => esc_html__( 'Set background image', 'resonator-core' )
				)
			);

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
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

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'resonator-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'resonator-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'resonator-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'resonator-core' )
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'resonator-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'resonator-core' ),
					'default_value' => 'no'
				)
			);

			$boxed_section = $page->add_section_element(
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
                        'fixed'  => esc_html__( 'Fixed', 'resonator-core' ),
                        'scroll' => esc_html__( 'Scroll', 'resonator-core' )
                    ),
                )
            );

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'resonator-core' ),
					'default_value' => 'no'
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'resonator-core' ),
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

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'resonator-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'resonator-core' ),
					'options'       => resonator_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1100'
				)
			);

			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_general_options_map', $page );
			
			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'resonator-core' ),
					'description' => esc_html__( 'Enter your custom JavaScript here', 'resonator-core' )
				)
			);
		}
	}

	add_action( 'resonator_core_action_default_options_init', 'resonator_core_add_general_options', resonator_core_get_admin_options_map_position( 'general' ) );
}