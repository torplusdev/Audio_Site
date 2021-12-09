<?php

if ( ! function_exists( 'resonator_core_add_podcast_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function resonator_core_add_podcast_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'  => array( 'podcast-item' ),
				'type'   => 'meta',
				'slug'   => 'podcast-item',
				'title'  => esc_html__( 'Podcast Settings', 'resonator-core' ),
				'layout' => 'tabbed'
			)
		);
		
		if ( $page ) {
			
			$general_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-general',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'General Settings', 'resonator-core' ),
					'description' => esc_html__( 'General podcast settings', 'resonator-core' )
				)
			);

			$general_tab->add_field_element(
				array(
					'field_type' => 'text',
					'name' => 'qodef_podcast_episode_number',
					'title' => esc_html__('Episode Number','resonator-core')
				)
			);

			$section_media = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_podcast_media_section',
					'title'       => esc_html__( 'Media', 'resonator-core' ),
				)
			);

			$section_media->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_podcast_file',
					'title'      => esc_html__( 'Podcast Audio File (mp3)', 'resonator-core' ),
					'args'       => array(
						'allowed_type' => '[audio/mpeg]'
					)
				)
			);
			
			$section_links = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_podcast_links_section',
					'title'       => esc_html__( 'Listen on:', 'resonator-core' ),
				)
			);
			
			$section_links->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_apple_podcast_link',
					'title'       => esc_html__( 'Apple Podcast', 'resonator-core' ),
					'description' => esc_html__( 'Enter Apple Podcast URL', 'resonator-core' ),
				)
			);
			
			$section_links->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_spotify_link',
					'title'       => esc_html__( 'Spotify', 'resonator-core' ),
					'description' => esc_html__( 'Enter Spotify URL', 'resonator-core' ),
				)
			);
			
			$section_links->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_soundcloud_link',
					'title'       => esc_html__( 'SoundCloud', 'resonator-core' ),
					'description' => esc_html__( 'Enter SoundCloud URL', 'resonator-core' ),
				)
			);
			
			$section_links->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_rss_feed_link',
					'title'       => esc_html__( 'RSS Feed', 'resonator-core' ),
					'description' => esc_html__( 'Enter RSS Feed URL', 'resonator-core' ),
				)
			);

			$section_parts = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_podcast_parts_section',
					'title'       => esc_html__( 'Parts Settings', 'resonator-core' ),
				)
			);

			$section_parts->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_podcast_parts_image',
					'title'      => esc_html__( 'Parts Section Image', 'resonator-core' ),
				)
			);

			$parts_items_repeater = $section_parts->add_repeater_element(
				array(
					'name'        => 'qodef_podcast_parts_items',
					'title'       => esc_html__( 'Parts Items', 'resonator-core' ),
					'button_text' => esc_html__( 'Add Item', 'resonator-core' )
				)
			);

			$parts_items_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_part_item_label',
					'title'      => esc_html__( 'Item Label', 'resonator-core' )
				)
			);

			$parts_items_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_part_item_value',
					'title'      => esc_html__( 'Item Time', 'resonator-core' )
				)
			);
			
			$section_transcript = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_podcast_transcript_section',
					'title'       => esc_html__( 'Transcript Settings', 'resonator-core' ),
				)
			);

			$section_transcript->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_podcast_transcript_image',
					'title'      => esc_html__( 'Transcript Section Image', 'resonator-core' ),
				)
			);

			$section_transcript->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_podcast_transcript_text',
					'title'      => esc_html__( 'Transcript Text', 'resonator-core' ),
				)
			);

			$section_hosts = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_podcast_hosts_section',
					'title'       => esc_html__( 'Hosts Settings', 'resonator-core' ),
				)
			);

			$all_hosts = array();
			$pages_args = array(
				'post_type' => 'team',
				'posts_per_page' => '-1'
			);
			$team_members = get_posts($pages_args);
			foreach ( $team_members as $team_member ) {
				$all_hosts[ $team_member->ID ] = $team_member->post_title;
			}

			$section_hosts->add_field_element(
				array(
					'field_type'  	=> 'checkbox',
					'name'        	=> 'qodef_podcast_host',
					'title'      	=> esc_html__( 'Podcast Hosts', 'resonator-core' ),
					'options'		=> $all_hosts,
				)
			);
			
			$section_hosts->add_field_element(
				array(
					'field_type'  	=> 'text',
					'name'        	=> 'qodef_podcast_hosts_link',
					'title'      	=> esc_html__( 'Podcast Hosts Link', 'resonator-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_podcast_meta_box_map', $page, $general_tab );
		}
	}
	
	add_action( 'resonator_core_action_default_meta_boxes_init', 'resonator_core_add_podcast_single_meta_box' );
}

if ( ! function_exists( 'resonator_core_include_general_meta_boxes_for_podcast_single' ) ) {
	/**
	 * Function that add general meta box options for this module
	 */
	function resonator_core_include_general_meta_boxes_for_podcast_single() {
		$callbacks = resonator_core_general_meta_box_callbacks();
		
		if ( ! empty( $callbacks ) ) {
			foreach ( $callbacks as $module => $callback ) {
				
				if ( $module !== 'page-sidebar' ) {
					add_action( 'resonator_core_action_after_podcast_meta_box_map', $callback );
				}
			}
		}
	}
	
	add_action( 'resonator_core_action_default_meta_boxes_init', 'resonator_core_include_general_meta_boxes_for_podcast_single', 8 ); // Permission 8 is set in order to load it before default meta box function
}
