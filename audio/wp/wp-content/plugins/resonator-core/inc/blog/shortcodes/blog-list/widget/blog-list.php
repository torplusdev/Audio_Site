<?php

if ( ! function_exists( 'resonator_core_add_blog_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function resonator_core_add_blog_list_widget( $widgets ) {
		$widgets[] = 'ResonatorCoreBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'resonator_core_filter_register_widgets', 'resonator_core_add_blog_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ResonatorCoreBlogListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'resonator-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'resonator_core_blog_list'
			) );
			
			if ( $widget_mapped ) {
				$this->set_base( 'resonator_core_blog_list' );
				$this->set_name( esc_html__( 'Resonator Blog List', 'resonator-core' ) );
				$this->set_description( esc_html__( 'Display a list of blog posts', 'resonator-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[resonator_core_blog_list $params]" ); // XSS OK
		}
	}
}
