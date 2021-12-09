<?php

if ( ! function_exists( 'resonator_core_add_podcast_single_title_link_options' ) ) {
	/**
	 * Function that add additional custom post type single global options
	 *
	 * @param object $page
	 */
	function resonator_core_add_podcast_single_title_link_options( $page ) {
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_enable_apple_podcast_title_link',
					'title'         => esc_html__( 'Apple Podcast Title Area Link', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will display Apple Podcast link in title area', 'resonator-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_enable_spotify_title_link',
					'title'         => esc_html__( 'Spotify Title Area Link', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will display Spotify link in title area', 'resonator-core' ),
					'default_value' => 'no'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_enable_soundcloud_title_link',
					'title'         => esc_html__( 'SoundCloud Title Area Link', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will display SoundCloud link in title area', 'resonator-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_enable_rss_feed_title_link',
					'title'         => esc_html__( 'RSS Feed Title Area Link', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will display RSS Feed link in title area', 'resonator-core' ),
					'default_value' => 'no'
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_after_podcast_options_single', 'resonator_core_add_podcast_single_title_link_options' );
}
