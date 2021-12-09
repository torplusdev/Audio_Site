<?php

if ( ! function_exists( 'resonator_core_add_podcast_single_related_posts_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function resonator_core_add_podcast_single_related_posts_options( $page ) {
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_single_enable_related_posts',
					'title'         => esc_html__( 'Related Posts', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will show related posts section below post content on podcast single', 'resonator-core' ),
					'default_value' => 'no'
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_podcast_options_single', 'resonator_core_add_podcast_single_related_posts_options' );
}
