<?php

class ResonatorCoreElementorTestimonialsList extends ResonatorCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'resonator_core_testimonials_list' );
		
		parent::__construct( $data, $args );
	}
}

resonator_core_get_elementor_widgets_manager()->register_widget_type( new ResonatorCoreElementorTestimonialsList() );