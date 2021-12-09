<?php

if ( ! function_exists( 'resonator_core_add_tabs_child_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_tabs_child_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreTabsChildShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_tabs_child_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreTabsChildShortcode extends ResonatorCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/tabs' );
			$this->set_base( 'resonator_core_tabs_child' );
			$this->set_name( esc_html__( 'Tabs Child', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds tab child to tabs holder', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_is_child_shortcode( true );
			$this->set_parent_elements( array(
				'resonator_core_tabs'
			) );
			$this->set_is_parent_shortcode( true );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tab_title',
				'title'      => esc_html__( 'Title', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'resonator-core' ),
				'default_value' => '',
				'visibility'    => array('map_for_page_builder' => false)
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['tab_title'] = $atts['tab_title'] . '-' . rand( 0, 1000 );
			$atts['content']   = $content;

			return resonator_core_get_template_part( 'shortcodes/tabs', 'variations/'.$atts['layout'].'/templates/child', '', $atts );
		}
	}
}