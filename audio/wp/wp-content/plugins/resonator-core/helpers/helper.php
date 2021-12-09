<?php

if ( ! function_exists( 'resonator_core_include_core_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function resonator_core_include_core_is_installed( $installed, $plugin ) {
		
		if ( $plugin === 'core' ) {
			return class_exists( 'ResonatorCore' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'resonator_core_include_core_is_installed', 10, 2 );
}

if ( ! function_exists( 'resonator_core_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function resonator_core_list_sc_template_part( $module, $template, $slug = '', $params = array() ) {
		echo resonator_core_get_list_sc_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_core_get_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function resonator_core_get_list_sc_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = RESONATOR_CORE_INC_PATH;
		
		return qode_framework_get_list_sc_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_core_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 */
	function resonator_core_template_part( $module, $template, $slug = '', $params = array() ) {
		echo resonator_core_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_core_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function resonator_core_get_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = RESONATOR_CORE_INC_PATH;
		
		return qode_framework_get_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_core_theme_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function resonator_core_theme_template_part( $module, $template, $slug = '', $params = array() ) {
		echo resonator_core_get_theme_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_core_get_theme_template_part' ) ) {
	/**
	 * Function that load module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function resonator_core_get_theme_template_part( $module, $template, $slug = '', $params = array() ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_template_part( $module, $template, $slug, $params ) : '';
	}
}

if ( ! function_exists( 'resonator_core_get_option_value' ) ) {
	/**
	 * Function that returns option value using framework function but providing it's own scope
	 *
	 * @param string $type option type
	 * @param string $name name of option
	 * @param string $default_value option default value
	 * @param int    $post_id id of
	 *
	 * @return string value of option
	 */
	function resonator_core_get_option_value( $type, $name, $default_value = '', $post_id = null ) {
		$scope = RESONATOR_CORE_OPTIONS_NAME;
		
		return qode_framework_get_option_value( $scope, $type, $name, $default_value, $post_id );
	}
}

if ( ! function_exists( 'resonator_core_get_post_value_through_levels' ) ) {
	/**
	 * Function that returns meta value if exists, otherwise global value using framework function but providing it's own scope
	 *
	 * @param string $name name of option
	 * @param int    $post_id id of
	 *
	 * @return string|array value of option
	 */
	function resonator_core_get_post_value_through_levels( $name, $post_id = null ) {
		$scope = RESONATOR_CORE_OPTIONS_NAME;
		
		return qode_framework_get_post_value_through_levels( $scope, $name, $post_id );
	}
}

if ( ! function_exists( 'resonator_core_general_meta_box_callbacks' ) ) {
	/**
	 * Function that return general meta box callback functions
	 *
	 * @return array
	 */
	function resonator_core_general_meta_box_callbacks() {
		return apply_filters( 'resonator_core_filter_general_meta_box_callbacks', array() );
	}
}

if ( ! function_exists( 'resonator_core_get_query_params' ) ) {
	/**
	 * Function that return query parameters
	 *
	 * @param array $atts - options value
	 *
	 * @return array
	 */
	function resonator_core_get_query_params( $atts ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_query_params( $atts ) : array();
	}
}

if ( ! function_exists( 'resonator_core_get_pagination_data' ) ) {
	/**
	 * Function that return pagination data
	 *
	 * @param string $plugin - plugin name
	 * @param string $module - module name
	 * @param string $shortcode - shortcode name
	 * @param string $post_type - post type value
	 * @param array $params - shortcode params
	 *
	 * @return array
	 */
	function resonator_core_get_pagination_data( $plugin, $module, $shortcode, $post_type, $params ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_pagination_data( $plugin, $module, $shortcode, $post_type, $params ) : array();
	}
}

if ( ! function_exists( 'resonator_core_get_page_content_sidebar_classes' ) ) {
	/**
	 * Function that returns classes for the content when sidebar is enabled
	 *
	 * @return string
	 */
	function resonator_core_get_page_content_sidebar_classes() {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_page_content_sidebar_classes() : '';
	}
}

if ( ! function_exists( 'resonator_core_get_grid_gutter_classes' ) ) {
	/**
	 * Function that returns classes for the gutter when sidebar is enabled
	 *
	 * @return string
	 */
	function resonator_core_get_grid_gutter_classes() {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_grid_gutter_classes() : '';
	}
}

if ( ! function_exists( 'resonator_core_render_svg_icon' ) ) {
	/**
	 * Function that print svg html icon
	 *
	 * @param string $name - icon name
	 * @param string $class_name - custom html tag class name
	 */
	function resonator_core_render_svg_icon( $name, $class_name = '' ) {
		echo resonator_core_get_svg_icon( $name, $class_name );
	}
}

if ( ! function_exists( 'resonator_core_get_svg_icon' ) ) {
	/**
	 * Returns svg html
	 *
	 * @param string $name - icon name
	 * @param string $class_name - custom html tag class name
	 *
	 * @return string|html
	 */
	function resonator_core_get_svg_icon(  $name, $class_name = '' ) {
		return qode_framework_is_installed( 'theme' ) ? resonator_get_svg_icon( $name, $class_name ) : '';
	}
}

if ( ! function_exists( 'resonator_core_get_custom_sidebars' ) ) {
	/**
	 * Function that return custom sidebars
	 *
	 * @param bool $enable_default - add first element empty for default value
	 *
	 * @return array
	 */
	function resonator_core_get_custom_sidebars( $enable_default = true ) {
		$sidebars = array();
		
		if ( class_exists( 'QodeFrameworkCustomSidebar' ) ) {
			$qode_framework = qode_framework_get_framework_root();
			
			$sidebars = $qode_framework->get_custom_sidebars()->get_custom_sidebars( $enable_default );
		}
		
		return $sidebars;
	}
}

if ( ! function_exists( 'resonator_core_get_customizer_logo' ) ) {
	/**
	 * Function that returns customizer image
	 *
	 * @return string that contains html for logo image
	 */
	function resonator_core_get_customizer_logo() {
		$customizer_image = '';
		$customizer_logo  = get_custom_logo();
		
		if ( ! empty( $customizer_logo ) ) {
			$customizer_logo_id = get_theme_mod( 'custom_logo' );
			
			if ( $customizer_logo_id ) {
				$customizer_logo_id_attr = array(
					'class'    => 'qodef-header-logo-image qodef--main qodef--customizer',
					'itemprop' => 'logo',
				);
				
				$image_alt = get_post_meta( $customizer_logo_id, '_wp_attachment_image_alt', true );
				if ( empty( $image_alt ) ) {
					$customizer_logo_id_attr['alt'] = get_bloginfo( 'name', 'display' );
				}
				
				$customizer_image = wp_get_attachment_image( $customizer_logo_id, 'full', false, $customizer_logo_id_attr );
			}
		}
		
		return $customizer_image;
	}
}

if ( ! function_exists( 'resonator_core_add_responsive_inline_style' ) ) {
	/**
	 * Function that generates global inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function resonator_core_add_responsive_inline_style( $style ) {
		$full_style = '';
		
		$responsive_sizes = array( '1366', '1024', '768', '680' );
		foreach ( $responsive_sizes as $responsive_size ) {
			$responsive_style = apply_filters( 'resonator_core_filter_add_responsive_' . $responsive_size . '_inline_style', $responsive_style = '' );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (max-width: ' . $responsive_size . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		$responsive_range_sizes = array( '1024_1366', '768_1024', '680_768' );
		foreach ( $responsive_range_sizes as $responsive_range_size ) {
			$responsive_style = apply_filters( 'resonator_core_filter_add_responsive_' . $responsive_range_size . '_inline_style', $responsive_style = '' );
			$responsive_range = explode( '_', $responsive_range_size );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (min-width: ' . ( intval( $responsive_range[0] ) + 1 ) . 'px) and (max-width: ' . $responsive_range[1] . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		if ( ! empty( $full_style ) ) {
			$style = $style . $full_style;
		}
		
		return $style;
	}
	
	add_filter( 'resonator_filter_add_inline_style', 'resonator_core_add_responsive_inline_style', 12 ); // Permission 12 is set in order to load it last
}

if ( ! function_exists( 'resonator_core_print_custom_css_in_footer' ) ) {
	/**
	 * Function that generates global inline styles inside footer area
	 *
	 * @return string
	 */
	function resonator_core_print_custom_css_in_footer() {
		$full_style = '';
		
		$responsive_sizes = array( '1440', '1366', '1280', '1024', '768', '680' );
		foreach ( $responsive_sizes as $responsive_size ) {
			$responsive_style = apply_filters( 'resonator_core_filter_add_responsive_' . $responsive_size . '_inline_style_in_footer', $responsive_style = '' );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (max-width: ' . $responsive_size . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		$responsive_range_sizes = array( '1366_1440', '1280_1366', '1024_1280', '768_1024', '680_768' );
		foreach ( $responsive_range_sizes as $responsive_range_size ) {
			$responsive_style = apply_filters( 'resonator_core_filter_add_responsive_' . $responsive_range_size . '_inline_style_in_footer', $responsive_style = '' );
			$responsive_range = explode( '_', $responsive_range_size );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (min-width: ' . ( intval( $responsive_range[0] ) + 1 ) . 'px) and (max-width: ' . $responsive_range[1] . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		if ( $full_style != '' ) {
			echo '<div id="resonator-core-page-inline-style" data-style="' . esc_attr( $full_style ) . '"></div>';
		}
	}
	
	add_action( 'wp_footer', 'resonator_core_print_custom_css_in_footer', 999 ); // 999 permission is set in order to add inline style been at the last place
}

if ( ! function_exists( 'resonator_core_get_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position
	 *
	 * @param string $map
	 *
	 * @return int
	 */
	function resonator_core_get_admin_options_map_position( $map ) {
		$position = 10;
		
		switch ( $map ) {
			case 'general':
				$position = 1;
				break;
			case 'logo':
				$position = 2;
				break;
			case 'fonts':
				$position = 4;
				break;
			case 'typography':
				$position = 6;
				break;
			case 'header':
				$position = 8;
				break;
			case 'mobile-header':
				$position = 10;
				break;
			case 'fullscreen-menu':
				$position = 12;
				break;
			case 'title':
				$position = 14;
				break;
			case 'sidebar':
				$position = 16;
				break;
			case 'footer':
				$position = 18;
				break;
			case 'search':
				$position = 20;
				break;
			case 'side-area':
				$position = 22;
				break;
			case 'blog':
				$position = 24;
				break;
			case 'social-share':
				$position = 26;
				break;
			case 'maps':
				$position = 28;
				break;
			case 'subscribe-popup':
				$position = 99;
				break;
			case '404':
				$position = 100;
				break;
		}
		
		return apply_filters( 'resonator_core_filter_admin_options_map_position', $position, $map );
	}
}

if ( ! function_exists( 'resonator_core_get_variations_options_map' ) ) {
	/**
	 * Function that return options map for module variations
	 *
	 * @param array $variations
	 * @param boolean $default_empty
	 *
	 * @return array
	 */
	function resonator_core_get_variations_options_map( $variations, $default_empty = false ) {
		$map = array();
		
		if ( ! empty( $variations ) ) {
			$map['visibility'] = sizeof( $variations ) > 1;
			
			reset( $variations );
			$map['default_value'] = key( $variations );
			
			if ( $default_empty ) {
				$map['default_value'] = '';
			}
			
		} else {
			$map['visibility']    = false;
			$map['default_value'] = '';
		}
		
		return $map;
	}
}

if ( ! function_exists( 'resonator_core_get_select_type_options_pool' ) ) {
	/**
	 * Function that returns array with pool of options for select fields in framework
	 *
	 *
	 * @param string $type - type of select field
	 * @param bool $enable_default - add first element empty for default value
	 * @param array $exclude - array of items to exclude
	 * @param array $include - array of items to include
	 *
	 * @return array escaped output
	 */
	function resonator_core_get_select_type_options_pool( $type, $enable_default = true, $exclude = array(), $include = array() ) {
		$options = array();
		if ( $enable_default ) {
			$options[''] = esc_html__( 'Default', 'resonator-core' );
		}
		switch ( $type ) {
			case 'content_width':
				$options['1400'] = esc_html__( '1400px', 'resonator-core' );
				$options['1300'] = esc_html__( '1300px', 'resonator-core' );
				$options['1200'] = esc_html__( '1200px', 'resonator-core' );
				$options['1100'] = esc_html__( '1100px', 'resonator-core' );
				$options['1000'] = esc_html__( '1000px', 'resonator-core' );
				$options['800']  = esc_html__( '800px', 'resonator-core' );
				break;
			case 'title_tag':
				$options['h1'] = 'H1';
				$options['h2'] = 'H2';
				$options['h3'] = 'H3';
				$options['h4'] = 'H4';
				$options['h5'] = 'H5';
				$options['h6'] = 'H6';
				$options['p']  = 'P';
				break;
			case 'link_target':
				$options['_self']  = esc_html__( 'Same Window', 'resonator-core' );
				$options['_blank'] = esc_html__( 'New Window', 'resonator-core' );
				break;
			case 'border_style':
				$options['solid']  = esc_html__( 'Solid', 'resonator-core' );
				$options['dashed'] = esc_html__( 'Dashed', 'resonator-core' );
				$options['dotted'] = esc_html__( 'Dotted', 'resonator-core' );
				break;
			case 'font_weight':
				$options['100'] = esc_html__( 'Thin (100)', 'resonator-core' );
				$options['200'] = esc_html__( 'Extra Light (200)', 'resonator-core' );
				$options['300'] = esc_html__( 'Light (300)', 'resonator-core' );
				$options['400'] = esc_html__( 'Normal (400)', 'resonator-core' );
				$options['500'] = esc_html__( 'Medium (500)', 'resonator-core' );
				$options['600'] = esc_html__( 'Semi Bold (600)', 'resonator-core' );
				$options['700'] = esc_html__( 'Bold (700)', 'resonator-core' );
				$options['800'] = esc_html__( 'Extra Bold (800)', 'resonator-core' );
				$options['900'] = esc_html__( 'Black (900)', 'resonator-core' );
				break;
			case 'font_style':
				$options['normal']  = esc_html__( 'Normal', 'resonator-core' );
				$options['italic']  = esc_html__( 'Italic', 'resonator-core' );
				$options['oblique'] = esc_html__( 'Oblique', 'resonator-core' );
				$options['initial'] = esc_html__( 'Initial', 'resonator-core' );
				$options['inherit'] = esc_html__( 'Inherit', 'resonator-core' );
				break;
			case 'text_transform':
				$options['none']       = esc_html__( 'None', 'resonator-core' );
				$options['capitalize'] = esc_html__( 'Capitalize', 'resonator-core' );
				$options['uppercase']  = esc_html__( 'Uppercase', 'resonator-core' );
				$options['lowercase']  = esc_html__( 'Lowercase', 'resonator-core' );
				$options['initial']    = esc_html__( 'Initial', 'resonator-core' );
				$options['inherit']    = esc_html__( 'Inherit', 'resonator-core' );
				break;
				break;
			case 'text_decoration':
				$options['none']         = esc_html__( 'None', 'resonator-core' );
				$options['underline']    = esc_html__( 'Underline', 'resonator-core' );
				$options['overline']     = esc_html__( 'Overline', 'resonator-core' );
				$options['line-through'] = esc_html__( 'Line-Through', 'resonator-core' );
				$options['initial']      = esc_html__( 'Initial', 'resonator-core' );
				$options['inherit']      = esc_html__( 'Inherit', 'resonator-core' );
				break;
			case 'list_behavior':
				$options['columns']           = esc_html__( 'Gallery', 'resonator-core' );
				$options['masonry']           = esc_html__( 'Masonry', 'resonator-core' );
				$options['slider']            = esc_html__( 'Slider', 'resonator-core' );
				$options['justified-gallery'] = esc_html__( 'Justified Gallery', 'resonator-core' );
				break;
			case 'columns_number':
				$options['1'] = esc_html__( 'One', 'resonator-core' );
				$options['2'] = esc_html__( 'Two', 'resonator-core' );
				$options['3'] = esc_html__( 'Three', 'resonator-core' );
				$options['4'] = esc_html__( 'Four', 'resonator-core' );
				$options['5'] = esc_html__( 'Five', 'resonator-core' );
				$options['6'] = esc_html__( 'Six', 'resonator-core' );
				break;
			case 'items_space':
				$options['huge']        = esc_html__( 'Huge (40)', 'resonator-core' );
				$options['great']       = esc_html__( 'Great (38)', 'resonator-core' );
				$options['extra-large'] = esc_html__( 'Extra Large (35)', 'resonator-core' );
				$options['large']       = esc_html__( 'Large (25)', 'resonator-core' );
				$options['medium']      = esc_html__( 'Medium (20)', 'resonator-core' );
				$options['normal']      = esc_html__( 'Normal (15)', 'resonator-core' );
				$options['little']      = esc_html__( 'Little (13)', 'resonator-core' );
				$options['small']       = esc_html__( 'Small (10)', 'resonator-core' );
				$options['tiny']        = esc_html__( 'Tiny (5)', 'resonator-core' );
				$options['no']          = esc_html__( 'No (0)', 'resonator-core' );
				break;
			case 'order_by':
				$options['date']       = esc_html__( 'Date', 'resonator-core' );
				$options['ID']         = esc_html__( 'ID', 'resonator-core' );
				$options['menu_order'] = esc_html__( 'Menu Order', 'resonator-core' );
				$options['name']       = esc_html__( 'Post Name', 'resonator-core' );
				$options['rand']       = esc_html__( 'Random', 'resonator-core' );
				$options['title']      = esc_html__( 'Title', 'resonator-core' );
				break;
			case 'order':
				$options['DESC'] = esc_html__( 'Descending', 'resonator-core' );
				$options['ASC']  = esc_html__( 'Ascending', 'resonator-core' );
				break;
			case 'pagination_type':
				$options['no-pagination']   = esc_html__( 'No Pagination', 'resonator-core' );
				$options['standard']        = esc_html__( 'Standard', 'resonator-core' );
				$options['load-more']       = esc_html__( 'Load More', 'resonator-core' );
				$options['infinite-scroll'] = esc_html__( 'Infinite Scroll', 'resonator-core' );
				break;
			case 'columns_responsive':
				$options['predefined'] = esc_html__( 'Predefined', 'resonator-core' );
				$options['custom']     = esc_html__( 'Custom', 'resonator-core' );
				break;
			case 'yes_no':
				$options['yes'] = esc_html__( 'Yes', 'resonator-core' );
				$options['no']  = esc_html__( 'No', 'resonator-core' );
				break;
			case 'no_yes':
				$options['no']  = esc_html__( 'No', 'resonator-core' );
				$options['yes'] = esc_html__( 'Yes', 'resonator-core' );
				break;
			case 'sidebar_layouts':
				$options['no-sidebar']       = esc_html__( 'No Sidebar', 'resonator-core' );
				$options['sidebar-33-right'] = esc_html__( 'Sidebar 1/3 Right', 'resonator-core' );
				$options['sidebar-25-right'] = esc_html__( 'Sidebar 1/4 Right', 'resonator-core' );
				$options['sidebar-33-left']  = esc_html__( 'Sidebar 1/3 Left', 'resonator-core' );
				$options['sidebar-25-left']  = esc_html__( 'Sidebar 1/4 Left', 'resonator-core' );
				break;
			case 'icon_source':
				$options['icon_pack']  = esc_html__( 'Icon Pack', 'resonator-core' );
				$options['svg_path']   = esc_html__( 'SVG Path', 'resonator-core' );
				$options['predefined'] = esc_html__( 'Predefined', 'resonator-core' );
				break;
			case 'list_image_dimension':
				$options['full']      = esc_html__( 'Original', 'resonator-core' );
				$options['thumbnail'] = esc_html__( 'Thumbnail', 'resonator-core' );
				$options['medium']    = esc_html__( 'Medium', 'resonator-core' );
				$options['large']     = esc_html__( 'Large', 'resonator-core' );
				$options['custom']    = esc_html__( 'Custom', 'resonator-core' );
				$options              = apply_filters( 'qode_framework_filter_pool_list_image_dimension', $options );
				break;
			case 'weekdays':
				$options['monday']    = esc_html__( 'Monday', 'resonator-core' );
				$options['tuesday']   = esc_html__( 'Tuesday', 'resonator-core' );
				$options['wednesday'] = esc_html__( 'Wednesday', 'resonator-core' );
				$options['thursday']  = esc_html__( 'Thursday', 'resonator-core' );
				$options['friday']    = esc_html__( 'Friday', 'resonator-core' );
				$options['saturday']  = esc_html__( 'Saturday', 'resonator-core' );
				$options['sunday']    = esc_html__( 'Sunday', 'resonator-core' );
				break;
		}
		
		if ( ! empty( $exclude ) ) {
			foreach ( $exclude as $e ) {
				if ( array_key_exists( $e, $options ) ) {
					unset( $options[ $e ] );
				}
			}
		}
		
		if ( ! empty( $include ) ) {
			foreach ( $include as $key => $value ) {
				if ( ! array_key_exists( $key, $options ) ) {
					$options[ $key ] = $value;
				}
			}
		}
		
		return apply_filters( 'resonator_core_filter_select_type_option', $options, $type, $enable_default, $exclude );
	}
}

if ( ! function_exists( 'resonator_core_get_space_value' ) ) {
	/**
	 * Function that returns spacing value based on selected option
	 *
	 * @param string $text_value - textual value of spacing
	 *
	 * @return int
	 */
	function resonator_core_get_space_value( $text_value ) {
		switch ( $text_value ) {
			case 'custom-wast':
				return 200;
				break;
			case 'huge':
				return 40;
				break;
			case 'great':
				return 38;
				break;
			case 'extra-large':
				return 35;
				break;
			case 'large':
				return 25;
				break;
			case 'medium':
				return 20;
				break;
			case 'normal':
				return 15;
				break;
			case 'little':
				return 13;
				break;
			case 'small':
				return 10;
				break;
			case 'tiny':
				return 5;
				break;
			default:
				return is_int( $text_value ) ? $text_value : 0;
				break;
		}
	}
}

if ( ! function_exists( 'resonator_core_get_typography_styles' ) ) {
	/**
	 * Generates typography styles
	 *
	 * @param string $scope
	 * @param string $field_name
	 *
	 * @return array
	 */
	function resonator_core_get_typography_styles( $scope, $field_name ) {
		$color           = qode_framework_get_option_value( $scope, 'admin', $field_name . '_color' );
		$font_family     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_family' );
		$font_size       = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_size' );
		$line_height     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_line_height' );
		$letter_spacing  = qode_framework_get_option_value( $scope, 'admin', $field_name . '_letter_spacing' );
		$font_weight     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_weight' );
		$text_transform  = qode_framework_get_option_value( $scope, 'admin', $field_name . '_text_transform' );
		$font_style      = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_style' );
		$text_decoration = qode_framework_get_option_value( $scope, 'admin', $field_name . '_text_decoration' );
		$margin_top      = qode_framework_get_option_value( $scope, 'admin', $field_name . '_margin_top' );
		$margin_bottom   = qode_framework_get_option_value( $scope, 'admin', $field_name . '_margin_bottom' );
		
		$styles = array();
		
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		if ( isset( $font_family ) && $font_family !== false && $font_family !== '-1' && $font_family !== '' ) {
			$styles['font-family'] = qode_framework_get_formatted_font_family( $font_family );
		}
		
		if ( ! empty( $font_size ) ) {
			if ( qode_framework_string_ends_with_typography_units( $font_size ) ) {
				$styles['font-size'] = $font_size;
			} else {
				$styles['font-size'] = intval( $font_size ) . 'px';
			}
		}
		
		if ( ! empty( $line_height ) ) {
			if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
				$styles['line-height'] = $line_height;
			} else {
				$styles['line-height'] = intval( $line_height ) . 'px';
			}
		}
		
		if ( ! empty( $font_style ) ) {
			$styles['font-style'] = $font_style;
		}
		
		if ( ! empty( $font_weight ) ) {
			$styles['font-weight'] = $font_weight;
		}
		
		if ( ! empty( $text_decoration ) ) {
			$styles['text-decoration'] = $text_decoration;
		}
		
		if ( $letter_spacing !== '' && ! is_bool( $letter_spacing ) ) {
			if ( qode_framework_string_ends_with_typography_units( $letter_spacing ) ) {
				$styles['letter-spacing'] = $letter_spacing;
			} else {
				$styles['letter-spacing'] = intval( $letter_spacing ) . 'px';
			}
		}
		
		if ( ! empty( $text_transform ) ) {
			$styles['text-transform'] = $text_transform;
		}
		
		if ( ! empty( $margin_top ) ) {
			if ( qode_framework_string_ends_with_space_units( $margin_top, true ) ) {
				$styles['margin-top'] = $margin_top;
			} else {
				$styles['margin-top'] = intval( $margin_top ) . 'px';
			}
		}
		
		if ( ! empty( $margin_bottom ) ) {
			if ( qode_framework_string_ends_with_space_units( $margin_bottom, true ) ) {
				$styles['margin-bottom'] = $margin_bottom;
			} else {
				$styles['margin-bottom'] = intval( $margin_bottom ) . 'px';
			}
		}
		
		return $styles;
	}
}

if ( ! function_exists( 'resonator_core_get_typography_hover_styles' ) ) {
	/**
	 * Generates hover typography styles
	 *
	 * @param string $scope
	 * @param string $field_name
	 *
	 * @return array
	 */
	function resonator_core_get_typography_hover_styles( $scope, $field_name ) {
		$hover_color           = qode_framework_get_option_value( $scope, 'admin', $field_name . '_hover_color' );
		$hover_text_decoration = qode_framework_get_option_value( $scope, 'admin', $field_name . '_hover_text_decoration' );
		
		$styles = array();
		
		if ( ! empty( $hover_color ) ) {
			$styles['color'] = $hover_color;
		}
		
		if ( ! empty( $hover_text_decoration ) ) {
			$styles['text-decoration'] = $hover_text_decoration;
		}
		
		return $styles;
	}
}

if ( ! function_exists( 'resonator_core_get_custom_post_type_related_posts' ) ) {
	/**
	 * Function which return related posts for forward post item
	 *
	 * @param int $post_id
	 * @param array $allowed_types
	 *
	 * @return array
	 */
	function resonator_core_get_custom_post_type_related_posts( $post_id, $allowed_types ) {
		$related_posts = array();
		
		if ( ! empty( $post_id ) && ! empty( $allowed_types ) ) {
			foreach ( $allowed_types as $key => $value ) {
				$term_ids = array();
				
				if ( ! empty( $value ) ) {
					foreach ( $value as $term ) {
						$term_ids[] = $term->term_id;
					}
				}
				
				if ( ! empty( $term_ids ) ) {
					$related_posts_by_term = resonator_core_get_custom_post_type_related_posts_by_term( $post_id, $term_ids, $key );
					
					if ( ! empty( $related_posts_by_term->posts ) ) {
						$items_id = array();
						
						foreach ( $related_posts_by_term->posts as $related_post ) {
							$items_id[] = $related_post->ID;
						}
						
						$related_posts = array(
							'items' => implode( ',', $items_id )
						);
						
						return $related_posts;
						break;
					}
				}
			}
		}
		
		return $related_posts;
	}
}

if ( ! function_exists( 'resonator_core_get_custom_post_type_related_posts_by_term' ) ) {
	/**
	 * Function which return related posts query object
	 *
	 * @param int $post_id
	 * @param array $term_ids
	 * @param string $slug
	 *
	 * @return WP_Query
	 */
	function resonator_core_get_custom_post_type_related_posts_by_term( $post_id, $term_ids, $slug ) {
		$args = apply_filters( 'resonator_core_filter_custom_post_type_related_posts_by_term', array(
			'post_status'    => 'publish',
			'post_type'      => get_post_type( $post_id ),
			'post__not_in'   => array( $post_id ),
			$slug . '__in'   => $term_ids,
			'orderby'        => 'rand',
			'posts_per_page' => 6 // 6 is random value in case that someone change with filter number of posts for related posts item
		) );
		
		$related_posts = new \WP_Query( $args );
		
		return $related_posts;
	}
}

if ( ! function_exists( 'resonator_core_get_custom_post_type_taxonomy_query_args' ) ) {
	/**
	 * Function that return query parameters
	 *
	 * @param array $params - options value
	 * @param array $include - additional query arguments
	 *
	 * @return array
	 */
	function resonator_core_get_custom_post_type_taxonomy_query_args( $params, $include = array() ) {
		$args = array();
		
		if ( isset( $params['taxonomy'] ) && ! empty( $params['taxonomy'] ) ) {
			$args['taxonomy'] = $params['taxonomy'];
		}
		
		if ( isset( $params['posts_per_page'] ) && ! empty( $params['posts_per_page'] ) ) {
			$args['number'] = $params['posts_per_page'];
		}
		
		if ( isset( $params['orderby'] ) && ! empty( $params['orderby'] ) ) {
			$args['orderby'] = $params['orderby'];
		}
		
		if ( isset( $params['order'] ) && ! empty( $params['order'] ) ) {
			$args['order'] = $params['order'];
		}
		
		$args['hide_empty'] = isset( $params['hide_empty'] ) && $params['hide_empty'] === 'yes';
		
		if ( isset( $params['taxonomy_ids'] ) && ! empty( $params['taxonomy_ids'] ) ) {
			$args['include'] = explode( ',', trim( $params['taxonomy_ids'] ) );
		}
	
		if ( ! empty( $include ) ) {
			foreach ( $include as $key => $value ) {
				if ( ! array_key_exists( $key, $args ) ) {
					$args[ $key ] = $value;
				}
			}
		}
		
		return $args;
	}
}

if ( ! function_exists( 'resonator_core_get_custom_post_type_excerpt' ) ) {
	/**
	 * Return excerpt text for current custom post type item
	 *
	 * @param int $excerpt_length
	 * @param string $custom_excerpt
	 *
	 * @return string
	 */
	function resonator_core_get_custom_post_type_excerpt( $excerpt_length, $custom_excerpt = '' ) {
		$excerpt      = '';
		$item_excerpt = get_the_excerpt();
		
		if ( empty( $item_excerpt ) && ! empty( $custom_excerpt ) ) {
			$item_excerpt = esc_html( $custom_excerpt );
		}
		
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = apply_filters( 'resonator_core_filter_post_excerpt_length', 180 ); // 180 is number of characters
		}
		
		if ( ! empty( $item_excerpt ) ) {
			$excerpt = ( $excerpt_length > 0 ) ? substr( $item_excerpt, 0, intval( $excerpt_length ) ) : $item_excerpt;
		}
		
		return strip_tags( strip_shortcodes( $excerpt ) );
	}
}

if ( ! function_exists( 'resonator_core_render_page_builder_post_content' ) ) {
	/**
	 * Function that print post content unmodified by page builder
	 *
	 * @param int $id post id
	 */
	function resonator_core_render_page_builder_post_content( $id ) {
		
		if ( qode_framework_is_installed( 'elementor' ) ) {
			echo resonator_core_get_elementor_instance()->frontend->get_builder_content( $id, true );
		} else {
			the_content();
		}
	}
}
