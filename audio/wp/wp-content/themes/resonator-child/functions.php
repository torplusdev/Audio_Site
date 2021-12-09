<?php

if ( ! function_exists( 'resonator_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function resonator_child_theme_enqueue_scripts() {
		$main_style = 'resonator-main';

		wp_enqueue_style( 'resonator-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'resonator_child_theme_enqueue_scripts' );
}
