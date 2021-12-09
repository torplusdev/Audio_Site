<?php

if ( ! function_exists( 'resonator_core_add_button_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_button_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_button_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreButtonWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'resonator_core_button'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'resonator_core_button' );
				$this->set_name( esc_html__( 'Resonator Button', 'resonator-core' ) );
				$this->set_description( esc_html__( 'Add a button element into widget areas', 'resonator-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[resonator_core_button $params]" ); // XSS OK
		}
	}
}