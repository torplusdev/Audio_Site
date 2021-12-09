<?php

if ( ! function_exists( 'resonator_core_add_podcast_category_options' ) ) {
	/**
	 * Function that add general taxonomy options for this module
	 */
	function resonator_core_add_podcast_category_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'podcast-category' ),
				'type'  => 'taxonomy',
				'slug'  => 'podcast-category',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_podcast_category_image',
					'title'      => esc_html__( 'Podcast Category Image', 'resonator-core' )
				)
			);
		}

		$page_season = $qode_framework->add_options_page(
			array(
				'scope' => array( 'podcast-season' ),
				'type'  => 'taxonomy',
				'slug'  => 'podcast-season',
			)
		);

		if ( $page_season ) {
			$page_season->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_podcast_season_tagline',
					'title'      => esc_html__( 'Podcast Season Tagline', 'resonator-core' )
				)
			);
			$page_season->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_podcast_season_image',
					'title'      => esc_html__( 'Podcast Season Image', 'resonator-core' )
				)
			);
		}
	}
	
	add_action( 'resonator_core_action_register_cpt_tax_fields', 'resonator_core_add_podcast_category_options' );
}