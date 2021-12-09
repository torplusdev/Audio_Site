<?php

if ( ! function_exists( 'resonator_core_get_podcast_holder_classes' ) ) {
	/**
	 * Function that return classes for the main podcast holder
	 *
	 * @return string
	 */
	function resonator_core_get_podcast_holder_classes() {
		$classes = array( 'qodef-podcast-single' );
		
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'resonator_core_set_custom_podcast_single_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function resonator_core_set_custom_podcast_single_page_inner_classes( $classes ) {

		if ( is_singular( 'podcast-item' )) {
			$classes = 'qodef-content-full-width';
		}

		return $classes;
	}

	add_filter( 'resonator_filter_page_inner_classes', 'resonator_core_set_custom_podcast_single_page_inner_classes' );
}

if ( ! function_exists( 'resonator_core_generate_podcast_archive_with_shortcode' ) ) {
	/**
	 * Function that executes podcast list shortcode with params on archive pages
	 *
	 * @param string $tax - type of taxonomy
	 * @param string $tax_slug - slug of taxonomy
	 *
	 */
	function resonator_core_generate_podcast_archive_with_shortcode( $tax, $tax_slug ) {
		$params = array();
		
		$params['additional_params']         = 'tax';
		$params['tax']                       = $tax;
		$params['tax_slug']                  = $tax_slug;
		$params['posts_per_page']            = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_posts_per_page' );
		$params['layout']                    = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_item_layout' );
		$params['behavior']                  = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_behavior' );
		$params['masonry_images_proportion'] = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_masonry_images_proportion' );
		$params['columns']                   = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns' );
		$params['space']                     = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_space' );
		$params['columns_responsive']        = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_responsive' );
		$params['columns_1440']              = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_1440' );
		$params['columns_1366']              = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_1366' );
		$params['columns_1024']              = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_1024' );
		$params['columns_768']               = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_768' );
		$params['columns_680']               = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_680' );
		$params['columns_480']               = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_columns_480' );
		$params['slider_loop']               = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_slider_loop' );
		$params['slider_autoplay']           = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_slider_autoplay' );
		$params['slider_speed']              = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_slider_speed' );
		$params['slider_navigation']         = resonator_core_get_post_value_through_levels( 'navigation' );
		$params['slider_pagination']         = resonator_core_get_post_value_through_levels( 'pagination' );
		$params['pagination_type']           = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_pagination_type' );

		echo ResonatorCorePodcastListShortcode::call_shortcode( $params );
	}
}

