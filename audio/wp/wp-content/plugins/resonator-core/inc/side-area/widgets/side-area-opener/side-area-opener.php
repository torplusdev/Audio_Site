<?php

if ( ! function_exists( 'resonator_core_add_side_area_opener_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_side_area_opener_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreSideAreaOpenerWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_side_area_opener_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreSideAreaOpenerWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'resonator_core_side_area_opener' );
			$this->set_name( esc_html__( 'Resonator Side Area Opener', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Display a "hamburger" icon that opens the side area', 'resonator-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'sidea_area_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'resonator-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_color',
					'title'      => esc_html__( 'Opener Color', 'resonator-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_hover_color',
					'title'      => esc_html__( 'Opener Hover Color', 'resonator-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['side_area_opener_color'] ) ) {
				$styles[] = 'color: ' . $atts['side_area_opener_color'] . ';';
			}
			
			if ( ! empty( $atts['sidea_area_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['sidea_area_opener_margin'];
			}
			
			resonator_core_get_opener_icon_html( array(
				'option_name'  => 'side_area',
				'custom_class' => 'qodef-side-area-opener',
				'inline_style' => $styles,
				'inline_attr'  => qode_framework_get_inline_attr( $atts['side_area_opener_hover_color'], 'data-hover-color' )
			) );
		}
	}
}