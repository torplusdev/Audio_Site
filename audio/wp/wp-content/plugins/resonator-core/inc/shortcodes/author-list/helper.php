<?php

if ( ! function_exists( 'resonator_core_add_rest_api_author_pagination_global_variables' ) ) {
	/**
	 * Extend main rest api variables with new case
	 *
	 * @param array $global - list of variables
	 * @param string $namespace - rest namespace url
	 *
	 * @return array
	 */
	function resonator_core_add_rest_api_author_pagination_global_variables( $global, $namespace ) {
		$global['authorPaginationRestRoute'] = $namespace . '/get-authors';
		
		return $global;
	}
	
	add_filter( 'resonator_filter_rest_api_global_variables', 'resonator_core_add_rest_api_author_pagination_global_variables', 10, 2 );
}

if ( ! function_exists( 'resonator_core_add_rest_api_author_pagination_route' ) ) {
	/**
	 * Extend main rest api routes with new case
	 *
	 * @param array $routes - list of rest routes
	 *
	 * @return array
	 */
	function resonator_core_add_rest_api_author_pagination_route( $routes ) {
		$routes['author-pagination'] = array(
			'route'    => 'get-authors',
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'resonator_core_get_new_authors',
			'args'     => array(
				'options' => array(
					'required'          => true,
					'validate_callback' => function ( $param, $request, $key ) {
						// Simple solution for validation can be 'is_array' value instead of callback function
						return is_array( $param ) ? $param : (array) $param;
					},
					'description'       => esc_html__( 'Options data is array with all selected shortcode parameters value', 'resonator-core' )
				)
			)
		);
		
		return $routes;
	}
	
	add_filter( 'resonator_filter_rest_api_routes', 'resonator_core_add_rest_api_author_pagination_route' );
}

if ( ! function_exists( 'resonator_core_get_new_authors' ) ) {
	/**
	 * Function that load new posts for pagination functionality
	 *
	 * @return void
	 */
	function resonator_core_get_new_authors() {
		if ( ! isset( $_GET ) || empty( $_GET ) ) {
			qode_framework_get_ajax_status( 'error', esc_html__( 'Get method is invalid', 'resonator-core' ) );
		} else {
			$options = isset( $_GET['options'] ) ? (array) $_GET['options'] : array();
			
			if ( ! empty( $options ) ) {
				$plugin     = $options['plugin'];
				$module     = $options['module'];
				$shortcode  = $options['shortcode'];
				$query_args = resonator_core_get_author_query_params( $options );
				
				$options['query_result'] = new \WP_User_Query( $query_args );
				if ( isset( $options['object_class_name'] ) && ! empty( $options['object_class_name'] ) && class_exists( $options['object_class_name'] ) ) {
					$options['this_shortcode'] = new $options['object_class_name'](); // needed for pagination loading items since object is not transferred via data params
				}
				
				ob_start();
				
				$get_template_part = $plugin . '_get_template_part';
				
				// Variable name is function name - escaped no need
				echo apply_filters( "resonator_core_filter_{$get_template_part}", $get_template_part( $module . '/' . $shortcode, 'templates/loop', '', $options ) );
				
				$html = ob_get_clean();
				
				qode_framework_get_ajax_status( 'success', esc_html__( 'Items are loaded', 'resonator-core' ), $html );
			} else {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Options are invalid', 'resonator-core' ) );
			}
		}
	}
}

if ( ! function_exists( 'resonator_core_get_author_query_params' ) ) {
	/**
	 * Function that return query parameters
	 *
	 * @param array $params  - options value
	 *
	 * @return array
	 */
	function resonator_core_get_author_query_params( $params ) {
		$posts_per_page = isset( $params['posts_per_page'] ) && ! empty( $params['posts_per_page'] ) ? $params['posts_per_page'] : - 1;
		
		$args = array(
			'number'         => $posts_per_page,
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'fields'         => array( 'ID', 'display_name' ),
			'who'            => 'authors'
		);
		
		if ( isset( $params['next_page'] ) && ! empty( $params['next_page'] ) ) {
			$args['paged'] = intval( $params['next_page'] );
		} else {
			$args['paged'] = 1;
		}
		
		return $args;
	}
}

if ( ! function_exists( 'resonator_core_get_author_pagination_data' ) ) {
	/**
	 * Function that return pagination data
	 *
	 * @param string $plugin  - plugin name
	 * @param string $module  - module name
	 * @param string $shortcode  - shortcode name
	 * @param array $params  - shortcode params
	 *
	 * @return array
	 */
	function resonator_core_get_author_pagination_data( $plugin, $module, $shortcode, $params ) {
		$data = array();
		
		if ( ! empty( $params ) ) {
			$additional_params = array(
				'plugin'        => str_replace( '-', '_', esc_attr( $plugin ) ),
				'module'        => esc_attr( $module ),
				'shortcode'     => esc_attr( $shortcode ),
				'next_page'     => '2',
				'max_num_pages' => $params['query_result']->max_num_pages
			);
			
			unset( $params['query_result'] );
			
			if ( isset( $params['holder_classes'] ) ) {
				unset( $params['holder_classes'] );
			}
			
			if ( isset( $params['space'] ) && ! empty( $params['space'] ) ) {
				$params['space_value'] = resonator_core_get_space_value( $params['space'] );
			}
			
			$data = json_encode( array_filter( array_merge( $additional_params, $params ) ) );
		}
		
		return $data;
	}
}