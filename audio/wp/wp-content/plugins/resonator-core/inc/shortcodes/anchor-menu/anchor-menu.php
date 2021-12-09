<?php

if ( ! function_exists( 'resonator_core_add_anchor_menu_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_anchor_menu_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreAnchorMenuShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_anchor_menu_shortcode' );
}

if ( class_exists( 'ResonatorCoreShortcode' ) ) {
	class ResonatorCoreAnchorMenuShortcode extends ResonatorCoreShortcode {
		
		public function __construct() {
			$this->set_extra_options( apply_filters( 'resonator_core_filter_anchor_menu_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_SHORTCODES_URL_PATH . '/anchor-menu' );
			$this->set_base( 'resonator_core_anchor_menu' );
			$this->set_name( esc_html__( 'Anchor Menu', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds anchor menu holder', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Child elements', 'resonator-core' ),
				'items'   => array(
					array(
						'field_type'    => 'text',
						'name'          => 'number',
						'title'         => esc_html__( 'Number', 'resonator-core' ),
						'default_value' => ''
					),
					array(
						'field_type' => 'text',
						'name'       => 'title',
						'title'      => esc_html__( 'Title', 'resonator-core' )
					),
					array(
						'field_type' => 'text',
						'name'       => 'link',
						'title'      => esc_html__( 'Link', 'resonator-core' ),
					)
				)
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = 'qodef-anchor-menu';
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;
			
			return resonator_core_get_template_part( 'shortcodes/anchor-menu', '/templates/anchor-menu', '', $atts );
		}
		
	}
}