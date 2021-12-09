<?php

if ( ! function_exists( 'resonator_core_add_image_with_text_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_image_with_text_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreImageWithTextShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_image_with_text_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreImageWithTextShortcode extends ResonatorCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'resonator_core_filter_image_with_text_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_image_with_text_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/image-with-text' );
			$this->set_base( 'resonator_core_image_with_text' );
			$this->set_name( esc_html__( 'Image With Text', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image with text element', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' ),
			) );
			
			$options_map = resonator_core_get_variations_options_map( $this->get_layouts() );
			
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'resonator-core' ),
				'options'		=> $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_roundend_border',
				'title'      => esc_html__( 'Rounded Image', 'resonator-core' ),
				'options'	 => resonator_core_get_select_type_options_pool( 'yes_no', false ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_hover_animation',
				'title'         => esc_html__( 'Image Hover Animation', 'resonator-core' ),
				'options'	    => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'yes',
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'resonator-core' ),
				'description'=> esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_action',
				'title'         => esc_html__( 'Image Action', 'resonator-core' ),
				'options'       => array(
					''            => esc_html__( 'No Action', 'resonator-core' ),
					'open-popup'  => esc_html__( 'Open Popup', 'resonator-core' ),
					'custom-link' => esc_html__( 'Custom Link', 'resonator-core' )
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Custom Link', 'resonator-core' ),
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Custom Link Target', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'title_alignment',
				'title'      => esc_html__( 'Title Align', 'resonator-core' ),
				'options'       => array(
					'left'      => esc_html__( 'Left', 'resonator-core' ),
					'center'      => esc_html__( 'Center', 'resonator-core' ),
					'right' => esc_html__( 'Right', 'resonator-core' )
				),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'resonator_core_image_with_text', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['image_classes']       = $this->get_image_classes( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['image_params']   = $this->generate_image_params( $atts );
			
			return resonator_core_get_template_part( 'shortcodes/image-with-text', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-image-with-text';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty ( $atts['image_hover_animation'] ) ? 'qodef-image-hover-animation--' . $atts['image_hover_animation'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_image_classes( $atts ) {
			$image_classes  = array();
			
			$image_classes[] = 'qodef-m-image';
			$image_classes[] = ! ( $atts['image_roundend_border']  === 'no' ) ? 'qodef-rounded-image' : '';
			
			return implode( ' ', $image_classes );
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( $atts['title_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			//title_alignment
			if ( ! empty( $atts['title_alignment'] ) ) {
				$styles[] = 'text-align: ' . $atts['title_alignment'];
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( $atts['text_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function generate_image_params( $atts ) {
			$image = array();
			
			if ( ! empty( $atts['image'] ) ) {
				$id = $atts['image'];
				
				$image['image_id'] = intval( $id );
				$image_original    = wp_get_attachment_image_src( $id, 'full' );
				$image['url']      = $image_original[0];
				$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
				
				$image_size = trim( $atts['image_size'] );
				preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
				if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
					$image['image_size'] = $image_size;
				} elseif ( ! empty( $matches[0] ) ) {
					$image['image_size'] = array(
						$matches[0][0],
						$matches[0][1]
					);
				} else {
					$image['image_size'] = 'full';
				}
			}
			
			return $image;
		}
	}
}
