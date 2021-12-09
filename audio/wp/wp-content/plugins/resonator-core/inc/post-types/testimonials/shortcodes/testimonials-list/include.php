<?php

include_once RESONATOR_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/testimonials-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}