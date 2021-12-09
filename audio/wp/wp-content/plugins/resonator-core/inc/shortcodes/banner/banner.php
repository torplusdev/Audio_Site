<?php

if ( ! function_exists( 'resonator_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreBannerShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_banner_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreBannerShortcode extends ResonatorCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'resonator_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_banner_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'resonator_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'resonator-core' ) );
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
				'options'       => $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link_url',
				'title'      => esc_html__( 'Link', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
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
				'default_value' => 'h3',
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
				'field_type' => 'text',
				'name'       => 'subtitle',
				'title'      => esc_html__( 'Subtitle', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'subtitle_tag',
				'title'         => esc_html__( 'Subtitle Tag', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h5',
				'group'         => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'subtitle_color',
				'title'      => esc_html__( 'Subtitle Color', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'subtitle_margin_top',
				'title'      => esc_html__( 'Subtitle Margin Top', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_field',
				'title'      => esc_html__( 'Text', 'resonator-core' ),
				'group'      => esc_html__( 'Content', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'text_tag',
				'title'         => esc_html__( 'Text Tag', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Content', 'resonator-core' )
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
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'resonator_core_button',
				'exclude'           => array( 'custom_class', 'link', 'target' ),
				'additional_params' => array(
					'group' => esc_html__( 'Button', 'resonator-core' ),
					'dependency'    => array(
						'show' => array(
							'layout' => array(
								'values'        => 'link-button',
								'default_value' => ''
							)
						)
					)
				)
			) );
			
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );
			
			return resonator_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
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
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_subtitle_styles( $atts ) {
			$styles = array();
			
			if ( $atts['subtitle_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['subtitle_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['subtitle_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['subtitle_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
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
		
		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'resonator_core_button',
				'exclude'        => array( 'custom_class', 'link', 'target' ),
				'atts'           => $atts,
			) );
			
			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';
			
			return $params;
		}
	}
}