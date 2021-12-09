<?php

if ( ! function_exists( 'resonator_core_add_dropcaps_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_dropcaps_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreDropcapsShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_dropcaps_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreDropcapsShortcode extends ResonatorCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/dropcaps' );
			$this->set_base( 'resonator_core_dropcaps' );
			$this->set_name( esc_html__( 'Dropcaps', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays dropcaps with provided parameters', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'type',
				'title'         => esc_html__( 'Type', 'resonator-core' ),
				'options'       => array(
					'simple' => esc_html__( 'Simple', 'resonator-core' ),
					'circle' => esc_html__( 'Circle', 'resonator-core' ),
					'square' => esc_html__( 'Square', 'resonator-core' )
				),
				'default_value' => 'simple'
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'letter',
				'title'      => esc_html__( 'Letter', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'letter_color',
				'title'      => esc_html__( 'Letter Color', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'letter_background_color',
				'title'      => esc_html__( 'Letter Background Color', 'resonator-core' ),
				'dependency' => array(
					'hide' => array(
						'type' => array(
							'values'        => 'simple',
							'default_value' => 'simple'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'resonator-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['letter_styles']  = $this->get_letter_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			
			return resonator_core_get_template_part( 'shortcodes/dropcaps', 'templates/dropcaps', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-dropcaps';
			$holder_classes[] = ! empty( $atts['type'] ) ? 'qodef-type--' . $atts['type'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_letter_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['letter_color'] ) ) {
				$styles[] = 'color: ' . $atts['letter_color'];
			}
			
			if ( $atts['type'] !== 'simple' && ! empty( $atts['letter_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['letter_background_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
	}
}