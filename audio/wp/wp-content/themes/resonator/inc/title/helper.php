<?php

if ( ! function_exists( 'resonator_is_page_title_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 */
	function resonator_is_page_title_enabled() {
		return apply_filters( 'resonator_filter_enable_page_title', true );
	}
}

if ( ! function_exists( 'resonator_load_page_title' ) ) {
	/**
	 * Function which loads page template module
	 */
	function resonator_load_page_title() {

		if ( resonator_is_page_title_enabled() ) {
			// Include title template
			echo apply_filters( 'resonator_filter_title_template', resonator_get_template_part( 'title', 'templates/title' ) );
		}
	}

	add_action( 'resonator_action_page_title_template', 'resonator_load_page_title' );
}

if ( ! function_exists( 'resonator_get_page_title_classes' ) ) {
	/**
	 * Function that return classes for page title area
	 *
	 * @return string
	 */
	function resonator_get_page_title_classes() {
		$classes = apply_filters( 'resonator_filter_page_title_classes', array() );

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'resonator_get_page_title_text' ) ) {
	/**
	 * Function that returns current page title text
	 */
	function resonator_get_page_title_text() {
		$title = get_the_title( resonator_get_page_id() );

		if ( ( is_home() && is_front_page() ) || is_singular( 'post' ) ) {
			$title = get_option( 'blogname' );
		} elseif ( is_tag() ) {
			$title = single_term_title( '', false ) . esc_html__( ' Tag', 'resonator' );
		} elseif ( is_date() ) {
			$title = get_the_time( 'F Y' );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author: ', 'resonator' ) . get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			$title = esc_html__( 'Archive', 'resonator' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results for: ', 'resonator' ) . get_search_query();
		} elseif ( is_404() ) {
			$title = esc_html__( '404 - Page not found', 'resonator' );
		}

		return apply_filters( 'resonator_filter_page_title_text', $title );
	}
}
