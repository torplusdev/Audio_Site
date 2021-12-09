<?php

class ResonatorCoreElementorProductCategoriesList extends ResonatorCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'resonator_core_product_categories_list' );
		
		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	resonator_core_get_elementor_widgets_manager()->register_widget_type( new ResonatorCoreElementorProductCategoriesList() );
}