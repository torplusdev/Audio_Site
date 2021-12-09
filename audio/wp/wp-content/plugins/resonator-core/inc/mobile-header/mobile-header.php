<?php

abstract class ResonatorCoreMobileHeader {
	public $overriding_whole_header = false;
	private $layout;
	private $layout_slug = '';
	protected $default_header_height;
	protected $header_height;
	
	public function __construct() {
		$this->set_header_height();
		add_filter( 'resonator_filter_add_inline_style', array( $this, 'set_inline_mobile_header_styles' ) );
		add_filter( 'resonator_core_filter_content_margin_mobile', array( $this, 'get_content_margin' ) );
		add_filter( 'resonator_core_filter_title_padding_mobile', array( $this, 'get_title_padding' ) );
		add_filter( 'resonator_filter_localize_main_js', array( $this, 'set_global_javascript_variables' ) );
	}
	
	public function get_layout() {
		return $this->layout;
	}
	
	public function set_layout( $layout ) {
		$this->layout = $layout;
	}
	
	public function get_layout_slug() {
		return $this->layout_slug;
	}
	
	public function set_layout_slug( $layout_slug ) {
		$this->layout_slug = $layout_slug;
	}
	
	public function is_whole_header_override() {
		return $this->overriding_whole_header;
	}
	
	public function set_overriding_whole_header( $overriding_whole_header ) {
		$this->overriding_whole_header = $overriding_whole_header;
	}
	
	public function load_template( $parameters = array() ) {
		$parameters = apply_filters( 'resonator_core_filter_mobile_header_template', $parameters );
		
		return resonator_core_get_template_part( 'mobile-header/layouts/' . $this->get_layout(), 'templates/' . $this->get_layout(), $this->get_layout_slug(), $parameters );
	}
	
	public function set_inline_mobile_header_styles( $style ) {
		$item_styles = array();
		
		$height           = resonator_core_get_post_value_through_levels( 'qodef_' . $this->get_layout() . '_mobile_header_height' );
		$background_color = resonator_core_get_post_value_through_levels( 'qodef_' . $this->get_layout() . '_mobile_header_background_color' );
		
		if ( $height !== '' ) {
			$item_styles['height'] = intval( $height ) . 'px';
		}
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
			$style .= qode_framework_dynamic_style( '.qodef-mobile-header--' . $this->get_layout() . ' #qodef-mobile-header-navigation .qodef-m-inner', array( 'background-color' => $item_styles['background-color'] ) );
		}
		
		if ( ! empty( $item_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-mobile-header--' . $this->get_layout() . ' #qodef-page-mobile-header', $item_styles );
		}
		
		return $style;
	}

	public function content_behind_header() {
		$content_behind_header = resonator_core_get_post_value_through_levels( 'qodef_content_behind_header' );

		return $content_behind_header == 'yes';
	}

	public function get_content_margin( $margin ) {

		if ( $this->content_behind_header() ) {
			$margin += $this->header_height;
		}

		return $margin;
	}

	public function get_title_padding( $padding ) {

		if ( $this->content_behind_header() ) {
			$padding += $this->header_height;
		}

		return $padding;
	}

	function set_header_height() {
		$header_height = resonator_core_get_post_value_through_levels( 'qodef_' . $this->get_layout() . '_mobile_header_height' );
		$header_height = ! empty( $header_height ) ? intval( $header_height ) : $this->default_header_height;

		$this->header_height = apply_filters( 'resonator_core_filter_set_mobile_header_height', $header_height );
	}

	function set_global_javascript_variables( $global_vars ) {
		$global_vars['mobileHeaderHeight'] = $this->header_height;

		return $global_vars;
	}
}