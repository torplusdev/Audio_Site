<?php

if ( ! function_exists( 'resonator_core_include_podcast_single_post_navigation_template' ) ) {
	/**
	 * Function which includes additional module on single podcast page
	 */
	function resonator_core_include_podcast_single_post_navigation_template() {
		resonator_core_template_part( 'post-types/podcast', 'templates/single/single-navigation/templates/single-navigation' );
	}
	
	add_action( 'resonator_core_action_after_podcast_single_item', 'resonator_core_include_podcast_single_post_navigation_template' );
}
