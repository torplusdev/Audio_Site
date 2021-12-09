<?php

if ( ! function_exists( 'resonator_is_installed' ) ) {
	/**
	 * Function that checks if forward plugin installed
	 *
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function resonator_is_installed( $plugin ) {

		switch ( $plugin ) {
			case 'framework':
				return class_exists( 'QodeFramework' );
				break;
			case 'core':
				return class_exists( 'ResonatorCore' );
				break;
			case 'woocommerce':
				return class_exists( 'WooCommerce' );
				break;
			case 'gutenberg-page':
				$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : array();

				return method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor();
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'resonator_include_theme_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function resonator_include_theme_is_installed( $installed, $plugin ) {

		if ( 'theme' === $plugin ) {
			return class_exists( 'ResonatorHandler' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'resonator_include_theme_is_installed', 10, 2 );
}

if ( ! function_exists( 'resonator_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 */
	function resonator_template_part( $module, $template, $slug = '', $params = array() ) {
		echo resonator_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'resonator_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function resonator_get_template_part( $module, $template, $slug = '', $params = array() ) {
		//HTML Content from template
		$html          = '';
		$template_path = RESONATOR_INC_ROOT_DIR . '/' . $module;

		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params ); // @codingStandardsIgnoreLine
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'resonator_get_page_id' ) ) {
	/**
	 * Function that returns current page id
	 * Additional conditional is to check if current page is any wp archive page (archive, category, tag, date etc.) and returns -1
	 *
	 * @return int
	 */
	function resonator_get_page_id() {
		$page_id = get_queried_object_id();

		if ( resonator_is_wp_template() ) {
			$page_id = - 1;
		}

		return apply_filters( 'resonator_filter_page_id', $page_id );
	}
}

if ( ! function_exists( 'resonator_is_wp_template' ) ) {
	/**
	 * Function that checks if current page default wp page
	 *
	 * @return bool
	 */
	function resonator_is_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'resonator_get_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 *
	 * @param string $status - success or error
	 * @param string $message - ajax message value
	 * @param string|array $data - returned value
	 * @param string $redirect - url address
	 */
	function resonator_get_ajax_status( $status, $message, $data = null, $redirect = '' ) {
		$response = array(
			'status'   => esc_attr( $status ),
			'message'  => esc_html( $message ),
			'data'     => $data,
			'redirect' => ! empty( $redirect ) ? esc_url( $redirect ) : '',
		);

		$output = json_encode( $response );

		exit( $output );
	}
}

if ( ! function_exists( 'resonator_get_button_element' ) ) {
	/**
	 * Function that returns button with provided params
	 *
	 * @param array $params - array of parameters
	 *
	 * @return string - string representing button html
	 */
	function resonator_get_button_element( $params, $class ) {
		if ( class_exists( 'ResonatorCoreButtonShortcode' ) ) {
			return ResonatorCoreButtonShortcode::call_shortcode( $params );
		} else {
			$link   = isset( $params['link'] ) ? $params['link'] : '#';
			$target = isset( $params['target'] ) ? $params['target'] : '_self';
			$text   = isset( $params['text'] ) ? $params['text'] : '';

			if ( ! empty( $class ) && 'qodef-textual-w-arrow' === $class ) {
				$return_html = '<a itemprop="url" class="qodef-theme-button qodef-button qodef-layout--textual' . ' ' . $class . '"' . 'href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">';
				$return_html .= '<span class="qodef-m-text">' . esc_html( $text ) . '</span>';
				$return_html .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 19.2 12.7" style="enable-background:new 0 0 19.2 12.7;" xml:space="preserve"><g><g><line x1="18" y1="6.4" x2="0" y2="6.4"></line></g><path d="M13,0.6"></path><polyline points="12.5,0.4 18.5,6.4 12.5,12.4"></polyline></g></svg>';
				$return_html .= '</a>';

				return $return_html;

			} else {
				return '<a itemprop="url" class="qodef-theme-button qodef-button" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">' . esc_html( $text ) . '</a>';
			}
		}
	}
}

if ( ! function_exists( 'resonator_render_button_element' ) ) {
	/**
	 * Function that render button with provided params
	 *
	 * @param array $params - array of parameters
	 */
	function resonator_render_button_element( $params, $class_name = '' ) {
		$class = isset( $class_name ) && ! empty( $class_name ) ? esc_attr( $class_name ) : '';
		echo resonator_get_button_element( $params, $class );
	}
}

if ( ! function_exists( 'resonator_class_attribute' ) ) {
	/**
	 * Function that render class attribute
	 *
	 * @param string|array $class
	 */
	function resonator_class_attribute( $class ) {
		echo resonator_get_class_attribute( $class );
	}
}

