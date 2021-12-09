<?php

if ( ! function_exists( 'resonator_core_include_podcast_single_post_related_posts_template' ) ) {
	/**
	 * Function which includes additional module on single podcast page
	 */
	function resonator_core_include_podcast_single_post_related_posts_template() {
		resonator_core_template_part( 'post-types/podcast', 'templates/single/related-posts/templates/related-posts' );
	}
	
	add_action( 'resonator_core_action_after_podcast_single_item', 'resonator_core_include_podcast_single_post_related_posts_template', 20 ); // permission 20 is set to define template position
}
