<?php

if ( ! function_exists( 'resonator_core_add_podcast_single_navigation_options' ) ) {
	/**
	 * Function that add additional custom post type single global options
	 *
	 * @param object $page
	 */
	function resonator_core_add_podcast_single_navigation_options( $page ) {

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_enable_navigation',
					'title'         => esc_html__( 'Navigation', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on podcast navigation functionality', 'resonator-core' ),
					'default_value' => 'yes'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_podcast_navigation_through_same_category',
					'title'         => esc_html__( 'Navigation Through Same Category', 'resonator-core' ),
					'description'   => esc_html__( 'Enabling this option will make podcast navigation sort through current category', 'resonator-core' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'qodef_podcast_enable_navigation' => array(
								'values'        => 'yes',
								'default_value' => 'yes'
							)
						)
					)
				)
			);
		}
	}

	add_action( 'resonator_core_action_after_podcast_options_single', 'resonator_core_add_podcast_single_navigation_options' );
}