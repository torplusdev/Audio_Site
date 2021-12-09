<?php

if ( ! function_exists( 'resonator_core_cf7_add_submit_form_tag' ) ) {
	/**
	 * Function that override default submit buttom html tag
	 */
	function resonator_core_cf7_add_submit_form_tag() {
		wpcf7_add_form_tag( 'submit', 'resonator_core_cf7_submit_form_tag_handler' );
	}
}

if ( ! function_exists( 'resonator_core_cf7_submit_form_tag_handler' ) ) {
	/**
	 * Function that override default submit buttom html tag
	 *
	 * @param array $tag
	 *
	 * @return string
	 */
	function resonator_core_cf7_submit_form_tag_handler( $tag ) {
		$tag   = new WPCF7_FormTag( $tag );
		$class = wpcf7_form_controls_class( $tag->type );
		
		$atts             = array();
		$atts['class']    = $tag->get_class_option( $class );
		$atts['class']    .= ' qodef-button qodef-size--normal qodef-type--filled qodef-m qodef-html--link';
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );
		
		$value = isset( $tag->values[0] ) ? $tag->values[0] : '';
		if ( empty( $value ) ) {
			$value = esc_html__( 'Send', 'resonator-core' );
		}
		
		$atts['type'] = 'submit';
		$atts         = wpcf7_format_atts( $atts );
		
		$html = sprintf( '<button %1$s><span class="qodef-m-text">%2$s</span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								     viewBox="0 0 19.2 12.7" style="enable-background:new 0 0 19.2 12.7;" xml:space="preserve">
								     <g>
									     <g>
									        <line x1="18" y1="6.4" x2="0" y2="6.4"/>
									     </g>
									     <path d="M13,0.6"/>
									     <polyline points="12.5,0.4 18.5,6.4 12.5,12.4 	"/>
								     </g>
							    </svg>
							    </button>', $atts, $value );
		
		return $html;
	}
}