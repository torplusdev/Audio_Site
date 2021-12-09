<?php

if ( ! function_exists( 'resonator_core_add_podcast_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCorePodcastListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_podcast_list_shortcode' );
}

if ( class_exists( 'ResonatorCoreListShortcode' ) ) {
	class ResonatorCorePodcastListShortcode extends ResonatorCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'podcast-item' );
			$this->set_post_type_taxonomy( 'podcast-category' );
			$this->set_post_type_additional_taxonomies( array( 'podcast-tag' ) );
			$this->set_layouts( apply_filters( 'resonator_core_filter_podcast_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_podcast_list_extra_options', array() ) );
			$this->set_hover_animation_options( apply_filters( 'resonator_core_filter_podcast_list_hover_animation_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_CPT_URL_PATH . '/podcast/shortcodes/podcast-list' );
			$this->set_base( 'resonator_core_podcast_list' );
			$this->set_name( esc_html__( 'Podcast List', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of podcasts', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_scripts(
				apply_filters('resonator_core_filter_podcast_list_register_assets', array())
			);

			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' )
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'masonry', 'justified-gallery' ),
			) );
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array(
				'layouts'          => $this->get_layouts(),
				'hover_animations' => $this->get_hover_animation_options()
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear',
				'title'         => esc_html__( 'Appear Animation', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'no',
				'dependency' =>  array(
					'show' => array(
						'behavior' => array(
							'values' => array('columns')
						)
					)
				),
			) );
            $this->set_option( array(
                'field_type' => 'color',
                'name'       => 'background_color',
                'title'      => esc_html__( 'Background Color', 'resonator-core' )
            ) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'uneven_margin',
				'title'      => esc_html__( 'Uneven Layout', 'resonator-core' ),
				'dependency' => array(
					'show' => array(
						'columns' => array(
							'values' => '2'
						)
					)
				),
			    'options'   => resonator_core_get_select_type_options_pool('yes_no', true)
				)
			);
			$this->set_option( array(
					'field_type' => 'select',
					'name'       => 'indent_slider',
					'title'      => esc_html__( 'Indent Slider', 'resonator-core' ),
					'description' => esc_html__( 'Indent left and right slides on devices above 1024px (suitable for 3 or more number of columns)', 'resonator-core' ),
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
			$this->set_option( array(
				'field_type'    => 'hidden',
				'name'          => 'show_audio_length',
				'title'         => esc_html__( 'Show Audio Length', 'resonator-core' ),
				'default_value' => 'no',
			) );
			$this->set_option( array(
				'field_type'    => 'hidden',
				'name'          => 'show_next_up',
				'title'         => esc_html__( 'Show Next Up', 'resonator-core' ),
				'default_value' => 'no',
			) );
			$this->set_option( array(
				'field_type'    => 'hidden',
				'name'          => 'navigation_with_text',
				'title'         => esc_html__( 'Navigation With Text', 'resonator-core' ),
				'default_value' => 'no',
			) );
			$this->map_additional_options();
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'resonator_core_podcast_list', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function load_assets() {
			parent::load_assets();
			
			do_action( 'resonator_core_action_podcast_list_load_assets', $this->get_atts() );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_taxonomy();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['query_result']   = new \WP_Query( resonator_core_get_query_params( $atts ) );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
            $atts['holder_styles']  = $this->get_holder_styles( $atts );
			
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['data_attr']      = resonator_core_get_pagination_data( RESONATOR_CORE_REL_PATH, 'post-types/podcast/shortcodes', 'podcast-list', 'podcast', $atts );
			
			$atts['this_shortcode'] = $this;
			
			return resonator_core_get_template_part( 'post-types/podcast/shortcodes/podcast-list', 'templates/content', $atts['behavior'], $atts );
		}

        private function get_holder_styles( $atts ) {
            $styles = array();

            if ( ! empty( $atts['background_color'] ) ) {
                $styles[] = 'background-color: ' . $atts['background_color'];
            }

            return $styles;
        }
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-podcast-list';
			
			if($atts['uneven_margin'] === 'yes') {
				$holder_classes[] = 'qodef_additional_top_margin';
			}

			if( ! empty( $atts['behavior'] ) && 'slider' === $atts['behavior'] && 'yes' === $atts['indent_slider']) {
				$holder_classes[] = 'qodef-indent-slider--yes';
			}

			$holder_classes[] = ! empty ( $atts['enable_appear'] ) && $atts['enable_appear'] == 'yes' ? 'qodef--has-appear' : '';
			
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			
			$list_classes            = $this->get_list_classes( $atts );
			$hover_animation_classes = $this->get_hover_animation_classes( $atts );
			$holder_classes          = array_merge( $holder_classes, $list_classes, $hover_animation_classes );
			
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
