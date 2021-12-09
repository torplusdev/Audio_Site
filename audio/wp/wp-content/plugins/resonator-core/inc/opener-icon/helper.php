<?php

if ( ! function_exists( 'resonator_core_get_opener_icon_class' ) ) {
	/**
	 * Returns class for icon sources
	 *
	 * @param string $option_name
	 * @param string $custom_class
	 *
	 * @return string
	 */
	function resonator_core_get_opener_icon_class( $option_name, $custom_class = '' ) {
		$class = array();
		
		if ( ! empty( $option_name ) ) {
			$icon_source  = resonator_core_get_option_value( 'admin', 'qodef_' . esc_attr( $option_name ) . '_icon_source' );
			$class_prefix = 'qodef-source';
			
			if ( $icon_source === 'icon_pack' ) {
				$class[] = $class_prefix . '--icon-pack';
			} elseif ( $icon_source === 'svg_path' ) {
				$class[] = $class_prefix . '--svg-path';
			} elseif ( $icon_source === 'predefined' ) {
				$class[] = $class_prefix . '--predefined';
			} elseif ( $icon_source === 'custom-predefined' ) {
				$class[] = $class_prefix . '--custom-predefined';
			}
			
			if ( ! empty( $custom_class ) ) {
				$class[] = esc_attr( $custom_class );
			}
		}
		
		return implode( ' ', $class );
	}
}

if ( ! function_exists( 'resonator_core_get_opener_icon_html' ) ) {
	/**
	 * Returns html for opener icon sources
	 *
	 * @param array $params - opener settings
	 * @param bool  $has_close_icon
	 * @param bool  $set_icon_as_close
	 */
	function resonator_core_get_opener_icon_html( $params = array(), $has_close_icon = false, $set_icon_as_close = false ) {
		$args = array(
			'html_tag'          => '',
			'option_name'       => '',
			'custom_icon'       => '',
			'custom_id'         => '',
			'custom_class'      => '',
			'inline_style'      => '',
			'inline_attr'       => '',
			'custom_html'       => '',
			'set_icon_as_close' => $set_icon_as_close,
			'has_close_icon'    => $has_close_icon
		);
		
		$args = array_merge( $args, $params );
		
		resonator_core_template_part( 'opener-icon', 'templates/opener-icon', $args['html_tag'], $args );
	}
}

if ( ! function_exists( 'resonator_core_get_opener_icon_html_content' ) ) {
	/**
	 * Returns html for opener icon sources
	 *
	 * @param string $option_name - option name
	 * @param bool  $is_close_icon
	 * @param string  $custom_icon
	 *
	 * @return string/html
	 */
	function resonator_core_get_opener_icon_html_content( $option_name, $is_close_icon = false, $custom_icon = '' ) {
		$html = '';
		
		if ( empty( $option_name ) ) {
			return '';
		}
		
		if ( empty( $custom_icon ) ) {
			$custom_icon = 'menu';
		}
		
		$icon_source         = resonator_core_get_option_value( 'admin', 'qodef_' . esc_attr( $option_name ) . '_icon_source' );
		$icon_pack           = resonator_core_get_option_value( 'admin', 'qodef_' . esc_attr( $option_name ) . '_icon_pack' );
		$icon_svg_path       = resonator_core_get_option_value( 'admin', 'qodef_' . esc_attr( $option_name ) . '_icon_svg_path' );
		$close_icon_svg_path = resonator_core_get_option_value( 'admin', 'qodef_' . esc_attr( $option_name ) . '_close_icon_svg_path' );
		
		if ( $icon_source === 'icon_pack' && ! empty( $icon_pack ) ) {
			
			if ( $is_close_icon ) {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( 'close', $icon_pack );
			} else {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( $custom_icon, $icon_pack );
			}
			
		} elseif ( $icon_source === 'svg_path' && ( ( isset( $icon_svg_path ) && ! empty( $icon_svg_path ) ) || ( isset( $close_icon_svg_path ) && ! empty( $close_icon_svg_path ) ) ) ) {
			
			if ( $is_close_icon ) {
				$html .= $close_icon_svg_path;
			} else {
				$html .= $icon_svg_path;
			}
			
		} elseif ( $icon_source === 'predefined' ) {
			$html .= '<span class="qodef-m-lines">';
			$html .= '<span class="qodef-m-line qodef--1">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
			$html .= '<span class="qodef-m-line qodef--2">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
			$html .= '<span class="qodef-m-line qodef--3">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
			$html .= '</span>';
		} elseif ( $icon_source === 'custom-predefined' ) {

			if ( $is_close_icon ) {
				$html .= '<span class="qodef-m-lines">';
				$html .= '<span class="qodef-m-line qodef--1">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
				$html .= '<span class="qodef-m-line qodef--2">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
				$html .= '<span class="qodef-m-line qodef--3">
						<span class="qodef-m-dot qodef--1"></span>
						<span class="qodef-m-dot qodef--2"></span>
						<span class="qodef-m-dot qodef--3"></span>
					 </span>';
				$html .= '</span>';
			} else {
				$html .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="21" viewBox="0 0 20 20"><path fill="currentColor" d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path></svg>';
			}
		}
		
		return $html;
	}
}
