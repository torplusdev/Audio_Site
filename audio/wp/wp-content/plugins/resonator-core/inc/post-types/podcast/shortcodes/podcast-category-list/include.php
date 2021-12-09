<?php

include_once RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-category-list/podcast-category-list.php';

foreach ( glob( RESONATOR_CORE_CPT_PATH . '/podcast/shortcodes/podcast-category-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}