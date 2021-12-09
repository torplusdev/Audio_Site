<?php

include_once RESONATOR_CORE_CPT_PATH . '/podcast/helper.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/templates/single/*/include.php' ) as $single_part ) {
	include_once $single_part;
}

if ( ! function_exists( 'resonator_core_include_podcast_tax_fields' ) ) {
	/**
	 * Function that include module taxonomy options
	 */
	function resonator_core_include_podcast_tax_fields() {
		include_once RESONATOR_CORE_CPT_PATH . '/podcast/dashboard/taxonomy/taxonomy-options.php';
	}
	
	add_action( 'resonator_core_action_include_cpt_tax_fields', 'resonator_core_include_podcast_tax_fields' );
}