if ( ! function_exists( 'resonator_get_class_attribute' ) ) {
	/**
	 * Function that return class attribute
	 *
	 * @param string|array $class
	 *
	 * @return string|mixed
	 */
	function resonator_get_class_attribute( $class ) {
		$value = resonator_is_installed( 'framework' ) ? qode_framework_get_class_attribute( $class ) : '';

		return $value;
	}
}

if ( ! function_exists( 'resonator_get_post_value_through_levels' ) ) {
	/**
	 * Function that returns meta value if exists
	 *
	 * @param string $name name of option
	 * @param int $post_id id of
	 *
	 * @return string value of option
	 */
	function resonator_get_post_value_through_levels( $name, $post_id = null ) {
		return resonator_is_installed( 'framework' ) && resonator_is_installed( 'core' ) ? resonator_core_get_post_value_through_levels( $name, $post_id ) : '';
	}
}

if ( ! function_exists( 'resonator_get_space_value' ) ) {
	/**
	 * Function that returns spacing value based on selected option
	 *
	 * @param string $text_value - textual value of spacing
	 *
	 * @return int
	 */
	function resonator_get_space_value( $text_value ) {
		return resonator_is_installed( 'core' ) ? resonator_core_get_space_value( $text_value ) : 0;
	}
}

if ( ! function_exists( 'resonator_wp_kses_html' ) ) {
	/**
	 * Function that does escaping of specific html.
	 * It uses wp_kses function with predefined attributes array.
	 *
	 * @param string $type - type of html element
	 * @param string $content - string to escape
	 *
	 * @return string escaped output
	 * @see wp_kses()
	 *
	 */
	function resonator_wp_kses_html( $type, $content ) {
		return resonator_is_installed( 'framework' ) ? qode_framework_wp_kses_html( $type, $content ) : $content;
	}
}

if ( ! function_exists( 'resonator_render_svg_icon' ) ) {
	/**
	 * Function that print svg html icon
	 *
	 * @param string $name - icon name
	 * @param string $class_name - custom html tag class name
	 */
	function resonator_render_svg_icon( $name, $class_name = '' ) {
		echo resonator_get_svg_icon( $name, $class_name );
	}
}

