<?php

if ( ! function_exists( 'resonator_core_add_blog_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_blog_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreBlogListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_blog_list_shortcode' );
}

if ( class_exists( 'ResonatorCoreListShortcode' ) ) {
	class ResonatorCoreBlogListShortcode extends ResonatorCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'post' );
			$this->set_post_type_taxonomy( 'category' );
			$this->set_post_type_additional_taxonomies( array( 'post_tag' ) );
			$this->set_layouts( apply_filters( 'resonator_core_filter_blog_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_blog_list_extra_options', array() ) );
			$this->set_hover_animation_options( apply_filters( 'resonator_core_filter_blog_list_hover_animation_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_INC_URL_PATH . '/blog/shortcodes/blog-list' );
			$this->set_base( 'resonator_core_blog_list' );
			$this->set_name( esc_html__( 'Blog List', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of blog posts', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_scripts(
				apply_filters( 'resonator_core_filter_blog_list_register_scripts', array() )
			);
			$this->set_necessary_styles(
				apply_filters( 'resonator_core_filter_blog_list_register_styles', array() )
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' )
			) );
			$this->map_list_options( array (
				'exclude_behavior' => array( 'justified-gallery' ),
				)
			);
			$this->map_query_options();
			$this->map_layout_options( array(
				'layouts'          => $this->get_layouts(),
				'hover_animations' => $this->get_hover_animation_options()
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'show_excerpt',
				'title'      => esc_html__( 'Show Excerpt', 'resonator-core' ),
				'options'       => resonator_core_get_select_type_options_pool( 'yes_no' ),
				'group'      => esc_html__( 'Layout', 'resonator-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'excerpt_length',
				'title'      => esc_html__( 'Excerpt Length', 'resonator-core' ),
				'group'      => esc_html__( 'Layout', 'resonator-core' ),
				'dependency'    => array(
					'hide' => array(
						'show_excerpt' => array(
							'values'        => array( 'no' ),
						)
					)
				),
			) );
			$this->map_additional_options();
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'resonator_core_blog_list', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function load_assets() {
			parent::load_assets();
			
			$is_allowed = apply_filters( 'resonator_core_filter_load_blog_list_assets', false, $this->get_atts() );

			if ( $is_allowed ) {
				/*wp_enqueue_script( 'wp-mediaelement' );*/
				/*wp_enqueue_script( 'mediaelement-vimeo' );*/
			}
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_taxonomy();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['unique'] = rand( 0, 1000 );
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['query_result']   = new \WP_Query( resonator_core_get_query_params( $atts ) );
			$atts['slider_attr']     = $this->get_slider_data( $atts, array( 'unique' => $atts['unique'], 'outsideNavigation' => 'yes' ) );
			$atts['data_attr']      = resonator_core_get_pagination_data( RESONATOR_CORE_REL_PATH, 'blog/shortcodes', 'blog-list', 'post', $atts );
			
			$atts['this_shortcode'] = $this;
			
			return resonator_core_get_template_part( 'blog/shortcodes/blog-list', 'templates/content', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-blog';
			if ( ! empty( $atts['layout'] ) && $atts['layout'] == 'standard' ) {
				$holder_classes[] = 'qodef--list';
			}
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			
			$item_classes[] = 'qodef-blog-item';
			
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
