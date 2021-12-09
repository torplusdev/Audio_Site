<?php

if ( ! function_exists( 'resonator_core_add_video_button_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_video_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreVideoButton';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_video_button_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreVideoButton extends ResonatorCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/video-button' );
			$this->set_base( 'resonator_core_video_button' );
			$this->set_name( esc_html__( 'Video Button', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video button element', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'video_link',
				'title'      => esc_html__( 'Video Link', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'video_image',
				'title'      => esc_html__( 'Image', 'resonator-core' ),
				'description'=> esc_html__( 'Select image from media library', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_roundend_border',
				'title'      => esc_html__( 'Rounded Image', 'resonator-core' ),
				'options'	 => resonator_core_get_select_type_options_pool( 'yes_no', false ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'play_button_color',
				'title'      => esc_html__( 'Play Button Color', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'play_button_size',
				'title'      => esc_html__( 'Play Button Size (px)', 'resonator-core' )
			) );
		}

        public static function call_shortcode( $params ) {
            $html = qode_framework_call_shortcode( 'resonator_core_video_button', $params );
            $html = str_replace( "\n", '', $html );

            return $html;
        }
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']		= $this->get_holder_classes( $atts );
			$atts['image_classes']       = $this->get_image_classes( $atts );
			$atts['play_button_styles'] = $this->get_play_button_styles( $atts );

			return resonator_core_get_template_part( 'shortcodes/video-button', 'templates/video-button', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-video-button';
			$holder_classes[] = ! empty( $atts['video_image'] ) ? 'qodef--has-img' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_play_button_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['play_button_color'] ) ) {
				$styles[] = 'color: ' . $atts['play_button_color'];
			}
			
			if ( ! empty( $atts['play_button_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['play_button_size'] ) ) {
					$styles[] = 'font-size: ' . $atts['play_button_size'];
				} else {
					$styles[] = 'font-size: ' . intval( $atts['play_button_size'] ) . 'px';
				}
			}
			
			return implode( ';', $styles );
		}
		
		private function get_image_classes( $atts ) {
			$image_classes  = array();
			
			$image_classes[] = 'qodef-m-image';
			$image_classes[] = ! ( $atts['image_roundend_border']  === 'no' ) ? 'qodef-rounded-image' : '';
			
			return implode( ' ', $image_classes );
		}
	}
}