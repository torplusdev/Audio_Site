<?php

if ( ! function_exists( 'resonator_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_icon_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreIconWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'resonator_core_icon'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'resonator_core_icon' );
				$this->set_name( esc_html__( 'Resonator Icon', 'resonator-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'resonator-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[resonator_core_icon $params]" ); // XSS OK
		}
	}
}
