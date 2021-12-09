<?php

if ( ! function_exists( 'resonator_core_add_podcast_player_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_podcast_player_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCorePodcastPlayerShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_podcast_player_shortcode' );
}

if ( class_exists( 'QodeFrameworkShortcode' ) ) {
	class ResonatorCorePodcastPlayerShortcode extends ResonatorCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'resonator_core_filter_podcast_player_layouts', array() ) );
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_CPT_URL_PATH . '/podcast/shortcodes/podcast-player' );
			$this->set_base( 'resonator_core_podcast_player' );
			$this->set_name( esc_html__( 'Podcast Player', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays podcast player', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );

			$options_map = resonator_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'resonator-core' ),
				'options'       => $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'podcast_id',
				'title'       => esc_html__( 'Podcast ID', 'resonator-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'enable_image',
				'title'      => esc_html__( 'Show Image', 'resonator-core' ),
				'options'    => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'yes',
			    'dependency' =>  array(
				    'show' => array(
					    'layout' => array(
						    'values' => 'simple'
					    )
				    )
			    )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'enable_shadow',
				'title'      => esc_html__( 'Enable Shadow', 'resonator-core' ),
				'options'	 => resonator_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'simple'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'show_progress_in_modal',
				'title'      => esc_html__( 'Show Progress in Modal', 'resonator-core' ),
				'options'    => resonator_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-bottom'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'new_episode_marker',
				'title'      => esc_html__( 'New Episode Marker', 'resonator-core' ),
				'options'    => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'yes',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-left'
						)
					)
				),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear',
				'title'         => esc_html__( 'Appear Animation', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'no',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => array('standard', 'simple', 'info-bottom')
						)
					)
				),
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'appear_delay',
				'title'         => esc_html__( 'Appear Delay (milliseconds)', 'resonator-core' ),
				'default_value' => '',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => array('standard', 'simple', 'info-bottom')
						)
					)
				),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_marker_appear',
				'title'         => esc_html__( 'Marker Appear Animation', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no', false ),
				'default_value' => 'no',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-left'
						)
					)
				),
			) );
			$this->set_option( array(
				'field_type'  => 'textarea',
				'name'        => 'custom_transcript_text',
				'title'       => esc_html__( 'Custom Transcript Text', 'resonator-core' ),
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-left',
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'read_more_text',
				'title'       => esc_html__( 'Read More Text', 'resonator-core' ),
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-left',
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'content_align',
				'title'      => esc_html__( 'Align Content', 'resonator-core' ),
				'options'    => array(
					'center' => esc_html__( 'Center', 'resonator-core' ),
				    'left'   => esc_html__( 'Left', 'resonator-core' ),
					'right'   => esc_html__( 'Right', 'resonator-core' )
				),
				'default_value' => 'center',
				'dependency' =>  array(
					'show' => array(
						'layout' => array(
							'values' => 'info-bottom'
						)
					)
				)
			) );
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'resonator_core_podcast_player', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();

			$atts['podcast_id'] = intval( $atts['podcast_id'] );
			if ( $atts['podcast_id'] <= 0 ) {
				$atts['podcast_id'] = get_the_ID();
			}

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['styles']         = $this->get_styles( $atts );

			return resonator_core_get_template_part( 'post-types/podcast/shortcodes/podcast-player', 'templates/podcast-player', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-podcast-player-sc';
			
			if( $atts['enable_image'] === 'no') $holder_classes[] = 'qodef-no-image';
			
			if( $atts['content_align'] === 'right' ) { $holder_classes[] = 'qodef-right-align'; }
			elseif ( $atts['content_align'] === 'left' ) { $holder_classes[] = 'qodef-left-align'; }
			
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['enable_shadow'] ) ? 'qodef-shadow--' . $atts['enable_shadow'] : '';
			$holder_classes[] = ! empty( $atts['show_progress_in_modal'] ) ? 'qodef-progress-in-modal--' . $atts['show_progress_in_modal'] : '';
			$holder_classes[] = ! empty ( $atts['enable_marker_appear'] ) && $atts['enable_marker_appear'] == 'yes' ? 'qodef--has-marker-appear' : '';
			$holder_classes[] = ! empty ( $atts['enable_appear'] ) && $atts['enable_appear'] == 'yes' ? 'qodef--has-appear' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['color'] ) ) {
				$styles[] = 'color: ' . $atts['color'];
			}

			if ( ! empty( $atts['appear_delay'] ) && '' !== $atts['appear_delay'] ) {
				$styles[] = 'transition-delay: ' . intval( $atts['appear_delay'] ) . 'ms';
			}

			if ( ! empty( $atts['border_color'] ) && $atts['button_layout'] !== 'textual' ) {
				$styles[] = 'border-color: ' . $atts['border_color'];
			}

			return $styles;
		}
	}
}
