<?php

if ( ! function_exists( 'resonator_core_add_podcast_season_list_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_season_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCorePodcastSeasonListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_podcast_season_list_shortcode' );
}

if ( class_exists( 'ResonatorCoreListShortcode' ) ) {
	class ResonatorCorePodcastSeasonListShortcode extends ResonatorCoreListShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'resonator_core_filter_podcast_season_list_layouts', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_CPT_URL_PATH . '/podcast/shortcodes/podcast-season-list' );
			$this->set_base( 'resonator_core_podcast_season_list' );
			$this->set_name( esc_html__( 'Podcast Season List', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that display list of season items', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' ),
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'masonry', 'justified-gallery' ),
			) );
			$this->map_query_options( array(
				'exclude_option' => array( 'additional_params' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'hide_empty',
				'title'      => esc_html__( 'Hide Empty', 'resonator-core' ),
				'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
				'group'      => esc_html__( 'Query', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'additional_params',
				'title'      => esc_html__( 'Additional Params', 'resonator-core' ),
				'options'    => array(
					''   => esc_html__( 'No', 'resonator-core' ),
					'id' => esc_html__( 'Taxonomy IDs', 'resonator-core' ),
				),
				'group'      => esc_html__( 'Query', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'taxonomy_ids',
				'title'       => esc_html__( 'Taxonomy IDs', 'resonator-core' ),
				'description' => esc_html__( 'Separate taxonomy IDs with commas', 'resonator-core' ),
				'group'       => esc_html__( 'Query', 'resonator-core' ),
				'dependency'  => array(
					'show' => array(
						'additional_params' => array(
							'values'        => 'id',
							'default_value' => '',
						)
					),
				),
			) );
			$this->set_option( array(
					'field_type' => 'select',
					'name'       => 'indent_slider',
					'title'      => esc_html__( 'Indent Slider Right', 'resonator-core' ),
					'description' => esc_html__( 'Indent slider to the right on devices above 1024px by increasing its width', 'resonator-core' ),
					'dependency' => array(
						'show' => array(
							'behavior' => array(
								'values' => 'slider'
							)
						)
					),
					'options'   => resonator_core_get_select_type_options_pool('no_yes', false),
					'default_value' => 'no',
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();

			$atts['taxonomy'] = 'podcast-season';
			$atts['taxonomy_items'] = get_terms( resonator_core_get_custom_post_type_taxonomy_query_args( $atts ) );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			
			$atts['this_shortcode'] = $this;
			
			return resonator_core_get_template_part( 'post-types/podcast/shortcodes/podcast-season-list', 'templates/content', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-podcast-season-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';

			if( ! empty( $atts['behavior'] ) && 'slider' === $atts['behavior'] && 'yes' === $atts['indent_slider']) {
				$holder_classes[] = 'qodef-indent-slider-right--yes';
			}
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			
			$list_item_classes = $this->get_list_item_classes( $atts );
			
			$item_classes = array_merge( $item_classes, $list_item_classes );
			
			return implode( ' ', $item_classes );
		}
		
		public function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}
			
			return $styles;
		}
	}
}
