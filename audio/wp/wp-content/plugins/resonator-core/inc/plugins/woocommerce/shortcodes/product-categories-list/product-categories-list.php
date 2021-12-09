<?php

if ( ! function_exists( 'resonator_core_add_product_categories_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function resonator_core_add_product_categories_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ResonatorCoreProductCategoriesListShortcode';

		return $shortcodes;
	}

	add_filter( 'resonator_core_filter_register_shortcodes', 'resonator_core_add_product_categories_list_shortcode' );
}

if ( class_exists( 'ResonatorCoreListShortcode' ) ) {
	class ResonatorCoreProductCategoriesListShortcode extends ResonatorCoreListShortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_layouts( apply_filters( 'resonator_core_filter_product_categories_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'resonator_core_filter_product_categories_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( RESONATOR_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-categories-list' );
			$this->set_base( 'resonator_core_product_categories_list' );
			$this->set_name( esc_html__( 'Product Categories List', 'resonator-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product categories', 'resonator-core' ) );
			$this->set_category( esc_html__( 'Resonator Core', 'resonator-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'resonator-core' )
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'justified-gallery' ),
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
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'resonator_core_product_categories_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']      = $this->get_post_type();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['taxonomy_items'] = get_terms( resonator_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $this->get_post_type_taxonomy() ) ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			
			$atts['this_shortcode'] = $this;

			return resonator_core_get_template_part( 'plugins/woocommerce/shortcodes/product-categories-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-categories-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
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

		public function get_image_dimension( $atts ) {
			$image_dimension = array();

			if ( ! empty( $atts['behavior'] ) && $atts['behavior'] == 'masonry' && ! empty( $atts['masonry_images_proportion'] ) && $atts['masonry_images_proportion'] == 'fixed' ) {
				$image_dimension = resonator_core_get_custom_image_size_meta( 'taxonomy', 'qodef_product_category_masonry_size', $atts['category_id'] );
			}

			if ( ! empty( $atts['behavior'] ) && in_array( $atts['behavior'], array( 'columns', 'slider' ) ) ) {
				$image_dimension = array(
					'size'  => $atts['images_proportion'],
					'class' => resonator_core_get_custom_image_size_class_name( $atts['images_proportion'] )
				);
			}

			return $image_dimension;
		}
	}
}