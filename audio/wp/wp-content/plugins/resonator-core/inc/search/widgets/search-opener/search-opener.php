<?php

if ( ! function_exists( 'resonator_core_add_search_opener_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 **/
	function resonator_core_add_search_opener_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_search_opener_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreSearchOpener extends QodeFrameworkWidget {
		
		public function __construct() {
			add_filter( 'resonator_filter_add_inline_style', array( $this, 'set_inline_search_opener_styles' ) );
			parent::__construct();
		}
		
		public function map_widget() {
			$this->set_base( 'resonator_core_search_opener' );
			$this->set_name( esc_html__( 'Resonator Search Opener', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Display a "search" icon that opens the search form', 'resonator-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'search_icon_color',
					'title'      => esc_html__( 'Icon Color', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'search_icon_hover_color',
					'title'      => esc_html__( 'Icon Hover Color', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'search_icon_margin',
					'title'       => esc_html__( 'Icon Margin', 'resonator-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'search_icon_label',
					'title'      => esc_html__( 'Enable Search Icon Label', 'resonator-core' ),
					'options'    => resonator_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'search_icon_size',
					'title'      => esc_html__( 'Icon Size (px)', 'resonator-core' ),
				)
			);
		}
		
		public function render( $atts ) {
			$enable_search_icon_text = resonator_core_get_option_value( 'admin', 'qodef_search_icon_label' );
			
			$styles           = array();
			$show_search_text = $atts['search_icon_label'] == 'yes' || $enable_search_icon_text == 'yes';
			
			if ( ! empty( $atts['search_icon_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $atts['search_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $atts['search_icon_color'] ) ) {
				$styles[] = 'color: ' . $atts['search_icon_color'] . ';';
			}
			
			if ( ! empty( $atts['search_icon_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['search_icon_margin'] . ';';
			}
			
			resonator_core_get_opener_icon_html( array(
				'option_name'  => 'search',
				'custom_icon'  => 'search',
				'custom_class' => 'qodef-search-opener',
				'inline_style' => $styles,
				'inline_attr'  => qode_framework_get_inline_attr( $atts['search_icon_hover_color'], 'data-hover-color' ),
				'custom_html'  => $show_search_text ? '<span class="qodef-search-opener-text">' . esc_html__( 'Search', 'resonator-core' ) . '</span>' : ''
			) );
		}
		
		public function set_inline_search_opener_styles( $style ) {
			$styles       = array();
			$hover_styles = array();
			
			$color       = resonator_core_get_option_value( 'admin', 'qodef_search_icon_color' );
			$hover_color = resonator_core_get_option_value( 'admin', 'qodef_search_icon_hover_color' );
			$font_size   = resonator_core_get_option_value( 'admin', 'qodef_search_icon_size' );
			
			if ( $color !== '' ) {
				$styles['color'] = $color;
			}
			
			if ( $font_size !== '' ) {
				$styles['font-size'] = $font_size;
			}
			
			if ( ! empty( $hover_color ) ) {
				$hover_styles['color'] = $hover_color;
			}
			
			if ( ! empty( $styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef-search-opener', $styles );
			}
			
			if ( ! empty( $hover_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef-search-opener:hover', $hover_styles );
			}
			
			return $style;
		}
	}
}