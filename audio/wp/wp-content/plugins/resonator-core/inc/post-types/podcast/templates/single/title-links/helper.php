<?php

if ( ! function_exists( 'resonator_core_include_podcast_single_title_links_template' ) ) {
	/**
	 * Function which includes additional module on single podcast page
	 */
	function resonator_core_include_podcast_single_title_links_template() {
		if ( is_singular( 'podcast-item' ) ) {
			resonator_core_template_part( 'post-types/podcast', 'templates/single/title-links/templates/title-links' );
		}
	}
	
	add_action( 'resonator_action_after_standard_title_content', 'resonator_core_include_podcast_single_title_links_template' );
}
