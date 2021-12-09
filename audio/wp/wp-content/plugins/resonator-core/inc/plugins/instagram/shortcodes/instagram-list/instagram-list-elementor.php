<?php

class ResonatorCoreElementorInstagramList extends ResonatorCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'resonator_core_instagram_list' );
		
		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'instagram' ) ) {
	resonator_core_get_elementor_widgets_manager()->register_widget_type( new ResonatorCoreElementorInstagramList() );
}