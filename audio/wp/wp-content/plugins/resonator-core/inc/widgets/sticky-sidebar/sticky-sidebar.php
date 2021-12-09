<?php

if ( ! function_exists( 'resonator_core_add_sticky_sidebar_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreStickySidebarWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_sticky_sidebar_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreStickySidebarWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'resonator_core_sticky_sidebar' );
			$this->set_name( esc_html__( 'Resonator Sticky Sidebar', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar', 'resonator-core' ) );
		}
		
		public function render( $atts ) {
		}
	}
}