if ( ! function_exists( 'resonator_get_svg_icon' ) ) {
	/**
	 * Returns svg html
	 *
	 * @param string $name - icon name
	 * @param string $class_name - custom html tag class name
	 *
	 * @return string|html
	 */
	function resonator_get_svg_icon( $name, $class_name = '' ) {
		$html  = '';
		$class = isset( $class_name ) && ! empty( $class_name ) ? 'class="' . esc_attr( $class_name ) . '"' : '';

		switch ( $name ) {
			case 'menu':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><line x1="12" y1="21" x2="52" y2="21"/><line x1="12" y1="33" x2="52" y2="33"/><line x1="12" y1="45" x2="52" y2="45"/></svg>';
				break;
			case 'search':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path></svg>';
				break;
			case 'star':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><g><path d="M 20.756,11.768L 15.856,1.84L 10.956,11.768L0,13.36L 7.928,21.088L 6.056,32L 15.856,26.848L 25.656,32L 23.784,21.088L 31.712,13.36 z"></path></g></svg>';
				break;
			case 'menu-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><g><path d="M 13.8,24.196c 0.39,0.39, 1.024,0.39, 1.414,0l 6.486-6.486c 0.196-0.196, 0.294-0.454, 0.292-0.71 c0-0.258-0.096-0.514-0.292-0.71L 15.214,9.804c-0.39-0.39-1.024-0.39-1.414,0c-0.39,0.39-0.39,1.024,0,1.414L 19.582,17 L 13.8,22.782C 13.41,23.172, 13.41,23.806, 13.8,24.196z"></path></g></svg>';
				break;
			case 'slider-arrow-left':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26 50.9" xml:space="preserve"><polyline points="25.6,0.4 0.7,25.5 25.6,50.6 "/></svg>';
				break;
			case 'slider-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26 50.9" xml:space="preserve"><polyline points="0.4,50.6 25.3,25.5 0.4,0.4 "/></svg>';
				break;
			case 'pagination-arrow-left':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><g><path d="M 12.3,17.71l 6.486,6.486c 0.39,0.39, 1.024,0.39, 1.414,0c 0.39-0.39, 0.39-1.024,0-1.414L 14.418,17 L 20.2,11.218c 0.39-0.39, 0.39-1.024,0-1.414c-0.39-0.39-1.024-0.39-1.414,0L 12.3,16.29C 12.104,16.486, 12.008,16.742, 12.008,17 C 12.008,17.258, 12.104,17.514, 12.3,17.71z"></path></g></svg>';
				break;
			case 'pagination-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><g><path d="M 13.8,24.196c 0.39,0.39, 1.024,0.39, 1.414,0l 6.486-6.486c 0.196-0.196, 0.294-0.454, 0.292-0.71 c0-0.258-0.096-0.514-0.292-0.71L 15.214,9.804c-0.39-0.39-1.024-0.39-1.414,0c-0.39,0.39-0.39,1.024,0,1.414L 19.582,17 L 13.8,22.782C 13.41,23.172, 13.41,23.806, 13.8,24.196z"></path></g></svg>';
				break;
			case 'play-sharp':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="28" viewBox="0 0 512 512"><path d="M96 448l320-192L96 64v384z"/></svg>';
				break;
			case 'btn-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="13px" viewBox="0 0 19 13" style="enable-background:new 0 0 19 13;fill: none;stroke: currentColor;" xml:space="preserve"><g><g><line x1="18" y1="6.4" x2="0" y2="6.4"/></g><path d="M13,0.6"/><polyline points="12.5,0.4 18.5,6.4 12.5,12.4"/></g></svg>';
				break;
			case 'ion-ios-arrow-round-forward':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M295.6 163.7c-5.1 5-5.1 13.3-.1 18.4l60.8 60.9H124.9c-7.1 0-12.9 5.8-12.9 13s5.8 13 12.9 13h231.3l-60.8 60.9c-5 5.1-4.9 13.3.1 18.4 5.1 5 13.2 5 18.3-.1l82.4-83c1.1-1.2 2-2.5 2.7-4.1.7-1.6 1-3.3 1-5 0-3.4-1.3-6.6-3.7-9.1l-82.4-83c-4.9-5.2-13.1-5.3-18.2-.3z" fill="currentColor"/></svg>';
				break;
			case 'btn-arrow-left':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="13px" viewBox="0 0 19 13" style="enable-background:new 0 0 19 13;fill: none;stroke: currentColor;" xml:space="preserve"><g><g><line x1="1.2" y1="6.4" x2="19.2" y2="6.4"/></g><path d="M6.2,12.2"/><polyline points="6.7,12.4 0.7,6.4 6.7,0.4"/></g></svg>';
				break;
			case 'close':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32"><g><path d="M 10.050,23.95c 0.39,0.39, 1.024,0.39, 1.414,0L 17,18.414l 5.536,5.536c 0.39,0.39, 1.024,0.39, 1.414,0 c 0.39-0.39, 0.39-1.024,0-1.414L 18.414,17l 5.536-5.536c 0.39-0.39, 0.39-1.024,0-1.414c-0.39-0.39-1.024-0.39-1.414,0 L 17,15.586L 11.464,10.050c-0.39-0.39-1.024-0.39-1.414,0c-0.39,0.39-0.39,1.024,0,1.414L 15.586,17l-5.536,5.536 C 9.66,22.926, 9.66,23.56, 10.050,23.95z"></path></g></svg>';
				break;
			case 'spinner':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg>';
				break;
			case 'link':
				$html = '<svg ' . $class . 'xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-1 -1 62 62" style="enable-background:new 0 0 58 58;" xml:space="preserve"><path d="M29.8,34c2.7,5.2,1.8,11.7-2.5,16c-4.2,4.2-5.4,5.8-8.6,7c-3.3,1.3-7,1.3-10.3,0C1.5,54.2-1.8,46.2,1,39.2	c1.3-3.1,2.8-4.3,7-8.6c4.3-4.3,10.8-5.2,16-2.5c-0.6,0.6-4.9,4.9-5.6,5.6c-1.9-0.2-3.9,0.4-5.4,1.9l-4,4c-2.6,2.6-2.6,6.7,0,9.3	c2.6,2.6,6.7,2.6,9.3,0l4-4c1.5-1.5,2.1-3.5,1.9-5.4C24.9,38.9,29.2,34.6,29.8,34z M39.2,1c-3.2,1.3-4.3,2.8-8.6,7	c-4.2,4.2-5.2,10.7-2.5,16c0.5-0.5,5-5,5.6-5.6c-0.2-1.9,0.4-3.9,1.9-5.4l4-4c2.6-2.6,6.7-2.6,9.3,0c2.6,2.6,2.6,6.7,0,9.3l-4,4	c-1.5,1.5-3.5,2.1-5.4,1.9c-0.6,0.6-5.1,5.1-5.6,5.6c5.2,2.7,11.7,1.8,16-2.5l4-4c5.3-5.3,5.3-14,0-19.3C50.1,0.1,44.2-1,39.2,1z	 M35.7,17.3c-0.1,0.1-18.1,18.1-18.3,18.3c-1.4,1.4-1.4,3.6,0,5c1.4,1.4,3.6,1.4,5,0c0.2-0.2,17.9-17.9,18.3-18.3	c1.4-1.4,1.4-3.6,0-5C39.3,15.9,37,15.9,35.7,17.3z"/></svg>';
				break;
		}

		return $html;
	}
}
