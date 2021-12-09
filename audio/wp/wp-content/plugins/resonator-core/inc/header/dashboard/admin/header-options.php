<?php

if ( ! function_exists( 'resonator_core_add_header_options' ) ) {
	/**
	 * Function that add header options for this module
	 */
	function resonator_core_add_header_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => RESONATOR_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'layout'      => 'tabbed',
				'slug'        => 'header',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Header', 'resonator-core' ),
				'description' => esc_html__( 'Global Header Options', 'resonator-core' )
			)
		);

		if ( $page ) {
			$general_tab = $page->add_tab_element(
				array(
					'name'  => 'tab-header-general',
					'icon'  => 'fa fa-cog',
					'title' => esc_html__( 'General Settings', 'resonator-core' )
				)
			);
			
			$general_tab->add_field_element(
				array(
					'field_type'    => 'radio',
					'name'          => 'qodef_header_layout',
					'title'         => esc_html__( 'Header Layout', 'resonator-core' ),
					'description'   => esc_html__( 'Choose a header layout to set for your website', 'resonator-core' ),
					'args'          => array( 'images' => true ),
					'options'       => apply_filters( 'resonator_core_filter_header_layout_option', $header_layout_options = array() ),
					'default_value' => apply_filters( 'resonator_core_filter_header_layout_default_option_value', '' ),
				)
			);

			$general_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_skin',
					'title'       => esc_html__( 'Header Skin', 'resonator-core' ),
					'description' => esc_html__( 'Choose a predefined header style for header elements', 'resonator-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'resonator-core' ),
						'light' => esc_html__( 'Light', 'resonator-core' ),
						'dark'  => esc_html__( 'Dark', 'resonator-core' )
					)
				)
			);

			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_header_options_map', $page, $general_tab );
		}
	}

	add_action( 'resonator_core_action_default_options_init', 'resonator_core_add_header_options', resonator_core_get_admin_options_map_position( 'header' ) );
}