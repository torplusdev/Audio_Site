<?php

if ( ! function_exists( 'resonator_core_add_h2_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function resonator_core_add_h2_typography_options( $page ) {
		
		if ( $page ) {
			$h2_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h2',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H2 Typography', 'resonator-core' ),
					'description' => esc_html__( 'Set values for Heading 2 HTML element', 'resonator-core' )
				)
			);
			
			$h2_typography_section = $h2_tab->add_section_element(
				array(
					'name'  => 'qodef_h2_typography_section',
					'title' => esc_html__( 'General Typography', 'resonator-core' )
				)
			);
			
			$h2_typography_row = $h2_typography_section->add_row_element(
				array (
					'name'  => 'qodef_h2_typography_row',
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h2_color',
					'title'      => esc_html__( 'Color', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h2_font_family',
					'title'      => esc_html__( 'Font Family', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_font_size',
					'title'      => esc_html__( 'Font Size', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_line_height',
					'title'      => esc_html__( 'Line Height', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h2_font_weight',
					'title'      => esc_html__( 'Font Weight', 'resonator-core' ),
					'options'    => resonator_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h2_text_transform',
					'title'      => esc_html__( 'Text Transform', 'resonator-core' ),
					'options'    => resonator_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h2_font_style',
					'title'      => esc_html__( 'Font Style', 'resonator-core' ),
					'options'    => resonator_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_margin_top',
					'title'      => esc_html__( 'Margin Top', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h2_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'resonator-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

            /* 1366 styles */
            $h2_1366_typography_section = $h2_tab->add_section_element(
                array(
                    'name'  => 'qodef_responsive_1366_typography_h2',
                    'title' => esc_html__( 'Responsive 1366 Typography', 'resonator-core' )
                )
            );

            $responsive_1366_typography_h2_row = $h2_1366_typography_section->add_row_element(
                array(
                    'name'  => 'qodef_responsive_1366_h2_typography_row'
                )
            );

            $responsive_1366_typography_h2_row->add_field_element(
                array(
                    'field_type' => 'text',
                    'name'       => 'qodef_h2_responsive_1366_font_size',
                    'title'      => esc_html__( 'Font Size', 'resonator-core' ),
                    'args'       => array(
                        'col_width' => 4
                    )
                )
            );

            $responsive_1366_typography_h2_row->add_field_element(
                array(
                    'field_type' => 'text',
                    'name'       => 'qodef_h2_responsive_1366_line_height',
                    'title'      => esc_html__( 'Line Height', 'resonator-core' ),
                    'args'       => array(
                        'col_width' => 4
                    )
                )
            );

            $responsive_1366_typography_h2_row->add_field_element(
                array(
                    'field_type' => 'text',
                    'name'       => 'qodef_h2_responsive_1366_letter_spacing',
                    'title'      => esc_html__( 'Letter Spacing', 'resonator-core' ),
                    'args'       => array(
                        'col_width' => 4
                    )
                )
            );
			
			/* 1024 styles */
			$h2_1024_typography_section = $h2_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h2',
					'title' => esc_html__( 'Responsive 1024 Typography', 'resonator-core' )
				)
			);
			
			$responsive_1024_typography_h2_row = $h2_1024_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_1024_h2_typography_row'
				)
			);
			
			$responsive_1024_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 768 styles */
			$h2_768_typography_section = $h2_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_h2',
					'title' => esc_html__( 'Responsive 768 Typography', 'resonator-core' )
				)
			);
			
			$responsive_768_typography_h2_row = $h2_768_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_768_h2_typography_row'
				)
			);
			
			$responsive_768_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 680 styles */
			$h2_680_typography_section = $h2_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h2',
					'title' => esc_html__( 'Responsive 680 Typography', 'resonator-core' )
				)
			);
			
			$responsive_680_typography_h2_row = $h2_680_typography_section->add_row_element(
				array(
					'name'  => 'qodef_responsive_680_h2_typography_row'
				)
			);
			
			$responsive_680_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h2_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h2_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'resonator-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_typography_options_map', 'resonator_core_add_h2_typography_options' );
}