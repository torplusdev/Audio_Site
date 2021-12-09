<?php

if ( ! function_exists( 'resonator_core_register_product_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function resonator_core_register_product_for_meta_options( $post_types ) {
		$post_types[] = 'product';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'resonator_core_register_product_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'resonator_core_register_product_for_meta_options' );
}

if ( ! function_exists( 'resonator_core_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function resonator_core_woo_get_global_product() {
		global $product;
		
		return $product;
	}
}

if ( ! function_exists( 'resonator_core_woo_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function resonator_core_woo_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'woocommerce' ) {
			$position = 70;
		}
		
		return $position;
	}
	
	add_filter( 'resonator_core_filter_admin_options_map_position', 'resonator_core_woo_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'resonator_core_include_woocommerce_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function resonator_core_include_woocommerce_shortcodes() {
		foreach ( glob( RESONATOR_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'resonator_core_include_woocommerce_shortcodes' );
}

if ( ! function_exists( 'resonator_core_woo_product_get_rating_html' ) ) {
	/**
	 * Function that return ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float  $rating
	 * @param int    $count - total number of ratings
	 *
	 * @return string
	 */
	function resonator_core_woo_product_get_rating_html( $html, $rating, $count ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_woo_product_get_rating_html( $html, $rating, $count ) : '';
	}
}

if ( ! function_exists( 'resonator_core_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function resonator_core_woo_get_product_categories( $before = '', $after = '' ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_woo_get_product_categories( $before, $after ) : '';
	}
}

if ( ! function_exists( 'resonator_core_woo_get_product_tags' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function resonator_core_woo_get_product_tags( $before = '', $after = '' ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_woo_get_product_tags( $before, $after ) : '';
	}
}
