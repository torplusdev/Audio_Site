<?php

if ( ! function_exists( 'resonator_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_separator_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreSeparatorWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'resonator_core_separator'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'resonator_core_separator' );
				$this->set_name( esc_html__( 'Resonator Separator', 'resonator-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'resonator-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[resonator_core_separator $params]" ); // XSS OK
		}
	}
}