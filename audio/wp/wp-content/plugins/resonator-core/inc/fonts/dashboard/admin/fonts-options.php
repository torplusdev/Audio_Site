<?php

if ( ! function_exists( 'resonator_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function resonator_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => RESONATOR_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'resonator-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'resonator-core' ),
				'icon'        => 'fa fa-cog'
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'resonator-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts'
					)
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'resonator-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'resonator-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'resonator-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'resonator-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type'  => 'googlefont',
				'name'        => 'qodef_choose_google_font',
				'title'       => esc_html__( 'Google Font', 'resonator-core' ),
				'description' => esc_html__( 'Choose Google Font', 'resonator-core' ),
				'args'        => array(
					'include' => 'google-fonts'
				)
			) );

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'resonator-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'resonator-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'resonator-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'resonator-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'resonator-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'resonator-core' ),
						'300'  => esc_html__( '300 Light', 'resonator-core' ),
						'300i' => esc_html__( '300 Light Italic', 'resonator-core' ),
						'400'  => esc_html__( '400 Regular', 'resonator-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'resonator-core' ),
						'500'  => esc_html__( '500 Medium', 'resonator-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'resonator-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'resonator-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'resonator-core' ),
						'700'  => esc_html__( '700 Bold', 'resonator-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'resonator-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'resonator-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'resonator-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'resonator-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'resonator-core' )
					)
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'resonator-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'resonator-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'resonator-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'resonator-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'resonator-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'resonator-core' ),
						'greek'        => esc_html__( 'Greek', 'resonator-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'resonator-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'resonator-core' )
					)
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'resonator-core' ),
					'description' => esc_html__( 'Add custom fonts', 'resonator-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'resonator-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_ttf',
				'title'      => esc_html__( 'Custom Font TTF', 'resonator-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_otf',
				'title'      => esc_html__( 'Custom Font OTF', 'resonator-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff',
				'title'      => esc_html__( 'Custom Font WOFF', 'resonator-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff2',
				'title'      => esc_html__( 'Custom Font WOFF2', 'resonator-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_custom_font_name',
				'title'      => esc_html__( 'Custom Font Name', 'resonator-core' ),
			) );

			// Hook to include additional options after module options
			do_action( 'resonator_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'resonator_core_action_default_options_init', 'resonator_core_add_fonts_options', resonator_core_get_admin_options_map_position( 'fonts' ) );
}