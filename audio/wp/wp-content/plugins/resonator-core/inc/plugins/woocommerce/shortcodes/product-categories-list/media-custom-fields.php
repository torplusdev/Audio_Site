<?php

if ( ! function_exists( 'resonator_core_add_product_category_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function resonator_core_add_product_category_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_cat' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_cat',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_product_category_masonry_size',
					'title'       => esc_html__( 'Image Size', 'resonator-core' ),
					'description' => esc_html__( 'Choose image size for list shortcode item if masonry layout > fixed image size is selected in product categories list shortcode', 'resonator-core' ),
					'options'     => resonator_core_get_select_type_options_pool( 'masonry_image_dimension' )
				)
			);
		}
	}

	add_action( 'resonator_core_action_register_cpt_tax_fields', 'resonator_core_add_product_category_options' );
}