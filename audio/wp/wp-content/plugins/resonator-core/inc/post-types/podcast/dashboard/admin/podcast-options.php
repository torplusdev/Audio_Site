<?php

if ( ! function_exists( 'resonator_core_add_podcast_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function resonator_core_add_podcast_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => RESONATOR_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'podcast-item',
				'layout'      => 'tabbed',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Podcast', 'resonator-core' ),
				'description' => esc_html__( 'Global settings related to podcast', 'resonator-core' )
			)
		);

		if ( $page ) {
			$archive_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-archive',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Podcast List', 'resonator-core' ),
					'description' => esc_html__( 'Settings related to podcast archive pages', 'resonator-core' )
				)
			);

			// Hook to include additional options after archive module options
			do_action( 'resonator_core_action_after_podcast_options_archive', $archive_tab );
		
			$single_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-single',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Podcast Single', 'resonator-core' ),
					'description' => esc_html__( 'Settings related to podcast single pages', 'resonator-core' )
				)
			);
			
			// Hook to include additional options after single module options
			do_action( 'resonator_core_action_after_podcast_options_single', $single_tab );
			
			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_podcast_options_map', $page );
			
		}
	}

	add_action( 'resonator_core_action_default_options_init', 'resonator_core_add_podcast_options', resonator_core_get_admin_options_map_position( 'podcast' ) );
}