if ( ! function_exists( 'resonator_core_is_podcast_title_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 *
	 * @param bool $is_enabled
	 *
	 * @return bool
	 */
	function resonator_core_is_podcast_title_enabled( $is_enabled ) {

		if ( is_singular( 'podcast-item' ) ) {
			$podcast_title = resonator_core_get_post_value_through_levels( 'qodef_enable_podcast_title' );
			$is_enabled = $podcast_title == '' ? $is_enabled : ($podcast_title == 'no' ? false : true);
		}
		
		return $is_enabled;
	}
	
	add_filter( 'resonator_core_filter_is_page_title_enabled', 'resonator_core_is_podcast_title_enabled');
}

if ( ! function_exists( 'resonator_core_podcast_title_grid' ) ) {
	/**
	 * Function that check is option enabled
	 *
	 * @param bool $enable_title_grid
	 *
	 * @return bool
	 */
	function resonator_core_podcast_title_grid( $enable_title_grid ) {
		if ( is_singular( 'podcast-item' ) ) {
			$podcast_title_grid = resonator_core_get_post_value_through_levels( 'qodef_set_podcast_title_area_in_grid' );
			$enable_title_grid = $podcast_title_grid == '' ? $enable_title_grid : ($podcast_title_grid == 'no' ? false : true);
		}
		
		return $enable_title_grid;
	}
	
	add_filter( 'resonator_core_filter_page_title_in_grid', 'resonator_core_podcast_title_grid' );
}

if ( ! function_exists( 'resonator_core_podcast_breadcrumbs_title' ) ) {
	/**
	 * Improve main breadcrumbs template with additional cases
	 *
	 * @param string|html $wrap_child
	 * @param array $settings
	 *
	 * @return string|html
	 */
	function resonator_core_podcast_breadcrumbs_title( $wrap_child, $settings ) {
		if ( is_tax( 'podcast-category' ) ) {
			$wrap_child  = '';
			$term_object = get_term( get_queried_object_id(), 'podcast-category' );
			
			if ( isset( $term_object->parent ) && $term_object->parent !== 0 ) {
				$parent     = get_term( $term_object->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}
			
			$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
		} elseif ( is_tax( 'podcast-season' ) ) {
			$wrap_child  = '';
			$term_object = get_term( get_queried_object_id(), 'podcast-season' );

			if ( isset( $term_object->parent ) && $term_object->parent !== 0 ) {
				$parent     = get_term( $term_object->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
		} elseif ( is_singular( 'podcast-item' ) ) {
			$wrap_child = '';
			$post_terms = wp_get_post_terms( get_the_ID(), 'podcast-category' );

			if ( ! empty ( $post_terms ) ) {
				$post_term = $post_terms[0];
				if ( isset( $post_term->parent ) && $post_term->parent !== 0 ) {
					$parent     = get_term( $post_term->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $post_term ), $post_term->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
		}
		
		return $wrap_child;
	}
	
	add_filter( 'resonator_core_filter_breadcrumbs_content', 'resonator_core_podcast_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'resonator_core_set_podcast_title_text' ) ) {
	/**
	 * Function that returns current page title text for WooCommerce pages
	 *
	 * @param string $title
	 *
	 * @return string
	 */
	function resonator_core_set_podcast_title_text( $title ) {

		if ( is_tax( 'podcast-category' ) || is_tax( 'podcast-season' ) ) {
			$taxonomy_slug = is_tax( 'podcast-category' ) ? 'podcast-category' : 'podcast-season';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );

			if ( ! empty( $taxonomy ) ) {
				$title = esc_html( $taxonomy->name );
			}
		}

		return $title;
	}

	add_filter( 'resonator_filter_page_title_text', 'resonator_core_set_podcast_title_text' );
}

if ( ! function_exists( 'resonator_core_set_podcast_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function resonator_core_set_podcast_custom_sidebar_name( $sidebar_name ) {
		
		if ( is_singular( 'podcast-item' ) ) {
			$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_single_custom_sidebar' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'podcast-item' );
			
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_custom_sidebar' );
				}
			}
		}
		
		if ( isset( $option ) && ! empty( $option ) ) {
			$sidebar_name = $option;
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'resonator_filter_sidebar_name', 'resonator_core_set_podcast_custom_sidebar_name' );
}

if ( ! function_exists( 'resonator_core_set_podcast_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function resonator_core_set_podcast_sidebar_layout( $layout ) {
		
		if ( is_singular( 'podcast-item' ) ) {
			$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_single_sidebar_layout' );
		} elseif ( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'podcast-item' );
			foreach ( $taxonomies as $tax ) {
				if ( is_tax( $tax ) ) {
					$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_sidebar_layout' );
				}
			}
		}
		
		if ( isset( $option ) && ! empty( $option ) ) {
			$layout = $option;
		}
		
		return $layout;
	}
	
	add_filter( 'resonator_filter_sidebar_layout', 'resonator_core_set_podcast_sidebar_layout' );
}

if ( ! function_exists( 'resonator_core_set_podcast_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function resonator_core_set_podcast_sidebar_grid_gutter_classes( $classes ) {
		
		if( is_singular( 'podcast-item' ) ) {
			$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_single_sidebar_grid_gutter' );
		} elseif( is_tax() ) {
			$taxonomies = get_object_taxonomies( 'podcast-item' );
			foreach ( $taxonomies as $tax ) {
				if( is_tax( $tax ) ) {
					$option = resonator_core_get_post_value_through_levels( 'qodef_podcast_archive_sidebar_grid_gutter' );
				}
			}
		}
		if ( isset( $option ) && ! empty( $option ) ) {
			$classes = 'qodef-gutter--' . esc_attr( $option );
		}
		
		return $classes;
	}
	
	add_filter('resonator_filter_grid_gutter_classes', 'resonator_core_set_podcast_sidebar_grid_gutter_classes');
}

if ( ! function_exists( 'resonator_core_podcast_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function resonator_core_podcast_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'podcast' ) {
			$position = 50;
		}
		
		return $position;
	}
	
	add_filter( 'resonator_core_filter_admin_options_map_position', 'resonator_core_podcast_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'resonator_core_get_podcast_single_post_taxonomies' ) ) {
	/**
	 * Function that return single post taxonomies list
	 *
	 * @param int $post_id
	 *
	 * @return array
	 */
	function resonator_core_get_podcast_single_post_taxonomies( $post_id ) {
		$options = array();
		
		if ( ! empty( $post_id ) ) {
			$options['podcast-tag']      = wp_get_post_terms( $post_id, 'podcast-tag' );
			$options['podcast-category'] = wp_get_post_terms( $post_id, 'podcast-category' );
			$options['podcast-season'] = wp_get_post_terms( $post_id, 'podcast-season' );
		}
		
		return $options;
	}
}

if ( ! function_exists( 'resonator_core_is_podcast_single' ) ) {
	/**
	 * Check is custom post type single page
	 */
	function resonator_core_is_podcast_single() {
		return is_singular( 'podcast-item' );
	}
}

if ( ! function_exists( 'resonator_core_include_podcast_single_scripts' ) ) {
	/**
	 * Enqueue 3rd party scripts for current module single page
	 */
	function resonator_core_include_podcast_single_scripts() {
		wp_enqueue_script( 'mediaelement-player', RESONATOR_CORE_CPT_URL_PATH . '/podcast/assets/js/plugins/mediaelement-and-player.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'mediaelement-jump-forward', RESONATOR_CORE_CPT_URL_PATH . '/podcast/assets/js/plugins/mediaelement-jump-forward.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'mediaelement-skip-back', RESONATOR_CORE_CPT_URL_PATH . '/podcast/assets/js/plugins/mediaelement-skip-back.js', array( 'jquery' ), false, true );
	}

	add_action( 'resonator_core_action_before_main_js', 'resonator_core_include_podcast_single_scripts' );
}

if ( ! function_exists( 'resonator_core_get_podcast_popup' ) ) {
	/**
	 * Loads subscribe popup HTML
	 */
	function resonator_core_get_podcast_popup() {
		resonator_core_load_podcast_popup_template();
	}

	// Get subscribe popup HTML
	add_action( 'resonator_action_before_wrapper_close_tag', 'resonator_core_get_podcast_popup' );
}

if ( ! function_exists( 'resonator_core_load_podcast_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function resonator_core_load_podcast_popup_template() {

		echo resonator_core_get_template_part( 'post-types/podcast', 'templates/podcast-popup', '' );
	}
}

